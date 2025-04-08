<?php
namespace App;

use App\Vehicle\AbstractVehicle;

class BidCalculator {

    /**
     * The vehicle to use for the calculation
     * @var AbstractVehicle
     */
    private $vehicle;

    public function __construct(AbstractVehicle $vehicle) {
        $this->vehicle = $vehicle;
    }

    /**
     * Calculate to total price of the vehicle with fees added
     * @return BidCalculatorResult: The result of the calculation
     */
    public function calculate(): BidCalculatorResult {
        return new BidCalculatorResult(
            $this->vehicle->getPrice(),
            $this->vehicle->getBuyerFee(),
            $this->vehicle->getSellerFee(),
            $this->vehicle->getAssociationFee()
        );
    }
}