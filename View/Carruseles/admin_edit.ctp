<div class="page-title">
	<h2><span class="fa fa-list"></span> Carruseles</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Carrusel</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Carrusel', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<?= $this->Form->input('id'); ?>
					<tr>
						<th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
						<td><?= $this->Form->input('nombre'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('titulo', 'Titulo'); ?></th>
						<td><?= $this->Form->input('titulo'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('parrafo', 'Parrafo'); ?></th>
						<td><?= $this->Form->input('parrafo'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('boton_activo', 'Boton activo'); ?></th>
						<td><?= $this->Form->input('boton_activo'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('boton_link', 'Boton link'); ?></th>
						<td><?= $this->Form->input('boton_link'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('boton_texto', 'Boton texto'); ?></th>
						<td><?= $this->Form->input('boton_texto'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('carrusel_imagenes_count', 'Carrusel imagenes count'); ?></th>
						<td><?= $this->Form->input('carrusel_imagenes_count', array('class' => 'form-control select')); ?></td>
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
