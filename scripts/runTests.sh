#! /bin/bash

echo "Running tests in PHP7.0..."
docker run -v $PWD:/home/tightenco/ tightenco/tests-php7.0

echo "Running tests in PHP7.1..."
docker run -v $PWD:/home/tightenco/ tightenco/tests-php7.1

echo "Running tests in PHP7.2..."
docker run -v $PWD:/home/tightenco/ tightenco/tests-php7.2

echo "Running tests in PHP7.3..."
docker run -v $PWD:/home/tightenco/ tightenco/tests-php7.3

echo "Running tests in PHP7.4..."
docker run -v $PWD:/home/tightenco/ tightenco/tests-php7.4

echo "Running tests in PHP-Nightly..."
docker run -v $PWD:/home/tightenco/ tightenco/tests-php-nightly
