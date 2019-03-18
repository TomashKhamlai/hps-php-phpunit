# hps-php-phpunit

[![Build Status](https://travis-ci.org/hiptest/hps-php-phpunit.svg?branch=master)](https://travis-ci.org/TomashKhamlai/hps-php-phpunit)

Hiptest publisher samples with PHP/PHPUnit

In this repository you'll find tests generated in PHPUnit format from [Hiptest](https://hiptest.com), using [Hiptest publisher](https://github.com/hiptest/hiptest-publisher).

The goals are:

 * to show how tests are exported in PHP/PHPUnit.
 * to check exports work out of the box (well, with implemented actionwords in PHP)

System under test
------------------

The SUT is a (not that much) simple coffee machine. You start it, you ask for a coffee and you get it, sometimes. But most of times you have to add water or beans, empty the grounds. You have an automatic expresso machine at work or at home? So you know how it goes :-)

PHP install
-----------

You need PHP and [PHPUnit](https://phpunit.de/) to run generated tests. If you
do not have them installed on your OS, the easiest way I found is to use the [phpunit/phpunit](https://hub.docker.com/r/phpunit/phpunit/) docker image.

```
# pull PHPUnit docker image
docker pull phpunit/phpunit:5.0.3

# run tests
docker run -t -v $(pwd):/app phpunit/phpunit:5.0.3 tests
```


Update tests
-------------


To update the tests:

    hiptest-publisher --config phpunit.conf --only=tests

The tests are generated in [``tests/ProjectTest.php``](https://github.com/hiptest/hps-php-phpunit/blob/master/tests/ProjectTest.php)


Run tests
---------

To build the project and run the tests, use the following command:

    phpunit --configuration config.xml --log-junit results.xml

The SUT implementation can be seen in [``src/CoffeeMachine.php``](https://github.com/hiptest/hps-php-phpunit/blob/master/src/CoffeeMachine.php)

The test report is generated in ```results.xml```
