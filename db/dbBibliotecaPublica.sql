create database dbBiblioteca;
use dbBiblioteca;

create table tbFunc (
	idFunc int primary key auto_increment not null
	,cpfFunc varchar(15)
    , nmFunc varchar(80)
    , dtNascFunc date
    , idGenFunc varchar(30)
    , emailFunc varchar(90)
    , celFunc varchar(20)
    , endFunc varchar(120)
    , ativoFunc bool
    , perfilFunc char(3)
    , senhaFunc varchar(256)
);

alter table tbFunc
modify senhaFunc varchar(256);

DESCRIBE tbFunc;
select * from tbFunc;
select * from tbFunc where idFunc = '1';

update tbFunc
set nmFunc = 'Leticia Regis', idGenFunc = 'Mulher Cis', emailFunc = 'leti@gmail.com', celFunc = '11 98888-8888', perfilFunc = 'Adm', ativoFunc = '1', endFunc = 'Rua Onde Judas Perdeu as Botas, 666 - Jardim São Jão'
where cpfFunc like '999.999.999-01';

create table tbCliente (
	cpfClie varchar(15) primary key not null
    , nmClie varchar(80)
    , dtNascClie date
    , idGenClie varchar(30)
    , emailClie varchar(90)
    , celClie varchar(20)
    , endClie varchar(120)
    , fk_idFunc int
    , foreign key (fk_idFunc) references tbFunc(idFunc)
);

create table tbLivro (
	codLiv int primary key auto_increment not null
    , isbnLiv varchar(18)
    , titLiv varchar(80)
    , autorLiv varchar(80)
    , editoraLiv varchar(80)
    , anoLiv year
    , idiomaLiv varchar(30)
    , custoLiv decimal(10,2)
    /**/
    , fk_idFunc int
    , foreign key (fk_idFunc) references tbFunc(idFunc)
);

select * from tbLivro;

create table tbEstoque (
	codEst int primary key auto_increment not null
    , qntdEst int
    , dispEst int
    , fk_codLiv int
    , foreign key (fk_codLiv) references tbLivro(codLiv)
);

create table tbComanda (
	codCom int primary key auto_increment not null
    , dtCom date
    , dtDev date
    , devolvido bool
    , emAtraso bool
    , fk_codLiv int
    , fk_codLiv2 int
    , fk_codLiv3 int
    , fk_cpfClie varchar(15)
    , fk_idFunc int
    , foreign key (fk_codLiv) references tbLivro(codLiv)
    , foreign key (fk_codLiv2) references tbLivro(codLiv)
    , foreign key (fk_codLiv3) references tbLivro(codLiv)
    , foreign key (fk_cpfClie) references tbCliente(cpfClie)
    , foreign key (fk_idFunc) references tbFunc(idFunc)
);

alter table tbComanda
add fk_codLiv3 int;
alter table tbComanda
add foreign key (fk_codLiv3) references tbLivro(codLiv);

alter table tbComanda
modify statusCom text;

alter table tbComanda
drop column statusCom;

alter table tbComanda
add devolvido bool;
alter table tbComanda
add emAtraso bool;

describe tbComanda;

/*create table tbMulta (
	codMulta int primary key auto_increment not null
    , statusMulta varchar(30)
    , fk_codCom int
    , fk_cpfClie varchar(15)
    , foreign key (fk_codCom) references tbComanda(codCom)
    , foreign key (fk_cpfClie) references tbCliente(cpfClie)
);
*/
drop table tbMulta;

DELIMITER //
create procedure SP_SelectForEstoqueInsert(isbn varchar(18))
BEGIN
	/* Verifica se o livro está cadastrado*/
	if exists(select isbnLiv from tbLivro where isbnLiv like isbn)
	then 
		BEGIN
			/* Verifica se o livro já está cadastrado no estoque*/
			set @cod := (select codLiv from tbLivro where isbnLiv like isbn);
			if exists(select codEst from tbEstoque where fk_codLiv = @cod)
				then select ('Erro_EstoqueCadastrado') as codLiv, ('') as titLiv;
			else
				/*Retorna os dados do livro*/
				select * from tbLivro where isbnLiv like isbn; 
			END if;
		END;
    else
		select ('Erro_EncontrarLivro') as codLiv, ('') as titLiv;
	END if;
END;
//

call SP_SelectForEstoqueInsert("978-65-5532-057-2");

DELIMITER //
create procedure SP_InsertForEstoque(isbn varchar(18), qntd int, disp int)
BEGIN
	set @cod := (select codLiv from tbLivro where isbnLiv like isbn limit 1);
    insert into tbEstoque(qntdEst, dispEst, fk_codLiv) values
    (
		qntd, disp, @cod
    );
    select codEst from tbEstoque where fk_codLiv = @cod;
END;
//

drop procedure SP_InsertForEstoque;

call SP_InsertForEstoque('978-8555340949', 10, 10);
select * from tbEstoque;
select * from tbComanda where devolvido = 1;

/*ALTER TABLE tb AUTO_INCREMENT = 50;*/

DELIMITER //
create procedure SP_SelectForEstoqueUpdate(isbn varchar(18))
BEGIN
	/* Verifica se o livro já está cadastrado no estoque*/
	set @cod := (select codLiv from tbLivro where isbnLiv like isbn);
	if exists(select codEst from tbEstoque where fk_codLiv = @cod)
		/*Retorna os dados do livro*/
        then select tbEstoque.codEst, tbEstoque.qntdEst, tbEstoque.dispEst, tbLivro.titLiv
			from tbEstoque INNER JOIN tbLivro
			on tbEstoque.fk_codLiv = tbLivro.codLiv
			where tbEstoque.fk_codLiv = @cod limit 1;
			/*then select * from tbEstoque where fk_codLiv = @cod limit 1;*/
	else
		/*Retorna erro*/
        select ('Erro_EstoqueNaoCadastrado') as codEst, '' as titLiv, 0 as qntdEst, 0 as dispEst, 0 as fk_codLiv/*titLiv*/;
	END if;
END;
//

DELIMITER //
create procedure SP_UpdateForEstoque(isbn varchar(18), qntd int, disp int)
BEGIN
	set @cod := (select codLiv from tbLivro where isbnLiv like isbn limit 1);
	update tbEstoque
		set qntdEst = qntd, dispEst = disp 
		where fk_codLiv = @cod;
END;
//

select tbEstoque.codEst, tbLivro.isbnLiv, tbLivro.titLiv, tbEstoque.qntdEst, tbEstoque.dispEst
	from tbEstoque INNER JOIN tbLivro
	on tbEstoque.fk_codLiv = tbLivro.codLiv
	where tbEstoque.fk_codLiv = @cod limit 1;

DELIMITER //
create procedure SP_InsertCliente
	(
		cpf varchar(15)
        ,nm varchar(80)
		, dtNasc date
		, idGen varchar(30)
		, email varchar(90)
		, cel varchar(20)
		, ende varchar(120)
		, idFunc int
	)
BEGIN
	/* Verifica se o CPF já está cadastrado*/
	if exists(select cpfClie from tbCliente where cpfClie like cpf)
	then 
		select ('Erro_CPFCadastrado') as queryStatus;
    else
		BEGIN
			/* Cadastra Cliente*/
			insert into tbCliente(cpfClie, nmClie, dtNascClie, idGenClie, emailClie, celClie, endClie, fk_idFunc)
				values (cpf,nm, dtNasc, idGen, email, cel, ende, idFunc);
			select ('SUCESSO_ClienteCadastrado') as queryStatus;
		END;
	END if;
END;
//

select * from tbCliente;

select * from tbComanda INNER JOIN tbMulta
			on tbComanda.codCom = tbMulta.fk_codCom
			where tbComanda.fk_cpfClie like '999.999.999-91' 
            order by tbComanda.dtCom desc limit 1;

select * from tbCliente 
JOIN tbComanda
ON tbCliente.cpfClie like tbComanda.fk_cpfClie
JOIN tbMulta
ON tbComanda.codCom like tbMulta.fk_codCom
WHERE tbCliente.cpfClie like '999.999.999-91'
order by tbComanda.dtCom desc limit 1;

DELIMITER //
create procedure SP_SelectForVerifyCliente(cpf varchar(15))
BEGIN
	if exists(select cpfClie from tbCliente where cpfClie like cpf)
		then
			(select * from tbCliente where cpfClie like cpf)
            UNION
            (select * from tbComanda INNER JOIN tbMulta
				on tbComanda.codCom = tbMulta.fk_codCom
				where tbComanda.fk_cpfClie like cpf 
				order by tbComanda.dtCom desc limit 1);
	else
		(select * from tbCliente where cpfClie = '')
        UNION
        (select * from tbComanda INNER JOIN tbMulta
			on tbComanda.codCom = tbMulta.fk_codCom
			where tbComanda.fk_cpfClie like '' 
            order by tbComanda.dtCom desc limit 1);
    END if;
END;
//

drop procedure SP_SelectForVerifyCliente;

DELIMITER //
create procedure SP_SelectForVerifyCliente(cpf varchar(15))
BEGIN
	select * from tbCliente where cpfClie like cpf;
END;
//

DELIMITER //
create procedure SP_InsertRealizarComanda(cpf varchar(15),realizado date, dev date, isbn varchar(18), isbn2 varchar(18), isbn3 varchar(18), func int)
BEGIN
	if exists(select codLiv from tbLivro where isbnLiv like isbn)
		then 
			if (exists(select codLiv from tbLivro where isbnLiv like isbn2) or isbn2 like '')
				then
					if (exists(select codLiv from tbLivro where isbnLiv like isbn3) or isbn3 like '')
						then
							set @cod := (select codLiv from tbLivro where isbnLiv like isbn);
                            if((select dispEst from tbEstoque where fk_codLiv = @cod) > 0)
								then
									if(isbn2 not like '')
										then set @cod2 := (select codLiv from tbLivro where isbnLiv like isbn);
									else
										set @cod2 := 0;
									end if;
                                    if(@cod2 = 0 or (select dispEst from tbEstoque where fk_codLiv = @cod2) > 0)
										then
											if(isbn3 not like '')
											then set @cod3 := (select codLiv from tbLivro where isbnLiv like isbn);
											else
												set @cod3 := 0;
											end if;
                                            if(@cod3 = 0 or (select dispEst from tbEstoque where fk_codLiv = @cod3) > 0)
												then
													insert into tbComanda(dtCom, dtDev, devolvido , emAtraso, fk_codLiv, fk_codLiv2, fk_codLiv3, fk_cpfClie, fk_idFunc) 
														values (realizado, dev, false, false, @cod, @cod2, @cod3, cpf, func);
                                                    set @codEst := (select codEst from tbEstoque where fk_codLiv = @cod limit 1);
                                                    set @codEst2 := (select codEst from tbEstoque where fk_codLiv = @cod2 limit 1);
                                                    set @codEst3 := (select codEst from tbEstoque where fk_codLiv = @cod3 limit 1);
                                                    update tbEstoque
														set dispEst = (dispEst - 1)
														where codEst = @codEst;
													update tbEstoque
														set dispEst = (dispEst - 1)
														where codEst = @codEst2;
													update tbEstoque
														set dispEst = (dispEst - 1)
														where codEst = @codEst3;
													select codCom from tbComanda where fk_cpfClie like cpf order by dtCom limit 1;
											else
												select 'ISBN3_INDISPONIVEL' as codCom;
											end if;
									else
										select 'ISBN2_INDISPONIVEL' as codCom;
                                    end if;
								else
									select 'ISBN_INDISPONIVEL' as codCom;
								end if;
					else
						select 'ISBN3_INVALIDO' as codCom;
					end if;
			else
				select 'ISBN2_INVALIDO' as codCom;
			end if;
	else
		select 'ISBN_INVALIDO' as codCom;
    end if;
END;
//
call SP_InsertRealizarComanda('999.999.999-91','2022-09-29', '2022-10-29', '978-85-4220-779-8', '', '', 1);

select * from tbLivro;
select * from tbComanda;
select * from tbEstoque;

select codLiv from tbLivro where isbnLiv like '978-85-4220-779-';

/* SELECT *
FROM players
WHERE DATE(us_reg_date) BETWEEN '2000-07-05' AND '2011-11-10'*/ 

select *
from tbComanda 
INNER JOIN tbLivro
ON tbComanda.fk_codLiv = tbLivro.codLiv
where fk_cpfClie like '999.999.999-91' order by dtCom limit 1;

select *
from tbComanda 
INNER JOIN tbLivro
ON tbComanda.fk_codLiv = tbLivro.codLiv
where fk_cpfClie like '999.999.999-92' and devolvido = false order by dtCom limit 1;

select * from tbComanda
                join tbLivro
                on tbComanda.fk_codLiv = tbLivro.codLiv
                where devolvido = false and fk_cpfClie like '999.999.999-92' limit 1