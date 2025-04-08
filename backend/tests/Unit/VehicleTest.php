<?php

namespace Tests\Unit;

use App\Vehicle\CommonVehicle;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class VehicleTest extends TestCase
{
    public function testNegativePrice(){
        $this->expectException(InvalidArgumentException::class);
        new CommonVehicle(-10);
    }
}