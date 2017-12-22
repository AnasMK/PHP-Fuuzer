# PHP-Fuuzer
PHP-Fuzzer is a blackbox testing tool for web applications using generated random parameters for GET and POST requests.
It is implemented using [PHP-PhantomJS](https://github.com/jonnnnyw/php-phantomjs/).

## Getting Started 
These instructions will wake you step-by-step to install phpFuzzer on your project and how to use it.

### Prerquistes
1. install [composer](https://getcomposer.org/) on your project root directory
  ```
  #bash

  $ curl -s http://getcomposer.org/installer | php
  ```
2. Create a `composer.json` file in the root of your project: (you need to set the path to phantomjs.js in the bin folder)
  ```
  #composer.json
  
  {
      "require": {
          "jonnyw/php-phantomjs": "4.*"
      },
      "config": {
          "bin-dir": "path/to/phantomjs"
      },
      "scripts": {
          "post-install-cmd": [
              "PhantomInstaller\\Installer::installPhantomJS"
          ],
          "post-update-cmd": [
              "PhantomInstaller\\Installer::installPhantomJS"
          ]
      }
  }
  ```
  3. install the composer depedencies for your project:
  ```
   #bash

   $ curl -s http://getcomposer.org/installer | php
  ```
  4. Go to `/vendor/jonnyw/php-phantomjs` and install composer again:
    ```
    curl -s http://getcomposer.org/installer | php
    php composer.phar install
    ```
5. install [PHPUnit](https://phpunit.de/), for installation documentation click [here](https://phpunit.de/manual/current/en/installation.html)


## Installing:
- Copy `entries.php` and `fuzzTest.php` to the Tests folder

## Usage
### Running phpFuzzer
1. Go to `entries.php` and custumize it to your project
2. from CLI go to `/vendor/jonnyw/php-phantomjs` and run `phpunit` command

to run test cases you need to set the path bin folder in each test case
```
$client = $this->getClient();
$client->getEngine()->setPath('projectRoot\bin\phantomjs.exe');
```
### PHP-PhantomJS examples:
You can see diffrent examples in the Tests folder `vendor/jonnyw/php-phantomjs/src/JonnyW/PhantomJs/Tests`

## Next releases features:(InshaaAllah)
1. Crawler: to get the website links automatically</li>
2. [FuzzDB](https://github.com/fuzzdb-project/fuzzdb): to improve the random input generator
