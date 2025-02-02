<?php

namespace App\Service;

use App\Models\PaymentSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class PaymentGatewaySettingService
{

/** 
* Get payment gatway settings and store it in cache 
*
**/
    public function getSettings(): array
    {
        return  Cache::rememberForever('payment_gateway_settings', function () {
            return PaymentSetting::pluck('value', 'key')->toArray();
        });
    }

    /**
     * Set global settings in global config
     */

    public function setGlobalSettings()
    {
        $settings =  $this->getSettings();
        Config::set('gateway_settings', $settings);
    }
}
