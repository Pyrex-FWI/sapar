.PHONY = grumphp-run

test:
	php vendor/bin/doctrine orm:info && \
	php vendor/bin/phpunit --stop-on-error --stop-on-failure --no-coverage
coverage:
	php -d zend_extension=xdebug.so vendor/bin/phpunit --coverage-html=coverage

grumphp-run:
	php vendor/bin/grumphp run