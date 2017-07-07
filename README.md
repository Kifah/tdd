
# Code samples: "TDD in action"

This is an example project for the presentation TDD in action, featuring the use of the following technologies and solutions:
* Docker/docker-compose
* Symfony 3.3/PHP 7.1
* use of phpunit to unit test pieces of software (see `api/tests` folder )
* us of behat to test the API endpoints  (see `api/features`)

### Requirements/Getting started:
* Docker-machine and docker-compose installed
* Build the containers using `docker-compose build`
* run the containers using `docker-composer up -d`
* login into the php-piece with `docker exec -it php-api bash`
* Now you are inside and can run the unit tests using `phpunit` or the behat tests using `vendor/bin/behat`
