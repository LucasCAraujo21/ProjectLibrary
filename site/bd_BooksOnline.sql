create database db_booksonline;
use db_booksonline;
drop database db_booksonline;

-- tabela usuario que tem funcionario como chave estrangeira e esta interligada com venda
create table usuario(
 id_usu int auto_increment primary key,
 nome_usu varchar(80) not null,
 email_usu varchar(50) not null,
 CPF_usu char(14) not null unique,
 senha_usu varchar(50) not null,
 ds_status boolean not null
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
id_usu int,
  constraint foreign key (id_func) references funcionario(id_func),
  constraint foreign key (id_usu) references usuario(id_usu),
  constraint foreign key (id_categoria) references categoria(id_categoria)
);

create table categoria(
	id_categoria int auto_increment primary key,
    ds_categoria varchar(15) not null
);

-- tabela venda que tem livro e usuario como chave estrangeira, alem de ser um relacionamento entre usuario e livro
create table venda (
id_venda int auto_increment primary key,
no_ticket varchar(13) not null,
qt_liv int not null,
vl_liv decimal(10,2) not null,
valor_venda decimal(10,2) generated always as ((qt_liv * vl_liv)) virtual,
dt_venda date not null,
id_usu int(11) not null,
id_liv int(11) not null
);

-- inserts--
insert into categoria
values(default, 'Sci-fi'),
(default, 'Terror'),
(default, 'RPG'),
(default, 'Estudos'),
(default, 'Hqs');

insert into livro (nome_liv, id_categoria, valor, img_liv, quant_liv, desc_liv)
values ('Ordem Paranormal Vol. 2 — O Segredo na Floresta, parte 1', '5' ,'130.00', '7bdede65ac97f08564b231c83cee130e', '0',
'<p>Liz Weber e Thiago Fritz, ainda marcados pelas cicatrizes físicas e emocionais de sua primeira missão, precisam se envolver em outro caso paranormal: o desaparecimento da Equipe Kelvin.</p>
Auxiliados pelo experiente Christopher Cohen e pelos novatos César Oliveira e Joui Jouki, os investigadores rumam até a cidade de Carpazinha… De onde sairão transformados para sempre.</p>
O Segredo da Floresta é a história que consagrou Ordem Paranormal como um fenômeno em todo o país e foi criada por Rafael "Cellbit" Lange. Adaptada por Fábio Yabu e Akila, a versão em quadrinhos apresenta fatos nunca antes mostrados sobre o passado, o presente e o futuro dos personagens.<p>'
);

insert into usuario
values(default, 'Lucas Araujo', 'lc3197@gmail.com', '45703457866', 'Ride', 1);

insert into usuario
values(default, 'Janiolson', 'jaja@gmail.com', '4233225766', 'jaja', 0);

insert into venda(no_ticket, id_usu, id_liv, qt_liv, vl_liv, dt_venda)
values(111222333, 2, 70, 2, 13.00, '2025-10-02');


-- selects
select * from livro;
select * from vw_livro where nome_liv like '%ordem%';
select * from venda;
select * from vw_venda where id_usu = 2;
select * from usuario;
select * from categoria;

select nome_liv, valor, img_liv, quant_liv from vw_livro where ds_categoria = 'Terror';

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

create view vw_venda as
select 
		venda.no_ticket,
        venda.id_usu,
        venda.dt_venda,
        venda.qt_liv,
        venda.valor_venda,
        livro.nome_liv
from venda inner join livro on venda.id_liv = livro.id_liv;

-- alter table
alter table usuario
MODIFY COLUMN desc_liv varchar(2000) not null;

ALTER TABLE usuario 
ADD COLUMN ds_status boolean not null;


-- update
UPDATE livro
SET img_liv = 'iniciacao'
WHERE ID_LIV = 1;









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





create user 'lib'@'localhost' identified with mysql_native_password by '123456';
grant all privileges on db_booksonline.* to 'lib'@'localhost' with grant option;

