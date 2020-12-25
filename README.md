# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rabol/laravel-setup-local-dev.svg?style=flat-square)](https://packagist.org/packages/rabol/laravel-setup-local-dev)
[![Build Status](https://img.shields.io/travis/rabol/laravel-setup-local-dev/master.svg?style=flat-square)](https://travis-ci.org/rabol/laravel-setup-local-dev)
[![Quality Score](https://img.shields.io/scrutinizer/g/rabol/laravel-setup-local-dev.svg?style=flat-square)](https://scrutinizer-ci.com/g/rabol/laravel-setup-local-dev)
[![Total Downloads](https://img.shields.io/packagist/dt/rabol/laravel-setup-local-dev.svg?style=flat-square)](https://packagist.org/packages/rabol/laravel-setup-local-dev)

This is a very simple, but handy package for setting up local Laravel development environment.
This package contains commands to do all the trivial steps you normally do when setting up your local Laravel development environment.

One can create a .default_vars.env in the users home directory with the common .env variables that one alwasy set e.g. MAIL_HOST=127.0.0.1 for Homestead based development environments.

It is also possible to specify a specific fiel to beuse by using the --file options.
## Installation

You can install the package via composer:

```bash
composer require rabol/laravel-setup-local-dev --dev
```

## Usage

``` php
// Usage description here
php artisan setuplocaldev:setenv

or

php artisan setuplocaldev:setenv --file=test.env


```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email steen@rabol.com instead of using the issue tracker.

## Credits

- [Steen Rabol](https://github.com/rabol)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
