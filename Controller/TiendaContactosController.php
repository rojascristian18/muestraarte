<?php
App::uses('AppController', 'Controller');
class TiendaContactosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$tiendaContactos	= $this->paginate();
		$this->set(compact('tiendaContactos'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->TiendaContacto->create();
			if ( $this->TiendaContacto->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$tiendas	= $this->TiendaContacto->Tienda->find('list');
		$administradores	= $this->TiendaContacto->Administrador->find('list');
		$tipoContactos	= $this->TiendaContacto->TipoContacto->find('list');
		$this->set(compact('tiendas', 'administradores', 'tipoContactos'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->TiendaContacto->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->TiendaContacto->save($this->request->data) )
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
			$this->request->data	= $this->TiendaContacto->find('first', array(
				'conditions'	=> array('TiendaContacto.id' => $id)
			));
		}
		$tiendas	= $this->TiendaContacto->Tienda->find('list');
		$administradores	= $this->TiendaContacto->Administrador->find('list');
		$tipoContactos	= $this->TiendaContacto->TipoContacto->find('list');
		$this->set(compact('tiendas', 'administradores', 'tipoContactos'));
	}

	public function admin_delete($id = null)
	{
		$this->TiendaContacto->id = $id;
		if ( ! $this->TiendaContacto->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->TiendaContacto->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->TiendaContacto->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->TiendaContacto->_schema);
		$modelo			= $this->TiendaContacto->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
