# Directories
DIR_SRC					:= src/

# Files
DOCKER_FILES 			:= env/docker-compose.yml env/phpcli-composer.Dockerfile
DOCKER_COMPOSE 			:= env/docker-compose.yml
DOCKER_CONTAINER		:= webutils-phpcli

CONFIG_TEST 			:= phpunit.xml.dist
CONFIG_STATIC 			:= phpstan.neon.dist

# Targets
full: static test

static: $(CONFIG_STATIC)
	vendor/bin/phpstan analyse

test: $(CONFIG_TEST)
	XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-text

format:
	composer normalize
	
docker: $(DOCKER_FILES)
	docker compose --file $(DOCKER_COMPOSE) up --build --detach
	docker exec -it $(DOCKER_CONTAINER) sh
	docker compose --file $(DOCKER_COMPOSE) down

# Metadata
.PHONY: full test static format docker
