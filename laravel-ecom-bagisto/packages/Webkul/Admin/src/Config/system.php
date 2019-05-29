<?php

return [
    [
        'key' => 'catalog',
        'name' => 'admin::app.admin.system.catalog',
        'sort' => 1
    ], [
        'key' => 'catalog.products',
        'name' => 'admin::app.admin.system.products',
        'sort' => 1,
    ], [
        'key' => 'catalog.products.review',
        'name' => 'admin::app.admin.system.review',
        'sort' => 1,
        'fields' => [
            [
                'name' => 'guest_review',
                'title' => 'admin::app.admin.system.allow-guest-review',
                'type' => 'boolean'
            ]
        ]
    ], [
        'key' => 'customer',
        'name' => 'admin::app.admin.system.customer',
        'sort' => 3,
    ], [
        'key' => 'customer.settings',
        'name' => 'admin::app.admin.system.settings',
        'sort' => 1,
    ], [
        'key' => 'customer.settings.address',
        'name' => 'admin::app.admin.system.address',
        'sort' => 1,
        'fields' => [
            [
                'name' => 'street_lines',
                'title' => 'admin::app.admin.system.street-lines',
                'type' => 'text',
                'validation' => 'between:1,4',
                'channel_based' => true
            ]
        ]
    ]
];