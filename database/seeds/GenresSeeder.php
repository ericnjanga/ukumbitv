<?php

use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $genres = ['Drama','Comedy','Action','Fantasy','History','War','Animation','Western','Musical','Horror'];
        foreach ($genres as $genre){
            $data[] = [
                'name'=>$genre,
                'category_id'=>1,
                'sub_category_id'=>0,
                'position'=>1,
                'status'=>1,
                'is_approved'=>1,
                'created_by'=>1
            ];
        }

        DB::table('genres')->insert($data);
    }
}
