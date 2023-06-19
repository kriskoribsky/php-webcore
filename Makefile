# Files
DOCKER_FILES 			:= env/docker-compose.yml env/phpcli-composer.Dockerfile
DOCKER_COMPOSE 			:= env/docker-compose.yml

CONFIG_TEST 			:= phpunit.xml.dist
CONFIG_STATIC 			:=  phpstan.neon.dist

# Targets
full: static test

static: $(CONFIG_STATIC)
	vendor/bin/phpstan analyse

test: $(CONFIG_TEST)
	XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-text

docker-up: $(DOCKER_FILES)
	docker compose --file $(DOCKER_COMPOSE) up --build --detach
	docker exec -it webcore-phpcli sh

docker-down: $(DOCKER_FILES)
	docker compose --file $(DOCKER_COMPOSE) down

# Metadata
.PHONY: full test static docker