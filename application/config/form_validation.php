<?php

$config =  
[
    'admin_login_rules' =>
    [
        [
            'field'=>'username',
            'label'=>'User Name',
            'rules'=>'required'
        ],
        [
            'field'=>'password',
            'label'=>'Password',
            'rules'=>'required'
        ]    
    ],

    'add_article_rules' =>
    [
        [
            'field'=>'article_title',
            'label'=>'Article Title',
            'rules'=>'required'
        ],
        [
            'field'=>'article_body',
            'label'=>'Article body',
            'rules'=>'required'
        ]    
    ],

    'user_register_rules'=>
    [
        [
            'field'=>'username',
            'label'=>'User Name',
            'rules'=>'required|is_unique[users.username]'
        ],
        [
            'field'=>'password',
            'label'=>'Password',
            'rules'=>'required|max_length[12]'
        ],
        [
            'field'=>'firstname',
            'label'=>'First Name',
            'rules'=>'required|alpha'
        ],
        [
            'field'=>'lastname',
            'label'=>'Last Name',
            'rules'=>'required|alpha'
        ],
        [
            'field'=>'email',
            'label'=>'Email',
            'rules'=>'required|valid_email|is_unique[users.email]'
        ]
    ]
];

?>