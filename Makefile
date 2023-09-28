all: help

build:
	@docker compose up -d --build
up:
	@docker compose up -d
down:
	@docker compose down
restart:
	@docker compose restart
ps:
	@docker compose ps
webserver:
	@docker exec -it "ecomplete-php" /bin/bash
run:
	@docker exec -it "$(c)" /bin/bash

help:
	@echo "ecomplete - Lightweight LAMP & LEMP stacks to use on Docker.\n"
	@echo "You can use following parameters:"
	@echo " - build     : Start to build docker images in your docker-compose file."
	@echo " - clean     : Clean your docker-compose file."
	@echo " - down      : Down your containers. (Like 'docker compose down')"
	@echo " - generate  : Generate a new docker-compose file with images what you want to use."
	@echo " - init      : Create .env and docker-compose.yml files."
	@echo " - ps        : List containers."
	@echo " - restart   : Restart all containers."
	@echo " - run       : Run spesific container. (make run c=<container-name>)"
	@echo " - up        : Up your containers. (Like 'docker compose up -d')"
	@echo " - webserver : Enter your PHP container.\n"
