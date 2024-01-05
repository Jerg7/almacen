-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-01-2024 a las 19:41:29
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_positions`
--

CREATE TABLE `job_positions` (
  `id_position` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_status` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `job_positions`
--

INSERT INTO `job_positions` (`id_position`, `description`, `id_status`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 1, NULL, NULL),
(2, 'COORDINADOR', 1, '2023-12-16 01:19:16', '2023-12-16 01:19:16'),
(3, 'GERENTE', 1, '2023-12-16 01:19:09', '2023-12-16 01:19:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `managements`
--

CREATE TABLE `managements` (
  `id_management` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_status` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `managements`
--

INSERT INTO `managements` (`id_management`, `description`, `id_status`, `created_at`, `updated_at`) VALUES
(1, 'Administración y finanzas', 1, '2023-12-16 00:44:11', '2023-12-16 00:44:11'),
(2, 'Auditoría interna', 1, '2023-12-16 00:44:51', '2023-12-16 00:44:51'),
(3, 'Comercialización', 1, '2023-12-16 00:45:02', '2023-12-16 00:45:02'),
(4, 'Consultoría jurídica', 1, '2023-12-16 00:45:15', '2023-12-16 00:45:15'),
(5, 'Cumplimiento', 1, '2023-12-16 00:45:23', '2023-12-16 00:45:23'),
(6, 'Despacho de presidencia', 1, '2023-12-16 00:45:32', '2023-12-16 00:45:32'),
(7, 'Gestión Actuarial', 1, '2023-12-16 00:45:45', '2023-12-16 00:45:45'),
(8, 'Comunicación e imagen corporativa', 1, '2023-12-16 00:46:56', '2023-12-16 01:01:50'),
(9, 'Gestión humana', 1, '2023-12-16 00:47:10', '2023-12-16 00:47:10'),
(10, 'Planificación, presupuesto y gestión organizacional', 1, '2023-12-16 00:47:41', '2023-12-16 00:47:41'),
(11, 'Presidencia', 1, '2023-12-16 00:47:48', '2023-12-16 00:47:48'),
(12, 'Seguridad integral', 1, '2023-12-16 00:48:03', '2023-12-16 00:48:03'),
(13, 'Seguros de personas', 1, '2023-12-16 00:48:10', '2023-12-16 01:02:00'),
(14, 'Seguros patrimoniales y reasegurados', 1, '2023-12-16 00:48:22', '2023-12-16 00:48:22'),
(15, 'Tecnología de la información y comunicación', 1, '2023-12-16 00:48:27', '2023-12-16 00:48:27'),
(16, 'All', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2023_12_13_110451_create_user_status_table', 2),
(14, '2023_12_13_111357_create_managements_table', 3),
(15, '2023_12_13_111358_create_job_positions_table', 3),
(20, '2023_12_13_111713_create_roles_table', 4),
(21, '2023_12_13_111920_create_security_questions_table', 4),
(22, '2023_12_13_113557_create_user_details_table', 4),
(23, '2023_12_22_000000_create_users_table', 5),
(45, '2023_12_22_000001_create_status_table', 6),
(46, '2023_12_22_100512_create_providers_table', 7),
(57, '2023_12_22_191545_create_products_datas_table', 8),
(58, '2023_12_22_191546_create_products_table', 8),
(68, '2023_12_29_105840_create_purchasing_datas_table', 9),
(69, '2023_12_29_112600_create_status_purchases_table', 9),
(70, '2023_12_29_112610_create_purchases_table', 9),
(71, '2024_01_05_114424_create_warehouses_table', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_provider` bigint(20) UNSIGNED NOT NULL,
  `id_product_data` bigint(20) UNSIGNED NOT NULL,
  `id_status` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `id_provider`, `id_product_data`, `id_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-01-03 17:25:06', '2024-01-03 17:25:06'),
(2, 1, 2, 1, '2024-01-03 20:22:37', '2024-01-03 20:22:37'),
(3, 1, 3, 1, '2024-01-03 20:22:59', '2024-01-03 20:22:59'),
(4, 2, 4, 1, '2024-01-03 20:23:18', '2024-01-03 20:23:18'),
(5, 2, 5, 1, '2024-01-03 20:23:36', '2024-01-03 20:23:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_datas`
--

CREATE TABLE `products_datas` (
  `id_product_data` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `prices` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products_datas`
--

INSERT INTO `products_datas` (`id_product_data`, `description`, `prices`, `created_at`, `updated_at`) VALUES
(1, 'PRODUCTO 1 PROV 1', '1200', '2024-01-03 17:25:06', '2024-01-04 13:50:55'),
(2, 'PRODUCTO 2 PROV 1', '2500', '2024-01-03 20:22:37', '2024-01-03 20:22:37'),
(3, 'PRODUCTO 3 PROV 1', '3000', '2024-01-03 20:22:59', '2024-01-03 20:22:59'),
(4, 'PRODUCTO 1 PROV 2', '742', '2024-01-03 20:23:18', '2024-01-03 20:23:18'),
(5, 'PRODUCTO 2 PROV 2', '7428', '2024-01-03 20:23:36', '2024-01-03 20:23:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `providers`
--

CREATE TABLE `providers` (
  `id_provider` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `rif` varchar(255) NOT NULL,
  `id_status` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `providers`
--

INSERT INTO `providers` (`id_provider`, `description`, `rif`, `id_status`, `created_at`, `updated_at`) VALUES
(1, 'PROVEEDOR 1', '02120202', 1, NULL, NULL),
(2, 'PROVEEDOR 2', '1112251', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `id_purchase` bigint(20) UNSIGNED NOT NULL,
  `id_status` bigint(20) UNSIGNED NOT NULL,
  `id_purchasing_data` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `purchases`
--

INSERT INTO `purchases` (`id_purchase`, `id_status`, `id_purchasing_data`, `created_at`, `updated_at`) VALUES
(2, 1, 2, '2024-01-04 14:58:22', '2024-01-05 16:58:30'),
(3, 1, 3, '2024-01-04 14:58:22', '2024-01-05 16:58:30'),
(4, 1, 4, '2024-01-04 15:43:23', '2024-01-05 16:56:55'),
(5, 1, 5, '2024-01-04 15:43:23', '2024-01-05 16:56:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchasing_datas`
--

CREATE TABLE `purchasing_datas` (
  `id_purchasing_data` bigint(20) UNSIGNED NOT NULL,
  `id_provider` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `bill` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `prices` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `purchasing_datas`
--

INSERT INTO `purchasing_datas` (`id_purchasing_data`, `id_provider`, `id_product`, `bill`, `amount`, `prices`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '454512', '4', '8541.33', '2024-01-04 14:58:22', '2024-01-04 14:58:22'),
(3, 1, 2, '454512', '6', '2123.09', '2024-01-04 14:58:22', '2024-01-04 14:58:22'),
(4, 2, 4, '878784', '4', '2400', '2024-01-04 15:43:23', '2024-01-04 15:43:23'),
(5, 2, 5, '878784', '3', '7801', '2024-01-04 15:43:23', '2024-01-04 15:43:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_role`, `description`) VALUES
(1, 'ADMINSITRADOR'),
(2, 'OTRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_questions`
--

CREATE TABLE `security_questions` (
  `id_question` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `security_questions`
--

INSERT INTO `security_questions` (`id_question`, `description`) VALUES
(1, '¿CUAL ES LA MARCA DE TU PRIMER CARRO?'),
(2, '¿CUAL ES LA PELICULA O SERIE FAVORITA?'),
(3, '¿CUAL ES TU GRUPO DE MUSICA FAVORITO?'),
(4, '¿CUAL ES EL NOMBRE DE TU PRIMERA MASCOTA?'),
(5, '¿CUAL ES TU LIBRO FAVORITO?'),
(6, '¿CUAL ES EL PAIS QUE DESEAS CONOCER?'),
(7, '¿CUAL ES TU POSTRE FAVORITO?'),
(8, '¿CUAL ES TU COLOR FAVORITO?'),
(9, '¿CUAL ES TU DEPORTE FAVORITO?'),
(10, '¿CUAL ES EL LUGAR DE NACIMIENTO DE TU MADRE?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id_status` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id_status`, `description`) VALUES
(1, 'ACTIVO'),
(2, 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_purchases`
--

CREATE TABLE `status_purchases` (
  `id_status` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `status_purchases`
--

INSERT INTO `status_purchases` (`id_status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'EN ESPERA', NULL, NULL),
(2, 'RECIBIDO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_detail` bigint(20) UNSIGNED NOT NULL,
  `id_status` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `id_question` bigint(20) UNSIGNED NOT NULL,
  `security_answer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `id_detail`, `id_status`, `id_role`, `username`, `email`, `password`, `remember_token`, `id_question`, `security_answer`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'jrabel', 'jrabel@segurosmiranda.com.ve', '$2y$12$cbQ/yvGXZxZLN94KIMObke2x1VtJIvLpjWUTVoFSTQHBOi1sJVExG', NULL, 9, 'FUTBOL', NULL, NULL),
(2, 2, 1, 1, 'mgomez', 'mgomez@segurosmiranda.com.ve', '$2y$12$/GH9WXjUH.GDyU5.Q5WHr.AKOK7v39wLbeP1kYlh8JjmOuGtaJNg6', NULL, 10, 'CARACAS', NULL, NULL),
(3, 3, 1, 2, 'ejemplo', 'EJEMPLO@EJEMPLO.COM', '$2y$12$MUccMUhmB.5tovkJHG86OOZQofSkkqkygi6UpYkmmQIoX4ZtsmRR2', NULL, 10, 'EJEMPLO', '2023-12-22 00:43:00', '2023-12-22 00:43:00'),
(5, 5, 1, 2, 'iguilarte', 'CHAELO1011@GMAIL.COM', '$2y$12$ixkWP0d1GrI0N6A5g2ULwuf.VPuw4y.Nlr2DAxKKZ52ApEUNyivNC', NULL, 10, 'SUCRE', '2023-12-29 13:28:54', '2023-12-29 13:28:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_details`
--

CREATE TABLE `user_details` (
  `id_detail` bigint(20) UNSIGNED NOT NULL,
  `names` varchar(255) NOT NULL,
  `lastnames` varchar(255) NOT NULL,
  `identification_card` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `id_management` bigint(20) UNSIGNED NOT NULL,
  `id_position` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_details`
--

INSERT INTO `user_details` (`id_detail`, `names`, `lastnames`, `identification_card`, `extension`, `id_management`, `id_position`, `created_at`, `updated_at`) VALUES
(1, 'JOSEANGEL EMMANUEL', 'RABEL GUEVARA', '26.483.297', '0', 16, 1, NULL, NULL),
(2, 'MIRIAM MARLENE', 'GOMEZ REINOSO', '1', '15562', 16, 1, NULL, NULL),
(3, 'EJEMPLO', 'EJEMPLO', '81', '8', 15, 2, '2023-12-22 00:43:00', '2023-12-29 13:54:15'),
(5, 'ISAEL', 'GUILARTE', '223', '112', 15, 2, '2023-12-29 13:28:53', '2023-12-29 13:49:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_status`
--

CREATE TABLE `user_status` (
  `id_status` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_status`
--

INSERT INTO `user_status` (`id_status`, `description`) VALUES
(1, 'ACTIVO'),
(2, 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `warehouses`
--

CREATE TABLE `warehouses` (
  `id_warehouse` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `stock` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `job_positions`
--
ALTER TABLE `job_positions`
  ADD PRIMARY KEY (`id_position`),
  ADD KEY `job_positions_id_status_foreign` (`id_status`);

--
-- Indices de la tabla `managements`
--
ALTER TABLE `managements`
  ADD PRIMARY KEY (`id_management`),
  ADD KEY `managements_id_status_foreign` (`id_status`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `products_id_provider_foreign` (`id_provider`),
  ADD KEY `products_id_product_data_foreign` (`id_product_data`),
  ADD KEY `products_id_status_foreign` (`id_status`);

--
-- Indices de la tabla `products_datas`
--
ALTER TABLE `products_datas`
  ADD PRIMARY KEY (`id_product_data`);

--
-- Indices de la tabla `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id_provider`),
  ADD KEY `providers_id_status_foreign` (`id_status`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id_purchase`),
  ADD KEY `purchases_id_status_foreign` (`id_status`),
  ADD KEY `purchases_id_purchasing_data_foreign` (`id_purchasing_data`);

--
-- Indices de la tabla `purchasing_datas`
--
ALTER TABLE `purchasing_datas`
  ADD PRIMARY KEY (`id_purchasing_data`),
  ADD KEY `purchasing_datas_id_provider_foreign` (`id_provider`),
  ADD KEY `purchasing_datas_id_product_foreign` (`id_product`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indices de la tabla `security_questions`
--
ALTER TABLE `security_questions`
  ADD PRIMARY KEY (`id_question`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indices de la tabla `status_purchases`
--
ALTER TABLE `status_purchases`
  ADD PRIMARY KEY (`id_status`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_detail_foreign` (`id_detail`),
  ADD KEY `users_id_status_foreign` (`id_status`),
  ADD KEY `users_id_role_foreign` (`id_role`),
  ADD KEY `users_id_question_foreign` (`id_question`);

--
-- Indices de la tabla `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `user_details_id_management_foreign` (`id_management`),
  ADD KEY `user_details_id_position_foreign` (`id_position`);

--
-- Indices de la tabla `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indices de la tabla `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id_warehouse`),
  ADD KEY `warehouses_id_product_foreign` (`id_product`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `job_positions`
--
ALTER TABLE `job_positions`
  MODIFY `id_position` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `managements`
--
ALTER TABLE `managements`
  MODIFY `id_management` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `products_datas`
--
ALTER TABLE `products_datas`
  MODIFY `id_product_data` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `providers`
--
ALTER TABLE `providers`
  MODIFY `id_provider` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id_purchase` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `purchasing_datas`
--
ALTER TABLE `purchasing_datas`
  MODIFY `id_purchasing_data` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `security_questions`
--
ALTER TABLE `security_questions`
  MODIFY `id_question` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id_status` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `status_purchases`
--
ALTER TABLE `status_purchases`
  MODIFY `id_status` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id_status` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id_warehouse` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `job_positions`
--
ALTER TABLE `job_positions`
  ADD CONSTRAINT `job_positions_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `user_status` (`id_status`);

--
-- Filtros para la tabla `managements`
--
ALTER TABLE `managements`
  ADD CONSTRAINT `managements_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `user_status` (`id_status`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_product_data_foreign` FOREIGN KEY (`id_product_data`) REFERENCES `products_datas` (`id_product_data`),
  ADD CONSTRAINT `products_id_provider_foreign` FOREIGN KEY (`id_provider`) REFERENCES `providers` (`id_provider`),
  ADD CONSTRAINT `products_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `user_status` (`id_status`);

--
-- Filtros para la tabla `providers`
--
ALTER TABLE `providers`
  ADD CONSTRAINT `providers_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Filtros para la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_id_purchasing_data_foreign` FOREIGN KEY (`id_purchasing_data`) REFERENCES `purchasing_datas` (`id_purchasing_data`),
  ADD CONSTRAINT `purchases_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status_purchases` (`id_status`);

--
-- Filtros para la tabla `purchasing_datas`
--
ALTER TABLE `purchasing_datas`
  ADD CONSTRAINT `purchasing_datas_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `purchasing_datas_id_provider_foreign` FOREIGN KEY (`id_provider`) REFERENCES `providers` (`id_provider`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_detail_foreign` FOREIGN KEY (`id_detail`) REFERENCES `user_details` (`id_detail`),
  ADD CONSTRAINT `users_id_question_foreign` FOREIGN KEY (`id_question`) REFERENCES `security_questions` (`id_question`),
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`),
  ADD CONSTRAINT `users_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `user_status` (`id_status`);

--
-- Filtros para la tabla `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_id_management_foreign` FOREIGN KEY (`id_management`) REFERENCES `managements` (`id_management`),
  ADD CONSTRAINT `user_details_id_position_foreign` FOREIGN KEY (`id_position`) REFERENCES `job_positions` (`id_position`);

--
-- Filtros para la tabla `warehouses`
--
ALTER TABLE `warehouses`
  ADD CONSTRAINT `warehouses_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
