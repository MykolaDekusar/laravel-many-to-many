Aggiungiamo una nuova entità Technology.
Questa entità rappresenta le tecnologie utilizzate ed è in relazione many to many con i progetti.
I task da svolgere sono:

-   creare la migration per la tabella technologies
-   creare il model Technology
-   creare la migration per la tabella pivot project_technology
-   aggiungere ai model Technology e Project i metodi per definire la relazione many to many
-   visualizzare nella pagina di dettaglio di un progetto le tecnologie utilizzate, se presenti

## New Tasks

I task sono:
permettere all’utente di associare le tecnologie nella pagina di creazione e modifica di un progetto
gestire il salvataggio dell’associazione progetto-tecnologie con opportune regole di validazione
eliminare opportunamente le relazioni alla cancellazione del progetto/technology
