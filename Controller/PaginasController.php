<?php
App::uses('AppController', 'Controller');
class PaginasController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$paginas	= $this->paginate();
		$this->set(compact('paginas'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Pagina->create();
			if ( $this->Pagina->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$carruseles	= $this->Pagina->Carrusel->find('list');
		$parentPaginas	= $this->Pagina->ParentPagina->find('list');
		$this->set(compact('carruseles', 'parentPaginas'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Pagina->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Pagina->save($this->request->data) )
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
			$this->request->data	= $this->Pagina->find('first', array(
				'conditions'	=> array('Pagina.id' => $id)
			));
		}
		$carruseles	= $this->Pagina->Carrusel->find('list');
		$parentPaginas	= $this->Pagina->ParentPagina->find('list');
		$this->set(compact('carruseles', 'parentPaginas'));
	}

	public function admin_delete($id = null)
	{
		$this->Pagina->id = $id;
		if ( ! $this->Pagina->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Pagina->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Pagina->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Pagina->_schema);
		$modelo			= $this->Pagina->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
