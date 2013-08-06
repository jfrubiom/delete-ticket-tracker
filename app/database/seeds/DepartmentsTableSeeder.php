<?php

class DepartmentsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('departments')->truncate();

        $departments = array(
            array('id'=>1,  'name'=>'Admin', 'created_at' => new DateTime, 'updated_at' => new DateTime),
            array('id'=>2,  'name'=>'Cafe', 'created_at' => new DateTime, 'updated_at' => new DateTime),
            array('id'=>3,  'name'=>'Housekeeping', 'created_at' => new DateTime, 'updated_at' => new DateTime),
            array('id'=>4,  'name'=>'IT', 'created_at' => new DateTime, 'updated_at' => new DateTime),
            array('id'=>5,  'name'=>'Kitchen', 'created_at' => new DateTime, 'updated_at' => new DateTime),
            array('id'=>6,  'name'=>'Horticulture', 'created_at' => new DateTime, 'updated_at' => new DateTime),
            array('id'=>7,  'name'=>'Maintenance', 'created_at' => new DateTime, 'updated_at' => new DateTime),
            array('id'=>8,  'name'=>'Reception', 'created_at' => new DateTime, 'updated_at' => new DateTime),
            array('id'=>9,  'name'=>'Special Projects', 'created_at' => new DateTime, 'updated_at' => new DateTime),
            array('id'=>10, 'name'=>'New Construction', 'created_at' => new DateTime, 'updated_at' => new DateTime),
        );

		// Uncomment the below to run the seeder
		DB::table('departments')->insert($departments);
	}

}
