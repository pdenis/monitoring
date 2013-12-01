Monitoring Library Helper
==========================

A simple library to provide monitoring test class based & applications tests chaining

[![Build Status](https://travis-ci.org/pdenis/monitoring.png?branch=master)](https://travis-ci.org/pdenis/monitoring)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/pdenis/monitoring/badges/quality-score.png?s=32b09705adb0d6cd681eb4daa1d8ddac296cf5ec)](https://scrutinizer-ci.com/g/pdenis/monitoring/)

## features
* Test class based
* Application management & chaining

## Installation

### Installation by Composer

If you use composer, add library as a dependency to the composer.json of your application

```php
    "require": {
        ...
        "snide/monitoring": "dev-master"
        ...
    },

```
## Usage

### Using existing test class

Some tests class are defined :

* Environment var
* Redis Test
* File permissions
* File existence
* Generic test

### Create your own

You can create your specifics test by extends Snide\Monitoring\Model\Test class & implements execute method.
Then, use TestManager to add & execute tests.

