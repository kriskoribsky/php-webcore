#!/usr/bin/env bash

source "$(dirname "$0")/../utils/strict.sh"
source "$(dirname "$0")/../config/config.sh"

# Initialize development environment
docker build --tag "$DOCKER_IMAGE" "$DOCKER_CONTEXT"
docker run --rm --interactive --tty --volume "$DIR_ROOT":"$DOCKER_VOLUME" "$DOCKER_IMAGE" \
    sh -c "composer update --prefer-stable --prefer-dist --no-interaction --ansi && sh"
