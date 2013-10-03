<?php 

foreach ($listProduct as $value) {
	
	$id 			= $value->id;
	$nome 			= $value->nome;
	$titulo 		= $value->titulo;
	$descricao 		= $value->descricao;
	$thumbImagem 	= $value->imagem;
	$idCategory		= $value->category_id;

}
$thumb = explode('.', $thumbImagem);
$thumb = $thumb[0]."_thumb.".$thumb[1];
 ?>
<h4 class="titleBack"><center>Editar Produto</center></h4>
<br />
<span id="erro"><?php echo validation_errors();  ?></span>
<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
<?php  echo form_open_multipart('admin/produto/updateProduct/'.$id);   ?>

Nome do Produto :  <input type="text" name="nameProduct"	placeholder="Alterar o nome do produto" class="inputSize" value="<?php echo $nome ?>"/> <br />
Título do Produto :  <input type="text" name="titleProduct"	placeholder="Alterar o título do produto" class="inputSize" value="<?php echo $titulo; ?>"/><br />
Imagem do Produto : <input type="file" name="userfile" id="userfile"><br />
Imagem cadastrada : <img src="<?php echo base_url(); ?>assets/images_dinamic/product/<?php echo $thumb; ?>" width="60px;" /><br/>
Descrição do produto : <textarea id="descricao" name="description"> <?php echo $descricao; ?> </textarea><br />
Categoria do Produto : 

<select name="nameCategory">
  <option value="">Selecione uma categoria</option>
  <?php foreach ($listCategory as $value) { ?>
  	<option value="<?php echo $value->id; ?>"  <?php if($value->id == $idCategory){ echo 'selected="selected"'; } ?> > <?php echo $value->nome; ?> </option>		
 <?php } ?>
</select>
<br />
<button class="btn"> Alterar </button>


<?php echo form_close(); ?>
