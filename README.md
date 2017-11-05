# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

An online fighting game using [CakePHP](https://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

Clone this repository and move in it.
Then, if composer is installed globally, run:

```bash
composer install
```

Else, from your installation directory run

```bash
php composer.phar install
```

## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application. (database, etc...)

Or create a .env file in the config folder with the same structure than the .env.default 
file and insert your environment informations.
