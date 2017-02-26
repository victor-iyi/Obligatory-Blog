<?php namespace Blog\Helper\DB;

require $_SERVER['DOCUMENT_ROOT'].'/test/hands-on-project/obligatory-blog/configurations/db_config.php';

function connect() {
	try {
		$conn = new \PDO('mysql:host=localhost;dbname='.DB_NAME.';charset=utf8',
								DB_USERNAME, DB_PASSWORD);
		$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		return $conn;
	} catch ( \PDOException $e ) {
		return false;
	}
}

function insert($conn, $query, $bindings) {
	$insert = $conn->prepare($query);
	$insert->execute($bindings);
	return $insert;
}

function query($conn, $query, $bindings=false) {
	try {
		if ( $bindings ) {
			$stmt = $conn->prepare($query);
			$stmt->execute($bindings);
			$results = $stmt->fetchAll();
		} else {
			$stmt = $conn->query($query);
			$results = [];
			foreach ( $stmt as $row ) array_push($results, $row);
		}
		return $results ? $results : false;
	} catch ( \Exception $e ) {
		return false;
	}
}
// comment
function get_table_data($tableName, $conn, $limit=10) {
	return query($conn, "SELECT * FROM {$tableName} ORDER BY id DESC LIMIT {$limit}");
}

function get_data_by_id($tableName, $id, $conn) {
	$bindings = ['id' => $id];
	return query($conn, "SELECT * FROM {$tableName} WHERE id = :id LIMIT 1", $bindings);
}