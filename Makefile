# Makefile

.PHONY: up install migrate

up:
	docker compose up -d

update:
	docker compose exec php-app composer update

install:
	docker compose exec php-app composer install

migrate:
	docker compose exec php-app php yii migrate --interactive=0

init: up update install migrate