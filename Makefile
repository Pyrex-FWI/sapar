.PHONY: up

include .env
export

COMPOSER = eval $(ssh-agent); \
	 docker run --rm --interactive --tty \
	 --volume `pwd`:/app \
	 --volume $$SSH_AUTH_SOCK:/ssh-auth.sock \
	 --volume /etc/passwd:/etc/passwd:ro \
	 --volume /etc/group:/etc/group:ro \
	 --env SSH_AUTH_SOCK=/ssh-auth.sock \
	 --user `id -u`:`id -g` \
	 composer

INDEX_FILE=${ARCHIVE_PATH}/archive_file.txt
SPLIT_NAME_PREFIX=archive_file-
SF5=phpsf5
IMAGE=yemistikris/docker-sapar:sapar
DEBIAN_IMAGE=debian:stable-slim
PHPUNIT_INI=-d error_reporting=-1 -d log_errors_max_len=0 -d xdebug.show_exception_trace=0 -d zend.assertions=1 -d assert.exception=1

pull:
	docker-compose pull && docker image prune -f
up: pull
	docker-compose up -d --build --remove-orphans
build:
	cd Devops/docker-sapar/base && docker build -t yemistikris/docker-sapar:base . && cd ../../..
build-sapar:
	docker build -t yemistikris/docker-sapar:sapar -f Devops/docker-sapar/sapar/Dockerfile  .
sapar-bash:
	docker run --rm -ti yemistikris/docker-sapar:sapar bash
push:
	cd Devops/docker && $(MAKE) push
down:
	docker-compose down ;\
	docker image prune -f
reload: down up
ps:
	docker-compose ps
logs:
	docker-compose logs -f
bash4:
	docker-compose exec -w /var/www/App/Symfony4 $(SF5) bash
bash5:
	docker-compose exec $(SF5) bash
exec-bash:
	docker-compose exec -w /var/www $(SF5) bash

run-bash:
	docker-compose run --no-deps --rm $(SF5) bash

install-vendors:
	docker-compose run --rm --no-deps  -w /var/www/App/Symfony4 $(SF5) php -dmemory_limit=-1 /usr/bin/composer install \
	&& docker-compose run --rm --no-deps $(SF5) composer install \
	&& docker-compose run --rm --no-deps -w /var/www/Component/audio-core-entities $(SF5) php -dmemory_limit=-1 /usr/bin/composer install \
	&& docker-compose run --rm --no-deps -w /var/www/Component/id3 $(SF5) php -dmemory_limit=-1 /usr/bin/composer install;\

update-sapar-deps:
	docker-compose run --rm --no-deps -w /var/www/App/Symfony4 phpsf5  bash -c 'composer update pyrex-fwi/* --no-scripts' ; \
	docker-compose run --rm --no-deps  phpsf5  bash -c 'composer update pyrex-fwi/* --no-scripts'

database-update-schema:
	docker-compose run --rm --no-deps $(SF5) php -dmemory_limit=-1 bin/console doctrine:schema:update --force -vv

install: install-vendors database-update-schema reload

index: create-index-file split-index-file import-splited-files-into-db index-merge-new index-populate-elastic

create-index-file:
	docker run -it --rm -v ${ARCHIVE_PATH}:${ARCHIVE_PATH} ${IMAGE} bash -c "find ${ARCHIVE_PATH} -type f -iname *.mp3 -o -iname *.wav -o -iname *.flac -o -iname *.mp4 " > ${INDEX_FILE}
	docker run -it --rm -v ${ARCHIVE_PATH}:${ARCHIVE_PATH} ${DEBIAN_IMAGE} bash -c "wc -l < ${INDEX_FILE}"

split-index-file:
	docker run -it --rm -v ${ARCHIVE_PATH}:${ARCHIVE_PATH} ${DEBIAN_IMAGE} bash -c "cd ${ARCHIVE_PATH}; rm -f ${SPLIT_NAME_PREFIX}*" ; \
	docker run -it --rm -v ${ARCHIVE_PATH}:${ARCHIVE_PATH} ${DEBIAN_IMAGE} bash -c "cd ${ARCHIVE_PATH}; split -l ${ROWS_LIMIT} -d --additional-suffix=.txt ${INDEX_FILE} ${SPLIT_NAME_PREFIX}"

import-splited-files-into-db:
	docker-compose run --rm  --no-deps ${SF5} php bin/console index:truncate:import-table -vvv; \
	for i in ${ARCHIVE_PATH}/${SPLIT_NAME_PREFIX}* ;do\
        docker-compose run --rm --no-deps ${SF5}  php bin/console index:import:mediafile $$i -vv; \
    done; \

index-merge-new:
	docker-compose exec  ${SF5} php bin/console index:merge:mediafile -vvvv

index-populate-elastic:
	docker-compose exec -w /var/www/App/Symfony4 ${SF5} php bin/console fos:elastica:populate

producer:
	docker-compose exec  ${SF5} php bin/console index:producer:update:metadata
consume:
	docker-compose exec  ${SF5} php bin/console messenger:consume -vv
update-tags: producer
	docker-compose start supervisor

count-untaged:
	while true ; do \
		docker-compose exec ${SF5} php bin/console doctrine:query:sql "SELECT COUNT(*) FROM media where tagged=0" -vvv; \
		sleep 10; \
	done;
monorepo-merge:
	docker-compose exec -w /var/www $(SF5) php vendor/bin/monorepo-builder merge
monorepo-split:
	docker-compose exec -w /var/www $(SF5) php vendor/bin/monorepo-builder split -v

remove-bd:
	docker-compose exec -w /var/www/ $(SF5) bash -c "rm -f ${DATABASE_SQLITE_FILE} && touch ${DATABASE_SQLITE_FILE}"
reset-database: remove-bd database-update-schema

reset-tag-status:
	docker-compose exec ${SF5} php bin/console doctrine:query:sql "UPDATE media set tagged=0 where id > 0 " -q ;\
	docker-compose exec ${SF5} php bin/console doctrine:query:sql "DELETE FROM media_genre" -q ;\
	docker-compose exec ${SF5} php bin/console doctrine:query:sql "DELETE FROM media_artist" -q

force-update-tags: reset-tag-status update-tags

tests: ace-tests

#
# A U D I O   C O R E   E N T I T I E S
#
ace-phpunit:
	docker-compose exec -w /var/www/Component/audio-core-entities ${SF5} php ${PHPUNIT_INI} vendor/bin/phpunit --stop-on-error
ace-phpunit-coverage:
	docker-compose exec -w /var/www/Component/audio-core-entities ${SF5} php ${PHPUNIT_INI}  -d zend_extension=xdebug.so vendor/bin/phpunit --coverage-html=coverage --stop-on-error
ace-tests:
	docker-compose exec -w /var/www/Component/audio-core-entities ${SF5} php vendor/bin/doctrine orm:info && \
	docker-compose exec -w /var/www/Component/audio-core-entities ${SF5} php vendor/bin/grumphp run --testsuite tests -vvv
ace-qa:
	docker-compose exec -w /var/www/Component/audio-core-entities ${SF5} php vendor/bin/grumphp run --testsuite qa -vvv

#
# I D 3
#
id3-phpunit:
	time docker-compose exec -w /var/www/Component/id3 ${SF5} php ${PHPUNIT_INI}  vendor/bin/phpunit --testdox --stop-on-error
id3-phpunit-coverage:
	docker-compose exec -w /var/www/Component/id3 ${SF5} php -d zend_extension=xdebug.so vendor/bin/phpunit --coverage-html=coverage --stop-on-error

#
# M O N O R E P O   T O O L S
#
validate:
	php vendor/symplify/monorepo-builder/bin/monorepo-builder validate
bump:
	php vendor/symplify/monorepo-builder/bin/monorepo-builder package-alias