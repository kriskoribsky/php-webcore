#!/usr/bin/env bash

# Process config and run format tools
# ================================================================================

source "$(dirname "$0")/../utils/strict.sh"
source "$(dirname "$0")/../utils/parse.sh"

source "$(dirname "$0")/../config/config.sh"

# Update project
# "$DIR_TOOL_BIN/docker.sh" $COMPOSER_UPDATE_SILENT

# Prepare directories
"$DIR_TOOL_BIN/docker.sh" "\$DIR_TOOL_BIN/create-out.sh"

# Run code formatting tools
# "$DIR_TOOL_BIN/docker.sh" cd "$DIR_ROOT" && composer normalize --ansi "${@}"

# parse_env $(test -f "$CONFIG_CSFIXER" && echo "$CONFIG_CSFIXER" || echo "$CONFIG_CSFIXER_DIST") "$CONFIG_OUT_CSFIXER"
# "$DIR_BIN/php-cs-fixer" fix --config="$CONFIG_OUT_CSFIXER" --ansi "${@}"
