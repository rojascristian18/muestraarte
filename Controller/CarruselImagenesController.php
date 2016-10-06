<?php
App::uses('AppController', 'Controller');
class CarruselImagenesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$carruselImagenes	= $this->paginate();
		$this->set(compact('carruselImagenes'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->CarruselImagen->create();
			if ( $this->CarruselImagen->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$carruseles	= $this->CarruselImagen->Carrusel->find('list');
		$this->set(compact('carruseles'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->CarruselImagen->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->CarruselImagen->save($this->request->data) )
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
			$this->request->data	= $this->CarruselImagen->find('first', array(
				'conditions'	=> array('CarruselImagen.id' => $id)
			));
		}
		$carruseles	= $this->CarruselImagen->Carrusel->find('list');
		$this->set(compact('carruseles'));
	}

	public function admin_delete($id = null)
	{
		$this->CarruselImagen->id = $id;
		if ( ! $this->CarruselImagen->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->CarruselImagen->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->CarruselImagen->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->CarruselImagen->_schema);
		$modelo			= $this->CarruselImagen->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
