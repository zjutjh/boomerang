<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Type::create([
            "name" => "失物招领",
            "icon" => ""
        ]);

        \App\Type::create([
            "name" => "寻物启事",
            "icon" => ""
        ]);

        \App\Type::create([
            "name" => "校园卡招领",
            "icon" => ""
        ]);

    }
}
