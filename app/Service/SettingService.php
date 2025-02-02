<?php

namespace App\Service;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    public function getSettings()
    {
        return Cache::rememberForever('settings', function () {
            return Setting::pluck('value', 'key')->toArray();
        });
    }

    public function setGlobalSettings()
    {
        $settings = $this->getSettings();
        config(['settings' => $settings]);

    }
}
