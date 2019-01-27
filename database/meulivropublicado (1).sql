-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Jan-2019 às 12:51
-- Versão do servidor: 10.1.21-MariaDB
-- versão do PHP: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meulivropublicado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'administrador@email.com', '$2y$10$pahT8/OGNqFCexAXTD/30eESTLz23bz5QEYwdYrPPD.OQG5PypN52', NULL, '2018-09-12 18:21:45', '2018-10-22 21:32:40'),
(2, 'administrador teste', 'administradorteste@email.com', '$2y$10$uQbqNUI.gGpIi3eCNxQaY.wKRzGek0XzRPJk0oFRqFoqZgqRclF9C', NULL, '2018-10-22 21:03:33', '2018-10-22 21:03:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `customs`
--

CREATE TABLE `customs` (
  `id` int(10) UNSIGNED NOT NULL,
  `tamanho` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pb` double NOT NULL,
  `pc` double NOT NULL,
  `capa` double NOT NULL,
  `editoracao` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ordem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `customs`
--

INSERT INTO `customs` (`id`, `tamanho`, `pb`, `pc`, `capa`, `editoracao`, `created_at`, `updated_at`, `ordem`) VALUES
(1, '16x23', 0.04, 0.25, 1.8, 355, '2018-09-24 21:12:41', '2019-01-22 00:42:47', 1),
(2, '12x23', 12, 13, 12, 200, '2019-01-22 00:49:42', '2019-01-22 00:50:09', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_11_164759_create_admins_table', 1),
(4, '2018_09_12_163006_create_pages_table', 2),
(5, '2018_09_14_222706_add_column_to_table_users', 3),
(6, '2018_09_17_130625_create_planos_table', 4),
(7, '2018_09_20_215223_create_status_projs_table', 5),
(8, '2018_09_20_222847_create_projetos_table', 6),
(9, '2018_09_24_174725_create_customs_table', 7),
(10, '2018_12_27_202817_add_softdelete_to_users_table', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pages`
--

INSERT INTO `pages` (`id`, `titulo`, `content`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Quem somos11', 'Content', 'quem-somos', '2018-09-13 00:51:05', '2018-09-13 18:27:26'),
(3, 'teste', 'teste', 'teste', '2018-09-13 18:29:35', '2018-09-13 18:29:35'),
(4, 'teste2', 'fdsfsdf', 'tes', '2018-09-13 18:29:41', '2018-09-13 18:29:41'),
(5, 'tetw', 'werwerwer', 'werwer', '2018-09-13 18:29:45', '2018-09-13 18:29:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('jiam16@yahoo.com.br', '$2y$10$c3jod9Tgs/ksmdBTHn9zm.ArfxaXqzku7.1JAtaseWIT5/VdCcX0W', '2018-10-22 22:11:19'),
('teste@email.com', '$2y$10$j9ayg7YWI24Q9FIZB5TbHee9S38i8Yc20rr6wfLtbX5dF/N/YmGRO', '2018-11-08 17:34:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE `planos` (
  `id` int(10) UNSIGNED NOT NULL,
  `sigla` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paginas` int(11) NOT NULL,
  `pc` int(11) NOT NULL,
  `pb` int(11) NOT NULL,
  `pg_coloridas` tinyint(1) NOT NULL,
  `tamanho` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exemplares` int(11) NOT NULL,
  `preco_total` double NOT NULL,
  `qtd_parcelas` int(11) NOT NULL,
  `valor_parcelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prazo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`id`, `sigla`, `nome`, `paginas`, `pc`, `pb`, `pg_coloridas`, `tamanho`, `exemplares`, `preco_total`, `qtd_parcelas`, `valor_parcelas`, `prazo`, `created_at`, `updated_at`) VALUES
(1, '01', 'Tá Pronto', 150, 0, 150, 0, '15x21', 15, 499, 15, '49.90', 90, '2018-09-17 23:44:58', '2018-10-21 07:02:02'),
(3, '02', 'Ufa! Acabei - Bora Imprimir', 200, 0, 200, 0, '16x23', 14, 999, 14, '99.90', 90, '2018-09-18 00:28:34', '2018-10-21 07:01:47'),
(4, '03', 'Wow! - De Respeito', 300, 0, 300, 0, '16x23', 15, 899, 15, '89.90', 90, '2018-09-18 00:31:30', '2018-10-21 07:01:36'),
(5, '04', 'Meu Legado - Infantil', 50, 50, 0, 1, '21x28', 15, 799, 15, '79.90', 90, '2018-09-18 00:32:48', '2018-10-21 07:02:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autores` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paginas` int(11) NOT NULL,
  `tamanho` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exemplares` int(11) NOT NULL,
  `endereco_entrega` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prazo` date DEFAULT NULL,
  `observacao` text COLLATE utf8mb4_unicode_ci,
  `valor` double NOT NULL,
  `preco_sugerido` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notas` text COLLATE utf8mb4_unicode_ci,
  `pago` tinyint(1) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pb` int(11) NOT NULL,
  `pc` int(11) NOT NULL,
  `status_projs_id` int(10) UNSIGNED NOT NULL,
  `original_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `statuspagseguro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id`, `titulo`, `autores`, `paginas`, `tamanho`, `exemplares`, `endereco_entrega`, `prazo`, `observacao`, `valor`, `preco_sugerido`, `notas`, `pago`, `user_id`, `pb`, `pc`, `status_projs_id`, `original_file`, `created_at`, `updated_at`, `statuspagseguro`) VALUES
(6, 'Primeiro Livro teste', 'testes', 400, '16x23', 15, 'Mesmo', '2018-12-27', 'teste', 2012.5, '', '', 1, 3, 0, 0, 2, NULL, '2018-09-28 23:21:55', '2018-12-27 23:05:56', NULL),
(9, 'Meu livro personalizado', 'teste', 300, '16x23', 30, 'Mesmo', '2018-12-27', 'teste obs', 2620, '', '', 0, 3, 0, 0, 3, NULL, '2018-09-29 00:28:36', '2018-09-29 00:36:18', NULL),
(10, 'Perso teste', 'teste', 150, '16x23', 15, 'Mesmo', '2018-12-27', 'teste', 829.75, '21', NULL, 1, 3, 0, 0, 2, NULL, '2018-09-29 00:52:46', '2018-12-27 23:05:52', NULL),
(11, 'dsaads', 'asdas', 150, '15x21', 9, 'Mesmo', '2018-11-26', '12', 499, '', '', 0, 3, 127, 0, 6, NULL, '2018-10-12 04:39:14', '2018-10-12 04:39:14', NULL),
(12, 'fdsfd', 'fsdfds', 2134, '16x23', 233, 'Mesmo', '2018-11-29', '234324', 32112.9, '', '', 0, 3, 1900, 234, 6, NULL, '2018-10-15 05:31:29', '2018-10-15 05:31:29', NULL),
(13, 'qweqw', 'qweqw', 200, '16x23', 14, 'Mesmo', '2019-01-13', 'qweqw', 999, '', '', 0, 3, 0, 0, 6, NULL, '2018-10-15 17:49:46', '2018-10-15 17:49:46', NULL),
(14, 'teste 21102018', 'teste', 200, '16x23', 14, 'Mesmo', '2019-01-19', 'teste', 999, '30', NULL, 0, 3, 0, 0, 6, NULL, '2018-10-21 05:09:51', '2018-10-21 06:41:44', NULL),
(15, 'teste', 'teste', 50, '21x28', 15, 'Mesmo', '2019-01-19', 'tssste', 799, '', '', 0, 3, 0, 50, 6, NULL, '2018-10-21 07:05:55', '2018-10-21 07:05:55', NULL),
(16, 'Teste dia 18 de dezembro de 2018', 'Jean apenas', 50, '21x28', 15, 'Mesmo', '2019-03-18', NULL, 799, '12', NULL, 1, 3, 0, 50, 2, '3-Teste-18-12-2018-5c18ded926c11.docx', '2018-12-18 13:49:45', '2018-12-27 23:05:44', NULL),
(17, 'dasd', 'dsadas', 100, '16x23', 50, 'Mesmo', '2019-03-07', NULL, 1170, NULL, NULL, 0, 25, 50, 50, 6, '25-administracao-21-01-2019-5c46464c4dfbd.docx', '2019-01-22 00:23:08', '2019-01-22 00:51:28', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_projs`
--

CREATE TABLE `status_projs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordem` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `porcentagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `status_projs`
--

INSERT INTO `status_projs` (`id`, `nome`, `ordem`, `created_at`, `updated_at`, `porcentagem`) VALUES
(2, 'Registro de ISBN', 1, '2018-09-21 01:17:01', '2018-09-25 22:23:10', 25),
(3, 'Criação de Capa', 2, '2018-09-22 19:20:57', '2018-09-25 22:23:17', 50),
(5, 'Diagramação', 3, '2018-09-24 16:41:43', '2018-09-25 22:23:24', 75),
(6, 'Verificando Pagamento', 0, '2018-09-24 16:42:07', '2018-09-25 22:23:02', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sobrenome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ddd` int(11) NOT NULL,
  `telefone_principal` int(11) NOT NULL,
  `telefone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `complemento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `sobrenome`, `email`, `password`, `remember_token`, `cpf`, `endereco`, `ddd`, `telefone_principal`, `telefone`, `cep`, `estado`, `cidade`, `bairro`, `numero`, `created_at`, `updated_at`, `deleted_at`, `complemento`) VALUES
(2, 'João da silva', '', 'joao@email.com', '123456', NULL, '', '', 0, 0, '', '', '', '', '', 0, '2018-09-14 22:18:19', '2018-09-14 22:18:19', NULL, NULL),
(3, 'Teste', 'seilaa', 'teste@email.com', '$2y$10$Xdc3.Y/CS10h4VbYW.xNKuTg2v/1H.WPTQMz7aovsfS2AmxZghJti', '59ld2K3IjCZJLnFsMM3nHvywxbFMhzCHu7vKbRykcXPMWplb9tQ83Qgjl6Bm', '47276973603', 'Rua Doutor José de Dominicis', 12, 123456789, '12312312312', '83301350', 'PR', 'Piraquara', 'Jardim Esmeralda', 4, '2018-09-23 16:53:45', '2018-10-18 17:45:44', NULL, NULL),
(6, 'João da silva', 'seilaa', 'teste1@email.com', '$2y$10$IsPEiKfQQ/M6dU2qqvt/4usgxwKJi5KFKE70ZdQkmJJK3xUsiCFwq', 'kBFz8nBNMWrmeyxyQwqtf81KkJ4sPuOub9MEXZtHfP7ztQ0VVWfNdu481Loo', '47276973603', 'Rua Doutor José de Dominicis', 12, 123456678, NULL, '83301350', 'PR', 'Piraquara', 'Jardim Esmeralda', 21, '2018-10-20 20:18:14', '2018-10-20 20:18:14', NULL, NULL),
(7, 'Jean', 'Felipe', 'jiam16@yahoo.com.br', '$2y$10$BGOOzWPzEow7xjgk7Uaez.KrPX3/tS8fcGn6MlSCIc4aUSTQYBkFC', 'IYQMuRgNiyrBkn9f2GdZ1P9jnmY5Su4oWhVn3IZBMMMwb9kh7sLeYpLS7DeN', '47276973603', 'Rua Doutor José de Dominicis', 12, 123456678, '123124213', '83301350', 'PR', 'Piraquara', 'Jardim Esmeralda', 123, '2018-10-22 22:04:50', '2018-10-22 22:04:50', NULL, NULL),
(24, 'João da Silva', 'teste', 'jean_felipe2008@hotmail.com', '$2y$10$L2peVZ3YURtaJcMg8TQrMOtzU.CMJ0J/iXPmgIhNbIHMFUwL1uNGS', NULL, '08445100920', 'Rua Hercília C. Rodrigues', 21, 2121, '211221', '83301360', 'PI', 'Piraquara', 'Jardim Esmeralda', 12, '2018-11-28 01:29:35', '2018-11-28 01:29:35', NULL, NULL),
(25, 'administracao', 'teste', 'testes@admin.com', '$2y$10$BByi9TODt/28cJkXkYeR/ORLCaadAgP1iJs5lFnV/kI2Aqj3kd5Ou', NULL, '08445100920', 'Rua Hercília C. Rodrigues', 21, 2121, '211221', '83301360', 'PR', 'Piraquara', 'Jardim Esmeralda', 12, '2019-01-21 23:59:47', '2019-01-22 00:04:39', NULL, '123213');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `customs`
--
ALTER TABLE `customs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Indexes for table `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projetos_user_id_foreign` (`user_id`),
  ADD KEY `projetos_status_projs_id_foreign` (`status_projs_id`);

--
-- Indexes for table `status_projs`
--
ALTER TABLE `status_projs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ordem` (`ordem`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customs`
--
ALTER TABLE `customs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `planos`
--
ALTER TABLE `planos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `status_projs`
--
ALTER TABLE `status_projs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `projetos`
--
ALTER TABLE `projetos`
  ADD CONSTRAINT `projetos_status_projs_id_foreign` FOREIGN KEY (`status_projs_id`) REFERENCES `status_projs` (`id`),
  ADD CONSTRAINT `projetos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
