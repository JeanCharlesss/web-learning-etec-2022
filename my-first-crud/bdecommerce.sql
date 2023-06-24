-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Nov-2022 às 20:45
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdecommerce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategoria`
--

CREATE TABLE `tbcategoria` (
  `idCategoria` int(11) NOT NULL,
  `nomeCategoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcategoria`
--

INSERT INTO `tbcategoria` (`idCategoria`, `nomeCategoria`) VALUES
(1, 'Hack and Slash'),
(2, 'RPG - Ação'),
(3, 'Corrida'),
(4, 'FPS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(80) NOT NULL,
  `cpfCliente` char(11) NOT NULL,
  `emailCliente` varchar(40) NOT NULL,
  `senhaCliente` varchar(255) NOT NULL,
  `logradouroCliente` varchar(40) NOT NULL,
  `numlogCliente` varchar(20) NOT NULL,
  `compCliente` varchar(20) NOT NULL,
  `bairroCliente` varchar(20) NOT NULL,
  `cidadeCliente` varchar(20) NOT NULL,
  `ufCliente` char(3) NOT NULL,
  `cepCliente` char(8) NOT NULL,
  `dataCliente` date NOT NULL,
  `usuarioCliente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `nomeCliente`, `cpfCliente`, `emailCliente`, `senhaCliente`, `logradouroCliente`, `numlogCliente`, `compCliente`, `bairroCliente`, `cidadeCliente`, `ufCliente`, `cepCliente`, `dataCliente`, `usuarioCliente`) VALUES
(1, 'Jean Charles Santos Albuquerque', '11122233396', 'jeancharles@gmail.com', '1234567', 'Rua Feliciano de Mendonça', '209', 'ETEC - Guaianazes', 'Guaianazes', 'São Paulo', 'SP', '08460365', '2005-08-25', 'Jean_Charles'),
(2, 'Vinicius Matheus Pereira Espirito Santos', '55918962000', 'viniciusmatheus@gmail.com', '1234567', 'Rua Feliciano de Mendonça', '209', 'ETEC - Guaianazes', 'Guaianases', 'São Paulo', 'BA', '08460365', '2003-10-01', 'Vinicius_Matheus'),
(3, 'Pietro Henrique Santos de Oliveira Fossa', '49357493000', 'pietrohenrique@gmail.com', '1234567', 'Rua Feliciano de Mendonça', '209', 'ETEC - Guaianazes', 'Guaianases', 'São Paulo', 'RS', '08460365', '2005-12-14', 'Pietro_Henrique');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbitemvenda`
--

CREATE TABLE `tbitemvenda` (
  `idItemsVenda` int(11) NOT NULL,
  `idVenda` int(11) DEFAULT NULL,
  `idProduto` int(11) DEFAULT NULL,
  `qtdeitemsVenda` int(11) NOT NULL,
  `subTotalitemsvenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbproduto`
--

CREATE TABLE `tbproduto` (
  `idProduto` int(11) NOT NULL,
  `nomeProduto` varchar(90) NOT NULL,
  `precoProduto` float NOT NULL,
  `descProduto` varchar(120) NOT NULL,
  `fotoProduto` varchar(120) NOT NULL,
  `idCategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbproduto`
--

INSERT INTO `tbproduto` (`idProduto`, `nomeProduto`, `precoProduto`, `descProduto`, `fotoProduto`, `idCategoria`) VALUES
(1, 'God of War Ragnarok', 349.5, ' Kratos e Atreus devem viajar para cada um dos Nove Reinos em busca de respostas enquanto forças asgardianas se preparam', 'img/produtos/1.jpg', 1),
(2, 'Forza Horizon 5', 198.5, 'Forza Horizon 5 é um jogo eletrônico de corrida ambientado em um ambiente de mundo aberto sediado no México. O jogo tem ', 'img/produtos/2.jpg', 3),
(3, 'Devil May Cry 5', 204.5, 'O jogo acontece cinco anos depois de Devil May Cry 4 e segue um trio de personagens com poderes demoníacos: Dante, Nero ', 'img/produtos/3.jpg', 1),
(4, 'Cyberpunk 2077', 249.9, 'Cyberpunk 2077 é uma história de ação e aventura de mundo aberto ambientada em Night City, uma megalópole obcecada por p', 'img/produtos/4.jpg', 2),
(5, 'Horizon Forbidden West', 199.9, 'O jogo se passa em um mundo pós-apocalíptico em que as máquinas dominaram tudo, fazendo com que os humanos voltassem a v', 'img/produtos/5.jpg', 2),
(6, 'Call of Duty Modern Warfare II ', 329.2, 'O jogo é situado cinco anos após os eventos em Call of Duty 4. O modo campanha é dividido entre o grupo contra-terrorist', 'img/produtos/6.jpg', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbvenda`
--

CREATE TABLE `tbvenda` (
  `idVenda` int(11) NOT NULL,
  `dataVenda` date NOT NULL,
  `valorTotalVenda` double NOT NULL,
  `idCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices para tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `tbitemvenda`
--
ALTER TABLE `tbitemvenda`
  ADD PRIMARY KEY (`idItemsVenda`),
  ADD KEY `idVenda` (`idVenda`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Índices para tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD PRIMARY KEY (`idProduto`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Índices para tabela `tbvenda`
--
ALTER TABLE `tbvenda`
  ADD PRIMARY KEY (`idVenda`),
  ADD KEY `idCliente` (`idCliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbitemvenda`
--
ALTER TABLE `tbitemvenda`
  MODIFY `idItemsVenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbvenda`
--
ALTER TABLE `tbvenda`
  MODIFY `idVenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbitemvenda`
--
ALTER TABLE `tbitemvenda`
  ADD CONSTRAINT `tbitemvenda_ibfk_1` FOREIGN KEY (`idVenda`) REFERENCES `tbvenda` (`idVenda`),
  ADD CONSTRAINT `tbitemvenda_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `tbproduto` (`idProduto`);

--
-- Limitadores para a tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD CONSTRAINT `tbproduto_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `tbcategoria` (`idCategoria`);

--
-- Limitadores para a tabela `tbvenda`
--
ALTER TABLE `tbvenda`
  ADD CONSTRAINT `tbvenda_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
