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

### Solution
I have set up Docker to containerize my Symfony project.

Under symfony/src folder, I have split my solution in 4 parts:
- **Controller** - my entry point, that's where my API route will be landed and start the show.
- **EarthTime** - has only one UTC class, that is trying to convert the input string into a DateTime. It could be
a date in an acceptable format (_example, 25.01.2020 or 25-01-2020_), with or without time (_example, 25.01.2020 14:20:59_). 
If time is not specified, the default will be 00:00:00. Instead of date and time, it is also acceptable to use timestamp.
In addition, no date/time or the word **now** are also acceptable and will retrieve the current date and time. By adding an 
unacceptable date and time, the error will be retrieved in a json format.
- **SpaceTime** - that's is where the fun part begins. **ConverterInterface** and **FormatterInterface** are interfaces that tells
what the program is expecting to be implemented. **ConverterFactory** and **FormatterFactory** are general factories, that 
accept the classes which implemented the interfaces and call their methods. This allows to add other converters and formatters
in the future, perhaps to calculate dates and times in another planets, where Billie would like to open new offices.
**SpaceTimeErrorInterface** and **SpaceTimeError** are just here to output nicely exceptions in a Json string format.
- **MarsTime** - has the Mars-specific converter and formatter, the classes that implement interfaces from SpaceTime. 
**MartianDateTimeConverter** calculates and retrieves MSD and MTC according to NASA algorythm. **MartianDateTimeFormatter** combines
those calculations and creates an output in a Json string format.

This solution thinks about the future, because if we need, for example, add another date and time calculations for another planet,
we simply need to implement **ConverterInterface** and **FormatterInterface** and utilize factories to retrieve the data, like it is done
in the **SpaceTimeController**.


### Pre-requisites
- Install and start docker
- Install composer

### Instructions
To run the application:
- Clone the repository
- Navigate to symfony folder and install composer packages, build docker images and containers using docker-compose with these 3 commands:

`composer install`

`docker-compose build`

`docker-compose up`

Now, open your browser, and type http://localhost:8001/api/doc.
That should open a swagger page with simple visualization of the API with only one GET method. Now, click on "Try it out" button
and execute some date time values, for example:
- 24.06.2019
- 24-06-2002
- 01.12.1999 14:20:59
- 1590141800 (UNIX timestamp)
- now (default value)
- sdfsdfsfsdf (error message)

### Testing
To test the solution, I have added functional and unit tests under /tests folder. The folder structure for tests is identical to the one in /src folder.
Each class from /src has it's own test class in /tests.

To run tests, navigate to symfony folder and run 

`php bin/phpunit`

You should see the following results:

**OK (13 tests, 26 assertions)**

## Credits
**Author**: Dennis Peld  
**Date**: 23.05.2020  
**Tools**: Visual Studio Code, Docker, Swagger.  
**Programming language**: PHP using Symfony 5 framework.