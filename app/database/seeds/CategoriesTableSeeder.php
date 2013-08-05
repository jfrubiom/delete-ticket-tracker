<?php

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('categories')->delete();

		$categories = array(
            array('id'=>1,  'name'=>'Admin'),
            array('id'=>2,  'name'=>'Cafe'),
            array('id'=>3,  'name'=>'Housekeeping'),
            array('id'=>4,  'name'=>'IT'),
            array('id'=>5,  'name'=>'Kitchen'),
            array('id'=>6,  'name'=>'Horticulture'),
            array('id'=>7,  'name'=>'Maintenance'),
            array('id'=>8,  'name'=>'Reception'),
            array('id'=>9,  'name'=>'Special Projects'),
            array('id'=>10, 'name'=>'New Construction'),
		);

		// Uncomment the below to run the seeder
		DB::table('categories')->insert($categories);
	}

}