<?php
return [
    [
        'id' => 1, 'name' => '用户管理','href' => '/backend/user',
        'sub' => [
            ['id' => 11, 'name' => '列表','href' => '/backend/user'],
            ['id' => 12, 'name' => '添加','href' => '/backend/user/create']
        ],
    ],
    [
        'id' => 2, 'name' => '商品管理','href' => '/backend/goods',
        'sub' => [
            ['id' => 21, 'name' => '列表','href' => '/backend/goods'],
            ['id' => 22, 'name' => '添加商品','href' => '/backend/goods/create']
        ],
    ],
];