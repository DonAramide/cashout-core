<?php

namespace App\Services\Merchant;

use Exception;
use App\Models\User;
use App\Models\Agent;
use App\Models\Merchant;
use App\Utilities\Helpers;
use App\Exceptions\ApiException;
use Illuminate\Support\Facades\Log;

class MerchantService
{
    protected mixed $data;
    protected mixed  $user;

    public function __construct(mixed $data = [], mixed $user = null)
    {
        $this->data = $data;
        $this->user = $user;
    }

    /**
     * Create user
     * @return mixed
     * @throws ApiException|Exception
     */
    public function createMerchant(): mixed
    {
        try {
            $user = new User();
            $user->name = $this->data["first_name"]." ".$this->data["last_name"];
            $user->username = self::usernameGenerate($this->data["email"]);
            $user->first_name = $this->data["first_name"];
            $user->last_name = $this->data["last_name"];
            $user->email = $this->data["email"];
            $user->phone = $this->data["phone"];
            $user->password = $this->data["password"];
            $user->created_by = "Merchant";
            $user->save();

            $merchant = $this->profileMerchant();
            $this->profileAgent($user->id, $merchant->id);
            return $user;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            throw new ApiException($exception->getMessage());
        }
    }

    /**
     * Profile merchant / onboard
     * @return Merchant 
     * @throws ApiException 
     */
    public function profileMerchant()
    {
        try {
            $merchant = new Merchant();
            $merchant->business_no = $this->data["business_no"];
            $merchant->business_name = $this->data["business_name"];
            $merchant->domain = $this->data["domain_name"];
            $merchant->api_key = Helpers::_generateAPIKey();
            $merchant->save();
            return $merchant;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            throw new ApiException($exception->getMessage());
        }
    }

    /**
     * Profile agent
     * @return Agent
     * @throws ApiException 
     */
    public function profileAgent($userId, $merchantId)
    {
        try {
            $agent = new Agent();
            $agent->user_id = $userId;
            $agent->merchant_id = $merchantId;
            $agent->date_of_birth = $this->data["date_of_birth"];
            $agent->gender = $this->data["date_of_birth"];
            $agent->business_name = $this->data["business_name"];
            $agent->business_address = $this->data["business_address"];
            $agent->business_type = $this->data["business_type"];
            $agent->business_phone = $this->data["business_phone"];
            $agent->country = $this->data["country"];
            $agent->state = $this->data["state"];
            $agent->local_government = $this->data["local_government"];
            $agent->city = $this->data["city"];
            $agent->bvn = $this->data["bvn"];
            $agent->agent_type = $this->data["agent_type"];
            $agent->identity_type = $this->data["identity_type"];
            $agent->id_type_no = $this->data["identity_type_no"];
            $agent->identity_url = $this->data["identity_url"];
            $agent->terminal_id = Helpers::_generateTerminalId();
            $agent->created_by = "ADMIN";
            $agent->save();
            return $agent;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            throw new ApiException($exception->getMessage());
        }
    }

    /**
     * Generate username
     * @param string $email
     * @return string
     */
    protected static function usernameGenerate($email)
    {
        $explodeEmail = explode('@', $email);
        $username = $explodeEmail[0];
        $count_username = User::where('username', $username)->count();
        if ($count_username > 0) {
            $username = $username . $count_username + 1;
        }
        return $username;
    }
}
