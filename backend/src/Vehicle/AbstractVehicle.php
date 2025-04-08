<?php
namespace App\Vehicle;

abstract class AbstractVehicle {

    /**
     * @var float
     */
    protected $price;

    public function __construct(float $price){
        if ($price < 0) {
            throw new \InvalidArgumentException("Price must be positive");
        }

        $this->price = $price;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getAssociationFee(): float {
        return match (true) {
            $this->price <= 500 => 5,
            $this->price <= 1000 => 10,
            $this->price <= 3000 => 15,
            default => 20,
        };
    }

    abstract public function getBuyerFee(): float;
    abstract public function getSellerFee(): float;
}