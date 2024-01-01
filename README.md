# chubbyphp-http-exception

[![CI](https://github.com/chubbyphp/chubbyphp-http-exception/workflows/CI/badge.svg?branch=master)](https://github.com/chubbyphp/chubbyphp-http-exception/actions?query=workflow%3ACI)
[![Coverage Status](https://coveralls.io/repos/github/chubbyphp/chubbyphp-http-exception/badge.svg?branch=master)](https://coveralls.io/github/chubbyphp/chubbyphp-http-exception?branch=master)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fchubbyphp%2Fchubbyphp-http-exception%2Fmaster)](https://dashboard.stryker-mutator.io/reports/github.com/chubbyphp/chubbyphp-http-exception/master)[![Latest Stable Version](https://poser.pugx.org/chubbyphp/chubbyphp-http-exception/v/stable.png)](https://packagist.org/packages/chubbyphp/chubbyphp-http-exception)
[![Latest Stable Version](https://poser.pugx.org/chubbyphp/chubbyphp-http-exception/v/stable.png)](https://packagist.org/packages/chubbyphp/chubbyphp-http-exception)
[![Total Downloads](https://poser.pugx.org/chubbyphp/chubbyphp-http-exception/downloads.png)](https://packagist.org/packages/chubbyphp/chubbyphp-http-exception)
[![Monthly Downloads](https://poser.pugx.org/chubbyphp/chubbyphp-http-exception/d/monthly)](https://packagist.org/packages/chubbyphp/chubbyphp-http-exception)

[![bugs](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-http-exception&metric=bugs)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-http-exception)
[![code_smells](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-http-exception&metric=code_smells)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-http-exception)
[![coverage](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-http-exception&metric=coverage)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-http-exception)
[![duplicated_lines_density](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-http-exception&metric=duplicated_lines_density)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-http-exception)
[![ncloc](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-http-exception&metric=ncloc)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-http-exception)
[![sqale_rating](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-http-exception&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-http-exception)
[![alert_status](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-http-exception&metric=alert_status)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-http-exception)
[![reliability_rating](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-http-exception&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-http-exception)
[![security_rating](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-http-exception&metric=security_rating)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-http-exception)
[![sqale_index](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-http-exception&metric=sqale_index)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-http-exception)
[![vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=chubbyphp_chubbyphp-http-exception&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=chubbyphp_chubbyphp-http-exception)

## Description

Creates http exceptions which can be catched and converted to error responses.

## Requirements

 * php: ^8.1

## Installation

Through [Composer](http://getcomposer.org) as [chubbyphp/chubbyphp-http-exception][1].

```bash
composer require chubbyphp/chubbyphp-http-exception "^1.1"
```

## Usage

```php
<?php

declare(strict_types=1);

namespace App;

use Chubbyphp\HttpException\HttpException;

$exception = new \RuntimeException('error');

$httpException = HttpException::createBadRequest([
    'key1' => 'value1',
    'key2' => 'value2'
], $exception);
```

## Copyright

2024 Dominik Zogg

[1]: https://packagist.org/packages/chubbyphp/chubbyphp-http-exception
