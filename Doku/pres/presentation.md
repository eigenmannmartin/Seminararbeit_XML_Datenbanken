---
title: Seminar XML DB 
author: Martin Eigenmann
date: Juni 2015
stylesheet: "./reveal.js/css/theme/moon.css"
---


<style type="text/css">
    strong {
        background: #FF5E99 none repeat scroll 0% 0%;
        color: white;
    }

    img {
        background-color: white !important;
    }
</style>



## Aufgabenstellung
Statusübersicht
Datenhaltung im XML-DBMS 

## 

![Nagios](img/nagios1.png)


# Ansätze
> + Integriert
> + eigener Server


#

## Vorgehensweise
> + API untersuchen
> + XML-DB entwerfen
> + Umsetzen

## Ergebnis

![Gui](img/gui_screenshot.png)

# 

## XML-Schema
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


## Abfragen
``` {.xml}
doc("DB")//areas/area[areaname="Region"]//Check
    order by $checks/Date descending
``` 
<!-- 
```
 -->

``` {.xml}
doc("DB")//areas/area[areaname="Region"]//Check[Date>""]//Service[State>0]
    order by $checks/Date descending
``` 
<!-- 
```
 -->



# Fragen