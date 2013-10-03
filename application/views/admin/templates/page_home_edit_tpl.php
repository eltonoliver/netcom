<?php 


	foreach ($listHome as $value) {
		$id						= $value->id;
		$message 				= $value->mensagem;
		$message_footer 		= $value->mensagem_rodape;
		$service_description	= $value->desc_servico;
		$partner				= $value->desc_parceiro;
		$product_description	= $value->desc_produto;	
	}

?>


<h4 class="titleBack"><center>Editar Página Home</center></h4>
<br />
<span id="erro"><?php echo validation_errors();  ?></span>
<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
<?php  echo form_open('admin/page_home/updateHome/'.$id);   ?>

Mensagem : <textarea  name="message" style="width: 600px;margin-left: 70px;"> <?php echo $message; ?> </textarea><br />
Mensagem do rodapé :<textarea  name="message_footer" style="width: 600px;margin-left: 9px;"> <?php echo $message_footer; ?> </textarea><br />
Descrição de serviço :<textarea  name="service_description" style="width: 600px;margin-left: 11px;"> <?php echo $service_description; ?> </textarea><br />
Descrição de parceiro :<textarea  name="partner_description" style="width: 600px;margin-left: 11px;"> <?php echo $partner; ?> </textarea><br />
Descrição de produto :<textarea  name="product_description" style="width: 600px;margin-left: 11px;"> <?php echo $product_description; ?> </textarea><br />
<button class="btn"> Editar </button>
<?php echo form_close(); ?>