<?php 
//class noticia
include '../classes/noticia.class.php';
//Verifica se o id foi passado por get
if(isset($_GET['id'])){
	// objeto noticia
	$noticia = new Noticia();
	//Exclui noticia
	$noticia->delete($_GET['id']);
	//Redireciona para página de cadastro de notícias
	header('Location: cadastro_noticias.php');
}else{
	//Redireciona para página de cadastro de notícias caso o id não tenha sido passado
	header('Location: cadastro_noticias.php');
}

?>