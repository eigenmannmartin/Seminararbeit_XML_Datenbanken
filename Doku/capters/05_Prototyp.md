

# Implementation Prototyp


<!--

- Implementation eines Prototypen unter Verwendung eines XML-DBMS

- Prototyp Server-Backend (Datenhaltung und Aggregation sowie Datenaufbereitung)
- Prototyp Server-Frontend (einfaches Web-Gui)

-->

## Technologie Stack
Um den Prototyp zu implementieren, wird auf Software und Framewoks von Dritten zurückgegriffen. In den folgenden Kapiteln werden die Funktion und der Auswahlgrund der Fremdsoftware erläutert.


-------------------------------------------------------------
Software            Beschreibung/Auswahlgrund
------------------- ------------------------------------------------
__PHP__             PHP ist eine der am weitesten verbreitetsten
                     Programmiersprachen im Bereich der Web-Entwicklung. Aufgrund der hervorragenden Kompatibilität mit bestehenden Systemen wird PHP verwendet.

__eXist__           eXist ist ein sehr bekanntes und Einstiegs freundliches 
                     XML DBMS. Darüber hinaus ist es wegen seiner freien Verfügbarkeit für dieses Projekt bestens geeignet.

__BootStrap__       Bootstrap ist das bekannteste CSS Framework der letzten
                     Jahre. Eine sehr grosse Community, viele Plugins und grosse Flexibilität erlauben es schnell optisch ansprechende UIs zu erstellen.

__Apache__          Apache ist neben Nginx der am meisten verwendete Webserver
                     der sich durch seine hohe Konfigurierbarkeit und Stabilität auszeichnet. Aufgrund der Vorkenntnisse des Studenten im Bereich der Konfiguration von Apache, hat er sich für Apache entscheiden.

-------------------------------------------------------------
Table: Technologie Stack

## Entwicklung

### Connect to Neteye
Die von Neteye zur Verfügung gestellte API ermöglicht die Abfrage des gesamten Status jedes Services. Im Folgenden sind sowohl Abfrageparameter als auch Rückgabeparameter beschrieben. Die hinterlegte Benutzerkennung wurde eigens für diese Abfragen angelegt.

#### Abfrageparameter
Die Web-API ist unter der URL http://[_ServerName_]/thruk/cgi.bin/status.cgi erreichbar. Sowohl die aufgeführten Get- als auch alle Post-Parameter sind für eine Abfrage anzugeben.

-------------------------------------------------------------
Get-Parameter       Beschreibung
------------------- -----------------------------------------
__dfl_s0_type__     Art des Services
                    _"service"_ oder _"host"_

__dfl_s0_value__    Name des Services
                    "_bp_SAP_" oder "_bp_DataCenter01_" etc.

__view_mode__       Format der Rückbage
                    "_json_"
-------------------------------------------------------------
Table: Get-Parameters

-------------------------------------------------------------
Post-Parameter      Beschreibung
------------------- -----------------------------------------
__username__        Benutzername der Benutzerkennung
                    "_Neteye-Benutzer_"

__password__        Kennwort der Benutzerkennung
                    z.B. "_Secret$258!_"
-------------------------------------------------------------
Table: Post-Parameters



### Modulare Implementation
DB-Layer, Logic-Layer, Presentation-Layer

### Abfragen Frontend


## Grafische Umsetzung

Die Grafische Oberfläche ist zweigeteilt. (Abbildung {@fig:gui} ) Im oberen Bereich sind die aktuellen Zustände der Services sichtbar. Im unteren Bereich, mit der Überschrift Fehlerfälle sind die Fehlerfälle der vergangenen 48 Stunden aufgeführt.

![Übersicht](img/gui_screenshot.png) {#fig:gui}
