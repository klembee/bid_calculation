<?php

namespace App;

/**
 * Stores the validated outputs and errors generated
 * by RequestValidator
 */
class ValidationResult {
    private $validatedInputs;
    private $errors;

    public function __construct($validatedInputs, ?array $errors) {
        $this->validatedInputs = $validatedInputs;
        $this->errors = $errors;
    }

    public function getValidatedInput($paramKey) {
        return $this->validatedInputs[$paramKey];
    }

    public function getErrors(){
        return $this->errors;
    }
}