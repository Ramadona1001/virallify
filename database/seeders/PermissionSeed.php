<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'show_price_lists']);
        Permission::create(['name' => 'create_price_lists']);
        Permission::create(['name' => 'update_price_lists']);
        Permission::create(['name' => 'delete_price_lists']);
         Permission::create(['name' => 'show_users']);
         Permission::create(['name' => 'create_users']);
         Permission::create(['name' => 'update_users']);
         Permission::create(['name' => 'delete_users']);
         Permission::create(['name' => 'show_roles']);
         Permission::create(['name' => 'create_roles']);
         Permission::create(['name' => 'update_roles']);
         Permission::create(['name' => 'delete_roles']);
         Permission::create(['name' => 'show_permissions']);
         Permission::create(['name' => 'assign_permissions']);
         Permission::create(['name' => 'show_blogs']);
         Permission::create(['name' => 'create_blogs']);
         Permission::create(['name' => 'update_blogs']);
         Permission::create(['name' => 'delete_blogs']);
         Permission::create(['name' => 'show_pages']);
         Permission::create(['name' => 'create_pages']);
         Permission::create(['name' => 'update_pages']);
         Permission::create(['name' => 'delete_pages']);
         Permission::create(['name' => 'show_settings']);
         Permission::create(['name' => 'save_settings']);
         Permission::create(['name' => 'show_social_media']);
         Permission::create(['name' => 'create_social_media']);
         Permission::create(['name' => 'update_social_media']);
         Permission::create(['name' => 'delete_social_media']);
         Permission::create(['name' => 'create_testimonials']);
         Permission::create(['name' => 'show_testimonials']);
         Permission::create(['name' => 'update_testimonials']);
         Permission::create(['name' => 'delete_testimonials']);
    }
}
