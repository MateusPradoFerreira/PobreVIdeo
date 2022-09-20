drop database cinema;
create database cinema;
use cinema;

select * from filme inner join categoria ON filme.fk_categoria = categoria.id_categoria where nome like '%min%' or nome_categoria like '%min%';

create table filme (
	id_filme int unsigned not null auto_increment primary key,
    nome varchar(45) not null,
    ano int(4) not null,
    diretor varchar(45) not null,
    premio varchar(45) not null,
    link_imagem varchar(500) not null,
    duracao time,
    fk_categoria int unsigned not null,
    index cat(fk_categoria)
);

create table categoria (
	id_categoria int unsigned not null auto_increment primary key,
    nome_categoria varchar(45) not null
);

insert into categoria (nome_categoria) value ('Outros');
insert into categoria (nome_categoria) value ('Terror');
insert into categoria (nome_categoria) value ('Ação');
insert into categoria (nome_categoria) value ('Animação');
insert into categoria (nome_categoria) value ('Faroeste');
insert into categoria (nome_categoria) value ('Anime');

insert into filme (nome, ano, diretor, premio, link_imagem, duracao, fk_categoria) 
value ('Minions: O filme', 2015, 'Pierre Coffin', 'Melhor animação', 'https://media.moneytimes.com.br/uploads/2022/07/minions-2-origem-gru.jpg', '02:16:00', 4);
insert into filme (nome, ano, diretor, premio, link_imagem, duracao, fk_categoria) 
value ('Transformers - O despertar das feras', 2016, 'Steven Caple Jr.', 'Melhor Direção', 'https://uploads.jovemnerd.com.br/wp-content/uploads/2021/11/transformers-capa.jpg', '01:26:00', 3);
insert into filme (nome, ano, diretor, premio, link_imagem, duracao, fk_categoria) 
value ('Telefone preto', 2014, 'Scott Derrickson', 'Melhor atuação', 'https://cafecomnerd.com.br/wp-content/uploads/2021/10/O-Telefone-Preto-Terror-da-Blumhouse-diretor-Scott-Derrickson-trailer-divulgado-pela-Universal-Pictures-1024x550.jpg', '02:46:00', 2);
insert into filme (nome, ano, diretor, premio, link_imagem, duracao, fk_categoria) 
value ('Evocação do mal', 2008, 'James Wan', 'Melhor atuação', 'https://i.ytimg.com/vi/5gN2uH3EJFU/maxresdefault.jpg', '01:39:00', 2);
insert into filme (nome, ano, diretor, premio, link_imagem, duracao, fk_categoria) 
value ('Carros', 2007, 'John Lasseter', 'Melhor roteiro', 'https://i0.wp.com/cromossomonerd.com.br/wp-content/uploads/2017/07/8cde9e1d82fbfd9417abccc72dbe0ffe.jpg?fit=901%2C663&ssl=1', '02:27:00', 4);
insert into filme (nome, ano, diretor, premio, link_imagem, duracao, fk_categoria) 
value ('O massacre da serra eletrica', 2016, 'Jonathan Liebesman', 'Melhor Direção', 'https://minhaseriefavorita.com/wp-content/uploads/2021/12/O-Massacre-da-Serra-Eletrica-O-Retorno-de-Leatherface.jpeg', '03:34:00', 2);
insert into filme (nome, ano, diretor, premio, link_imagem, duracao, fk_categoria) 
value ('A voz do silencio (Koe No Katachi)', 2015, 'Jonathan Liebesman', 'Melhor Animação', 'https://uploads.jovemnerd.com.br/wp-content/uploads/2020/06/a-voz-do-silencio-koe-no-katachi.jpg', '02:21:00', 6);
insert into filme (nome, ano, diretor, premio, link_imagem, duracao, fk_categoria) 
value ('Kimi no na wa', 2016, 'Makoto Shinkai', 'Melhor Animação', 'https://www.jornalismo.ufv.br/cinecom/wp-content/uploads/2018/09/Cr%C3%ADtica-Kimi-no-na-wa-capa.png', '02:21:00', 6);
insert into filme (nome, ano, diretor, premio, link_imagem, duracao, fk_categoria) 
value ('Up - Altas Aventuras', 2009, 'Pete Docter', 'Melhor Roteiro', 'https://tm.ibxk.com.br/2022/03/21/21122650070269.jpg?ims=1200x675', '01:42:00', 4);
insert into filme (nome, ano, diretor, premio, link_imagem, duracao, fk_categoria) 
value ('Duro de Matar 2', 1990, 'Renny Harlin', 'Melhor Ator', 'https://i.ytimg.com/vi/mjBx1yhIP9M/maxresdefault.jpg', '02:24:00', 3);
insert into filme (nome, ano, diretor, premio, link_imagem, duracao, fk_categoria) 
value ('Mandando Bala', 2007, 'Michael Davis', 'Melhores VFX', 'http://2.bp.blogspot.com/-w_9l2EvbQ74/VM0zKvLUwoI/AAAAAAAABRo/lNiw-z5RErg/s1600/owen.jpg', '01:26:00', 3);
insert into filme (nome, ano, diretor, premio, link_imagem, duracao, fk_categoria) 
value ('Violet Evergarden - O Filme', 2020, 'Taichi Ishidate', 'Melhor Direção de Arte', 'https://ovicio.com.br/wp-content/uploads/2021/09/20210919-ovicio-netflix-violet.jpg', '02:21:00', 6);
