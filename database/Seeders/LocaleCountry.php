<?php
namespace Jiny\Locale\Database\Seeders;

use Illuminate\Database\Seeder;

class LocaleCountry extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->outputMessage("Seeding started...");

        // Your seeding logic here

        $this->outputMessage("Seeding completed.");
    }

    private function outputMessage($message)
    {
        $this->command->getOutput()->writeln("<info>$message</info>");
    }
}
