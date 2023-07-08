# This file is part of the kk-system package.
#
# (c) Kristian Koribsky <kristian.koribsky@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.

DIR_ROOT        	:= $(dir $(realpath $(firstword $(MAKEFILE_LIST))))
DIR_MAK         	:= $(dir $(realpath $(lastword $(MAKEFILE_LIST))))
