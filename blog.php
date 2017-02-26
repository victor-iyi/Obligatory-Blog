<?php

// automatically loads in needed classes.
spl_autoload_register(function($class) { require "classes/{$class}.php"; });

require 'configurations/db_config.php';
require 'helper/functions.php';

$db = new Database(DB_NAME, DB_USERNAME, DB_PASSWORD);
if ( !$db->status ) die($db->statusMessage());
