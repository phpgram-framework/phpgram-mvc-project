<?php $this->extend('general'); ?>

<?php $this->assign('h1',"Welcome to phpgram"); ?>


<?php $this->start();?>

	<p><?= $msg?></p>

<?php $this->end('content');?>