<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(AdminSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(MobileRegisterSeeder::class);
        $this->call(EmailVerificationSeeder::class);
        $this->call(SubscriptionSeeder::class);
        $this->call(AddedLanguageControlKeyInSettingsTable::class);
        $this->call(AppLinkSeeder::class);
        $this->call(PaymentPlanSeeder::class);
    }
}
