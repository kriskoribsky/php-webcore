# Installation

**WebCore** is available as a Version Control System (VCS) package.

-   To install this package in your projects, include this in your `composer.json`:

```
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/kriskoribsky/webcore-php"
        }
    ],
    "require": {
        "kriskoribsky/webcore": "dev-main"
    }
}

```

-   Then run the command: `composer install`
