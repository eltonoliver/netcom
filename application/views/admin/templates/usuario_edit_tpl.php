<?php 
foreach ($usuario as $value) {
	$id   	= $value->id;	
	$nome 	= $value->nome;
	$login	= $value->login;
}

?>
<h4 class="titleBack"><center>Alterar usuário</center></h4>
<br />
<span id="erro"><?php echo validation_errors();  ?></span>
<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
<?php  echo form_open('admin/usuario/update/'.$id);   ?>

Nome :  <input type="text" name="nameUser"	placeholder="Alterar seu nome" class="inputSize" value="<?php echo $nome; ?>"/> <br />
Login :&nbsp; <input type="text" name="loginUser" placeholder="Altere seu login" class="inputSize" value="<?php echo $login; ?>"/> <br />
Senha : <input type="password" name="passUser" placeholder="Altere sua senha" class="inputSize"/> <br />
<button class="btn"> Alterar </button>



<?php echo form_close(); ?>