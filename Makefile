# Makefile modules:
include mak/flags.mak
include mak/cmd.mak
include mak/path.mak
include mak/message.mak
include mak/utils.mak

# Project-specific configuration:
# Directories
DIR_BIN				:= $(DIR_ROOT)vendor/bin/
DIR_SRC				:= $(DIR_ROOT)src/
DIR_ENV				:= $(DIR_ROOT)env/
DIR_OUT				:= $(DIR_ROOT)out/
DIR_TOOL			:= $(DIR_ROOT)tools/

DIR_TEST			:= $(DIR_OUT)testers/
DIR_FORMAT			:= $(DIR_OUT)formatters/

# Other
DOCKER_CONTEXT		:= $(DIR_ENV)
DOCKER_VOLUME		:= /volume
DOCKER_IMAGE		:= php-webutils

# Targets
init:
	$(info $(MSG_INIT))
	docker build --tag $(DOCKER_IMAGE) $(DOCKER_CONTEXT)
	docker run --rm --interactive --tty --volume $(DIR_ROOT):$(DOCKER_VOLUME) $(DOCKER_IMAGE) \
		sh -c "composer update --prefer-stable --prefer-dist --no-interaction && sh"

check:
	$(info $(MSG_CHECK))
	$(MK) $(DIR_FORMAT)
	composer normalize --dry-run --diff --ansi
	$(CD) $(DIR_TOOL) && $(DIR_BIN)php-cs-fixer fix --dry-run --diff --ansi

format:
	$(info $(MSG_FORMAT))
	$(MK) $(DIR_FORMAT)
	composer normalize --ansi
	$(CD) $(DIR_TOOL) && $(DIR_BIN)php-cs-fixer fix --ansi

static:
	$(info $(MSG_STATIC))
	$(CD) $(DIR_TOOL) && $(DIR_BIN)phpstan analyse --ansi

test:
	$(info $(MSG_TEST))
	$(MK) $(DIR_TEST)
	$(CD) $(DIR_TOOL) && XDEBUG_MODE=coverage $(DIR_BIN)phpunit --colors=always

all: format static test

clean:
	$(info $(MSG_CLEAN))
	$(ECHO) "$(GREEN)Removing $(DIR_OUT) ...$(RESET)"
	$(RM) $(DIR_OUT)

# Special
.PHONY: init check format static test all clean
