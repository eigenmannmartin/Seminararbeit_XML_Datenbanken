<!-- Ziel, Begründung und Abgrenzung der Arbeit -->

# Einleitung

## Motivation und Fragestellung



## Aufgabenstellung

Im Folgenden ist die Aufgabenstellung gemäss EBS aufgeführt.

### Thema

Ziel der Arbeit ist es den Zustand der IT-Systeme auf einer Webseite zu publizieren, so dass Mitarbeiter eine Übersichtliche Zusammenfassung der Lauffähigkeit der Systeme erhalten.

### Ausgangslage

Im Unternehmen existiert ein Überwachungssystem (Neteye) welches das Verhalten von der IT-Infrastruktur misst. 

Mitarbeiter (keine IT-Mitarbeiter) können bis anhin den aktuellen Zustand der IT-Systeme nicht abfragen, da Neteye dafür keine geeigneten Funktionalitäten bietet.

Dies führt  einerseits zu Unsicherheiten bei den Mitarbeitern und einem schlechterem Ruf der IT, da nicht transparent kommuniziert wird, wann welche Systeme nicht ordnungsgemäss funktioniert haben.


### Ziele der Arbeit

Alle Mitarbeiter sollen auf einer zentralen Webseite den aktuellen Status aller IT-Systeme abfragen können. Darüber hinaus muss ein Mitarbeiter erkennen können ob Fehler in der Vergangenheit (letzte 48h) aufgetreten sind.

Es soll gezeigt werden, dass dieses Ziel mit einem XML-DBMS realisiert werden kann.

### Aufgabenstellung

A1 Recherche:
- Erarbeitung der technischen Grundlagen
- Problemanalyse (Welche Möglichkeiten zur Abfrage stehen Mitarbeitern bereits zur Verfügung? Woher und welche Daten können für die Problemlösung verwendet werden?)
A2 Konzept:
- Konzeption eines Prototypen. Der Prototyp muss den Status der IT-Systeme (SAP, Fileserver, Netzwerk, Entwicklungsserver, Repository-Server) sowie Fehlerfälle der der letzten 48h anzeigen.
- Konzeption der Schemata und Abfragen
- Konzeption der Architektur der Anwendung
A3 Umsetzung:
- Implementation eines Prototypen unter Verwendung eines XML-DBMS
A4 Review:
- Überprüfung des umgesetzten Konzepts. Erfüllt der Prototyp die Anforderung der Fragestellung?

### Erwartete Resultate

R1 Recherche:
- Bestandsaufnahme und Anforderungsanalyse
R2 Konzept:
- Datenbank Schemata
- Architektur Schemata
- Datenflussdiagramm
R3 Umsetzung:
- Prototyp Server-Backend (Datenhaltung und Aggregation sowie Datenaufbereitung)
- Prototyp Server-Frontend (einfaches Web-Gui)
R4 Review:
- Bewertungsergebnisse der Überprüfung des Konzepts
- Exemplarische Beispielabfragen
