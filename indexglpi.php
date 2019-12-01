<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
             "http://www.w3.org/TR/html4/loose.dtd">
<html><head><title>ATT GESTION</title><meta http-equiv='Content-Type' content='text/html; charset=utf-8'><meta http-equiv='Expires' content='Fri, Jun 12 1981 08:20:00 GMT'>
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
<body><div id='header'><div id='c_logoo'><a href='/glpi/front/centrale.php' accesskey='1' title="Accueil"></a></div><div id='c_preference' ><ul><li id='deconnexion'><a href='/glpi/logout.php' title="D&eacute;connexion">Déconnexion</a> (attgest)</li>
<li><a href='http://glpi-project.org/help-central' target='_blank' title="Aide">Aide</a></li><li><a href='/glpi/front/preference.php' title="Mes pr&eacute;f&eacute;rences">Mes préférences</a></li><li><a href='/glpi/front/preference.php' title="Français">Français</a></li></ul><div class='sep'></div></div>
<div id='c_recherche' >
<form method='get' action='/glpi/front/search.php'>
<div id='boutonRecherche'><input type='image' src='/glpi/pics/search.png' value='OK'
                title="Envoyer"  alt="Envoyer"></div><div id='champRecherche'><input size='15' type='text' name='globalsearch'
                                         value='Rechercher' onfocus="this.value='';"></div><input type='hidden' name='_glpi_csrf_token' value='c07d2dacb996fe81e738052679464402'></form>
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
</ul></li></ul><div class='sep'></div></div><div id='c_ssmenu1' ><ul><li><a href='/glpi/front/budget.php'>Budgets</a></li>
<li><a href='/glpi/front/supplier.php'>Fournisseurs</a></li>
<li><a href='/glpi/front/contact.php'>Contacts</a></li>
<li><a href='/glpi/front/contract.php'>Contrats</a></li>
<li><a href='/glpi/front/document.php'><u>D</u>ocuments</a></li>
</ul></div><div id='c_ssmenu2' ><ul><li><a href='/glpi/front/central.php' title="Accueil">Accueil</a> ></li><li><a href='/glpi/front/budget.php' title="Gestion">Gestion</a> ></li><li><a href='/glpi/front/budget.php' class='here' title="Budgets" >Budgets</a></li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li><li><a href='/glpi/front/setup.templates.php?itemtype=Budget&amp;add=1'><img src='/glpi/pics/menu_add.png' title="Ajouter"
                   alt="Ajouter"></a></li><li><a href='/glpi/front/budget.php'><img src='/glpi/pics/menu_search.png'
                   title="Rechercher" alt="Rechercher"></a></li><li><a href='/glpi/front/setup.templates.php?itemtype=Budget&amp;add=0'><img title="G&eacute;rer Gabarits..." alt="G&eacute;rer Gabarits..." src='/glpi/pics/menu_addtemplate.png'></a></li><li><div id='show_all_menu' onmouseover="completecleandisplay('show_all_menu');"><table><tr><td class='top'><table><tr><td class='tab_bg_1 b'><a href='/glpi/front/computer.php' title="Parc" class='itemP'>Parc</a></td></tr><tr><td><a href='/glpi/front/computer.php'>Ordinateurs</a></td></tr>
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
<div id='page' ><form name='searchformBudget' method='get' action="/glpi/front/budget.php"><div id='searchcriterias'><table class='tab_cadre_fixe'><tr class='tab_bg_1'><td><table id='searchcriteriastable'><tr class='headerRow'><td class='left' width='50%'><input type='hidden' disabled id='add_search_count' name='add_search_count'
                   value='1'><a href='#' onClick = "document.getElementById('add_search_count').disabled=false;
                   document.forms['searchformBudget'].submit();"><img src="/glpi/pics/plus.png" alt='+' title="Ajouter un crit&egrave;re de recherche"></a>&nbsp;&nbsp;&nbsp;&nbsp;<input type='hidden' id='is_deleted' name='is_deleted' value='0'><a href='#' onClick = "toogle('is_deleted','','','');
                      document.forms['searchformBudget'].submit();">
                      <img src="/glpi/pics/showdeleted_no.png" name='img_deleted' alt="Voir la corbeille" title="Voir la corbeille"></a>&nbsp;&nbsp;<select id='SearchBudget0' name="field[0]" size='1'><option value='view' >Éléments visualisés</option>
<option title="Nom" value='1'>Nom</option>
<option title="ID" value='2'>ID</option>
<option title="Dernière modification" value='19'>Dernière modification</option>
<option title="Date de début" value='5'>Date de début</option>
<option title="Date de fin" value='3'>Date de fin</option>
<option title="Valeur" value='4'>Valeur</option>
<option title="Commentaires" value='16'>Commentaires</option>
<option title="Entité" value='80'>Entité</option>
<option title="Sous-entités" value='86'>Sous-entités</option>
<option title="Notes" value='90'>Notes</option>
<optgroup label="Documents"><option title="Nombre de documents" value='119'>Nombre de documents</option>
</optgroup>
<option value='all' >Tous</option></select>
</td><td class='left'><div id='SearchSpanBudget0'>
<table><tr><td><select name='searchtype[0]' id='dropdown_searchtype[0]257799575' size='1'><option value='contains' selected>contient</option><option value='equals'>est</option><option value='notequals'>n'est pas</option></select></td><td><span id='spansearchtypeBudget0'>
<input type='text' size='13' name='contains[0]' value=""></span>
</td></tr></table><script type='text/javascript'>
               Ext.get('dropdown_searchtype[0]257799575').on(
                'change',
                function() {Ext.get('spansearchtypeBudget0').load({
          url: '/glpi/ajax/searchoptionvalue.php',
          scripts: true,
             params:'searchtype='+Ext.get('dropdown_searchtype[0]257799575').getValue()+'&field=1&itemtype=Budget&num=0&value=&searchopt=eyJ0YWJsZSI6ImdscGlfYnVkZ2V0cyIsImZpZWxkIjoibmFtZSIsImRhdGF0eXBlIjoiaXRlbWxpbmsiLCJtYXNzaXZlYWN0aW9uIjpmYWxzZSwibGlua2ZpZWxkIjoibmFtZSIsImpvaW5wYXJhbXMiOltdfQ==&meta=0'
});});
</script></div>
<script type='text/javascript'>
               Ext.get('SearchBudget0').on(
                'change',
                function() {Ext.get('SearchSpanBudget0').load({
          url: '/glpi/ajax/searchoption.php',
          scripts: true,
             params:'field='+Ext.get('SearchBudget0').getValue()+'&itemtype=Budget&num=0&value=&searchtype=contains'
});});
</script></td></tr>
</table>
</td>
<td width='150px'><table width='100%'><tr><td width='80' class='center'><input type='submit' value="Rechercher" class='submit' ></td><td> <a href='#' onClick="var w = window.open('/glpi/front/popup.php?popup=edit_bookmark&amp;type=1&amp;itemtype=Budget&amp;url=%2Fglpi%2Ffront%2Fbudget.php' ,'glpipopup', 'height=500, width=1000, top=100, left=100, scrollbars=yes' );w.focus();"><img src='/glpi/pics/bookmark_record.png'
             title="Enregistrer comme marque-page" alt="Enregistrer comme marque-page"
             class='calendrier'></a><a href='/glpi/front/budget.php?reset=reset' >&nbsp;&nbsp;<img title="Raz" alt="Raz" src='/glpi/pics/reset.png' class='calendrier'></a></td></tr></table>
</td></tr></table>
<input type='hidden' name='itemtype' value='Budget'><input type='hidden' name='start' value='0'></div><input type='hidden' name='_glpi_csrf_token' value='c07d2dacb996fe81e738052679464402'></form>
<div class='center b'>Pas d'élément trouvé</div>
</div><div id='footer' ><table width='100%'><tr><td class='left'><span class='copyright'>0.654 second - 10.01 Mio</span></td><td class='right'><a href='http://glpi-project.org/'><span class='copyright'>GLPI  0.84.3 Copyright (C) 2003-2015 by the INDEPNET Development Team.</span></a></td></tr></table></div></body></html>