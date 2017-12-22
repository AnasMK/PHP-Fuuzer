# PHP-Fuuzer

## Getting Started 
PHP-Fuzzer is a blackbox testing tool for web applications using generated random parameters for GET and POST requests.
It is implemented using [PHP-PhantomJS](https://github.com/jonnnnyw/php-phantomjs/).

### Prerquistes

- install [composer](https://getcomposer.org/)
- install [PHPUnit](https://phpunit.de/)
- install [PHP-PhantomJS](https://github.com/jonnnnyw/php-phantomjs/)

**Note:** these must be installed on the root of the project

## installing:

1.Go to <code>/vendor/jonnyw/php-phantomjs</code> and install composer again:
```
curl -s http://getcomposer.org/installer | php
php composer.phar install
```
You can see diffrent examples in the Tests folder `vendor/jonnyw/php-phantomjs/src/JonnyW/PhantomJs/Tests`

**Note:** If you want to run these test cases you need to set the path to the **outer** bin folder in each test case
```
$client = $this->getClient();
$client->getEngine()->setPath('projectRoot\bin\phantomjs.exe');
```
2.Copy <code>entries.php</code> and <code>fuzzTest.php</code> to the Tests folder

## Usage steps:
1.Go to `entries.php` and custumize it to your project
2.from CLI go to `/vendor/jonnyw/php-phantomjs` and run `phpunit` command

## Next releases features:(InshaaAllah)

1.crawler: to get the website links automatically</li>
2.[FuzzDB](https://github.com/fuzzdb-project/fuzzdb): to improve the random input generator
