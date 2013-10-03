<h4 class="titleBack"><center>Cadastrar Banner</center></h4>
<br />
<span id="erro"><?php echo validation_errors();  ?></span>
<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
<?php  echo form_open_multipart('admin/banner/insertBanner/');   ?>


Imagem do Banner : <input type="file" name="userfile" id="userfile"><br />
Legenda do Banner : <textarea id="descricao" name="legend"> <?php echo set_value('legend'); ?> </textarea><br />

<br />

<button class="btn"> Cadastrar </button>


<?php echo form_close(); ?>