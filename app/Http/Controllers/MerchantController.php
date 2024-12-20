<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\MerchantRequest;
use App\Services\Merchant\MerchantService;

class MerchantController extends Controller
{
    public function createMerchant(MerchantRequest $request)
    {
        try {
            // $user = auth()->user();
            $response = (new MerchantService($request->validated(), []))->createMerchant();
        } catch (Exception $exception) {
            return $this->helper()->errorResponse(message: $exception->getMessage());

        }
        return $this->helper()->successResponse(message: "Merchant was created successfully");
    }
}
