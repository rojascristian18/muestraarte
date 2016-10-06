<div class="page-title">
	<h2><span class="fa fa-list"></span> Tiendas</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Tienda</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Tienda', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<?= $this->Form->input('id'); ?>
					<tr>
						<th><?= $this->Form->label('administrador_id', 'Administrador'); ?></th>
						<td><?= $this->Form->input('administrador_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombres', 'Nombres'); ?></th>
						<td><?= $this->Form->input('nombres'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('descripcion', 'Descripcion'); ?></th>
						<td><?= $this->Form->input('descripcion'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('imagen_principal', 'Imagen principal'); ?></th>
						<td><?= $this->Form->input('imagen_principal'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('imagen_portada', 'Imagen portada'); ?></th>
						<td><?= $this->Form->input('imagen_portada'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('visitas', 'Visitas'); ?></th>
						<td><?= $this->Form->input('visitas'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('producto_activo_count', 'Producto activo count'); ?></th>
						<td><?= $this->Form->input('producto_activo_count', array('class' => 'form-control select')); ?></td>
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
