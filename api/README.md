# TDD Presentation

This is a personal small project, that accompanies a presentation I am doing
in the TDD (Test Driven Development field).
It is based on:
* Docker/Docker-Compose
* PHP 7.1
* Symfony 3.3
* phpunit/behat

### Requirements/Getting started:
* Docker-machine and docker-compose installed
* Build the containers using `docker-compose build`
* run the containers using `docker-composer up -d`
* login into the php-piece with `docker exec -it php-api bash`
* Now you are inside and can run the unit tests using `phpunit` or the behat tests using `vendor/bin/behat`


