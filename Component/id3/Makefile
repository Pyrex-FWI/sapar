.PHONY: test

DOCKER_IMAGE_OLD=registry.gitlab.com/pyrex-fwi/sapar-id3:php-7.2
DOCKER_IMAGE=registry.gitlab.com/pyrex-fwi/sapar-id3:php-7.4
up:
	docker-compose  -f App/ReleaseDispatcherUi/docker-compose.yml -f App/NodeFolderApi/docker-compose.yml up

bash:
	docker run -it --rm -v ${PWD}:/sapar-id3 -w /sapar-id3 ${DOCKER_IMAGE} bash

install:
	docker run -it --rm -v ${PWD}:/sapar-id3 -w /sapar-id3 ${DOCKER_IMAGE} composer install

update:
	docker run -it --rm -v ${PWD}:/sapar-id3 -w /sapar-id3 ${DOCKER_IMAGE} composer update

test:
	docker run -it --rm -v ${PWD}:/sapar-id3 -w /sapar-id3 ${DOCKER_IMAGE} vendor/bin/phpunit
test-debug:
	docker run -it --rm -v ${PWD}:/sapar-id3 -w /sapar-id3 ${DOCKER_IMAGE} vendor/bin/phpunit --verbose --debug
test-coverage:
	docker run -it --rm -v ${PWD}:/sapar-id3 -w /sapar-id3 ${DOCKER_IMAGE} vendor/bin/phpunit --coverage-text --coverage-html=coverage
test-metrics:
	docker run -it --rm -v ${PWD}:/sapar-id3 -w /sapar-id3 ${DOCKER_IMAGE} vendor/bin/phpmetrics --report-html=report ./src
cs-fixer:
	docker run -it --rm -v ${PWD}:/sapar-id3 -w /sapar-id3 ${DOCKER_IMAGE} vendor/bin/php-cs-fixer fix --config .php_cs
dry-cs-fixer:
	docker run -it --rm -v ${PWD}:/sapar-id3 -w /sapar-id3 ${DOCKER_IMAGE} vendor/bin/php-cs-fixer fix --config .php_cs --dry-run

bench:
	docker run -it --rm -v ${PWD}:/sapar-id3 -w /sapar-id3 ${DOCKER_IMAGE} vendor/bin/phpunit --group eyed3-read --repeat 100