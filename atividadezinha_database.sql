-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Jul-2019 às 00:48
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `atividadezinha`
--
CREATE DATABASE IF NOT EXISTS `atividadezinha` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `atividadezinha`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20171126041539, 'CreateUsers', '2017-11-26 06:16:37', '2017-11-26 06:16:37', 0),
(20171126041717, 'CreateQuestioncategories', '2017-11-26 06:17:38', '2017-11-26 06:17:38', 0),
(20171126041822, 'CreateGames', '2017-11-26 06:19:14', '2017-11-26 06:19:16', 0),
(20171126041931, 'CreateQuestions', '2017-11-26 06:21:56', '2017-11-26 06:21:59', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questioncategories`
--

CREATE TABLE `questioncategories` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `questioncategories`
--

INSERT INTO `questioncategories` (`id`, `description`, `created`, `modified`) VALUES
(1, 'Ciências', '2017-11-26 04:26:54', '2017-11-26 04:26:54'),
(2, 'Geografia', '2017-11-26 04:27:17', '2017-11-26 04:27:17'),
(3, 'História', '2017-11-26 04:27:25', '2017-11-26 04:27:25'),
(4, 'Inglês', '2017-11-26 04:27:33', '2017-11-26 04:27:33'),
(5, 'Matemática', '2017-11-26 04:27:48', '2017-11-26 04:27:48'),
(6, 'Português', '2017-11-26 04:27:56', '2017-11-26 04:27:56'),
(7, 'Variedades', '2017-11-26 04:28:04', '2017-11-26 04:28:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `alternative01` varchar(100) NOT NULL,
  `alternative02` varchar(100) NOT NULL,
  `alternative03` varchar(100) NOT NULL,
  `alternative04` varchar(100) NOT NULL,
  `correct` varchar(100) NOT NULL,
  `difficulty` enum('easy','medium','hard') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `questioncategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `questions`
--

INSERT INTO `questions` (`id`, `description`, `alternative01`, `alternative02`, `alternative03`, `alternative04`, `correct`, `difficulty`, `created`, `modified`, `questioncategory_id`) VALUES
(1, 'Em qual espécie o macho choca os ovos e a fêmea procura alimento?', 'Andorinha', 'Pato Selvagem', 'Pinguim', 'Marreco', 'Pinguim', 'medium', '2017-11-26 17:09:24', '2017-11-26 17:09:24', 1),
(2, 'O trapézio é um músculo que está situado:', 'No Pescoço', 'No Ombro', 'Na Cabeça', 'No Braço', 'No Ombro', 'medium', '2017-11-26 17:09:25', '2017-11-26 17:09:25', 1),
(3, 'Qual o símbolo químico do radônio?', 'Rr', 'Rd', 'Rn', 'Ro', 'Rn', 'medium', '2017-11-26 17:09:25', '2017-11-26 17:09:25', 1),
(4, 'Como é chamada a bola de gelo e poeira que orbita em torno do sol?', 'Cometa', 'Meteorito', 'Camda de Ozônio', 'Estrela D\'Alva', 'Cometa', 'medium', '2017-11-26 17:09:25', '2017-11-26 17:09:25', 1),
(5, 'A eletrônica é parte de qual ciência?', 'Física', 'Biologia', 'Química', 'Botânica', 'Física', 'medium', '2017-11-26 17:09:25', '2017-11-26 17:09:25', 1),
(6, 'Que parte do corpo humano é infectada pela cólera?', 'Garganta', 'Intestino', 'Pulmões', 'Rins', 'Intestino', 'medium', '2017-11-26 17:09:25', '2017-11-26 17:09:25', 1),
(7, 'A união do espermatozóide com o óvulo origina uma célula chamada:', 'Zigoto', 'Bigoto', 'Feto', 'Garoto', 'Zigoto', 'medium', '2017-11-26 17:09:25', '2017-11-26 17:09:25', 1),
(8, 'Em que parte do nosso corpo está o úmero?', 'Braço', 'Perna', 'Quadril', 'Coluna', 'Braço', 'medium', '2017-11-26 17:09:25', '2017-11-26 17:09:25', 1),
(9, 'Qual metal possui o símbolo Hg?', 'Ferro', 'Aço', 'Mercúrio', 'Ouro', 'Mercúrio', 'medium', '2017-11-26 17:09:25', '2017-11-26 17:09:25', 1),
(10, 'O que é glicose?', 'Aminoácido', 'Hidrato de Carbono', 'Lipídio', 'Proteína', 'Hidrato de Carbono', 'medium', '2017-11-26 17:09:25', '2017-11-26 17:09:25', 1),
(11, 'Em qual país está localizado o Muro das lamentações?', 'Alemanha', 'Brasil', 'Venezuela', 'Israel', 'Israel', 'medium', '2017-11-26 17:09:40', '2017-11-26 17:09:40', 2),
(12, 'Qual desses países não fica na Ásia?', 'Paquistão', 'Japão', 'Tailândia', 'Egito', 'Egito', 'medium', '2017-11-26 17:09:41', '2017-11-26 17:09:41', 2),
(13, 'Qual oceano tem o maior volume de água?', 'Atlântico', 'Pacífico', 'Índico', 'Ártico', 'Pacífico', 'medium', '2017-11-26 17:09:41', '2017-11-26 17:09:41', 2),
(14, 'A Bélgica é:', 'Uma República', 'Uma Monarquia Constitucional', 'Um Emirado', 'Um Principado', 'Uma Monarquia Constitucional', 'medium', '2017-11-26 17:09:41', '2017-11-26 17:09:41', 2),
(15, 'A que país pertence a ilha de Terra Nova?', 'Estados Unidos', 'Dinamarca', 'Canadá', 'França', 'Canadá', 'medium', '2017-11-26 17:09:41', '2017-11-26 17:09:41', 2),
(16, 'Em que país você pode gastar rublos?', 'Holanda', 'Rússia', 'Espanha', 'África do Sul', 'Rússia', 'medium', '2017-11-26 17:09:41', '2017-11-26 17:09:41', 2),
(17, 'Na criação do Estado do Tocantins, que estado teve o território reduzido?', 'Goiás', 'Mato Grosso', 'Pará', 'Maranhão', 'Goiás', 'medium', '2017-11-26 17:09:41', '2017-11-26 17:09:41', 2),
(18, 'Qual é a menor República do mundo?', 'Mônaco', 'San Marino', 'Nova Zelândia', 'China', 'San Marino', 'medium', '2017-11-26 17:09:41', '2017-11-26 17:09:41', 2),
(19, 'Que trópico atravessa o Saara?', 'Capricórnio', 'Virgem', 'Câncer', 'Leão', 'Câncer', 'medium', '2017-11-26 17:09:41', '2017-11-26 17:09:41', 2),
(20, 'Qual é a religião majoritária da Turquia?', 'Budista', 'Islâmica', 'Católica', 'Protestante', 'Islâmica', 'medium', '2017-11-26 17:09:41', '2017-11-26 17:09:41', 2),
(21, 'Que imperador pôs fogo em Roma?', 'Trajano', 'Nero', 'Brutus', 'Cagígula', 'Nero', 'medium', '2017-11-26 17:09:54', '2017-11-26 17:09:54', 3),
(22, 'A cidade de Pompéia, que foi soterrada por um vulcão fica em qual desses países?', 'Japão', 'México', 'Itália', 'Estados Unidos', 'Itália', 'medium', '2017-11-26 17:09:54', '2017-11-26 17:09:54', 3),
(23, 'Em qual estádio Pelé marcou seu milésimo gol?', 'Morumbi', 'Pacaembu', 'Maracanã', 'Mineirão', 'Maracanã', 'medium', '2017-11-26 17:09:54', '2017-11-26 17:09:54', 3),
(24, 'Como eram chamados os pilotos suicidas da Segunda Guerra?', 'Camicases', 'Sashimis', 'Haraquiris', 'Sumôs', 'Camicases', 'medium', '2017-11-26 17:09:54', '2017-11-26 17:09:54', 3),
(25, 'Onde foi conduzida a vitória das forças aliadas na Segunda Guerra Mundial?', 'Cannes', 'Normandia', 'Capri', 'Marshelha', 'Normandia', 'medium', '2017-11-26 17:09:54', '2017-11-26 17:09:54', 3),
(26, 'Qual presidente brasileiro instituiu o AI-5?', 'Costa E Silva', 'Ernesto Geisel', 'João Figueiredo', 'Itamar Franco', 'Costa E Silva', 'medium', '2017-11-26 17:09:54', '2017-11-26 17:09:54', 3),
(27, 'Os nazistas foram julgados em:', 'Berlim', 'Nurembergue', 'Munique', 'Paris', 'Nurembergue', 'medium', '2017-11-26 17:09:54', '2017-11-26 17:09:54', 3),
(28, 'Qual foi o último presidente militar do Brasil?', 'Fernando Collor', 'João Figueiredo', 'Tancredo Neves', 'João Goulart', 'João Figueiredo', 'medium', '2017-11-26 17:09:54', '2017-11-26 17:09:54', 3),
(29, 'Que conflito ideológico envolveu os EUA e a União Soviética?', 'Guerra Fria', 'Guerra do Vietnã', 'Guerra nas Estrelas', 'Guerra da Coréia', 'Guerra Fria', 'medium', '2017-11-26 17:09:54', '2017-11-26 17:09:54', 3),
(30, 'Qual produto gerou guerras e conflitos no século XX?', 'Alcool', 'Petróleo', 'Ouro', 'Alumínio', 'Petróleo', 'medium', '2017-11-26 17:09:55', '2017-11-26 17:09:55', 3),
(31, 'De quem é este verso: “A praça é do povo, como o céu é do condor”?', 'Tobias Barreto', 'Dorival Caimi', 'Machado de Assis', 'Castro Alves', 'Castro Alves', 'medium', '2017-11-26 17:10:08', '2017-11-26 17:10:08', 6),
(32, 'De quem é a frase ”Penso, logo existo”?', 'Platão', 'Júlio Verne', 'Aristóteles', 'René Descartes', 'René Descartes', 'medium', '2017-11-26 17:10:08', '2017-11-26 17:10:08', 6),
(33, 'O que significa deprecar?', 'Renegar', 'Sujeitar', 'Desmaiar', 'Pedir', 'Pedir', 'medium', '2017-11-26 17:10:09', '2017-11-26 17:10:09', 6),
(34, 'Que significa o prefixo exo?', 'Dentro de', 'Debaixo de', 'Fora de', 'Atrás de', 'Fora de', 'medium', '2017-11-26 17:10:09', '2017-11-26 17:10:09', 6),
(35, 'Qual destas palavras é sinônimo de cabal?', 'Baixo', 'Perfeito', 'Atrvido', 'Enfermo', 'Perfeito', 'medium', '2017-11-26 17:10:09', '2017-11-26 17:10:09', 6),
(36, 'Qual é o nome dado a um conjunto de sinos?', 'Corrimão', 'Carrilhão', 'Badalada', 'Corselete', 'Carrilhão', 'medium', '2017-11-26 17:10:09', '2017-11-26 17:10:09', 6),
(37, 'Quem escreveu “Dom Quixote”?', 'Espinoza', 'Miguel de Cervantes', 'Carlos Conte', 'Angel Morita', 'Miguel de Cervantes', 'medium', '2017-11-26 17:10:09', '2017-11-26 17:10:09', 6),
(38, 'O símbolo ! rebebe o nome de:', 'Exclamação', 'Ponto-Final', 'Interrogação', 'Cruz', 'Exclamação', 'medium', '2017-11-26 17:10:09', '2017-11-26 17:10:09', 6),
(39, 'A classe gramatical que indica quantidade chama-se:', 'Verbo', 'Numeral', 'Pronome', 'Advérbio', 'Numeral', 'medium', '2017-11-26 17:10:09', '2017-11-26 17:10:09', 6),
(40, 'Qual é o feminino de vilão?', 'Viés', 'Vil', 'Vigota', 'Vilã', 'Vilã', 'medium', '2017-11-26 17:10:09', '2017-11-26 17:10:09', 6),
(41, 'Quantos jogadores um jogo de vôlei reúne na quadra?', 'Seis', 'Oito', 'Dez', 'Doze', 'Doze', 'medium', '2017-11-26 17:10:09', '2017-11-26 17:10:09', 7),
(42, 'Qual é o país do tango?', 'Uruguai', 'Argentina', 'Paraguai', 'Espanha', 'Argentina', 'medium', '2017-11-26 17:10:09', '2017-11-26 17:10:09', 7),
(43, 'Que profissional usa uma ferramenta chamada formão?', 'Carpinteiro', 'Relojoeiro', 'Confeiteiro', 'Bombeiro', 'Carpinteiro', 'medium', '2017-11-26 17:10:09', '2017-11-26 17:10:09', 7),
(44, 'Qual desses astros de filmes de ação é belga?', 'Alnold Schwarzenegger', 'Sylvester Stallone', 'Steven Seagal', 'Jean Claude Van Damme', 'Jean Claude Van Damme', 'medium', '2017-11-26 17:10:09', '2017-11-26 17:10:09', 7),
(45, 'Qual é a primeira letra do alfabeto grego?', 'Delta', 'Beta', 'Alfa', 'Gama', 'Alfa', 'medium', '2017-11-26 17:10:09', '2017-11-26 17:10:09', 7),
(46, 'Que figura mitológica é conhecida por sua força extraordinária?', 'Átila', 'Minotauro', 'Perseu', 'Hécules', 'Hécules', 'medium', '2017-11-26 17:10:09', '2017-11-26 17:10:09', 7),
(47, 'O que é um oboé?', 'Vulcão', 'Comida', 'Instrumento Musical', 'Tribo Indígena', 'Instrumento Musical', 'medium', '2017-11-26 17:10:09', '2017-11-26 17:10:09', 7),
(48, 'Que nome recebe a foz de um rio que se abre para o mar?', 'Alagado', 'Manguezal', 'Pântano', 'Estuário', 'Estuário', 'medium', '2017-11-26 17:10:10', '2017-11-26 17:10:10', 7),
(49, 'Qual é a altura oficial do aro na cesta no basquete?', '3,05 Metros', '2,97 Metros', '3,10 Metros', '3,00 Metros', '3,05 Metros', 'medium', '2017-11-26 17:10:10', '2017-11-26 17:10:10', 7),
(50, 'O Brasil ganhou quantas copas do mundo de futebol?', '4', '5', '6', '7', '5', 'medium', '2017-11-26 17:10:10', '2017-11-26 17:10:10', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `points`, `role`, `active`, `created`, `modified`) VALUES
(7, 'Administrador', 'Admin', 'admin', 'admin@admin.com', '$2y$10$3uZbk350nXrKgs9Yu8sDNecoXXy.ogu9Zo/0pNYV3uVk2lTyjoh0y', 10655, 'admin', 1, '2017-11-28 17:43:35', '2019-07-08 20:11:26');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Índices para tabela `questioncategories`
--
ALTER TABLE `questioncategories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questioncategory_id` (`questioncategory_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `questioncategories`
--
ALTER TABLE `questioncategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`questioncategory_id`) REFERENCES `questioncategories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
