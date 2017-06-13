<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Settings;

class EnableSettingsEmailVerifyControl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $setting = Settings::where('key', 'email_verify_control')->first();
            if(!$setting) {
                return false;
            }
            $setting->value = 1;
            $setting->save();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $setting = Settings::where('key', 'email_verify_control')->first();
            if(!$setting) {
                return false;
            }
            $setting->value = 0;
            $setting->save();
        });
    }
}
