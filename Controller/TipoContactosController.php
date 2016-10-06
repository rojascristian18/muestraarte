<?php
App::uses('AppController', 'Controller');
class TipoContactosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$tipoContactos	= $this->paginate();
		$this->set(compact('tipoContactos'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->TipoContacto->create();
			if ( $this->TipoContacto->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->TipoContacto->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->TipoContacto->save($this->request->data) )
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
			$this->request->data	= $this->TipoContacto->find('first', array(
				'conditions'	=> array('TipoContacto.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->TipoContacto->id = $id;
		if ( ! $this->TipoContacto->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->TipoContacto->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->TipoContacto->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->TipoContacto->_schema);
		$modelo			= $this->TipoContacto->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
