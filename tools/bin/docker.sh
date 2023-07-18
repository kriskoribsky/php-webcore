#!/usr/bin/env bash

# Run command inside new fresh docker container
# ================================================================================

source "$(dirname "$0")/../utils/strict.sh"

source "$(dirname "$0")/../config/config.sh"

if [[ "${#}" -ne 1 ]]; then
    echo "Usage: ${0} <command>"
    echo 'Please provide command to run within the docker container.'
    exit 1
fi

# Build image from Dockerfile only when it doesn't exist
if [[ "$(docker images -q "$CONTAINER_IMAGE" 2>/dev/null)" == "" ]]; then
    docker build --tag "$CONTAINER_IMAGE" "$CONTAINER_CONTEXT"
fi

docker run --rm --interactive --tty \
    --workdir "$CONTAINER_VOLUME" \
    --volume "$DIR_ROOT":"$CONTAINER_VOLUME" \
    "$CONTAINER_IMAGE" "${1}"
