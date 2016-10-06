<?php
App::uses('AppController', 'Controller');
class RedSitiosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$redSitios	= $this->paginate();
		$this->set(compact('redSitios'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->RedSitio->create();
			if ( $this->RedSitio->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$iconos	= $this->RedSitio->Icono->find('list');
		$this->set(compact('iconos'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->RedSitio->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->RedSitio->save($this->request->data) )
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
			$this->request->data	= $this->RedSitio->find('first', array(
				'conditions'	=> array('RedSitio.id' => $id)
			));
		}
		$iconos	= $this->RedSitio->Icono->find('list');
		$this->set(compact('iconos'));
	}

	public function admin_delete($id = null)
	{
		$this->RedSitio->id = $id;
		if ( ! $this->RedSitio->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->RedSitio->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->RedSitio->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->RedSitio->_schema);
		$modelo			= $this->RedSitio->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
