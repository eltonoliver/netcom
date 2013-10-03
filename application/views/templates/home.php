 <?php 

        foreach ($listHome as  $value) {
            
            $mensagem       = $value->mensagem;
            $desc_servico   = $value->desc_servico;
            $desc_parceiro  = $value->desc_parceiro;
            $desc_produto  = $value->desc_produto;
        }


  ?>

 <div class="sep_lines"></div><!-- separator line -->
 <!-- start promo box -->
            <div class="promo-box">

                <p><?php echo $mensagem; ?></p>      
            

            </div><!-- end promo box -->
            
            <div class="clear20"></div>
            
            <!-- start three columns-->
            <div class="outerOneThird">
                <h3 style="color: red;">Nossos Serviços</h3>
                <p class="subtitle">Conheça nossos serviços</p>
                <p><img src="<?php echo base_url(); ?>assets/images/monitor.png" class="fl" alt=""> <?php echo $desc_servico; ?></p>
            </div>
            <div class="outerOneThird">
                <h3 style="color: red;">Parceiros</h3>
                <p class="subtitle">Conheça nossos parceiros</p>
                <p><img src="<?php echo base_url(); ?>assets/images/monitor.png" class="fl" alt=""><?php echo $desc_parceiro; ?></p>
            </div>
            <div class="outerOneThird last">
                <h3 style="color: red;">Produtos</h3>
                <p class="subtitle" >Conheça nossos produtos</p>
                <p><img src="<?php echo base_url(); ?>assets/images/monitor.png" class="fl" alt=""><?php echo $desc_produto; ?></p>
            </div><!-- end three columns -->
            
            <div class="clear20"></div>
                    
            <div class="separator">
                <h4>Serviços</h4>
                <div class="sep_line"></div><!-- separator line -->
            </div>
            
            <div class="clear20"></div>
            
            
            <!-- start Portofolios-->
            <?php
                $i = 0;
                foreach ($listService as  $value) {

                $id         = $value->id;
                $titulo     = $value->titulo;
                $descricao  = $value->descricao;
                $imagem     = $value->imagem;              
                $i++;
             ?>
              <?php 

                 $thumb = explode('.', $imagem);
                 $thumb = $thumb[0]."_thumb.".$thumb[1];
                 




                ?>     
              
            <div class="outerOneThird <?php if($i == 3){ echo 'last';} ?>">
                <span class="imageWrap">
                    <a href="<?php echo base_url(); ?>assets/images_dinamic/service/<?php echo $thumb; ?>" data-rel="prettyPhoto" >
                        <img src="<?php echo base_url(); ?>assets/images_dinamic/service/<?php echo $imagem; ?>" alt=""><span><span></span></span>
                    </a>           
                </span>
                <span class="shadowHolder"><img src="<?php echo base_url(); ?>assets/images/small-shadow.png" alt=""></span>
                <h3><a href="#" style="color: red;"><?php echo $titulo; ?></a></h3><br>
                <p><?php echo word_limiter($descricao,30); ?></p><br>
               <a class="buttonPro" href="<?php echo base_url(); ?>home/servicoDetalhes/<?php echo $id; ?>" >Leia +</a>
            </div>
           
            <?php } ?>
