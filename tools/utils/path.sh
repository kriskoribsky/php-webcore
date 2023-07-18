#!/usr/bin/env bash

if [[ ${SOURCED_PATH_UTIL:-} -ne 1 ]]; then
    readonly SOURCED_PATH_UTIL=1

    # Get the correct directory separator based on the OS
    DIRECTORY_SEPARATOR=""
    if [[ "$OSTYPE" == "msys" || "$OSTYPE" == "cygwin" ]]; then
        DIRECTORY_SEPARATOR="\\"
    else
        DIRECTORY_SEPARATOR="/"
    fi

    # Generate absolute path
    function path_absolute() {
        readlink -f $(dirname "${0}")$DIRECTORY_SEPARATOR$1
    }

    # Generate full path from file segments
    function path_join() {
        local segments=("${@}")
        local result="${segments[0]}"

        for ((i = 1; i < ${#segments[@]}; i++)); do
            result="$result$DIRECTORY_SEPARATOR${segments[i]}"
        done

        echo "$result"
    }
fi
