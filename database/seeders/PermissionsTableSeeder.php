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
                'title' => 'content_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 29,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 30,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 31,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 32,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 92,
                'title' => 'course_create',
            ],
            [
                'id'    => 93,
                'title' => 'course_edit',
            ],
            [
                'id'    => 94,
                'title' => 'course_show',
            ],
            [
                'id'    => 95,
                'title' => 'course_delete',
            ],
            [
                'id'    => 96,
                'title' => 'course_access',
            ],
            [
                'id'    => 97,
                'title' => 'lesson_create',
            ],
            [
                'id'    => 98,
                'title' => 'lesson_edit',
            ],
            [
                'id'    => 99,
                'title' => 'lesson_show',
            ],
            [
                'id'    => 100,
                'title' => 'lesson_delete',
            ],
            [
                'id'    => 101,
                'title' => 'lesson_access',
            ],
            [
                'id'    => 102,
                'title' => 'test_create',
            ],
            [
                'id'    => 103,
                'title' => 'test_edit',
            ],
            [
                'id'    => 104,
                'title' => 'test_show',
            ],
            [
                'id'    => 105,
                'title' => 'test_delete',
            ],
            [
                'id'    => 106,
                'title' => 'test_access',
            ],
            [
                'id'    => 107,
                'title' => 'question_create',
            ],
            [
                'id'    => 108,
                'title' => 'question_edit',
            ],
            [
                'id'    => 109,
                'title' => 'question_show',
            ],
            [
                'id'    => 110,
                'title' => 'question_delete',
            ],
            [
                'id'    => 111,
                'title' => 'question_access',
            ],
            [
                'id'    => 112,
                'title' => 'question_option_create',
            ],
            [
                'id'    => 113,
                'title' => 'question_option_edit',
            ],
            [
                'id'    => 114,
                'title' => 'question_option_show',
            ],
            [
                'id'    => 115,
                'title' => 'question_option_delete',
            ],
            [
                'id'    => 116,
                'title' => 'question_option_access',
            ],
            [
                'id'    => 117,
                'title' => 'test_result_create',
            ],
            [
                'id'    => 118,
                'title' => 'test_result_edit',
            ],
            [
                'id'    => 119,
                'title' => 'test_result_show',
            ],
            [
                'id'    => 120,
                'title' => 'test_result_delete',
            ],
            [
                'id'    => 121,
                'title' => 'test_result_access',
            ],
            [
                'id'    => 122,
                'title' => 'test_answer_create',
            ],
            [
                'id'    => 123,
                'title' => 'test_answer_edit',
            ],
            [
                'id'    => 124,
                'title' => 'test_answer_show',
            ],
            [
                'id'    => 125,
                'title' => 'test_answer_delete',
            ],
            [
                'id'    => 126,
                'title' => 'test_answer_access',
            ],
            [
                'id'    => 127,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 128,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 129,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 130,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 131,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 132,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 133,
                'title' => 'course_category_create',
            ],
            [
                'id'    => 134,
                'title' => 'course_category_edit',
            ],
            [
                'id'    => 135,
                'title' => 'course_category_show',
            ],
            [
                'id'    => 136,
                'title' => 'course_category_delete',
            ],
            [
                'id'    => 137,
                'title' => 'course_category_access',
            ],
            [
                'id'    => 138,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
