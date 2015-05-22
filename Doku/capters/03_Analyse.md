

# Recherche

<!-- Beschreibung des vorliegenden Materials zum Problem 
Was sagt das Schrifttum aus? Wie können die Aussagen geordnet werden?
-->

<!-- Definitionen wichtigstes begriffliches Handwerkszeug definieren. Umfangreiche Definitionslisten in den Anhang übernehmen
-->
<!-- Was ist bekannt, wo können wir ansetzten -->

<!-- Ergebnis und Diskussion des vorliegenden Materials
Kritische Auseinandersetzung mit dem vorliegenden Material. Gibt es Hinweise auf Widersprüche, offene Fragen oder gänzlich unbearbeitete Felder? Schlussfolgerungen daraus ziehen und das (Zwischen-)Ergebnis zusammenfassen.
-->


<!--

- Erarbeitung der technischen Grundlagen
- Problemanalyse (Welche Möglichkeiten zur Abfrage stehen Mitarbeitern bereits zur Verfügung? Woher und welche Daten können für die Problemlösung verwendet werden?)

-->


## Technische Grundlagen
Neteye ist ein WürhtPhoenix vertriebenes, auf Open Source basiertes IT-Management System. Neben Asset, Inventory-, Capacity- und Service Management nach ITIL Standards sind auch ausgeprägte Überwachungsfunktionalitäten vorhanden.

<!-- Aufbau Neteye -->

Zur Überwachung von Systemen und Services werden die Tool-Kits Nagios und Alexa verwendet. Während Nagios den Zustand von Systemen über das Auslesen von Logs und Statusabfragen an die Systeme selbst aufzeichnet, führt Alexa sogenannte Real-User Experience Tests durch. Dabei wird der zu testende Service so getestet, als ob ein Benutzer ihn verwendet. (Senden eines Emails)

Die aggregierten Zustandsdaten eines Services können in einem Business-Processes zusammengefasst werden. Dabei wird nicht nur der Zustand des zu überwachenden Services mit eingezogen, sondern auch die Abhängigkeiten, wie zum Beispiel Netzwerk, Firewall-Auslastung oder Temperatur im Datacenter.
Ein Business-Process repräsentiert also die Funktionsfähigkeit eines Services. (z.B. SAP, Email, ...)

## Problemanalyse

Neteye wurde designet um die Arbeit der "IT-Guys" zu erleichtern. So sind detaillierte Informationstabellen und Dashboards direkt ins Configurations-UI integriert. Es gibt keine Möglichkeit Informationen aus zu blenden, um die Verständlichkeit für Endbenutzer zu erhöhen.
Die Abbildung {@fig:nagios1} zeigt links alle Business-Processes und Rechts einen Ausschnitt der Zugrundeliegenden Systemstati.

![Neteye Status Übersicht](img/nagios1.png) {#fig:nagios1}

Die Verfügbaren Reporting-Funktionalität kann als regelmässige Email-Benachrichtigungen konfiguriert werden. Das Detaillevel der Reports ist jedoch nicht beeinflussbar und überfordernd für fachfremde Leser. Auch kann der Sendezeitpunkt nicht abhängig vom Zustand des Systems gemacht werden.

Zusammenfassend bietet Neteye viele Informationen, aber keine Möglichkeit diese Adressatengerecht für nicht IT-Mitarbeiter auf zu bereiten.

## Anforderungsanalyse



### A-01 Statusanzeige
|:--|:--|
|__Ziel__|Der Status der Systeme wird korrekt und nachvollziehbar angezeigt. |
|__Beschreibung__|Jeder Mitarbeiter kann den aktuellen Systemzustand der Systeme einsehen. |
|__Auslösendes Ereignis__|Ein Mitarbeiter möchte den Systemstatus sehen. |
|__Akteure__|Mitarbeiter|
|__Vorbedingung__|Der Mitarbeiter ist am Firmennetzwerk angemeldet. |
|__Ergebnis__|Der Mitarbeiter kann den Systemstatus einsehen. |
|__Hauptszenario__|Der Mitarbeiter erkennt ob alle Systeme ordnungsgemäss funktionieren. |
|__Alternativszenario__|Der Mitarbeiter kann Rückschlüsse ziehen, warum gewisse Systeme für ihn nicht erreichbar sind.|
|__Qualitäten__|-|


### A-02 Fehleranzeige
|:--|:--|
|__Ziel__|Tritt eine Fehlfunktion auf, wird der Grund dafür angezeigt. |
|__Beschreibung__|Jeder Mitarbeiter kann den Grund einer Fehlfunktion einsehen. |
|__Auslösendes Ereignis__|Ein Mitarbeiter möchte den Grund der aktuellen Fehlfunktion einsehen. |
|__Akteure__|Mitarbeiter|
|__Vorbedingung__|Der Mitarbeiter ist am Firmennetzwerk angemeldet. |
|__Ergebnis__|Der Mitarbeiter kann den Grund der Fehlfunktion einsehen. |
|__Hauptszenario__|Der Mitarbeiter erkennt warum ein System nicht ordnungsgemäss funktioniert. |
|__Alternativszenario__|-|
|__Qualitäten__|Anhand des angezeigten Grunds der Fehlfunktion kann der Mitarbeiter erkennen und verstehen warum die Fehlfunktion aufgetreten ist. |

### A-03 vergangene Fehlerfälle (48h)
|:--|:--|
|__Ziel__|Fehlfunktionen der vergangenen 48h der Systemen werden angezeigt. |
|__Beschreibung__|Jeder Mitarbeiter kann Fehlfunktionen der vergangenen 48h einsehen. |
|__Auslösendes Ereignis__|Ein Mitarbeiter möchte vergangene Fehlfunktionen der Systeme sehen. |
|__Akteure__|Mitarbeiter|
|__Vorbedingung__|Der Mitarbeiter ist am Firmennetzwerk angemeldet. |
|__Ergebnis__|Der Mitarbeiter kann vergangene Fehlfunktionen einsehen. |
|__Hauptszenario__|Der Mitarbeiter erkennt ob alle Systeme ordnungsgemäss funktioniert haben. |
|__Alternativszenario__|Der Mitarbeiter kann Rückschlüsse ziehen, warum gewisse Systeme für ihn nicht erreichbar waren.|
|__Qualitäten__|-|

### A-04 Verwendung eines XML DBMS
|:--|:--|
|__Ziel__|Ein natives XML DBMS muss verwendet werden. |
|__Beschreibung__|Das Datenhaltungsproblem wird mittels eines XML DBMS gelöst. |
|__Auslösendes Ereignis__|-|
|__Akteure__|-|
|__Vorbedingung__|-|
|__Ergebnis__|Alle Daten werden in einem XML DBMS gehalten. |
|__Hauptszenario__|-|
|__Alternativszenario__|-|
|__Qualitäten__|-|

### A-05 Web-basiert
|:--|:--|
|__Ziel__|Das GUI ist web-basiert. |
|__Beschreibung__|Die Anzeige der Daten passiert Web-basiert. |
|__Auslösendes Ereignis__|-|
|__Akteure__|-|
|__Vorbedingung__|-|
|__Ergebnis__|Die Daten können in einem Web-Gui eingesehen werden. |
|__Hauptszenario__|-|
|__Alternativszenario__|-|
|__Qualitäten__|-|

### A-06 Services 
|:--|:--|
|__Ziel__|Die wichtigsten Services sind eingebunden.  |
|__Beschreibung__|Die Services SAP, Fileserver, Netzwerk, Entwicklungsserver und Repository-Server sind eingebunden. |
|__Auslösendes Ereignis__|-|
|__Akteure__|-|
|__Vorbedingung__|-|
|__Ergebnis__|Die Daten können in einem Web-Gui eingesehen werden. |
|__Hauptszenario__|-|
|__Alternativszenario__|-|
|__Qualitäten__|-|



