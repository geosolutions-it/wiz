<?php

return array (
		'Elevation' => 'Altitude',
        'phase_1_info'=>'<p>It is merely used for a <b>preliminary enquiry about water availability</b>.<br/>
        Users mark an area on the map. The system responds by stating whether the water is available or not, and, if it is not, how much more would be needed. As a complementary option, users may enquire about any excess water available in a specific area. The system automatically responds, so the water provider does not need to step in. This operation uses simple algorithms that can adapt to different cases. The estimated water  consumption is usually dictated by:
        <ul>
            <li>Municipality (with its own urban planning specifications)</li>
            <li>Intended use (E.g.: residential, non residential; hotel, camping, school, redevelopment, etc.)</li>
            <li>Planned number of properties, intended changes of use, intended industrial use, residents</li>
            <li>Other</li>
        </ul>
        <br/>
        The highest status such Requests for Water may take at this stage is a <b>Submitted</b> status (as soon as the Request is submitted).
        <br/>
        The level of local detail is the UTOE (Unità Territoriali Organiche Elementari): these are the most basic urban planning areas, each having its own descriptive and regulatory reference that must be used as guidance in the Urban Plan; next to each UTOE, the plan lists the maximum allowed size of any settlement, the maximum number of residents, the uses allowed for such areas, the required infrastructure and facilities.<br/>
        At the preliminary stage, a request may be further detailed in the Executive Request.</p>
        ',
        'phase_2_info'=>'<p>It is used to ask the provider for an <b>opinion about the implementation of an urban project</b>.<br/>
            Features and information requirements are the same as before, so they will not be described.<br/>
            In this case, the provider has to step in to approve (Approved status) or reject (Rejected status) your Request for Water, depending on the requirement and total water availability.<br/>
            As well as assessing the feasibility of the project, the provider will also provide a cost estimate.<br/>
            If confirmed (Confirmed status), the provider ‘reserves’ the requested amount of water resource and keeps it aside for the user until a set date.<br/>
            After the deadline, the request is automatically labelled as <b><i>Expired</i></b>.<br/><br/></p>',
        'phase_3_info'=>'<p>
            It is used to ask the provider for an opinion about some detail of the project (“Submitted” status), where the level of local detail is one parcel. Features and information requirements are the same as before, so they will not be described.<br/>
            In this case, the provider has to step in to approve (Approved status) or reject (Rejected status) your Request for Water, depending on the outcome of the simulations carried out on the grid; in addition, the provider may reserve to confirm its approval at a later date and temporarily reject it (“Later” status). If the approval is confirmed (“Confirmed” status), the project must be started before a deadline established by the provider (usually within 1 year); otherwise, the request is automatically labelled as Expired. 
            <br/>
            When the project is started, once the local authorities have served notice to the system, the status of the request is changed to “Being processed”. When the project is finished, the status of the request is changed to Completed.
        </p>
        <p>
             Each change of status generates a notice/sends an email to the user.</br>
             In addition, the procedure, including all comments and the date, may be monitored at all times.
        </p>',);
?>