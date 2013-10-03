<h4 class="titleBack"><center>Cadastrar Produto</center></h4>
<br />
<span id="erro"><?php echo validation_errors();  ?></span>
<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
<?php  echo form_open_multipart('admin/produto/insertProduct/');   ?>

Nome do Produto :  <input type="text" name="nameProduct"	placeholder="Digite o nome do produto" class="inputSize" value="<?php echo set_value('nameProduct'); ?>"/> <br />
Título do Produto :  <input type="text" name="titleProduct"	placeholder="Digite o título do produto" class="inputSize" value="<?php echo set_value('titleProduct'); ?>"/><br />
Imagem do Produto : <input type="file" name="userfile" id="userfile"><br />
Descrição do produto : <textarea id="descricao" name="description"> <?php echo set_value('description'); ?> </textarea><br />
Categoria do Produto : 

<select name="nameCategory">
  <option value="">Selecione uma categoria</option>
  <?php foreach ($listCategory as $value) { ?>
  	<option value="<?php echo $value->id; ?>"> <?php echo $value->nome; ?> </option>		
 <?php } ?>
</select>
<br />

<button class="btn"> Cadastrar </button>


<?php echo form_close(); ?>