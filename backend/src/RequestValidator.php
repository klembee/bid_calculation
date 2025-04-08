<?php
namespace App;

class RequestValidator {

    private $data;
    private $validationTable;

    /**
     * Construct a new RequestValidator object
     * @param array $data - Map containing the raw request data
     * @param array $validationTable - Map assigning a validation rule to the request params
     */
    public function __construct(array $data, array $validationTable){
        $this->data = $data ?? [];
        $this->validationTable = $validationTable ?? [];
    }

    /**
     * Validate the provided input data based on the validation rules
     * configured when calling the constructor.
     * @return ValidationResult: The validated params and errors.
     */
    public function validate(): ValidationResult {
        $validatedInputs = [];
        $errors = [];
        
        // Go through each validation rule and make sure 
        foreach($this->validationTable as $key => $validationRule){
            if (!array_key_exists($key, $this->data)) {
                $errors[] = "`$key` is not present.";
                continue;
            }
    
            // Check if the input passes validation
            if (!$validationRule->validate($this->data[$key])) {
                $errors[] = "`$key` is not valid.";
                continue;
            }

            $validatedInputs[$key] = $this->data[$key];
        }

        return new ValidationResult($validatedInputs, $errors);
    }
}