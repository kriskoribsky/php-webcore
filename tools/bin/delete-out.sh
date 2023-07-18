#!/usr/bin/env bash

# Delete directories for tool output
# ================================================================================

source "$(dirname "$0")/../utils/strict.sh"

source "$(dirname "$0")/../config/config.sh"

rm -rf "$DIR_OUT" "$DIR_OUT_STATIC" "$DIR_OUT_FORMAT" "$DIR_OUT_TEST"
