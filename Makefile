down:
	docker compose down

build:
	docker compose rm -sf
	docker compose down --remove-orphans
	docker compose build
	docker compose up -d

up:
	docker compose up -d

stop:
	docker compose stop

enter:
	docker compose exec app bash

dish:
	docker compose exec app bin/console app:dish:build dcciii -vvv
