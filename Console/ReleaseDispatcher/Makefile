.PHONY: install update test rm-image image push image-rm-all run test

COMPOSER = eval $(ssh-agent); \
	 docker run --rm --interactive --tty \
	 --volume `pwd`:/app \
	 --volume $$SSH_AUTH_SOCK:/ssh-auth.sock \
	 --volume /etc/passwd:/etc/passwd:ro \
	 --volume /etc/group:/etc/group:ro \
	 --env SSH_AUTH_SOCK=/ssh-auth.sock \
	 --user `id -u`:`id -g` \
	 composer

IMG_TAG = yemistikris/sapar-release-dispatcher

PHP = docker run --rm -ti  -u `id -u`:`id -g` -v `pwd`:/app -v `pwd`:/mnt/c/Users/Kris/PhpstormProjects/sapar/Console/ReleaseDispatcher/ -w /app $(IMG_TAG)

install:
	$(COMPOSER) install

update:
	$(COMPOSER) update

run:
	$(PHP) php release-dispatcher run -vv

test:
	test -f vendor/bin/phpunit && $(PHP) php -n vendor/bin/phpunit --debug --verbose

coverage:
	test -f vendor/bin/phpunit && $(PHP) php vendor/bin/phpunit --debug --verbose --coverage-html=build/

image-rm:
	-docker rmi -f $(IMG_TAG)

image:
	make rm-image && \
	docker build -t $(IMG_TAG) .

push:
	docker push $(IMG_TAG)

container-rm-all:
	docker stop `docker ps -a -q` && docker rm `docker ps -a -q`

image-rm-all:
	docker rmi `docker images -q` --force