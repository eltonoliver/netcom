<!DOCTYPE HTML>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>NETCOMAM</title>

<!-- Style -->
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/font/stylesheet.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/blueBoxed.css" title="blueBoxed" media="screen">





</head>

<body>
<!-- <div id="switcher_btn"><img src="images/option.png" alt=""></div> -->                   



<div class="wrap">
            <div style="margin:0 auto;border: red 0px solid;width: 900px;">
                <div class="logo" style="position: absolute;margin-top:25px;">
                    <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" width="250px;">

                </div><!-- end logo -->
                  <div id="slog">O Seu Distribuidor INTELBRAS em Manaus</div>
            </div>           
	<div id="headerSlider" <?php  

             $url = $this->uri->segment(2); 
                
               if(empty($url)){

                echo '>';
            }else{ 

                    echo 'style="height: 200px;">';
            }
            ?>

        <div class="menu-wrap">

        	<!-- start menu wrap -->
        	<div class="main-menu-wrap">
            	<!-- start main menu -->
            	<div class="main-menu">  

                	<ul>
                        <li <?php if($this->uri->segment(2) == ""){echo 'class=""'; } ?> ><a href="<?php echo base_url(); ?>">HOME<span>Tela inicial</span></a>
                            
                        </li>
                       
                        <!-- servico -->
                         <li><a href="<?php echo base_url(); ?>home/servico/" >Serviços<span>Nossos serviços</span></a>
                            <ul>
                              <!-- -->

                                <?php 
                                    /*MENU SERVICOS*/
                                    $categoriaServico = $this->db->get('serviceCategory')->result();
                                    foreach ($categoriaServico as $categoria) {
                                                $id = $categoria->id;
                                                echo ' <li class="drop"><a href="#">'.$categoria->nome.'</a>';
                                                         $this->db->where('serviceCategory_id', $id);
                                            $servico   = $this->db->get('service')->result();


                                            if($servico){
                                                echo '<ul>';

                                                    foreach ($servico as  $value) {
                                                        echo '<li><a href="'.base_url().'home/servicoDetalhes/'.$value->id.'">'.$value->nome.'</a></li>';
                                                    }


                                                echo '</ul>';
                                                echo '</li>';

                                            }else{

                                                echo '</li>';
                                            }
                                    }                                  


                                 ?>
                              

                              <!-- -->
                            </ul>
                        </li>
                        <!-- produto -->
                        <li><a href="<?php echo base_url(); ?>home/produto/">Produtos<span>Nossos produtos</span></a>
                            <ul>                               

                                      <?php 
                                    /*MENU PRODUTOS*/
                                    $categoriaProduto = $this->db->get('category')->result();
                                    foreach ($categoriaProduto as $produto) {
                                                $id = $produto->id;
                                                echo ' <li class="drop"><a href="#">'.$produto->nome.'</a>';
                                                         $this->db->where('category_id', $id);
                                            $produto   = $this->db->get('product')->result();


                                            if($produto){
                                                echo '<ul>';

                                                    foreach ($produto as  $value) {
                                                        echo '<li><a href="'.base_url().'home/produtoDetalhes/'.$value->id.'">'.$value->nome.'</a></li>';
                                                    }


                                                echo '</ul>';
                                                echo '</li>';

                                            }else{

                                                echo '</li>';
                                            }
                                    }                                  


                                 ?>

                            </ul>
                        </li>
                         <li><a href="<?php echo base_url(); ?>home/sobre/">Empresa<span>Sobre a empresa.</span></a></li>

                         <li <?php if($this->uri->segment(2) == "contato"){echo 'class=""'; } ?>><a href="<?php echo base_url(); ?>home/contato">Contato<span>Fale conosco</span></a></li>
                              
                	</ul>

                </div><!-- end main menu -->
                
              
            </div><!-- end main menu wrap -->
        </div><!-- end menu wrap -->
        <div id="search-wrap">
            <!-- start searchBar -->
            <div class="search">
                <form class="searchForm" method="post" action="<?php echo base_url(); ?>home/busca/">
                    <input class="searchInput" title="Search" type="text" value="Pesquisar no site..." name="busca">
                    <input class="searchBtn" name="action_results" value="Go" title="Go" type="submit">
                </form>
            </div><!-- end searchBar -->
            
            <!-- start call information -->
             <!--     <div class="call">
                Informações: <br>
                <h2>3233-30000</h2>
            </div> -->

          <!-- start logo -->
          
        </div>
    </div><!-- end header section -->
    
    <div class="clear" style="color: red;background-color: red;"></div>
        
      <div id="main">
        <div class="main-wrap">
        
            <!-- start slider -->
             <?php
                $url = $this->uri->segment(2); 
                
               if(empty($url)){
            ?>
            <div id="slider">      
                <!-- start nivo slider -->
                <div class="slider-wrapper theme-default" >
                    <div id="sliderv" class="nivoSlider">
                        <?php  $banners = $this->db->get('banner')->result();  ?>

                        <?php foreach ($banners as $value){ ?>                            
                      
                             <img src="<?php echo base_url(); ?>assets/images_dinamic/banner/<?php echo $value->imagem ?>" alt="" title="<p><span><b><?php echo strip_tags($value->legenda)."".nbs(3); ?></b> <i></b></span></p>">
                       
                        <?php } ?>

                    </div>
                    <span class="shadowHolderflat"><img src="<?php echo base_url(); ?>assets/images/big-shadow.png" alt=""></span>
                </div>
                <div id="htmlcaption" class="nivo-html-caption">
                    <h4>NETCOM</h4>
                    <p><span>SITE BETA.</span></p>
                </div><!-- end nivo slider -->
            </div><!-- end slider -->
            <?php } ?>            
            
           <?php echo $contents; ?>
        </div><!-- end main wrap -->

    </div><!-- end main -->
    
    <div class="clear20"></div>
         
	<!-- start testimonial -->
    <?php
    $url = $this->uri->segment(2); 
    
   if(empty($url)){
    ?>
   
	<div class="testimonial-wrap">
		<div class="testimonial">
        	<ul>
            	<?php 

                    echo $listHome[0]->mensagem_rodape;


                 ?>
            </ul>
		</div>
	</div>
   <?php } ?>
    <!-- end testimonial -->
    
    <!-- start footer -->
    <div id="footer" class="boxed">
    	<div class="footer-wrap">
        	
            <!-- Pages -->
        	<div class="outerOneFourth" style="margin-right: 120px;">
                <div class="title"><h4>Páginas</h4></div>
                <div class="clear20"></div>
                <ul class="bullet4">
                    <li><p><a href="<?php echo base_url(); ?>">Home</a></p></li>
                    <li><p><a href="<?php echo base_url(); ?>home/contato/">Contato</a></p></li>
                    <li><p><a href="<?php echo base_url(); ?>home/servico/servico/">Serviços</a></p></li>
                 
                </ul>
            </div><!-- end pages -->
            
          
            
           	<!-- about us -->
        	<div class="outerOneFourth" style="margin-right: 120px;">
                <div class="title"><h4>Sobre</h4></div>
                <div class="clear"></div>
                <div id="about-us">
                    <p><img src="<?php echo base_url(); ?>assets/images/building.png" alt="" class="fl"><?php 
                        
                        $dados = $this->db->get('empresa')->result();
                        echo word_limiter($dados[0]->texto,50);

                     ?></p><br>
                    <br>
                    <ul class="socialNav">
                        <li style="margin-left:80px;"><a href="#" title="Facebook"><img src="<?php echo base_url(); ?>assets/images/facebook_icon.png" alt="Facebook"></a></li>
                          <li style="margin-left:10px;"><a href="#" title="Twitter"><img src="<?php echo base_url(); ?>assets/images/twitter_icon.png" alt="Twitter"></a></li>
                     
					</ul>
                </div>
            </div><!-- end about us -->
            
            <!-- contact -->
        	<div class="outerOneFourth last">
                <div class="title"><h4>Contato</h4></div>
                <div class="clear"></div>
                <div id="contactWrap">
                    <form class="contactForm" action="<?php echo base_url(); ?>email/enviarEmailOptional/" method="post">
                        <label>Nome: </label>
                        <input class="nameInput" title="Name" type="text" name="author">
                        <label>E-mail: </label>
                        <input class="emailInput" title="Email Address" type="text" name="email">
                        <label>Mensagem: </label>
                        <textarea class="messageInput" title="Message" class="messageInput"></textarea>
                        <input class="buttonPro submitBtn" value="Enviar Mensagem" type="submit">
                    </form>
                </div>
                <div class="clear"></div>
            </div><!-- end contact -->
            
        </div>
		<div class="clear"></div>
        
        <!-- start post footer -->
        <div class="post-footer">
            <div class="post-footer-wrap">
            <p class="fl">Copyright 2013 Netcomam. Todos os Direitos Reservados</p>
            <p class="fr">
                <a href="<?php echo base_url(); ?>">Home </a>
                <a href="<?php echo base_url(); ?>home/sobre/">Sobre</a> 
             
            </div>
        </div><!-- end post footer -->
    </div><!-- end footer -->
    
</div>
<div class="clear"></div>
<div id="footerShadow" class="boxed boxed"><div class="shadowHolderflat"><img src="<?php echo base_url(); ?>assets/images/big-shadow.png" alt=""></div></div>
<!-- Javascript -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/animatedcollapse.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/input.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/nivoslider.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/slide.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/slides.min.jquery.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.preloader.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.eislideshow.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/swfobject.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.ui.totop.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/styleswitch.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/cookies.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/cssLoader.js"></script>
     
</body>

</html>
