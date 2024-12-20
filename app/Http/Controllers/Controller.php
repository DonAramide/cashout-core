<?php

namespace App\Http\Controllers;

use App\Utilities\Helpers;

abstract class Controller
{
    /**
     * Instantiate Helpers class
     */
    public function helper(): Helpers
    {
        return new Helpers;
    }
}
