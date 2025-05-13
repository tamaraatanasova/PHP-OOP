<?php

namespace Registration\Classes;

class Validator
{
    public static function validate(array $data): array
    {
        $errors = [];

        // Validate vehicle model
        if (empty($data['vehicle_model_id']) || !is_numeric($data['vehicle_model_id'])) {
            $errors['vehicle_mode_id'] = 'Vehicle model is required and must be a valid option.';
        }

        // Validate vehicle type
        if (empty($data['vehicle_type_id']) || !is_numeric($data['vehicle_type_id'])) {
            $errors['vehicle_type_id'] = 'Vehicle type is required and must be a valid option.';
        }

        // Validate chassis number
        if (empty($data['vehicle_chassis_number']) || !preg_match('/^[A-Za-z0-9-]+$/', $data['vehicle_chassis_number'])) {
            $errors['vehicle_chassis_number'] = 'Chassis number is required and must contain only letters, numbers, and dashes.';
        }

        // Validate production year
        if (empty($data['vehicle_production_year'])) {
            $errors['vehicle_production_year'] = 'Production year is required.';
        } else {
            $year = date('Y', strtotime($data['vehicle_production_year'])); // Extract the year
            if (!self::isValidYear($year)) {
                $errors['vehicle_production_year'] = 'Production year must be a valid year.';
            }
        }

        // Validate registration number
        if (empty($data['registration_number']) || !preg_match('/^[A-Za-z0-9-]+$/', $data['registration_number'])) {
            $errors['registration_number'] = 'Registration number is required and must contain only letters, numbers, and dashes.';
        }

        // Validate fuel type
        if (empty($data['fuel_type_id']) || !is_numeric($data['fuel_type_id'])) {
            $errors['fuel_type_id'] = 'Fuel type is required and must be a valid option.';
        }

        // Validate registration to
        if (empty($data['registration_to']) || !self::isValidDate($data['registration_to'])) {
            $errors['registration_to'] = 'Registration to date is required and must be a valid date.';
        }

        return $errors;
    }

    private static function isValidYear(string $year): bool
    {
        return preg_match('/^\d{4}$/', $year) && (int)$year > 1900 && (int)$year <= (int)date('Y');
    }

    private static function isValidDate(string $date): bool
    {
        return (bool) strtotime($date);
    }
}
