# Contributing

To develop source files located in [`src`](/src) it is advised to use  
the provided `docker` configuration located in [`env`](/env).  
  
You can optionally also use `prettier` code formatter with  
`prettier/plugin-php` to format code in your IDE or batch-format using CLI.

## Setup

Npm setup:
1. `npm install`

Docker setup:
1. `cd env`
2. `docker compose up -d`
3. `docker exec -it webcore-phpcli sh`

After running interactive `sh` session inside a docker container:
1. `composer install`