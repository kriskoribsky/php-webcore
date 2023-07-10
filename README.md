# Webutils

[![Github Licence](https://img.shields.io/github/license/kriskoribsky/php-webutils?color=blue)](https://github.com/kriskoribsky/php-webutils/blob/main/LICENSE)
[![Packagist version](https://img.shields.io/packagist/v/kriskoribsky/webutils)](https://packagist.org/packages/kriskoribsky/webutils)
[![PHP Version](https://img.shields.io/packagist/dependency-v/kriskoribsky/webutils/php?color=%234F5D95)](https://packagist.org/packages/kriskoribsky/webutils)
[![Contribution status](https://img.shields.io/badge/contributions-welcome-brightgreen)](.github/CONTRIBUTING.md)
[![CI Status](https://img.shields.io/github/actions/workflow/status/kriskoribsky/php-webutils/code-quality.yml)](https://github.com/kriskoribsky/php-webutils/actions)
[![Code Coverage](https://img.shields.io/codecov/c/github/kriskoribsky/php-webutils)](https://app.codecov.io/gh/kriskoribsky/php-webutils)

Simple utility constants, functions and classes to use with other frameworks/implementations.  
The primary aim of this package is to provide integrity and reduce bug-prone hardcoding of
commonly used constants, while also providing methods for conversion and formatting.

Features:

-   **Constants** for any PSR-7, PSR-15, PSR-17 and PSR-18 implementations.  
    Reffering to HTTP methods, status codes, messages and headers.
-   **Helpers** for some other PSR implementations.
-   **Integration** with frameworks, for example `kriskoribsky/webcore`.
-   **Bridge** between framework core and api services.
-   **Flexibility** of usage: enums, traits or interfaces tailored to your use case.

> **Note**: Implementation of any PSR interfaces is not within the scope of this package.

## Installation

`composer require kriskoribsky/webutils`

## Basic usage

Every utility is namespaced under the `Web\Utils` namespace.

## Documentation

-   Usage
-   Reference
-   Examples

## Contributing

Thank you for considering contributing to this project!  
With more resources we could create large, general,  
implementation-agnostic php repository of constants & utils.

-   [Contribution guide](.github/CONTRIBUTING.md)
-   [Development workflow](docs/dev.md)

## Licence

This library is open source, licensed under the [MIT license](./LICENSE).
