<div class="page-title">
	<h2><span class="fa fa-list"></span> Compras</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Compra</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Compra', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<?= $this->Form->input('id'); ?>
					<tr>
						<th><?= $this->Form->label('administrador_id', 'Administrador'); ?></th>
						<td><?= $this->Form->input('administrador_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('estado_compra_id', 'Estado compra'); ?></th>
						<td><?= $this->Form->input('estado_compra_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('oc', 'Oc'); ?></th>
						<td><?= $this->Form->input('oc'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('total', 'Total'); ?></th>
						<td><?= $this->Form->input('total'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('producto_count', 'Producto count'); ?></th>
						<td><?= $this->Form->input('producto_count', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('Producto', 'Producto'); ?></th>
						<td><?= $this->Form->input('Producto'); ?></td>
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
