<?php

namespace App\Vehicle;

class CommonVehicle extends AbstractVehicle{

    /**
     * For a common vehicle, the buyer's fee is 10% with a max value of 50 and a minimum of 10
     */
    public function getBuyerFee(): float {
        $fee = $this->price * 0.10;

        return max(10, min($fee, 50));
    }

    public function getSellerFee(): float {
        return $this->price * 0.02;
    }
}