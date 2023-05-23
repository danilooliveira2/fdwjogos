
-- --------------------------------------------------------

--
-- Estrutura para tabela `USUARIOS`
--


CREATE TABLE IF NOT EXISTS `USUARIOS` (
  `id_usuario` int(11) NOT NULL,
  `login` int(11) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `data_hora` datetime NOT NULL DEFAULT current_timestamp()
) 




--
-- Índices de tabela `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`id_usuario`);


ALTER TABLE `USUARIOS`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

