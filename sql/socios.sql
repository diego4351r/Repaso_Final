create database socios_registrados;

use socios_registrados;

create table socios (
  dni varchar(10),
  nombre varchar(30),
  apellidos varchar(30),
  fecha date,
  primary key (dni)

);