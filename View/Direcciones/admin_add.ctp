<div class="page-title">
	<h2><span class="fa fa-list"></span> Direcciones</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Nuevo Direccion</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Direccion', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<tr>
						<th><?= $this->Form->label('tienda_id', 'Tienda'); ?></th>
						<td><?= $this->Form->input('tienda_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('icono_id', 'Icono'); ?></th>
						<td><?= $this->Form->input('icono_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('villa_pobla', 'Villa pobla'); ?></th>
						<td><?= $this->Form->input('villa_pobla'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('calle_pasaje', 'Calle pasaje'); ?></th>
						<td><?= $this->Form->input('calle_pasaje'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('numero', 'Numero'); ?></th>
						<td><?= $this->Form->input('numero'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('referencia', 'Referencia'); ?></th>
						<td><?= $this->Form->input('referencia'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('latitud', 'Latitud'); ?></th>
						<td><?= $this->Form->input('latitud'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('longitud', 'Longitud'); ?></th>
						<td><?= $this->Form->input('longitud'); ?></td>
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
