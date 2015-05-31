

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
In diesem Kapitel wird das System entworfen, welches den Anforderungen aus der Anforderungsanalyse entspricht.

## Design Ansätze
Zur Lösung der Aufgabenstellung sind nachfolgend zwei möglich Design-Ansätze aufgezeigt. Diese werden kurz beleuchtet und der am besten passenden ausgewählt.

### Integrated Application
Die Applikation wird als Plug-In beim Neteye integriert und stellt seine Funktionalitäten als teil des bestehenden Web-Frontend zur Verfügung. Die zu entwickelnde Software kann direkt auf die Datenbank zugreifen und es entfällt die Entwicklung der Schnittstelle.

### Single Tier Application
Die Applikation ist selbständig, verfügt über ein eigenes Web-Gui und greift über die API auf Neteye zu. Die Daten werden periodisch aktualisiert lokal in einer Datenbank gespeichert. 

## Entscheid
Alle gestellten Anforderungen werden von beiden Desing-Ansätzen erfüllt.
Da die Single Tier Application auf einem eigenen Server läuft und nur die API zum Neteye beachtet werden muss, ist dies die sauberere Lösung. Weiter muss so keine Anpassung am Neteye vorgenommen werden.


## Design der Software
Der Prototyp besteht aus den beiden Bausteinen Backend, XML DBMS und Frontend.
Nur die Backend-Komponente greift auf Neteye zu. 

![Komponenten](img/components.jpg)


### Backend
Die Daten auf dem Fremdsystem Neteye müssen zur Aufbereitung über die Schnittstelle in die Backend-Datenbank transferiert werden. Dazu wird eine bestehende Schnittstelle des Fremdsystems verwendet.

Nachstehend sind der Aufbau des Backend sowie der Schnittstelle ins Fremdsystem erläutert.

#### Datenfluss
Für jeden anzuzeigenden Service wird eine Schnittstellenabfrage durchgeführt um den aktuellen Status des entsprechenden Services zu bekommen.
Die so gesammelten Daten werden durch das Backend gespeichert und können mit Hilfe des Frontends wieder angezeigt werden.

![Datenflussdiagramm](img/dataflow.jpg)

#### Neteye Schnittstelle
Neteye bietet eine Schnittstelle, bei welcher alle aktuell bekannten Informationen über einen beliebigen Service bezogen werden können.
Die API liefert das Resultat in Form eines JSON-Strings zurück. Die API ist darüber hinaus Passwortgeschützt. Das Kennwort, sowie der Servicename muss also bei jeder Abfrage mitgeschickt.


#### Datenbank
Die Servicestati werden in der Datenbank nach Area und danach nach Check aufgeteilt. Area gibt das gebiet an woher die Testresultate kommen (z.B. zh).
Der Check selbst beinhaltet alle Stati der abgefragten Services.

``` {.xml}
<areas>
    <area>
        <areaname></areaname>
        <Check>
            <Date></Date>
            <Service>
                <Servicename></Servicename>
                <Performance></Performance>
                <Infotext></Infotext>
                <State></State>
            </Service>
        </Check>
    </area>
</areas>

``` 
<!-- 
```
 -->


### Frontend
Das Frontend zeigt die in der Datenbank abgelegten Daten statisch an.
Die Datenbankabfragen gehören ins Frontend uns sind aufgrund der Datenbankstruktur vorgegeben.

Um den aktuellsten Status zu erhalten wird die folgende Query verwendet.

``` {.xml}
doc("DB")//areas/area[areaname="Region"]//Check
    order by $checks/Date descending
``` 
<!-- 
```
 -->

Um die vergangenen Fehlerfälle aus zu lesen, wird das resultat zusätzlich auf den Service/State>0 geprüft sowie das Check-Datum limitiert.

``` {.xml}
("DB")//areas/area[areaname="Region"]//Check[Date>""]//Service[State>0]
    order by $checks/Date descending
``` 
<!-- 
```
 -->