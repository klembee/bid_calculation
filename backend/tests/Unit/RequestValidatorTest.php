<?php

namespace Tests\Unit;

use App\RequestValidator;
use PHPUnit\Framework\TestCase;
use Respect\Validation\Validator as v;

class RequestValidatorTest extends TestCase {

    public function testValidationSuccess(){
        $data = [
            "param1" => "+1 650 253 00 00",
            "param2" => "-123"
        ];

        $validator = new RequestValidator($data, [
            "param1" =>  v::phone(),
            "param2" => v::numericVal()->negative()
        ]);

        $validationResult = $validator->validate();

        $this->assertNotNull($validationResult);
        $this->assertEquals("+1 650 253 00 00", $validationResult->getValidatedInput("param1"));
        $this->assertEquals("-123", $validationResult->getValidatedInput("param2"));

        $this->assertEmpty($validationResult->getErrors());
    }

    public function testValidationWhenParamNotPresent(){
        $data = [];

        $validator = new RequestValidator($data, [
            "param1" =>  v::phone(),
            "param2" => v::numericVal()->negative()
        ]);

        $validationResult = $validator->validate();

        $errors = $validationResult->getErrors();

        $this->assertCount(2, $errors);
        $this->assertEquals("`param1` is not present.", $errors[0]);
        $this->assertEquals("`param2` is not present.", $errors[1]);
    }

    public function testValidationWhenParamInvalid(){
        $data = [
            "param1" => "asb",
            "param2" => "12"
        ];

        $validator = new RequestValidator($data, [
            "param1" =>  v::phone(),
            "param2" => v::numericVal()->negative()
        ]);

        $validationResult = $validator->validate();

        $errors = $validationResult->getErrors();

        $this->assertCount(2, $errors);
        $this->assertEquals("`param1` is not valid.", $errors[0]);
        $this->assertEquals("`param2` is not valid.", $errors[1]);
    }
}