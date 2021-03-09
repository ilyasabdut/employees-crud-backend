<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            [
                'code' => "SA",
                'name' => 'System Analyst',
                'is_delete' => 0,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => "BPS",
                'name' => 'BPS',
                'is_delete' => 0,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => "PRG",
                'name' => 'Programmer',
                'is_delete' => 0,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => "Test",
                'name' => 'Tester',
                'is_delete' => 0,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => "Help",
                'name' => 'Helpdesk',
                'is_delete' => 0,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],

        ];

        \DB::table('positions')->insert($positions);

    }
}
