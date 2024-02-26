# Database-creation

Je crée une base de données en vue de mon examen titre pro développeur web et web mobile niveau bac +2. Le projet est un site vitrine pour des origamis.

# Les tables

Il y a 3 tables : Oigamis, utilisateurs et commentaires.

# Les relations(cardinalités)

Voici les relations :

-Un USER peut écrire 0 ou plusieurs commentaires (OneToMany)
-Un commentaire peut être écrit 1 seul USER (ManyToOne)

-Un Origami peut avoir 0 ou plusieurs commentaires (OneToMany)
-Un commentaire est associé à un seul Origami (ManyToOne)

-Un user peut poster 0 ou plusieurs origamis (OneToMany)
-Un origami ne peut être posté que par un seul USER (ManyToOne)
