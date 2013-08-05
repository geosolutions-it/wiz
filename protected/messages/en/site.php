<?php

return array (
'planner_intro' => '<h1>Welcome to <i>WIZ4Planners!</i></h1>
<p>
    This section is only available to professionals involved in local planning procedures. Urban planning is actually closely related, among other things, to the current availability and accessibility of drinking water, keeping in mind the problems of scarcity, infrastructural investments and costs that affect the delivery of such utility; all this, in a scenario of endless adaptation to the global effects of climate change, which inevitably affects the future scenario of each local area.<br/>
    WIZ4Planners is a tool that supports local planning decisions, in political as well as strictly technical terms, as it may be used to share information between the water provider and mayors, engineers or professionals, so that they can take informed decisions. Using a feature of the platform, a request, aka Request for Water, may be submitted to the water provider. 
</p>
<p> 
    Such procedure consists of three steps, the <b>Preliminary Step</b> (or Step 1), <b>Implementation Step</b> (or Step 2) and <b>Executive Step</b> (or Step 3). Such three steps do not have to follow a specific order, as their functions are conceptually different.
</p>
<h3>How is it used</h3>
<p>
    The system is very easy to use.<br/>
    In the window that opens by clicking on <img src="{imgurl}"/>,
    users can see all their <b>Requests for Water</b> in any status. <br/>
    To create a new request, they have to click on 
    <img src="{imgurl}"/>, on the top left corner of the window and then on {link}. <br/>
    Here, the request may be submitted in either way:
    <ul>
        <li><b>By drawing on the map</b></li>
        <li><b>By uploading a shape</b></li>
    </ul>
    Depending on the intended use, different details have to be provided to calculate the population equivalent and, accordingly, the water consumption. A name must also be given to each new project. <br/>
    After sending a <i>Water Request</i>, the query results come out:
    <ul>
        <li>The amount of water required for such project</li>
        <li>Total water availability</li>
        <li>Expected water availability in 2030, 2060 and 2090</li>
    </ul> 
    <br/>
    
    <b>If enough water is available, then the results are highlighted in green; if it is not, the results are shown on a red background.</b> This does not mean that the project cannot be implemented; however, the entire procedure will be, as it were, “labelled” with such result.
</p>',
//'Create new water request' => 'Crea una nuova richiesta di risorsa idrica',

'wrut_intro' => '<h1>Welcome to the <i>{appname}</i></h1>
<p>
    The window that opens by clicking on <img src="{water_image}"/> shows all the <b>Water Requests</b> that have been submitted. <br/>
    By clicking on a Water Request, the request may be either Approved or Rejected. The system may also be used to generate an EPANET file for each Water Request by clicking on the icon
    <img src="{document_epanet_image}"/>.
    <br/>
    Other features are available, for instance to change the list of intended uses 
    <img src="{zones_image}"/>, the parameters used to calculate the population equivalent <img src="{parameters_image}"/> and the formulae used to calculate the water requirement
    <img src="{formulas_image}"/>.
    
</p>',

//'follow the link' => 'seguite il link',
//'View feedback left by other users.' => 'Visualizza le valutazioni degli altri utenti.',

'citizen_intro' => '<h1>Welcome to <i>WIZ4All!</i></h1>
<p><b>Where does our water resource come from?<br/>
How much of the maximum available amount do we use?<br/>
How does this affect our life?<br/>
What should we expect to happen in the future?</b></p>
<p>In this section, you may find an answer to your questions.</p>
<p>The <b>WIZ4All</b> platform actually provides information about water resources – which is usually hard to come by – in order to raise awareness of such resource, so that keeping into consideration anything that revolves around it may become more important in our life choices.</p>
<p>By simply querying the system, you will learn about your area of interest:</p>
<ul>
    <li>The flow rate that matches your requirements</li>
    <li>The availability of water resources in terms of grid capacity right now or in future scenarios that reflect the effects of climate change</li>
    <li>The location and features of the sources your local drinking water comes from</li>
    <li>The location and features of the equipment that provides you with such utility (reservoirs, purification, pumping etc.)</li>
    <li>The technical specifications and layout of the waterworks</li>
    <li>The user’s perceived water quality standards</li>
</ul>
<p>With WIZ4All, you will even have the chance – and option – to give your important contribution to the achievement of an increasingly proper and efficient drinking water management system, helping us get a better insight into its quality.
</p>
<p>If you wish to tell us about your perception of your drinking water, please <b>{link_send_opinion}.</b></p>
<p>
    <b>{link_view_opinion}</b>
</p>',

'guest_intro' => 
'<h1>Welcome to the <i>{appname}</i></h1>

<p>
The WIZ Platform was developed as part of the EU project of the same name, LIFE+ - <b><a href="http://www.wiz-life.eu" target="_blank">WIZ: WaterIZe spatial planning</a></b>
 (including future drinking water management conditions to adapt to climate change): such project is co-funded by the European Union, and the participating bodies are Acque Spa, Autorità di Bacino del Fiume Arno, Ingegnerie Toscane Srl, and the Spanish partner Fundación Instituto Tecnológico de Galicia.
<br/><br/>
The WIZ Platform consists of two services: 
<a href="{link_wiz4all}">WIZ4ALL</a>
and
<a href="{link_login}">WIZ4PLANNERS</a>.
<br/><br/>
<a href="{link_wiz4all}"><img src="images/wiz4all.png"/></a>
Its purpose is to raise the awareness of citizens and businesses (as well as industry professionals and experts) about the need to keep the future conditions and availability of drinking water into consideration, in their life choices: it does this by providing them with information that is usually hard to come by (availability of the resource, water sources, and lots more). This is the only way to involve citizens in <b><i>“participatory water management"</i></b>, partly because it offers the option to enter details that extend the basic shared knowledge of the local situation of water. <b>Access is public.</b>
<div style="text-align: center;"> 
<table class="homepage_menu_table">
    <caption align="bottom" style="text-align: center">Information Map</caption>
<tr><td>{link_info_index}</td></tr>
</table>
<table class="homepage_menu_table">
<caption align="bottom" style="text-align: center">Displays Feedback</caption>
<tr><td>{link_quality_view}</td></tr>
</table>
<table class="homepage_menu_table">
<caption align="bottom" style="text-align: center">Sends Feedback</caption>
<tr><td>{link_quality_create}</td></tr>
</table>
</div>

<br/><br/>
<a href="{link_login}"><img src="images/wiz4planner.png"/></a>
It can provide important information to the local planning authorities, supporting them in their choices, so they can take “informed” decisions. The purpose is to integrate concepts and procedures for the protection and sustainable management of water in the urban planning procedures and in the planning of any built-up environment based on the impacts of climate change.
<b>Access is available to authorised users only</b> (for registration or information, contact 
<a href="mailto:wiz@wiz-life.eu">wiz@wiz-life.eu</a>).
<a href="{link_login}">Click here to enter.</a>
</p>
'
);

?>