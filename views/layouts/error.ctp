<!DOCTYPE html> 
<head>
    <meta charset="UTF-8">
    <title>.: Total Bets - ERROR :.</title>
    <link rel="shortcut icon" href="<?php echo $html->url('/favicon.ico') ?>" type="image/x-icon">
    <?php 
    echo $html->css(array('reset','cake-based','style'));
    ?>
</head>
<body> 	
    <?php
    echo $this->element('header');
    ?>
    <section>
    <?php
    echo $html->link('VOLVER','/');
    echo $content_for_layout;
    ?>
	</section>
	<footer>
		<a href="#">totalbets.com</a>
	</footer>
</body>
</html> 
