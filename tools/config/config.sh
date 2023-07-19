#!/usr/bin/env bash

source "$(dirname "$0")/../utils/path.sh"

if [[ ${SOURCED_CONFIG:-} -ne 1 ]]; then
    readonly SOURCED_CONFIG=1

    # Copyright
    export COPYRIGHT_NAME='Kristian Koribsky'
    export COPYRIGHT_EMAIL='kristian.koribsky@gmail.com'

    # Github
    export GITHUB_ORGANIZATION='ksoft-server-php'
    export GITHUB_REPOSITORY='essentials'

    # Paths
    export DIR_ROOT=$(path_absolute '../../')

    export DIR_BIN=$(path_join "$DIR_ROOT" 'vendor' 'bin')
    export DIR_SRC=$(path_join "$DIR_ROOT" 'src')
    export DIR_ENV=$(path_join "$DIR_ROOT" 'env')

    export DIR_TOOL=$(path_join "$DIR_ROOT" 'tools')
    export DIR_TOOL_BIN=$(path_join "$DIR_TOOL" 'bin')

    export DIR_OUT=$(path_join "$DIR_ROOT" 'tools-out')
    export DIR_OUT_STATIC=$(path_join "$DIR_OUT" 'static')
    export DIR_OUT_FORMAT=$(path_join "$DIR_OUT" 'format')
    export DIR_OUT_TEST=$(path_join "$DIR_OUT" 'test')

    # Tools
    export CONFIG_PHPUNIT_DIST=$(path_join "$DIR_TOOL" 'phpunit.xml.dist')
    export CONFIG_PHPSTAN_DIST=$(path_join "$DIR_TOOL" 'phpstan.neon.dist')
    export CONFIG_CSFIXER_DIST=$(path_join "$DIR_TOOL" 'phpcs.php.dist')

    export CONFIG_PHPUNIT=$(path_join "$DIR_TOOL" 'phpunit.xml')
    export CONFIG_PHPSTAN=$(path_join "$DIR_TOOL" 'phpstan.neon')
    export CONFIG_CSFIXER=$(path_join "$DIR_TOOL" 'phpcs.php')

    export CONFIG_OUT_PHPUNIT=$(path_join "$DIR_OUT_TEST" 'phpunit.parsed.xml')
    export CONFIG_OUT_PHPSTAN=$(path_join "$DIR_OUT_STATIC" 'phpstan.parsed.neon')
    export CONFIG_OUT_CSFIXER=$(path_join "$DIR_OUT_FORMAT" 'phpcs.parsed.php')

    export CONFIG_OUT_CSFIXER_HOST=$(path_join "$DIR_OUT_FORMAT" 'phpcs.host.php')

    export CACHE_OUT_CSFIXER=$(path_join "$DIR_OUT_FORMAT" 'phpcs.cache')

    # Docker
    export CONTAINER_CONTEXT="$DIR_ENV"
    export CONTAINER_VOLUME='/volume'
    export CONTAINER_IMAGE="$GITHUB_ORGANIZATION-$GITHUB_REPOSITORY"

    # Composer
    export COMPOSER_UPDATE='composer update --prefer-stable --prefer-dist --no-interaction --ansi'
    export COMPOSER_UPDATE_SILENT='composer update --prefer-stable --prefer-dist --no-interaction --quiet'
fi
