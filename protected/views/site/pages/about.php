<?php
$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<h1>About</h1>


<?php
    // See protected/messages/<locale>/about.php file for localized content
echo Yii::t('about', 'about_info' );
?>

