#!/bin/bash

# We need to install dependencies only for Docker
[[ ! -e /.dockerenv ]] && exit 0

set -xe

apt-get update

apt-get install -y wget apt-transport-https \
 && wget https://mediaarea.net/download/binary/mediainfo/20.03/mediainfo_20.03-1_amd64.Debian_10.deb \
 && dpkg -i mediainfo_20.03-1_amd64.Debian_10.deb

apt-get update

apt-get install -y --no-install-recommends git ca-certificates wget zlib1g-dev unzip python id3v2 mediainfo flac
apt-get install -y libav-tools

wget "https://bootstrap.pypa.io/get-pip.py" && \
python get-pip.py && \
pip install eyeD3 && \
pip install eyeD3[display-plugin] && \
pip install beets

docker-php-ext-install zip \
&& pecl install xdebug-2.6.0 \
&& docker-php-ext-enable xdebug && \
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin && mv /usr/bin/composer.phar /usr/bin/composer && \
rm -r /var/lib/apt/lists/*

ln -s /usr/bin/mediainfo /usr/local/bin/
#ln -s /usr/bin/avprobe /usr/bin/ffprobe

echo "date.timezone = Europe/Paris" >/usr/local/etc/php/php.ini

php -v
metaflac --version
mediainfo --version
id3v2 --version
eyeD3 --version
ffprobe -version

git config --global user.name "Pyrex-FWI"
git config --global user.email "yemistikris@ohotmail.fr"