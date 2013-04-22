<?php
$this->breadcrumbs=array(
	Yii::t('statistics', 'Statistics'),
);

$this->menu=array(
	
);
?>

<h1><?php  echo Yii::t('statistics', 'Statistics');?></h1>


<iframe id='idIframe' src='<?php echo Yii::app()->params['awstats']; ?>' onload='iframeLoaded()' width='1200px'>
	Non sei autorizzato a visualizzare questa pagina
</iframe>

<script type="text/javascript">
    function iframeLoaded()
    {
        var iFrameID = document.getElementById('idIframe');

        if(iFrameID)
        {
            // here you can meke the height, I delete it first, then I make it again
            iFrameID.height = "";
            iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight+20 + "px";
        }   
    }
</script> 

