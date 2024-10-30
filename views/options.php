<div class="category-head">
		<table width="100%">
		<tr>
			<td width="80px">
				<span class="category-logo"><?php echo opictf_icon_logo('options.png',array('width'=>'80px')) ?></span>
				</td>
			<td>
				<h1 class="category-title"><?php echo $this->getLang('control-options') ?></h1>
				</td>
		</tr>
	</table>	
	
</div>
<hr />
<?php
$TFHtml = new html_tf_helper();

$timeList['']                 = $this->getLang('label-select');
$timeList['everyhour']        = $this->getLang('label-hourly');
$timeList['everysixhours']    = $this->getLang('label-every_six_hours');
$timeList['everytwelvehours'] = $this->getLang('label-every_twelve_hours');
$timeList['everyday']         = $this->getLang('label-daily');
$timeList['everytwodays']     = $this->getLang('label-two_days');
$timeList['weakly']           = $this->getLang('label-weakly');


echo $TFHtml -> Input('select', array('name' => 'cronjobtime', 'options' => $timeList, 'label' =>$this->getLang('label-import_data_time')));
echo $TFHtml->Input('text',array('name' => 'source', 'label' => $this->getLang('label-source')));
?>