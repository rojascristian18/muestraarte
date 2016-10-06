<?php
App::uses('AppController', 'Controller');
class AlbumnImagenesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$albumnImagenes	= $this->paginate();
		$this->set(compact('albumnImagenes'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->AlbumnImagen->create();
			if ( $this->AlbumnImagen->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$albumnes	= $this->AlbumnImagen->Albumn->find('list');
		$this->set(compact('albumnes'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->AlbumnImagen->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->AlbumnImagen->save($this->request->data) )
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
			$this->request->data	= $this->AlbumnImagen->find('first', array(
				'conditions'	=> array('AlbumnImagen.id' => $id)
			));
		}
		$albumnes	= $this->AlbumnImagen->Albumn->find('list');
		$this->set(compact('albumnes'));
	}

	public function admin_delete($id = null)
	{
		$this->AlbumnImagen->id = $id;
		if ( ! $this->AlbumnImagen->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->AlbumnImagen->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->AlbumnImagen->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->AlbumnImagen->_schema);
		$modelo			= $this->AlbumnImagen->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
