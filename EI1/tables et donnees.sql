drop table if exists fa_chat_competence;
drop table if exists  fa_favori;
drop table if exists  fa_chat;
drop table if exists  fa_user;
drop table if exists fa_competence;


CREATE TABLE fa_chat(
   id INT AUTO_INCREMENT,
   nom VARCHAR(50) NOT NULL,
   dateNaissance DATE,
   commentaire VARCHAR(300),
   image varchar(50) default 'chat-noir.png',
   adoptable tinyint default 1,
   PRIMARY KEY(id)
);

CREATE TABLE fa_competence(
   id INT AUTO_INCREMENT,
   libelle VARCHAR(150) NOT NULL,
   PRIMARY KEY(id)
);



CREATE TABLE fa_chat_competence(
   id_chat INT,
   id_competence INT,
   PRIMARY KEY(id_chat, id_competence),
   FOREIGN KEY(id_chat) REFERENCES fa_chat(id),
   FOREIGN KEY(id_competence) REFERENCES fa_competence(id)
);

CREATE TABLE fa_user(
    login varchar(30) PRIMARY KEY,
    pass varchar(255) not null,
    role varchar(30)
);

CREATE TABLE fa_favori(
   id_chat INT,
   login varchar(30),
   PRIMARY KEY(id_chat, login),
   FOREIGN KEY(id_chat) REFERENCES fa_chat(id),
   FOREIGN KEY(login) REFERENCES fa_user(login)
);

INSERT INTO fa_chat (id,nom,dateNaissance,commentaire,image,adoptable) VALUES 
(1,'Pito','2020-02-13','Aime faire le clown.','chapiteau.png',1)
,(2,'Lumeau','2005-01-28','Apprécie la chaleur.','chalumeau.png',1)
,(3,'Rabia','2022-12-07','Miaulements parfois incompréhensibles.','bete.png',1)
,(4,'Mo','2022-12-14','Très sobre.','chameau.png',1)
,(5,'Pomelon','2013-06-05','Une élégance remarquable.','melon.png',1)
,(6,'Seur','2012-07-01','Fasciné par les souris.','archer.png',1)
,(7,'Luchava','2019-03-03','Un Hello World sur 4 pattes.','hello.png',1)
,(8,'Grain','2020-11-21','A souvent les yeux humides.','larmes.png',1)
,(9,'Todo','2017-04-06','Sait faire la danse de la pluie.','faucet.png',1)
,(10,'Zuble','2016-07-14','Aime courir après les ballons.','shirt.png',1)
;
INSERT INTO fa_chat (id,nom,dateNaissance,commentaire,image,adoptable) VALUES 
(11,'Noine','2021-01-29','Très spirituel.','chanoine2.png',1)
,(12,'Rognard','2016-07-08','Mange ce que vous ne mangez pas.','vautour.png',1)
,(13,'Rivari','2021-05-10','Crée volontiers un peu de désordre.','desordre.png',1)
,(14,'Pitre','2016-09-03','Aime beaucoup les livres humoristiques.','livre.png',1)
,(15,'Sneige','2009-10-30','Adore jouer avec les flocons.','neige.png',1)
,(16,'Kal','2021-11-20','Attention, est parfois un peu agressif.','fox.png',1)
,(17,'Tofor','2017-06-01','A la phobie des sièges.','chateau.png',1)
,(18,'Djipiti','2022-11-02','A toujours quelque chose à dire. Et parfois c''est intéressant.','cpu.png',1)
;
insert into fa_competence(libelle)
    values  ('... à venir ... formation en cours.'),
            ('Recherche des réponses à toutes vos questions dans Wikipedia (NB : "rechercher" ne signifie pas "trouver").'),
            ('Danse la Java sur ses pattes arrières.'),
            ('Implémente tous vos diagrammes de classes en assembleur X86.'),
            ('Parfait pour vous remplacer en réunion : peut parler de tout avec assurance, sans rien connaître.'),
            ('Peut composer une Symfony (3 notes différentes au maximum).'),
            ('Peut servir de hot-spot : ses moustaches captent la 5G.'),
            ('Pro du dev web : capable de suivre n''importe quel tuto d''HTML et CSS.'),
            ('Dispose d''un réseau de neurones haute performance entre ses deux oreilles, paramétrable à la souris'),
            ('Peut commenter tous vos codes C, C++ ou C# (commentaires exclusivement en latin ou en grec ancien)'),
            ('Son regard charme les serpents, en particulier les Pythons');
            
INSERT INTO fa_chat_competence (id_chat,id_competence) VALUES
	 (1,3),
	 (1,11),
	 (2,7),
	 (3,5),
	 (3,6),
	 (4,4),
	 (4,8),
	 (4,9),
	 (5,3),
	 (6,11);
INSERT INTO fa_chat_competence (id_chat,id_competence) VALUES
	 (7,2),
	 (7,7),
	 (8,1),
	 (9,7),
	 (10,8),
	 (10,9),
	 (11,10),
	 (12,1),
	 (12,6),
	 (13,1);
INSERT INTO fa_chat_competence (id_chat,id_competence) VALUES
	 (14,2),
	 (14,9),
	 (15,8),
	 (16,1),
	 (17,4),
	 (18,2),
	 (18,5);            

INSERT INTO fa_user (login,pass,`role`) VALUES
	 ('admin','$2y$10$yUPTPJX/iD0roPA/2gAe/.WQqcD4NNc0f2wb1HJYqitgkPP9kj4pa','admin'),
	 ('user1','$2y$10$T/orA1bN0HHZU4COpLhFuu5T8obN5T88h84HLqvbPeaFCXAB2VRS2','inscrit'),
	 ('user10','$2y$10$GDVOWp8hu13Z8w6/rJOzCOjNI9htqqwLCiWGdzvNveYZXS2x18Wpe','inscrit'),
	 ('user11','$2y$10$XyMq3h1bLXEBFHxdz4tfc.vW7cWjnN5mkicsvmJE8Px81iPytBGpi','inscrit'),
	 ('user12','$2y$10$g9X4LmYMkd.wBH0siz2Lzea3JJ0LZt9uzu0uZTAMn0AKwpA28.05m','inscrit'),
	 ('user13','$2y$10$s5D.BRSVTH6sPIBOekwgA.o4e.UVqoPr5nGSuyfF9KkRcDIa/AhT.','inscrit'),
	 ('user14','$2y$10$jWO6bk2sbk7Eum/lhb0bieAVHZVoUopVs0/3O07vRz8TpcpVrPSVe','inscrit'),
	 ('user15','$2y$10$/t5mIs1/4q43hCRwiXjonOUo73Lfls1FaytVJZWNvmZ8zeD89y3ku','inscrit'),
	 ('user16','$2y$10$iL8tTlwwUkqXy3alp.CUhulLvuOwHUKSCaI.JjtforjbG6U3e5kV.','inscrit'),
	 ('user17','$2y$10$jVYQId53Yk7DkCT9i9ScY.itZkUTgcZ04P8jtkNhh6lJyjP7Z7HbS','inscrit');
INSERT INTO fa_user (login,pass,`role`) VALUES
	 ('user18','$2y$10$Z8Rsm5.ae.rjO6MWS3dUXen7Lo6WC/aynNPv0/OWeFmcYwHZmM9Ru','inscrit'),
	 ('user19','$2y$10$Re0tF5RN8.hhQxNVTLfTIOoe0t9CQ.NkGz.Dk0RvKVixF8I0hqDQC','inscrit'),
	 ('user2','$2y$10$6e6D5JNShLdiL9aoWbXox.jKiucp6Q2CtG8FiuO2lzXn3qgYnL1Fy','inscrit'),
	 ('user3','$2y$10$74LOwn26GO7VYqpVbcRWoubuV1OJH23gu54EG2V7m376tsR536kq6','inscrit'),
	 ('user4','$2y$10$i1zZ4FL2WYd.aPO2BYav2uMitM.UiDNSs3/TG1yQN7pXj9ioh4V9q','inscrit'),
	 ('user5','$2y$10$BZDQfPurRb3F0HVnTF6Od.cRaqbll3w6HtPaJaEmVLxl.hTx8iHG2','inscrit'),
	 ('user6','$2y$10$3LskLhJdYrTfqabB0ayn3O2SzsqSTDqgd4O621HleX8q.op62ly2i','inscrit'),
	 ('user7','$2y$10$p5yQWLqZzOOoeNQaWiaYU.BUldHxOH5Etrb/vJbt7a3aoNotAID1i','inscrit'),
	 ('user8','$2y$10$iopjhGj9EtAHABLlwKKLm.7Ob7dxQJH3.miaSwYS3V0gQTuSRS08q','inscrit'),
	 ('user9','$2y$10$N7ZW32SH49q5bWXV2tIvMeaqaV/KsrdhjbljoZGP67UJv/o7RQv3K','inscrit');           

