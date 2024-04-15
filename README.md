# TsacLogger

Het doel van TsacLogger is het imiteren van een service genaamd toplogger (https://toplogger.nu/en-us/home), maar dan voor de klimvereniging zodat leden van de vereniging over de route kunnen stemmen wat ze het niveau vinden, en ze eventueel kunnen aangeven of ze het een leuke route vonden of niet (Bijvoorbeeld via comments of een sterring rating).

Ik ben pas net begonnen met de site, maar het maakt gebruikt van symfony en twig, momenteel haalt de frontend (tsaclogger-ui) een route op basis van een ID via de api (tsaclogger-api). Vervolgstappen zijn het toevoegen van alle routes, een login systeem zodat alleen leden kunnen stemmen en er word bijgehouden wie al heeft gestemd, 
en een systeem zodat de routebouwers makkelijk kunnen toevoegen wie wat heeft gestemd.

Er is voornamelijk momenteel nog maar 1 relevante database: climbing_route, hierin staat een id, een routenaam (optioneel), de naam van de routebouwer (optioneel), een kleur, en een positie (zodat ze uiteindelijk relatief van elkaar geplaatst kunnen worden zodat ze lijken op hoe ze in de hal geplaatst zijn.
