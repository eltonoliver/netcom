<?php 

    
    foreach ($listService as  $value) {
        
        $nome       = $value->nome;
        $descricao  = $value->descricao;
        $imagem     = $value->imagem;

    }



 ?>

<div id="main">
    	<!-- start main wrap -->
        <div class="main-wrap">
        	<div class="clear20"></div>
            
            <div class="separator">
                <h4 class="titleBack"><strong>Detalhes do Serviço </strong> - <?php echo $nome;  ?></h4>
                <div class="sep_line"></div><!-- separator line -->
            </div>
            
            <div class="clear20"></div>

              <div class="outerOneThird">
                <span class="imageWrap">
                    <img src="<?php echo base_url(); ?>assets/images_dinamic/service/<?php echo $imagem; ?>" alt="<?php echo $nome; ?>">
                </span>
                <span class="shadowHolder"><img src="<?php echo base_url(); ?>assets/images/big-shadow5.png" alt=""></span>
            </div>
            
            <!-- start about-us  -->
            <div class="outerTwoThirds last">
              
                <p class="text">

                        <?php echo $descricao; ?>


                 </p>
            </div>
            
          
                    
            <div class="dash-line"></div>

            
            <div class="clear20"></div>

    	</div><!-- end main wrap-->
    </div><!-- end main-->