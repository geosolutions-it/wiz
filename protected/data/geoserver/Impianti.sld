<?xml version="1.0" encoding="ISO-8859-1"?>
<StyledLayerDescriptor version="1.0.0" 
 xsi:schemaLocation="http://www.opengis.net/sld StyledLayerDescriptor.xsd" 
 xmlns="http://www.opengis.net/sld" 
 xmlns:ogc="http://www.opengis.net/ogc" 
 xmlns:xlink="http://www.w3.org/1999/xlink" 
 xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
  <!-- a Named Layer is the basic building block of an SLD document -->
  <NamedLayer>
    <Name>Impianti</Name>
    <UserStyle>
    <!-- Styles can have names, titles and abstracts -->
      <Title>Differenti Impianti</Title>
      <Abstract>Render different point style for different plants</Abstract>
      <!-- FeatureTypeStyles describe how to render different features -->
      <!-- A FeatureTypeStyle for rendering points -->
      <FeatureTypeStyle>
        <Rule>
          <Name>AC_rule</Name>
          <Title>AC rule</Title>
          <Abstract>A red point</Abstract>
           <ogc:Filter>
             <ogc:PropertyIsGreaterThan>
               <ogc:PropertyName>CODICE_ATO</ogc:PropertyName>
               <ogc:Literal>AC00000</ogc:Literal>
             </ogc:PropertyIsGreaterThan>
           </ogc:Filter>
           <PointSymbolizer>
             <Graphic>
               <Mark>
                 <Fill>
                   <CssParameter name="fill">#AA6600</CssParameter>
                 </Fill>
               </Mark>
               <Size>6</Size>
             </Graphic>
           </PointSymbolizer>
        </Rule>
           
        <Rule>
          <Name>AD_rule</Name>
          <Title>AD rule</Title>
          <Abstract>A blue line</Abstract>
           <ogc:Filter>
             <ogc:PropertyIsGreaterThan>
               <ogc:PropertyName>CODICE_ATO</ogc:PropertyName>
               <ogc:Literal>AD00000</ogc:Literal>
             </ogc:PropertyIsGreaterThan>
           </ogc:Filter>
           <LineSymbolizer>
            <Stroke>
              <CssParameter name="stroke">#0000FF</CssParameter>
            </Stroke>
          </LineSymbolizer>
        </Rule>
           
        <Rule>
          <Name>DI_rule</Name>
          <Title>DI rule</Title>
          <Abstract>A line</Abstract>
           <ogc:Filter>
             <ogc:PropertyIsGreaterThan>
               <ogc:PropertyName>CODICE_ATO</ogc:PropertyName>
               <ogc:Literal>DI00000</ogc:Literal>
             </ogc:PropertyIsGreaterThan>
           </ogc:Filter>
           <LineSymbolizer>
            <Stroke>
              <CssParameter name="stroke">#00FFFF</CssParameter>
            </Stroke>
          </LineSymbolizer>
        </Rule>
        
        <Rule>
          <Name>FI_rule</Name>
          <Title>FI rule</Title>
          <Abstract>A point</Abstract>
           <ogc:Filter>
             <ogc:PropertyIsGreaterThan>
               <ogc:PropertyName>CODICE_ATO</ogc:PropertyName>
               <ogc:Literal>FI00000</ogc:Literal>
             </ogc:PropertyIsGreaterThan>
           </ogc:Filter>
           <PointSymbolizer>
             <Graphic>
               <Mark>
                 <Fill>
                   <CssParameter name="fill">#00EDDD</CssParameter>
                 </Fill>
               </Mark>
               <Size>6</Size>
             </Graphic>
           </PointSymbolizer>
        </Rule>
           
        <Rule>
          <Name>LA_rule</Name>
          <Title>LA rule</Title>
          <Abstract>A point</Abstract>
           <ogc:Filter>
             <ogc:PropertyIsGreaterThan>
               <ogc:PropertyName>CODICE_ATO</ogc:PropertyName>
               <ogc:Literal>LA00000</ogc:Literal>
             </ogc:PropertyIsGreaterThan>
           </ogc:Filter>
           <PointSymbolizer>
             <Graphic>
               <Mark>
                 <Fill>
                   <CssParameter name="fill">#00D346</CssParameter>
                 </Fill>
               </Mark>
               <Size>6</Size>
             </Graphic>
           </PointSymbolizer>
        </Rule>
      
        <Rule>
          <Name>PG_rule</Name>
          <Title>PG rule</Title>
          <Abstract>A blue point</Abstract>
           <ogc:Filter>
             <ogc:PropertyIsGreaterThan>
               <ogc:PropertyName>CODICE_ATO</ogc:PropertyName>
               <ogc:Literal>PG00000</ogc:Literal>
             </ogc:PropertyIsGreaterThan>
           </ogc:Filter>
           <PointSymbolizer>
             <Graphic>
               <Mark>
                 <Fill>
                   <CssParameter name="fill">#FF0000</CssParameter>
                 </Fill>
               </Mark>
               <Size>6</Size>
             </Graphic>
           </PointSymbolizer>
        </Rule>
           
        <Rule>
          <Name>PO_rule</Name>
          <Title>PO rule</Title>
          <Abstract>A point</Abstract>
           <ogc:Filter>
             <ogc:PropertyIsGreaterThan>
               <ogc:PropertyName>CODICE_ATO</ogc:PropertyName>
               <ogc:Literal>PO00000</ogc:Literal>
             </ogc:PropertyIsGreaterThan>
           </ogc:Filter>
           <PointSymbolizer>
             <Graphic>
               <Mark>
                 <Fill>
                   <CssParameter name="fill">#0000FF</CssParameter>
                 </Fill>
               </Mark>
               <Size>6</Size>
             </Graphic>
           </PointSymbolizer>
        </Rule>

        <Rule>
          <Name>PT_rule</Name>
          <Title>PT rule</Title>
          <Abstract>A green point</Abstract>
           <ogc:Filter>
             <ogc:PropertyIsGreaterThan>
               <ogc:PropertyName>CODICE_ATO</ogc:PropertyName>
               <ogc:Literal>PT00000</ogc:Literal>
             </ogc:PropertyIsGreaterThan>
           </ogc:Filter>
           <PointSymbolizer>
             <Graphic>
               <Mark>
                 <Fill>
                   <CssParameter name="fill">#CB00DD</CssParameter>
                 </Fill>
               </Mark>
               <Size>6</Size>
             </Graphic>
           </PointSymbolizer>
        </Rule>
        
        <Rule>
          <Name>SO_rule</Name>
          <Title>SO rule</Title>
          <Abstract>A point</Abstract>
           <ogc:Filter>
             <ogc:PropertyIsGreaterThan>
               <ogc:PropertyName>CODICE_ATO</ogc:PropertyName>
               <ogc:Literal>SO00000</ogc:Literal>
             </ogc:PropertyIsGreaterThan>
           </ogc:Filter>
           <PointSymbolizer>
             <Graphic>
               <Mark>
                 <Fill>
                   <CssParameter name="fill">#0086C9</CssParameter>
                 </Fill>
               </Mark>
               <Size>6</Size>
             </Graphic>
           </PointSymbolizer>
        </Rule>

      </FeatureTypeStyle>
    </UserStyle>
  </NamedLayer>
</StyledLayerDescriptor>