<?php

use Illuminate\Database\Seeder;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $faker = \Faker\Factory::create();

        for($i=0;$i<10;$i++){
            $data[] = [
                'title'=>$faker->sentence(3),
                'description'=>$faker->text(200),
                'category_id'=>$faker->numberBetween(1,4),
                'sub_category_id'=>$faker->numberBetween(11,20),
                'genre_id'=>$faker->numberBetween(1,10),
                'video'=>'video.mp3',
                'trailer_video'=>'trailer.mp3',
                'default_image'=>'default.jpeg',
                'banner_image'=>'banner.jpeg',
                'ratings'=>'1',
                'reviews'=>'1',
                'status'=>'1',
                'is_approved'=>1,
                'is_home_slider'=>1,
                'is_banner'=>1,
                'uploaded_by'=>$faker->randomElement(['admin', 'moderator', 'user', 'other']),
                'publish_time'=>$faker->dateTimeBetween('-20 days'),
                'duration'=>$faker->time(),
                'trailer_duration'=>$faker->time(),
                'video_resolutions'=>'1000x800',
                'trailer_video_resolutions'=>'1000x800',
                'compress_status'=>'1',
                'trailer_compress_status'=>'1',
                'edited_by'=>$faker->randomElement(['admin', 'moderator', 'user', 'other']),
                'watch_count'=>$faker->numberBetween(0,10000),
                'type_of_user'=>'1',
                'type_of_subscription'=>'1',
                'amount'=>'1',
                'video_type'=>'1',
                'video_upload_type'=>'1'
            ];
        }
        DB::table('admin_videos')->insert($data);

    }
}
