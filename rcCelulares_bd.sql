drop database rcCelulares;


create database rcCelulares;

use rcCelulares;


CREATE TABLE clientes (
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    nome_cliente VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    email VARCHAR(100) unique
    );

create table produtos(
id_produto int primary key auto_increment,
nome_produto varchar(100) not null,
preco double not null
);

create table venda(
id_venda int primary key auto_increment,
cliente int not null,
produto int not null,
CONSTRAINT fk_venda_cliente FOREIGN KEY (cliente) REFERENCES clientes(id_cliente),
CONSTRAINT fk_venda_produto FOREIGN KEY (produto) REFERENCES produtos(id_produto)
);

create table usuario(
    idusuario int primary key auto_increment,
    nome varchar(150) not null,
    email varchar(100) not null unique,
    telefone varchar(20),
    senha_hash varchar(255) not null,
    perfil enum('cliente','administrador') default 'cliente',
    criado_em timestamp default current_timestamp
);

create user 'cliente'@'localhost'	identified by '123456';
create user 'administrador'@'localhost'	identified by '78910';

grant all privileges
on rccelulares
to 'administrador'@'localhost';


grant select, insert
on rccelulares.venda
to 'cliente'@'localhost';

show grants for 'cliente'@'localhost';


GRANT ALL PRIVILEGES
ON rccelulares.*
TO 'administrador'@'localhost';


INSERT INTO usuario (
nome,
email,
senha_hash,
perfil
)
VALUES (
'Administrador',
'admin@rccelulares.com',
'$2y$10$EXEMPLOHASH',
'administrador'
);


SELECT user, host
FROM mysql.user;

SHOW DATABASES;

DROP USER IF EXISTS 'administrador'@'localhost';

CREATE USER 'administrador'@'localhost'
IDENTIFIED BY '78910';

GRANT ALL PRIVILEGES
ON rccelulares.*
TO 'administrador'@'localhost';

FLUSH PRIVILEGES;

show grants for 'administrador'@'localhost';


UPDATE usuario
SET senha_hash = '$2y$10$SesrIs56flE9q/mqmT76IettiWEtul/YcIeOum5Ta2bkA2y7IyKC2'
WHERE email = 'admin@rccelulares.com';