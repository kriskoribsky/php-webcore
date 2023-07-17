#!/usr/bin/env bash

source "$(dirname "$0")/../utils/strict.sh"
source "$(dirname "$0")/../utils/path.sh"

# Source guard
if [[ ${SOURCED_CONFIG:-} -ne 1 ]]; then
    readonly SOURCED_CONFIG=1

    # Paths
    readonly DIR_ROOT=$(path_absolute '../../')

    readonly DIR_BIN=$(path_join "$DIR_ROOT" 'vendor' 'bin')
    readonly DIR_SRC=$(path_join "$DIR_ROOT" 'src')
    readonly DIR_ENV=$(path_join "$DIR_ROOT" 'env')

    readonly DIR_TOOL=$(path_join "$DIR_ROOT" 'tools')
    readonly DIR_TOOL_BIN=$(path_join "$DIR_TOOL" 'bin')

    readonly DIR_OUT=$(path_join "$DIR_ROOT" 'tools-out')
    readonly DIR_OUT_STATIC=$(path_join "$DIR_OUT" 'static')
    readonly DIR_OUT_FORMAT=$(path_join "$DIR_OUT" 'format')
    readonly DIR_OUT_TEST=$(path_join "$DIR_OUT" 'test')

    # Tools
    readonly CONFIG_PHPUNIT_DEFAULT=$(path_join "$DIR_TOOL" 'phpunit.xml.dist')
    readonly CONFIG_PHPSTAN_DEFAULT=$(path_join "$DIR_TOOL" 'phpstan.neon.dist')
    readonly CONFIG_CSFIXER_DEFAULT=$(path_join "$DIR_TOOL" '.php-cs-fixer.dist.php')

    readonly CONFIG_PHPUNIT=$(path_join "$DIR_TOOL" 'phpunit.xml')
    readonly CONFIG_PHPSTAN=$(path_join "$DIR_TOOL" 'phpstan.neon')
    readonly CONFIG_CSFIXER=$(path_join "$DIR_TOOL" '.php-cs-fixer.php')

    # Github
    readonly GITHUB_ORGANIZATION='ksoft-server-php'
    readonly GITHUB_REPOSITORY='essentials'

    # Docker
    readonly DOCKER_CONTEXT="$DIR_ENV"
    readonly DOCKER_VOLUME='/volume'
    readonly DOCKER_IMAGE="$GITHUB_ORGANIZATION-$GITHUB_REPOSITORY"
fi
