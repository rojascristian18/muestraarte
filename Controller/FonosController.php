<?php
App::uses('AppController', 'Controller');
class FonosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$fonos	= $this->paginate();
		$this->set(compact('fonos'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Fono->create();
			if ( $this->Fono->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$tiendas	= $this->Fono->Tienda->find('list');
		$codigoAreas	= $this->Fono->CodigoArea->find('list');
		$iconos	= $this->Fono->Icono->find('list');
		$this->set(compact('tiendas', 'codigoAreas', 'iconos'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Fono->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Fono->save($this->request->data) )
			{
				$this->Session->setFlash('Registro editado correctamente', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		else
		{
			$this->request->data	= $this->Fono->find('first', array(
				'conditions'	=> array('Fono.id' => $id)
			));
		}
		$tiendas	= $this->Fono->Tienda->find('list');
		$codigoAreas	= $this->Fono->CodigoArea->find('list');
		$iconos	= $this->Fono->Icono->find('list');
		$this->set(compact('tiendas', 'codigoAreas', 'iconos'));
	}

	public function admin_delete($id = null)
	{
		$this->Fono->id = $id;
		if ( ! $this->Fono->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Fono->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Fono->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Fono->_schema);
		$modelo			= $this->Fono->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
