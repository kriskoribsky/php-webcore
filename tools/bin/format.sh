#!/usr/bin/env bash

# Process config and run format tools
# ================================================================================

source "$(dirname "$0")/../utils/strict.sh"
source "$(dirname "$0")/../utils/run.sh"
source "$(dirname "$0")/../utils/parse.sh"

source "$(dirname "$0")/../config/config.sh"

# Prepare directories
run_tool "create-out.sh"

# Run code formatting tools
cd "$DIR_ROOT"
composer normalize --ansi "${@}"

file_template=$(test -f "$CONFIG_CSFIXER" && echo "$CONFIG_CSFIXER" || echo "$CONFIG_CSFIXER_DIST")
file_output="$CONFIG_OUT_CSFIXER"
parse_env "$file_template" "$file_output"

run_bin "php-cs-fixer" fix --config="$file_output" --ansi "${@}"
