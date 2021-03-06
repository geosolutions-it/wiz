<?php
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/OpenLayers/OpenLayers.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/proj4js-combined.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/EPSG3003.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/EPSG32232.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/mylayerswitcher.js', CClientScript::POS_HEAD);
$edit=isset($edit)?($edit):(method_exists($model,"isEditable")?$model->isEditable():false);
// TODO: Condizionare in base al tipo di modello che viene passato (wr o geom o altro)?
$wr_id=isset($wr_id)?$wr_id:(isset($model->wr_id)?$model->wr_id:null);
$id=isset($id)?$id:(isset($model->geom))?$model->id:null;
$p_id=isset($p_id)?$p_id:(isset($model->parent_wr))?$model->parent_wr->id:null;


$layerslist= array(
		// identificatore => array( Nome, layer );
		'service_areas' => array('nome'=>'Aree di servizio', 'layer'=>'service_areas', 'visibility'=>'true' )
		,'pressioni' => array('nome'=>'Pressioni Minime', 'layer'=>'pressioni', 'visibility'=>'false' , 'visibility'=>'false')
		,'fi' => array('nome'=>'Captazione da Corsi di Acqua', 'layer'=>'fi', 'visibility'=>'false' , 'group'=>'Fonti')
		,'la' => array('nome'=>'Captazione da Laghi - Serbatoi', 'layer'=>'la', 'visibility'=>'false' , 'group'=>'Fonti')
		,'po' => array('nome'=>'Captazione da Campi - Pozzi', 'layer'=>'po', 'visibility'=>'false' , 'group'=>'Fonti')
		,'so' => array('nome'=>'Captazione da Sorgenti', 'layer'=>'so', 'visibility'=>'false' , 'group'=>'Fonti')
		,'pt' => array('nome'=>'Impianti di Potabilizzazione', 'layer'=>'pt', 'visibility'=>'false' , 'group'=>'Impianti')
		,'ad' => array('nome'=>'Adduttrici', 'layer'=>'ad', 'visibility'=>'false' , 'group'=>'Impianti')
		,'ac' => array('nome'=>'Opere di Accumulo', 'layer'=>'ac', 'visibility'=>'false' , 'group'=>'Impianti')
		,'pg' => array('nome'=>'Impianti di Pompaggio', 'layer'=>'pg', 'visibility'=>'false' , 'group'=>'Impianti')
		//,'di' => array('nome'=>'Rete di Distribuzione', 'layer'=>'di')
		,'rete' => array('nome'=>'Rete di Distribuzione', 'layer'=>'rete', 'visibility'=>'false' , 'visibility'=>'false')
		
);

?>
    <script type="text/javascript">
    /* <![CDATA[ */
        OpenLayers.IMAGE_RELOAD_ATTEMPTS = 1;
        // make OL compute scale according to WMS spec
        OpenLayers.DOTS_PER_INCH = 25.4 / 0.28;
/*
        // allow testing of specific renderers via "?renderer=Canvas", etc
        var renderer = OpenLayers.Util.getParameters(window.location.href).renderer;
        renderer = (renderer) ? [renderer] : OpenLayers.Layer.Vector.prototype.renderers;
*/
        // Set the water_request_geometries projection
        var wrgeom_projection = new OpenLayers.Projection("EPSG:<?php echo Yii::app()->params['geoserver']['water_request_geometries_srid']?>");
        
        // map ad layers
        var map, gmap, geoms, wfs, info;
        // controls
        var  ctrlSelect, drawPoligon, editPoligon, saveBtn, panelEdit;

        function init_map(){
            var sphericalMercator = new OpenLayers.Projection("EPSG:900913");
            var monte_mario = new OpenLayers.Projection("EPSG:3003");
            var options = {
                projection: sphericalMercator,
                displayProjection: sphericalMercator, 
                units: "m",
                maxExtent: new OpenLayers.Bounds(1140994.62343, 5374364.43607, 1272014.63947, 5467561.27361),

                //numZoomLevels: 30 ,
                controls:  [ new OpenLayers.Control.Navigation()     // abilita eventi del mouse
                ,             new OpenLayers.Control.MousePosition()     // posizione del mouse
                //,             new OpenLayers.Control.PanZoom()     // frecce blu e slide dello zoom
                ,            new OpenLayers.Control.ArgParser()      // url parser
               // ,             new OpenLayers.Control.Attribution() // riga con note del layer
               ,             new OpenLayers.Control.Scale() // visualizza scala attuale
                          ]
 
            };

			$('#map').height('750px');
			map = new OpenLayers.Map('map', options);

			// BACKGROUND LAYER OpenStreetmap 
 			gmap = new OpenLayers.Layer.OSM(null, null, { transitionEffect: 'resize'});
			
		    // Geoscopio come BaseLayer
			var ortofoto = new OpenLayers.Layer.WMS(
			        "Ortofoto 10k",
			        "<?php echo 'http://'.Yii::app()->params['geoserver']['ip'].':'.Yii::app()->params['geoserver']['port'].Yii::app()->params['geoserver']['path'].Yii::app()->params['geoserver']['wms']; ?>",
	                {
                        layers: '<?php echo Yii::app()->params['geoserver']['base_layers']['ofc'] ?>',// must be 900913
			            version:'1.1.0',
			            format: 'image/png'
			        },
			        { 
			        	isBaseLayer:true
			          	,displayOutsideMaxExtent:true
			        	,transitionEffect: 'resize'
                    	,resolutions: [	/*156543.03390625, 78271.516953125, 39135.7584765625,
		                				19567.87923828125, 9783.939619140625, 4891.9698095703125,
		                				2445.9849047851562, 1222.9924523925781, 611.4962261962891,
		                				305.74811309814453, 152.87405654907226, 76.43702827453613,
		                				38.218514137268066, 19.109257068634033, 9.554628534317017,*/
		                				4.202797730489227, 2.7999984880008166, 2.2399987904006537,
        		                    	1.3999992440004083, 0.6999996220002042, 0.5599996976001634,
        		                    	0.2799998488000817, 0.13999992440004086],
                		serverResolutions: [	4.202797730489227, 2.7999984880008166, 2.2399987904006537,
                		                    	1.3999992440004083, 0.6999996220002042, 0.5599996976001634,
                		                    	0.2799998488000817, 0.13999992440004086]		  
				    }
			    );
		    // Geoscopio come BaseLayer
			var ctr10 = new OpenLayers.Layer.WMS(
			        "CTR 10k",
			        "<?php echo 'http://'.Yii::app()->params['geoserver']['ip'].':'.Yii::app()->params['geoserver']['port'].Yii::app()->params['geoserver']['path'].Yii::app()->params['geoserver']['wms']; ?>",
	                {
                        layers: '<?php echo Yii::app()->params['geoserver']['base_layers']['ctr10k'] ?>',// must be 900913
			            version:'1.1.0',
			            format: 'image/png'
				            
			        },
			        { 
			        	isBaseLayer:true
			          	,displayOutsideMaxExtent:true
			        	,transitionEffect: 'resize'
		                ,resolutions: [	/*156543.03390625, 78271.516953125, 39135.7584765625,
		                				19567.87923828125, 9783.939619140625, 4891.9698095703125,
		                				2445.9849047851562, 1222.9924523925781, 611.4962261962891,
		                				305.74811309814453, 152.87405654907226, 76.43702827453613,
		                				38.218514137268066, 19.109257068634033, 9.554628534317017,*/
		                				3.0827983352888992, 2.7999984880008166, 2.2399987904006537,
        		                    	1.3999992440004083, 0.6999996220002042, 0.5599996976001634,
        		                    	0.2799998488000817, 0.13999992440004086],
                		serverResolutions: [	3.0827983352888992, 2.7999984880008166, 2.2399987904006537,
                		                    	1.3999992440004083, 0.6999996220002042, 0.5599996976001634,
                		                    	0.2799998488000817, 0.13999992440004086]		                				
				    }
			    );

			var ctr2 = new OpenLayers.Layer.WMS(
			        "CTR 2k",
			        "<?php echo 'http://'.Yii::app()->params['geoserver']['ip'].':'.Yii::app()->params['geoserver']['port'].Yii::app()->params['geoserver']['path'].Yii::app()->params['geoserver']['wms']; ?>",
	                {
                        layers: '<?php echo Yii::app()->params['geoserver']['base_layers']['ctr2k'] ?>',  // must be 900913
			            version:'1.1.0',
			            format: 'image/png'
				            
			        },
			        { 
			        	isBaseLayer:true
			          	,displayOutsideMaxExtent:true
			        	,transitionEffect: 'resize'
		                ,resolutions: [	/*156543.03390625, 78271.516953125, 39135.7584765625,
		                				19567.87923828125, 9783.939619140625, 4891.9698095703125,
		                				2445.9849047851562, 1222.9924523925781, 611.4962261962891,
		                				305.74811309814453, 152.87405654907226, 76.43702827453613,
		                				38.218514137268066, 19.109257068634033, 9.554628534317017,
		                				3.0827983352888992, 2.7999984880008166, 2.2399987904006537,*/
        		                    	1.3999992440004083, 0.6999996220002042, 0.5599996976001634,
        		                    	0.2799998488000817, 0.13999992440004086],
                		serverResolutions: [	1.3999992440004083, 0.6999996220002042, 0.5599996976001634,
                		                    	0.2799998488000817, 0.13999992440004086]		                				
				    }
			    );
			// Da qui partono gli Overlay
			var confini = new OpenLayers.Layer.WMS(
			        "Confini Comunali",
			        "<?php echo 'http://'.Yii::app()->params['geoserver']['ip'].':'.Yii::app()->params['geoserver']['port'].Yii::app()->params['geoserver']['path'].Yii::app()->params['geoserver']['wms']; ?>",
			        {
			            layers: 'comuni_supply',  // must be 900913
			            transparent: 'true',
			            format: 'image/png'
			        },
			        {
			        	opacity: .5
			          	,displayOutsideMaxExtent:true
			        	,transitionEffect: 'resize'
					}
			    );

<?php if($p_id){ ?>
			var parent = new OpenLayers.Layer.WMS(
                    "Parent",
                    "<?php echo 'http://'.Yii::app()->params['geoserver']['ip'].':'.Yii::app()->params['geoserver']['port'].Yii::app()->params['geoserver']['path'].Yii::app()->params['geoserver']['wms']; ?>",
                    {layers:'acque:wr_geom'
                    ,transparent: true
                    <?php echo isset($p_id)?',viewparams: \'wr_id:'.$p_id.'\'':'' ?>
                    },
                    {
                      isBaseLayer:false
                      ,displayOutsideMaxExtent:true
                      //,opacity: 0.7
                      ,typename: 'wr_geom' 
                      //,projection:monte_mario
                      ,transitionEffect: 'resize'
                    }
                );
<?php } ?>
            geoms = new OpenLayers.Layer.WFS(
                    "Geoms",
                    "<?php echo 'http://'.Yii::app()->params['geoserver']['ip'].':'.Yii::app()->params['geoserver']['port'].Yii::app()->params['geoserver']['path'].Yii::app()->params['geoserver']['wfs']; ?>",
                    {typename: 'acque:wr_geom'
                    <?php echo isset($wr_id)?',viewparams: \'wr_id:'.$wr_id.'\'':'' ?>
                    <?php echo isset($id)?',viewparams: \'id:'.$id.'\'':'' ?>
                    },
                    {
                        typename: 'wr_geom', 
                        featureNS: 'http://www.acque.net/', 
                        extractAttributes: true,
                        //projection: wrgeom_projection,
			          	displayOutsideMaxExtent:true,
                        transitionEffect: 'resize'
                    }
                );
            map.addLayers([	gmap
							,ortofoto
							,ctr10
							,ctr2
                         	,confini
							,geoms
							
	  <?php if($p_id) echo ',parent' ?>
							]);

<?php foreach($layerslist as $l_id => $l) {	?>
			var layer_<?php echo $l['layer']; ?> = new OpenLayers.Layer.WMS(
					"<?php echo $l['nome'] ?>",
    				"<?php echo 'http://'.Yii::app()->params['geoserver']['ip'].':'.Yii::app()->params['geoserver']['port'].Yii::app()->params['geoserver']['path'].Yii::app()->params['geoserver']['wms']; ?>",
		    		{
				        layers: "<?php echo $l['layer'] ?>",  // 3003
				        transparent: 'true',
				        format: 'image/png'
				    },
				    { 
				    	<?php if (array_key_exists('visibility', $l))  echo 'visibility:'.$l['visibility'].',';  ?>				        
			    		id:"<?php echo $l_id ; ?>"
				    	<?php if (array_key_exists('group', $l))
				    	echo ', group:\''.$l['group'].'\'' ; 
				    	 ?>
					}
				);
			map.addLayer(layer_<?php echo $l['layer']; ?>);

<?php }   	?>

<?php foreach(Wms::getLayers() as $l_id => $l) {	?>
var layer_<?php echo $l['name']; ?> = new OpenLayers.Layer.WMS(
		"<?php echo $l['title'] ?>",
		"<?php echo $l['url']; ?>",
		{
	        layers: "<?php echo $l['name'] ?>",
	        projection: "<?php echo $l['projection']; ?>",
	        transparent: 'true',
	        format: 'image/png'
	    },
	    { 
    		id:"<?php echo 'id'.$l['name'] ; ?>"
	    	, group:'Wms Personali'  
	    	
		}
	);
map.addLayer(layer_<?php echo $l['name']; ?>);

<?php }   	?>

<?php /*foreach(Wfs::getLayers() as $l_id => $l) {	?>
var layer_<?php echo $l['name']; ?> = new OpenLayers.Layer.WFS(
        "<?php echo $l['title']; ?>",
        "<?php echo $l['url']; ?>",
        {
			typename: "<?php echo $l['typename'].$l['name']; ?>"
        },
        {
            typename: "<?php echo $l['name']; ?>", 
            featureNS: "<?php echo $l['typenameurl']; ?>", 
            //extractAttributes: true,
            projection: "<?php echo $l['projection']; ?>",
          	displayOutsideMaxExtent:true,
            transitionEffect: 'resize'
        }
    );
map.addLayer(layer_<?php echo $l['name']; ?>);

<?php }   */	?>
            
            var panel = new OpenLayers.Control.Panel(
                    {displayClass: 'olControlEditingToolbar'}
                );
            panelEdit = new OpenLayers.Control.Panel(
                    {displayClass: 'olControlEditingToolbar panelEdit'}
                );
			panel.addControls([new OpenLayers.Control.Navigation(), new OpenLayers.Control.ZoomBox()]);
<?php if($edit): ?>         
            drawPoligon = new OpenLayers.Control.DrawFeature(
            	geoms, OpenLayers.Handler.Polygon,
                {displayClass: 'olControlDrawFeaturePolygon',
                 title: '<?php echo Yii::t('waterrequest', 'Create Geometry'); ?>'}
            );
            drawPoligon.featureAdded = function(feature) {
                feature.layer.eraseFeatures([feature]);
                feature.state = OpenLayers.State.INSERT;
                feature.layer.drawFeature(feature);
                commit();
//                trigger_add();      
            };
            editPoligon = new OpenLayers.Control.ModifyFeature(
            		geoms, 
                    {
                        mode: OpenLayers.Control.ModifyFeature.RESHAPE
                    	  //  |  OpenLayers.Control.ModifyFeature.ROTATE
                    	  //  |  OpenLayers.Control.ModifyFeature.RESIZE
                   		      |  OpenLayers.Control.ModifyFeature.DRAG
                   //   , createVertices:true
                   		, standalone: true
                   		, clickout: false
						, type: OpenLayers.Control.TYPE_TOGGLE
                        , title: '<?php echo Yii::t('waterrequest', 'Edit Polygon'); ?>'
	                }
                );
			editPoligon.events.register("activate",
										editPoligon,
										function(e){
											if(geoms.getFeatureByFid('wr_geom'+'.'+id_open))
												this.selectFeature(geoms.getFeatureByFid('wr_geom'+'.'+id_open));
										}
			);
            saveBtn = new OpenLayers.Control.Button({displayClass: 'saveButton', trigger: function() { commitEdit();}, title: '<?php echo Yii::t('waterrequest', 'Save changes'); ?>'});

            panel.addControls(
                [ drawPoligon ]
            );
           	panelEdit.addControls([editPoligon, saveBtn]);

<?php endif ?>
			ctrlSelect = new OpenLayers.Control.SelectFeature(geoms ,{toggle: true});
            map.addControl(ctrlSelect);
            map.addControl(new OpenLayers.Control.MyCustomLayerSwitcher({title: '<?php echo Yii::t('waterrequest', 'Choose Layers'); ?>'}));  // LayerSwitcher non usa il parametro Pixel per la draw()
            map.addControl(panel, new OpenLayers.Pixel(0,10));
            map.addControl(panelEdit, new OpenLayers.Pixel(0,10));
            map.addControl(new OpenLayers.Control.PanZoom(), new OpenLayers.Pixel(4,10));

			vectorLayer = new OpenLayers.Layer.Vector("<?php echo Yii::t('waterrequest', 'Search result'); ?>",{visibility: false});
			pointstyle  = {externalGraphic:"./images/arrow.png", graphicHeight: 22, graphicWidth: 25, graphicXOffset: -25, graphicYOffset: -21};
			Point = new OpenLayers.Feature.Vector(new OpenLayers.Geometry.Point(0,0),null,pointstyle);
			vectorLayer.addFeatures([Point]);
			map.addLayer(vectorLayer);

//			console.log(map.maxExtent);
//			console.log(map.projection);
            map.zoomToExtent(
     			 new OpenLayers.Bounds(1140994.62343, 5374364.43607, 1272014.63947, 5467561.27361)
			);
            ctrlSelect.activate();
            panelEdit.deactivate();

            // ******************** INFO WMS ****************
            var AutoSizeAnchored = OpenLayers.Class(OpenLayers.Popup.Anchored, {
		    	'autoSize': true
			});
            
    		info = new OpenLayers.Control.WMSGetFeatureInfo({
				url: '<?php echo 'http://'.Yii::app()->params['geoserver']['ip'].':'.Yii::app()->params['geoserver']['port'].Yii::app()->params['geoserver']['path'].Yii::app()->params['geoserver']['wms']; ?>', 
					    title: 'Identify features by clicking',
					    layers: [<?php $p=''; foreach($layerslist as $l_id => $l){ echo $p.'layer_'.$l['layer']; $p=',';} ?>],
					    queryVisible: true,
					    //infoFormat: 'application/vnd.ogc.gml',
					    //hover:true,  // disabilitato fino a che non cambio il format 
					    eventListeners: {
					        getfeatureinfo: function(event) {
								//if(event.features.length>0) // features viene popolato solo se specifico infoFormat: 'application/vnd.ogc.gml'
//					        	console.log(event);
//					        	console.log((new RegExp('caption class', 'i')).test(event.text));
								if((new RegExp('caption class', 'i')).test(event.text))
								{
									while(map.popups.length > 0){
										map.removePopup(map.popups[0]);
									}
						            map.addPopup(new AutoSizeAnchored(
							                "pollo", //id
							                map.getLonLatFromPixel(event.xy), //lonlat
							                null, //contentSize
							                event.text, // contentHTML
							                null, // anchor
							                true  // closeBox
							            ));
								}
					        }
					    }
				});
			panel.addControls([info]);
			info.activate();
			// ***********  FINE INFO WMS  ********************
        }
        
        
<?php if($edit): ?>
		function commit(){
	        var features = geoms.features;
	        var new_feature = new OpenLayers.Feature.Vector();
	        var poligoni = new OpenLayers.Geometry.MultiPolygon();
	        for (var i=0; i < features.length; i++) {
	            switch (features[i].state) {
	                case OpenLayers.State.INSERT:
	                  //alert(features[i].geometry);
	                  poligoni.addComponent(features[i].geometry);
	                  //features[i].state = null; // ATTENZIONE: overhead crescente
	                break;
	                case OpenLayers.State.UPDATE:
	                case OpenLayers.State.DELETE:
	                break;
	            }
	            
	        }
			
	        var geometry;
	        if(poligoni.components.length > 0){
		        new_feature.geometry = poligoni;
	        	geometry = new_feature.geometry; //.transform(map.projection , wrgeom_projection); 
	        }else
	        {
	        	geometry = 'MULTIPOLYGON EMPTY';
			}
	
			drawPoligon.deactivate();
	        doOverlayOpen('geom',geometry);
	        return true;
	    };
	
	   	function commitEdit(){
	        
	        var features = geoms.features;
	        var new_feature = new OpenLayers.Feature.Vector();
	        var poligoni = new OpenLayers.Geometry.MultiPolygon();
	        for (var i=0; i < features.length; i++) {
	            switch (features[i].state) {
	            	case OpenLayers.State.UPDATE:
	                	if(features[i].fid=="wr_geom."+id_open) // solo quello selezionato
	                    	poligoni.addComponent(features[i].geometry.components[0]);
	                  	break;
					default:
	                	break;
	            }
	            
	        } 
	        if(poligoni.components.length > 0){
		        new_feature.geometry = poligoni;
		        geoms.addFeatures([new_feature]);
	        	//alert(new_feature.geometry);  // DEBUG
	        	editPoligon.deactivate();
	        	doOverlayOpen('update_geom',new_feature.geometry);
	        }else
	        {
	        	editPoligon.deactivate();
			}
	
	        return true;
        };
<?php endif ?>

		function jumptolonlat(lon,lat){
		   if(!vectorLayer.getVisibility()){vectorLayer.setVisibility(true);}
		   var LonLat = new OpenLayers.LonLat(lon,lat).transform(new OpenLayers.Projection("EPSG:4326"),map.getProjectionObject());
		   map.setCenter(LonLat,16); 
		   Point.move(LonLat);
		   return false;
		}
		
		function fragmapquest(){
			// ************ change your country code for language localisation
			var lang='<?php echo Yii::app()->params['language']; ?>', spalte, zeile, resultdiv, displaytext, i,
			url="mapquestjs.php?q="+document.getElementById("query").value+"&limit=6"+"&lang="+lang,
			http = new XMLHttpRequest();
			http.open("GET",url,false);
			http.send(null);
			zeile=http.responseText.split("\n");
		   
			$("#resultTip").remove();

			resultdiv = $("#result");
			resultdiv.append('<div id="resultTip"><div class="resultTipArrow"></div><div class="resultTipContent">');
		   
			if(zeile.length<=1){
				$("#result .resultTipContent").append('<p style="color:#00008b">No search results founds</p>');
			}else{
				for(i=0;i<zeile.length;i++){
					spalte=zeile[i].split("\t");
					if((spalte[0]*spalte[0]>0)||(spalte[1]*spalte[1]>0)){
						if(i==0){
							jumptolonlat(spalte[0],spalte[1]);
						}
						displaytext=spalte[2];
						$("#result .resultTipContent").append('<a href=# onmouseup="jumptolonlat('+spalte[0]+','+spalte[1]+');"><p>'+displaytext+'</p></a>');
						
						if(i<zeile.length-2)
							$("#result .resultTipContent").append('<br>');
					}
				}
			}
			$("#result .resultTipContent").append('</div>');
			$("#resultTip").append('</div>');
			
			$('#resultTip .resultTipArrow').click(function() {
				$("#resultTip").fadeOut('slow');
			});
			
			return false;
		}
		
		jQuery(document).ready(function() {
			jQuery('#search').click(function() {
				$('#search_form').submit();
				return false;
			});
			
			jQuery('#query').focus(function() {  
				$(this).addClass("focusField");  
			});  
			jQuery('#query').blur(function() {  
				$(this).removeClass("focusField");  
			});
			
			//jQuery('#pressure_legend').hide();
			jQuery("input[id='OpenLayers.Control.LayerSwitcher_69_input_Pressioni\ Minime']").bind('click', function(){
				show_hide_pressure_legend();
			});
			
		});
		var pm_legend = false;
		function show_hide_pressure_legend() {
			if (pm_legend) {
				pm_legend = false;
				jQuery('#pressure_legend').hide();
			} 
			else {
				pm_legend = true;
				jQuery('#pressure_legend').show();
			}
			
			jQuery("input[id='OpenLayers.Control.LayerSwitcher_69_input_Pressioni\ Minime']").bind('click', function(){
				show_hide_pressure_legend();
			});
		}
		/* ]]> */
	</script>
  
    <div style="width: 99%;border: 1px solid #ccc; overflow: hidden; padding: 4px;background-color:#EAF2F5; margin-bottom:4px">
	<form id="search_form" action="" method="GET" onsubmit="fragmapquest(); return false;">
		<div style="margin-top:0px;z-index:1000;width:100%;padding-top:6px;padding-bottom:6px; padding-left:6px">
			<label for="query"><b><?php  echo Yii::t('waterrequest', 'Search for address');?>:</b></label> 
			<input type="text" id="query" name="q" size="103">
			<input type="image" id="search" src="images/search.png" style="position:absolute; margin-left:5px; cursor:pointer" alt="Search address" title="Search address"/>
		</div>
		<div id="result" style="position:absolute;margin-left:120px;z-index:1100;margin-top:30px"></div>
	</form>
	</div>
	
    <div id="map" class="cols">
		<div id="resize_map"></div>
		<div id="pressure_legend">
			<div class="p_legend" alt="" title=""><span id="p4" style="background:#c4c4c4;"></span>P &lt; 4</div>
			<div class="p_legend" alt="" title=""><span id="4p8" style="background:#fa4f47;"></span>4 &lt; P &lt; 8</div>
			<div class="p_legend" alt="" title=""><span id="8p15" style="background:#fb8a3d;"></span>8 &lt; P &lt; 15</div>
			<div class="p_legend" alt="" title=""><span id="15p25" style="background:#91ff00;"></span>15 &lt; P &lt; 25</div>
			<div class="p_legend" alt="" title=""><span id="25p50" style="background:#60feff;"></span>25 &lt; P &lt; 50</div>
			<div class="p_legend" alt="" title=""><span id="p50" style="background:#4b44ff;"></span>P &gt; 50</div>
		</div>

	</div>
  
    <script type="text/javascript">
    /* <![CDATA[ */
		init_map();
		
		var boxes = Object();

    	// aspetto 5 secondi e poi faccio zoom sulle geometrie caricate.
    	setTimeout(function() { 
	    	//alert(geoms.features.length);
			var bbox = null;
			for (var i = 0; i < geoms.features.length; i++) {
			    var geometry = geoms.features[i].geometry;
				//console.log('i='+i+'  geoms.features[i].fid='+geoms.features[i].fid+'  geometry.getBounds()='+ geometry.getBounds());
			    boxes[geoms.features[i].fid] = geometry.getBounds();
			    if (bbox == null) {
			        bbox = geometry.getBounds().clone();
			    } else {
			        bbox.extend(geometry.getBounds());
			    }
			}
			if (bbox == null)
				{}//alert('nulla');
			else
				map.zoomToExtent(bbox);
		},5000);
		
		// Allinea l'altezza del div della mappa con la sidebar
    	$('#map').height($('#map-sidebar').height()-56);
    	/* ]]> */
	</script>    
