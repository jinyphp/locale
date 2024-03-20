<?php
namespace Jiny\Locale\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Language extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->outputMessage("Language Seeding started...");

        // Your seeding logic here

        //$this->outputMessage("Seeding completed.");
    }

    private function outputMessage($message)
    {
        $this->command->getOutput()->writeln("<info>$message</info>");
    }
}
