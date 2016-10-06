<?php
App::uses('AppController', 'Controller');
class ProductoImagenesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$productoImagenes	= $this->paginate();
		$this->set(compact('productoImagenes'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->ProductoImagen->create();
			if ( $this->ProductoImagen->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$productos	= $this->ProductoImagen->Producto->find('list');
		$this->set(compact('productos'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->ProductoImagen->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->ProductoImagen->save($this->request->data) )
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
			$this->request->data	= $this->ProductoImagen->find('first', array(
				'conditions'	=> array('ProductoImagen.id' => $id)
			));
		}
		$productos	= $this->ProductoImagen->Producto->find('list');
		$this->set(compact('productos'));
	}

	public function admin_delete($id = null)
	{
		$this->ProductoImagen->id = $id;
		if ( ! $this->ProductoImagen->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->ProductoImagen->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->ProductoImagen->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->ProductoImagen->_schema);
		$modelo			= $this->ProductoImagen->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
