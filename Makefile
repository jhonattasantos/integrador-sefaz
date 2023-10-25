DC = $(shell which docker-compose)

help:
	@echo "Usage: make [target]"
	@echo ""
	@echo "Targets:"
	@echo "  dev         Run docker-compose in detached mode"
	@echo "  up          Run docker-compose"
	@echo "  up-build    Run docker-compose with --build"
	@echo "  stop        Stop docker-compose"
	@echo "  down        Stop and remove docker-compose containers"
	@echo "  build       Build docker-compose images"
	@echo "  logs        Show docker-compose logs"

dev:
	$(DC) up -d

up:
	$(DC) up

up-build:
	$(DC) up --build

stop:
	$(DC) stop

down:
	$(DC) down --remove-orphans

build:
	$(DC) build

logs:
	$(DC) logs -f --tail=100

ps:
	$(DC) ps

bash:
	$(DC) exec integrador bash

tests:
	$(DC) exec integrador composer test