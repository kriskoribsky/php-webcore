# Utils
CD						:= cd
RM						:= rm -f
MK						:= mkdir -p

# Directories
DIR_ROOT				:= $(dir $(realpath $(lastword $(MAKEFILE_LIST))))
DIR_BIN					:= $(DIR_ROOT)vendor/bin/
DIR_SRC					:= $(DIR_ROOT)src/
DIR_ENV					:= $(DIR_ROOT)env/
DIR_TMP					:= $(DIR_ROOT)tmp/
DIR_TOOL				:= $(DIR_ROOT)tools/

DIR_TEST				:= $(DIR_TMP)testers/
DIR_FORMAT				:= $(DIR_TMP)formatters/

# Files
DOCKER_COMPOSE 			:= $(DIR_ENV)docker-compose.yml
DOCKER_CONTAINER		:= webutils-phpcli

# Targets
all: format static test

format:
	$(MK) $(DIR_FORMAT)
	composer normalize
	$(CD) $(DIR_TOOL) && $(DIR_BIN)php-cs-fixer fix

static:
	$(CD) $(DIR_TOOL) && $(DIR_BIN)phpstan analyse

test:
	$(MK) $(DIR_TEST)
	$(CD) $(DIR_TOOL) && XDEBUG_MODE=coverage $(DIR_BIN)phpunit

docker:
	docker compose --file $(DOCKER_COMPOSE) up --build --detach
	docker exec -it $(DOCKER_CONTAINER) sh
	docker compose --file $(DOCKER_COMPOSE) down

clean:
	$(RM) -r $(DIR_TMP)

# Metadata
.PHONY: all format static test docker clean

# Documentation
# To include your local config files for tools, place them
# under the $(DIR_TOOL) directory. The local config files
# will be loaded instead of $(DIR_TOOL)*.dist config files.
# For example, $(DIR_TOOL)/phpstan.neon will take precedence
# over $(DIR_TOOL)/phpstan.neon.dist
