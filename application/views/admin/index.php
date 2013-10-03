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
        
        <div class="container">

<div class="container">

    <h4>
         <small><img src="<?php echo base_url(); ?>assets/img/admin.png" alt="painel administrativo"> - Bem vindo , <?php print $this->session->userdata('nome'); ?></small>
    </h4>

    <div class="row">
        <div class="span12">
            
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                         <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> 
                         <a href="<?php echo base_url() ?>admin/home/homeAdmin/" class="brand">Home</a>
                        <div class="nav-collapse collapse navbar-responsive-collapse">
                            <ul class="nav">
                                
                                
                                <li class="dropdown">
                                     <a data-toggle="dropdown" class="dropdown-toggle" href="#">Usuários<strong class="caret"></strong></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/usuario/listUser/">Gerenciar Usuários</a>
                                        </li>
                                        
                                    </ul>

                                </li>
                                <li class="dropdown">
                                     <a data-toggle="dropdown" class="dropdown-toggle" href="#">Produtos<strong class="caret"></strong></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/produto/listCategory/"> Gerenciar Categorias</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/produto/listProduct/"> Gerenciar Produtos</a>
                                        </li>
                                        
                                    </ul>

                                </li>

                                <li class="dropdown">
                                     <a data-toggle="dropdown" class="dropdown-toggle" href="#">Serviços<strong class="caret"></strong></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/servico/listServiceCategory/"> Gerenciar Categorias</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/servico/listService/"> Gerenciar Serviços</a>
                                        </li>
                                        
                                    </ul>

                                </li>
                                <li class="dropdown">
                                     <a data-toggle="dropdown" class="dropdown-toggle" href="#">Banner<strong class="caret"></strong></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/banner/listBanner/"> Gerenciar Banner</a>
                                        </li>
                                        
                                    </ul>

                                </li>
                                <li class="dropdown">
                                     <a data-toggle="dropdown" class="dropdown-toggle" href="#">Páginas<strong class="caret"></strong></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/page_home/listHome/"> Home</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/page_empresa/listEmpresa/"> A Empresa</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/page_contato/listContato/">Contato</a>
                                        </li>
                                        <!-- <li>
                                            <a href="#"> Compre Aqui</a>
                                        </li> -->
                                        
                                        
                                    </ul>

                                </li>


<!-- 
                                <li class="dropdown">
                                     <a data-toggle="dropdown" class="dropdown-toggle" href="#">Redes Sociais<strong class="caret"></strong></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#"> Gerenciar Redes</a>
                                        </li>
                                        
                                        
                                    </ul>

                                </li> -->
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/login/logout/">Sair</a>
                                </li>


                            </ul>
                            
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
            <?php echo $contents; ?>
    </div>        
        </div>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/tinymce_editor/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: "textarea",
                language: "pt_BR", 
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        </script>
        
    </body>
</html>