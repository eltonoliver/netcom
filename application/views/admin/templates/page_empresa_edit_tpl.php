<?php 

	foreach ($listEmpresa as $value) {
		
		$id    				= $value->id;
		$title				= $value->titulo;
		$content			= $value->texto;	
	}

 ?>

<h4 class="titleBack"><center>Alterar Página Empresa</center></h4>
<br />
<span id="erro"><?php echo validation_errors();  ?></span>
<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
<?php  echo form_open('admin/page_empresa/updateEmpresa/'.$id);   ?>

Título : <input type="text" name="title" placeholder="Digite o título da página" value="<?php echo $title; ?>" /><br />
Conteúdo  :<textarea id="descricao" name="content" style="width: 600px;margin-left: 9px;"> <?php echo $content; ?> </textarea><br />

<button class="btn"> Alterar </button>
<?php echo form_close(); ?>