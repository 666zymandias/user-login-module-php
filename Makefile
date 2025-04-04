.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t docker-php-user-login .

build-container:
	docker run -dt --name docker-php-user-login -v .:/LoginService docker-php-user-login
	docker exec docker-php-user-login composer install

start:
	docker start docker-php-user-login

test: start
	docker exec docker-php-user-login ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it docker-php-user-login /bin/bash

stop:
	docker stop docker-php-user-login

clean: stop
	docker rm docker-php-user-login
	rm -rf vendor
