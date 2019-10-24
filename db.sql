create table cargo (
	id_cargo			int(2)			primary key auto_increment,
	descricao			varchar(100)
)

create table funcionarios (
	usuario				varchar(100) 	primary key,
	senha				varchar(128)	not null,
	nome				varchar(100),
	telefone			varchar(100),
	cpf					varchar(14),
	endereco			varchar(100),
	telefone_contato	varchar(14),
	telefone_celular	varchar(15),
	data_ingresso		date,
	id_cargo			int(2),
	salario				double
)

alter table funcionarios add constraint fk_cargo foreign key (id_cargo) references cargo (id_cargo);

insert into funcionarios values (
	'admin',
	'$2y$10$84ITFwt8Nw8PDDqytuemb.I45kv8GAG1or9pImqZBI36L.OMYA0Iy',
	null,
	null,
	null,
	null,
	null,
	null,
	null,
	null,
	null
)