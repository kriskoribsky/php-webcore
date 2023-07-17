#!/usr/bin/env bash

source "$(dirname "$0")/../utils/strict.sh"
source "$(dirname "$0")/../config/config.sh"

read -p "Package name: " package_name

if ![[ "$package_name" =~ ^[A-Z][a-zA-Z0-9]$ ]]; then
    echo 'Invalid package name.'
    exit 1
fi

read -p "Package folder name: " folder_name






read -p "Package remote repository name: " package_repo

if ![[ "$package_repo" =~ ^[a-zA-Z0-9_-]+$ ]]; then
    echo 'Invalid repository name.'
    exit 1
fi
