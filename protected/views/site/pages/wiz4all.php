<?php
$this->pageTitle=Yii::app()->name . ' - WIZ4ALL';
$this->breadcrumbs=array(
	'WIZ4All',
);
?>

<h1>Benvenuti in <i>WIZ4All!</i></h1>
<p><b>Da dove viene la nostra acqua?<br/>Quanta ne usiamo rispetto alla quantit&agrave; massima disponibile?<br/>Questo ha degli effetti
sulle nostre vite?<br/>Cosa dovremmo aspettarci in futuro?</b></p>
<p>In questa sezione, le vostre domande potranno trovare una risposta.</p>
<p>La piattaforma <b>WIZ4All</b> rende infatti disponibili una serie di informazioni sulla risorsa idrica &ndash; di solito difficili da
reperire &ndash; con l'obiettivo di diffonderne la conoscenza il pi&ugrave; possibile, cos&igrave; che la reale considerazione delle questioni ad
essa relative possa assumere una maggiore importanza nelle nostre scelte di vita.</p>
<p>Con una semplice <i>richiesta al sistema</i>, avrete la possibilit&agrave; di conoscere, per una determinata zona
territoriale:</p>
<ul>
	<li>i <b>valori di portata</b> corrispondenti alla vostra richiesta</li>
	<li>la <b>disponibilit&agrave; di risorsa idrica</b>, in termini di capacit&agrave; della rete di 
		distribuzione, allo stato attuale e in scenari futuri che tengono conto del cambiamento
		climatico</li>
	<li>la <b>posizione e la caratteristica</b> delle fonti da cui proviene l'acqua potabile distribuita nella
		vostra area</li>
	<li>l'<b>ubicazione e le caratteristiche</b> degli impianti che garantiscono il servizio (serbatoi, potabilizzazione,
		pompaggio,ecc)</li>
	<li>le <b>caratteristiche tecniche e la planimetria</b> della rete acquedotto</li>
	<li>i <b>parametri di qualità dell'acqua</b> percepiti dall'utente. 
		Grazie a WIZ4All avete anche la possibilit&agrave; &ndash; e opportunit&agrave; &ndash; di dare
		un vostro importante contributo al raggiungimento di una sempre pi&ugrave; corretta ed efficiente
		gestione dell'acqua potabile, aiutandoci nella <b>rilevazione delle sue caratteristiche qualitative</b>.
	</li>
	<!--
	<li><p><span style="font-weight: normal">la </span><b>disponibilit&agrave;	di risorsa idrica</b>, in termini di capacit&agrave; della rete di
	distribuzione, nel presente e in scenari futuri</p></li>
	<li><p><span style="font-weight: normal">i </span><b>soggetti che si occupano della fornitura di acqua,</b> e i relativi costi</p></li>
	<li><p>la <b>fonte</b> da cui proviene l'acqua potabile distribuita</p></li>
	<li><p>il <b>percorso dell'acqua, dalla fonte al &ldquo;rubinetto&rdquo;</b>, ed ovviamente l'ubicazione e le caratteristiche degli impianti che
	lo rendono possibile (serbatoi, potabilizzazione, pompaggio, ecc.)</p></li>
	<li><p>le <b>caratteristiche della rete</b>: tecniche (diametro,
	materiale, ecc.) e di servizio (rotture, perdite, ecc.)</p></li>
	<li><p>il <b>costo stimato (economico e ambientale)</b> dei servizi	di trasporto, potabilizzazione,  distribuzione dell&rsquo;acqua,
	nel presente e in scenari futuri</p></li>
	<li><p>i parametri di <b>qualit&agrave; dell&rsquo;acqua</b>: sia quelli percepiti dall&rsquo;utente sia quelli misurati, in modo
	specifico, durante il processo di distribuzione (alle fonti, presso	stazioni di potabilizzazione, ecc.)</p></li>
-->	
</ul>

<!--
<p>Grazie a WIZ4All avete anche la possibilit&agrave; &ndash; e opportunit&agrave; &ndash; di dare un vostro importante contributo al raggiungimento di una sempre pi&ugrave; corretta ed efficiente
gestione dell'acqua potabile, aiutandoci nella <b>rilevazione delle sue caratteristiche qualitative</b>. 
</p>-->
<?php if (!Yii::app()->user->isGuest):?>
	<p>Se desiderate segnalarci la<span style="font-weight: normal">
	qualit&agrave; da voi percepita dell'acqua potabile erogata, </span><b><?php echo CHtml::link('seguite il link', CController::createUrl('waterQualityOpinions/index',array())); ?>.</b></p>
<?php else: ?>
	<p>Se desiderate segnalarci la<span style="font-weight: normal">
	qualit&agrave; da voi percepita dell'acqua potabile erogata, </span><b><?php echo CHtml::link('eseguite il login', CController::createUrl('site/login')); ?>.</b></p>
<?php endif; ?>

<p>
	<b><?php echo CHtml::link('Visualizza le valutazioni degli altri utenti', CController::createUrl('waterQualityOpinions/view',array())); ?>.</b>
</p>	