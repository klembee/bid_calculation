# Bid Calculator

## Installation Backend
1. `cd backend`
1. `php composer.phar install`
1. `php -S localhost:8000 -t public`

### Making API call
1. `curl -X POST --data "price=0.4&type=luxury" localhost:8000/get_vehicle_total_price`

## Installation Frontend
1. `cd frontend`
1. `npm install`
1. `npm run dev`

## Running the backend tests
1. `cd backend`
1. `php composer.phar install`
1. `./vendor/bin/phpunit`

## Running the frontend tests
1. `cd frontend`
1. `npm install`
1. `npm run test`
