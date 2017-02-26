<?php

require 'blog.php';
use Blog\Helper\FUNCS;

$posts = $db->select("SELECT * FROM posts ORDER BY id DESC LIMIT 10");

if ( $posts ) FUNCS\view('index', array('posts'=>$posts));
else FUNCS\view('index', array('no_post' => 'Oops. There are no posts yet.'));