<h4 class="titleBack"><center>Cadastrar Página Empresa</center></h4>
<br />
<span id="erro"><?php echo validation_errors();  ?></span>
<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
<?php  echo form_open('admin/page_empresa/insertEmpresa/');   ?>

Título : <input type="text" name="title" placeholder="Digite o título da página" value="<?php echo set_value('title'); ?>" /><br />
Conteúdo  :<textarea id="descricao" name="content" style="width: 600px;margin-left: 9px;"> <?php echo set_value('content'); ?> </textarea><br />

<button class="btn"> Cadastrar </button>
<?php echo form_close(); ?>