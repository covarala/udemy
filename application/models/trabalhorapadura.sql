-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Fev-2018 às 19:03
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trabalhorapadura`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idendereco` int(11) NOT NULL,
  `cep` char(8) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) NOT NULL,
  `estado` char(2) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `pontoreferencia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecofisica`
--

CREATE TABLE `enderecofisica` (
  `fisica_idfisica` int(11) NOT NULL,
  `endereco_idendereco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecojuridica`
--

CREATE TABLE `enderecojuridica` (
  `juridica_idjuridica` int(11) NOT NULL,
  `endereco_idendereco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `idestoque` int(11) NOT NULL,
  `qnt` int(11) NOT NULL,
  `produto_idproduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisica`
--

CREATE TABLE `fisica` (
  `idfisica` int(11) NOT NULL,
  `cpf` bigint(11) UNSIGNED NOT NULL,
  `nasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fisica`
--

INSERT INTO `fisica` (`idfisica`, `cpf`, `nasc`) VALUES
(1, 12312312312, '1996-11-11'),
(2, 45645645645, '1986-11-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_de_pedido`
--

CREATE TABLE `itens_de_pedido` (
  `pedido_idpedido` int(11) NOT NULL,
  `produto_idproduto` int(11) NOT NULL,
  `qnt` int(11) NOT NULL,
  `valortotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `juridica`
--

CREATE TABLE `juridica` (
  `idjuridica` int(11) NOT NULL,
  `cnpj` varchar(45) NOT NULL,
  `inscricaoestadual` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `juridica`
--

INSERT INTO `juridica` (`idjuridica`, `cnpj`, `inscricaoestadual`) VALUES
(1, '00.000.000/0001-91', '892.575.684/7679'),
(2, '00.000.000/0001-92', '077.924.809/0394');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL,
  `valortotal` decimal(10,2) NOT NULL,
  `qnt` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `status_idstatus` int(11) NOT NULL,
  `tipopagamento_idtipopagamento` int(11) NOT NULL,
  `endereco_idendereco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idproduto` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idproduto`, `descricao`, `valor`) VALUES
(1, 'teste', '10.00'),
(2, 'teste', '10.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `idstatus` int(11) NOT NULL,
  `descricao` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `idtelefone` int(11) NOT NULL,
  `telefone` char(13) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipopagamento`
--

CREATE TABLE `tipopagamento` (
  `idtipopagamento` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL,
  `descricao` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipousuario`
--

INSERT INTO `tipousuario` (`idtipousuario`, `descricao`) VALUES
(1, 'admin'),
(2, 'fisica'),
(3, 'juridica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(120) NOT NULL,
  `tipousuario_idtipousuario` int(11) NOT NULL,
  `juridica_idjuridica` int(11) DEFAULT NULL,
  `fisica_idfisica` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `email`, `senha`, `tipousuario_idtipousuario`, `juridica_idjuridica`, `fisica_idfisica`) VALUES
(1, 'teste', 'teste@gmail.com', '202cb962ac59075b964b07152d234b70', 1, NULL, NULL),
(4, 'fisica1', 'fisica1@gmail.com', '202cb962ac59075b964b07152d234b70', 2, NULL, 1),
(5, 'fisica2', 'fisica2@gmail.com', '202cb962ac59075b964b07152d234b70', 2, NULL, 2),
(6, 'juridica1', 'juridica1@gmail.com', '202cb962ac59075b964b07152d234b70', 3, 1, NULL),
(7, 'juridica2', 'juridica2@gmail.com', '202cb962ac59075b964b07152d234b70', 3, 2, NULL),
(8, 'André Braga', 'andre@gmail.com', '123456', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idendereco`);

--
-- Indexes for table `enderecofisica`
--
ALTER TABLE `enderecofisica`
  ADD PRIMARY KEY (`fisica_idfisica`,`endereco_idendereco`),
  ADD KEY `fk_fisica_has_endereco_endereco1_idx` (`endereco_idendereco`),
  ADD KEY `fk_fisica_has_endereco_fisica1_idx` (`fisica_idfisica`);

--
-- Indexes for table `enderecojuridica`
--
ALTER TABLE `enderecojuridica`
  ADD PRIMARY KEY (`juridica_idjuridica`,`endereco_idendereco`),
  ADD KEY `fk_juridica_has_endereco_endereco1_idx` (`endereco_idendereco`),
  ADD KEY `fk_juridica_has_endereco_juridica1_idx` (`juridica_idjuridica`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`idestoque`),
  ADD KEY `fk_estoque_tipo_produto1_idx` (`produto_idproduto`);

--
-- Indexes for table `fisica`
--
ALTER TABLE `fisica`
  ADD PRIMARY KEY (`idfisica`);

--
-- Indexes for table `itens_de_pedido`
--
ALTER TABLE `itens_de_pedido`
  ADD PRIMARY KEY (`pedido_idpedido`,`produto_idproduto`),
  ADD KEY `fk_compra_has_produto_compra1_idx` (`pedido_idpedido`),
  ADD KEY `fk_itens_de_venda_tipo_produto1_idx` (`produto_idproduto`);

--
-- Indexes for table `juridica`
--
ALTER TABLE `juridica`
  ADD PRIMARY KEY (`idjuridica`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`,`idusuario`),
  ADD KEY `fk_compra_usuario1_idx` (`idusuario`),
  ADD KEY `fk_compra_status1_idx` (`status_idstatus`),
  ADD KEY `fk_compra_tipopagamento1_idx` (`tipopagamento_idtipopagamento`),
  ADD KEY `fk_compra_endereco1_idx` (`endereco_idendereco`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idstatus`);

--
-- Indexes for table `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`idtelefone`,`usuario_idusuario`),
  ADD KEY `fk_telefone_usuario1_idx` (`usuario_idusuario`);

--
-- Indexes for table `tipopagamento`
--
ALTER TABLE `tipopagamento`
  ADD PRIMARY KEY (`idtipopagamento`);

--
-- Indexes for table `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipousuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_tipousuario_idx` (`tipousuario_idtipousuario`),
  ADD KEY `fk_usuario_juridica1_idx` (`juridica_idjuridica`),
  ADD KEY `fk_usuario_fisica1_idx` (`fisica_idfisica`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idendereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `idestoque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fisica`
--
ALTER TABLE `fisica`
  MODIFY `idfisica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `juridica`
--
ALTER TABLE `juridica`
  MODIFY `idjuridica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `idstatus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `telefone`
--
ALTER TABLE `telefone`
  MODIFY `idtelefone` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipopagamento`
--
ALTER TABLE `tipopagamento`
  MODIFY `idtipopagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `enderecofisica`
--
ALTER TABLE `enderecofisica`
  ADD CONSTRAINT `fk_fisica_has_endereco_endereco1` FOREIGN KEY (`endereco_idendereco`) REFERENCES `endereco` (`idendereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fisica_has_endereco_fisica1` FOREIGN KEY (`fisica_idfisica`) REFERENCES `fisica` (`idfisica`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `enderecojuridica`
--
ALTER TABLE `enderecojuridica`
  ADD CONSTRAINT `fk_juridica_has_endereco_endereco1` FOREIGN KEY (`endereco_idendereco`) REFERENCES `endereco` (`idendereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_juridica_has_endereco_juridica1` FOREIGN KEY (`juridica_idjuridica`) REFERENCES `juridica` (`idjuridica`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `fk_estoque_tipo_produto1` FOREIGN KEY (`produto_idproduto`) REFERENCES `produto` (`idproduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens_de_pedido`
--
ALTER TABLE `itens_de_pedido`
  ADD CONSTRAINT `fk_compra_has_produto_compra1` FOREIGN KEY (`pedido_idpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itens_de_venda_tipo_produto1` FOREIGN KEY (`produto_idproduto`) REFERENCES `produto` (`idproduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_compra_endereco1` FOREIGN KEY (`endereco_idendereco`) REFERENCES `endereco` (`idendereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_status1` FOREIGN KEY (`status_idstatus`) REFERENCES `status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_tipopagamento1` FOREIGN KEY (`tipopagamento_idtipopagamento`) REFERENCES `tipopagamento` (`idtipopagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `fk_telefone_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_fisica1` FOREIGN KEY (`fisica_idfisica`) REFERENCES `fisica` (`idfisica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_juridica1` FOREIGN KEY (`juridica_idjuridica`) REFERENCES `juridica` (`idjuridica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_tipousuario` FOREIGN KEY (`tipousuario_idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
