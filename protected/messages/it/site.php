<?php

return array (
'planner_intro' => '<h1>Benvenuti in <i>WIZ4Planners!</i></h1>
<p>
    Questa &egrave; la sezione riservata a tutti i soggetti coinvolti nel processo di <b>pianificazione territoriale</b>.
    La pianificazione urbanistica, infatti, &egrave; strettamente legata, tra le altre cose, alla <b>disponibilit&agrave; e accessibilit&agrave; attuale
    e futura di acqua potabile</b>, tenuto conto dei problemi di scarsit&agrave;, investimenti infrastrutturali e relativi costi 
    che ne caratterizzano l\'erogazione; tutto questo in un contesto di costante adattamento agli effetti globali del cambiamento 
    climatico, che influenzano inevitabilmente gli scenari futuri del territorio. <br/>
    WIZ4Planners rappresenta uno strumento di guida 
    nelle scelte di pianificazione territoriale, sia dal punto di vista politico sia dal punto di vista più strettamente tecnico, 
    consentendo  una condivisione di informazioni tra il gestore della risorsa idrica e sindaci, tecnici, professionisti, 
    permettendo l\'assunzione di <b>decisioni informate</b>. &Egrave; possibile sottomettere una richiesta al gestore, 
    la <b><i>Richiesta di Risorsa Idrica</i></b>, attraverso le funzionalit&agrave; messe a disposizione della piattaforma. 
</p>
<p> 
    Sono previste tre procedure , distinte tra <b>Fase preliminare</b> (o <b>Fase 1</b>), <b>Fase attuativa</b> (o <b>Fase 2</b>) e <b>Fase esecutiva</b> (o <b>Fase 3</b>). 
    Le tre procedure non sono soggette ad obblighi di sequenzialit&agrave;, incorporando funzioni
    tra loro concettualmente diverse.
</p>
<h3>Come si usa</h3>
<p>
    L\'utilizzo del sistema &egrave; molto semplice. <br/>
    Nella schermata raggiungibile da <img src="{imgurl}"/>,
    l\'operatore &egrave; in grado di vedere tutte le sue <i>Richieste di Risorsa Idrica</i> create, in qualsiasi stato. <br/>
    Per creare una nuova richiesta &egrave; necessario cliccare su
    <img src="{imgurl}"/>, in alto a sinistra nella schermata e successivamente
    su {link}. <br/>
    Da qui &egrave; possibile inserire la richiesta con due modalit&agrave;:
    <ul>
        <li><b>Disegnare sulla mappa</b></li>
        <li><b>Caricare uno shape</b></li>
    </ul>
    A seconda della destinaione d\'uso, dovranno essere compilati determinati parametri, necessari per il calcolo degli abitanti equivalenti
    e, quindi, del consumo di risorsa idrica. &Egrave; inoltre obbligatorio dare un nome al progetto generato. <br/>
    All\'inoltro della <i>Richiesta di Risorsa Idrica</i>, compariranno i risultati dell\'interrogazione:
    <ul>
        <li>la quantit&agrave; di risorsa idrica necessaria per la realizzazione di quel progetto</li>
        <li>la disponibilit&agrave; idrica totale</li>
        <li>le previsioni sulla risorsa al 2030, al 2060 e al 2090</li>
    </ul> 
    <br/>
    
    <b>Se la risorsa &egrave; sufficiente, i risultati saranno evidenziati in verde; in caso contrario, lo sfondo ai dati sar&agrave; di colore rosso</b>.
    Questo non implica l\'impossibilit&agrave; di procedere all\'implementazione; tuttavia, l\'intera procedura sar&agrave;, in un certo senso,
    “etichettata” da questo risultato.
    <!-- Infine, l\'operatore viene messo al corrente dell\'eventuale esistenza di altre richieste inoltrate per quella stessa area. -->
</p>',
'Create new water request' => 'Crea una nuova richiesta di risorsa idrica',

'wrut_intro' => '<h1>Benvenuti in <i>{appname}</i></h1>
<p>
    Nella schermata raggiungibile da <img src="{water_image}"/>,
    &egrave; possibile visualizzare tutte le <i>Richieste di Risorsa Idrica</i> che sono state sottomesse. <br/>
    Cliccando su ogni singola <i>Richieste di Risorsa Idrica</i>, &egrave; possibile <i>Approvare</i> o <i>Rigettare</i> la richiesta.
    Il sistema permette anche di generare un file <b>EPANET</b> associato ad ogni <i>Richieste di Risorsa Idrica</i>, cliccando sull\'icona
    <img src="{document_epanet_image}"/>.
    <br/>
    Sono disponibili anche funzionalit&agrave; che permettono di modificare la lista delle destinazioni d\'uso
    <img src="{zones_image}"/>, i parametri utilizzati per il calcolo degli abitanti
    equivalenti <img src="{parameters_image}"/> e le formule per il calcolo dell\'idroesigenza
    <img src="{formulas_image}"/>.
    
</p>',

'follow the link' => 'seguite il link',
'View feedback left by other users.' => 'Visualizza le valutazioni degli altri utenti.',
'citizen_intro' => '<h1>Benvenuti in <i>WIZ4All!</i></h1>
<p><b>Da dove viene la nostra acqua?<br/>Quanta ne usiamo rispetto alla quantit&agrave; massima disponibile?<br/>Questo ha degli effetti
sulle nostre vite?<br/>Cosa dovremmo aspettarci in futuro?</b></p>
<p>In questa sezione, le vostre domande potranno trovare una risposta.</p>
<p>La piattaforma <b>WIZ4All</b> rende infatti disponibili una serie di informazioni sulla risorsa idrica &ndash; di solito difficili da
reperire &ndash; con l\'obiettivo di diffonderne la conoscenza il pi&ugrave; possibile, cos&igrave; che la reale considerazione delle questioni ad
essa relative possa assumere una maggiore importanza nelle nostre scelte di vita.</p>
<p>Con una semplice <i>richiesta al sistema</i>, avrete la possibilit&agrave; di conoscere, per una determinata zona
territoriale:</p>
<ul>
    <li>i <b>valori di portata</b> corrispondenti alla vostra richiesta</li>
    <li>la <b>disponibilit&agrave; di risorsa idrica</b>, in termini di capacit&agrave; della rete di 
        distribuzione, allo stato attuale e in scenari futuri che tengono conto del cambiamento
        climatico</li>
    <li>la <b>posizione e la caratteristica</b> delle fonti da cui proviene l\'acqua potabile distribuita nella
        vostra area</li>
    <li>l\'<b>ubicazione e le caratteristiche</b> degli impianti che garantiscono il servizio (serbatoi, potabilizzazione,
        pompaggio,ecc)</li>
    <li>le <b>caratteristiche tecniche e la planimetria</b> della rete acquedotto</li>
    <li>i <b>parametri di qualit&agrave; dell\'acqua</b> percepiti dall\'utente</li>
</ul>
<p>Grazie a WIZ4All avete anche la possibilit&agrave; &ndash; e opportunit&agrave; &ndash; di dare un vostro importante contributo al raggiungimento di una sempre pi&ugrave; corretta ed efficiente
gestione dell\'acqua potabile, aiutandoci nella <b>rilevazione delle sue caratteristiche qualitative</b>. 
</p>
<p>Se desiderate segnalarci la<span style="font-weight: normal">
qualit&agrave; da voi percepita dell\'acqua potabile erogata, </span><b>{link_send_opinion}.</b></p>
<p>
    <b>{link_view_opinion}</b>
</p>',

'guest_intro' => 
'<h1>Benvenuti in <i>{appname}</i></h1>

<p>
La piattaforma WIZ &egrave; stata realizzata all\'interno dell\'omonimo progetto comunitario LIFE+ -
<b><a href="http://www.wiz-life.eu" target="_blank">WIZ: WaterIZe spatial planning</a></b>
(<i>"Acquifichiamo" la pianificazione territoriale: includere le condizioni future di gestione dell\'acqua potabile per adattarsi al
cambiamento climatico</i>): il progetto &egrave; co-finanziato dalla Comunit&agrave; Europea e portato avanti da Acque Spa, l\'Autorit&agrave; di Bacino
del Fiume Arno, Ingegnerie Toscane Srl, e il partner spagnolo Fundación Instituto Tecnológico de Galicia.
<br/><br/>
La piattaforma WIZ comprende due servizi:
<a href="{link_wiz4all}">WIZ4ALL</a>
e
<a href="{link_login}">WIZ4PLANNERS</a>.
<br/><br/>
<a href="{link_wiz4all}"><img src="images/wiz4all.png"/></a>
Mira a diffondere tra cittadini e imprese (ma anche professionisti e esperti del settore) la percezione della necessit&agrave; di tener conto
delle condizioni e disponibilit&agrave; futura di acqua potabile nelle loro scelte di vita: mette infatti a loro disposizione una serie di
informazioni, solitamente di difficile reperibilit&agrave; (disponibilit&agrave; di risorsa, fonti d’acqua e molto altro). Solo cos&igrave; sar&agrave; possibile
una <b><i>"gestione partecipata"</i></b> dell\'acqua da parte dei cittadini stessi, grazie anche alla possibilit&agrave; di inserire una serie
di dati che vanno ad aumentare la base di conoscenza comune sulla situazione idrica del territorio. <b>L\'accesso &egrave; pubblico</b>.
<div style="text-align: center;"> 
<table class="homepage_menu_table">
    <caption align="bottom" style="text-align: center">Mappa Informativa</caption>
<tr><td>{link_info_index}</td></tr>
</table>
<table class="homepage_menu_table">
<caption align="bottom" style="text-align: center">Visualizza Valutazioni</caption>
<tr><td>{link_quality_view}</td></tr>
</table>
<table class="homepage_menu_table">
<caption align="bottom" style="text-align: center">Invia Valutazione</caption>
<tr><td>{link_quality_create}</td></tr>
</table>
</div>

<br/><br/>
<a href="{link_login}"><img src="images/wiz4planner.png"/></a>
&Egrave; in grado di fornire rilevanti informazioni alle autorit&agrave; locali coinvolte nei processi di <b>pianificazione territoriale</b>,
rappresentando uno strumento di guida nelle loro scelte che mira a garantire l\'assunzione di <b><i>decisioni "informate"</i></b>. 
L\'obiettivo &egrave; infatti quello di integrare concetti e procedure per la protezione e gestione sostenibile dell\'acqua nei processi di
pianificazione urbanistica e dell\'ambiente edificato in generale, tenendo conto degli impatti del cambiamento climatico.
<b>L\'accesso &egrave; riservato agli utenti autorizzati</b> (per richieste e informazioni contattare 
<a href="mailto:wiz@wiz-life.eu">wiz@wiz-life.eu</a>).
Per accedere clicca <a href="{link_login}">qui</a>.
</p>
',
'Displays information layers' => 'Visualizza strati informativi',
'Displays feedback' => 'Visualizza valutazioni',
'Sends feedback and calls for assistance' => 'Invia valutazioni e segnala guasti'
);

?>