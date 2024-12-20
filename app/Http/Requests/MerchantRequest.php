<?php

namespace App\Http\Requests;

use App\Enums\AgentLevel;
use App\Enums\IdentityType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MerchantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'business_no' => 'sometimes|required|string',
            'business_name' => 'required|string|max:100',
            'business_type' => 'required|string',
            'business_address' => 'required|string',
            'business_phone' => 'required|regex:/^[0-9]+$/|max:13|unique:agents,business_phone',
            'domain_name' => 'sometimes|required|string|unique:merchants,domain',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'country' => 'sometimes|required|string',
            'state' => 'sometimes|required|string',
            'local_government' => 'sometimes|string',
            'city' => 'sometimes|required|string',
            'bvn' => 'sometimes|required|integer|digits:11',
            'agent_type' => ['sometimes', 'required', 'string', Rule::in(AgentLevel::$types)],
            'first_name' => 'required|string|max:50|regex:/^[A-Za-z-_]+$/',
            'last_name' => 'required|string|max:50|regex:/^[A-Za-z-_]+$/',
            'phone' => 'required|regex:/^[0-9]+$/|max:13|unique:users,phone',
            'email' => 'required|email|string|max:50|unique:users,email',
            'password' => 'required',
            'identity_type' => ['required', 'string', Rule::in(IdentityType::$types)],
            'identity_type_no' => 'required|string',
            'identity_url' => 'required|string'
        ];
    }
}
