<div class="page-title">
	<h2><span class="fa fa-list"></span> Modulos</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Nuevo Modulo</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Modulo', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<tr>
						<th><?= $this->Form->label('parent_id', 'Modulo padre'); ?></th>
						<td><?= $this->Form->input('parent_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombres', 'Nombres'); ?></th>
						<td><?= $this->Form->input('nombres'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('controlador', 'Controlador'); ?></th>
						<td><?= $this->Form->input('controlador'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('icono', 'Icono'); ?></th>
						<td><?= $this->Form->input('icono'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('activo', 'Activo'); ?></th>
						<td><?= $this->Form->input('activo'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('Perfil', 'Perfil'); ?></th>
						<td><?= $this->Form->input('Perfil'); ?></td>
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
