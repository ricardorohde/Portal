<?php 
//classe comentário
include 'classes/comentarios.class.php';
//Verifica se a requisição
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// objeto comentarios
	$comentario = new Comentarios();	
	$comentario->idNoticia = $_POST['id_noticia'];
	$comentario->email = $_POST['email'];
	$comentario->comentario = $_POST['comentario'];
	//Salva novo comentário 
	$comentario->save();

	//Redireciona para página de notícia anterior
	$url = "Location: noticia.php?id=".$_POST['id_noticia'];
	header($url);

}else{
	//Redireciona para index
	header('Location: index.php');
}

?>