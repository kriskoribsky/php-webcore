# Development

## Workflow

1. `make init`
2. write code
3. `make all`

To see what these `Makefile` targets do, run `make help`.

## Configuration

### Makefile

To add targets or modify project paths, edit variables in `Makefile`. Note that there are also makefile modules located
in `mak` directory, but usually, you wouldn't need to change these.

### Tools

To include your local config files for tools, place them under the `$(DIR_TOOL)` directory. The local config files will
be loaded instead of `$(DIR_TOOL)*.dist` config files. For example, `$(DIR_TOOL)/phpstan.neon` will take precedence
over `$(DIR_TOOL)/phpstan.neon.dist`.
