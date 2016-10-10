<div class="page-title">
	<h2><span class="fa fa-list"></span> Administradores</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Administrador</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Administrador', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<?= $this->Form->input('id'); ?>
					<tr>
						<th><?= $this->Form->label('perfil_id', 'Perfil'); ?></th>
						<td><?= $this->Form->input('perfil_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombres', 'Nombres'); ?></th>
						<td><?= $this->Form->input('nombres'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('email', 'Email'); ?></th>
						<td><?= $this->Form->input('email'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('clave', 'Clave'); ?></th>
						<td><?= $this->Form->input('clave', array('type' => 'password', 'autocomplete' => 'off', 'value' => '')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('repetir_clave', 'Repetir clave'); ?></th>
						<td><?= $this->Form->input('repetir_clave', array('type' => 'password', 'autocomplete' => 'off', 'value' => '')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('apellido_paterno', 'Apellido paterno'); ?></th>
						<td><?= $this->Form->input('apellido_paterno'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('apellido_materno', 'Apellido materno'); ?></th>
						<td><?= $this->Form->input('apellido_materno'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('fono', 'Fono'); ?></th>
						<td><?= $this->Form->input('codigo_area_id', array('class' => 'form-control select', 'empty' => 'Código area')); ?> - <?= $this->Form->input('fono'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('comentario_count', 'Comentario count'); ?></th>
						<td><?= $this->Form->input('comentario_count'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('tienda_count', 'Tienda count'); ?></th>
						<td><?= $this->Form->input('tienda_count'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('foto_perfil', 'Foto perfil'); ?></th>
						<td><?= $this->Form->input('foto_perfil', array('class' => '', 'type' => 'file') ); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('activo', 'Activo'); ?></th>
						<td><?= $this->Form->input('activo'); ?></td>
					</tr>
				</table>

				<div class="pull-right">
					<input type="submit" class="btn btn-primary esperar-carga" autocomplete="off" data-loading-text="Espera un momento..." value="Guardar cambios">
					<?= $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger')); ?>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
