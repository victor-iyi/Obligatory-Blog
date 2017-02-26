<?php
require 'blog.php';
use Blog\Helper\FUNCS;

if ( !isset($_GET['id']) || empty($_GET['id']) ) header("Location: index.php");

$id = (int) $_GET['id'];

$post = $db->getById('posts', $id);
if ( $post ) FUNCS\view('single', ['post' => $post]);
else header("Location: index.php");