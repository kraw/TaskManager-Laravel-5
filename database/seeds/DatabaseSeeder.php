<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Task;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Model::unguard();
		$this->call('TaskTableSeeder');

        $this->command->info('User table seeded!');

		// $this->call('UserTableSeeder');
	}

}
class TaskTableSeeder extends Seeder {

    public function run()
    {
        Task::create(
        	array(
        	'user_id' => '6',
        	'content' => 'This is the content 1'
        	)
        );
        Task::create(
        	array(
        	'user_id' => '6',
        	'content' => 'This is the content 2'
        	)
        );
        Task::create(
        	array(
        	'user_id' => '6',
        	'content' => 'This is the content 3'
        	)
        );
        Task::create(
        	array(
        	'user_id' => '6',
        	'content' => 'This is the content 4'
        	)
        );
        Task::create(
        	array(
        	'user_id' => '6',
        	'content' => 'This is the content 5'
        	)
        );
        Task::create(
        	array(
        	'user_id' => '6',
        	'content' => 'This is the content 6'
        	)
        );
    }

}
