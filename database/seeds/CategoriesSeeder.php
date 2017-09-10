<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $data = [];
        $names = ['','Movies','Documentaries','Web Series', 'TV Shows'];
        for($i=1;$i<5;$i++){
            $data[] = [
               'name'=>$names[$i],
                'picture'=>'',
                'is_series'=>$faker->randomElement([1,2]),
                'status'=>'1',
                'is_approved'=>1,
                'created_by'=>1
            ];
        }

        DB::table('categories')->insert($data);
    }
}
