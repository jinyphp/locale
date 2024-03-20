<?php
namespace Jiny\Locale\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Country extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->outputMessage("Seeding started...");

        $rows = config("locale.country");
        $country = [];
        foreach($rows as $item) {
            $country []= [
                'code' => $item['code'],
                'name' => $item['ko'],
                'ko' => $item['ko'],
                'en' => $item['en']
            ];
        }
        //dd($country);
        // Your seeding logic here

        DB::table('country')->insert($country);



        $this->outputMessage("Seeding completed.");
    }

    private function outputMessage($message)
    {
        $this->command->getOutput()->writeln("<info>$message</info>");
    }
}
