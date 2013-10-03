<h4 class="titleBack"><center>Cadastrar Página Home</center></h4>
<br />
<span id="erro"><?php echo validation_errors();  ?></span>
<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
<?php  echo form_open('admin/page_home/insertHome/');   ?>

Mensagem : <textarea  name="message" style="width: 600px;margin-left: 70px;"> <?php echo set_value('message'); ?> </textarea><br />
Mensagem do rodapé :<textarea  name="message_footer" style="width: 600px;margin-left: 9px;"> <?php echo set_value('message_footer'); ?> </textarea><br />
Descrição de serviço :<textarea  name="service_description" style="width: 600px;margin-left: 11px;"> <?php echo set_value('service_description'); ?> </textarea><br />
Descrição de parceiro :<textarea  name="partner_description" style="width: 600px;margin-left: 11px;"> <?php echo set_value('partner_description'); ?> </textarea><br />
Descrição de produto :<textarea  name="product_description" style="width: 600px;margin-left: 11px;"> <?php echo set_value('product_description'); ?> </textarea><br />
<button class="btn"> Cadastrar </button>
<?php echo form_close(); ?>