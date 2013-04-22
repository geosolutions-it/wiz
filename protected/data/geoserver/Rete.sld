<?xml version="1.0" encoding="ISO-8859-1"?>
<StyledLayerDescriptor version="1.0.0" 
 xsi:schemaLocation="http://www.opengis.net/sld StyledLayerDescriptor.xsd" 
 xmlns="http://www.opengis.net/sld" 
 xmlns:ogc="http://www.opengis.net/ogc" 
 xmlns:xlink="http://www.w3.org/1999/xlink" 
 xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
  <!-- a Named Layer is the basic building block of an SLD document -->
  <NamedLayer>
    <Name>Rete</Name>
    <UserStyle>
    <!-- Styles can have names, titles and abstracts -->
      <Title>Rete style</Title>
      <Abstract>Render style for tubi_acq (rete)</Abstract>
      <!-- FeatureTypeStyles describe how to render different features -->
      <!-- A FeatureTypeStyle for rendering points -->
      <FeatureTypeStyle>
        <Rule>
          <Name>DI_rule</Name>
          <Title>DI rule</Title>
          <Abstract>A line</Abstract>
           <ogc:Filter>
             <ogc:PropertyIsGreaterThan>
               <ogc:PropertyName>codice_ato</ogc:PropertyName>
               <ogc:Literal>DI00000</ogc:Literal>
             </ogc:PropertyIsGreaterThan>
           </ogc:Filter>
           <LineSymbolizer>
            <Stroke>
              <CssParameter name="stroke">#00FFFF</CssParameter>
            </Stroke>
          </LineSymbolizer>
        </Rule>
      </FeatureTypeStyle>
    </UserStyle>
  </NamedLayer>
</StyledLayerDescriptor>