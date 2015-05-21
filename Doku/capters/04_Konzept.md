

# Konzept

<!-- Eigener Beitrag zur Lösung des Problems
Hier steht der eigene Beitrag zur Lösung der Aufgaben und Probleme im Vordergrund,
d.h.
- Beschreibung des verwendeten oder zur Verfügung gestandenen Materials [check]
- Begründung, warum dieses Material herangezogen wurde, zum Beispiel auf Grund von Standardliteratur, Fachartikeln oder eigener Berufserfahrung [check]
- Aufzeigen von Ungenauigkeiten, Rahmenbedingungen und Schwierigkeiten bei der Problemlösung [Messresultate abhängig vom Wetter]
- Beschreibung des methodischen Vorgehens, des Experiments usw. [Prototyp]
- Zusammenfassung der Ergebnisse aus dem eigenen Beitrag
-->



<!--

- Konzeption eines Prototypen. Der Prototyp muss den Status der IT-Systeme (SAP, Fileserver, Netzwerk, Entwicklungsserver, Repository-Server) sowie Fehlerfälle der der letzten 48h anzeigen.
- Konzeption der Schemata und Abfragen
- Konzeption der Architektur der Anwendung


- Datenbank Schemata
- Architektur Schemata
- Datenflussdiagramm

-->


## Anforderungen

### UC01 Statusanzeige
für SAP, Fileserver, Netzwerk, Entwicklungsserver, Repository-Server

### UC02 Fehleranzeige
Details zu den Fehlern

### UC03 vergangene Fehlerfälle (48h)

### NFR01 Verwendung von XML DBMS

### Web-basiert


## Design der Software
Backend - Frontend

{Bild: Architektur Schemata}

Klarstellen dass Frontend auf dem Server ausgeführt wird.

### Backend
Die Daten auf dem Fremdsystem Neteye müssen zur Aufbereitung über die Schnittstelle in die Backend-Datenbank transferiert werden. Dazu wird eine bestehende Schnittstelle des Fremdsystems verwendet.

Nachstehend sind der Aufbau des Backend sowie der Schnittstelle ins Fremdsystem erläutert.

#### Datenfluss
{Bild: Neteye -> Backend Logic -> DB -> Frontend}

#### Neteye Schnittstelle
JSON Abfragen
Passwort geschützt

Cron-Job

#### Datenbank
Struktur & Verwendung von {DBMS}
Datenban Schemata


### Frontend
Das Frontend...
HTML - Template etc.

