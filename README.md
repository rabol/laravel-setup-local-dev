# Laravel setup local dev is your little Elf


This is a very simple, but handy package for setting up local Laravel development environment.
This package contains commands to do all the trivial steps you normally do when setting up your local Laravel development environment.

# setenv
Create a .default_vars.env in the your home directory with the common .env variables that you always set e.g. MAIL_HOST=127.0.0.1 for Homestead based development environments.

It is also possible to specify a specific file to be used by using the --file options.

If you want dynamic vars you can use this:

VAR_NAME=[ASK_FOR_VALUE]

Then you wil be prompted to enter a value

# commontasks
Create a .default_laravel_local_dev.tasks in your home directory with the common tasks that you normally perfrom on each local environment.
e.g.
``` bash
npm install
mpn run dev
php artisan migrate
php artisan storage:link
```

# all
Execcute all of the available commands

## Installation

You can install the package via composer:

```bash
composer require rabol/laravel-setup-local-dev --dev
```

## Usage

``` php
// Setup you .env vars
php artisan setuplocaldev:setenv
or
php artisan setuplocaldev:setenv --file=myvars

// Execute commontasks
php artisan setuplocaldev:commontasks
or
php artisan setuplocaldev:commontasks --file=mytasks

// All of the above
php artisan setuplocaldev:all
or
php artisan setuplocaldev:all --file_env=myvars --file_tasks=mytasks

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
