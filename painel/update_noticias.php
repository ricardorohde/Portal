<?php
// Verifica se id foi passado 
if(!isset($_GET['id'])) header('Location: cadastro_noticias.php');
include '../inc/config.php'; // inclusao das configuracoes
include '../inc/head.pages.inc.php'; // inclusao do css e js
include "../classes/noticia.class.php";
include "../classes/portal.class.php";
//objeto portal
$portal = new Portal();
//array de portais
$portais = $portal->getAll();
//objeto noticia
$noticia = new Noticia();
// Carrega noticia pelo id
$noticia->get($_GET['id']);
// Verifica se a requisição 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Cria variáveis com as informações recebidas via post
    $id_portal = $_POST['portal'];
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $data = $_POST['data'];
    $link = $_POST['link'];
     //Verifica campos vazios
    if($id_portal !="" && $titulo !="" && $conteudo !="" && $data !="" && $link !=""){        
        $noticia->idPortal = $id_portal;
        $noticia->titulo = $titulo;
        $noticia->data = $data;
        $noticia->conteudo = $conteudo;
        $noticia->link = $link;
        // Gera gravata a partir do conteúdo 
        $noticia->gravata = substr($conteudo, 0, 200);
        //Atualiza notícia no banco
        $noticia->update();
        //Verifica se um upload de imagem foi feito
        if (isset($_FILES['imagem'])) {
            //Move imagem para pasta 
             move_uploaded_file($_FILES['imagem']['tmp_name'], "../imgnoticias/".$noticia->idNoticia.".jpg");
        }
        //Redireciona para página de cadastro de notícias
        header('Location: cadastro_noticias.php');

    }else{        
        $msg = "Erro, todos os campos são obrigatórios";
    }
}else{    
    $msg = "";
}

?>
    <body>
        <div class="wrapper sticky_footer">
            <?php include '../inc/header.pages.inc.php'; ?>
            <div id="content" class="">
                <div class="inner">
                    <div class="general_content">
                        <div class="main_content">
                            <p class="general_title"><span>Cadastro - Notíciais</span></p>
                            <div class="separator" style="height:39px;"></div>

                            <div class="block_registration">
                                <form action="" method="POST" class="w_validation" enctype="multipart/form-data">
                                    <div class="col_1">
                                        <div class="form-group">
                                            <label for="sel1">Portal:</label>
                                            <select name="portal" class="form-control" id="sel1">
                                                <?php foreach($portais as $portal): ?>
                                                <option value="<?=$portal['id_portal']?>"
                                                    <?php if($portal['id_portal'] == $noticia->idPortal) echo "selected"?>
                                                    ><?=$portal['nome_portal']?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="usr"><p>Título<span>*</span>: </p></label>
                                            <input type="text" name="titulo" class="form-control" value="<?=$noticia->titulo?>" id="usr">
                                        </div>

                                        <div class="form-group">
                                            <label for="usr"><p>Conteúdo<span>*</span>: </p></label>
                                            <textarea class="form-control" name="conteudo" value="" rows="5" id="comment"><?=$noticia->conteudo?></textarea>
                                        </div>

                                    </div>

                                    <div class="col_2">
                                        <div class="form-group">
                                            <label for="usr"><p>Data<span>*</span>: </p></label>
                                            <input type="date" name="data" class="form-control" value="<?=$noticia->data?>" id="usr">
                                        </div>

                                        <div class="form-group">
                                            <label for="usr"><p>Link<span>*</span>: </p></label>
                                            <input type="url" name="link" class="form-control" value="<?=$noticia->link?>" id="usr">
                                        </div>

                                        <div class="form-group">
                                            <label for="usr"><p>Imagem<span>*</span>: </p></label>
                                            <input type="file" name="imagem" class="form-control" id="usr">
                                        </div>

                                    </div>

                                    <div class="col-md-2 col-md-offset-5" >
                                        <p class="info_text"><input type="submit" class="general_button" value="Atualizar"></p>
                                    </div>
                                </form>
                            </div>

                            <div class="line_3" style="margin:42px 0px 0px;"></div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Inclui Rodapé -->
           <?php include '../inc/footer.pages.inc.php'; ?>
        </div>
    </body>
</html>