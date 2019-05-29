<?php

use Illuminate\Database\Seeder;
use \App\Models\Type;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'integer', 'string', 'array'
        ];

        foreach ($types as $type) {
            Type::firstOrCreate(['name' => $type]);
        }
    }
}
