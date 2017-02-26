<?php namespace Blog\Helper\FUNCS;

function pp($arr) {
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}

function view($path, $data=null) {
	if ( $data ) extract($data);
	$path = $path . '.view.php';
	require $_SERVER['DOCUMENT_ROOT'].'/test/hands-on-project/obligatory-blog/views/layout.php';
}

function old($name) {
	return ( isset($_REQUEST[$name]) && !empty($_REQUEST[$name]) ) ?
				htmlspecialchars($_REQUEST[$name]) : '';
}