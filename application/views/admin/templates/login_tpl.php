<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Netcom Am- Bem vindo! </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
        <!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
        <!--script src="js/less-1.3.3.min.js"></script-->
        <!--append ‘#!watch’ to the browser URL, then refresh the page. -->

        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/style_boot.css" rel="stylesheet">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() ?>assets/img/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() ?>assets/img/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() ?>assets/img/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>assets/img/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon.png">


    </head>
    <body>
        
  
<span id="erro"><?php echo validation_errors();  ?></span>
<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
<div class="container">
    

    <div class="row">
        <div class="span12">
            

<!-- -->
<div class="row" >
                <div class="span12">
                    <div class="formLogin">
                    	<h4><center> Área Administrativa </center> </h4>
                    	<br>
                        <?php echo form_open('admin/login/validaLogin/'); ?>

                        <div class="control-group">
                            <label class="control-label" for="inputLogin">Login :&nbsp;             
                                <input type="text" id="inputLogin" name="inputLogin" placeholder="Login">
                
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputSenha">Senha :
             
                                <input type="password" id="inputSenha" name="inputSenha" placeholder="Senha">
                
                        </div>
                        <button type="submit" class="btn btn-primary widthBtnLogin" >Entrar</button>




                        <?php echo form_close(); ?>
                    </div>
                    <span class="label"></span>
                </div>
            </div>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/scripts.js"></script>
    </body>
</html>            