# Billie Mission
A home assignment for Billie.

## Pre-requisites
- Install and start docker
- Install composer

## Instructions
To run the application:
- Clone the repository
- Navigate to symfony filder and run 

`composer install`

- Navigate to root and run

`docker-compose build`

`docker-compose up`

This should build docker images and containers and run them.
- In your browser, navigate to http://127.0.0.1:8001/

## Testing
To run tests
- Navigate to symfony folder and run 

`php bin/phpunit`