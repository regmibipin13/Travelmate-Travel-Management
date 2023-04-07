<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'slider_create',
            ],
            [
                'id'    => 18,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 19,
                'title' => 'slider_show',
            ],
            [
                'id'    => 20,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 21,
                'title' => 'slider_access',
            ],
            [
                'id'    => 22,
                'title' => 'destination_create',
            ],
            [
                'id'    => 23,
                'title' => 'destination_edit',
            ],
            [
                'id'    => 24,
                'title' => 'destination_show',
            ],
            [
                'id'    => 25,
                'title' => 'destination_delete',
            ],
            [
                'id'    => 26,
                'title' => 'destination_access',
            ],
            [
                'id'    => 27,
                'title' => 'blog_management_access',
            ],
            [
                'id'    => 28,
                'title' => 'post_category_create',
            ],
            [
                'id'    => 29,
                'title' => 'post_category_edit',
            ],
            [
                'id'    => 30,
                'title' => 'post_category_show',
            ],
            [
                'id'    => 31,
                'title' => 'post_category_delete',
            ],
            [
                'id'    => 32,
                'title' => 'post_category_access',
            ],
            [
                'id'    => 33,
                'title' => 'tag_create',
            ],
            [
                'id'    => 34,
                'title' => 'tag_edit',
            ],
            [
                'id'    => 35,
                'title' => 'tag_show',
            ],
            [
                'id'    => 36,
                'title' => 'tag_delete',
            ],
            [
                'id'    => 37,
                'title' => 'tag_access',
            ],
            [
                'id'    => 38,
                'title' => 'post_create',
            ],
            [
                'id'    => 39,
                'title' => 'post_edit',
            ],
            [
                'id'    => 40,
                'title' => 'post_show',
            ],
            [
                'id'    => 41,
                'title' => 'post_delete',
            ],
            [
                'id'    => 42,
                'title' => 'post_access',
            ],
            [
                'id'    => 43,
                'title' => 'packages_management_access',
            ],
            [
                'id'    => 44,
                'title' => 'package_type_create',
            ],
            [
                'id'    => 45,
                'title' => 'package_type_edit',
            ],
            [
                'id'    => 46,
                'title' => 'package_type_show',
            ],
            [
                'id'    => 47,
                'title' => 'package_type_delete',
            ],
            [
                'id'    => 48,
                'title' => 'package_type_access',
            ],
            [
                'id'    => 49,
                'title' => 'package_create',
            ],
            [
                'id'    => 50,
                'title' => 'package_edit',
            ],
            [
                'id'    => 51,
                'title' => 'package_show',
            ],
            [
                'id'    => 52,
                'title' => 'package_delete',
            ],
            [
                'id'    => 53,
                'title' => 'package_access',
            ],
            [
                'id'    => 54,
                'title' => 'package_plan_create',
            ],
            [
                'id'    => 55,
                'title' => 'package_plan_edit',
            ],
            [
                'id'    => 56,
                'title' => 'package_plan_show',
            ],
            [
                'id'    => 57,
                'title' => 'package_plan_delete',
            ],
            [
                'id'    => 58,
                'title' => 'package_plan_access',
            ],
            [
                'id'    => 59,
                'title' => 'booking_create',
            ],
            [
                'id'    => 60,
                'title' => 'booking_edit',
            ],
            [
                'id'    => 61,
                'title' => 'booking_show',
            ],
            [
                'id'    => 62,
                'title' => 'booking_delete',
            ],
            [
                'id'    => 63,
                'title' => 'booking_access',
            ],
            [
                'id'    => 64,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
