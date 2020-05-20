-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 12:10 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhopd`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_group`
--

CREATE TABLE `auth_group` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_group_permissions`
--

CREATE TABLE `auth_group_permissions` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_permission`
--

CREATE TABLE `auth_permission` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content_type_id` int(11) NOT NULL,
  `codename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_permission`
--

INSERT INTO `auth_permission` (`id`, `name`, `content_type_id`, `codename`) VALUES
(1, 'Can add log entry', 1, 'add_logentry'),
(2, 'Can change log entry', 1, 'change_logentry'),
(3, 'Can delete log entry', 1, 'delete_logentry'),
(4, 'Can view log entry', 1, 'view_logentry'),
(5, 'Can add permission', 2, 'add_permission'),
(6, 'Can change permission', 2, 'change_permission'),
(7, 'Can delete permission', 2, 'delete_permission'),
(8, 'Can view permission', 2, 'view_permission'),
(9, 'Can add group', 3, 'add_group'),
(10, 'Can change group', 3, 'change_group'),
(11, 'Can delete group', 3, 'delete_group'),
(12, 'Can view group', 3, 'view_group'),
(13, 'Can add user', 4, 'add_user'),
(14, 'Can change user', 4, 'change_user'),
(15, 'Can delete user', 4, 'delete_user'),
(16, 'Can view user', 4, 'view_user'),
(17, 'Can add content type', 5, 'add_contenttype'),
(18, 'Can change content type', 5, 'change_contenttype'),
(19, 'Can delete content type', 5, 'delete_contenttype'),
(20, 'Can view content type', 5, 'view_contenttype'),
(21, 'Can add session', 6, 'add_session'),
(22, 'Can change session', 6, 'change_session'),
(23, 'Can delete session', 6, 'delete_session'),
(24, 'Can view session', 6, 'view_session'),
(25, 'Can add users', 7, 'add_users'),
(26, 'Can change users', 7, 'change_users'),
(27, 'Can delete users', 7, 'delete_users'),
(28, 'Can view users', 7, 'view_users'),
(29, 'Can add patient', 8, 'add_patient'),
(30, 'Can change patient', 8, 'change_patient'),
(31, 'Can delete patient', 8, 'delete_patient'),
(32, 'Can view patient', 8, 'view_patient'),
(33, 'Can add service', 9, 'add_service'),
(34, 'Can change service', 9, 'change_service'),
(35, 'Can delete service', 9, 'delete_service'),
(36, 'Can view service', 9, 'view_service'),
(37, 'Can add receipt', 10, 'add_receipt'),
(38, 'Can change receipt', 10, 'change_receipt'),
(39, 'Can delete receipt', 10, 'delete_receipt'),
(40, 'Can view receipt', 10, 'view_receipt');

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

CREATE TABLE `auth_user` (
  `id` int(11) NOT NULL,
  `password` varchar(128) NOT NULL,
  `last_login` datetime(6) DEFAULT NULL,
  `is_superuser` tinyint(1) NOT NULL,
  `username` varchar(150) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(254) NOT NULL,
  `is_staff` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_joined` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_user_groups`
--

CREATE TABLE `auth_user_groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_user_user_permissions`
--

CREATE TABLE `auth_user_user_permissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dhopd_patient`
--

CREATE TABLE `dhopd_patient` (
  `patient_id` int(11) NOT NULL,
  `patient_fname` varchar(200) NOT NULL,
  `patient_mname` varchar(200) NOT NULL,
  `patient_lname` varchar(200) NOT NULL,
  `patient_title` varchar(20) NOT NULL,
  `patient_address` varchar(500) NOT NULL,
  `patient_town` varchar(200) NOT NULL,
  `patient_phone` varchar(15) NOT NULL,
  `patient_services` varchar(500) NOT NULL,
  `patient_receipt` varchar(200) NOT NULL,
  `patient_date` date NOT NULL,
  `patient_time` time(6) NOT NULL,
  `patient_status` varchar(2) NOT NULL,
  `patient_cost` varchar(100) NOT NULL,
  `patient_comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dhopd_receipt`
--

CREATE TABLE `dhopd_receipt` (
  `receipt_id` int(11) NOT NULL,
  `receipt_patient` varchar(200) NOT NULL,
  `receipt_time` time(6) NOT NULL,
  `receipt_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dhopd_service`
--

CREATE TABLE `dhopd_service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(200) NOT NULL,
  `service_cost` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhopd_service`
--

INSERT INTO `dhopd_service` (`service_id`, `service_name`, `service_cost`) VALUES
(1, 'Consultation', '100'),
(2, 'Free Consultation', '0'),
(3, 'Nibulisation', '200'),
(4, 'E.C.G.', '500'),
(5, 'Bl. Glucose', '300'),
(6, 'Revisit', '50'),
(7, 'Drip', '150'),
(8, 'Vaccine', '100');

-- --------------------------------------------------------

--
-- Table structure for table `dhopd_users`
--

CREATE TABLE `dhopd_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `pno` varchar(15) NOT NULL,
  `priority` varchar(2) NOT NULL,
  `auth` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhopd_users`
--

INSERT INTO `dhopd_users` (`user_id`, `user_name`, `password`, `fname`, `lname`, `pno`, `priority`, `auth`) VALUES
(1, 'wsarvesh', '1234', 'Sarvesh', 'Wanode', '7588926601', 'A', '0'),
(2, 'wsarvesh1', '9422160269', 'h', 'q', '9422160269', 'U', '4'),
(3, 'gudu', '9422160269', 'h', 'q', '9422160269', 'U', '5'),
(4, 'xyz', '1234567890', 'q', 'q', '1234567890', 'U', '6'),
(5, 'ac', '1234567890', '1', '2', '1234567890', 'U', '5'),
(6, 'qwer', '1234', 'wwew', 'rrrr', '1234', 'U', '1');

-- --------------------------------------------------------

--
-- Table structure for table `django_admin_log`
--

CREATE TABLE `django_admin_log` (
  `id` int(11) NOT NULL,
  `action_time` datetime(6) NOT NULL,
  `object_id` longtext,
  `object_repr` varchar(200) NOT NULL,
  `action_flag` smallint(5) UNSIGNED NOT NULL,
  `change_message` longtext NOT NULL,
  `content_type_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `django_content_type`
--

CREATE TABLE `django_content_type` (
  `id` int(11) NOT NULL,
  `app_label` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `django_content_type`
--

INSERT INTO `django_content_type` (`id`, `app_label`, `model`) VALUES
(1, 'admin', 'logentry'),
(3, 'auth', 'group'),
(2, 'auth', 'permission'),
(4, 'auth', 'user'),
(5, 'contenttypes', 'contenttype'),
(8, 'DHOPD', 'patient'),
(10, 'DHOPD', 'receipt'),
(9, 'DHOPD', 'service'),
(7, 'DHOPD', 'users'),
(6, 'sessions', 'session');

-- --------------------------------------------------------

--
-- Table structure for table `django_migrations`
--

CREATE TABLE `django_migrations` (
  `id` int(11) NOT NULL,
  `app` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `applied` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `django_migrations`
--

INSERT INTO `django_migrations` (`id`, `app`, `name`, `applied`) VALUES
(1, 'contenttypes', '0001_initial', '2020-05-03 21:02:47.245525'),
(2, 'auth', '0001_initial', '2020-05-03 21:02:48.848952'),
(3, 'admin', '0001_initial', '2020-05-03 21:02:56.156514'),
(4, 'admin', '0002_logentry_remove_auto_add', '2020-05-03 21:02:58.417792'),
(5, 'admin', '0003_logentry_add_action_flag_choices', '2020-05-03 21:02:58.474139'),
(6, 'contenttypes', '0002_remove_content_type_name', '2020-05-03 21:02:59.378829'),
(7, 'auth', '0002_alter_permission_name_max_length', '2020-05-03 21:02:59.940479'),
(8, 'auth', '0003_alter_user_email_max_length', '2020-05-03 21:03:00.914883'),
(9, 'auth', '0004_alter_user_username_opts', '2020-05-03 21:03:00.949475'),
(10, 'auth', '0005_alter_user_last_login_null', '2020-05-03 21:03:01.468426'),
(11, 'auth', '0006_require_contenttypes_0002', '2020-05-03 21:03:01.626894'),
(12, 'auth', '0007_alter_validators_add_error_messages', '2020-05-03 21:03:01.730935'),
(13, 'auth', '0008_alter_user_username_max_length', '2020-05-03 21:03:02.523041'),
(14, 'auth', '0009_alter_user_last_name_max_length', '2020-05-03 21:03:03.851650'),
(15, 'auth', '0010_alter_group_name_max_length', '2020-05-03 21:03:04.895598'),
(16, 'auth', '0011_update_proxy_permissions', '2020-05-03 21:03:04.955063'),
(17, 'sessions', '0001_initial', '2020-05-03 21:03:05.582273'),
(18, 'DHOPD', '0001_initial', '2020-05-03 21:04:41.481318'),
(19, 'DHOPD', '0002_patient_service', '2020-05-04 10:17:23.049161'),
(20, 'DHOPD', '0003_auto_20200507_0021', '2020-05-06 18:51:33.736089'),
(21, 'DHOPD', '0004_patient_patient_status', '2020-05-06 18:56:58.684957'),
(22, 'DHOPD', '0005_patient_patient_cost', '2020-05-06 18:58:53.785011'),
(23, 'DHOPD', '0006_patient_patient_comment', '2020-05-06 19:01:33.567110'),
(24, 'DHOPD', '0007_receipt', '2020-05-06 19:47:51.280315'),
(25, 'DHOPD', '0008_auto_20200507_0118', '2020-05-06 19:48:47.903131'),
(26, 'DHOPD', '0009_auto_20200507_0122', '2020-05-06 19:52:44.982918'),
(27, 'DHOPD', '0010_receipt_receipt_status', '2020-05-06 19:56:28.749875');

-- --------------------------------------------------------

--
-- Table structure for table `django_session`
--

CREATE TABLE `django_session` (
  `session_key` varchar(40) NOT NULL,
  `session_data` longtext NOT NULL,
  `expire_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `django_session`
--

INSERT INTO `django_session` (`session_key`, `session_data`, `expire_date`) VALUES
('2re8zxz83v4kfx5rhsvxhyni69rk80wu', 'MmE2MzhlYWE1NjM4NDhjMGNlN2Q4YWM4M2Q3OTA5NjdiYTA2NTM2Mjp7ImxvZyI6M30=', '2020-05-25 20:36:58.317840'),
('99u2subwpapbsdfdtuw9cy2hagct63t8', 'MmE2MzhlYWE1NjM4NDhjMGNlN2Q4YWM4M2Q3OTA5NjdiYTA2NTM2Mjp7ImxvZyI6M30=', '2020-05-25 20:30:48.057787'),
('ak0uuocxw72127u5fzsgtsq9o96pim28', 'ODcwNGYwZDAyODU0MDQ0MjRkMDk4M2I4ODQ3MzM1MWQwMGJjNWU5ZTp7ImxvZyI6MX0=', '2020-05-27 21:36:48.083051');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_group`
--
ALTER TABLE `auth_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_group_permissions_group_id_permission_id_0cd325b0_uniq` (`group_id`,`permission_id`),
  ADD KEY `auth_group_permissio_permission_id_84c5c92e_fk_auth_perm` (`permission_id`);

--
-- Indexes for table `auth_permission`
--
ALTER TABLE `auth_permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_permission_content_type_id_codename_01ab375a_uniq` (`content_type_id`,`codename`);

--
-- Indexes for table `auth_user`
--
ALTER TABLE `auth_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `auth_user_groups`
--
ALTER TABLE `auth_user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_user_groups_user_id_group_id_94350c0c_uniq` (`user_id`,`group_id`),
  ADD KEY `auth_user_groups_group_id_97559544_fk_auth_group_id` (`group_id`);

--
-- Indexes for table `auth_user_user_permissions`
--
ALTER TABLE `auth_user_user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_user_user_permissions_user_id_permission_id_14a6b632_uniq` (`user_id`,`permission_id`),
  ADD KEY `auth_user_user_permi_permission_id_1fbb5f2c_fk_auth_perm` (`permission_id`);

--
-- Indexes for table `dhopd_patient`
--
ALTER TABLE `dhopd_patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `dhopd_receipt`
--
ALTER TABLE `dhopd_receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `dhopd_service`
--
ALTER TABLE `dhopd_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `dhopd_users`
--
ALTER TABLE `dhopd_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `django_admin_log_content_type_id_c4bce8eb_fk_django_co` (`content_type_id`),
  ADD KEY `django_admin_log_user_id_c564eba6_fk_auth_user_id` (`user_id`);

--
-- Indexes for table `django_content_type`
--
ALTER TABLE `django_content_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `django_content_type_app_label_model_76bd3d3b_uniq` (`app_label`,`model`);

--
-- Indexes for table `django_migrations`
--
ALTER TABLE `django_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `django_session`
--
ALTER TABLE `django_session`
  ADD PRIMARY KEY (`session_key`),
  ADD KEY `django_session_expire_date_a5c62663` (`expire_date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_group`
--
ALTER TABLE `auth_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_permission`
--
ALTER TABLE `auth_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `auth_user`
--
ALTER TABLE `auth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_user_groups`
--
ALTER TABLE `auth_user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_user_user_permissions`
--
ALTER TABLE `auth_user_user_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dhopd_patient`
--
ALTER TABLE `dhopd_patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dhopd_receipt`
--
ALTER TABLE `dhopd_receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dhopd_service`
--
ALTER TABLE `dhopd_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dhopd_users`
--
ALTER TABLE `dhopd_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `django_content_type`
--
ALTER TABLE `django_content_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `django_migrations`
--
ALTER TABLE `django_migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  ADD CONSTRAINT `auth_group_permissio_permission_id_84c5c92e_fk_auth_perm` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`),
  ADD CONSTRAINT `auth_group_permissions_group_id_b120cbf9_fk_auth_group_id` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`);

--
-- Constraints for table `auth_permission`
--
ALTER TABLE `auth_permission`
  ADD CONSTRAINT `auth_permission_content_type_id_2f476e4b_fk_django_co` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`);

--
-- Constraints for table `auth_user_groups`
--
ALTER TABLE `auth_user_groups`
  ADD CONSTRAINT `auth_user_groups_group_id_97559544_fk_auth_group_id` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`),
  ADD CONSTRAINT `auth_user_groups_user_id_6a12ed8b_fk_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `auth_user_user_permissions`
--
ALTER TABLE `auth_user_user_permissions`
  ADD CONSTRAINT `auth_user_user_permi_permission_id_1fbb5f2c_fk_auth_perm` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`),
  ADD CONSTRAINT `auth_user_user_permissions_user_id_a95ead1b_fk_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  ADD CONSTRAINT `django_admin_log_content_type_id_c4bce8eb_fk_django_co` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`),
  ADD CONSTRAINT `django_admin_log_user_id_c564eba6_fk_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
