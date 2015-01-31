<?php
class Operation extends AppModel {
	
	var $name = 'Operation';
	
	var $belongsTo = array(
		'OperationType' => array('fields'=>'name'),
		'Profile' => array('fields'=>'name')
	);
	
	function ins_op($type,$profile,$model,$id="",$met=""){
			
		if (in_array($type,array(1,2))) {
			$model = "Session";
			$met   = $this->getUserIP();
		}
		
		
		$this->save(array(
			'operation_type_id'=>$type,'profile_id'=>$profile,
			'metainf'=>$model,'model_id'=>$id,'metadata'=>$met
		));
	}
	
	function getLastLoginIP($profileid)
	{
		$lastLogin = $this->getLastLogin($profileid);
		
		return $lastLogin['metadata'];
	}
	
	function getLastLoginTime($profileid)
	{
		return $lastLogin['created'];
	}
	
	function getLastLogin($profileid)
	{
		$lastLogin = $this->find('first',array(
						'conditions' => array(
											'profile_id'        => $profileid,
											'operation_type_id' => 1
										),
						'fields'     => array('created','metadata'),
						'order'      => array('created' => 'DESC')
					 ));
					 
		return $lastLogin['Operation'];
	}
	
	
	function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }
	
	
	
	/* OPERACIONES SEGUIDAS:
	 * 
	 * Login LISTO
	 * Logout LISTO
	 * 
	 *  --  ROOT: -- 
	 * 
	 * USUARIOS ->
	 * 
	 * Crear centro completo
	 * Habilitar/Deshab
	 * editar perfil
	 * Cambiar Pass
	 * Crearle nuevo usuario a centro
	 * Editar datos del centro
	 * 
	 * HIPODROMOS ->
	 * 
	 * Agregar
	 * Editar
	 * 
	 * 
	 * CARRERAS ->
	 * 
	 * Agregar 
	 * Editar
	 * Hab/deshab
	 * Borrar
	 * Agregarle Caballos
	 * Colocarle Resultados
	 * 
	 * 
	 * ANULAR TICKET
	 * 
	 *  --  ADMIN: -- 
	 * 
	 * USUARIOS ->
	 * 
	 * Habilitar/Deshab
	 * editar perfil
	 * Cambiar Pass
	 * 
	 * 
	 * CARRERAS ->
	 * 
	 * Agregar 
	 * Editar
	 * Hab/deshab
	 * Borrar
	 * 
	 *  --  TAQUILLA: --
	 * 
	 * PAGAR TICKET
	 * ANULAR ULT TICKET
	 * 
	 * 
	 * 
	 * 
	 */
	 
	 
	 
}
?>
