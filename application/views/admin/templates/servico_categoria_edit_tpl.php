<?php 
foreach ($listCategory as $value) {
	$id		= $value->id;
	$nome	= $value->nome;
}

?>
<h4 class="titleBack"><center>Alterar Categoria de serviço</center></h4>
<br />
<span id="erro"><?php echo validation_errors();  ?></span>
<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
<?php  echo form_open('admin/servico/updateServiceCategory/'.$id);   ?>

Nome :  <input type="text" name="nameCategory"	placeholder="Altere o nome da categoria" class="inputSize" value="<?php echo $nome; ?>"/> <br />
<button class="btn"> Alterar </button>



<?php echo form_close(); ?>