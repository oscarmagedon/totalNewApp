<?php 
echo $form->create('Hipodrome');
echo $form->input('id');
echo $form->input('name',array('label'=>'Nombre'));
echo $form->input('national',array('label'=>'Nacional'));
echo $form->input('enable',array('label'=>'Habilitado'));
echo $form->end();
