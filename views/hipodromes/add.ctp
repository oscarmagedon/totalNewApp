<?php 
echo $form->create('Hipodrome');
echo $form->input('name',array('label'=>'Nombre'));
echo $form->input('national',array('label'=>'Nacional'));
echo $form->end();