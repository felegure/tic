<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
             "http://www.w3.org/TR/html4/loose.dtd">
<html><head><title>GLPI - Ordinateurs</title><meta http-equiv='Content-Type' content='text/html; charset=utf-8'><meta http-equiv='Expires' content='Fri, Jun 12 1981 08:20:00 GMT'>
<meta http-equiv='Pragma' content='no-cache'>
<meta http-equiv='Cache-Control' content='no-cache'>
<link rel='stylesheet' href='/glpi/css/styles.css' type='text/css' media='screen' >
<!--[if lte IE 6]><link rel='stylesheet' href='/glpi/css/styles_ie.css' type='text/css' media='screen' >
<![endif]--><link rel='stylesheet' type='text/css' media='print' href='/glpi/css/print.css' >
<link rel='shortcut icon' type='images/x-icon' href='/glpi/pics/favicon.ico' >
<script type="text/javascript" src='/glpi/lib/extjs/adapter/ext/ext-base.js'></script>
<script type='text/javascript' src='/glpi/lib/extjs/ext-all.js'></script>
<link rel='stylesheet' type='text/css' href='/glpi/lib/extjs/resources/css/ext-all.css' media='screen' >
<link rel='stylesheet' type='text/css' href='/glpi/lib/extrajs/starslider/slider.css' media='screen' >
<link rel='stylesheet' type='text/css' href='/glpi/css/tab-scroller-menu.css' media='screen' >
<script type='text/javascript' src='/glpi/lib/tiny_mce/tiny_mce.js'></script><link rel='stylesheet' type='text/css' href='/glpi/css/ext-all-glpi.css' media='screen' >
<script type='text/javascript' src='/glpi/lib/extjs/locale/ext-lang-fr.js'></script>
<script type='text/javascript' src='/glpi/lib/extrajs/xdatefield.js'></script>
<script type='text/javascript' src='/glpi/lib/extrajs/TabScrollerMenu.js'></script>
<script type='text/javascript' src='/glpi/lib/extrajs/datetime.js'></script>
<script type='text/javascript' src='/glpi/lib/extrajs/spancombobox.js'></script>
<script type='text/javascript' src='/glpi/lib/extrajs/starslider/slider.js'></script>
<script type='text/javascript'>
//<![CDATA[ 
Ext.BLANK_IMAGE_URL = '/glpi/lib/extjs/s.gif';
 Ext.Updater.defaults.loadScripts = true;
Ext.UpdateManager.defaults.indicatorText='<\span class="loading-indicator center">En cours de chargement...<\/span>';
//]]> 
</script>
<!--[if IE]><script type='text/javascript'>
Ext.UpdateManager.defaults.indicatorText='<\span class="loading-indicator-ie">En cours de chargement...<\/span>';
</script>
<![endif]--><script type='text/javascript' src='/glpi/script.js'></script>
</head>
<body><div id='header'><div id='c_logo'><a href='/glpi/front/central.php' accesskey='1' title="Accueil"></a></div><div id='c_preference' ><ul><li id='deconnexion'><a href='/glpi/logout.php' title="D&eacute;connexion">Déconnexion</a> (glpi)</li>
<li><a href='http://glpi-project.org/help-central' target='_blank' title="Aide">Aide</a></li><li><a href='/glpi/front/preference.php' title="Mes pr&eacute;f&eacute;rences">Mes préférences</a></li><li><a href='/glpi/front/preference.php' title="Français">Français</a></li></ul><div class='sep'></div></div>
<div id='c_recherche' >
<form method='get' action='/glpi/front/search.php'>
<div id='boutonRecherche'><input type='image' src='/glpi/pics/search.png' value='OK'
                title="Envoyer"  alt="Envoyer"></div><div id='champRecherche'><input size='15' type='text' name='globalsearch'
                                         value='Rechercher' onfocus="this.value='';"></div><input type='hidden' name='_glpi_csrf_token' value='fc6527d182761964dacc8118d2cafd69'></form>
<div class='sep'></div>
</div><div id='c_menu'><ul id='menu'><li id='menu1' onmouseover="javascript:menuAff('menu1','menu');" ><a href='/glpi/front/computer.php' class='itemP'>Parc</a><ul class='ssmenu'><li><a href='/glpi/front/computer.php' accesskey='o'><u>O</u>rdinateurs</a></li>
<li><a href='/glpi/front/monitor.php'>Moniteurs</a></li>
<li><a href='/glpi/front/software.php' accesskey='s'>Logiciel<u>s</u></a></li>
<li><a href='/glpi/front/networkequipment.php'>Réseaux</a></li>
<li><a href='/glpi/front/peripheral.php'>Périphériques</a></li>
<li><a href='/glpi/front/printer.php'>Imprimantes</a></li>
<li><a href='/glpi/front/cartridgeitem.php'>Cartouches</a></li>
<li><a href='/glpi/front/consumableitem.php'>Consommables</a></li>
<li><a href='/glpi/front/phone.php'>Téléphones</a></li>
<li><a href='/glpi/front/allassets.php'>Global</a></li>
</ul></li><li id='menu2' onmouseover="javascript:menuAff('menu2','menu');" ><a href='/glpi/front/ticket.php' class='itemP'>Assistance</a><ul class='ssmenu'><li><a href='/glpi/front/ticket.php' accesskey='t'><u>T</u>ickets</a></li>
<li><a href='/glpi/front/problem.php'>Problèmes</a></li>
<li><a href='/glpi/front/planning.php' accesskey='p'><u>P</u>lanning</a></li>
<li><a href='/glpi/front/stat.php' accesskey='a'>St<u>a</u>tistiques</a></li>
<li><a href='/glpi/front/ticketrecurrent.php'>Tickets récurrents</a></li>
</ul></li><li id='menu3' onmouseover="javascript:menuAff('menu3','menu');" ><a href='/glpi/front/budget.php' class='itemP'>Gestion</a><ul class='ssmenu'><li><a href='/glpi/front/budget.php'>Budgets</a></li>
<li><a href='/glpi/front/supplier.php'>Fournisseurs</a></li>
<li><a href='/glpi/front/contact.php'>Contacts</a></li>
<li><a href='/glpi/front/contract.php'>Contrats</a></li>
<li><a href='/glpi/front/document.php' accesskey='d'><u>D</u>ocuments</a></li>
</ul></li><li id='menu4' onmouseover="javascript:menuAff('menu4','menu');" ><a href='/glpi/front/reminder.php' class='itemP'>Outils</a><ul class='ssmenu'><li><a href='/glpi/front/reminder.php'>Notes</a></li>
<li><a href='/glpi/front/rssfeed.php'>Flux RSS</a></li>
<li><a href='/glpi/front/knowbaseitem.php' accesskey='b'><u>B</u>ase de connaissances</a></li>
<li><a href='/glpi/front/reservationitem.php' accesskey='r'><u>R</u>éservations</a></li>
<li><a href='/glpi/front/report.php' accesskey='e'>Rapports</a></li>
</ul></li><li id='menu5' onmouseover="javascript:menuAff('menu5','menu');" ><a href='/glpi/front/user.php' class='itemP'>Administration</a><ul class='ssmenu'><li><a href='/glpi/front/user.php' accesskey='u'><u>U</u>tilisateurs</a></li>
<li><a href='/glpi/front/group.php' accesskey='g'><u>G</u>roupes</a></li>
<li><a href='/glpi/front/entity.php'>Entités</a></li>
<li><a href='/glpi/front/rule.php'>Règles</a></li>
<li><a href='/glpi/front/dictionnary.php'>Dictionnaires</a></li>
<li><a href='/glpi/front/profile.php'>Profils</a></li>
<li><a href='/glpi/front/backup.php'>Maintenance</a></li>
<li><a href='/glpi/front/event.php'>Journaux</a></li>
</ul></li><li id='menu6' onmouseover="javascript:menuAff('menu6','menu');" ><a href='/glpi/front/dropdown.php' class='itemP'>Configuration</a><ul class='ssmenu'><li><a href='/glpi/front/dropdown.php' accesskey='n'>I<u>n</u>titulés</a></li>
<li><a href='/glpi/front/device.php'>Composants</a></li>
<li><a href='/glpi/front/setup.notification.php'>Notifications</a></li>
<li><a href='/glpi/front/sla.php'>SLAs</a></li>
<li><a href='/glpi/front/config.form.php'>Générale</a></li>
<li><a href='/glpi/front/control.php'>Contrôles</a></li>
<li><a href='/glpi/front/crontask.php'>Actions automatiques</a></li>
<li><a href='/glpi/front/setup.auth.php'>Authentification</a></li>
<li><a href='/glpi/front/mailcollector.php'>Collecteurs</a></li>
<li><a href='/glpi/front/link.php'>Liens externes</a></li>
<li><a href='/glpi/front/plugin.php'>Plugins</a></li>
</ul></li></ul><div class='sep'></div></div><div id='c_ssmenu1' ><ul><li><a href='/glpi/front/computer.php'><u>O</u>rdinateurs</a></li>
<li><a href='/glpi/front/monitor.php'>Moniteurs</a></li>
<li><a href='/glpi/front/software.php'>Logiciel<u>s</u></a></li>
<li><a href='/glpi/front/networkequipment.php'>Réseaux</a></li>
<li><a href='/glpi/front/peripheral.php'>Périphériques</a></li>
<li><a href='/glpi/front/printer.php'>Imprimantes</a></li>
<li><a href='/glpi/front/cartridgeitem.php'>Cartouches</a></li>
<li><a href='/glpi/front/consumableitem.php'>Consommables</a></li>
<li><a href='/glpi/front/phone.php'>Téléphones</a></li>
<li><a href='/glpi/front/allassets.php'>Global</a></li>
</ul></div><div id='c_ssmenu2' ><ul><li><a href='/glpi/front/central.php' title="Accueil">Accueil</a> ></li><li><a href='/glpi/front/computer.php' title="Parc">Parc</a> ></li><li><a href='/glpi/front/computer.php' class='here' title="Ordinateurs" >Ordinateurs</a></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li><li><a href='/glpi/front/setup.templates.php?itemtype=Computer&amp;add=1'><img src='/glpi/pics/menu_add.png' title="Ajouter"
                   alt="Ajouter"></a></li><li><a href='/glpi/front/computer.php'><img src='/glpi/pics/menu_search.png'
                   title="Rechercher" alt="Rechercher"></a></li><li><a href='/glpi/front/setup.templates.php?itemtype=Computer&amp;add=0'><img title="G&eacute;rer Gabarits..." alt="G&eacute;rer Gabarits..." src='/glpi/pics/menu_addtemplate.png'></a></li><li><div id='show_all_menu' onmouseover="completecleandisplay('show_all_menu');"><table><tr><td class='top'><table><tr><td class='tab_bg_1 b'><a href='/glpi/front/computer.php' title="Parc" class='itemP'>Parc</a></td></tr><tr><td><a href='/glpi/front/computer.php'>Ordinateurs</a></td></tr>
<tr><td><a href='/glpi/front/monitor.php'>Moniteurs</a></td></tr>
<tr><td><a href='/glpi/front/software.php'>Logiciels</a></td></tr>
<tr><td><a href='/glpi/front/networkequipment.php'>Réseaux</a></td></tr>
<tr><td><a href='/glpi/front/peripheral.php'>Périphériques</a></td></tr>
<tr><td><a href='/glpi/front/printer.php'>Imprimantes</a></td></tr>
<tr><td><a href='/glpi/front/cartridgeitem.php'>Cartouches</a></td></tr>
<tr><td><a href='/glpi/front/consumableitem.php'>Consommables</a></td></tr>
<tr><td><a href='/glpi/front/phone.php'>Téléphones</a></td></tr>
<tr><td><a href='/glpi/front/allassets.php'>Global</a></td></tr>
<tr><td class='tab_bg_1 b'><a href='/glpi/front/ticket.php' title="Assistance" class='itemP'>Assistance</a></td></tr><tr><td><a href='/glpi/front/ticket.php'>Tickets</a></td></tr>
<tr><td><a href='/glpi/front/problem.php'>Problèmes</a></td></tr>
<tr><td><a href='/glpi/front/planning.php'>Planning</a></td></tr>
<tr><td><a href='/glpi/front/stat.php'>Statistiques</a></td></tr>
<tr><td><a href='/glpi/front/ticketrecurrent.php'>Tickets récurrents</a></td></tr>
</table></td><td class='top'><table><tr><td class='tab_bg_1 b'><a href='/glpi/front/budget.php' title="Gestion" class='itemP'>Gestion</a></td></tr><tr><td><a href='/glpi/front/budget.php'>Budgets</a></td></tr>
<tr><td><a href='/glpi/front/supplier.php'>Fournisseurs</a></td></tr>
<tr><td><a href='/glpi/front/contact.php'>Contacts</a></td></tr>
<tr><td><a href='/glpi/front/contract.php'>Contrats</a></td></tr>
<tr><td><a href='/glpi/front/document.php'>Documents</a></td></tr>
<tr><td class='tab_bg_1 b'><a href='/glpi/front/reminder.php' title="Outils" class='itemP'>Outils</a></td></tr><tr><td><a href='/glpi/front/reminder.php'>Notes</a></td></tr>
<tr><td><a href='/glpi/front/rssfeed.php'>Flux RSS</a></td></tr>
<tr><td><a href='/glpi/front/knowbaseitem.php'>Base de connaissances</a></td></tr>
<tr><td><a href='/glpi/front/reservationitem.php'>Réservations</a></td></tr>
<tr><td><a href='/glpi/front/report.php'>Rapports</a></td></tr>
<tr><td class='tab_bg_1 b'><a href='/glpi/front/user.php' title="Administration" class='itemP'>Administration</a></td></tr><tr><td><a href='/glpi/front/user.php'>Utilisateurs</a></td></tr>
<tr><td><a href='/glpi/front/group.php'>Groupes</a></td></tr>
<tr><td><a href='/glpi/front/entity.php'>Entités</a></td></tr>
</table></td><td class='top'><table><tr><td><a href='/glpi/front/rule.php'>Règles</a></td></tr>
<tr><td><a href='/glpi/front/dictionnary.php'>Dictionnaires</a></td></tr>
<tr><td><a href='/glpi/front/profile.php'>Profils</a></td></tr>
<tr><td><a href='/glpi/front/backup.php'>Maintenance</a></td></tr>
<tr><td><a href='/glpi/front/event.php'>Journaux</a></td></tr>
<tr><td class='tab_bg_1 b'><a href='/glpi/front/dropdown.php' title="Configuration" class='itemP'>Configuration</a></td></tr><tr><td><a href='/glpi/front/dropdown.php'>Intitulés</a></td></tr>
<tr><td><a href='/glpi/front/device.php'>Composants</a></td></tr>
<tr><td><a href='/glpi/front/setup.notification.php'>Notifications</a></td></tr>
<tr><td><a href='/glpi/front/sla.php'>SLAs</a></td></tr>
<tr><td><a href='/glpi/front/config.form.php'>Générale</a></td></tr>
<tr><td><a href='/glpi/front/control.php'>Contrôles</a></td></tr>
<tr><td><a href='/glpi/front/crontask.php'>Actions automatiques</a></td></tr>
<tr><td><a href='/glpi/front/setup.auth.php'>Authentification</a></td></tr>
<tr><td><a href='/glpi/front/mailcollector.php'>Collecteurs</a></td></tr>
<tr><td><a href='/glpi/front/link.php'>Liens externes</a></td></tr>
</table></td><td class='top'><table><tr><td><a href='/glpi/front/plugin.php'>Plugins</a></td></tr>
</table></td></tr></table></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li><li><a href='#' onClick="var w=window.open('/glpi/front/popup.php?popup=load_bookmark' ,'glpibookmarks', 'height=500, width=1000, top=100, left=100, scrollbars=yes' );w.focus();"><img src='/glpi/pics/bookmark.png' title="Charger un marque-page"  alt="Charger un marque-page"></a></li><li ><img alt='' src='/glpi/pics/menu_all.png' onclick="completecleandisplay('show_all_menu')"></li></ul></div></div>
<div id='page' ><div id='tabspanel' class='center-h'></div><script type='text/javascript'>

               var tabpanel = new Ext.TabPanel({
               applyTo: 'tabspanel',
               width:950,
               enableTabScroll: true,
               resizeTabs: false,
               collapsed: true,
               plain: true,
               plugins: [{
                   ptype: 'tabscrollermenu',
                   maxText  : 50,
                   pageSize : 30
               }],
               items: [{
                     title: "Ordinateur",
                     id: 'empty',  listeners:{ // Force glpi_tab storage
                          beforeshow : function(panel) {
                           /* clean content because append data instead of replace it : no more problem */
                           /* Problem with IE6... But clean data for tabpanel before show. Do it on load default tab ?*/
                           /*tabpanel.body.update('');*/
                           /* update active tab*/
                           Ext.Ajax.request({
                              url : '/glpi/ajax/updatecurrenttab.php?itemtype=Computer&glpi_tab=empty',
                              success: function(objServerResponse) {
                              //alert(objServerResponse.responseText);
                           }
                           });
                        }
                     }}]});/// Define view pointtabpanel.expand();// force first load
               function loadDefaultTab() {
                  tabpanel.body=Ext.get('tabcontent');
                  // See before
                  tabpanel.body.update('');
                  tabpanel.setActiveTab('empty');}// force reload
               function reloadTab(add) {
                  var tab = tabpanel.getActiveTab();
                  var opt = tab.autoLoad;
                  if (add) {
                     if (opt.params)
                        opt.params = opt.params + '&' + add;
                     else
                        opt.params = add;
                  }
                  tab.getUpdater().update(opt);}</script><form name='form' method='post' action='/glpi/front/computer.form.php' ><input type='hidden' name='entities_id' value='0'><div class='spaced' id='tabsbody'><table class='tab_cadre_fixe' id='mainformtable'><tr class='headerRow'><th colspan='2'>Nouvel élément</th><th colspan='2'></th></tr>
<tr class='tab_bg_1'><td>Nom*</td><td><input  type='text' name='name'
                value="" size='40'>
</td><td>Statut</td><td><span id='results_1244443942'>
<select id='dropdown_states_id1244443942' name='states_id'
             size='1'><option class='tree' value='0'>-----</option></select><script type='text/javascript'>
               Ext.get('dropdown_states_id1244443942').on(
                'change',
                function() {Ext.get('comment_states_id1244443942').load({
          url: '/glpi/ajax/comments.php',
          scripts: true,
             params:'value='+Ext.get('dropdown_states_id1244443942').getValue()+'&table=glpi_states&withlink=comment_link_states_id1244443942'
});});
</script></span>
<script type='text/javascript'>function update_results_1244443942() {Ext.get('results_1244443942').load({
          url: '/glpi/ajax/dropdownValue.php',
          scripts: true,
             params:'searchText=*&value=0&itemtype=State&myname=states_id&limit=50&toadd=W10=&comment=1&rand=1244443942&entity_restrict=-1&update_item=&used=W10=&on_change=&condition=&emptylabel=-----&display_emptychoice=1&displaywith=W10=&display=&permit_select_parent=&update_link=1'
});}</script><a id='comment_link_states_id1244443942' target='_blank'  href='/glpi/front/state.php'><img id='tooltip2047491761' alt='' src='/glpi/pics/aide.png'></a><span id='comment_states_id1244443942' class='x-hidden'>&nbsp;</span><script type='text/javascript' >
new Ext.ToolTip({
               target: 'tooltip2047491761',
               anchor: 'left',
               autoShow: true,
               autoHide: true,

                  dismissDelay: 0,contentEl: 'comment_states_id1244443942'});</script><img alt='' title="Ajouter" src='/glpi/pics/add_dropdown.png' style='cursor:pointer; margin-left:2px;'
                            onClick="var w = window.open('/glpi/front/state.form.php?popup=1&amp;rand=1244443942' ,'glpipopup', 'height=400, width=1000, top=100, left=100, scrollbars=yes' );w.focus();"></td></tr>
<tr class='tab_bg_1'><td>Lieu</td><td><span id='results_1045575989'>
<select id='dropdown_locations_id1045575989' name='locations_id'
             size='1'><option class='tree' value='0'>-----</option></select><script type='text/javascript'>
               Ext.get('dropdown_locations_id1045575989').on(
                'change',
                function() {Ext.get('comment_locations_id1045575989').load({
          url: '/glpi/ajax/comments.php',
          scripts: true,
             params:'value='+Ext.get('dropdown_locations_id1045575989').getValue()+'&table=glpi_locations&withlink=comment_link_locations_id1045575989'
});});
</script></span>
<script type='text/javascript'>function update_results_1045575989() {Ext.get('results_1045575989').load({
          url: '/glpi/ajax/dropdownValue.php',
          scripts: true,
             params:'searchText=*&value=0&itemtype=Location&myname=locations_id&limit=50&toadd=W10=&comment=1&rand=1045575989&entity_restrict=0&update_item=&used=W10=&on_change=&condition=&emptylabel=-----&display_emptychoice=1&displaywith=W10=&display=&permit_select_parent=&update_link=1'
});}</script><a id='comment_link_locations_id1045575989' target='_blank'  href='/glpi/front/location.php'><img id='tooltip1396766504' alt='' src='/glpi/pics/aide.png'></a><span id='comment_locations_id1045575989' class='x-hidden'>&nbsp;</span><script type='text/javascript' >
new Ext.ToolTip({
               target: 'tooltip1396766504',
               anchor: 'left',
               autoShow: true,
               autoHide: true,

                  dismissDelay: 0,contentEl: 'comment_locations_id1045575989'});</script><img alt='' title="Ajouter" src='/glpi/pics/add_dropdown.png' style='cursor:pointer; margin-left:2px;'
                            onClick="var w = window.open('/glpi/front/location.form.php?popup=1&amp;rand=1045575989' ,'glpipopup', 'height=400, width=1000, top=100, left=100, scrollbars=yes' );w.focus();"></td><td>Type</td><td><span id='results_316849251'>
<select id='dropdown_computertypes_id316849251' name='computertypes_id'
             size='1'><option value='0'>-----</option></select><script type='text/javascript'>
               Ext.get('dropdown_computertypes_id316849251').on(
                'change',
                function() {Ext.get('comment_computertypes_id316849251').load({
          url: '/glpi/ajax/comments.php',
          scripts: true,
             params:'value='+Ext.get('dropdown_computertypes_id316849251').getValue()+'&table=glpi_computertypes&withlink=comment_link_computertypes_id316849251'
});});
</script></span>
<script type='text/javascript'>function update_results_316849251() {Ext.get('results_316849251').load({
          url: '/glpi/ajax/dropdownValue.php',
          scripts: true,
             params:'searchText=*&value=0&itemtype=ComputerType&myname=computertypes_id&limit=50&toadd=W10=&comment=1&rand=316849251&entity_restrict=-1&update_item=&used=W10=&on_change=&condition=&emptylabel=-----&display_emptychoice=1&displaywith=W10=&display=&permit_select_parent=&update_link=1'
});}</script><a id='comment_link_computertypes_id316849251' target='_blank'  href='/glpi/front/computertype.php'><img id='tooltip84166415' alt='' src='/glpi/pics/aide.png'></a><span id='comment_computertypes_id316849251' class='x-hidden'>&nbsp;</span><script type='text/javascript' >
new Ext.ToolTip({
               target: 'tooltip84166415',
               anchor: 'left',
               autoShow: true,
               autoHide: true,

                  dismissDelay: 0,contentEl: 'comment_computertypes_id316849251'});</script><img alt='' title="Ajouter" src='/glpi/pics/add_dropdown.png' style='cursor:pointer; margin-left:2px;'
                            onClick="var w = window.open('/glpi/front/computertype.form.php?popup=1&amp;rand=316849251' ,'glpipopup', 'height=400, width=1000, top=100, left=100, scrollbars=yes' );w.focus();"></td></tr>
<tr class='tab_bg_1'><td>Responsable technique</td><td><span id='results_475002769'>
<select id='dropdown_users_id_tech475002769' name='users_id_tech'><option value='0'>-----</option><option value='2' title="glpi - glpi">glpi</option><option value='5' title="normal - normal">normal</option><option value='4' title="tech - tech">tech</option></select><script type='text/javascript'>
               Ext.get('dropdown_users_id_tech475002769').on(
                'change',
                function() {Ext.get('comment_users_id_tech475002769').load({
          url: '/glpi/ajax/comments.php',
          scripts: true,
             params:'value='+Ext.get('dropdown_users_id_tech475002769').getValue()+'&table=glpi_users&withlink=comment_link_users_id_tech475002769'
});});
</script></span>
<script type='text/javascript'>function update_results_475002769() {Ext.get('results_475002769').load({
          url: '/glpi/ajax/dropdownUsers.php',
          scripts: true,
             params:'searchText=*&value=&myname=users_id_tech&all=0&right=own_ticket&comment=1&rand=475002769&on_change=&entity_restrict=0&used=W10=&update_item=&update_link=1'
});}</script><a id='comment_link_users_id_tech475002769' href='/glpi/front/user.php'><img id='tooltip393742348' alt='' src='/glpi/pics/aide.png'></a><span id='comment_users_id_tech475002769' class='x-hidden'>&nbsp;</span><script type='text/javascript' >
new Ext.ToolTip({
               target: 'tooltip393742348',
               anchor: 'left',
               autoShow: true,
               autoHide: true,

                  dismissDelay: 0,contentEl: 'comment_users_id_tech475002769'});</script></td><td>Fabricant</td><td><span id='results_663571482'>
<select id='dropdown_manufacturers_id663571482' name='manufacturers_id'
             size='1'><option value='0'>-----</option></select><script type='text/javascript'>
               Ext.get('dropdown_manufacturers_id663571482').on(
                'change',
                function() {Ext.get('comment_manufacturers_id663571482').load({
          url: '/glpi/ajax/comments.php',
          scripts: true,
             params:'value='+Ext.get('dropdown_manufacturers_id663571482').getValue()+'&table=glpi_manufacturers&withlink=comment_link_manufacturers_id663571482'
});});
</script></span>
<script type='text/javascript'>function update_results_663571482() {Ext.get('results_663571482').load({
          url: '/glpi/ajax/dropdownValue.php',
          scripts: true,
             params:'searchText=*&value=0&itemtype=Manufacturer&myname=manufacturers_id&limit=50&toadd=W10=&comment=1&rand=663571482&entity_restrict=-1&update_item=&used=W10=&on_change=&condition=&emptylabel=-----&display_emptychoice=1&displaywith=W10=&display=&permit_select_parent=&update_link=1'
});}</script><a id='comment_link_manufacturers_id663571482' target='_blank'  href='/glpi/front/manufacturer.php'><img id='tooltip642882106' alt='' src='/glpi/pics/aide.png'></a><span id='comment_manufacturers_id663571482' class='x-hidden'>&nbsp;</span><script type='text/javascript' >
new Ext.ToolTip({
               target: 'tooltip642882106',
               anchor: 'left',
               autoShow: true,
               autoHide: true,

                  dismissDelay: 0,contentEl: 'comment_manufacturers_id663571482'});</script><img alt='' title="Ajouter" src='/glpi/pics/add_dropdown.png' style='cursor:pointer; margin-left:2px;'
                            onClick="var w = window.open('/glpi/front/manufacturer.form.php?popup=1&amp;rand=663571482' ,'glpipopup', 'height=400, width=1000, top=100, left=100, scrollbars=yes' );w.focus();"></td></tr>
<tr class='tab_bg_1'><td>Groupe technique</td><td><span id='results_196456840'>
<select id='dropdown_groups_id_tech196456840' name='groups_id_tech'
             size='1'><option class='tree' value='0'>-----</option></select><script type='text/javascript'>
               Ext.get('dropdown_groups_id_tech196456840').on(
                'change',
                function() {Ext.get('comment_groups_id_tech196456840').load({
          url: '/glpi/ajax/comments.php',
          scripts: true,
             params:'value='+Ext.get('dropdown_groups_id_tech196456840').getValue()+'&table=glpi_groups&withlink=comment_link_groups_id_tech196456840'
});});
</script></span>
<script type='text/javascript'>function update_results_196456840() {Ext.get('results_196456840').load({
          url: '/glpi/ajax/dropdownValue.php',
          scripts: true,
             params:'searchText=*&value=0&itemtype=Group&myname=groups_id_tech&limit=50&toadd=W10=&comment=1&rand=196456840&entity_restrict=0&update_item=&used=W10=&on_change=&condition=`is_assign`&emptylabel=-----&display_emptychoice=1&displaywith=W10=&display=&permit_select_parent=&update_link=1'
});}</script><a id='comment_link_groups_id_tech196456840' target='_blank'  href='/glpi/front/group.php'><img id='tooltip867663489' alt='' src='/glpi/pics/aide.png'></a><span id='comment_groups_id_tech196456840' class='x-hidden'>&nbsp;</span><script type='text/javascript' >
new Ext.ToolTip({
               target: 'tooltip867663489',
               anchor: 'left',
               autoShow: true,
               autoHide: true,

                  dismissDelay: 0,contentEl: 'comment_groups_id_tech196456840'});</script><img alt='' title="Ajouter" src='/glpi/pics/add_dropdown.png' style='cursor:pointer; margin-left:2px;'
                            onClick="var w = window.open('/glpi/front/group.form.php?popup=1&amp;rand=196456840' ,'glpipopup', 'height=400, width=1000, top=100, left=100, scrollbars=yes' );w.focus();"></td><td>Modèle</td><td><span id='results_768358889'>
<select id='dropdown_computermodels_id768358889' name='computermodels_id'
             size='1'><option value='0'>-----</option></select><script type='text/javascript'>
               Ext.get('dropdown_computermodels_id768358889').on(
                'change',
                function() {Ext.get('comment_computermodels_id768358889').load({
          url: '/glpi/ajax/comments.php',
          scripts: true,
             params:'value='+Ext.get('dropdown_computermodels_id768358889').getValue()+'&table=glpi_computermodels&withlink=comment_link_computermodels_id768358889'
});});
</script></span>
<script type='text/javascript'>function update_results_768358889() {Ext.get('results_768358889').load({
          url: '/glpi/ajax/dropdownValue.php',
          scripts: true,
             params:'searchText=*&value=0&itemtype=ComputerModel&myname=computermodels_id&limit=50&toadd=W10=&comment=1&rand=768358889&entity_restrict=-1&update_item=&used=W10=&on_change=&condition=&emptylabel=-----&display_emptychoice=1&displaywith=W10=&display=&permit_select_parent=&update_link=1'
});}</script><a id='comment_link_computermodels_id768358889' target='_blank'  href='/glpi/front/computermodel.php'><img id='tooltip894650003' alt='' src='/glpi/pics/aide.png'></a><span id='comment_computermodels_id768358889' class='x-hidden'>&nbsp;</span><script type='text/javascript' >
new Ext.ToolTip({
               target: 'tooltip894650003',
               anchor: 'left',
               autoShow: true,
               autoHide: true,

                  dismissDelay: 0,contentEl: 'comment_computermodels_id768358889'});</script><img alt='' title="Ajouter" src='/glpi/pics/add_dropdown.png' style='cursor:pointer; margin-left:2px;'
                            onClick="var w = window.open('/glpi/front/computermodel.form.php?popup=1&amp;rand=768358889' ,'glpipopup', 'height=400, width=1000, top=100, left=100, scrollbars=yes' );w.focus();"></td></tr>
<tr class='tab_bg_1'><td>Usager numéro</td><td ><input  type='text' name='contact_num'
                value="" size='40'>
</td><td>Numéro de série</td><td ><input  type='text' name='serial'
                value="" size='40'>
</td></tr>
<tr class='tab_bg_1'><td>Usager</td><td><input  type='text' name='contact'
                value="" size='40'>
</td><td>Numéro d'inventaire*</td><td><input  type='text' name='otherserial'
                value="" size='40'>
</td></tr>
<tr class='tab_bg_1'><td>Utilisateur</td><td><span id='results_291065237'>
<select id='dropdown_users_id291065237' name='users_id'><option value='0'>-----</option><option value='2' title="glpi - glpi">glpi</option><option value='5' title="normal - normal">normal</option><option value='3' title="post-only - post-only">post-only</option><option value='4' title="tech - tech">tech</option></select><script type='text/javascript'>
               Ext.get('dropdown_users_id291065237').on(
                'change',
                function() {Ext.get('comment_users_id291065237').load({
          url: '/glpi/ajax/comments.php',
          scripts: true,
             params:'value='+Ext.get('dropdown_users_id291065237').getValue()+'&table=glpi_users&withlink=comment_link_users_id291065237'
});});
</script></span>
<script type='text/javascript'>function update_results_291065237() {Ext.get('results_291065237').load({
          url: '/glpi/ajax/dropdownUsers.php',
          scripts: true,
             params:'searchText=*&value=&myname=users_id&all=0&right=all&comment=1&rand=291065237&on_change=&entity_restrict=0&used=W10=&update_item=&update_link=1'
});}</script><a id='comment_link_users_id291065237' href='/glpi/front/user.php'><img id='tooltip1308969164' alt='' src='/glpi/pics/aide.png'></a><span id='comment_users_id291065237' class='x-hidden'>&nbsp;</span><script type='text/javascript' >
new Ext.ToolTip({
               target: 'tooltip1308969164',
               anchor: 'left',
               autoShow: true,
               autoHide: true,

                  dismissDelay: 0,contentEl: 'comment_users_id291065237'});</script></td><td>Réseau</td><td><span id='results_768819024'>
<select id='dropdown_networks_id768819024' name='networks_id'
             size='1'><option value='0'>-----</option></select><script type='text/javascript'>
               Ext.get('dropdown_networks_id768819024').on(
                'change',
                function() {Ext.get('comment_networks_id768819024').load({
          url: '/glpi/ajax/comments.php',
          scripts: true,
             params:'value='+Ext.get('dropdown_networks_id768819024').getValue()+'&table=glpi_networks&withlink=comment_link_networks_id768819024'
});});
</script></span>
<script type='text/javascript'>function update_results_768819024() {Ext.get('results_768819024').load({
          url: '/glpi/ajax/dropdownValue.php',
          scripts: true,
             params:'searchText=*&value=0&itemtype=Network&myname=networks_id&limit=50&toadd=W10=&comment=1&rand=768819024&entity_restrict=-1&update_item=&used=W10=&on_change=&condition=&emptylabel=-----&display_emptychoice=1&displaywith=W10=&display=&permit_select_parent=&update_link=1'
});}</script><a id='comment_link_networks_id768819024' target='_blank'  href='/glpi/front/network.php'><img id='tooltip223412636' alt='' src='/glpi/pics/aide.png'></a><span id='comment_networks_id768819024' class='x-hidden'>&nbsp;</span><script type='text/javascript' >
new Ext.ToolTip({
               target: 'tooltip223412636',
               anchor: 'left',
               autoShow: true,
               autoHide: true,

                  dismissDelay: 0,contentEl: 'comment_networks_id768819024'});</script><img alt='' title="Ajouter" src='/glpi/pics/add_dropdown.png' style='cursor:pointer; margin-left:2px;'
                            onClick="var w = window.open('/glpi/front/network.form.php?popup=1&amp;rand=768819024' ,'glpipopup', 'height=400, width=1000, top=100, left=100, scrollbars=yes' );w.focus();"></td></tr>
<tr class='tab_bg_1'><td>Groupe</td><td><span id='results_1742710121'>
<select id='dropdown_groups_id1742710121' name='groups_id'
             size='1'><option class='tree' value='0'>-----</option></select><script type='text/javascript'>
               Ext.get('dropdown_groups_id1742710121').on(
                'change',
                function() {Ext.get('comment_groups_id1742710121').load({
          url: '/glpi/ajax/comments.php',
          scripts: true,
             params:'value='+Ext.get('dropdown_groups_id1742710121').getValue()+'&table=glpi_groups&withlink=comment_link_groups_id1742710121'
});});
</script></span>
<script type='text/javascript'>function update_results_1742710121() {Ext.get('results_1742710121').load({
          url: '/glpi/ajax/dropdownValue.php',
          scripts: true,
             params:'searchText=*&value=0&itemtype=Group&myname=groups_id&limit=50&toadd=W10=&comment=1&rand=1742710121&entity_restrict=0&update_item=&used=W10=&on_change=&condition=`is_itemgroup`&emptylabel=-----&display_emptychoice=1&displaywith=W10=&display=&permit_select_parent=&update_link=1'
});}</script><a id='comment_link_groups_id1742710121' target='_blank'  href='/glpi/front/group.php'><img id='tooltip1017056037' alt='' src='/glpi/pics/aide.png'></a><span id='comment_groups_id1742710121' class='x-hidden'>&nbsp;</span><script type='text/javascript' >
new Ext.ToolTip({
               target: 'tooltip1017056037',
               anchor: 'left',
               autoShow: true,
               autoHide: true,

                  dismissDelay: 0,contentEl: 'comment_groups_id1742710121'});</script><img alt='' title="Ajouter" src='/glpi/pics/add_dropdown.png' style='cursor:pointer; margin-left:2px;'
                            onClick="var w = window.open('/glpi/front/group.form.php?popup=1&amp;rand=1742710121' ,'glpipopup', 'height=400, width=1000, top=100, left=100, scrollbars=yes' );w.focus();"></td><td rowspan='10'>Commentaires</td><td rowspan='10' class='middle'><textarea cols='45' rows='13' name='comment' ></textarea></td></tr>
<tr class='tab_bg_1'><td>Domaine</td><td ><span id='results_685580348'>
<select id='dropdown_domains_id685580348' name='domains_id'
             size='1'><option value='0'>-----</option></select><script type='text/javascript'>
               Ext.get('dropdown_domains_id685580348').on(
                'change',
                function() {Ext.get('comment_domains_id685580348').load({
          url: '/glpi/ajax/comments.php',
          scripts: true,
             params:'value='+Ext.get('dropdown_domains_id685580348').getValue()+'&table=glpi_domains&withlink=comment_link_domains_id685580348'
});});
</script></span>
<script type='text/javascript'>function update_results_685580348() {Ext.get('results_685580348').load({
          url: '/glpi/ajax/dropdownValue.php',
          scripts: true,
             params:'searchText=*&value=0&itemtype=Domain&myname=domains_id&limit=50&toadd=W10=&comment=1&rand=685580348&entity_restrict=-1&update_item=&used=W10=&on_change=&condition=&emptylabel=-----&display_emptychoice=1&displaywith=W10=&display=&permit_select_parent=&update_link=1'
});}</script><a id='comment_link_domains_id685580348' target='_blank'  href='/glpi/front/domain.php'><img id='tooltip1729184778' alt='' src='/glpi/pics/aide.png'></a><span id='comment_domains_id685580348' class='x-hidden'>&nbsp;</span><script type='text/javascript' >
new Ext.ToolTip({
               target: 'tooltip1729184778',
               anchor: 'left',
               autoShow: true,
               autoHide: true,

                  dismissDelay: 0,contentEl: 'comment_domains_id685580348'});</script><img alt='' title="Ajouter" src='/glpi/pics/add_dropdown.png' style='cursor:pointer; margin-left:2px;'
                            onClick="var w = window.open('/glpi/front/domain.form.php?popup=1&amp;rand=685580348' ,'glpipopup', 'height=400, width=1000, top=100, left=100, scrollbars=yes' );w.focus();"></td></tr><tr class='tab_bg_1'><td>Système d'exploitation</td><td><span id='results_1271769937'>
<select id='dropdown_operatingsystems_id1271769937' name='operatingsystems_id'
             size='1'><option value='0'>-----</option></select><script type='text/javascript'>
               Ext.get('dropdown_operatingsystems_id1271769937').on(
                'change',
                function() {Ext.get('comment_operatingsystems_id1271769937').load({
          url: '/glpi/ajax/comments.php',
          scripts: true,
             params:'value='+Ext.get('dropdown_operatingsystems_id1271769937').getValue()+'&table=glpi_operatingsystems&withlink=comment_link_operatingsystems_id1271769937'
});});
</script></span>
<script type='text/javascript'>function update_results_1271769937() {Ext.get('results_1271769937').load({
          url: '/glpi/ajax/dropdownValue.php',
          scripts: true,
             params:'searchText=*&value=0&itemtype=OperatingSystem&myname=operatingsystems_id&limit=50&toadd=W10=&comment=1&rand=1271769937&entity_restrict=-1&update_item=&used=W10=&on_change=&condition=&emptylabel=-----&display_emptychoice=1&displaywith=W10=&display=&permit_select_parent=&update_link=1'
});}</script><a id='comment_link_operatingsystems_id1271769937' target='_blank'  href='/glpi/front/operatingsystem.php'><img id='tooltip1980543299' alt='' src='/glpi/pics/aide.png'></a><span id='comment_operatingsystems_id1271769937' class='x-hidden'>&nbsp;</span><script type='text/javascript' >
new Ext.ToolTip({
               target: 'tooltip1980543299',
               anchor: 'left',
               autoShow: true,
               autoHide: true,

                  dismissDelay: 0,contentEl: 'comment_operatingsystems_id1271769937'});</script><img alt='' title="Ajouter" src='/glpi/pics/add_dropdown.png' style='cursor:pointer; margin-left:2px;'
                            onClick="var w = window.open('/glpi/front/operatingsystem.form.php?popup=1&amp;rand=1271769937' ,'glpipopup', 'height=400, width=1000, top=100, left=100, scrollbars=yes' );w.focus();"></td></tr>
<tr class='tab_bg_1'><td>Service pack</td><td ><span id='results_164178799'>
<select id='dropdown_operatingsystemservicepacks_id164178799' name='operatingsystemservicepacks_id'
             size='1'><option value='0'>-----</option></select><script type='text/javascript'>
               Ext.get('dropdown_operatingsystemservicepacks_id164178799').on(
                'change',
                function() {Ext.get('comment_operatingsystemservicepacks_id164178799').load({
          url: '/glpi/ajax/comments.php',
          scripts: true,
             params:'value='+Ext.get('dropdown_operatingsystemservicepacks_id164178799').getValue()+'&table=glpi_operatingsystemservicepacks&withlink=comment_link_operatingsystemservicepacks_id164178799'
});});
</script></span>
<script type='text/javascript'>function update_results_164178799() {Ext.get('results_164178799').load({
          url: '/glpi/ajax/dropdownValue.php',
          scripts: true,
             params:'searchText=*&value=0&itemtype=OperatingSystemServicePack&myname=operatingsystemservicepacks_id&limit=50&toadd=W10=&comment=1&rand=164178799&entity_restrict=-1&update_item=&used=W10=&on_change=&condition=&emptylabel=-----&display_emptychoice=1&displaywith=W10=&display=&permit_select_parent=&update_link=1'
});}</script><a id='comment_link_operatingsystemservicepacks_id164178799' target='_blank'  href='/glpi/front/operatingsystemservicepack.php'><img id='tooltip1822284370' alt='' src='/glpi/pics/aide.png'></a><span id='comment_operatingsystemservicepacks_id164178799' class='x-hidden'>&nbsp;</span><script type='text/javascript' >
new Ext.ToolTip({
               target: 'tooltip1822284370',
               anchor: 'left',
               autoShow: true,
               autoHide: true,

                  dismissDelay: 0,contentEl: 'comment_operatingsystemservicepacks_id164178799'});</script><img alt='' title="Ajouter" src='/glpi/pics/add_dropdown.png' style='cursor:pointer; margin-left:2px;'
                            onClick="var w = window.open('/glpi/front/operatingsystemservicepack.form.php?popup=1&amp;rand=164178799' ,'glpipopup', 'height=400, width=1000, top=100, left=100, scrollbars=yes' );w.focus();"></td></tr>
<tr class='tab_bg_1'><td>Version du système d'exploitation</td><td ><span id='results_1139529478'>
<select id='dropdown_operatingsystemversions_id1139529478' name='operatingsystemversions_id'
             size='1'><option value='0'>-----</option></select><script type='text/javascript'>
               Ext.get('dropdown_operatingsystemversions_id1139529478').on(
                'change',
                function() {Ext.get('comment_operatingsystemversions_id1139529478').load({
          url: '/glpi/ajax/comments.php',
          scripts: true,
             params:'value='+Ext.get('dropdown_operatingsystemversions_id1139529478').getValue()+'&table=glpi_operatingsystemversions&withlink=comment_link_operatingsystemversions_id1139529478'
});});
</script></span>
<script type='text/javascript'>function update_results_1139529478() {Ext.get('results_1139529478').load({
          url: '/glpi/ajax/dropdownValue.php',
          scripts: true,
             params:'searchText=*&value=0&itemtype=OperatingSystemVersion&myname=operatingsystemversions_id&limit=50&toadd=W10=&comment=1&rand=1139529478&entity_restrict=-1&update_item=&used=W10=&on_change=&condition=&emptylabel=-----&display_emptychoice=1&displaywith=W10=&display=&permit_select_parent=&update_link=1'
});}</script><a id='comment_link_operatingsystemversions_id1139529478' target='_blank'  href='/glpi/front/operatingsystemversion.php'><img id='tooltip913252506' alt='' src='/glpi/pics/aide.png'></a><span id='comment_operatingsystemversions_id1139529478' class='x-hidden'>&nbsp;</span><script type='text/javascript' >
new Ext.ToolTip({
               target: 'tooltip913252506',
               anchor: 'left',
               autoShow: true,
               autoHide: true,

                  dismissDelay: 0,contentEl: 'comment_operatingsystemversions_id1139529478'});</script><img alt='' title="Ajouter" src='/glpi/pics/add_dropdown.png' style='cursor:pointer; margin-left:2px;'
                            onClick="var w = window.open('/glpi/front/operatingsystemversion.form.php?popup=1&amp;rand=1139529478' ,'glpipopup', 'height=400, width=1000, top=100, left=100, scrollbars=yes' );w.focus();"></td></tr>
<tr class='tab_bg_1'><td>Product ID du système d'exploitation</td><td ><input  type='text' name='os_licenseid'
                value="" size='40'>
</td></tr>
<tr class='tab_bg_1'><td>Numéro de série du système d'exploitation</td><td ><input  type='text' name='os_license_number'
                value="" size='40'>
</td></tr>
<tr class='tab_bg_1'><td>UUID</td><td ><input  type='text' name='uuid'
                value="" size='40'>
</td></tr>
<tr class='tab_bg_1'><td>&nbsp;</td><td>Créé le 2015-01-20 23:18</td></tr>
<tr class='tab_bg_1'><td>Source de mise à jour</td><td ><span id='results_2131644273'>
<select id='dropdown_autoupdatesystems_id2131644273' name='autoupdatesystems_id'
             size='1'><option value='0'>-----</option></select><script type='text/javascript'>
               Ext.get('dropdown_autoupdatesystems_id2131644273').on(
                'change',
                function() {Ext.get('comment_autoupdatesystems_id2131644273').load({
          url: '/glpi/ajax/comments.php',
          scripts: true,
             params:'value='+Ext.get('dropdown_autoupdatesystems_id2131644273').getValue()+'&table=glpi_autoupdatesystems&withlink=comment_link_autoupdatesystems_id2131644273'
});});
</script></span>
<script type='text/javascript'>function update_results_2131644273() {Ext.get('results_2131644273').load({
          url: '/glpi/ajax/dropdownValue.php',
          scripts: true,
             params:'searchText=*&value=0&itemtype=AutoUpdateSystem&myname=autoupdatesystems_id&limit=50&toadd=W10=&comment=1&rand=2131644273&entity_restrict=-1&update_item=&used=W10=&on_change=&condition=&emptylabel=-----&display_emptychoice=1&displaywith=W10=&display=&permit_select_parent=&update_link=1'
});}</script><a id='comment_link_autoupdatesystems_id2131644273' target='_blank'  href='/glpi/front/autoupdatesystem.php'><img id='tooltip985942243' alt='' src='/glpi/pics/aide.png'></a><span id='comment_autoupdatesystems_id2131644273' class='x-hidden'>&nbsp;</span><script type='text/javascript' >
new Ext.ToolTip({
               target: 'tooltip985942243',
               anchor: 'left',
               autoShow: true,
               autoHide: true,

                  dismissDelay: 0,contentEl: 'comment_autoupdatesystems_id2131644273'});</script><img alt='' title="Ajouter" src='/glpi/pics/add_dropdown.png' style='cursor:pointer; margin-left:2px;'
                            onClick="var w = window.open('/glpi/front/autoupdatesystem.form.php?popup=1&amp;rand=2131644273' ,'glpipopup', 'height=400, width=1000, top=100, left=100, scrollbars=yes' );w.focus();"></td></tr><tr class='tab_bg_2'><td class='center' colspan='4'><input type='submit' name='add' value="Ajouter" class='submit'></td></tr>
</table></div><input type='hidden' name='_glpi_csrf_token' value='fc6527d182761964dacc8118d2cafd69'></form>
<div id='tabcontent'>&nbsp;</div><script type='text/javascript'>loadDefaultTab();</script></div><div id='footer' ><table width='100%'><tr><td class='left'><span class='copyright'>1.770 second - 11.28 Mio</span></td><td class='right'><a href='http://glpi-project.org/'><span class='copyright'>GLPI  0.84.3 Copyright (C) 2003-2015 by the INDEPNET Development Team.</span></a></td></tr></table></div></body></html>