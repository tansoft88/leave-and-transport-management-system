	
	<?php  echo $this->Html->css('mycss'); ?>
	<article class="cssui-usercard">
	
	<?php	echo $this->Form->create('CheckinOutLog',array('action' => 'user_search'));?>
	<fieldset>
	<legend><b><?php echo __('Search By Ecnumber or Barcode Scanner'); ?></b></legend>
	<table>
  <tr><th>
 <?php echo $this->Form->label('Search By:');?>
	</th><td>	
	<?php
	$options = array('ecnumber'=>'EC Number');
	echo $this->Form->select('search_by',$options, array('empty'=>'Ecnumber','selected'=>false));
	// echo $this->Form->select('search_by',$options, array('empty'=>'Please Select','selected'=>false));
	?>	
	</td><td>	
	<?php
	echo $this->Form->input('search',array('label'=>false,'AutoComplete'=>'off'));?></td><td><?php
	//echo $this->Form->input('entryID',array('type'=>'hidden','value'=>$entryID));
	echo $this->Form->end(__('Search')); ?> </td></tr></table>
	
	<?php 
		 echo  $this->Html->link(__('SEARCH BY BARCODE SCANNER'), array('controller'=>'Checkin_out_logs','action' => 'use_barcode')); ?>
	
	 <?php
	 echo "<br />";
	if(isset($userinfo)){
	 ?>
	
		<div class="cssui-usercard__body">
			<header class="cssui-usercard__header">
				<?php echo $this->Html->image(array('controller'=>'CheckinOutLogs','action'=>'prof_pic',$ecnumber) ,array("alt"=>"ID Image","height"=>"220","width"=>"200"));?>
				<div class="cssui-usercard__header-info">
					<h3 class="cssui-usercard__name">Stas <span class="cssui-usercard__name-label">Melnikov</span></h3>
					<span class="cssui-usercard__post">UI Developer</span>
				</div>
			</header>
			<div class="cssui-usercard__content">
				<div class="cssui-slider">

					<!-- the control elements of slider -->

					<input id="slide1" type="radio" class="cssui-slider__switch cssui-usercard__switch" name="slider-controls" checked autofocus>
					<label for="slide1" class="cssui-slider__control cssui-usercard__control"></label>
					<input id="slide2" type="radio" class="cssui-slider__switch cssui-usercard__switch" name="slider-controls">
					<label for="slide2" class="cssui-slider__control cssui-usercard__control"></label>
					<input id="slide3" type="radio" class="cssui-slider__switch cssui-usercard__switch" name="slider-controls">
					<label for="slide3" class="cssui-slider__control cssui-usercard__control"></label>

					<div class="cssui-slider__slides">

						<!-- first slide -->

						<div class="cssui-slider__slide">
							<h4 class="cssui-usercard__title">About me</h4>
							<div class="cssui-usercard__stats">
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-earth"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">Language</span>
										<span class="cssui-stats__value">English</span>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-location"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">Hometown</span>
										<span class="cssui-stats__value">London</span>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-calendar"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">Date of birth</span>
										<span class="cssui-stats__value">03 December 1990</span>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-man-woman"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">Relationship</span>
										<span class="cssui-stats__value">Married</span>
									</div>
								</div>
							</div>
						</div>

						<!-- second slide -->

						<div class="cssui-slider__slide">
							<h4 class="cssui-usercard__title">My Skills</h4>
							<div class="cssui-usercard__stats">
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-html"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">HTML</span>
										<span class="cssui-stats__value">85%</span>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-vue"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">VUE</span>
										<span class="cssui-stats__value">90%</span>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-angular"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">AngularJS</span>
										<span class="cssui-stats__value">70%</span>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-js"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">NodeJS</span>
										<span class="cssui-stats__value">82%</span>
									</div>
								</div>
							</div>
						</div>

						<!-- third slide -->

						<div class="cssui-slider__slide">
							<h4 class="cssui-usercard__title">My Contacts</h4>
							<div class="cssui-usercard__stats">
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-email"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">E-mail</span>
										<a href="#0" class="cssui-stats__value">text@gmail.com</a>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-phone"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">Phone</span>
										<a href="tel:79000000000" class="cssui-stats__value">7-900-000-00-00</a>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-whatsapp"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">WhatsApp</span>
										<span class="cssui-stats__value">+7 000 000-00-00</span>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-skype"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">Skype</span>
										<span class="cssui-stats__value">username</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="cssui-usercard__footer">
			<a href="#0" class="cssui-social cssui-usercard__social">
				<i class="cssui-icon icon-twitter"></i>
				<span class="cssui-social__name">twitter</span>
			</a>
			<a href="#0" class="cssui-social cssui-usercard__social">
				<i class="cssui-icon icon-linkedin"></i>
				<span class="cssui-social__name">linkedin</span>
			</a>
			<a href="#0" class="cssui-social cssui-usercard__social">
				<i class="cssui-icon icon-codepen"></i>
				<span class="cssui-social__name">codepen</span>
			</a>
		</footer>
	</article>
  <footer class="footer">
    <div class="main-container footer__container">
      <div class="footer__column">
        <span>You liked?</span>
        <a href="https://www.paypal.me/melnik909" class="donate"  rel="noopener noreferrer" target="_blank">Buy me a tea?</a>
      </div>
      <a href="https://stas-melnikov.ru" class="melnik909"  rel="noopener noreferrer" target="_blank">Developed by Stas Melnikov</a>
    </div>
  </footer>
  <?php } ?>