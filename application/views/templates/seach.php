  
<?php 

   /* foreach ($listEmpresa as $value) {
        
        $title      = $value->titulo;
        $content   = $value->texto;
    }*/


 ?>
   <!-- start main -->
    <div id="main">
    	<!-- start main wrap -->
        <div class="main-wrap">
        	<div class="clear20"></div>
            
            <div class="separator">
                <h2>Busca no site</h2>
               
            </div>
            
            <div class="clear20"></div>
            
            <!-- start about-us  -->
            <div class="outerTwoThirds" style="width: 800px;text-align: justify;">
              	
            	
              <?php 
              if(!empty($listaBusca)){
                foreach ($listaBusca as $value) {
                    
                    echo '

                         <div> <h4><a href="'.base_url().'home/produtoDetalhes/'.$value->id.'"> '.$value->titulo.'  </h4>  </div><br>
                              <div>
                                  '.word_limiter($value->descricao,30).'

                              </div> 
                              </a>
                              <br/>
                              </a> 
                         <hr>      


                    ';
                }

               }else{

                    echo "Não foi encontrado resultado pra essa busca!";

               } 


               ?>
             



            </div>
            
           
                    
            

           
            <div class="clear20"></div>

    	</div><!-- end main wrap-->
    
    </div><!-- end main-->