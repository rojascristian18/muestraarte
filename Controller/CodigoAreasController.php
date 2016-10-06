<?php
App::uses('AppController', 'Controller');
class CodigoAreasController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$codigoAreas	= $this->paginate();
		$this->set(compact('codigoAreas'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->CodigoArea->create();
			if ( $this->CodigoArea->save($this->request->data) )
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
		if ( ! $this->CodigoArea->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->CodigoArea->save($this->request->data) )
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
			$this->request->data	= $this->CodigoArea->find('first', array(
				'conditions'	=> array('CodigoArea.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->CodigoArea->id = $id;
		if ( ! $this->CodigoArea->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->CodigoArea->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->CodigoArea->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->CodigoArea->_schema);
		$modelo			= $this->CodigoArea->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
