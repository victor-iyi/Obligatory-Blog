<?php

class Database {

	private $conn;
	public $status;
	private $e = null;

	public function __construct($name, $username, $password) {
		try {
			$this->conn = new PDO('mysql:host=localhost;dbname='.$name.';charset=utf8', $username, $password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->status = true;
		} catch ( PDOException $e ) {
			$this->e = $e;
			$this->status = false;
		}
	}

	public function query($query, $bindings=false) {
		$stmt = $this->conn->prepare($query);
		if ( $bindings ) $stmt->execute($bindings);
		else $stmt->execute();
		return $stmt;
	}

	public function select($query, $bindings=false) {
		$stmt = $this->query($query, $bindings);
		$result = $stmt->fetchAll();
		return $result ? $result : false;
	}

	public function getById($tableName, $id) {
		return $this->select("SELECT * FROM {$tableName} WHERE id = :id LIMIT 1", ['id' => $id])[0];
	}

	public function statusMessage() {
		return $this->status ? 'Successful' : $this->e;
	}

}
