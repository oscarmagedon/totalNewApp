<?php 
class AppController extends Controller {
    
	var $_menuActions = array(
            ROLE_ROOT 
            => 
            array(
                'Usuarios'    => array(
                        'controller' => 'profiles',
                        'action'     => 'index'
                )
                , 
                'Hipódromos'  => array(
                            'controller' => 'hipodromes',
                            'action'     => 'index'
                )
                , 
                'Carreras'    => array(
                            'controller' => 'races',
                            'action'     => 'index_root'
                )
                , 
                'Operaciones' => array(
                            'controller' => 'operations',
                            'action'     => 'index'
                )
            )
            ,
                
            ROLE_ADMIN 
            =>
            array(
                
                'Mi Centro' => array(
                        'subactions' => array(
                            'Mis Usuarios' => array(
                                        'controller' => 'profiles',
                                        'action'     => 'index_center'
                            )
                            ,
                            'Cuentas' => array(
                                        'controller' => 'accounts',
                                        'action'     => 'index'
                            )
                            ,
                            'Pago Online' => array(
                                        'controller' => 'tickets',
                                        'action'     => 'onlinew'
                            )
                            ,
                            'Configs' => array(
                                        'controller' => 'centers',
                                        'action'     => 'my_conf'
                            )
                        )
                )
                ,
                'Carreras' => array(
                            'controller' => 'races',
                            'action'     => 'index'
                )
                ,
                'Ventas' => array(
                    'subactions' => array(
                            'Totales' => array(
                                    'controller' => 'tickets',
                                    'action'     => 'sales'
                            )
                            ,
                            'Tickets' => array(
                                    'controller' => 'tickets',
                                    'action'     => 'index'
                            )
                    )
                            
                )
                ,
                'Monitoreo' => array(
                    'subactions' => array(
                        'Seguimiento' => array(
                                    'controller' => 'tickets',
                                    'action'     => 'follow'
                        )
                        ,
                        'Anular' => array(
                                    'controller' => 'tickets',
                                    'action'     => 'anull'
                        )
                        ,
                        'Operaciones' => array(
                                    'controller' => 'operations',
                                    'action'     => 'center'
                        )
                    )
                )
            )
         );
    
    var $components = array('Authed','Session','RequestHandler');
    
    var $helpers    = array('Html','Form','Session','Javascript','Dtime','Barcode');

    var $paginate   = array('limit' => 20);
    
    function beforeFilter(){
		
        $this->Authed->fields      = array('username' => 'username', 'password' => 'password');
        $this->Authed->userScope   = array('User.enable' => 1);
        $this->Authed->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Authed->authorize   = 'controller';
        $this->Authed->loginError  = 'Combinacion login/password no valida';
        $this->Authed->authError   = 'Direccion negada por sistema.';
        //$this->disableCache();
        
        if($this->Authed->user()){ 
            $this->authUsr  = $this->Authed->user();
            $this->authUser = $this->authUsr['User'];
            $centerInst     = ClassRegistry::init("Center");
            $hourDiff       = $centerInst->get_hour_diff($this->authUser['center_id']);
            $this->hourInfo = $this->_hourInfo($hourDiff);
            
            $this->set("hourInfo", $this->hourInfo);
            $this->set("authUser", $this->authUser);
            $this->set("menuActions", $this->_menuActions[$this->authUser['role_id']]);
        }
        
        $this->layout = 'totalbets';
        
    }
    
    function beforeRender() {
        
        if ($this->layout == 'ajax') {
            Configure::write('debug',0);
        }
        
        //parent::beforeRender();
    }
	
    function isAuthorized() {
        return true;
    }
	
    function isRoot(){
        return ($this->Authed->user('role_id') == ROLE_ROOT);
    }
    function isAdmin(){
        return ($this->Authed->user('role_id') == ROLE_ADMIN);
    }
    function isTaquilla(){
        return ($this->Authed->user('role_id') == ROLE_TAQUILLA);
    }
    function isOnline(){
        return ($this->Authed->user('role_id') == ROLE_ONLINE);
    }
    	
    function verifyLastIP()
    {
        $operInst = ClassRegistry::init("Operation");
        $lastIP   = $operInst->getLastLoginIP($this->Authed->user('profile_id'));
        $nowIP    = $operInst->getuserIP();
        $valid    = true;

        if ($lastIP != $nowIP) {
            $valid = false;
        }

        return $valid;
    }
	
    function exitOnIPDifference()
    {
        if ($this->verifyLastIP() === false) {
            $this->Session->setFlash("Su usuario inicio sesion en otra Dir. IP.");
            $this->redirect(array('controller'=>'users','action'=>'logout','admin'=>0));
        }
    }
	
    function _getUserIP()
    {
    	$operInst = ClassRegistry::init("Operation");
    	return $operInst->getuserIP();
    }
	
    function _hourInfo($diff)
    {
        $nowTime = date("H:i:s");
        $altHour = 0;

        if ($diff != 0) {
                $altHour = date("H:i:s",strtotime("$diff hour"));
        }

        return array('regular'=>$nowTime,'alternate'=>$altHour);
    }
		
}
?>