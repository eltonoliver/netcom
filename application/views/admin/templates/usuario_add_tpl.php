<h4 class="titleBack"><center>Cadastrar usuário</center></h4>
<br />
<span id="erro"><?php echo validation_errors();  ?></span>
<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
<?php  echo form_open('admin/usuario/insert/');   ?>

Nome :  <input type="text" name="nameUser"	placeholder="Digite seu nome" class="inputSize"/> <br />
Login :&nbsp; <input type="text" name="loginUser" placeholder="Digite seu login" class="inputSize"/> <br />
Senha : <input type="password" name="passUser" placeholder="Digite sua senha" class="inputSize"/> <br />
<button class="btn"> Cadastrar </button>



<?php echo form_close(); ?>