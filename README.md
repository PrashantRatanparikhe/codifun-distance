# Distance
[![Build Status](https://github.com/PHPOffice/PhpSpreadsheet/workflows/main/badge.svg)](https://github.com/pnodeskuser/codifun-distance/actions)
[![Total Downloads](https://img.shields.io/badge/downloads-2-blue)](https://packagist.org/packages/codifun/distance/stats)
[![Version](https://img.shields.io/badge/version-v1.0.1-blue)](https://packagist.org/packages/codifun/distance#v1.0.1)
[![License](https://img.shields.io/github/license/PHPOffice/PhpSpreadsheet)](https://packagist.org/packages/codifun/distance)

Distance is a tool to calculate the Hamming &amp; levenshtein distance between two given string.

## PHP version support
LTS: Support for PHP versions will only be maintained for a period of six months beyond the
[end of life of that PHP version](https://www.php.net/eol.php).

Currently the required PHP minimum version is PHP __^7.4__.

See the `composer.json` for other requirements.

## Installation

Use [composer](https://getcomposer.org) to install Distance into your project:

```sh
composer require codifun/distance
```

If you are building your installation on a development machine that is on a different PHP version to the server where it will be deployed, or if your PHP CLI version is not the same as your run-time such as `php-fpm` or Apache's `mod_php`, then you might want to add the following to your `composer.json` before installing:
```json lines
{
    "require": {
        "codifun/distance": "^1.0"
    }
}
```
and then run
```sh
composer install
```
to ensure that the correct dependencies are retrieved to match your deployment environment.

See [CLI vs Application run-time](https://php.watch/articles/composer-platform-check) for more details.

## Example
```php
use Codifun\Distance\Helpers\Distance as DistanceHelper;

class Index
{
    use DistanceHelper;

    /**
     * Display a listing of the resource.
     * 
     * @return array
     */
    public function index(): array
    {
        $stringOne = "This is a test";
        $stringTwo = "This is test";
        
        return [
            'hamming_distance' => self::GetHammingDistance($string_one, $string_two),
            'levenshtein_distance' => self::GetLevenshteinDistance($string_one, $string_two)
        ];
    }
}
```

## License

Distance is licensed under [MIT](https://github.com/pnodeskuser/codifun-distance/blob/main/LICENSE).
