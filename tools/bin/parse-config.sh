#!/usr/bin/env bash

source "$(dirname "$0")/../utils/strict.sh"
source "$(dirname "$0")/../utils/run.sh"
source "$(dirname "$0")/../config/config.sh"

# Validate arguments
if [[ "${#}" -ne 2 ]]; then
    echo "Usage: ${0} FILE OUTPUT_DIRECTORY"
    echo 'Please provide filename and output directory to save the newly parsed file.'
    exit 1
fi

file="${1}"
ouput_dir="${2}"

if [[ ! -f "${file}" ]]; then
    echo "File '${file}' does not exist or is not a regular file."
    exit 1
fi

if [[ ! -d "${ouput_dir}" ]]; then
    echo "Output directory '${ouput_dir}' does not exist or is not a directory."
    exit 1
fi

# Parse file and replace placeholders with config values

# Save file to output directory

