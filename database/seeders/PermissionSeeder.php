<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage-users',
            'assign-roles',
            'manage-permissions',
            'create-role',
            'edit-role',
            'delete-role',
            'create-product',
            'edit-product',
            'delete-product',
            'manage-stock',
            'view-reports',
            'export-data',
        ];
        foreach ($permissions as $per) {
            DB::table('permissions')->insert([
                "name"=>$per,
                'guard_name' => 'web'
            ]);
        }
    }
}
