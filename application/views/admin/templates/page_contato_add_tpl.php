<h4 class="titleBack"><center>Cadastrar Página de Contato</center></h4>
<br />
<span id="erro"><?php echo validation_errors();  ?></span>
<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
<?php  echo form_open('admin/page_contato/insertContato/');   ?>

Título 	  : <input type="text" name="title" placeholder="Digite o título da página" value="<?php echo set_value('title'); ?>" /><br />
Conteúdo  :<textarea id="descricao" name="content" style="width: 600px;margin-left: 9px;"> <?php echo set_value('content'); ?> </textarea><br />
Mapa  	  :<textarea id="mapa" name="map" style="width: 600px;margin-left: 9px;"> <?php echo set_value('map'); ?> </textarea><br />
E-mail da Empresa  :<input type="text" name="email" placeholder="Digite o e-mail da empresa" value="<?php echo set_value('email'); ?>" /><br />
<button class="btn"> Cadastrar </button>
<br />
<?php echo form_close(); ?>