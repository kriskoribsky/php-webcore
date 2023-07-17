# Makefile modules:
include mak/flags.mak
include mak/cmd.mak
include mak/path.mak
include mak/message.mak
include mak/utils.mak

# Directories
DIR_TOOL			:= $(DIR_ROOT)tools/
DIR_TOOL_BIN		:= $(DIR_TOOL)bin/

# Targets
init:
	$(info $(MSG_INIT))
	$(DIR_TOOL_BIN)initialize-environment.sh

check:
	$(info $(MSG_CHECK))
	$(DIR_TOOL_BIN)format.sh --diff --dry-run

format:
	$(info $(MSG_FORMAT))
	$(DIR_TOOL_BIN)format.sh

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
	$(DIR_TOOL_BIN)delete-out.sh

# Special
.PHONY: init check format static test all clean
