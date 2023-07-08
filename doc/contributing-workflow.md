# Documentation
To include your local config files for tools, place them
under the $(DIR_TOOL) directory. The local config files
will be loaded instead of $(DIR_TOOL)*.dist config files.
For example, $(DIR_TOOL)/phpstan.neon will take precedence
over $(DIR_TOOL)/phpstan.neon.dist
