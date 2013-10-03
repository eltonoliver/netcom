<div class="container">
	<span id="erro"><?php echo validation_errors();  ?></span>
	<span id="msg"><?php echo $this->session->flashdata('msg');?></span>
	<h4 class="titleBack"><center>Usuários</center></h4>
	<div class="row">
		<div class="span12">
			<a href="<?php echo base_url(); ?>admin/usuario/addUser/" rel="Tooltip" title="Adicionar usuário" class="add"> <img src="<?php echo base_url(); ?>assets/img/add.png" alt="add usuário"> </a>
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
							Usuário
						</th>
						<th>
							Login 
						</th>
						<th>
							Ações
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listUser as  $value) { ?>
						
					
					<tr class="info">
						<td>
							<?php echo $value->id; ?>
						</td>
						<td>
							<?php echo $value->nome; ?>
						</td>
						<td>
							<?php echo $value->login; ?>
						</td>
						<td>
							<a href="<?php echo base_url(); ?>admin/usuario/editUser/<?php echo $value->id; ?>" class="edit" title="Editar Usuário" ><i class="icon-pencil"></i></a>  |  
							<a href="<?php echo base_url(); ?>admin/usuario/deleteUser/<?php echo $value->id; ?>" class="delete" title="Deletar Usuário"> <i class="icon-trash"> </i> </a>
						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>
