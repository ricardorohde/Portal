<?php 
//conexão com banco
include_once 'database.class.php';
//classe portal e suas variáveis
class Portal{
	private $idPortal = "";
	public $nomePortal = "";
	public $site = "";
	public $email = "";

    //retorna os portais
	public function getAll(){
		$banco = new Database();
		$consulta = $banco->db->query("SELECT * FROM portal ORDER BY nome_portal");
		$portais = array();
		while($resultado = $consulta->fetch()){
			$portais[] = $resultado;
		}			
		return $portais;
	}
    //retorna o portail pelo id
	public function getById($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM portal WHERE id_portal=?");
		$consulta->execute(array($id));

		return $resultado = $consulta->fetch();	
	}
    //salva o objeto
	public function save(){
		$banco = new Database();
		$consulta = $banco->db->prepare("INSERT INTO portal (nome_portal, site, email) VALUES (?, ?, ?)");
		$consulta->execute(array($this->nomePortal, $this->site, $this->email));

		return $resultado = $consulta->fetch();

		}
    //carrega o objeto pelo id
	public function get($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT * FROM portal WHERE id_portal=?");
		$consulta->execute(array($id));
		$resultado = $consulta->fetch();

		$this->idPortal = $resultado['id_portal'];
		$this->nomePortal = $resultado['nome_portal'];
		$this->site = $resultado['site'];
		$this->email = $resultado['email'];	
	}
    //atualiza objeto
	public function update(){
		$banco = new Database();
		$consulta = $banco->db->prepare("UPDATE portal SET nome_portal=?, site=?, email=? WHERE id_portal=?");
		$consulta->execute(array($this->nomePortal, $this->site, $this->email, $this->idPortal));

		return $resultado = $consulta->fetch();
		
		
	}
    //exclui o objeto pelo seu id
	public function delete($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("DELETE FROM portal WHERE id_portal=?");
		$consulta->execute(array($id));

		return true;		
	}
    //retorna nome do portal pelo seu id
	public static function getName($id){
		$banco = new Database();
		$consulta = $banco->db->prepare("SELECT nome_portal FROM portal WHERE id_portal=?");
		$consulta->execute(array($id));
		$resultado = $consulta->fetch();

		return $resultado[0];
	}
}

?>