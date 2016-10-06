<?php
App::uses('AppController', 'Controller');
class AlbumnesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$albumnes	= $this->paginate();
		$this->set(compact('albumnes'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Albumn->create();
			if ( $this->Albumn->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$tiendas	= $this->Albumn->Tienda->find('list');
		$this->set(compact('tiendas'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Albumn->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Albumn->save($this->request->data) )
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
			$this->request->data	= $this->Albumn->find('first', array(
				'conditions'	=> array('Albumn.id' => $id)
			));
		}
		$tiendas	= $this->Albumn->Tienda->find('list');
		$this->set(compact('tiendas'));
	}

	public function admin_delete($id = null)
	{
		$this->Albumn->id = $id;
		if ( ! $this->Albumn->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Albumn->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Albumn->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Albumn->_schema);
		$modelo			= $this->Albumn->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
