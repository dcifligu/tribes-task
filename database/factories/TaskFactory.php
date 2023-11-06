<?php
namespace Database\Factories;

use App\Models\Task;
use App\Models\Tag; // Make sure to import the Tag model
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['Open', 'In Progress', 'In Review', 'Accepted', 'Rejected', 'Pending']),
            'owner_id' => rand(1, 2),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Task $task) {
            // Get a random number of tags to attach (you can adjust the range as needed)
            $tagCount = rand(1, 5);

            // Get random tags from the Tag model and attach them to the task
            $tags = Tag::inRandomOrder()->take($tagCount)->get();
            $task->tags()->attach($tags);
        });
    }
}
