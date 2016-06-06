<?php 
//classe notícia
include '../classes/noticia.class.php';
//Verifica se a requisição 
if($_SERVER['REQUEST_METHOD'] == "POST"){
  //Move o xml enviado para a pasta xml
  move_uploaded_file($_FILES['arquivo']['tmp_name'], "xml/noticias.xml");
  //novo objeto
  $doc = new DOMDocument();
  $doc->preserveWhiteSpace=false;
  $doc->formatOutput=true;
  //Carrega o arquivo 
  $doc->load('xml/noticias.xml');

  //array de notícias
  $noticias = $doc->getElementsByTagName( "noticia" );
  //Percorre array
  foreach( $noticias as $noticia )
  {
    //objeto noticia
    $not = new Noticia();
    //Pega informações do xml e adiciona ao objeto notícia
    $not->idPortal = $noticia->getElementsByTagName( "idPortal" )->item(0)->nodeValue;

    $not->titulo = $noticia->getElementsByTagName( "titulo" )->item(0)->nodeValue;

    $not->data = $noticia->getElementsByTagName( "data" )->item(0)->nodeValue;

    $not->conteudo = $noticia->getElementsByTagName( "conteudo" )->item(0)->nodeValue;
    //Cria a gravata a partir do conteúdo
    $not->gravata = substr($noticia->getElementsByTagName( "conteudo" )->item(0)->nodeValue, 0, 200);

    $not->link = $noticia->getElementsByTagName( "link" )->item(0)->nodeValue;
    //Salva a notícia 
    $not->save();

  }
  //página de formulário
  header('Location: importa_xml.php');
  
}else{
  //se não seja requisição por post redireciona para o formulário
  header('Location: importa_xml.php');
}

 