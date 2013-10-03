<div class="container">
	<span id="erro"><?php echo validation_errors();  ?></span>
	<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
	<h4 class="titleBack"><center>Produtos</center></h4>
	<div class="row">
		<div class="span12">
			<a href="<?php echo base_url(); ?>admin/produto/addProduct/" rel="Tooltip" title="Adicionar Produto" class="add"> <img src="<?php echo base_url(); ?>assets/img/add.png" alt="add Produto"> </a>
		</div>
	</div>
	
	<div class="row">
		<div class="span12">
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th>
							Cód.
						</th>
						<th>
							Nome
						</th>
						<th>
							Título 
						</th>
						<th>
							Ações
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listProduct as  $value) { ?>
						
					
					<tr class="info">
						<td>
							<?php echo $value->id; ?>
						</td>
						<td>
							<?php echo $value->nome; ?>
						</td>
						<td>
							<?php echo $value->titulo; ?>
						</td>
						<td>
							<a href="<?php echo base_url(); ?>admin/produto/editProduct/<?php echo $value->id; ?>" class="edit" title="Editar Produto" ><i class="icon-pencil"></i></a>  |  
							<a href="<?php echo base_url(); ?>admin/produto/deleteProduct/<?php echo $value->id; ?>" class="delete" title="Deletar Produto"> <i class="icon-trash"> </i> </a>
						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>