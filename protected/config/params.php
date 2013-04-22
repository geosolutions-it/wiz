<?php
 return array (
  'language' => 'it',
  'adminEmail' => 'acque@cpr.it',
  'debugEmail' => 'acque@cpr.it',
  'debug_email' => true,
  'block_email' => false,
  'geoserver' => 
  array (
    'version' => '1.1.0',
    'protocol' => 'http://',
    'ip' => '131.114.33.66',
    'port' => 80,
    'path' => '/geoserver',
    'wms' => '/wms',
    'workspace' => 'acque',
    'layer_geom' => 'wr_geom',
    'default_srs' => 'EPSG:3003',
    'citystate_layer_srid' => 3003,
    'water_request_geometries_srid' => 3003,
    'pdf_geoms' => 'pdf_geoms',
    'layer_dem' => 'DTM10m',
    'service_areas_layer_srid' => 3003,
    'wfs' =>  '/wfs',
	'pdf_wms'=>array(
			'default'=>'idigm50kgrey',
			'1000'=>'rst2k_liv3',
			'11000'=>'idrst10k',
			'60000'=>'idigm50kgrey',
			'200000'=>'rst100k',
	),
  		
  ),
  'water_demand_unit' => 'l/s',
  'decimals' => 2,
  'pe_precision' => 0,
  'wd_precision' => 2,
  'margin_precision' => 2,
  'water_demand_range' => 10,
  'pe_abbreviation' => 'PE',
  'formulas' => 
  array (
    'pe' => 'ae',
    'da' => 'da',
    'dg' => 'dg',
  ),
  'geoserverIP' => '131.114.33.66',
  'geoserverPort' => '80',
  'geoserverPath' => '/geoserver/wms',
  'dateTimeFormat_unicode' => 'dd MMMM yyyy, HH:mm',
  'dateTimeFormat' => 'j F Y, H:i',
  'dateTimeFormatDB' => 'Y-m-d H:i:sO',
  'dateFormat' => 'j F Y',
  'EPANET' => 
  array (
    'section_marker_start' => '[',
    'section_marker_end' => ']',
    'section_regular_expression' => '/^\\[[a-zA-Z0-9]{1,}\\]/',
    'comment_marker' => ';',
    'section_junctions' => 'JUNCTIONS',
    'section_coordinates' => 'COORDINATES',
    'section_tags' => 'TAGS',
    'section_emitters' => 'EMITTERS',
    'section_quality' => 'QUALITY',
    'section_sources' => 'SOURCES',
    'tag_node_junction' => 'NODE',
    'source_type_junction' => 'CONCEN',
    'upload_dir' => 'epanet_uploads',
    'upload_max_size' => 10,
    'download_dir' => 'epanet_downloads',
    'download_filename_suffix' => '-WIZ-GENERATED',
    'junction_prefix' => 'WIZ_',
  ),
  'src_download_folder'=>'/download/',
  'src_zip_file'=>'wiz_latest.zip',
  'src_tar_file'=>'wiz_latest.tar',
  'shp_upload_folder' => '/../uploads/shp/',
  'transition' => 
  array (
    'upload_dir' => 'uploads/wrut',
    'upload_max_size' => 10,
  ),
  'plugins' =>
  array(
  	'upload_dir' => 'plugins',
  	'upload_max_size' => 20,
  ),
 'allstatuses'=>true,
 'pdf_dir'=>'pdf_download',
 'awstats'=>'http://wiz.acque.net/awstats/awstats.pl'
);
 ?>