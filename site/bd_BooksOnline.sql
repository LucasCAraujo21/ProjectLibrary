create database db_booksonline;
use db_booksonline;
drop database db_booksonline;

-- tabela de funcinario que esta interligada com cliente, livro, pagamento e  agenda
create table funcionario(
 id_func int auto_increment primary key,
 nome_func varchar(80) not null,
 email_func varchar(50) not null,
 senha_func varchar(50) not null,
 CPF_func char(14) not null unique
);

-- tabela cliente que tem funcionario como chave estrangeira e esta interligada com venda
create table cliente(
 id_cli int auto_increment primary key,
 nome_cli varchar(80) not null,
 email_cli varchar(50) not null,
 tel_cli varchar(14) not null,
 CPF_cli char(14) not null unique,
 senha_cli varchar(50) not null,
 id_func int, 
 constraint foreign key (id_func) references funcionario(id_func)
);

-- tabela livro que tem funcionario como chave estrangeira e esta interligada com venda e comissão
create table livro(
id_liv int auto_increment primary key,
id_categoria int not null,
valor decimal(16,2) not null,
quant_liv int not null,
nome_liv varchar(50) not null,
desc_liv varchar(2000) not null,
img_liv varchar(250) not null,
cart_liv bit not null,
id_func int,
id_cli int,
  constraint foreign key (id_func) references funcionario(id_func),
  constraint foreign key (id_cli) references cliente(id_cli),
  constraint foreign key (id_categoria) references categoria(id_categoria)
);

create table categoria(
	id_categoria int auto_increment primary key,
    ds_categoria varchar(15) not null
);

-- inserts de categoria e livro--
insert into categoria
values(default, 'Sci-fi'),
(default, 'Terror'),
(default, 'RPG'),
(default, 'Estudos'),
(default, 'Hqs');

insert into livro (nome_liv, id_categoria, valor, img_liv, quant_liv, desc_liv)
values ('Ordem Paranormal — O Espreitador e Outras Histórias', '2' ,'120.00', 'espreitador', '500',
'<p>Onde Termina O Medo… E Começa a Realidade?</p>
Primeiro lançamento de literatura de Ordem Paranormal ― universo de terror criado por Cellbit e fenômeno de público em todo o Brasil ― este livro traz três novelas completas: O Espreitador, Dia das Mães Maldito e Photophobia.</p>
Escritas por três dos principais autores do gênero no país, os best-sellers Felipe Castilho, Karen Soarele e Leonel Caldela, as novelas são baseadas na história de Daniel Hartmann, um dos primeiros e mais famosos personagens desse universo.</p>
Na mitologia de Ordem Paranormal, Hartmann era um autor de sucesso e foi o responsável involuntário pela criação de monstros tão terríveis quanto icônicos. Isso porque o medo que seus leitores sentiram de suas criações literárias era tão grande que permitiu que elas deixassem as páginas dos livros e se manifestassem na realidade.</p>
Agora, com este livro, você poderá ler as mesmas histórias que aterrorizaram as pessoas do universo de Ordem Paranormal. Vamos apenas torcer para que, desta vez, as criaturas se mantenham no reino da ficção.<p>'
);


-- selects
select * from livro;
select * from categoria;

-- view
create view vw_livro
as select 
	livro.id_liv,
    categoria.ds_categoria,
    livro.valor,
    livro.quant_liv,
    livro.nome_liv,
    livro.desc_liv,
    livro.img_liv
from livro inner join categoria on livro.id_categoria = categoria.id_categoria;

select * from vw_livro;
select * from vw_livro where id_liv = 2;

-- alter table
alter table livro
MODIFY COLUMN desc_liv varchar(2000) not null;






-- tabela pagamento que tem funcionario como chave estrangeira 
create table pagamento(
id_pag int auto_increment primary key,
tipo_pag varchar(10) not null,
valor_total int not null,
id_func int,
  constraint foreign key (id_func) references funcionario(id_func)
);

-- tabela agenda que tem funcionario como chave estrangeira 
create table agenda(
periodo datetime not null,
desc_agenda varchar(50) not null,
id_func int primary key,
  constraint foreign key (id_func) references funcionario(id_func)
);

-- tabela venda que tem livro e cliente como chave estrangeira, alem de ser um relacionamento entre cliente e livro
create table venda (
id_venda int auto_increment primary key,
no_ticket varchar(13) not null,
qt_liv int not null,
vl_liv decimal(10,2) not null,
valor_venda decimal(10,2) generated always as ((qt_liv * vl_liv)) virtual,
dt_venda date not null,
id_cli int(11) not null,
id_liv int(11) not null
);

insert into venda(no_ticket, id_cli, id_liv, qt_liv, vl_liv, dt_venda)
values(111222333, 2, 2, 2, 52.20, '2024-10-02');


select * from venda;

create view vw_venda as
select 
		venda.no_ticket,
        venda.id_cli,
        venda.dt_venda,
        venda.qt_liv,
        venda.valor_venda,
        livro.nome_liv
from venda inner join livro 
on venda.id_liv = livro.id_liv;

select * from vw_venda;
select * from vw_venda where id_cli = 2;



create table tel_func(
id_fone int primary key auto_increment,
tel_func varchar (11) not null,
id_func int,
constraint foreign key (id_func) references funcionario(id_func)
);

create table tel_cli(
id_fone int primary key auto_increment,
tel_cli varchar (11) not null,
id_cli int,
constraint foreign key (id_cli) references cliente(id_cli)
);

create user 'lib'@'localhost' identified with mysql_native_password by '123456';
grant all privileges on db_booksonline.* to 'lib'@'localhost' with grant option;

