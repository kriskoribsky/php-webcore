# Development

To develop source files located in [`src`](/src) it is advised to use  
the provided `docker` configuration located in [`env`](/env).

You can optionally also use `prettier` code formatter with  
`prettier/plugin-php` to format code in your IDE or batch-format using CLI.

## Setup

Npm tools: _(host)_

-   `npm install`

Docker setup:

1.  `cd env`
2.  `docker compose up -d`
3.  `docker exec -it webcore-phpcli sh`

Composer tools: _(container)_

-   `composer install`

## Tools

Now you are ready to write code, there are several handy tools installed  
for PHP development such as `PHPUnit` and `PHPStan` for various kinds of  
testing and code analysis. There is also `prettier` cli tool for keeping  
code base consistent.

Easiest way to use these tools is to use targets provided in `Makefile`:

1. `make test` to run unit/integration/application tests
2. `make static` to run static code analysis
3. `make format` to format the whole `src/` directory using `prettier`
