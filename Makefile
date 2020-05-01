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

INDEX_FILE=$(ARCHIVE_PATH)/archive_file.txt
SPLIT_NAME_PREFIX=archive_file-
SF5=phpsf5
SF4=phpsf4
IMAGE=yemistikris/php74:latest

pull:
	docker-compose pull && docker image prune -f
up: pull
	docker-compose up -d --build --remove-orphans
build:
	cd Devops/docker/ && $(MAKE) build
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
	docker-compose exec phpsf4 bash
bash5:
	docker-compose exec phpsf5 bash
bash:
	docker-compose exec -w /var/www phpsf5 bash


install:
	docker-compose.exe run --rm  php composer install

index: create-index-file split-index-file import-splited-files-into-db index-merge-new index-populate-elastic

create-index-file:
	docker run -it --rm -v ${ARCHIVE_PATH}:${ARCHIVE_PATH} ${IMAGE} bash -c "find ${ARCHIVE_PATH} -type f -iname *.mp3 -o -iname *.wav -o -iname *.flac -o -iname *.mp4 " > ${INDEX_FILE}
	docker run -it --rm -v ${ARCHIVE_PATH}:${ARCHIVE_PATH} debian:stable-slim bash -c "wc -l < ${INDEX_FILE}"

split-index-file:
	docker run -it --rm -v ${ARCHIVE_PATH}:${ARCHIVE_PATH} debian:stable-slim bash -c "cd ${ARCHIVE_PATH}; rm -f ${SPLIT_NAME_PREFIX}*" ; \
	docker run -it --rm -v ${ARCHIVE_PATH}:${ARCHIVE_PATH} debian:stable-slim bash -c "cd ${ARCHIVE_PATH}; split -l ${ROWS_LIMIT} -d --additional-suffix=.txt ${INDEX_FILE} ${SPLIT_NAME_PREFIX}"

import-splited-files-into-db:
	docker-compose run --rm  --no-deps ${SF5} php bin/console index:truncate:import-table -vvv; \
	for i in ${ARCHIVE_PATH}/${SPLIT_NAME_PREFIX}* ;do\
        docker-compose run --rm --no-deps ${SF5}  php bin/console index:import:mediafile $$i -vv; \
    done; \

index-merge-new:
	docker-compose.exe exec  ${SF5} bin/console index:merge:mediafile -vvvv

index-populate-elastic:
	docker-compose.exe exec  ${SF4} bin/console fos:elastica:populate

consume:
	docker-compose.exe exec  ${SF5}  bin/console messenger:consume -vv

monorepo-merge:
	docker-compose exec -w /var/www $(SF5) vendor/bin/monorepo-builder merge
