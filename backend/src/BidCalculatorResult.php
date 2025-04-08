<?php

namespace App;

/**
 * Represents the result for the bid calculation
 */
class BidCalculatorResult {

    /**
     * Fixed fee for the storage
     * The value is multiplied by 100 to do calculations with integers
     * @var int
     */
    public static $STORAGE_FEE = 100_00;

    private $basePrice;
    private $buyerFee;
    private $sellerFee;
    private $associationFee;

    private $total;
    

    public function __construct($basePrice, $buyerFee, $sellerFee, $associationFee){
        // I do the calculation with integers to not have floating point imprecision
        $this->basePrice = round($basePrice * 100);
        $this->buyerFee = round($buyerFee * 100);
        $this->sellerFee = round($sellerFee * 100);
        $this->associationFee = round($associationFee * 100);

        $this->total = $this->basePrice + $this->buyerFee + $this->sellerFee + $this->associationFee + self::$STORAGE_FEE;
    }

    public function getBasePrice(): float {
        return $this->basePrice / 100;
    }

    public function getBuyerFee(): float {
        return $this->buyerFee / 100;
    }

    public function getSellerFee(): float {
        return $this->sellerFee / 100;
    }

    public function getAssociationFee(): float {
        return $this->associationFee / 100;
    }

    public function getTotal(): float {
        return $this->total / 100;
    }

    public function getStorageFee(): float {
        return self::$STORAGE_FEE / 100;
    }

}