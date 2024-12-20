<?php

namespace App\Enums;

class IdentityType
{
    const DRIVERS_LICENSE = "Drivers License";
    const NIN = "National ID Card";
    const VIN = "Voters Card";
    const INTERNATIONAL_PASSPORT = "International Passport";

    static $types = [
        self::DRIVERS_LICENSE,
        self::NIN,
        self::VIN,
        self::INTERNATIONAL_PASSPORT
    ];
}
