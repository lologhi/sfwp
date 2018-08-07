sfwp
====

A Symfony command (`src/Command/SyncCommand`) to query Salesforce.

To make it work:
- duplicate `.env.dist` in `.env` and change content.
- add a `entreprise.wsdl.xml`, downloaded from Salesforce.

To call the command: `bin/console app:sync`.

