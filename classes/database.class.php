<?php
//conexao e configuração do banco
class Database{
	private $database = "portalnoticias";
	private $user = "postgres";
	private $pass = "stavski";
	public  $db = '';
	//faz a conexão
	function __construct(){
		try {
		    return $this->db = new PDO("pgsql:host=localhost dbname={$this->database} user={$this->user} password={$this->pass}");
		} catch (PDOException $e) {
		    print $e->getMessage();
		}
	}

}