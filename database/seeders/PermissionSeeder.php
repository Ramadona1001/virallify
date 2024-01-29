<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        $permissions = [
            'show_users',
            'update_users',
            'create_users',
            'delete_users',

            'show_roles',
            'update_roles',
            'create_roles',
            'delete_roles',

            'show_permissions',
            'assign_permissions',
            'show_settings',
            'store_settings',

            'create_permissions',
            'update_permissions',
            'delete_permissions',

            'show_clients',
            'update_clients',
            'create_clients',
            'delete_clients',

            'show_employees',
            'update_employees',
            'create_employees',
            'delete_employees',

            'show_vendors',
            'update_vendors',
            'create_vendors',
            'delete_vendors',



            'show_tasks',
            'update_tasks',
            'create_tasks',
            'delete_tasks',


            'show_website_management',
            'show_homepage',


            'show_homepage_slider',
            'update_homepage_slider',
            'create_homepage_slider',
            'delete_homepage_slider',


            'show_homepage_about',
            'update_homepage_about',



            'show_homepage_team',
            'update_homepage_team',
            'create_homepage_team',
            'delete_homepage_team',

            'show_homepage_testimonials',
            'update_homepage_testimonials',
            'create_homepage_testimonials',
            'delete_homepage_testimonials',

            'show_homepage_why_us',
            'update_homepage_why_us',


            'show_homepage_social_media',
            'update_homepage_social_media',
            'create_homepage_social_media',
            'delete_homepage_social_media',


            'show_homepage_footer',
            'update_homepage_footer',





            'show_homepage_footer_links',
            'update_homepage_footer_links',
            'create_homepage_footer_links',
            'delete_homepage_footer_links',


            'show_homepage_faqs',
            'update_homepage_faqs',
            'create_homepage_faqs',
            'delete_homepage_faqs',

            'show_homepage_pages',
            'update_homepage_pages',
            'create_homepage_pages',
            'delete_homepage_pages',











            'show_unit_availabilities',
            'update_unit_availabilities',
            'create_unit_availabilities',
            'delete_unit_availabilities',

            'show_unit_sections',
            'update_unit_sections',
            'create_unit_sections',
            'delete_unit_sections',


            'show_unit_types',
            'update_unit_types',
            'create_unit_types',
            'delete_unit_types',


            'show_expenses_types',
            'update_expenses_types',
            'create_expenses_types',
            'delete_expenses_types',

            'show_revenue_types',
            'update_revenue_types',
            'create_revenue_types',
            'delete_revenue_types',


            'show_task_types',
            'update_task_types',
            'create_task_types',
            'delete_task_types',

            'show_task_levels',
            'update_task_levels',
            'create_task_levels',
            'delete_task_levels',

            'show_task_status',
            'update_task_status',
            'create_task_status',
            'delete_task_status',

            'show_countries',
            'show_cities',

            'show_areas',
            'create_areas',
            'delete_areas',
            'update_areas',

            'show_properties',
            'create_properties',
            'delete_properties',
            'update_properties',

            'update_mobile_settings',

            'show_contact_messages',
            'show_client_types',
            'show_website_settings'


        ];


        foreach ($permissions as $permission){
            Permission::create(['name' => $permission]);
        }



    }
}
