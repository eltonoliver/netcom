  
<?php 

    foreach ($listEmpresa as $value) {
        
        $title      = $value->titulo;
        $content   = $value->texto;
    }


 ?>
   <!-- start main -->
    <div id="main">
    	<!-- start main wrap -->
        <div class="main-wrap">
        	<div class="clear20"></div>
            
            <div class="separator">
                <h4><?php echo $title; ?></h4>
                <div class="sep_line"></div><!-- separator line -->
            </div>
            
            <div class="clear20"></div>
            
            <!-- start about-us  -->
            <div class="outerTwoThirds" style="width: 800px;text-align: justify;">
               
                <p class="text"> <?php echo $content; ?> </p>
            </div>
            
           
                    
            <div class="dash-line"></div>

           
            <div class="clear20"></div>

    	</div><!-- end main wrap-->
    </div><!-- end main-->