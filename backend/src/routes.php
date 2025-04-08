<?php

use App\Controllers\CalculationController;

$app->post('/get_vehicle_total_price', [CalculationController::class, 'getVehicleTotalPrice']);