[![Build Status](https://travis-ci.org/Pyrex-FWI/audio-core-entities.svg?branch=master)](https://travis-ci.org/Pyrex-FWI/audio-core-entities)[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Pyrex-FWI/audio-core-entities/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Pyrex-FWI/audio-core-entities/?branch=master)[![Code Coverage](https://scrutinizer-ci.com/g/Pyrex-FWI/audio-core-entities/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Pyrex-FWI/audio-core-entities/?branch=master)[![Build Status](https://scrutinizer-ci.com/g/Pyrex-FWI/audio-core-entities/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Pyrex-FWI/audio-core-entities/build-status/master)

# Audio core api

#### Build test database

`vendor/bin/doctrine o:s:cre`

Configure composer require stof/doctrine-extensions-bundle

#### Run tests

`php vendor/bin/phpunit`

`php -d zend_extension=xdebug.so vendor/bin/phpunit --coverage-html=coverage`

