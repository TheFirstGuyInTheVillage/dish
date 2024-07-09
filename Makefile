down:
	docker compose down

build:
	docker compose rm -sf
	docker compose down --remove-orphans
	docker compose build --no-cache
	docker compose up -d

install:
	docker compose exec app composer install --prefer-dist

up:
	docker compose up -d

stop:
	docker compose stop

enter:
	docker compose exec app bash

dish:
	docker compose exec app bin/console app:dish:build dcciii -vvv
