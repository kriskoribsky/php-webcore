#!/usr/bin/env bash

if [[ ${SOURCED_PARSE_UTIL:-} -ne 1 ]]; then
    readonly SOURCED_PARSE_UTIL=1

    # Parse file and replace placeholders with environment variables
    function parse_env() {
        if [[ "${#}" -ne 2 ]]; then
            echo "Usage: ${0} TEMPLATE_FILE OUTPUT_FILE"
            echo 'Please provide template file and output file to save the newly parsed file.'
            exit 1
        fi

        file_template="${1}"
        file_output="${2}"

        if [[ ! -f "${file_template}" ]]; then
            echo "File '${file_template}' does not exist or is not a regular file."
            exit 1
        fi

        if [[ ! -w "$(dirname "$file_output")" ]]; then
            echo "Cannot create new file at '${file_output}', directory doesn't exist or is not writable."
            exit 1
        fi

        perl -pe 's/{{(.*?)}}/(exists $ENV{$1}?$ENV{$1}:die "Error: Environment variable $1 not defined\n")/eg' \
            "$file_template" >"$file_output"
    }
fi
