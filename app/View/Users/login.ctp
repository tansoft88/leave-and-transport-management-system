	<fieldset>
	<legend><h3><?php echo __('Enter Your Credentials To Login'); ?></h3></legend>
	<?php
	 //creating the login form
	echo $this->Form->create(array('action' => 'login'));
	echo $this->Form->input('username',array('AutoComplete'=>'off'));
	echo "<br>";
	echo $this->Form->input('password',array('AutoComplete'=>'off'));
	echo "<br>";
	echo "<br>";
	echo $this->Form->end('Login');
	echo "<br>";
	echo $this->Html->link("Forgot Your Password?",array("controller"=>"users","action"=>"login")); 
	echo "<br>";
	echo "<br>";
	echo $this->Html->link("Register To Be A Member",array("controller"=>"staff_details","action"=>"register_stud"));
	?>
	</fieldset> 