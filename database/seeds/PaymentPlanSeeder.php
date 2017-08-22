<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PaymentPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('utc')->toDateTimeString();
        \App\PaymentPlan::truncate();
        \App\PaymentPlan::insert([
            [
                'name'=>'Basic',
                'price'=>'0',
                'description'=>'10 videos',
                'product1'=>'advantage1',
                'product2'=>null,
                'product3'=>null,
                'product4'=>null,
                'created_at'=>$now,
                'updated_at'=>$now
            ],
            [
                'name'=>'Silver',
                'price'=>'3',
                'description'=>'30 videos',
                'product1'=>'advantage1',
                'product2'=>'advantage2',
                'product3'=>null,
                'product4'=>null,
                'created_at'=>$now,
                'updated_at'=>$now
            ],
            [
                'name'=>'Gold',
                'price'=>'5',
                'description'=>'100 videos',
                'product1'=>'advantage1',
                'product2'=>'advantage2',
                'product3'=>'advantage3',
                'product4'=>null,
                'created_at'=>$now,
                'updated_at'=>$now
            ],
            [
                'name'=>'Platinum',
                'price'=>'7',
                'description'=>'150 videos',
                'product1'=>'advantage1',
                'product2'=>'advantage2',
                'product3'=>'advantage3',
                'product4'=>'advantage4',
                'created_at'=>$now,
                'updated_at'=>$now
            ]
        ]);
    }
}
