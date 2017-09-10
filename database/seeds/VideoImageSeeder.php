<?php

use Illuminate\Database\Seeder;

class VideoImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for($i=1;$i<11;$i++){
            $data[] = [
                'video_id'=>$i,
                'imgBillboard'=>'',
                'imgSmall1'=>'',
                'imgPreview'=>''
            ];
        }


        DB::table('videoimages')->insert($data);

    }
}
