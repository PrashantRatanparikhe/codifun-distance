# Distance
Distance is a tool to calculate the Hamming &amp; levenshtein distance between two given string.

## PHP version support
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
