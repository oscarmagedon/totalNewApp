<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>.: Total Bets - HIPICO :.</title>
    <link rel="shortcut icon" href="<?php echo $html->url('/favicon.ico') ?>" type="image/x-icon">
    <?php 
    echo $html->css(array(
            'reset','cake-based','style','jquery-ui'
    ));
    echo $javascript->link(array(
        'jquery-1.10','jquery-ui','libs-total'
    )); //,"generals.js?f=0"
    ?>
</head>
<body> 	
    <?php
    echo $this->element('header');

    if (!empty($authUser)) {
        echo $this->element('main-menu');
    }
    ?>
    
	<section>
        <?php
        if ($session->check('Message.flash')): $session->flash(); endif;
        $session->flash('auth');
        echo $content_for_layout;
        ?>
	</section>
	<footer>
		<a href="#">totalbets.com</a>
	</footer>
    <div class='modal-wrap'></div>
</body>
</html> 