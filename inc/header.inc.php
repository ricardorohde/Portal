<!--início Cabecalho-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" "#">Portal TSI</a>

    </div>
    <div class="fr">
      <div class="block_languages">
        <div class="clearboth"></div>
      </div>

      <form role="form" action="search.php" method="POST">
        <div class="form-group col-sm-12">
          <input type="text" class="form-control" name="word" placeholder="BUSCAR">
        </div>
      </form>
    </div>    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
       <li><a href="painel/cadastro_portais.php">Cadastro de Portais</a></li>
       <li><a href="painel/cadastro_noticias.php">Cadastro de Notícias</a></li>
       <li><a href="importa_xml.php">Importar Noticias XML</a></li>       

     </div>
   </div>
 </nav>
<!--fim Cabecalho-->

