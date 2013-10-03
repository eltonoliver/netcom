<div id="main">
    	<!-- start main wrap -->
        <div class="main-wrap">
        
        	<!-- start main portofolio-->
            <div class="portofolio">               
               
                <h3>Serviços</h3>
                <br />
              
                
                <!-- lista servicos -->
                    <?php
                      $i = 0;   
                     foreach ($listService as $value) {  
                     $imagem = $value->imagem;  
                      $i++;  
                    ?>
                    <?php 

                         $thumb = explode('.', $imagem);
                         $thumb = $thumb[0]."_thumb.".$thumb[1];              




                     ?>     
                    
                  
                  <div class="outerOneThird <?php 

                        if($i >= 3){

                            if(($i % 3) == 0){

                                echo "last";
                            }
                        }

                   ?>">
                   <br />
                    <span class="imageWrap">
                        <a href="<?php echo base_url(); ?>assets/images_dinamic/service/<?php echo $thumb; ?>" data-rel="prettyPhoto" >
                            <img src="<?php echo base_url(); ?>assets/images_dinamic/service/<?php echo $imagem; ?>" alt="">
                            <span><span></span></span>
                        </a>
                    </span>
                    <span class="shadowHolder"><img src="<?php echo base_url(); ?>assets/images/big-shadow2.png" alt=""></span>
                    <h3><a href="<?php echo base_url(); ?>home/servicoDetalhes/<?php echo $value->id; ?>"><?php echo $value->nome; ?></a></h3><br>
                    <p><?php echo word_limiter($value->descricao,30); ?></p>
                    <a class="buttonPro" href="<?php echo base_url(); ?>home/servicoDetalhes/<?php echo $value->id; ?>" >Veja +</a>
                  <!--   <a class="buttonPro gray" href="#" >Visit Site</a> -->
                </div>

                    <?php   } ?>
                <!-- fim lista servicos -->
                
               
                
            </div><!-- end main portofolio -->
            
            <div class="dash-line"></div>
            
            <!-- start pages -->
            <div class="pages">

               <ul>
                   <?php echo ($paginacao); ?>
                </ul> 
            </div><!-- end pages -->
            
        </div><!-- end main wrap-->
    </div><!-- end main-->
