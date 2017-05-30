<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TasksTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function task_should_be_assignable_to_a_user()
    {
        $user = factory(App\User::class)->create();
	$this->actingAs($user);

	$task = factory(App\Task::class)->create();

	$user->tasks()->attach($task);

	$this->assertEquals($user->tasks->first()->name, $task->name);
    }
}