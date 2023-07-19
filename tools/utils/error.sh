#!/usr/bin/env bash

if [[ ${SOURCED_ERROR_UTIL:-} -ne 1 ]]; then
    readonly SOURCED_ERROR_UTIL=1

    # Set better error message
    trap 's=$?; echo >&2 "$0: Error on line "$LINENO": $BASH_COMMAND"; exit $s' ERR
fi
