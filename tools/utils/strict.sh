#!/usr/bin/env bash

# Source guard
if [[ ${SOURCED_STRICT_UTIL:-} -ne 1 ]]; then
    readonly SOURCED_STRICT_UTIL=1

    # Strict flags
    set -euo pipefail
    trap 's=$?; echo >&2 "$0: Error on line "$LINENO": $BASH_COMMAND"; exit $s' ERR
fi
