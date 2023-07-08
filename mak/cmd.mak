# This file is part of the kk-system package.
#
# (c) Kristian Koribsky <kristian.koribsky@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.

# Color support
ifneq ($(findstring xterm,${TERM}),)
	ifneq ($(shell command -v tput),)
		RED         := $(shell tput -Txterm setaf 1)
		GREEN       := $(shell tput -Txterm setaf 2)
		YELLOW      := $(shell tput -Txterm setaf 3)
		BLUE        := $(shell tput -Txterm setaf 4)
		MAGENTA     := $(shell tput -Txterm setaf 5)
		CYAN        := $(shell tput -Txterm setaf 6)
		WHITE       := $(shell tput -Txterm setaf 7)
		BOLD        := $(shell tput -Txterm bold)
		UNDERLINE   := $(shell tput -Txterm smul)
		RESET       := $(shell tput -Txterm sgr0)
	else
		RED         :=
		GREEN       :=
		YELLOW      :=
		BLUE        :=
		MAGENTA     :=
		CYAN        :=
		WHITE       :=
		BOLD        :=
		UNDERLINE   :=
		RESET       :=
	endif
else
	RED         :=
	GREEN       :=
	YELLOW      :=
	BLUE        :=
	MAGENTA     :=
	CYAN        :=
	WHITE       :=
	BOLD        :=
	UNDERLINE   :=
	RESET       :=
endif


# Operating-system specific commands
OS				?=

ifeq ($(OS),Windows_NT)
	ifeq ($(shell uname -s),)
		RM		:= del /F /Q
		MK  	:= mkdir
		ECHO    := echo
	else
	RM			:= rm -rf
	MK  		:= mkdir -p
	ECHO        := echo -e
	endif
	EXT			:= exe
else
	RM 			:= rm -rf
	MK   		:= mkdir -p
	ECHO        := echo -e
	EXT			:= out
endif

# Commands
CD              := cd
COMMIT 			:= git add -A && git commit
