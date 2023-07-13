# This file is part of the kk-system package.
#
# (c) Kristian Koribsky <kristian.koribsky@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.

help:
	$(info $(MSG_HELP))

commit:
	$(info $(MSG_COMMIT))
	$(COMMIT)

# Special
.PHONY: commit help
.DEFAULT_GOAL := help
