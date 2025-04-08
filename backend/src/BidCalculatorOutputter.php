<?php
namespace App;

/**
 * Takes care of outputting the result from the
 * BidCalculator in different formats
 */
class BidCalculatorOutputter {

    /**
     * @var BidCalculator
     */
    private $calculator;

    public function __construct(BidCalculator $calculator) {
        $this->calculator = $calculator;
    }

    /**
     * Get the result as an array
     */
    public function toArray(): array{
        $result = $this->calculator->calculate();

        return [
            'base_price' => $result->getBasePrice(),
            'fees' => [
                'buyer_fee' => $result->getBuyerFee(),
                'seller_fee' => $result->getSellerFee(),
                'association_fee' => $result->getAssociationFee(),
                'storage_fee' => $result->getStorageFee()
            ],
            'total' => $result->getTotal()
        ];
    }

    /**
     * Get the result as JSON
     */
    public function toJSON(): string{
        return json_encode($this->toArray());
    }

    /**
     * Get the result as HTML
     * This is not complete. I created this class just to show SOLID principles
     */
    public function toHTML(){
        $result = $this->calculator->calculate();

        return "<p>Base Price: {$result->getBasePrice()}. <b>Total: {$result->getTotal()}</b></p>";
    }
}