<?php
return [
    [
        'id' => 1, 'name' => '用户管理','href' => '/user',
        'sub' => [
            ['id' => 11, 'name' => '列表','href' => '/user'],
            ['id' => 12, 'name' => '添加','href' => '/user/create']
        ],
    ],
    [
        'id' => 2, 'name' => '商品管理','href' => '/goods',
        'sub' => [
            ['id' => 21, 'name' => '列表','href' => '/goods'],
            ['id' => 22, 'name' => '添加商品','href' => '/goods/create']
        ],
    ],
];