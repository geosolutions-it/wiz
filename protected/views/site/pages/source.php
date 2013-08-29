<?php
$this->pageTitle=Yii::app()->name . ' - Download Codice Sorgente';
$this->breadcrumbs=array(
	'Codice Sorgente',
);
?>
<h1><?php echo Yii::t('source', 'Source Code Download'); ?></h1>
<?php echo Yii::t(
                    'source',
                    'sourcecode_info',
                    array(
                        '{download_zip}'=> CHtml::link(   CHtml::image("images/zip_icon.png").'<br/> '.Yii::t('source', 'Download').' Zip',
                                    Yii::app()->baseUrl.Yii::app()->params['src_download_folder'].Yii::app()->params['src_zip_file'],
                                    array('class'=>'source-link')),
                        '{download_tar}'=> CHtml::link(   CHtml::image("images/tar_icon.png").'<br/> '.Yii::t('source', 'Download').' Tar',
                                    Yii::app()->baseUrl.Yii::app()->params['src_download_folder'].Yii::app()->params['src_tar_file'],
                                    array('class'=>'source-link')),
                        '{github_link}'=> CHtml::link(   CHtml::image("images/githubmark.png").'<br/> '.Yii::t('source', 'Download from Github'),
                                    Yii::app()->params['src_download_github'],
                                    array('class'=>'source-link'))
                    )
        );
?>