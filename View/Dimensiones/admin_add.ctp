<div class="page-title">
	<h2><span class="fa fa-list"></span> Dimensiones</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Nuevo Dimension</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Dimension', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<tr>
						<th><?= $this->Form->label('producto_id', 'Producto'); ?></th>
						<td><?= $this->Form->input('producto_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('alto', 'Alto'); ?></th>
						<td><?= $this->Form->input('alto'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('ancho', 'Ancho'); ?></th>
						<td><?= $this->Form->input('ancho'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('largo', 'Largo'); ?></th>
						<td><?= $this->Form->input('largo'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('cuadrados', 'Cuadrados'); ?></th>
						<td><?= $this->Form->input('cuadrados'); ?></td>
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
