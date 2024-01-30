<?php

$config =  
[
    'admin_login_rules' =>
    [
        [
            'field'=>'username',
            'label'=>'User Name',
            'rules'=>'required|alpha'
        ],
        [
            'field'=>'password',
            'label'=>'Password',
            'rules'=>'required|max_length[12]'
        ]    
    ],

    'add_article_rules' =>
    [
        [
            'field'=>'article_title',
            'label'=>'Article Title',
            'rules'=>'required|alpha'
        ],
        [
            'field'=>'article_body',
            'label'=>'Article body',
            'rules'=>'required|alpha'
        ]    
    ]
];

?>