<?php
App::uses('AppController', 'Controller');
class CarruselesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$carruseles	= $this->paginate();
		$this->set(compact('carruseles'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Carrusel->create();
			if ( $this->Carrusel->save($this->request->data) )
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
		if ( ! $this->Carrusel->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Carrusel->save($this->request->data) )
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
			$this->request->data	= $this->Carrusel->find('first', array(
				'conditions'	=> array('Carrusel.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->Carrusel->id = $id;
		if ( ! $this->Carrusel->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Carrusel->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Carrusel->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Carrusel->_schema);
		$modelo			= $this->Carrusel->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
