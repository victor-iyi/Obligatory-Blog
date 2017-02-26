<?php

require '../blog.php';

$data = [];

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$title = htmlspecialchars(trim($_POST['title']));
	$body = htmlspecialchars(trim($_POST['body']));

	if ( empty($title) || empty($body) ) {
		$data['status'] = 'Please fill out the form.';
	} else {
		$db->query("INSERT INTO posts (title, body) VALUES (:title, :body)", ['title' => $title, 'body' => $body]);
		$data['status'] = 'Successfully inserted';
	}
}

Blog\Helper\FUNCS\view('admin/index', $data);