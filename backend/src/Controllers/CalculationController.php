<?php

namespace App\Controllers;

use App\BidCalculator;
use App\BidCalculatorOutputter;
use App\RequestValidator;
use App\ValidationResult;
use App\Vehicle\CommonVehicle;
use App\Vehicle\LuxuryVehicle;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Respect\Validation\Validator as v;

class CalculationController {

    /**
     * The /calculate endpoint
     */
    public function getVehicleTotalPrice(ServerRequestInterface $request, ResponseInterface $response) {             
        // Validate that the request inputs are valid
        $requestValidator = new RequestValidator( $request->getParsedBody(), [
            "price" => v::numericVal()->positive(),
            "type" => v::in(['common', 'luxury'])
        ]);

        $validatedInputs =  $requestValidator->validate();
        $errors = $validatedInputs->getErrors();

        if(!empty($errors)){
            $response->getBody()->write(json_encode($errors)); 

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(422); // Unprocessable Entity
        }

        // The request input was valid. Calculate the total and return it as JSON
        $price = (float) $validatedInputs->getValidatedInput("price");
        $type  = strtolower($validatedInputs->getValidatedInput('type'));

        $vehicle = match ($type) {
            'common' => new CommonVehicle($price),
            'luxury' => new LuxuryVehicle($price),
        };

        $calculator = new BidCalculator($vehicle);
        $outputter = new BidCalculatorOutputter($calculator);

        $response->getBody()->write($outputter->toJSON());
        return $response
            ->withHeader('Content-Type', 'application/json');
    }
}