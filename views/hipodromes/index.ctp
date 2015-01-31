<div>
    
    <h1>Hipodromos</h1>
    
    <?php echo $html->link("Agregar Hipódromo", 
        array('action'=>'add'),array('class'=>'open-panel')); ?>
    
    <p>
    <?php
    echo $paginator->counter(array(
    'format' => "Pagina %page% de %pages%, mostrando %current% registros de %count% totales, empezando en %start%, terminando en %end%"));
    ?>
    </p>
    
    <table>
    <tr>
        <th><?php echo $paginator->sort('id');?></th>
        <th><?php echo $paginator->sort('name');?></th>
        <th><?php echo $paginator->sort('Nacional','national');?></th>
        <th><?php echo $paginator->sort('Disponible','enable');?></th>
    </tr>
    <?php
    foreach ($hipodromes as $hipodrome):
    ?>
        <tr<?= $dtime->disableRow($hipodrome['Hipodrome']['enable']) ?>>
            <td class="cypher">
                <?php echo $hipodrome['Hipodrome']['id'] ?>
            </td>
            <td class="title">
                <?php  
                echo $html->link($hipodrome['Hipodrome']['name'],
                        array('action' => 'edit',$hipodrome['Hipodrome']['id']),
                        array('class'  => 'open-panel')
                    ) 
                ?>
            </td>
            <td>
                <?php 
                $dtime->yesNoBool($hipodrome['Hipodrome']['national'])
                ?>
            </td>
            <td class="text">
                <?php 
                $dtime->switcherLink(
                    $hipodrome['Hipodrome']['id'],
                    $hipodrome['Hipodrome']['enable']) ?>
            </td>
        </tr>
    <?php 
    endforeach; 
    ?>
    </table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<script>
    
/*
$(function() {
	$("#panel_look").dialog({
		autoOpen: false,
		bgiframe: true,		
		modal: true,
		height: 300,
		width: 400,
		resizable: true
	});
	
	$(".edit").button({ icons: { primary: "ui-icon-pencil" }}).css('margin','2px');
	
	$(".open_panel").click(function(){
		var myurl = $(this).attr('href');
		
		$('#panel_look').html('<?php echo $html->image("loading.gif")?>');
		$('#panel_look').dialog({title:"Editar"});
		$('#panel_look').load(myurl);
		$('#panel_look').dialog('open');
		return false;
		
	});

});	*/
</script>