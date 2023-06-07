-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 10:46 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhds_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Diagnostic Radiology', 'Physicians specializing in diagnostic radiology are trained to diagnose illnesses in patients through the use of x-rays, radioactive substances, sound waves in ultrasounds, or the body’s natural magnetism in magnetic resonance images (MRIs).', 1, 0, '2022-03-30 11:02:20', '2022-03-30 12:49:42'),
(2, 'Dermatology', 'asdasd', 1, 1, '2022-03-30 13:09:55', '2022-03-30 13:15:42'),
(3, 'Dermatology', 'test', 1, 1, '2022-03-30 13:21:41', '2022-03-30 13:21:45'),
(4, 'Dermatology', 'Dermatologists are physicians who treat adult and pediatric patients with disorders of the skin, hair, nails, and adjacent mucous membranes. They diagnose everything from skin cancer, tumors, inflammatory diseases of the skin, and infectious diseases. They also perform skin biopsies and dermatological surgical procedures.', 1, 0, '2022-03-30 13:27:53', '2022-03-30 13:27:53'),
(5, 'Neurology', 'Neurology is the specialty within the medical field pertaining to nerves and the nervous system. Neurologists diagnose and treat diseases of the brain, spinal cord, peripheral nerves, muscles, autonomic nervous system, and blood vessels. Much of neurology is consultative, as neurologists treat patients suffering from strokes, Alzheimer’s disease, seizure disorders, and spinal cord disorders.', 1, 0, '2022-03-30 13:28:15', '2022-03-30 13:28:15'),
(6, 'Obstetrics and Gynecology', 'Obstetrician/gynecologists (OB/GYNs) care for the female reproductive system and associated disorders. This field of medicine encompasses a wide array of care, including the care of pregnant women, gynecologic care, oncology, surgery, and primary health care for women.', 1, 0, '2022-03-30 13:29:04', '2022-03-30 13:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_category`
--

CREATE TABLE `clinic_category` (
  `clinic_id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic_category`
--

INSERT INTO `clinic_category` (`clinic_id`, `category_id`) VALUES
(2, 4),
(3, 5),
(1, 1),
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `clinic_list`
--

CREATE TABLE `clinic_list` (
  `id` int(30) NOT NULL,
  `location` text NOT NULL,
  `doctors` text NOT NULL,
  `contacts` text NOT NULL,
  `emails` text NOT NULL,
  `other` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic_list`
--

INSERT INTO `clinic_list` (`id`, `location`, `doctors`, `contacts`, `emails`, `other`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Room 1001', 'John D Smith, MD||Claire Blake, MD', '09123456798||09123456789', 'info@sample.com||alternate@sample.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum leo in purus commodo accumsan. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et ligula gravida, rhoncus magna vel, tristique nibh. Nullam molestie, risus ac pretium mattis, massa dui tristique nunc, eu lacinia leo lorem consequat libero. Donec vitae nisi semper, pulvinar felis quis, mattis sem. Nulla quis dolor in lorem tempor posuere. Mauris non nunc vel ex malesuada pellentesque non egestas ligula. Donec consequat nunc non enim pretium aliquet. Maecenas non arcu a quam aliquam malesuada ut eget arcu. Curabitur sit amet est lorem. Aenean commodo mi vel magna semper dignissim. Fusce commodo orci nec placerat laoreet. Praesent nisl lectus, varius sit amet molestie a, luctus ut ipsum. Sed quis massa quis lorem auctor eleifend. Integer eget nulla sit amet massa commodo porttitor. Duis justo tortor, euismod vitae leo ac, pharetra mattis justo.', 1, 0, '2022-03-30 15:02:06', '2022-03-30 15:30:27'),
(2, 'Room 1002', 'Samantha Miller, MD', '09123456789', 'derma@mdclinic.com', 'Pellentesque auctor dictum porttitor. Ut ultricies feugiat mollis. Aenean pretium pulvinar aliquam. Maecenas lobortis ornare tortor vitae vestibulum. Quisque aliquam neque eget magna venenatis, sit amet auctor ex elementum. Etiam ullamcorper sapien quis metus interdum cursus. Curabitur quis ligula molestie, sollicitudin ipsum ac, fringilla dui. Ut sit amet ornare nulla. Vestibulum condimentum sem at velit vehicula, sit amet hendrerit augue finibus. In hac habitasse platea dictumst.', 1, 0, '2022-03-30 15:47:50', '2022-03-30 15:47:50'),
(3, 'test', 'Samantha Miller, MD', '09123456798', 'info@sample.com', 'test', 1, 1, '2022-03-30 15:50:47', '2022-03-30 15:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Medical Hub Directory Site'),
(6, 'short_name', 'Medical Hub Directory - PHP'),
(11, 'logo', 'uploads/defaults/logo.png?v=1648173882'),
(14, 'cover', 'uploads/defaults/wallpaper.jpg?v=1648173974');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Admin, 2= Staff',
  `last_login` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `type`, `last_login`, `date_added`, `date_updated`) VALUES
(1, 'Administrator', '', 'Admin', 'admin', '$2y$10$n2s5dbrCwxWa7i6Fr/U44O8miS9d9zB07ZQbGzrFg4LLu6rPTdFkq', 'uploads/users/avatar-1.png?v=1648628905', 1, '2022-03-30 03:48:55', '2022-03-30 09:49:16', '2022-03-30 16:28:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinic_category`
--
ALTER TABLE `clinic_category`
  ADD KEY `clinic_id` (`clinic_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `clinic_list`
--
ALTER TABLE `clinic_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clinic_list`
--
ALTER TABLE `clinic_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clinic_category`
--
ALTER TABLE `clinic_category`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `category_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_clinic_id` FOREIGN KEY (`clinic_id`) REFERENCES `clinic_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
