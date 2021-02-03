
<h2><?php echo __('Main Report');?></h2>
<?php 	
 echo $this->Form->create('StaffDetails',array('action' => 'main_report_excel'));
//echo $this->Form->input('ecnumber',array('type'=>'hidden','value'=>$ecnumber));
 /*echo $this->Form->input('kaYrFrm',array('type'=>'hidden','value'=>$kaYrFrm));
 echo $this->Form->input('kaMnthFrm',array('type'=>'hidden','value'=>$kaMnthFrm));
 */
 echo $this->Form->end('Download Excel Of The Report'); 
 echo "<br />"; 
	?>

<table width="50%" border="1" align= "center">
	<tr>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('EC Number'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Firstname'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Surname'); ?></th>	  
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Jan::Taken  Balance'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Feb::Taken  Balance'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Mar::Taken  Balance'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Apr::Taken  Balance'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('May::Taken  Balance'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Jun::Taken  Balance'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Jul::Taken  Balance'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Aug::Taken  Balance'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Sept::Taken Balance'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Oct::Taken  Balance'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Nov::Taken  Balance'); ?></th>
	   <th width="18%" style="white-space:nowrap;"><?php echo __('Dec::Taken  Balance'); ?></th>
	   
	  
	 

   </tr>
<?php 

for($i=0; $i < sizeof($data); $i++ ){?>
<tr>	
    <td><?php echo $data[$i]['staffDetails']['StaffDetail']['ecnumber'] ?></td>	
	<td><?php echo $data[$i]['staffDetails']['StaffDetail']['firstname'] ?></td>
	<td><?php echo $data[$i]['staffDetails']['StaffDetail']['lastname'] ?></td>
	<td style ="padding-left:5em;"><?php echo $data[$i]['janData']['MonthlyTakenDay']['days_taken'] ?>
	<?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data[$i]['janData']['MonthlyTakenDay']['balance_days'] ?></td>
	<td style ="padding-left:5em;"><?php echo $data[$i]['febData']['MonthlyTakenDay']['days_taken'] ?>
	<?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data[$i]['febData']['MonthlyTakenDay']['balance_days'] ?></td>
	<td style ="padding-left:5em;"><?php echo $data[$i]['marchData']['MonthlyTakenDay']['days_taken'] ?>
	<?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data[$i]['marchData']['MonthlyTakenDay']['balance_days'] ?></td>
	<td style ="padding-left:5em;"><?php echo $data[$i]['aprilData']['MonthlyTakenDay']['days_taken'] ?>
	<?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data[$i]['aprilData']['MonthlyTakenDay']['balance_days'] ?></td>
	<td style ="padding-left:5em;"><?php echo $data[$i]['mayData']['MonthlyTakenDay']['days_taken'] ?>
	<?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data[$i]['mayData']['MonthlyTakenDay']['balance_days'] ?></td>
	<td style ="padding-left:5em;"><?php echo $data[$i]['juneData']['MonthlyTakenDay']['days_taken'] ?>
	<?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data[$i]['juneData']['MonthlyTakenDay']['balance_days'] ?></td>
	<td style ="padding-left:5em;"><?php echo $data[$i]['julyData']['MonthlyTakenDay']['days_taken'] ?>
	<?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data[$i]['julyData']['MonthlyTakenDay']['balance_days'] ?></td>
	<td style ="padding-left:5em;"><?php echo $data[$i]['augData']['MonthlyTakenDay']['days_taken'] ?>
	<?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data[$i]['augData']['MonthlyTakenDay']['balance_days'] ?></td>
	
	
	<?php if (!empty($data[$i]['septData']['MonthlyTakenDay']['days_taken'])){?>
	<td style ="padding-left:5em;"><?php echo $data[$i]['septData']['MonthlyTakenDay']['days_taken'] ?>
	<?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data[$i]['septData']['MonthlyTakenDay']['balance_days'] ?></td>
	<?php } ?>
	<?php if (empty($data[$i]['septData']['MonthlyTakenDay']['days_taken'])){
	$liam = 0;
	?>
	<td style ="padding-left:5em;"><?php echo $liam ?>
	<?php 
	//debug($septDat);die();
	echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$septDat ?></td>
	<?php } ?>	
	<td style ="padding-left:5em;">
	<?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data[$i]['octData']['MonthlyTakenDay']['balance_days'] ?></td>
	<td style ="padding-left:5em;"><?php echo $data[$i]['novData']['MonthlyTakenDay']['days_taken'] ?>
	<?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data[$i]['novData']['MonthlyTakenDay']['balance_days'] ?></td>
	<td style ="padding-left:5em;"><?php echo $data[$i]['decData']['MonthlyTakenDay']['days_taken'] ?>
	<?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$data[$i]['decData']['MonthlyTakenDay']['balance_days'] ?></td>
	
	
	
    
		
	
	<?php } ?>
  </table> 
  
  
  