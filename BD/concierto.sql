DROP DATABASE IF EXISTS conciertos;
CREATE DATABASE conciertos;
use conciertos;

CREATE  TABLE IF NOT EXISTS plazas (
    Num_Plazas_grada int ,
    Num_Plazas_Pista_Golden int ,
     Num_Plazas_Pista int
   )ENGINE = InnoDB charset=utf8;
insert into plazas values(100,25,50);






