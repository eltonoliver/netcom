<div class="container">
	<span id="erro"><?php echo validation_errors();  ?></span>
	<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
	<h4 class="titleBack"><center>Página Empresa</center></h4>
	<div class="row">
		<div class="span12">
			<?php if (count($listEmpresa) < 1) {?>
			<a href="<?php echo base_url(); ?>admin/page_empresa/addEmpresa/" rel="Tooltip" title="Adicionar Empresa" class="add"> <img src="<?php echo base_url(); ?>assets/img/add.png" alt="add Empresa"> </a>
			<?php } ?>
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
							Título
						</th>
						<th>
							Ações
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listEmpresa as  $value) { ?>
						
					
					<tr class="info">
						<td>
							<?php echo $value->id; ?>
						</td>
						<td>
							<?php echo word_limiter($value->titulo, 3); ?>
						</td>
					
						<td>
							<a href="<?php echo base_url(); ?>admin/page_empresa/editEmpresa/<?php echo $value->id; ?>" class="edit" title="Editar Página Empresa" ><i class="icon-pencil"></i></a>  |  
							<a href="<?php echo base_url(); ?>admin/page_empresa/deleteEmpresa/<?php echo $value->id; ?>" class="delete" title="Deletar Página Empresa"> <i class="icon-trash"> </i> </a>
						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>