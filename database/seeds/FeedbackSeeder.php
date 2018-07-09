<?php

use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('feedbacks')->insert(array (
            0 =>
                array (
                    'title'=>'aaa',
                    'content'=>'bbb'
                ),
            1 =>
                array (
                    'title'=>'ccc',
                    'content'=>'ddd'
                ),
        ));
    }
}
