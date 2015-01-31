<script>
$(function(){
	$("#ProfileAddForm").submit(function() {
		if($('#UserUsername').val() == ""){
			alert('Debe llenar TODOS los campos de Usuario.');
			return false;
		}
    });
});
</script>
<div class="profiles form">
<?php 
echo $form->create('Profile',array('action'=>'edit_center'));
echo $form->input('id');
echo $form->input('User.id'); 
?>
<div class="modalform-panel">
	<?php 
	echo $form->input('name',array('label'=>'Nombre'));
	echo $form->input('phone_number',array('label'=>'Telefono'));
	?>
</div>
<div class="modalform-panel">	
	<?php
	echo $form->input('User.username',array('label'=>'Usuario','disabled'=>true));
	echo $form->input('User.email',array('label'=>'Email'))
	?>
</div>
<?php echo $form->end();?>
</div>