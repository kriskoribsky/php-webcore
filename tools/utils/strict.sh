#!/usr/bin/env bash

if [[ ${SOURCED_STRICT_UTIL:-} -ne 1 ]]; then
    readonly SOURCED_STRICT_UTIL=1

    # Set strict flags
    set -euo pipefail
fi
