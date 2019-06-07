UniHungry
=========

## Descrizione
Il progetto richiedeva la realizzazione di un sito di food delivery pensato per gli studenti universitari del Campus di Cesena.
Il sito è stato realizzato con Javascript/jQuey lato client e PHP lato server interfacciandosi ad un database MySql.
Il design responsive è stato realizzato con il supporto di Bootstrap.

## Features di base

**Portale Clienti:**

* Cercare prodotti in base a nome, categoria, fascia di prezzo o fornitore.
* Visualizzare informazioni sui fornitori dei prodotti
* Aggiungere (previo login) prodotti ad un carrello personale e modificare la quantità da ordinare visualizzando in modo automatico il costo totale
* Ordinare prodotti anche da più fornitori diversi (vengono generati automaticamente più ordini segnalandolo all’utente)
* Ricevere notifiche e aggiornamenti sullo stato corrente dei propri ordini
* Visualizzare tutti gli ordini in corso e passati con i relativi dettagli
* Modificare le proprie informazioni personali e la password di accesso al sito

**Portale Fornitori:**

* Aggiungere prodotti al proprio listino e modificarli
* Visualizzare gli ordini passati ed in corso con i relativi dettagli e gestirne lo stato
* Ricevere notifiche sulla ricezione di nuovi ordini

**Portale Amministratori:**

* Approvazione della registrazione di nuovi fornitori

## Features aggiuntive

* Login sicuro con password criptate lato client e salate lato server.
* Blocco di utenti per troppi tentativi di accesso e procedura di recupero account previa approvazione da parte dell’admin
* Gestione degli orari dei fornitori in modo da ordinare prodotti solo da fornitori effettivamente aperti al momento
* Le notifiche e gli ordini vengono aggiornati con AJAX per ricevere gli aggiornamenti in tempo reale.
* Notifiche via mail per la conferma della registrazione e la ricezione dei nuovi ordini.
* Possibilità da parte dei fornitori di richiedere modifiche da sottomettere all’approvazione dell’amministratore di sistema (es. aggiunta di una categoria per i propri prodotti)
* Nella HomePage vengono visualizzati i fornitori “migliori” (che ricevono più ordini)
* Crop delle immagini caricate sul sito in modo da mantenere un formato quadrato
