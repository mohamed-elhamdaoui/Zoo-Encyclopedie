create DATABASE zoo;

use zoo;

show tables;

create table animals (
    ID int PRIMARY KEY,
    Nom VARCHAR(30),
    Type_alimentaire VARCHAR(30),
    image VARCHAR(200)
);

create table habitats (
    idHab int PRIMARY KEY AUTO_INCREMENT,
    NamHab VARCHAR(40),
    Description_Hab VARCHAR(200)
);
describe animals;
describe habitats;
ALTER Table animals MODIFY COLUMN ID INT NOT NULL AUTO_INCREMENT;
ALTER table animals ADD COLUMN idHab INT;

show tables;

create table animals (
    ID int PRIMARY KEY,
    Nom VARCHAR(30),
    Type_alimentaire VARCHAR(30),
    image VARCHAR(200)
    );

show tables;
select * from animals;

create table habitats(
    idHab int PRIMARY KEY AUTO_INCREMENT,
    NamHab VARCHAR(40),
    Description_Hab VARCHAR(200)
);

show tables ;
show full TABLES;

describe animals;
insert into animals(Nom,Type_alimentaire,image) VALUES 
('Lion','Carnivore','lion.jpg'),
('Gazelle','Herbivore','gazelle.png');

UPDATE Table animals 

ALTER Table animals MODIFY COLUMN ID INT NOT NULL AUTO_INCREMENT;
ALTER table animals ADD COLUMN idHab INT;

show tables;
DESCRIBE habitats;
select * from animals;

ALTER Table animals
ADD constraint fk_anmls_habts FOREIGN key (idHab) REFERENCES habitats(idHab)

DESCRIBE habitats ;
select * FROM habitats;
DESCRIBE animals ;
select * FROM animals;


update animals set `idHab`= 1 where `Nom`= 'Gazelle';

insert into animals(Nom,Type_alimentaire,image) VALUES 
('Lion','Carnivore','lion.jpg'),
('Gazelle','Herbivore','gazelle.png');


insert into habitats(`NamHab`,`Description_Hab`) VALUES 
('Savane','Grande plaine chaude avec herbes sèches et quelques arbres.'),
('Jungle','Forêt dense, humide, avec une végétation riche et variée.'),
('Océan','Milieu marin profond avec une grande biodiversité aquatique.'),
('Forêt de bambou','Zone boisée principalement composée de bambous.');

insert into animals(`Nom`,`Type_alimentaire`,image,`idHab`) VALUES 
('Tigre','Carnivore','tigre.jpg',2),
('Singe','Omnivore','singe.png',2),
('Requin','Carnivore','requin.jpg',3),
('dauphin','Carnivore','dauphin.png',3),
('Panda','Herbivore','panda.jpg',4);

SELECT * from animals;

UPDATE animals 
SET 
    Nom = 'Lion Africain',
    Type_alimentaire = 'Carnivore',
    image = 'lion_africain.jpg',
    idHab = 1
WHERE ID = 1;

UPDATE habitats
SET 
    NamHab = 'Savane Africaine',
    Description_Hab = 'Grande plaine chaude où vivent lions, gazelles, girafes...'
WHERE idHab = 1;

DELETE FROM animals
WHERE ID = 2;


DELETE FROM habitats
WHERE idHab = 4;


SELECT * FROM animals
WHERE Type_alimentaire = 'Carnivore';