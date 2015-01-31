<div style="width:300px;">
    <?php
    if(empty($authUser)){
        echo $form->create('User',array('action'=>"login"));
        echo $form->input('username',array('label'=>'Usuario'));
        echo $form->input('password',array('label'=>'Password'));
        echo $form->end('LOGIN'); 
    }else{
        echo "<h2>Usuario ".$authUser['profile_name']." en sesion.</h2>";
    }
    ?>    
</div>
