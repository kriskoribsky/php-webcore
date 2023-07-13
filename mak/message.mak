# This file is part of the kk-system package.
#
# (c) Kristian Koribsky <kristian.koribsky@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.

MSG_INIT			= $(BOLD)$(BLUE)MAKEFILE: INIT$(RESET)
MSG_CHECK			= $(BOLD)$(BLUE)MAKEFILE: CHECK$(RESET)
MSG_FORMAT     		= $(BOLD)$(BLUE)MAKEFILE: FORMAT$(RESET)
MSG_STATIC			= $(BOLD)$(BLUE)MAKEFILE: STATIC$(RESET)
MSG_TEST			= $(BOLD)$(BLUE)MAKEFILE: TEST$(RESET)
MSG_COMMIT			= $(BOLD)$(BLUE)MAKEFILE: COMMIT$(RESET)
MSG_CLEAN       	= $(BOLD)$(BLUE)MAKEFILE: CLEAN$(RESET)

define MSG_HELP
$(BOLD)$(BLUE)MAKEFILE: HELP$(RESET)
$(GREEN)Usage: make [targets]$(RESET)

$(BLUE)Host targets:$(RESET)
  init			Update dependencies and run interactive shell inside container

$(BLUE)Container targets:$(RESET)
  check			Check code formatting
  format		Run code formatter
  static		Perform static analysis
  test			Run tests

$(BLUE)Super targets:$(RESET)
  all			Run format, static, and test targets

$(BLUE)Utility targets:$(RESET)
  commit		Commit changes to git
  clean			Clean container artifacts
  help			Display this help message

$(BLUE)Examples:$(RESET)
  make
  make init
  make all
  make clean
endef
export MSG_HELP
