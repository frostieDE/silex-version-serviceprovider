# Silex Version ServiceProvider

[![Build Status](https://travis-ci.org/frostieDE/silex-version-serviceprovider.svg?branch=master)](https://travis-ci.org/frostieDE/silex-version-serviceprovider)
[![Code Climate](https://codeclimate.com/github/frostieDE/silex-version-serviceprovider/badges/gpa.svg)](https://codeclimate.com/github/frostieDE/silex-version-serviceprovider)

ServiceProvider for Silex which enables loading a version file to specify application version.

## Installation

```
$ composer require frostiede/silex-version-serviceprovider
```

Afterwards, register the ServiceProvider:

```php
$app->register(new VersionServiceProvider(), [
    'version.file' => __DIR__ . '/VERSION'
]);
```

## Usage

You can now use `$app['version']` to determine the current application version.

## Configuration

You must specify the parameter `version.file` which holds the path to the `VERSION` file which is
loaded.

Optional: if you want to add an suffix to the version (e.g. `-dev`), you can do that, too. Just
specify the option `version.suffix`. Example:

```php
$app->register(new VersionServiceProvider(), [
    'version.file' => __DIR__ . '/VERSION',
    'version.suffix' => $app['debug'] ? 'debug' : ''
]);
```

This adds the suffix `debug` in case Silex is in debug mode.

# Contribution

Any help is welcomed. Feel free to create issues and merge requests :-)

# License

MIT License