<h4 class="titleBack"><center>Cadastrar categoria de serviços</center></h4>
<br />
<span id="erro"><?php echo validation_errors();  ?></span>
<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
<?php  echo form_open('admin/servico/insertServiceCategory/');   ?>

Nome da categoria :  <input type="text" name="nameCategory"	placeholder="Digite o nome da categoria" class="inputSize"/> <br />
<button class="btn"> Cadastrar </button>

<?php echo form_close(); ?>