<div class="page-title">
	<h2><span class="fa fa-list"></span> Configuraciones</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Nuevo Configuracion</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Configuracion', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<tr>
						<th><?= $this->Form->label('titulo_sitio', 'Titulo sitio'); ?></th>
						<td><?= $this->Form->input('titulo_sitio'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('shorcut_sitio', 'Shorcut sitio'); ?></th>
						<td><?= $this->Form->input('shorcut_sitio'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('logo_sitio', 'Logo sitio'); ?></th>
						<td><?= $this->Form->input('logo_sitio'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('descripcion', 'Descripcion'); ?></th>
						<td><?= $this->Form->input('descripcion'); ?></td>
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
