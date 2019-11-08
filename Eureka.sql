create database eureka char set utf8;
use eureka;
create table cargo(
	id_cargo int not null auto_increment primary key,
    nome_cargo varchar(200) not null,
    permissao int not null
)engine=InnoDB;

create table funcionario(
	id_funcionario int not null auto_increment primary key,
    nome_func varchar(100) not null,
    senha varchar(100) not null,
    email varchar(50) not null,
    matricula varchar(30) not null,
    cpf varchar(14) not null,
    id_cargo int not null,
    foreign key (id_cargo) references cargo(id_cargo)
)engine=InnoDB;

show columns from funcionario;

insert into cargo(nome_cargo,permissao) values
('presidente',1);

select * from funcionario;

insert into funcionario(nome_func,senha,email,matricula,cpf,id_cargo) values
('Gabriel','abc','aaaa','zxdas','11sad',1);