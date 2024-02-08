<?php


namespace App\Services;
use App\Models\Setting;
use Cache;

class SettingsService
{
    protected function getSettings() 
    {
        return Cache::rememberForever('settings', function(){
            $keys = ['why_choose_top_title', 'why_choose_main_title', 'why_choose_sub_title'];
            return Setting::pluck('value', 'key')->toArray();  //['key' => 'value]
        });
    }


    public function setGlobalSettings()
    {
        $settings = $this->getSettings();

        config()->set('settings', $settings);
    }

    private function clearCacheSettings()
    {
        cache::forget('settings');
    }
}