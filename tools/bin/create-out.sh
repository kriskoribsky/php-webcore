#!/usr/bin/env bash

source "$(dirname "$0")/../utils/strict.sh"
source "$(dirname "$0")/../config/config.sh"

# Create directories for tool output
mkdir --parents "$DIR_OUT" "$DIR_OUT_STATIC" "$DIR_OUT_FORMAT" "$DIR_OUT_TEST"
