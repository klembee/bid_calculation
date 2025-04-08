<?php

namespace App\Vehicle;

class LuxuryVehicle extends AbstractVehicle{

    /**
     * For a luxury vehicle, the buyer's fee is 10% with a max value of 200 and a minimum of 25
     */
    public function getBuyerFee(): float {
        $fee = $this->price * 0.10;
        return max(25, min($fee, 200));
    }

    public function getSellerFee(): float {
        return $this->price * 0.04;
    }
}