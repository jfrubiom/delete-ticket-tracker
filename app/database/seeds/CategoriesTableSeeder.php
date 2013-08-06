<?php

class CategoriesTableSeeder extends Seeder 
{

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('categories')->delete();

        $categories = array(
            array('id'=>1,  'name'=>'General', 'created_at' => new DateTime, 'updated_at' => new DateTime),
        );

        // Uncomment the below to run the seeder
        DB::table('categories')->insert($categories);
    }

}