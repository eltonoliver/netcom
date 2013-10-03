<h4 class="titleBack"><center>Cadastrar Serviço</center></h4>
<br />
<span id="erro"><?php echo validation_errors();  ?></span>
<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
<?php  echo form_open_multipart('admin/servico/insertService/');   ?>

Nome do Serviço :  <input type="text" name="nameProduct"	placeholder="Digite o nome do serviço" class="inputSize" value="<?php echo set_value('nameProduct'); ?>"/> <br />
Título do Serviço :  <input type="text" name="titleProduct"	placeholder="Digite o título do serviço" class="inputSize" value="<?php echo set_value('titleProduct'); ?>"/><br />
Imagem do Serviço : <input type="file" name="userfile" id="userfile"><br />
Descrição do Serviço : <textarea id="descricao" name="description"> <?php echo set_value('description'); ?> </textarea><br />
Categoria do Serviço : 

<select name="nameCategory">
  <option value="">Selecione uma categoria</option>
  <?php foreach ($listServiceCategory as $value) { ?>
  	<option value="<?php echo $value->id; ?>"> <?php echo $value->nome; ?> </option>		
 <?php } ?>
</select>
<br />

<button class="btn"> Cadastrar </button>


<?php echo form_close(); ?>