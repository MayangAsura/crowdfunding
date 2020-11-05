<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('roles')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'name' => 'guest',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
