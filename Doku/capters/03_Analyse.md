

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
Anforderungen aus der Aufgabenstellung

### UC01 Statusanzeige
für SAP, Fileserver, Netzwerk, Entwicklungsserver, Repository-Server

### UC02 Fehleranzeige
Details zu den Fehlern

### UC03 vergangene Fehlerfälle (48h)

### NFR01 Verwendung von XML DBMS

### Web-basiert
