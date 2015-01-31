<header>
    <div class="header-logo">
        <?php
        if (!empty($authUser)) {
        ?>
            <div class="header-hour">
                <span class="regular">
                <?php 
                    echo $dtime->time_to_human($hourInfo['regular']) 
                ?>
                </span>
                <?php
                if ($hourInfo['alternate'] != 0) {
                ?>
                    <span class="altern">
                    <?php echo $dtime->time_to_human($hourInfo['alternate']) ?>
                    </span>
                <?php
                }
                ?>	
            </div>
            <div class="header-user">
                <span>
                    <?php echo $authUser['profile_name'] ?> 
                </span>
                <?php
                echo $html->link('salir',array(
                    'controller' => 'users',
                    'action'     => 'logout'
                )) 
                ?>
            </div>
        <?php    
        }
        ?>
    </div>
</header>