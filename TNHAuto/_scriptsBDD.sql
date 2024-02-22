-- CREATION DES TABLES

drop table if exists etudiant_matiere;
drop table if exists prof_matiere;
drop table if exists matiere;
drop table if exists personne;
drop table if exists users;

create table users(
    login  varchar(50) primary key,
    pass   varchar(150) not null,
    droits varchar(100) not null default('etudiant')
);

create table personne(
    login    varchar(50) primary key references users(login),
    nom      varchar(150) not null,
    prenom   varchar(150),
    courriel varchar(150)
);

create table matiere(
    id_matiere int primary key,
    libelle    varchar(150)
);

create table prof_matiere(
    login      varchar(50) references personne(login),
    id_matiere int references matiere(id_matiere),
    primary key(login,id_matiere)
);

create table etudiant_matiere(
    login      varchar(50) references personne(login),
    id_matiere int references matiere(id_matiere),
    bonus      int not null default 0,
    primary key(login,id_matiere)
);


-- INSERTION DES DONNEES
insert into users  (login, pass, droits) 
   values ('chef',  'ZeBoss',   'admin'),
          ('zoe',   'zoe123',   'etudiant'),          
          ('toto',  'toto123',  'etudiant'),
          ('mimi',  'mimi123',  'etudiant'),          
          ('dudu',  'dudu666',  'prof'),
          ('nana',  'nana666',  'etudiant'),          
          ('boubou','boubou666','prof;admin');

insert into personne (login, nom, prenom, courriel)
    values ('chef',   'admin', 'admin', 'admin@bonus-malus.aie'),
           ('zoe',    'Tagada', 'Zoe', 'zoe.tagada@bonus-malus.aie'),
           ('toto',   'Tsoin-tsoin', 'Thomas', 'thomas.tsointsoin@bonus-malus.aie'),
           ('mimi',   'Yopla', 'Emile', 'emile.yopla@bonus-malus.aie'),
           ('dudu',   'Duruisseau', 'Arthur', 'art.dudu@bonus-malus.aie'),
           ('nana',   'Stone', 'Nana', 'nana.stone@bonus-malus.aie'),
           ('boubou', 'Bouby', 'Claude', 'claude.bouby@bonus-malus.aie');

insert into matiere (id_matiere,libelle) 
    values (1,'Couture'),
           (2,'Maths'),
           (3,'Programmation');

insert into prof_matiere(login, id_matiere) 
    values ('dudu','1'),
           ('boubou','2'), 
           ('boubou','3');

insert into etudiant_matiere(login,id_matiere,bonus)
    values ('zoe',1,2),
           ('zoe',2,-0.5),
           ('toto',2,-2.5),
           ('toto',3,0.15),
           ('mimi',1,-1.5),
           ('nana',1,-1),
           ('nana',2,2.5),
           ('nana',3,1.5);

