<?php 

if ($_SERVER['REQUEST_METHOD'] != 'POST') header('Location: index.php');

include 'inc/head.inc.php'; // inclusao do css e js 
include 'classes/noticia.class.php';

$noticia = new Noticia();

$noticias = $noticia->search($_POST['word']);

 ?>

<body>
	<div class="wrapper sticky_footer">
        <?php include 'inc/header.inc.php'; // inclusao do menu de navegacao?>
        <!-- CONTENT BEGIN -->
        <div id="content" class="right_sidebar">
        	<div class="inner">
            	<div class="general_content">
                	<div class="main_content">
                        
                        <div class="block_home_col_1">
                        	<?php  if (count($noticias)): foreach ($noticias as $not): ?>
                        	<div class="block_home_post">
								<div class="pic">
									<a href="noticia.php?id=<?=$not['id_noticia']?>" class="w_hover">
										<img src="imgnoticias/<?=$not['id_noticia']?>.jpg" width="70" height="50" alt="">
										<span></span>
									</a>
								</div>
                                        
								<div class="text">
									<p class="title"><a href="noticia.php?id=<?=$not['id_noticia']?>"><?=$not['gravata']?>...</a></p>
									<div class="date"><p><?=$not['data']?></p></div>
								</div>
							</div>
                            <div class="line_3" style="margin:14px 0px 17px;"></div>
                        <?php endforeach; else:?>  
                        <h2>Nenhum Resultado Encontrado.</h2> 
                        <?php endif; ?>          
                            
                        </div>
                        
                        <!-- <div class="block_home_col_2">
                        	<div class="line_3 first" style="margin:14px 0px 17px;"></div>
	                            <?php foreach ($noticias as $not): ?>
	                        	<div class="block_home_post">
									<div class="pic">
										<a href="news_post.html" class="w_hover">
											<img src="images/pic_home_news_1.jpg" alt="">
											<span></span>
										</a>
									</div>
	                                        
									<div class="text">
										<p class="title"><a href="news_post.html">There are many variations of of available, but the majority.</a></p>
										<div class="date"><p>11 July, 2012</p></div>
									</div>
								</div>
	                            <div class="line_3" style="margin:14px 0px 17px;"></div>
	                        <?php endforeach; ?>  -->
                            
                        </div>
                        
                    </div>

                    <div class="sidebar">                    	
                       <div class="block_newsletter">
                        	<h4>Feed RSS</h4>                            
                            
                                <button href="feed-rss.php" class="button">Assinar</button>
                            
                        </div>
                      <div class="separator" style="height:31px;"></div>
                        
                        <div class="block_popular_posts">
                        	<h4>Todos os Destaques</h4>
                            
                        	<div class="article">
								<div class="pic">
									<a href="#" class="w_hover">
										<img src="images/pic_popular_post_1.jpg" alt="">
										<span></span>
									</a>
								</div>
                                        
								<div class="text">
									<p class="title"><a href="#">Packages and web page editors their default text.</a></p>
									<div class="date"><p>11 July, 2012</p></div>
								</div>
							</div>
							<div class="line_3"></div>
                            
                            <div class="article">
								<div class="pic">
									<a href="#" class="w_hover">
										<img src="images/pic_popular_post_2.jpg" alt="">
										<span></span>
									</a>
								</div>
                                        
								<div class="text">
									<p class="title"><a href="#">Web page editors their default model text, and a search for.</a></p>
									<div class="date"><p>07 July, 2012</p></div>
								</div>
							</div>
							<div class="line_3"></div>
                            
                            <div class="article">
								<div class="pic">
									<a href="#" class="w_hover">
										<img src="images/pic_popular_post_3.jpg" alt="">
										<span></span>
									</a>
								</div>
                                        
								<div class="text">
									<p class="title"><a href="#">Editors their default model text, and a search uncover.</a></p>
									<div class="date"><p>05 July, 2012</p></div>
								</div>
							</div>
							<div class="line_2"></div>
                        </div>
                        
                        <div class="separator" style="height:31px;"></div>
                       
                        
                    </div>
                    
                	<div class="clearboth"></div>
                </div>
            </div>
        </div>
    	<!-- CONTENT END -->

        <?php include 'inc/footer.inc.php'; // inclusao do footer  ?>
    </div>
</body>
</html>