FROM php:7.4-cli-buster

ADD ./ci/docker_install.sh /

RUN ["chmod", "+x", "/docker_install.sh"]
RUN /docker_install.sh
#ENTRYPOINT ["/bin/bash", "-c"]
