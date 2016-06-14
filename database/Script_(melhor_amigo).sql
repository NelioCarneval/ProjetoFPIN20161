CREATE DATABASE IF NOT EXISTS `melhor_amigo` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `melhor_amigo`;


CREATE TABLE `t_usuario` (

`id_usuario` int NOT NULL AUTO_INCREMENT,

`email` varchar(100) NOT NULL,

`senha` varchar(100) NOT NULL,

`nome` varchar(255) NOT NULL,

`cpf` varchar(14) NULL,

`idade` int(3) NULL,

`telefone` varchar(11) NULL,

`nivel_usuario` int(1) NULL DEFAULT 0 COMMENT 'Adotante/Padrinho/Voluntário/Admin',

`status_ban` bit NULL DEFAULT 0,

PRIMARY KEY (`id_usuario`) 

);


CREATE TABLE `t_endereco` (

`id_usuario` int NOT NULL,

`cep` varchar(9) NULL,

`rua` varchar(150) NULL,

`ncasa` varchar(10) NULL,

`bairro` varchar(50) NULL,

`complemento` varchar(255) NULL,

`cidade` varchar(50) NULL,

`estado` varchar(50) NULL,

PRIMARY KEY (`id_usuario`) 

);


CREATE TABLE `t_cao` (

`id_cao` int NOT NULL AUTO_INCREMENT,

`nome` varchar(50) NOT NULL,

`genero` varchar(10) NULL,

`idade` int(2) NULL,

`porte` varchar(10) NULL,

`status_disponivel` bit NULL DEFAULT 1,

`src_imagem` varchar(255) NULL,

PRIMARY KEY (`id_cao`) 

);


CREATE TABLE `t_solicit_adocao` (

`cod_solicit` int NOT NULL AUTO_INCREMENT,

`id_adotante` int NOT NULL,

`id_cao` int NOT NULL,

`mensagem` text NULL,

`status_aprovacao` int NOT NULL DEFAULT 0 COMMENT 'Pendente/Recusado/Aprovado',

`data_solicit` date NULL,

PRIMARY KEY (`cod_solicit`) 

);


CREATE TABLE `t_padrinho` (

`id_padrinho` int NOT NULL,

`id_cao` int NULL,

`valor_mensal` decimal(10,2) NULL,

`dia_vencimento` int(2) NULL,

`modo_boleto` varchar(15) NULL,

`data_apadrinhamento` date NULL,

PRIMARY KEY (`id_padrinho`) 

);


CREATE TABLE `t_solicit_voluntario` (

`cod_solicit` int NOT NULL AUTO_INCREMENT,

`id_usuario` int NOT NULL,

`resposta_1` text NULL,

`resposta_2` text NULL,

`resposta_3` text NULL,

`resposta_4` text NULL,

`status_aprovacao` int NOT NULL DEFAULT 0 COMMENT 'Pendente/Recusado/Aprovado',

`data_solicit` date NULL,

PRIMARY KEY (`cod_solicit`) 

);


CREATE TABLE `t_voluntario` (

`id_voluntario` int NOT NULL,

`data_admissao` date NULL,

`horario_disp` text NULL,

`agenda` text NULL,

PRIMARY KEY (`id_voluntario`) 

);


ALTER TABLE `t_endereco` ADD CONSTRAINT `fk_t_endereço_t_usuario_1` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuario` (`id_usuario`);

ALTER TABLE `t_solicit_adocao` ADD CONSTRAINT `fk_t_solicit_adocao_t_usuario_1` FOREIGN KEY (`id_adotante`) REFERENCES `t_usuario` (`id_usuario`);

ALTER TABLE `t_solicit_adocao` ADD CONSTRAINT `fk_t_solicit_adocao_t_cao_1` FOREIGN KEY (`id_cao`) REFERENCES `t_cao` (`id_cao`);

ALTER TABLE `t_padrinho` ADD CONSTRAINT `fk_t_padrinho_t_usuario_1` FOREIGN KEY (`id_padrinho`) REFERENCES `t_usuario` (`id_usuario`);

ALTER TABLE `t_padrinho` ADD CONSTRAINT `fk_t_padrinho_t_cao_1` FOREIGN KEY (`id_cao`) REFERENCES `t_cao` (`id_cao`);

ALTER TABLE `t_solicit_voluntario` ADD CONSTRAINT `fk_t_solicit_voluntario_t_usuario_1` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuario` (`id_usuario`);

ALTER TABLE `t_voluntario` ADD CONSTRAINT `fk_t_voluntario_t_usuario_1` FOREIGN KEY (`id_voluntario`) REFERENCES `t_usuario` (`id_usuario`);


INSERT INTO `t_cao` (`id_cao`, `nome`, `genero`, `idade`, `porte`, `src_imagem`) VALUES
(1, 'Reitor', 'Macho', 3, 'médio', 'img/caes/cao_1.jpg'),
(2, 'Biriba', 'Macho', 4, 'pequeno', 'img/caes/cao_2.jpg'),
(3, 'Puma', 'Macho', 6, 'grande', 'img/caes/cao_3.jpg'),
(4, 'Tereza', 'Fêmea', 4, 'pequeno', 'img/caes/cao_4.jpg'),
(5, 'Palito', 'Macho', 3, 'médio', 'img/caes/cao_5.jpg'),
(6, 'Luna', 'Fêmea', 4, 'grande', 'img/caes/cao_6.jpg'),
(7, 'Sargento', 'Macho', 10, 'médio', 'img/caes/cao_7.jpg'),
(8, 'Atena', 'Fêmea', 7, 'grande', 'img/caes/cao_8.jpg'),
(9, 'Dourado', 'Macho', 8, 'grande', 'img/caes/cao_9.jpg'),
(10, 'Jarbas', 'Macho', 4, 'pequeno', 'img/caes/cao_10.jpg'),
(11, 'Joelma', 'Fêmea', 2, 'grande', 'img/caes/cao_11.jpg'),
(12, 'Fumaça', 'Macho', 10, 'médio', 'img/caes/cao_12.jpg'),
(13, 'Snoop', 'Macho', 3, 'pequeno', 'img/caes/cao_13.jpg'),
(14, 'Zizi', 'Fêmea', 1, 'médio', 'img/caes/cao_14.jpg'),
(15, 'Maomé', 'Macho', 3, 'pequeno', 'img/caes/cao_15.jpg'),
(16, 'Zeca', 'Macho', 3, 'pequeno', 'img/caes/cao_16.jpg'),
(17, 'Sansão', 'Macho', 3, 'pequeno', 'img/caes/cao_17.jpg'),
(18, 'Brigite', 'Fêmea', 3, 'pequeno', 'img/caes/cao_18.jpg'),
(19, 'Paola', 'Fêmea', 3, 'pequeno', 'img/caes/cao_19.jpg'),
(20, 'Santo', 'Macho', 3, 'grande', 'img/caes/cao_20.jpg'),
(21, 'Bruce', 'Macho', 3, 'pequeno', 'img/caes/cao_21.jpg'),
(22, 'Jeremias', 'Macho', 3, 'pequeno', 'img/caes/cao_22.jpg'),
(23, 'Vilma', 'Fêmea', 3, 'pequeno', 'img/caes/cao_23.jpg');

INSERT INTO `t_usuario` (`id_usuario`, `email`, `senha`, `nome`, `cpf`, `idade`, `telefone`, `nivel_usuario`) VALUES
(1, 'adotante@fpin.com', '1234qwer', 'Comum/Adotante', '886.006.696-42', 18, '82999998888', 0),
(2, 'padrinho@fpin.com', '1234qwer', 'Padrinho', '107.716.291-09', 19, '82988889999', 1),
(3, 'voluntario@fpin.com', '1234qwer', 'Voluntário', '416.323.933-28', 20, '82999998888', 2),
(4, 'admin@fpin.com', '1234qwer', 'Administrador Master', '284.389.873-03', 21, '82988889999', 4),
(5, 'jose@fpin.com', '1234qwer', 'José do Santos Silva', '284.336.238-50', 30, '82912349999', 0),
(6, 'maria@fpin.com', '1234qwer', 'Maria Medeiros da Costa', '313.637.221-23', 45, '8294558766', 0);

INSERT INTO `t_endereco` (`id_usuario`, `cep`, `rua`, `ncasa`, `bairro`, `complemento`, `cidade`, `estado`) VALUES
(1, '98765-432', 'Rua do Adotante', '2016.1', 'IFAL', 'Bloco de Informática', 'Maceió', 'Alagoas'),
(2, '12345-678', 'Rua do Padrinho', '2016.1', 'IFAL', 'Bloco de Informática', 'Maceió', 'Alagoas'),
(3, '87654-321', 'Rua do Voluntário', '2016.1', 'IFAL', 'Bloco de Informática', 'Maceió', 'Alagoas'),
(4, '23456-789', 'Rua do Administrador', '2016.1', 'IFAL', 'Bloco de Informática', 'Maceió', 'Alagoas'),
(5, '19283-746', 'Rua do José', '3000', 'Centro', 'Conjunto Parque do José', 'Arapiraca', 'Alagoas'),
(6, '91827-364', 'Rua da Maria', '450', 'Centro', 'Conjunto Morada da Maria', 'Recife', 'Pernambuco');

INSERT INTO `t_padrinho` (`id_padrinho`, `id_cao`, `valor_mensal`, `dia_vencimento`, `modo_boleto`, `data_apadrinhamento`) VALUES
(2, 13, 50.00, 10, 'Email', '2015/11/22');

INSERT INTO `t_voluntario` (`id_voluntario`, `data_admissao`, `horario_disp`, `agenda`) VALUES
(
3,
'2016/06/01',
'Segunda à Sexta: Disponível até as 11h
Sábado: Disponível a partir de 12h
Domingo: Disponível o dia todo',
'- Falar com o veterinário, sobre o Jeremias
- Dar banhos nos cães (Sábado pela manhã)
- Arrumar os lugares onde os filhotes ficam
- Confirmar com diretor, sobre a proxima feira de adoção'
);

INSERT INTO `t_solicit_adocao` (`cod_solicit`, `id_adotante`, `id_cao`, `mensagem`, `data_solicit`) VALUES
(1, 1, 16, 'Quero um amigo, conheço muitas pessoas que têm cachorro e vejo como são felizes!', '2016-05-20'),
(2, 6, 11, 'Depois que meu esposo faleceu, minha casa anda muito vazia e triste, sei que um amigo novo irá alegrar tudo!', '2016-06-10'),
(3, 5, 10, 'Cachorros são minha grande paixão! Tenho 2 em casa e quero mais 1 para fazer companhia!', '2016-06-14');

INSERT INTO `t_solicit_voluntario` (`cod_solicit`, `id_usuario`, `resposta_1`, `resposta_2`, `resposta_3`, `resposta_4`, `data_solicit`) VALUES
(
1,
6,
'Porque quero contribuir para o bem estar de nosso animais!',
'Fins de semana, com horário variável.',
'Contadora',
'Já tive! Na minha juventude. Era um vira-lata, chamava-se Laike.',
'2016-06-07'
);