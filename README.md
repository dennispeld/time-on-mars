# Billie Mission
A home assignment for Billie.

## Task 1: Research
Think about problems our Martian business may face in 2120: Oxygen supply, Marketing,
Vegetables for the Team, Accounting...whatever.
Take your time. Use Google. Do a research about the topic. Write down all the problems you
came up with, and potential solutions to each of them.

### Research results
Todo.

## Task 2: Problem solving
One of the fundamental problems of space missions is a time synchronization between Earth
and Space. The time on Mars and Earth is ticking differently and it is necessary to keep it under
control. Here are some useful links: [one](https://www.eecis.udel.edu/~mills/missions.html), 
[two](https://www.giss.nasa.gov/tools/mars24/help/algorithm.html), 
[three](http://ops-alaska.com/time/index.htm).

You need to write a microservice that we will install on our spaceships, satellites and in the
Billie Mars office in 2120.

That microservice should receive the time on Earth in UTC as an input and return two values:
the Mars Sol Date (MSD) and the Martian Coordinated Time (MTC).

You can use any PHP framework but don’t forget to cover it by tests, because we don’t want
our astronauts’ lives to depend on something untested.

### Pre-requisites
- Install and start docker
- Install composer

### Instructions
To run the application:
- Clone the repository
- Navigate to symfony folder and install composer packages

`composer install`

- Navigate to root and run

`docker-compose build`

`docker-compose up`

This should build docker images and containers and run them. Now, open your browser, and check the following requests: 

- http://localhost:8001/api/v1/spacetime/convert/24.06.2019
- http://localhost:8001/api/v1/spacetime/convert/24-06-2019
- http://localhost:8001/api/v1/spacetime/convert/1590141800 (timestamp)
- http://localhost:8001/api/v1/spacetime/convert/now (current date time)
- http://localhost:8001/api/v1/spacetime/convert/ (also current date time)
- http://localhost:8001/api/v1/spacetime/convert/sdfsdfsfsdf (error message)


## Testing
To run tests
- Navigate to symfony folder and run 

`php bin/phpunit`