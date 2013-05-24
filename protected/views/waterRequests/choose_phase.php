<?php
$this->breadcrumbs=array(
	Yii::t('waterrequest', 'Water Requests')=>array('index'),
	Yii::t('waterrequest', 'Choose Phase'),
);

/*
$this->menu=array(
	array('label'=>'Create WaterRequest Phase 1', 'url'=>array('create', 'phase'=>1)),
	array('label'=>'Create WaterRequest Phase 2', 'url'=>array('create', 'phase'=>2)),
);
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
*/
?>

<a class="div_link" href="<?php echo CController::createUrl('waterRequests/create',array('phase'=>1))?>">
<div id="phase_one" >
	<h3><?php echo Yii::t('waterrequest', 'Preliminary Phase'); ?></h3>
	<p>
		&Egrave; usata semplicemente per <b>indagare in via preventiva la disponibilità della risorsa idrica</b>.<br/>
		L’operatore identifica un'area sulla mappa. La risposta del sistema consiste nella
		dichiarazione o meno della disponibilità di acqua e, in caso negativo, nel deficit rilevato. In modo complementare,
		&egrave; possibile chiedere qual’&egrave; il surplus di risorsa idrica in una certa area. La risposta viene erogata automaticamente dal sistema,
		e non richiede quindi l'intervento diretto del gestore. Questa operazione si avvale di algoritmi semplici, ma che si adattano
		ai diversi casi presentati. Il consumo di risorsa idrica previsto rappresenta, in genere, una funzione di:
		<ul>
			<li>comune (con i propri parametri urbanistici)</li>
			<!-- <li>numero di abitanti equivalenti</li> -->
			<li>destinazione d'uso (Es.: Residenziale, Non Residenziale; Alberghi, Campeggi, Scuole, Piano di recupero residenziale, ecc.)</li>
			<li>numero di unità immobiliari previste, variazioni d'uso previste, tipo di attività industriale previsto, numero di abitanti</li>
			<li>altro</li>
		</ul>
		<br/>
		Lo stato più elevato che le Richieste di Risorsa Idrica possono assumere in questa fase &egrave; lo stato
		<b><i>Sottomesso</i></b> (acquisito nel momento in cui la richiesta viene inoltrata).
		<br/>
		Il livello territoriale di dettaglio &egrave; l' UTOE (Unità Territoriali Organiche Elementari):
		sono le unità urbanistiche elementari del Piano Strutturale, ciascuna delle quali con un riferimento
		descrittivo e normativo da utilizzare come guida nel Regolamento Urbanistico; il piano indica, per ogni UTOE,
		le dimensioni massime ammissibili degli insediamenti, il massimo numero di abitanti, le funzioni d'uso possibili
		per le aree comprese, le infrastrutture ed i servizi necessari. <br/>
		La richiesta in fase preliminare può essere successivamente dettagliata utilizzando Richieste di tipo esecutivo.
	</p>
</div>
</a>

<br/>

<a class="div_link" href="javascript:void(0);" onclick="$('#parent_wr_phase_one').show()">
	<div id="phase_two" >
		<h3><?php  echo Yii::t('waterrequest', 'Implementation Phase');?></h3>
		<p>
			Consente di chiedere al gestore un <b>parere sull'attuazione di un piano urbanistico</b><br/>
			Le funzioni e i dati richiesti sono gli stessi del caso precendente e quindi non vengono dettagliati.<br/>
			In questo caso &egrave; richiesto l'intervento del gestore, che potr&agrave; approvare (stato <b><i>Approvato</i></b>) o meno (stato <b><i>Rigettato</i></b>)
			la vostra <i>Richiesta di Risorsa Idrica</i>, a seconda della richiesta e della disponibilit&agrave; di risorsa idrica totale.<br/>
			Il gestore, oltre a valutare la fattibilit&agrave;, indicher&agrave; anche un costo approssimativo.<br/>
			In caso di conferma (stato <b><i>Confermato</i></b> il gestore 'prenoter&agrave;' il quantitativo di risorsa idrica richiesto
			e lo manterrà disponibile all'utente fino alla data indicata.<br/>
			Al termine del periodo la richiesta verr&agrave; automaticamente marcata come <b><i>Scaduta</i></b>.<br/><br/>
		</p>
	</div>
</a>
	<div id="parent_wr_phase_one" style="display:none;">
		<?php
			if ($dataProvider_phase_two) {
				
				$this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'parent-wr1-grid',
					'dataProvider'=>$dataProvider_phase_two,
					
					'columns'=>array(
						'id',
						'project',
						'timestampHR',
						array(
							'name'=>'rounded_water_demand',
							'value'=>'$data->rounded_water_demand." ".Yii::app()->params[\'water_demand_unit\']'
						),
						array(
	     					'name'=>'',
	     					'type'=>'raw',
	     					'value' => 'CHtml::link(Yii::t(\'waterrequest\', \'select\'),Yii::app()->urlManager->createUrl("waterRequests/create",array("phase"=>2,"parent"=>$data->id)))'
	    				)
					)
				));
			};
			echo CHtml::link(Yii::t('waterrequest', 'Create New Water Request'),CController::createUrl('waterRequests/create',array('phase'=>2)));		
		?>
	</div>


<br/>

<a class="div_link" href="javascript:void(0);" onclick="$('#parent_wr_phase_two').show()">
	<div id="phase_three">
		<h3><?php  echo Yii::t('waterrequest', 'Executive Phase');?></h3>
		<p>
			Consente di chiedere al gestore un <b>parere su una pianificazione di dettaglio</b> (stato <b><i>Sottomesso</i></b>),
			in cui il livello di dettaglio territoriale &egrave; rappresentato dai singoli lotti.
			Le funzioni necessarie e i dati richiesti sono gli stessi del caso precedente e quindi non vengono dettagliati. <br/>
			In questo caso &egrave; richiesto l'intervento diretto del gestore, che potrà approvare (stato <b><i>Approvato</i></b>) o meno
			(stato <b><i>Rigettato</i></b>) la vostra <i>Richiesta di Risorsa Idrica</i>, a seconda degli esiti delle simulazioni
			sulla rete di distribuzione; per il gestore &egrave; inoltre possibile riservare la conferma dell'approvazione ad un tempo futuro,
			rigettandola temporaneamente (stato <b><i>In Futuro</i></b>). In caso di conferma dell'approvazione
			(stato <b><i>Confermato</i></b>), &egrave; necessario avviare i lavori entro un tempo limite fissato dal gestore (tipicamente 1 anno)
			altrimenti la Richieste verrà automaticamente marcata come <b><i>Scaduta</i></b>. 
			<br/>
			Al momento dell'avvio, dopo apposita comunicazione al sistema da parte dell'amministrazione locale,
			lo stato si converte in <b><i>In Lavorarzione</i></b>. Al completamento dei lavori la richiesta &egrave; <b><i>Completata</i></b>.
		</p>
		<p>
			 Ogni transizione di stato genera una notifica/invio di una mail all'utente. 
			 Oltre tutto, &egrave; possibile vedere in ogni istante l'iter seguito, con i relativi commenti e data.
		</p>
	</div>	
</a>
	<div id="parent_wr_phase_two" style="display:none;">
		<?php
			if ($dataProvider_phase_three) {
				
				$this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'parent-wr2-grid',
					'dataProvider'=>$dataProvider_phase_three,
					
					'columns'=>array(
						'id',
						'project',
						'timestampHR',
						array(
							'name'=>'rounded_water_demand',
							'value'=>'$data->rounded_water_demand." ".Yii::app()->params[\'water_demand_unit\']'
						),
						array(
	     					'name'=>'',
	     					'type'=>'raw',
	     					'value' => 'CHtml::link(Yii::t(\'waterrequest\', \'select\'),Yii::app()->urlManager->createUrl("waterRequests/create",array("phase"=>3,"parent"=>$data->id)))'
	    				)
					)
				));
			};
			echo CHtml::link(Yii::t('waterrequest', 'Create New Water Request'),CController::createUrl('waterRequests/create',array('phase'=>3)));		
		?>
	</div>




