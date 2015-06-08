

# Recherche

In diesem Kapitel wird erläutert, welche Funktionalität durch Neteye zur Verfügung gestellt wird, welche Funktionalitäten fehlen und welche Probleme aus diesem Sachverhalt entstehen.

## Grundlagen
Neteye ist ein von WürhtPhoenix vertriebenes, auf OpenSource basiertes IT-Management System. Neben Asset, Inventory-, Capacity- und Service Management nach ITIL Standards sind auch ausgeprägte Überwachungsfunktionalitäten vorhanden.

Zur Überwachung von Systemen und Services werden die Tool-Kits Nagios und Alexa verwendet. Während Nagios den Zustand von Systemen über das Auslesen von Logs und Statusabfragen an die Systeme selbst aufzeichnet, führt Alexa sogenannte Real-User Experience Tests durch. Dabei wird der zu testende Service so getestet, als ob ein Benutzer ihn verwendet.

Die aggregierten Zustandsdaten eines Services können in einem Business-Processes zusammengefasst werden. Dabei wird nicht nur der Zustand des zu überwachenden Services mit eingezogen, sondern auch die Abhängigkeiten, wie zum Beispiel Netzwerk, Firewall-Auslastung oder Temperatur im Datacenter.
Ein Business-Process repräsentiert also die Funktionsfähigkeit eines Services. (z.B. SAP oder Email)

Der Detaillierungsgrad der im Neteye angezeigten Informationen kann nicht variiert werden. Es ist auch nicht möglich Informationen auszublenden oder Anzeige-Berechtigungen zu definieren. Beim Zugriff auf das von Neteye zur Verfügung gestellte WEB-GUI sind entweder alle, oder keine Status-Informationen einsehbar.

## Problemanalyse
Neteye wurde designed um die Arbeit in einer IT-Abteilung zu erleichtern. So sind sehr viele und sehr detaillierte Informationen im GUI einsehbar. Die verwendete tabellarische Ansicht macht das Arbeiten und Navigieren für Fachpersonal sehr einfach, für themenfremde Personen jedoch nahezu unmöglich.

Es gibt auch keine Möglichkeit Informationen auszublenden, um so die Verständlichkeit für Benutzer zu erhöhen. Der Betrachter muss also entsprechendes Verständnis und Grundwissen über die gesamte IT-Infrastruktur mitbringen.

Zusammenfassend bietet Neteye viele Informationen, aber keine Möglichkeit diese adressatengerecht für nicht IT-Mitarbeiter aufzubereiten. Der Betrachter wird überflutet mit Informationen, die ihn möglicherweise nicht interessieren oder verwirren.


## Zwischenstand
Das WEB-GUI vom Neteye erlaubt eine sehr detaillierte Auswertung und Analyse des Systemzustands. Top-Level Ansichten sind jedoch nicht implementiert und ermöglichen daher keine managementfreundliche Darstellung des Zustandes der IT-Infrastruktur. Aus den Vorgaben des Kapitels [Einleitung] und den Erkenntnissen aus diesem Kapitel, soll im nachfolgenden Kapitel [Konzept] ein WEB-GUI entworfen werden, welches allen Mitarbeitern eine einfache und verständliche Übersicht über die Funktionsfähigkeit der IT-Infrastruktur liefert.
