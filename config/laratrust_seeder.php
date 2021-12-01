<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],

        //AHRIS
        'ahris-admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'ahris-access' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'ahris-benefits' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],


        //DMS
        'dms-admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'dms-uploader' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],


        //HO/Branch

        'div-head' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],

        'div-ass-head' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],

        'dept-heads' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],

        'dept-ass-heads' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],

        'emp' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        
         //Daily Backup Monitoring System

         'db_admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],

        'db_encoder' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],

        'db_monitoring' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],

        //Voting System

        'ictd-admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],

        'elecom-admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],

        'canv-officer' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],

        'branch-officer' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        
        'voting_device' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
