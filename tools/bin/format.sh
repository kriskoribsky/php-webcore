#!/usr/bin/env bash

source "$(dirname "$0")/../utils/strict.sh"
source "$(dirname "$0")/../utils/run.sh"
source "$(dirname "$0")/../config/config.sh"

# Run code formatting tools
cd "$DIR_ROOT"
composer normalize --ansi "${@}"

cd "$DIR_TOOL"
config=$(test -f "$CONFIG_CSFIXER" && echo "$CONFIG_CSFIXER" || echo "$CONFIG_CSFIXER_DEFAULT")
run_tool "parse-config.sh" "$config" "$DIR_OUT_FORMAT"
run_bin "php-cs-fixer" fix --ansi "${@}"
