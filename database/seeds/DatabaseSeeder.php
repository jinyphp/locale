<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->outputMessage("Main Seeds");

        // Retrieve the seed class name from the service provider
        $seedClass = app('seed_locale_to_run');

        // Call the run() method of the retrieved seed class
        $this->call($seedClass);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

    private function outputMessage($message)
    {
        $this->command->getOutput()->writeln("<info>$message</info>");
    }
}
