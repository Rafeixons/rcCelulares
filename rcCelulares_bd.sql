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




create user 'cliente'@'localhost'	identified by '123456';
create user 'administrador'@'localhost'	identified by '78910';

grant all privileges
on rccelulares
to 'administrador'@'localhost';


grant select, insert
on rccelulares.venda
to 'cliente'@'localhost';

show grants for 'cliente'@'localhost';
show grants for 'administrador'@'localhost';
