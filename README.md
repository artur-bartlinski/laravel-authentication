# Technical Challenge - Code task example

## Scenario
You are working in a team of backend developers in a project to build a website for our client, You've been assigned the following task.

## Objective
Use TDD approach to create a simple registration and login form (we use laravel framework in the office, but you are not limited to this)

We have provided a basic test framework which is described in the setup section. You are not limited to this framework.

## Contact us
If you have any questions regarding this test please email ITRM at [william.gu@itrm.co.uk](william.gu@itrm.co.uk) and I will get back to you as soon as possible (core office hours 9-5).

## Setup

Clone the repository and run from the within the projects base directory
```bash
composer install
```

Run the following to run the tests; you should see phpunit output of 1/1 100% successful test
```bash
./vendor/bin/phpunit
```
## Specification

* Users should be able to register by providing the following details
    * email (required)
    * password(required, confirm password in some way)
    * title (Mr,Mrs,Miss,Ms,Dr)
    * forename
    * surname
    * dob
    * gender
* User data should be validated and stored (You choose how the data is stored)
* User should be able to login after registering, and see their details