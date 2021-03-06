

# Konzept

In diesem Kapitel wird ein System entworfen, welchen den Anforderungen aus den Kapiteln [Einleitung] und [Recherche] gerecht wird. Dazu wird zuerst ein grobes Design der Software erarbeitet und anschliessend konkretisiert. 

## Designansätze
Zur Lösung der Aufgabenstellung sind nachfolgend zwei möglich Designansätze aufgezeigt. Diese werden kurz beleuchtet und der am besten passenden ausgewählt.

### Integrated Application
Die Applikation wird als Plug-In beim Neteye integriert und stellt seine Funktionalitäten als Teil des bestehenden Web-Frontend zur Verfügung. Die zu entwickelnde Software kann direkt auf die Datenbank zugreifen und es entfällt die Entwicklung einer Schnittstelle.

### Single Tier Application
Die Applikation ist selbständig, verfügt über ein eigenes Web-Gui und greift über die API auf Neteye zu. Die Daten werden periodisch aktualisiert und lokal in einer XML-Datenbank gespeichert. 

## Entscheid
Die gesetzten Ziele dieser Arbeit sind mit beiden Desingansätzen erreichbar.
Da die Single Tier Application auf einem eigenen Server läuft und nur die API zum Neteye beachtet werden muss, ist dies die sauberere Lösung. Somit muss keine Veränderung am Neteye vorgenommen werden.


## Design der Software
Der Prototyp besteht aus den Bausteinen Backend, XML DBMS und Frontend.
Nur die Backend-Komponente greift über eine Schnittstelle auf Neteye zu. 

![Komponenten](img/components.jpg)


### Backend
Die Daten auf dem Fremdsystem Neteye müssen zur Aufbereitung über die Schnittstelle in die Backend-Datenbank transferiert werden. Dazu wird eine bestehende Schnittstelle des Fremdsystems verwendet.

Nachstehend sind der Aufbau des Backend sowie der Schnittstelle ins Fremdsystem erläutert.

#### Datenfluss
Für jeden anzuzeigenden Service wird eine Schnittstellenabfrage durchgeführt, um den aktuellen Status des entsprechenden Services zu bekommen, welcher in Neteye gespeichert ist. Dieser Vorgang ist im Datenflussdiagramm (Abbildung {@fig:dataflow}) dargestellt.
Die so gesammelten Daten werden durch das Backend gespeichert und können mit Hilfe des Frontends wieder angezeigt werden.

![Datenflussdiagramm](img/dataflow.jpg) {#fig:dataflow}

#### Neteye Schnittstelle
Neteye bietet eine Schnittstelle, bei welcher alle aktuell bekannten Informationen über einen beliebigen Service bezogen werden können.
Die API liefert das Resultat in Form eines JSON-Strings zurück. Die API ist darüber hinaus Passwortgeschützt. Das Kennwort, sowie der Servicename muss also bei jeder Abfrage mitgeschickt werden.


#### Datenbank
Die Servicestati werden in der Datenbank nach Area und danach nach Check aufgeteilt. Area gibt das Gebiet an woher die Testresultate kommen (z.B. ZH).
Der Check selbst beinhaltet alle Zustände der abgefragten Services.

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
Das Frontend zeigt die in der Datenbank abgelegten Daten an.
Die Datenbankabfragen gehören ins Frontend und sind aufgrund der Datenbankstruktur vorgegeben.

Um den aktuellsten Status zu erhalten wird die folgende Query verwendet.

``` {.xml}
doc("DB")//areas/area[areaname="Region"]//Check
    order by $checks/Date descending
``` 
<!-- 
```
 -->

Um die vergangenen Fehlerfälle auszulesen, wird das Resultat zusätzlich auf den Service/State>0 geprüft und das Check-Datum limitiert.

``` {.xml}
doc("DB")//areas/area[areaname="Region"]//Check[Date>""]//Service[State>0]
    order by $checks/Date descending
``` 
<!-- 
```
 -->


## Abschluss Konzept
Das konkretisierte Konzept eines Prototypen, welcher Statusinformationen der IT-Infrastruktur vom Neteye ausliest und in einem nativen XML-Datenbankmanagement System abspeichert, konnte erstellt werden, und kann darauf aufbauen im nächsten Kapitel "[Implementation]" umgesetzt werden.