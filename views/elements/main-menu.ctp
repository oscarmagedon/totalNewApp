<nav>
    <ul>
        <?php
        foreach ($menuActions as $title => $elem) {
            $classTitle = null;
            if (isset($elem['subactions'])) {
                $classTitle = array('class' => 'only-tit');
                $route      = '#';
                $title     .= " ";
            } else {
                $route = array(
                        'controller' => $elem['controller'],
                        'action'     => $elem['action']
                    );
            }
            
            
            echo "<li>"; 
            
            echo $html->link($title,$route,$classTitle);
            
            if (isset($elem['subactions'])) {
                
                echo "<ul class='subs'>";

                foreach ($elem['subactions'] as $subTitle => $subelem) {

                    echo "<li>";

                    echo $html->link($subTitle, array(
                        'controller' => $subelem['controller'],
                        'action'     => $subelem['action'])
                    );

                    echo "</li>";

                }

                echo "</ul>";
            }

            
            echo "</li>";
                
        }
        ?>
    </ul>    
</nav>


<?php
/**
    }elseif($authUser['role_id'] == ROLE_TAQUILLA){
    ?>
        &nbsp;
        <?php echo $html->link("Mi Perfil",array('controller'=>'profiles','action'=>'view_taquilla',$authUser['id'],'admin'=>1)); ?>
        &nbsp;
        <?php echo $html->link("Carreras",array('controller'=>'races','action'=>'view','admin'=>1)); ?>
        &nbsp;
        <?php echo $html->link("Vender",array('controller'=>'tickets','action'=>'add','admin'=>1)); ?>
        &nbsp;
        <?php echo $html->link("Picks",array('controller'=>'tickets','action'=>'add_pick','admin'=>1)); ?>
        &nbsp;
        <?php echo $html->link("Tickets",array('controller'=>'tickets','action'=>'taquilla','admin'=>1)); ?>
        &nbsp;
        <?php echo $html->link("Ventas",array('controller'=>'tickets','action'=>'sales_taquilla','admin'=>1)); ?>
        &nbsp;
        <?php echo $html->link("Pagar",array('controller'=>'tickets','action'=>'pay','admin'=>1)); ?>
        &nbsp;
        <?php echo $html->link("Pagar CB",array('controller'=>'tickets','action'=>'paybarc','admin'=>1)); ?>
        &nbsp;
        <?php echo $html->link("Anular Ult.",array('controller'=>'tickets','action'=>'anull_last','admin'=>1)); ?>
        &nbsp;
        <?php echo $html->link("Reimpr. Ult.",array('controller'=>'tickets','action'=>'reprint_last','admin'=>1)); ?>
    <?php	
    }elseif($authUser['role_id'] == ROLE_ONLINE){
    ?>
        &nbsp;
        <?php echo $html->link("Carreras",array('controller'=>'races','action'=>'view','admin'=>1)); ?>
        &nbsp;
        <?php echo $html->link("Apostar",array('controller'=>'tickets','action'=>'add','admin'=>1)); ?>
        &nbsp;
        <?php echo $html->link("Tickets",array('controller'=>'tickets','action'=>'taquilla','admin'=>1)); ?>
        &nbsp;
        <?php echo $html->link("Cuentas",array('controller'=>'accounts','action'=>'my_index','admin'=>1)); ?>
        &nbsp;
        <?php echo $html->link("Anular Ult.",array('controller'=>'tickets','action'=>'anull_last','admin'=>1)); ?>
        &nbsp;
        <?php echo $html->link("Señal en Vivo",array('controller'=>'users','action'=>'signal','admin'=>1)); ?>
    <?php		
				}
*
 * ********** OLD HTML VERSION ************
 * 
 * 
 * <li><a href="#" class="only-tit">Tutorials&nbsp;&nbsp;&nbsp;&nbsp;&#9660;</a>
            <ul class="subs">
                <li><a href="#">HTML / CSS</a></li>
                <li><a href="#">JS / jQuery</a></li>
                <li><a href="#">PHP</a></li>
            </ul>
        </li>

        <li><a href="#" class="only-tit">Resources&nbsp;&nbsp;&nbsp;&nbsp;&#9660;</a>
            <ul class="subs">
                <li><a href="#">PHP</a></li>
                <li><a href="#">Ajax</a></li>
                <li><a href="#">HTML / CSS</a></li>
            </ul>
        </li>
        <li><a href="#">About</a></li>
        <li><a href="#">Back</a></li>
 * 
 * 
 * 
 * 
 * 
 *  /
 */

?>