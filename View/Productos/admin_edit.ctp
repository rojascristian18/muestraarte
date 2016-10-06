<div class="page-title">
	<h2><span class="fa fa-list"></span> Productos</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Producto</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Producto', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<?= $this->Form->input('id'); ?>
					<tr>
						<th><?= $this->Form->label('tienda_id', 'Tienda'); ?></th>
						<td><?= $this->Form->input('tienda_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('sku', 'Sku'); ?></th>
						<td><?= $this->Form->input('sku'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('titulo', 'Titulo'); ?></th>
						<td><?= $this->Form->input('titulo'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('descripcion_corta', 'Descripcion corta'); ?></th>
						<td><?= $this->Form->input('descripcion_corta'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('descripcion_completa', 'Descripcion completa'); ?></th>
						<td><?= $this->Form->input('descripcion_completa'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('imagen_principal', 'Imagen principal'); ?></th>
						<td><?= $this->Form->input('imagen_principal'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('imagen_miniatura', 'Imagen miniatura'); ?></th>
						<td><?= $this->Form->input('imagen_miniatura'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('precio_normal', 'Precio normal'); ?></th>
						<td><?= $this->Form->input('precio_normal'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('porcentaje_descuento', 'Porcentaje descuento'); ?></th>
						<td><?= $this->Form->input('porcentaje_descuento'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('activo', 'Activo'); ?></th>
						<td><?= $this->Form->input('activo'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('Categoria', 'Categoria'); ?></th>
						<td><?= $this->Form->input('Categoria'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('Compra', 'Compra'); ?></th>
						<td><?= $this->Form->input('Compra'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('Etiqueta', 'Etiqueta'); ?></th>
						<td><?= $this->Form->input('Etiqueta'); ?></td>
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
