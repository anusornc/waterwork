<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    */

    'backend' => [
        'customers' => [
            'created' => 'ผู้ขอใช้บริการน้ำประปาได้สร้างสำเร็จแล้ว',
            'deleted' => 'ผู้ขอใช้บริการน้ำประปาได้ลบสำเร็จแล้ว',
            'updated' => 'ผู้ขอใช้บริการน้ำประปาได้แก้ไขสำเร็จแล้ว',

            'services' => [
                'created' => 'ผู้ขอใช้บริการน้ำประปาได้ลงทะเบียนบริการสำเร็จแล้ว',
                'deleted' => 'ผู้ขอใช้บริการน้ำประปาได้ลบบริการสำเร็จแล้ว',
                'updated' => 'ผู้ขอใช้บริการน้ำประปาได้แก้ไขบริการสำเร็จแล้ว',
            ],
        ],

        'roles' => [
            'created' => 'บทบาทถูกสร้างสำเร็จแล้ว',
            'deleted' => 'บทบาทถูกลบสำเร็จแล้ว',
            'updated' => 'บทบาทถูกแก้ไขสำเร็จแล้ว',
        ],

        'users' => [
            'confirmation_email'  => 'อีเมลยืนยันตัวตนได้ถูกส่งไปยังปลายทางแล้ว',
            'created'             => 'ผู้ใช้ถูกสร้างสำเร็จแล้ว',
            'deleted'             => 'ผู้ใช้ถูกลบสำเร็จแล้ว',
            'deleted_permanently' => 'ผู้ใช้ถูกลบไปอย่างถาวร',
            'restored'            => 'ผู้ใช้ถูกกู้คืนสำเร็จแล้ว',
            'updated'             => 'ผู้ใช้ถูกแก้ไขสำเร็จแล้ว',
            'updated_password'    => 'รหัสผ่านของผู้ใช้ถูกแก้ไขสำเร็จแล้ว',
        ],
    ],
];
