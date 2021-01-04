## Cuprins

1. Introducere ................................................................................................. 2
2. Extensia ...................................................................................................... 2
3. Instalare și demonstrație............................................................................. 5
4. Concluzii ..................................................................................................... 7

Bibliography ..................................................................................................... 7

## 1. Introducere

Programul malițios creat este de tipul keylogger, acesta este sub forma
unei extensii pentru browser-ul Firefox, extensie ce va executa un cod primit de
la un server, codul respectiv adăugând un nou subscriber pentru toate
evenimentele de tipul POST din elementele de tipul form din pagină și va copia
toate datele într-o baza de date împreună cu informații adiționale pentru analiza
statică a acestora.

## 2. Extensia

Orice extensie are nevoie de un fișier manifest.js, în cadrul căruia sunt
trecute date generale despre extensie și permisiunile acesteia, un factor cheie
pentru ca acest malware să funcționeze este permisiunea de webRequest care
trebuie să fie aprobată de către utilizatorul țintă.

Codul din cadrul mtalogger.js face un simplu request asincron către
server și executa codul returnat, in varianta finala acest cod poate fi obfuscat cu
o varietate de tool-uri și setări pentru a ascunde adevărata funcționalitate a

proramului, facând analiza statică un calvar, iar cea dinamică foarte grea
deoarece scriptul este executat de către browser ca fiind un script internal (
acesta fiind o extensie ), iar tool-urile de baza puse la dispoziție (inspect
element) nu detectează acest script.

Fișierul script.js este varianta clară a scriptului ce va fi trimis de către
server și rulat pe linia 14 ( response.script ), acesta găsește toate elementele din
pagina de tipul form ce au ca metoda POST și le adaugă funcția processForm ca
subscriber pentru evenimentul de tip submit ( click-ul pe butonul ce are atributul
submit ). În cadrul funției processForm, serializez elementul form și trimit datele
făra să aștept răspuns către server.

Serverul are baza de date cu o schemă simpla (un singur tabel cu
timestamp, url-ul și datele transmise) și un script de PHP ce trimite codul
malițios, acesta poate fi schimbat ulterior în funcție de anumite criterii ( aici
codul este deja obfuscat, pentru asta am folosit https://obfuscator.io/ <variabila
loggerScript> ), tot aici este si funcția ce înregistrează datele în baza de date.

## 3. Instalare și demonstrație

Pentru a testa extensia trebuie să intram pe pagina about:debugging, tab-ul
This Firefox în browserul Firefox, selectăm Load Temporary Add-on și selectam
fișierul manifest.js

Pentru testare mă voi autentifica pe https://wiki.mta.ro/ și vom verifica
dacă în baza de date am captat datele de interes.

Datele sunt codate în stilul URL, putem folosi datele ca și argument către
url-ul tintă al form-ului ( field-ul website din baza de date) și vom obține
accesul. Am verificat în modul incognito pe alt browser.

## 4. Concluzii

Această extensie creată nu este o metodă perfectă de a fura datele, dar este
o demonstrație clară că un astfel de sistem se poate realiza și că trebuie să avem
grija la extensiile pe care le descărcăm și în special la permisiunile pe care le
acordăm acestora. Un “serviciu” de ad-block putea sa mascheze acest script sau
unul de VPN gratis.

Analiza datelor este de asemenea greoaie, se pot pune filtre doar după
anumite site-uri de interes, aplicația prezentată nu a fost testată pe site-uri de
plăți on-line, dar sunt convins că se pot realiza anumite trick-uri și acolo.

Codul sursă se poate găsi pe pagina de github GitHub -
Phineas09/MTALogger.

## Bibliography

```
[1] Firefox, „Extension WorkShop,” [Interactiv]. Available:
https://extensionworkshop.com/documentation/develop/.
```
```
[2] Wikipedia, „Wikipedia,” [Interactiv]. Available:
https://ro.wikipedia.org/wiki/Keylogger.
```

