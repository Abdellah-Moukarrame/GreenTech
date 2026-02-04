<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('utilasateures')->insert([
            'name'=>'Super Admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('admin@admin.com'),
            'role'=>'admin'
        ]);
    }
}
