<?php	
$this->breadcrumbs=array(
	Yii::t('statistics', 'Statistics'),
);

$this->menu=array(
	
);

?>

<h1><?php  echo Yii::t('statistics', 'Statistics');?></h1>


<?php
	if ($total_wrs===null): 
		echo 'Non sono state trovate Richieste di Risorsa Idrica';
	else:
		
		echo CHtml::beginForm(); ?>    
		<div class="row">
		<?php echo CHtml::dropDownList('city', $selection, $city, array('empty'=>Yii::t('statistics', 'Select a city state'))); ?>
		<?php echo CHtml::submitButton(Yii::t('statistics', 'Filter')); ?>
		</div>
		<?php echo CHtml::endForm(); ?>

		<br/><br/>
		<p>

			<b><?php echo Yii::t('statistics', 'Total Water Request'); ?></b>: <?php echo $total_wrs; ?>
	
	
			<?php foreach ($stat as $year=>$content)
				echo '<h6>'.$year.': '.$content['total'].' ('.round($content['pe'],2).')</h6>';
				echo '<table>';
				echo '<tr><td><i>'.Yii::t('statistics', 'Month').'</i></td><td><i>'.Yii::t('statistics', 'Total WR').'</i></td><td><i>'.Yii::t('statistics', 'Total PE').'</i></td></tr>';
				echo '<tbody>';
				foreach ($content as $k=>$v) {
					if ($k!='total' && $k!='pe')
						echo '<tr><td>'.Yii::t('generic', $k).'</td><td>'.$v['total'].'</td><td>'.round($v['pe'], 2).'</td></tr>';
				}
				echo '</tbody></table>';
			?>
		</p>
<?php endif; ?>



