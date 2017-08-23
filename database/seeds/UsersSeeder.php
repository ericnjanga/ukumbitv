<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'tester',
                'email'=>'tester@example.com',
                'password'=>bcrypt('123456'),
                'picture'=>'http://ukumbitv/placeholder.png',
                'token'=>'',
                'token_expiry'=>'',
                'device_token'=>'',
                'device_type'=>'web',
                'login_by'=>'manual',
                'social_unique_id'=>'',
                'fb_lg'=>'',
                'gl_lg'=>'',
                'description'=>'',
                'is_activated'=>1,
                'status'=>0,
                'is_guest'=>0,
                'verification_code'=>'5991b1b16007a',
                'verification_code_expiry'=>'1505312433',
                'is_verified'=>1,
                'push_status'=>0,
                'user_type'=>0,
                'is_moderator'=>0,
                'moderator_id'=>0,
                'gender'=>'male',
                'mobile'=>'',
                'latitude'=>0,
                'longitude'=>0,
                'paypal_email'=>'',
                'address'=>'',
                'remember_token'=>'',
                'timezone'=>'',
            ]
        ]);
    }
}
