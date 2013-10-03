<?php 

foreach ($listContato as $value) {
    

    $titulo     = $value->titulo;
    $conteudo   = $value->conteudo;
    $mapa       = $value->mapa;
}


 ?>
            <!-- start main contact-us --> 
            
                <div class="separator">
                    <h4><?php echo $titulo; ?></h4>
                    <div class="sep_line"></div><!-- separator line -->
                </div>
                
                <div class="clear20"></div>
                
                <div class="outerOneThird">
                <p><?php echo $conteudo; ?></p>
                </div>
                
                <div class="outerTwoThirds last">
                   <div id="map"> 

                       <?php echo $mapa; ?>

                   </div>
                <span class="shadowHolderflat"><img src="<?php echo base_url()?>assets/images/big-shadow4.png" alt=""></span>
                </div>
                
                <div class="clear40"></div>
                
                <div class="separator">
                    <h4>Formulário de Contato</h4>
                    <div class="sep_line"></div><!-- separator line -->
                </div>
                <span id="msg"><?php echo "<br>".$this->session->flashdata('resposta');?></span>
                <div class="clear20"></div>
                
                <div class="outerThreeFourths">
                    <div id="respon">
                                
                        <form action="<?php echo base_url(); ?>email/enviarEmail/" method="post" id="commentform">    
            
                            <label for="author">
                                Nome:  *                    </label>
                            <input type="text" name="author" id="author" value="" size="22" tabindex="1" class="nameInput">
                            
                            <label for="email">
                                E-mail:  *                   </label>
                            <input type="text" name="email" id="email" value="" size="22" tabindex="2" class="emailInput">  
                            
                            <label for="url">
                                Assunto:                    </label>
                            <input type="text" name="subject" id="url" value="" size="22" tabindex="3" class="webInput">
                            
                            <label for="comment">
                                Mensagem:                   </label>
                            <textarea name="comment" id="comment" tabindex="4" class="messageInput"></textarea>
                            <br>
                            
                            <input name="submit" type="submit" id="submit" tabindex="5" value="Enviar Mensagem">
                            
                        </form>
                                
                    </div>
                </div>
                
                <div class="outerOneFifth last">
                   
                
            </div><!-- end main contact-us -->