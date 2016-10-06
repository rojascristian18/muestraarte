<?php
App::uses('AppController', 'Controller');
class RedSocialesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$redSociales	= $this->paginate();
		$this->set(compact('redSociales'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->RedSocial->create();
			if ( $this->RedSocial->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$tiendas	= $this->RedSocial->Tienda->find('list');
		$iconos	= $this->RedSocial->Icono->find('list');
		$this->set(compact('tiendas', 'iconos'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->RedSocial->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->RedSocial->save($this->request->data) )
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
			$this->request->data	= $this->RedSocial->find('first', array(
				'conditions'	=> array('RedSocial.id' => $id)
			));
		}
		$tiendas	= $this->RedSocial->Tienda->find('list');
		$iconos	= $this->RedSocial->Icono->find('list');
		$this->set(compact('tiendas', 'iconos'));
	}

	public function admin_delete($id = null)
	{
		$this->RedSocial->id = $id;
		if ( ! $this->RedSocial->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->RedSocial->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->RedSocial->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->RedSocial->_schema);
		$modelo			= $this->RedSocial->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
