monitoring library helper
==========================

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

You can create your specifics test by extends Snide\Monitoring\Model\Test class & implements execute methods.
Then, use TestManager to add & execute tests.
