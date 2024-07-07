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

init:
	make up
	docker compose exec -u nginx app bash docker run-init.sh

dish:
	docker compose exec app bin/console app:dish:build dcciii -vvv
