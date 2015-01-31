<?php
class HipodromesController extends AppController {

	var $name = 'Hipodromes';
	
	function beforeFilter(){
		parent::beforeFilter();
	}
	
	function isAuthorized(){
		
        return $this->isRoot();
	}

	function index() {
		$this->Hipodrome->recursive = 0;
		$this->set('hipodromes', $this->paginate());
	}

	function add() {
		if (!empty($this->data)) {
			$this->Hipodrome->create();
			if ($this->Hipodrome->save($this->data)) {
				$operInst = ClassRegistry::init('Operation');
				$operInst->ins_op(3,$this->authUser['profile_id'],"Hipodromo",$this->Hipodrome->id,$this->data['Hipodrome']['name']." Creado");			
			
				$this->Session->setFlash("Hipodromo Guardado");
			} else {
				$this->Session->setFlash("Hipodromo NO Guardado");
			}
			$this->redirect($this->referer());
		}
        
        $this->layout = 'ajax';
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash("", array('action'=>'index'));
		}
        
		if (!empty($this->data)) {
			if ($this->Hipodrome->save($this->data)) {
					
				$operInst = ClassRegistry::init('Operation');
				$operInst->ins_op(3,$this->authUser['profile_id'],"Hipodromo",$this->data['Hipodrome']['id'],$this->data['Hipodrome']['name']." Editado");			
				
				$this->Session->setFlash("Hipodromo Guardado");
			} else {
				$this->Session->setFlash("Hipodromo NO Guardado");
			}
			$this->redirect($this->referer());
		}
        
		if (empty($this->data)) {
            
			$this->data = $this->Hipodrome->read(null, $id);
		
            $this->layout = 'ajax';
        }
	}
    
    function disable ($id, $enable)
    {
        $this->Hipodrome->updateAll(
            array('enable' => $enable),
            array('id'     => $id)
        );
        $this->redirect($this->referer());
    }
}
