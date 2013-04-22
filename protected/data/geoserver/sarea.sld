<?xml version="1.0" encoding="ISO-8859-1"?>
<StyledLayerDescriptor version="1.0.0" 
 xsi:schemaLocation="http://www.opengis.net/sld StyledLayerDescriptor.xsd" 
 xmlns="http://www.opengis.net/sld" 
 xmlns:ogc="http://www.opengis.net/ogc" 
 xmlns:xlink="http://www.w3.org/1999/xlink" 
 xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
  <!-- a Named Layer is the basic building block of an SLD document -->
  <NamedLayer>
    <Name>sarea</Name>
    <UserStyle>
    <!-- Styles can have names, titles and abstracts -->
      <Title>SArea</Title>
      <Abstract>A sample style that draws a polygon</Abstract>
      <!-- FeatureTypeStyles describe how to render different features -->
      <!-- A FeatureTypeStyle for rendering polygons -->
      <FeatureTypeStyle>
        
        <Rule>
          <Name>rule1</Name>
          <Title>Service_Areas</Title>
          <Abstract>A polygon filler</Abstract>
          
          <ogc:Filter>
             <ogc:PropertyIsEqualTo>
               <ogc:PropertyName>virtuale</ogc:PropertyName>
               <ogc:Literal>false</ogc:Literal>
             </ogc:PropertyIsEqualTo>
          </ogc:Filter>
          
          <PolygonSymbolizer>
            <Fill>
              <CssParameter name="fill">
                <ogc:Literal>#FCAEE7</ogc:Literal>
              </CssParameter>
              <CssParameter name="fill-opacity">
                <ogc:Literal>0.6</ogc:Literal>
              </CssParameter>
            </Fill>
            <Stroke>
              <CssParameter name="stroke">
                <ogc:Literal>#C65DB7</ogc:Literal>
              </CssParameter>
            </Stroke>
          </PolygonSymbolizer>
          
        </Rule>

      </FeatureTypeStyle>
    </UserStyle>
  </NamedLayer>
</StyledLayerDescriptor>