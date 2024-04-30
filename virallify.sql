-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 07:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virallify`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT 1,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(3, 'aaa', 'aaa', 'aaa', 'aaa', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `faq_settings`
--

CREATE TABLE `faq_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_settings`
--

INSERT INTO `faq_settings` (`id`, `publish`, `created_by`, `created_at`, `updated_at`) VALUES
(8, 1, '', '2023-11-21 06:17:14', '2023-11-21 06:17:14'),
(9, 0, '', '2023-11-30 22:39:46', '2023-11-30 22:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `faq_setting_translations`
--

CREATE TABLE `faq_setting_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_setting_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `question` longtext DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_setting_translations`
--

INSERT INTO `faq_setting_translations` (`id`, `faq_setting_id`, `locale`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(11, 8, 'en', 'What is Elite Homes?', 'Lorem ipsum dolor sit amet consectetur. Tortor purus mauris sit etiam sapien non viverra nisl cursus. Cras velit turpis in ullamcorper gravida vel risus hac viverra. Ullamcorper ac convallis ac id vitae nulla semper. Vel amet consectetur odio ac fermentum enim amet facilisis.', NULL, NULL),
(12, 8, 'ar', 'What is Elite Homes?', 'Lorem ipsum dolor sit amet consectetur. Tortor purus mauris sit etiam sapien non viverra nisl cursus. Cras velit turpis in ullamcorper gravida vel risus hac viverra. Ullamcorper ac convallis ac id vitae nulla semper. Vel amet consectetur odio ac fermentum enim amet facilisis.', NULL, NULL),
(13, 9, 'en', 'test', 'test', NULL, NULL),
(14, 9, 'ar', 'test ar', 'test ar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `logo` varchar(255) NOT NULL DEFAULT '',
  `created_by` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `status`, `logo`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'storage/uploads/footer/New Project5049_1706370482.png', '', '2023-09-12 08:16:04', '2024-01-27 13:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `footer_translations`
--

CREATE TABLE `footer_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `footer_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `copy_rights` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_translations`
--

INSERT INTO `footer_translations` (`id`, `footer_id`, `locale`, `content`, `copy_rights`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'We are a premier company with professional approach in real-estate industry of Kuwait. We help our clients and companies to find the best and affordable residential renting and selling property in Kuwait.', 'Copyright © Virallify', NULL, NULL),
(2, 1, 'ar', 'نحن شركة محترفة في مجال العقارات ولدينا اقوى فريق احترافي في تسويق العقارات بكل انواعها.  فريقنا سوف يساعدك لايجاد الوحدة العقارية المناسبة لاحتياجاتك المالية والمعيشية', 'Copyright © Virallify', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_banner`
--

CREATE TABLE `home_banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `created_by` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banner`
--

INSERT INTO `home_banner` (`id`, `image`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'storage/uploads/home_banner/766_2024_01_29_1706488997.png', '', '2023-09-12 08:16:04', '2024-01-28 22:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `home_banner_translations`
--

CREATE TABLE `home_banner_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_banner_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `btn1_text` varchar(255) DEFAULT NULL,
  `btn1_link` varchar(255) DEFAULT NULL,
  `btn2_text` varchar(255) DEFAULT NULL,
  `btn2_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banner_translations`
--

INSERT INTO `home_banner_translations` (`id`, `home_banner_id`, `locale`, `content`, `title`, `btn1_text`, `btn1_link`, `btn2_text`, `btn2_link`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'We are a premier company with professional approach in real-estate industry of Kuwait. We help our clients and companies to find the best and affordable residential renting and selling property in Kuwait.', 'Copyright © Virallify', 'a', 'a', 'a', 'a', NULL, NULL),
(2, 1, 'ar', 'نحن شركة محترفة في مجال العقارات ولدينا اقوى فريق احترافي في تسويق العقارات بكل انواعها.  فريقنا سوف يساعدك لايجاد الوحدة العقارية المناسبة لاحتياجاتك المالية والمعيشية', 'Copyright © Virallify', 'a', 'a', 'a', 'a', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `langauges`
--

CREATE TABLE `langauges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `direction` enum('rtl','ltr') NOT NULL DEFAULT 'ltr',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `langauges`
--

INSERT INTO `langauges` (`id`, `code`, `name`, `direction`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', 'ltr', '2022-12-19 11:39:29', '2022-12-19 11:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `language_translates`
--

CREATE TABLE `language_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `word` varchar(255) NOT NULL,
  `translation` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_translates`
--

INSERT INTO `language_translates` (`id`, `key`, `word`, `translation`, `created_at`, `updated_at`) VALUES
(113, 'en', 'Appointment has already been booked before', 'Appointment has already been booked before', '2023-11-30 04:03:49', '2023-11-30 04:03:49'),
(114, 'ar', 'Appointment has already been booked before', 'لقد تم حجز الموعد بالفعل من قبل', '2023-11-30 04:04:07', '2023-11-30 04:04:07'),
(115, 'en', 'Appointment has been booked successfully', 'Appointment has been booked successfully', '2023-11-30 04:04:34', '2023-11-30 04:04:34'),
(116, 'ar', 'Appointment has been booked successfully', 'تم حجز الموعد بنجاح', '2023-11-30 04:04:50', '2023-11-30 04:04:50'),
(117, 'en', 'Appointment has been canceled successfully', 'Appointment has been canceled successfully', '2023-11-30 04:05:40', '2023-11-30 04:05:40'),
(118, 'ar', 'Appointment has been canceled successfully', 'تم إلغاء الموعد بنجاح', '2023-11-30 04:06:41', '2023-11-30 04:06:41'),
(119, 'en', 'You Re-sent Request Again after rejected (waiting approval)', 'You Re-sent Request Again after rejected (waiting approval)', '2023-11-30 04:08:00', '2023-11-30 04:08:00'),
(120, 'ar', 'You Re-sent Request Again after rejected (waiting approval)', 'قمت بإعادة إرسال الطلب مرة أخرى بعد رفضه (في انتظار الموافقة)', '2023-11-30 04:08:27', '2023-11-30 04:08:27'),
(121, 'en', 'You Already Have Sent Request (waiting approval)', 'You Already Have Sent Request (waiting approval)', '2023-11-30 04:10:12', '2023-11-30 04:10:12'),
(122, 'ar', 'You Already Have Sent Request (waiting approval)', 'لقد أرسلت الطلب بالفعل (في انتظار الموافقة)', '2023-11-30 04:11:09', '2023-11-30 04:11:09'),
(123, 'en', 'this vendor account already exists', 'this vendor account already exists', '2023-11-30 04:11:41', '2023-11-30 04:11:41'),
(124, 'ar', 'this vendor account already exists', 'حساب البائع هذا موجود بالفعل', '2023-11-30 04:11:59', '2023-11-30 04:11:59'),
(125, 'en', 'Your Request Has Been Sent Successfully', 'Your Request Has Been Sent Successfully', '2023-11-30 04:12:31', '2023-11-30 04:12:31'),
(126, 'ar', 'Your Request Has Been Sent Successfully', 'تم ارسال طلبك بنجاح', '2023-11-30 04:12:59', '2023-11-30 04:12:59'),
(127, 'en', 'Updated Failed', 'Updated Failed', '2023-11-30 04:13:56', '2023-11-30 04:13:56'),
(128, 'ar', 'Updated Failed', 'فشل التحديث', '2023-11-30 04:14:35', '2023-11-30 04:14:35'),
(129, 'en', 'Updated Successfully', 'Updated Successfully', '2023-11-30 04:15:45', '2023-11-30 04:15:45'),
(130, 'ar', 'Updated Successfully', 'تم التحديث بنجاح', '2023-11-30 04:16:06', '2023-11-30 04:16:06'),
(131, 'en', 'Congratulations you become a vendor Successfully!', 'Congratulations you become a vendor Successfully!', '2023-11-30 04:17:04', '2023-11-30 04:17:04'),
(132, 'ar', 'Congratulations you become a vendor Successfully!', 'تهانينا، لقد أصبحت بائعًا بنجاح!', '2023-11-30 04:17:26', '2023-11-30 04:17:26'),
(133, 'en', 'Client\'s request has been rejected', 'Client\'s request has been rejected', '2023-11-30 04:18:05', '2023-11-30 04:18:05'),
(134, 'ar', 'Client\'s request has been rejected', 'لقد تم رفض طلب العميل', '2023-11-30 04:18:22', '2023-11-30 04:18:22'),
(135, 'en', 'The request has already been sent , wait for approval (pending)', 'The request has already been sent , wait for approval (pending)', '2023-11-30 04:19:09', '2023-11-30 04:19:09'),
(136, 'ar', 'The request has already been sent , wait for approval (pending)', 'تم إرسال الطلب بالفعل، انتظر الموافقة (معلق)', '2023-11-30 04:19:32', '2023-11-30 04:19:32'),
(137, 'en', 'Client does not send any request', 'Client did not send any request', '2023-11-30 04:21:00', '2023-11-30 04:22:08'),
(138, 'ar', 'Client did not send any request', 'لم يرسل العميل أي طلب', '2023-11-30 04:22:27', '2023-11-30 04:22:27'),
(139, 'en', 'Client Not found in Database', 'Client Not found in Database', '2023-11-30 04:22:43', '2023-11-30 04:22:43'),
(140, 'ar', 'Client Not found in Database', 'العميل غير موجود في قاعدة البيانات', '2023-11-30 04:23:01', '2023-11-30 04:23:01'),
(141, 'en', 'Property has been added to your wishlist successfully', 'Property has been added to your wishlist successfully', '2023-11-30 04:23:59', '2023-11-30 04:23:59'),
(142, 'ar', 'Property has been added to your wishlist successfully', 'تمت إضافة العقار إلى قائمة أمنياتك بنجاح', '2023-11-30 04:24:17', '2023-11-30 04:24:17'),
(143, 'en', 'Property has already added to your wishlist before', 'Property has already added to your wishlist before', '2023-11-30 04:24:42', '2023-11-30 04:24:42'),
(144, 'ar', 'Property has already added to your wishlist before', 'تمت إضافة العقار بالفعل إلى قائمة أمنياتك من قبل', '2023-11-30 04:24:57', '2023-11-30 04:24:57'),
(145, 'en', 'Property has been removed from your wishlist successfully', 'Property has been removed from your wishlist successfully', '2023-11-30 04:26:04', '2023-11-30 04:26:04'),
(146, 'ar', 'Property has been removed from your wishlist successfully', 'تمت إزالة الخاصية من قائمة أمنياتك بنجاح', '2023-11-30 04:26:23', '2023-11-30 04:26:23'),
(147, 'en', 'Client does not have this property in wishlist', 'Client does not have this property in wishlist', '2023-11-30 04:26:58', '2023-11-30 04:26:58'),
(148, 'ar', 'Client does not have this property in wishlist', 'العميل ليس لديه هذا العقار في قائمة الرغبات', '2023-11-30 04:27:41', '2023-11-30 04:27:41'),
(149, 'en', 'Client or Property not found', 'Client or Property not found', '2023-11-30 04:28:17', '2023-11-30 04:28:17'),
(150, 'ar', 'Client or Property not found', 'لم يتم العثور على العميل أو العقار', '2023-11-30 04:28:35', '2023-11-30 04:28:35'),
(151, 'en', 'resending otp code..,Please verify your account by OTP code to login', 'resending otp code..,Please verify your account by OTP code to login', '2023-11-30 04:32:54', '2023-11-30 04:32:54'),
(152, 'ar', 'resending otp code..,Please verify your account by OTP code to login', 'إعادة إرسال رمز OTP.. يرجى التحقق من حسابك عن طريق رمز OTP لتسجيل الدخول', '2023-11-30 04:33:20', '2023-11-30 04:33:20'),
(153, 'en', 'Login Successfully', 'Login Successfully', '2023-11-30 04:33:39', '2023-11-30 04:33:39'),
(154, 'ar', 'Login Successfully', 'تم تسجيل الدخول بنجاح', '2023-11-30 04:33:57', '2023-11-30 04:33:57'),
(155, 'en', 'mobile number or password is wrong !', 'mobile number or password is wrong !', '2023-11-30 04:34:23', '2023-11-30 04:34:23'),
(156, 'ar', 'mobile number or password is wrong !', 'رقم الجوال أو كلمة المرور خاطئة!', '2023-11-30 04:34:39', '2023-11-30 04:34:39'),
(157, 'en', 'Register new user successfully! , please verify your account by OTP', 'Register new user successfully! , please verify your account by OTP', '2023-11-30 04:35:16', '2023-11-30 04:35:16'),
(158, 'ar', 'Register new user successfully! , please verify your account by OTP', 'تم تسجيل مستخدم جديد بنجاح! يرجى التحقق من حسابك عن طريق OTP', '2023-11-30 04:35:53', '2023-11-30 04:35:53'),
(159, 'en', 'Invalid OTP Code', 'Invalid OTP Code', '2023-11-30 04:36:28', '2023-11-30 04:36:28'),
(160, 'ar', 'Invalid OTP Code', 'رمز OTP غير صالح', '2023-11-30 04:36:46', '2023-11-30 04:36:46'),
(161, 'en', 'OTP Code is valid (Account is Activated) , Login Successfully', 'OTP Code is valid (Account is Activated) , Login Successfully', '2023-11-30 04:37:07', '2023-11-30 04:37:07'),
(162, 'ar', 'OTP Code is valid (Account is Activated) , Login Successfully', 'رمز OTP صالح (الحساب مفعل)، تم تسجيل الدخول بنجاح', '2023-11-30 04:37:33', '2023-11-30 04:37:33'),
(163, 'en', 'Name', 'Name', '2023-11-30 04:39:52', '2023-11-30 04:39:52'),
(164, 'ar', 'Name', 'الاسم', '2023-11-30 04:40:03', '2023-11-30 04:40:03'),
(165, 'en', 'Title in English', 'Title in English', '2023-11-30 04:42:43', '2023-11-30 04:42:43'),
(166, 'ar', 'Title in English', 'العنوان باللغة الإنجليزية', '2023-11-30 04:42:59', '2023-11-30 04:42:59'),
(167, 'en', 'Title in Arabic', 'Title in Arabic', '2023-11-30 04:43:22', '2023-11-30 04:43:22'),
(168, 'ar', 'Title in Arabic', 'العنوان باللغة العربية', '2023-11-30 04:43:38', '2023-11-30 04:43:38'),
(169, 'en', 'Description in Arabic', 'Description in Arabic', '2023-11-30 04:43:53', '2023-11-30 04:43:53'),
(170, 'ar', 'Description in Arabic', 'الوصف باللغة العربية', '2023-11-30 04:44:18', '2023-11-30 04:44:18'),
(171, 'en', 'Description in English', 'Description in English', '2023-11-30 04:44:37', '2023-11-30 04:44:37'),
(172, 'ar', 'Description in English', 'الوصف باللغة الإنجليزية', '2023-11-30 04:44:50', '2023-11-30 04:44:50'),
(173, 'en', 'Title', 'Title', '2023-11-30 04:45:07', '2023-11-30 04:45:07'),
(174, 'ar', 'Title', 'العنوان', '2023-11-30 04:45:20', '2023-11-30 04:45:20'),
(175, 'ar', 'Image', 'الصورة', '2023-11-30 04:45:37', '2023-11-30 04:45:37'),
(176, 'en', 'Image', 'Image', '2023-11-30 04:45:59', '2023-11-30 04:45:59'),
(177, 'en', 'Awards', 'Awards', '2023-11-30 04:46:32', '2023-11-30 04:46:32'),
(178, 'ar', 'Awards', 'الجوائز', '2023-11-30 04:46:49', '2023-11-30 04:46:49'),
(179, 'en', 'Units', 'Units', '2023-11-30 04:47:07', '2023-11-30 04:47:07'),
(180, 'ar', 'Units', 'الوحدات', '2023-11-30 04:47:21', '2023-11-30 04:47:21'),
(181, 'en', 'Clients', 'Clients', '2023-11-30 04:48:00', '2023-11-30 04:48:00'),
(182, 'ar', 'Clients', 'العملاء', '2023-11-30 04:48:12', '2023-11-30 04:48:12'),
(183, 'en', 'Employees', 'Employees', '2023-11-30 04:48:38', '2023-11-30 04:48:38'),
(184, 'ar', 'Employees', 'الموظفين', '2023-11-30 04:48:51', '2023-11-30 04:48:51'),
(185, 'ar', 'Employee', 'موظف', '2023-11-30 04:49:03', '2023-11-30 04:49:03'),
(186, 'en', 'Client', 'عميل', '2023-11-30 04:49:16', '2023-11-30 04:49:16'),
(187, 'en', 'Status', 'Status', '2023-11-30 04:49:40', '2023-11-30 04:49:40'),
(188, 'ar', 'Status', 'الحالة', '2023-11-30 04:49:53', '2023-11-30 04:49:53'),
(189, 'en', 'Update', 'Update', '2023-11-30 04:50:53', '2023-11-30 04:50:53'),
(190, 'ar', 'Update', 'تحديث', '2023-11-30 04:51:08', '2023-11-30 04:51:08'),
(191, 'en', 'Save', 'Save', '2023-11-30 04:51:21', '2023-11-30 04:51:21'),
(192, 'ar', 'Save', 'حفظ', '2023-11-30 04:51:30', '2023-11-30 04:51:30'),
(193, 'en', 'Edit', 'Edit', '2023-11-30 04:51:48', '2023-11-30 04:51:48'),
(194, 'ar', 'Edit', 'تعديل', '2023-11-30 04:51:58', '2023-11-30 04:51:58'),
(195, 'en', 'Delete', 'Delete', '2023-11-30 04:52:11', '2023-11-30 04:52:11'),
(196, 'ar', 'Delete', 'حذف', '2023-11-30 04:52:24', '2023-11-30 04:52:24'),
(197, 'en', 'Details', 'Details', '2023-11-30 04:52:42', '2023-11-30 04:52:42'),
(198, 'ar', 'Details', 'تفاصيل', '2023-11-30 04:52:56', '2023-11-30 04:52:56'),
(199, 'en', 'Confirmed', 'Confirmed', '2023-11-30 04:53:18', '2023-11-30 04:53:18'),
(200, 'ar', 'Confirmed', 'تم التأكيد', '2023-11-30 04:53:29', '2023-11-30 04:53:29'),
(201, 'en', 'Approved', 'Approved', '2023-11-30 04:53:54', '2023-11-30 04:53:54'),
(202, 'ar', 'Approved', 'تم الموافقة', '2023-11-30 04:54:06', '2023-11-30 04:54:06'),
(203, 'en', 'Rejected', 'Rejected', '2023-11-30 04:55:08', '2023-11-30 04:55:21'),
(204, 'ar', 'Rejected', 'تم الرفض', '2023-11-30 04:55:53', '2023-11-30 04:55:53'),
(205, 'en', 'Canceled', 'Canceled', '2023-11-30 04:56:24', '2023-11-30 04:56:24'),
(206, 'ar', 'Canceled', 'تم الإلغاء', '2023-11-30 04:56:33', '2023-11-30 04:56:33'),
(207, 'en', 'Reject', 'Reject', '2023-11-30 04:56:53', '2023-11-30 04:56:53'),
(208, 'ar', 'Reject', 'رفض', '2023-11-30 04:57:04', '2023-11-30 04:57:04'),
(209, 'en', 'Password', 'Password', '2023-11-30 04:57:39', '2023-11-30 04:57:39'),
(210, 'ar', 'Password', 'كلمة المرور', '2023-11-30 04:57:55', '2023-11-30 04:57:55'),
(211, 'en', 'Confirm Password', 'Confirm Password', '2023-11-30 04:58:38', '2023-11-30 04:58:38'),
(212, 'ar', 'Confirm Password', 'تأكيد كلمة المرور', '2023-11-30 04:58:54', '2023-11-30 04:58:54'),
(213, 'en', 'Users', 'Users', '2023-11-30 04:59:17', '2023-11-30 04:59:17'),
(214, 'en', 'User', 'User', '2023-11-30 04:59:24', '2023-11-30 04:59:24'),
(215, 'ar', 'Users', 'المستخدمين', '2023-11-30 04:59:40', '2023-11-30 04:59:40'),
(216, 'ar', 'User', 'المستخدم', '2023-11-30 05:00:19', '2023-11-30 05:00:19'),
(217, 'en', 'Vendors', 'Vendors', '2023-11-30 05:00:33', '2023-11-30 05:00:33'),
(218, 'ar', 'Vendors', 'البائعين', '2023-11-30 05:00:44', '2023-11-30 05:00:44'),
(219, 'en', 'Vendor', 'Vendor', '2023-11-30 05:01:03', '2023-11-30 05:01:14'),
(220, 'ar', 'Vendor', 'البائع', '2023-11-30 05:01:31', '2023-11-30 05:01:31'),
(221, 'en', 'Dashboard', 'Dashboard', '2023-11-30 05:02:03', '2023-11-30 05:02:03'),
(222, 'ar', 'Dashboard', 'لوحة التحكم', '2023-11-30 05:02:21', '2023-11-30 05:02:21'),
(223, 'en', 'Properties', 'Properties', '2023-11-30 05:02:57', '2023-11-30 05:02:57'),
(224, 'ar', 'Properties', 'العقارات', '2023-11-30 05:03:13', '2023-11-30 05:03:13'),
(225, 'en', 'Property', 'Property', '2023-11-30 05:03:30', '2023-11-30 05:03:30'),
(226, 'ar', 'Property', 'العقار', '2023-11-30 05:03:41', '2023-11-30 05:03:41'),
(227, 'en', 'Tasks', 'Tasks', '2023-11-30 05:04:03', '2023-11-30 05:04:03'),
(228, 'ar', 'Tasks', 'المهام', '2023-11-30 05:04:24', '2023-11-30 05:04:24'),
(229, 'en', 'Task', 'Task', '2023-11-30 05:04:37', '2023-11-30 05:04:37'),
(230, 'ar', 'Task', 'المهمة', '2023-11-30 05:04:47', '2023-11-30 05:04:47'),
(231, 'en', 'Properties Management', 'Properties Management', '2023-11-30 05:05:36', '2023-11-30 05:05:36'),
(232, 'ar', 'Properties Management', 'إدارة العقارات', '2023-11-30 05:05:59', '2023-11-30 05:05:59'),
(233, 'en', 'Human Resources', 'Human Resources', '2023-11-30 05:07:16', '2023-11-30 05:07:16'),
(234, 'ar', 'Human Resources', 'الموارد البشرية', '2023-11-30 05:07:28', '2023-11-30 05:07:28'),
(235, 'en', 'Notifications', 'Notifications', '2023-11-30 05:08:12', '2023-11-30 05:08:12'),
(236, 'ar', 'Notifications', 'الإشعارات', '2023-11-30 05:08:19', '2023-11-30 05:08:19'),
(237, 'en', 'Languages', 'Languages', '2023-11-30 05:08:37', '2023-11-30 05:08:37'),
(238, 'ar', 'Languages', 'اللغات', '2023-11-30 05:08:45', '2023-11-30 05:08:45'),
(239, 'en', 'Main Settings', 'Main Settings', '2023-11-30 05:09:12', '2023-11-30 05:09:12'),
(240, 'ar', 'Main Settings', 'الاعدادات الرئيسية', '2023-11-30 05:09:30', '2023-11-30 05:09:30'),
(241, 'en', 'System Settings', 'System Settings', '2023-11-30 05:09:55', '2023-11-30 05:09:55'),
(242, 'ar', 'System Settings', 'أعدادات النظام', '2023-11-30 05:10:11', '2023-11-30 05:10:11'),
(243, 'en', 'Properties Request', 'Properties Request', '2023-11-30 05:28:51', '2023-11-30 05:28:51'),
(244, 'ar', 'Properties Request', 'طلبات العقارات', '2023-11-30 05:29:07', '2023-11-30 05:29:07'),
(245, 'en', 'Website Management', 'Website Management', '2023-11-30 05:30:52', '2023-11-30 05:30:52'),
(246, 'ar', 'Website Management', 'إدارة الموقع', '2023-11-30 05:31:17', '2023-11-30 05:31:17'),
(247, 'en', 'Permissions', 'Permissions', '2023-11-30 05:34:00', '2023-11-30 05:34:00'),
(248, 'ar', 'Permissions', 'الصلاحيات', '2023-11-30 05:34:09', '2023-11-30 05:34:09'),
(249, 'ar', 'Roles', 'الادوار', '2023-11-30 05:39:35', '2023-11-30 05:40:53'),
(250, 'en', 'Roles', 'Roles', '2023-11-30 05:39:35', '2023-11-30 05:40:35'),
(251, 'en', 'Appointments', 'Appointments', '2023-11-30 05:41:27', '2023-11-30 05:41:27'),
(252, 'ar', 'Appointments', 'المواعيد', '2023-11-30 05:41:44', '2023-11-30 05:41:44'),
(254, 'en', 'Requests', 'Requests', '2023-11-30 05:42:10', '2023-11-30 05:42:10'),
(255, 'ar', 'Requests', 'الطلبات', '2023-11-30 05:42:55', '2023-11-30 05:42:55'),
(256, 'en', 'Add New', 'Add New', '2023-11-30 05:43:45', '2023-11-30 05:43:45'),
(257, 'ar', 'Add New', 'إضافة جديد', '2023-11-30 05:45:38', '2023-11-30 05:45:38'),
(258, 'en', 'New Vendor', 'New Vendor', '2023-11-30 05:46:40', '2023-11-30 05:46:40'),
(259, 'en', 'New Client', 'New Client', '2023-11-30 05:47:02', '2023-11-30 05:47:02'),
(260, 'en', 'New Employee', 'New Employee', '2023-11-30 05:47:13', '2023-11-30 05:47:13'),
(261, 'en', 'New User', 'New User', '2023-11-30 05:47:22', '2023-11-30 05:47:22'),
(262, 'ar', 'New Client', 'اضافة عميل', '2023-11-30 05:47:48', '2023-11-30 05:47:48'),
(263, 'ar', 'New Employee', 'إضافة موظف', '2023-11-30 05:48:40', '2023-11-30 05:48:40'),
(264, 'ar', 'New User', 'إضافة مستخدم', '2023-11-30 05:48:56', '2023-11-30 05:48:56'),
(265, 'ar', 'New Vendor', 'إضافه بائع', '2023-11-30 05:49:14', '2023-11-30 05:49:14'),
(266, 'ar', 'Vendor Requests', 'طلبات بائع', '2023-11-30 05:50:29', '2023-11-30 05:50:29'),
(267, 'en', 'Vendor Requests', 'Vendor Requests', '2023-11-30 05:50:46', '2023-11-30 05:50:46'),
(268, 'en', 'New Unit', 'New Unit', '2023-11-30 05:51:24', '2023-11-30 05:51:24'),
(269, 'ar', 'New Unit', 'إضافة وحدة', '2023-11-30 05:51:38', '2023-11-30 05:51:38'),
(270, 'ar', 'Client Type', 'نوع العميل', '2023-11-30 05:52:18', '2023-11-30 05:52:18'),
(271, 'en', 'Client Type', 'Client Type', '2023-11-30 05:52:33', '2023-11-30 05:52:33'),
(272, 'en', 'Contacts Messages', 'Contact Messages', '2023-11-30 05:53:43', '2023-11-30 05:53:43'),
(273, 'ar', 'Contacts Messages', 'رسائل التواصل', '2023-11-30 05:54:01', '2023-11-30 05:54:01'),
(274, 'en', 'Add Task', 'Add Task', '2023-11-30 05:56:23', '2023-11-30 05:56:23'),
(275, 'ar', 'Add Task', 'إضافة مهمه', '2023-11-30 05:57:04', '2023-11-30 05:57:04'),
(276, 'en', 'New Property', 'New Property', '2023-11-30 05:57:30', '2023-11-30 05:57:30'),
(277, 'ar', 'New Property', 'إضافة عقار', '2023-11-30 05:57:46', '2023-11-30 05:57:46'),
(278, 'en', 'Rented Properties', 'Rented Properties', '2023-11-30 05:58:35', '2023-11-30 05:58:35'),
(279, 'ar', 'Rented Properties', 'العقارات المستأجرة', '2023-11-30 05:58:51', '2023-11-30 05:58:51'),
(280, 'en', 'Plans', 'Plans', '2023-11-30 06:01:43', '2023-11-30 06:01:43'),
(281, 'ar', 'Plans', 'الخطط', '2023-11-30 06:01:51', '2023-11-30 06:01:51'),
(282, 'en', 'Plan', 'Plan', '2023-11-30 06:02:21', '2023-11-30 06:02:21'),
(283, 'ar', 'Plan', 'خطة', '2023-11-30 06:03:30', '2023-11-30 06:03:30'),
(284, 'en', 'Hr Requests', 'Hr Requests', '2023-11-30 06:04:33', '2023-11-30 06:04:33'),
(285, 'ar', 'Hr Requests', 'طلبات الموارد البشرية', '2023-11-30 06:04:59', '2023-11-30 06:04:59'),
(286, 'en', 'Unit Availability', 'Unit Availability', '2023-11-30 06:07:13', '2023-11-30 06:07:13'),
(287, 'ar', 'Unit Availability', 'توفر الوحدة', '2023-11-30 06:07:27', '2023-11-30 06:07:27'),
(288, 'en', 'Unit Section', 'Unit Section', '2023-11-30 06:07:51', '2023-11-30 06:07:51'),
(289, 'ar', 'Unit Section', 'قسم الوحدة', '2023-11-30 06:08:01', '2023-11-30 06:08:01'),
(290, 'en', 'Unit Type', 'Unit Type', '2023-11-30 06:08:20', '2023-11-30 06:08:20'),
(291, 'ar', 'Unit Type', 'نوع الوحدة', '2023-11-30 06:08:47', '2023-11-30 06:08:47'),
(292, 'en', 'Task Type', 'Task Type', '2023-11-30 06:09:04', '2023-11-30 06:09:04'),
(293, 'ar', 'Task Type', 'نوع المهمة', '2023-11-30 06:09:22', '2023-11-30 06:09:22'),
(294, 'en', 'Task Level', 'Task Level', '2023-11-30 06:10:48', '2023-11-30 06:10:48'),
(295, 'ar', 'Task Level', 'مستوى المهمة', '2023-11-30 06:11:06', '2023-11-30 06:11:06'),
(296, 'en', 'Task Status', 'Task Status', '2023-11-30 06:11:25', '2023-11-30 06:11:25'),
(297, 'ar', 'Task Status', 'حالة المهمة', '2023-11-30 06:11:41', '2023-11-30 06:11:41'),
(298, 'en', 'Reasons for leave', 'Reasons for leave', '2023-11-30 06:12:01', '2023-11-30 06:12:01'),
(299, 'ar', 'Reasons for leave', 'أسباب الإجازة', '2023-11-30 06:12:29', '2023-11-30 06:12:29'),
(300, 'en', 'Cities / Areas', 'Cities / Areas', '2023-11-30 06:13:17', '2023-11-30 06:13:17'),
(301, 'ar', 'Cities / Areas', 'المدن / المناطق', '2023-11-30 06:14:48', '2023-11-30 06:14:48'),
(302, 'en', 'Mobile App Settings', 'Mobile App Settings', '2023-11-30 06:15:28', '2023-11-30 06:15:28'),
(303, 'ar', 'Mobile App Settings', 'إعدادات تطبيق الجوال', '2023-11-30 06:15:56', '2023-11-30 06:15:56'),
(304, 'en', 'Country', 'Country', '2023-11-30 06:26:22', '2023-11-30 06:26:22'),
(306, 'ar', 'Country', 'الدولة', '2023-11-30 06:27:14', '2023-11-30 06:27:14'),
(307, 'en', 'City', 'City', '2023-11-30 06:27:36', '2023-11-30 06:27:36'),
(308, 'ar', 'City', 'المدينة', '2023-11-30 06:27:55', '2023-11-30 06:27:55'),
(309, 'en', 'Area', 'Area', '2023-11-30 06:28:08', '2023-11-30 06:28:08'),
(310, 'ar', 'Area', 'المنطقة', '2023-11-30 06:28:29', '2023-11-30 06:28:29'),
(311, 'en', 'Controls', 'Controls', '2023-11-30 06:29:19', '2023-11-30 06:29:19'),
(312, 'ar', 'Controls', 'التحكم', '2023-11-30 06:29:32', '2023-11-30 06:29:32'),
(313, 'en', 'Actions', 'Actions', '2023-11-30 06:29:55', '2023-11-30 06:29:55'),
(314, 'ar', 'Actions', 'التحكم', '2023-11-30 06:30:08', '2023-11-30 06:30:08'),
(315, 'en', 'Translation', 'Translation', '2023-11-30 06:30:42', '2023-11-30 06:30:42'),
(316, 'ar', 'Translation', 'الترجمة', '2023-11-30 06:30:59', '2023-11-30 06:30:59'),
(317, 'en', 'Tenants', 'Tenants', '2023-11-30 06:32:21', '2023-11-30 06:32:21'),
(318, 'ar', 'Tenants', 'المستأجرين', '2023-11-30 06:32:34', '2023-11-30 06:32:34'),
(319, 'en', 'New Tenant', 'New Tenant', '2023-11-30 06:32:53', '2023-11-30 06:32:53'),
(320, 'ar', 'New Tenant', 'إضافة مستأجر', '2023-11-30 06:33:10', '2023-11-30 06:33:10'),
(321, 'en', 'Expenses', 'Expenses', '2023-11-30 06:34:09', '2023-11-30 06:34:09'),
(322, 'ar', 'Expenses', 'النفقات', '2023-11-30 06:34:17', '2023-11-30 06:34:17'),
(323, 'ar', 'Revenue', 'الإيرادات / الربح', '2023-11-30 06:35:16', '2023-11-30 06:35:16'),
(324, 'en', 'Profit', 'Profit', '2023-11-30 06:35:45', '2023-11-30 06:35:45'),
(325, 'ar', 'Profit', 'الربح', '2023-11-30 06:35:54', '2023-11-30 06:35:54'),
(326, 'en', 'Revenue Type', 'Revenue Type', '2023-11-30 06:37:05', '2023-11-30 06:37:05'),
(327, 'ar', 'Revenue Type', 'نوع الإيرادات', '2023-11-30 06:37:29', '2023-11-30 06:37:29'),
(328, 'en', 'Expenses Type', 'Expenses Type', '2023-11-30 06:37:44', '2023-11-30 06:37:44'),
(329, 'ar', 'Expenses Type', 'نوع النفقات / المصاريف', '2023-11-30 06:38:26', '2023-11-30 06:38:26'),
(330, 'en', 'Commission', 'Commission', '2023-11-30 06:39:21', '2023-11-30 06:39:21'),
(331, 'ar', 'Commission', 'عمولة', '2023-11-30 06:39:34', '2023-11-30 06:39:34'),
(332, 'en', 'Reports', 'Reports', '2023-11-30 06:39:51', '2023-11-30 06:39:51'),
(333, 'ar', 'Reports', 'تقارير', '2023-11-30 06:39:59', '2023-11-30 06:39:59'),
(334, 'ar', 'Finance', 'التمويل / الماليات', '2023-11-30 06:41:00', '2023-11-30 06:41:00'),
(335, 'en', 'Finance', 'Finance', '2023-11-30 06:51:59', '2023-11-30 06:51:59'),
(336, 'en', 'Finance Report', 'Finance Report', '2023-11-30 06:53:52', '2023-11-30 06:53:52'),
(337, 'ar', 'Finance Report', 'تقرير المالية', '2023-11-30 06:54:08', '2023-11-30 06:54:08'),
(338, 'en', 'Profit Report', 'Profit Report', '2023-11-30 06:54:47', '2023-11-30 06:54:47'),
(339, 'ar', 'Profit Report', 'تقرير الربح', '2023-11-30 06:55:03', '2023-11-30 06:55:03'),
(340, 'en', 'Employee Report', 'Employee Report', '2023-11-30 06:55:23', '2023-11-30 06:55:23'),
(341, 'ar', 'Employee Report', 'تقرير الموظف', '2023-11-30 06:55:33', '2023-11-30 06:55:33'),
(342, 'en', 'Finance Requests', 'Finance Requests', '2023-11-30 06:56:18', '2023-11-30 06:56:18'),
(343, 'ar', 'Finance Requests', 'طلبات المالية', '2023-11-30 06:56:40', '2023-11-30 06:56:40'),
(344, 'en', 'Employee Commission Report', 'Employee Commission Report', '2023-11-30 06:58:44', '2023-11-30 06:58:44'),
(345, 'ar', 'Employee Commission Report', 'تقرير عمولة الموظف', '2023-11-30 06:58:58', '2023-11-30 06:58:58'),
(346, 'ar', 'Employee Commission Report', 'تقرير عمولة الموظف', '2023-11-30 06:59:11', '2023-11-30 06:59:11'),
(347, 'en', 'Dashboard Requests', 'Dashboard Requests', '2023-11-30 07:00:07', '2023-11-30 07:00:07'),
(348, 'ar', 'Dashboard Requests', 'طلبات لوحة التحكم', '2023-11-30 07:00:21', '2023-11-30 07:00:21'),
(349, 'en', 'Website Requests', 'Website Requests', '2023-11-30 07:00:43', '2023-11-30 07:00:43'),
(350, 'ar', 'Website Requests', 'طلبات الموقع', '2023-11-30 07:07:52', '2023-11-30 07:07:52'),
(351, 'en', 'Mobile Requests', 'Mobile Requests', '2023-11-30 07:08:46', '2023-11-30 07:08:46'),
(352, 'ar', 'Mobile Requests', 'طلبات التطبيق', '2023-11-30 07:09:05', '2023-11-30 07:09:05'),
(353, 'en', 'Archived Requests', 'Archived Requests', '2023-11-30 07:10:18', '2023-11-30 07:10:18'),
(354, 'ar', 'Archived Requests', 'طلبات مؤرشفة', '2023-11-30 07:10:41', '2023-11-30 07:10:41'),
(355, 'en', 'Clear Cache', 'Clear Cache', '2023-11-30 07:12:04', '2023-11-30 07:12:04'),
(356, 'ar', 'Clear Cache', 'مسح ذاكرة التخزين المؤقت', '2023-11-30 07:12:17', '2023-11-30 07:12:17'),
(357, 'en', 'Unit Groups', 'Unit Groups', '2023-11-30 07:13:03', '2023-11-30 07:13:03'),
(358, 'ar', 'Unit Groups', 'مجموعات الوحدة', '2023-11-30 07:13:16', '2023-11-30 07:13:16'),
(359, 'en', 'New Unit Group', 'New Unit Group', '2023-11-30 07:14:20', '2023-11-30 07:14:20'),
(360, 'ar', 'New Unit Group', 'إضافة مجموعة  الوحدة', '2023-11-30 07:14:51', '2023-11-30 07:14:51'),
(361, 'en', 'FAQs', 'FAQs', '2023-11-30 07:15:55', '2023-11-30 07:15:55'),
(362, 'ar', 'FAQs', 'الأسئلة الشائعة', '2023-11-30 07:16:07', '2023-11-30 07:16:07'),
(363, 'en', 'Pages', 'Pages', '2023-11-30 07:16:22', '2023-11-30 07:16:22'),
(364, 'ar', 'Pages', 'الصفحات', '2023-11-30 07:16:31', '2023-11-30 07:16:31'),
(365, 'en', 'About Us', 'About Us', '2023-11-30 07:17:37', '2023-11-30 07:17:37'),
(366, 'ar', 'About Us', 'معلومات عنا', '2023-11-30 07:17:45', '2023-11-30 07:17:45'),
(367, 'en', 'Home Section', 'Home Section', '2023-11-30 07:21:09', '2023-11-30 07:21:09'),
(368, 'ar', 'Home Section', 'الصفحة الرئيسية', '2023-11-30 07:21:26', '2023-11-30 07:21:26'),
(369, 'en', 'Sliders Section', 'Sliders Section', '2023-11-30 07:23:55', '2023-11-30 07:23:55'),
(370, 'ar', 'Sliders Section', 'الصور المتحركة', '2023-11-30 07:24:21', '2023-11-30 07:24:21'),
(371, 'en', 'Testimonials Section', 'Testimonials Section', '2023-11-30 07:25:19', '2023-11-30 07:25:19'),
(372, 'ar', 'Testimonials Section', 'التوصيات / التقيمات', '2023-11-30 07:25:57', '2023-11-30 07:25:57'),
(373, 'en', 'Footer', 'Footer', '2023-11-30 07:26:40', '2023-11-30 07:26:40'),
(374, 'en', 'Footer Links', 'Footer Links', '2023-11-30 07:27:17', '2023-11-30 07:27:17'),
(375, 'en', 'Social Media', 'Social Media', '2023-11-30 07:27:33', '2023-11-30 07:27:33'),
(376, 'ar', 'Social Media', 'وسائل التواصل الأجتماعي', '2023-11-30 07:27:53', '2023-11-30 07:27:53'),
(377, 'en', 'Footer', 'Footer', '2023-11-30 07:28:28', '2023-11-30 07:28:55'),
(378, 'ar', 'Footer Links', 'روابط الموقع', '2023-11-30 07:30:05', '2023-11-30 07:30:05'),
(379, 'ar', 'Footer', 'فوتر الموقع', '2023-11-30 07:30:17', '2023-11-30 07:30:17'),
(380, 'en', 'Our Team Section', 'Our Team Section', '2023-11-30 07:31:00', '2023-11-30 07:31:00'),
(381, 'ar', 'Our Team Section', 'أعضاء الفريق', '2023-11-30 07:31:54', '2023-11-30 07:31:54'),
(382, 'en', 'About Section', 'About Section', '2023-11-30 07:32:36', '2023-11-30 07:32:36'),
(383, 'ar', 'About Section', 'معلومات عنا', '2023-11-30 07:32:48', '2023-11-30 07:32:48'),
(384, 'en', 'Why Choose Elite', 'Why Choose Elite', '2023-11-30 07:33:06', '2023-11-30 07:33:06'),
(385, 'ar', 'Why Choose Elite', 'لماذا تختار Elite', '2023-11-30 07:33:38', '2023-11-30 07:33:38'),
(386, 'en', 'Create New User', 'Create New User', '2023-11-30 07:34:54', '2023-11-30 07:34:54'),
(387, 'ar', 'Create New User', 'إضافة مستخدم جديد', '2023-11-30 07:35:09', '2023-11-30 07:35:09'),
(388, 'en', 'Email Address', 'Email Address', '2023-11-30 07:35:47', '2023-11-30 07:35:47'),
(389, 'ar', 'Email Address', 'البريد الإلكتروني', '2023-11-30 07:35:54', '2023-11-30 07:35:54'),
(390, 'en', 'Edit User Data', 'Edit User Data', '2023-11-30 07:36:30', '2023-11-30 07:36:30'),
(391, 'ar', 'Edit User Data', 'تعديل بيانات المستخدم', '2023-11-30 07:36:47', '2023-11-30 07:36:47'),
(392, 'en', 'Data', 'Data', '2023-11-30 07:37:02', '2023-11-30 07:37:02'),
(393, 'ar', 'Data', 'بيانات', '2023-11-30 07:37:10', '2023-11-30 07:37:10'),
(394, 'en', 'Select Role', 'Select Role', '2023-11-30 07:37:31', '2023-11-30 07:37:31'),
(395, 'ar', 'Select Role', 'الادوار', '2023-11-30 07:37:51', '2023-11-30 07:37:51'),
(396, 'en', 'Cancel', 'Cancel', '2023-11-30 07:38:21', '2023-11-30 07:38:21'),
(397, 'ar', 'Cancel', 'إلغاء', '2023-11-30 07:38:32', '2023-11-30 07:38:32'),
(398, 'en', 'Back', 'Back', '2023-11-30 07:38:46', '2023-11-30 07:38:46'),
(399, 'ar', 'Back', 'الرجوع', '2023-11-30 07:38:54', '2023-11-30 07:38:54'),
(400, 'en', 'Back To Dashboard', 'Back To Dashboard', '2023-11-30 07:39:20', '2023-11-30 07:39:20'),
(401, 'ar', 'Back To Dashboard', 'العودة للوحة التحكم', '2023-11-30 07:39:44', '2023-11-30 07:39:44'),
(402, 'en', 'Create New Employee', 'Create New Employee', '2023-11-30 07:43:20', '2023-11-30 07:43:20'),
(403, 'ar', 'Create New Employee', 'إضافة موظف جديد', '2023-11-30 07:43:41', '2023-11-30 07:43:41'),
(404, 'en', 'Salary', 'Salary', '2023-11-30 07:44:06', '2023-11-30 07:44:06'),
(405, 'ar', 'Salary', 'الراتب', '2023-11-30 07:44:14', '2023-11-30 07:44:14'),
(406, 'en', 'Departments', 'Departments', '2023-11-30 07:44:27', '2023-11-30 07:44:27'),
(407, 'ar', 'Departments', 'الاقسام', '2023-11-30 07:44:35', '2023-11-30 07:44:35'),
(408, 'en', 'Avatar', 'Avatar', '2023-11-30 07:45:12', '2023-11-30 07:45:12'),
(409, 'ar', 'Avatar', 'الصورة', '2023-11-30 07:45:25', '2023-11-30 07:45:25'),
(410, 'en', 'Mobile Number', 'Mobile Number', '2023-11-30 07:45:44', '2023-11-30 07:45:44'),
(411, 'ar', 'Mobile Number', 'رقم الجوال', '2023-11-30 07:45:55', '2023-11-30 07:45:55'),
(412, 'en', 'Address', 'Address', '2023-11-30 07:46:12', '2023-11-30 07:46:12'),
(413, 'ar', 'Address', 'العنوان', '2023-11-30 07:46:21', '2023-11-30 07:46:21'),
(414, 'en', 'Notes', 'Notes', '2023-11-30 07:47:09', '2023-11-30 07:47:09'),
(415, 'ar', 'Notes', 'ملاحظات', '2023-11-30 07:47:22', '2023-11-30 07:47:22'),
(416, 'en', 'Create New Vendor', 'Create New Vendor', '2023-11-30 07:52:35', '2023-11-30 07:52:35'),
(417, 'ar', 'Create New Vendor', 'إضافة بائع جديد', '2023-11-30 07:52:57', '2023-11-30 07:52:57'),
(418, 'en', 'Email', 'Email', '2023-11-30 07:54:58', '2023-11-30 07:54:58'),
(419, 'ar', 'Email', 'البريد الإلكتروني', '2023-11-30 07:55:20', '2023-11-30 07:55:20'),
(420, 'en', 'Mobile', 'Mobile', '2023-11-30 07:55:54', '2023-11-30 07:55:54'),
(421, 'ar', 'Mobile', 'الهاتف', '2023-11-30 07:56:07', '2023-11-30 07:56:07'),
(422, 'en', 'Edit Vendor', 'Edit Vendor', '2023-11-30 07:58:05', '2023-11-30 07:58:05'),
(423, 'ar', 'Edit Vendor', 'تعديل بيانات البائع', '2023-11-30 07:58:21', '2023-11-30 07:58:21'),
(424, 'en', 'Received At', 'Received At', '2023-11-30 07:59:14', '2023-11-30 07:59:14'),
(425, 'ar', 'Received At', 'تاريخ الإستلام', '2023-11-30 07:59:59', '2023-11-30 07:59:59'),
(426, 'en', 'Document', 'Document', '2023-11-30 08:00:47', '2023-11-30 08:00:47'),
(427, 'ar', 'Document', 'ملف', '2023-11-30 08:00:54', '2023-11-30 08:00:54'),
(428, 'en', 'Vendor Documents', 'Vendor Documents', '2023-11-30 08:01:17', '2023-11-30 08:01:17'),
(429, 'ar', 'Vendor Documents', 'ملفات البائع', '2023-11-30 08:01:30', '2023-11-30 08:01:30'),
(430, 'en', 'File Path', 'File Path', '2023-11-30 08:04:43', '2023-11-30 08:04:43'),
(431, 'ar', 'File Path', 'مسار الملف', '2023-11-30 08:04:56', '2023-11-30 08:04:56'),
(432, 'en', 'Create New Vendor Request', 'Create New Vendor Request', '2023-11-30 08:08:51', '2023-11-30 08:08:51'),
(433, 'ar', 'Create New Vendor Request', 'إنشاء طلب بائع جديد', '2023-11-30 08:09:01', '2023-11-30 08:09:01'),
(434, 'en', 'Close', 'Close', '2023-11-30 08:10:59', '2023-11-30 08:11:19'),
(435, 'ar', 'Close', 'إلغاء', '2023-11-30 08:11:37', '2023-11-30 08:11:37'),
(436, 'en', 'Reject Vendor Request', 'Reject Vendor Request', '2023-11-30 08:11:48', '2023-11-30 08:11:48'),
(437, 'ar', 'Reject Vendor Request', 'رفض طلب البائع', '2023-11-30 08:12:09', '2023-11-30 08:12:09'),
(438, 'en', 'Cities', 'Cities', '2023-11-30 08:13:02', '2023-11-30 08:13:02'),
(439, 'ar', 'Countries', 'الدول', '2023-11-30 08:13:21', '2023-11-30 08:13:21'),
(440, 'ar', 'Cities', 'المدن', '2023-11-30 08:13:43', '2023-11-30 08:13:43'),
(441, 'en', 'Countries', 'Countries', '2023-11-30 08:14:21', '2023-11-30 08:14:21'),
(442, 'en', 'Areas', 'Areas', '2023-11-30 08:15:19', '2023-11-30 08:15:19'),
(443, 'ar', 'Areas', 'المناطق', '2023-11-30 08:15:33', '2023-11-30 08:15:33'),
(444, 'en', 'Unit Sections', 'Unit Sections', '2023-11-30 08:15:58', '2023-11-30 08:15:58'),
(445, 'ar', 'Unit Sections', 'اقسام الوحدات', '2023-11-30 08:16:14', '2023-11-30 08:16:14'),
(446, 'en', 'Unit Types', 'Unit Types', '2023-11-30 08:16:29', '2023-11-30 08:16:29'),
(447, 'ar', 'Unit Types', 'انواع الوحدات', '2023-11-30 08:16:40', '2023-11-30 08:16:40'),
(448, 'ar', 'Add New Translation', 'إضافة ترجمة جديدة', '2023-11-30 08:17:05', '2023-11-30 08:17:05'),
(449, 'en', 'Add New Translation', 'Add New Translation', '2023-11-30 08:17:15', '2023-11-30 08:17:15'),
(450, 'en', 'Statistics', 'Statistics', '2023-11-30 08:17:40', '2023-11-30 08:17:40'),
(451, 'ar', 'Statistics', 'الإحصائيات', '2023-11-30 08:17:57', '2023-11-30 08:17:57'),
(452, 'en', 'Logout', 'Logout', '2023-11-30 08:18:33', '2023-11-30 08:18:33'),
(453, 'ar', 'Logout', 'تسجيل الخروج', '2023-11-30 08:18:51', '2023-11-30 08:18:51'),
(454, 'en', 'Profile', 'Profile', '2023-11-30 08:19:32', '2023-11-30 08:19:32'),
(455, 'ar', 'Profile', 'الحساب الشخصي', '2023-11-30 08:19:42', '2023-11-30 08:19:42'),
(456, 'en', 'MENU', 'MENU', '2023-11-30 08:20:00', '2023-11-30 08:20:00'),
(457, 'ar', 'MENU', 'القائمة', '2023-11-30 08:20:09', '2023-11-30 08:20:09'),
(458, 'ar', 'My Requests', 'طلباتي', '2023-11-30 23:21:14', '2023-11-30 23:21:14'),
(459, 'en', 'My Requests', 'My Requests', '2023-11-30 23:21:21', '2023-11-30 23:21:21'),
(460, 'ar', 'Date', 'التاريخ', '2023-11-30 23:41:03', '2023-11-30 23:41:03'),
(461, 'en', 'Date', 'Date', '2023-11-30 23:41:26', '2023-11-30 23:41:26'),
(462, 'en', 'Create New Task', 'Create New Task', '2023-11-30 23:42:18', '2023-11-30 23:42:18'),
(463, 'ar', 'Create New Task', 'إضافة مهمة جديدة', '2023-11-30 23:42:44', '2023-11-30 23:42:44'),
(464, 'ar', 'Task Details', 'تفاصيل المهمة', '2023-11-30 23:47:52', '2023-11-30 23:47:52'),
(465, 'en', 'Task Details', 'Task Details', '2023-11-30 23:48:01', '2023-11-30 23:48:01'),
(466, 'en', 'Task Replies', 'Task Replies', '2023-11-30 23:48:25', '2023-11-30 23:48:25'),
(467, 'ar', 'Task Replies', 'ردود المهمة', '2023-11-30 23:49:04', '2023-11-30 23:49:04'),
(468, 'en', 'Task Files', 'Task Files', '2023-11-30 23:49:53', '2023-11-30 23:49:53'),
(469, 'ar', 'Task Files', 'ملفات المهمة', '2023-11-30 23:50:12', '2023-11-30 23:50:12'),
(470, 'ar', 'File', 'ملف', '2023-11-30 23:52:47', '2023-11-30 23:52:47'),
(471, 'en', 'File', 'File', '2023-11-30 23:52:59', '2023-11-30 23:52:59'),
(472, 'en', 'Content', 'Content', '2023-11-30 23:53:19', '2023-11-30 23:53:19'),
(473, 'ar', 'Content', 'المحتوى', '2023-11-30 23:53:21', '2023-11-30 23:53:21'),
(474, 'ar', 'Created At', 'تاريخ الاضافة', '2023-11-30 23:54:20', '2023-11-30 23:54:20'),
(475, 'en', 'Created At', 'Created At', '2023-11-30 23:54:26', '2023-11-30 23:54:26'),
(476, 'ar', 'Created By', 'بواسطة', '2023-11-30 23:55:08', '2023-11-30 23:55:08'),
(477, 'en', 'Created By', 'Created By', '2023-11-30 23:55:25', '2023-11-30 23:55:25'),
(478, 'ar', 'Assign To', 'إلى', '2023-11-30 23:59:40', '2023-11-30 23:59:40'),
(479, 'en', 'Assign To', 'Assign To', '2023-11-30 23:59:52', '2023-11-30 23:59:52'),
(480, 'ar', 'Add', 'إضافة', '2023-12-01 00:05:28', '2023-12-01 00:05:28'),
(481, 'en', 'Add', 'Add', '2023-12-01 00:05:40', '2023-12-01 00:05:40'),
(482, 'ar', 'Reply', 'الرد', '2023-12-01 00:09:26', '2023-12-01 00:09:26'),
(483, 'en', 'Reply', 'Reply', '2023-12-01 00:09:41', '2023-12-01 00:09:41'),
(484, 'ar', 'Task Files', 'ملفات المهمة', '2023-12-01 00:23:06', '2023-12-01 00:23:06'),
(485, 'en', 'Task Files', 'Task Files', '2023-12-01 00:23:13', '2023-12-01 00:23:13'),
(486, 'en', 'Search', 'Search', '2023-12-01 04:25:34', '2023-12-01 04:25:34'),
(487, 'ar', 'Search', 'بحث', '2023-12-01 04:26:03', '2023-12-01 04:26:03'),
(488, 'ar', 'Services', 'الخدمات', '2023-12-19 12:52:18', '2023-12-19 12:52:18'),
(489, 'ar', 'Price', 'السعر', '2023-12-19 12:52:30', '2023-12-19 12:52:30'),
(490, 'ar', 'New Service', 'خدمة جديدة', '2023-12-19 12:52:47', '2023-12-19 12:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `main_settings`
--

CREATE TABLE `main_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `scripts` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_settings`
--

INSERT INTO `main_settings` (`id`, `logo`, `favicon`, `email`, `mobile`, `scripts`, `created_at`, `updated_at`) VALUES
(3, 'storage/uploads/settings/New Project9356_1706279120.png', 'storage/uploads/settings/New Project6709_1706279120.png', 'admin@virallify.com', '123456789', NULL, '2022-12-14 11:26:59', '2024-01-26 12:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `main_setting_translations`
--

CREATE TABLE `main_setting_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_setting_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_content` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_setting_translations`
--

INSERT INTO `main_setting_translations` (`id`, `main_setting_id`, `locale`, `name`, `content`, `address`, `meta_title`, `meta_content`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(5, 3, 'en', 'Virallify', NULL, 'Elite Home', 'Elite Home', 'Elite Home', 'Elite Home', NULL, NULL),
(6, 3, 'ar', 'Virallify', NULL, 'Elite Home', 'Elite Home', 'Elite Home', 'Elite Home', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_06_06_164338_create_pages_table', 1),
(6, '2020_06_10_121941_create_main_settings_table', 1),
(7, '2020_07_04_001558_create_language_translates_table', 1),
(8, '2020_07_24_202112_create_blogs_table', 1),
(9, '2022_02_14_121409_create_contacts_table', 1),
(10, '2022_04_03_183434_create_testimonial_table', 1),
(11, '2022_04_04_195644_create_newsletter_subscriber_table', 1),
(12, '2022_10_07_184922_create_social_media_table', 1),
(13, '2022_12_14_121048_create_blog_translations_table', 1),
(14, '2022_12_14_122322_create_main_setting_translations_table', 1),
(15, '2022_12_14_123132_create_page_translations_table', 1),
(16, '2022_12_14_125405_create_permission_tables', 2),
(17, '2022_12_17_111151_create_price_list_table', 3),
(18, '2022_12_17_111205_create_price_list_translations_table', 3),
(19, '2022_12_18_013605_create_services_table', 4),
(20, '2022_12_18_013658_create_service_translations_table', 4),
(23, '2022_12_18_022625_create_portfolios_table', 5),
(24, '2022_12_18_022633_create_portfolio_translations_table', 5),
(25, '2022_12_18_024759_create_service_price_list_table', 6),
(29, '2022_12_18_072403_create_question_table', 7),
(30, '2022_12_18_072422_create_question_translations_table', 7),
(31, '2022_12_18_102536_create_why_ocoda_table', 8),
(32, '2022_12_18_102554_create_why_ocoda_translations_table', 8),
(33, '2022_12_18_115650_create_clients_table', 8),
(34, '2022_12_18_121222_create_clients_translations_table', 8),
(35, '2022_12_19_112952_create_langauges_table', 8),
(36, '2022_12_20_112628_create_sections_table', 9),
(37, '2022_12_20_112717_create_section_translations_table', 9),
(38, '2022_12_21_132358_create_whysections_table', 10),
(39, '2022_12_21_132412_create_whysection_translations_table', 10),
(40, '2022_12_22_093852_create_gallery_table', 11),
(41, '2022_12_22_093908_create_gallery_translations_table', 11),
(42, '2022_12_22_110257_create_menus_table', 12),
(43, '2022_12_22_142053_create_menu_translations_table', 13),
(44, '2022_12_28_142042_create_breadcrumbs_table', 14),
(45, '2022_12_28_142424_create_breadcrumb_translations_table', 14),
(46, '2023_01_01_122823_create_static_banner_table', 15),
(47, '2023_01_01_122840_create_static_banner_translations_table', 15),
(48, '2023_01_01_130409_create_footer_table', 15),
(49, '2023_01_01_130426_create_footer_translations_table', 15),
(50, '2023_01_01_130920_create_footer_link_table', 15),
(51, '2023_01_01_130932_create_footer_link_translations_table', 15),
(52, '2023_01_12_144728_create_technologies_table', 16),
(53, '2023_02_04_105913_alter_slug_to_service_translations', 17),
(54, '2023_03_21_153937_create_landing_pages_table', 18),
(55, '2023_03_21_154111_create_landing_page_translations_table', 18),
(56, '2023_03_22_014558_create_landing_banners_table', 19),
(57, '2023_03_22_032022_create_landing_banner_translations_table', 19),
(58, '2023_03_22_040807_create_landing_services_table', 20),
(59, '2023_03_22_040820_create_landing_service_translations_table', 20),
(61, '2023_03_22_071616_create_testimonials_table', 21),
(62, '2023_03_22_071806_create_testimonial_translations_table', 21),
(63, '2023_03_22_113905_create_landing_contacts_table', 22),
(64, '2023_07_30_135415_create_seos_table', 23),
(65, '2023_07_30_135704_create_seo_translations_table', 23),
(66, '2023_08_14_145337_create_service_gallery_table', 24),
(67, '2023_08_14_150516_alter_content_to_gallery_translations', 25),
(68, '2023_06_10_121941_create_countries_table', 26),
(69, '2023_12_14_122322_create_countries_translations_table', 26),
(70, '2023_12_14_122322_create_country_translations_table', 27),
(71, '2023_06_10_121941_create_country_translates_table', 28),
(72, '2023_05_10_121941_create_departments_table', 29),
(73, '2023_06_10_121941_create_departments_table', 30),
(74, '2020_06_10_121941_create_departments_table', 31),
(75, '2022_12_14_122322_create_department_translations_table', 31),
(76, '2020_06_10_121941_create_unit_availabilities_table', 32),
(77, '2021_06_10_121942_create_unit_availabilities_table', 33),
(78, '2023_12_14_122322_create_unit_availability_translations_table', 33),
(79, '2022_06_10_121945_create_unit_availabilities_table', 34),
(80, '2021_06_10_121955_create_unit_availabilities_table', 35),
(81, '2023_10_15_122345_create_unit_availability_translations_table', 35),
(82, '2021_07_10_122955_create_unit_availabilities_table', 36),
(83, '2023_11_16_132345_create_unit_availability_translations_table', 36),
(84, '2022_10_10_132955_create_unit_sections_table', 37),
(85, '2023_12_18_132350_create_unit_section_translations_table', 37),
(86, '2022_10_10_132955_create_unit_types_table', 38),
(87, '2023_12_18_132350_create_unit_type_translations_table', 38),
(88, '2022_12_12_132955_create_client_types_table', 39),
(89, '2023_11_20_132350_create_client_type_translations_table', 39),
(90, '2022_10_11_133955_create_governorates_table', 40),
(91, '2023_12_20_143350_create_governorate_translations_table', 40),
(92, '2022_10_10_132955_create_expenses_types_table', 41),
(93, '2023_12_18_132350_create_expenses_type_translations_table', 42),
(94, '2022_12_12_136655_create_revenue_types_table', 43),
(95, '2023_11_15_132350_create_revenue_type_translations_table', 43),
(96, '2022_10_10_132955_create_employees_table', 44),
(97, '2023_12_10_132955_create_employees_table', 45),
(98, '2020_06_10_121941_create_department_user_table', 46),
(99, '2023_06_10_121941_create_cities_table', 47),
(100, '2023_06_10_121941_create_city_translates_table', 47),
(101, '2023_06_10_121941_create_task_statuses_table', 47),
(102, '2023_06_12_121941_create_task_status_translates_table', 47),
(103, '2023_06_10_121941_create_task_levels_table', 48),
(104, '2023_06_10_121941_create_task_types_table', 48),
(105, '2023_06_12_121941_create_task_level_translates_table', 48),
(106, '2023_06_12_121941_create_task_type_translates_table', 48),
(107, '2023_06_10_121941_create_tasks_table', 49),
(108, '2023_06_10_121941_create_task_files_table', 50),
(109, '2023_06_10_121941_create_task_replies_table', 51),
(110, '2014_10_12_000000_create_clients_table', 52),
(111, '2023_11_15_000000_create_clients_table', 53),
(112, '2022_10_10_000000_create_clients_table', 54),
(113, '2023_11_23_132955_create_client_phones_table', 54),
(114, '2023_12_15_000000_create_clients_table', 55),
(115, '2023_12_30_132955_create_client_phones_table', 56),
(116, '2023_12_17_000009_create_clients_table', 57),
(117, '2023_12_29_132955_create_client_phones_table', 57),
(118, '2021_9_9_000000_create_countries_table', 58),
(119, '2022_10_10_000000_create_cities_table', 58),
(120, '2023_11_11_000000_create_areas_table', 58),
(121, '2024_06_10_121941_create_task_files_table', 59),
(122, '2025_06_10_121941_create_task_replies_table', 60),
(123, '2021_10_10_000000_create_countries_table', 61),
(124, '2022_11_11_000000_create_cities_table', 61),
(125, '2023_12_12_000000_create_areas_table', 61),
(126, '2020_06_10_121941_create_mobile_settings_table', 62),
(127, '2023_11_11_132955_create_unit_sections_table', 63),
(128, '2023_12_22_155350_create_unit_section_translations_table', 63),
(129, '2023_12_12_121941_create_task_levels_table', 64),
(130, '2022_10_10_121940_create_task_levels_table', 65),
(131, '2023_11_15_121955_create_task_level_translates_table', 65),
(132, '2022_10_10_132955_create_slider_homepage_table', 66),
(133, '2023_12_18_132350_create_slider_homepage_translations_table', 66),
(134, '2023_10_10_132955_create_slider_homepage_table', 67),
(135, '2022_9_9_111111_create_slider_homepage_table', 68),
(136, '2023_12_12_132955_create_slider_homepage_translations_table', 68),
(137, '2022_9_9_222222_create_slider_homepage_table', 69),
(138, '2023_12_12_444444_create_slider_homepage_translations_table', 69),
(139, '2022_9_9_333333_create_homepage_sliders_table', 70),
(140, '2022_10_10_334333_create_homepage_sliders_table', 71),
(141, '2023_12_19_555655_create_homepage_slider_translations_table', 71),
(142, '2022_10_10_132955_create_homepage_sliders_table', 72),
(143, '2023_12_18_132350_create_homepage_slider_translations_table', 72),
(144, '2023_07_15_121941_create_task_statuses_table', 73),
(145, '2023_10_15_121941_create_task_status_translates_table', 73),
(146, '2022_10_10_132955_create_about_settings_table', 74),
(147, '2023_12_18_132350_create_about_setting_translations_table', 74),
(148, '2022_10_10_132955_create_our_team_table', 75),
(149, '2023_12_18_132350_create_our_team_translations_table', 75),
(150, '2022_10_10_132955_create_testimonials_table', 76),
(151, '2023_12_18_132350_create_testimonial_translations_table', 76),
(152, '2022_10_10_132955_create_choose_us_table', 77),
(153, '2022_11_11_135555_create_choose_us_table', 78),
(154, '2023_12_25_135350_create_choose_us_translations_table', 78),
(155, '2022_11_11_135555_create_choose_settings_table', 79),
(156, '2023_12_25_135350_create_choose_setting_translations_table', 79),
(157, '2022_11_11_135555_create_social_media_table', 80),
(158, '2022_10_10_132955_create_footer_table', 81),
(159, '2023_12_18_132350_create_footer_translations_table', 81),
(160, '2022_10_10_132955_create_footer_links_table', 82),
(161, '2023_12_18_132350_create_footer_link_translations_table', 82),
(162, '2022_11_11_000000_create_clients_table', 83),
(163, '2021_1_1_000000_create_client_types_table', 84),
(164, '2021_01_01_000000_create_client_types_table', 85),
(165, '2022_01_01_000000_create_clients_table', 85),
(166, '2023_01_01_000000_create_client_phones_table', 85),
(167, '2022_10_10_132955_create_contacts_table', 86),
(168, '2022_10_10_132955_create_faq_settings_table', 87),
(169, '2023_12_18_132350_create_faq_setting_translations_table', 87),
(170, '2022_10_10_132955_create_pages_table', 88),
(171, '2023_12_18_132350_create_page_translations_table', 88),
(172, '2021_08_10_121941_create_mobile_settings_table', 89),
(173, '2022_01_01_000000_create_employees_table', 90),
(174, '2022_01_01_000000_create_vendors_table', 90),
(175, '2023_09_16_192657_create_properties_table', 91),
(176, '2023_09_16_201554_create_unit_type_attributes_table', 91),
(177, '2023_09_16_224739_alter_unit_type_attributes', 91),
(178, '2023_12_12_000000_create_otps_table', 92),
(179, '2023_12_12_000000_create_attachments_table', 93),
(180, '2023_09_19_110455_create_properties_gallery_table', 94),
(181, '2023_12_12_111111_create_otps_table', 95),
(182, '2022_01_01_111111_create_clients_table', 96),
(183, '2022_01_01_222222_create_clients_table', 97),
(184, '2022_01_01_111111_create_vendor_requests_table', 98),
(185, '2022_01_01_222222_create_vendor_request_documents_table', 99),
(186, '2022_01_01_222222_create_vendor_requests_table', 100),
(187, '2023_12_12_111111_create_wishlists_table', 101),
(188, '2023_09_27_215902_create_property_translations_table', 102),
(189, '2023_09_28_165049_alter_add_data_properties', 102),
(190, '2023_09_28_165300_alter_add_flag_properties', 102),
(191, '2023_09_29_105401_create_properties_videos_table', 102),
(192, '2023_09_29_145839_alter_add_icon_unit_type_attributes', 102),
(193, '2022_10_10_132955_create_plans_table', 103),
(194, '2022_10_11_132966_create_property_plan_table', 103),
(195, '2023_12_18_132350_create_plan_translations_table', 103),
(196, '2022_10_10_132966_create_payments_table', 104),
(197, '2023_12_12_111111_create_appointments_table', 104),
(198, '2023_12_18_132377_create_payment_translations_table', 104),
(199, '2022_10_10_132977_create_payments_table', 105),
(200, '2023_12_18_132388_create_payment_translations_table', 105),
(201, '2023_10_18_130704_alter_add_isuser_clients', 106),
(202, '2021_10_10_111111_create_countries_table', 107),
(203, '2022_11_11_111111_create_cities_table', 107),
(204, '2023_12_12_111111_create_areas_table', 107),
(205, '2023_10_18_223545_create_properties_requests_table', 108),
(206, '2023_10_20_151544_create_properties_requests_notes_table', 108),
(207, '2023_10_21_160334_alter_add_mobile_users', 108),
(208, '2023_10_21_180850_alter_add_user_properties_requests_notes', 108),
(209, '2022_10_10_555888_create_payment_transactions_table', 109),
(210, '2022_10_10_555999_create_customers_subscriptions_table', 110),
(211, '2023_09_28_165017_alter_votes_to_table_name', 111),
(212, '2023_11_04_133903_create_propeties_requests_reminders_table', 111),
(213, '2022_12_12_555988_create_payment_transactions_table', 112),
(214, '2023_11_05_230951_alter_add_plan_properties', 113),
(215, '2022_10_10_132365_create_about_page_table', 114),
(216, '2022_10_10_132370_create_about_page_table', 115),
(217, '2023_11_09_035732_alter_add_plan_customers_subscriptions', 116),
(218, '2023_11_11_151455_alter_add_data_property_plan', 117),
(219, '2023_11_11_205837_create_properties_rent_table', 117),
(220, '2023_12_18_132350_create_expenses_table', 118),
(221, '2023_12_18_132350_create_revenues_table', 119),
(222, '2021_05_8_121940_create_reasons_table', 120),
(223, '2022_06_10_122322_create_reason_translations_table', 120),
(224, '2022_06_15_121945_create_hr_requests_table', 120),
(225, '2023_11_17_162213_create_finance_request_table', 120),
(226, '2023_11_18_144049_create_finance_request_notes_table', 120),
(227, '2023_11_18_144227_create_finance_request_reminders_table', 120),
(228, '2023_11_18_171612_create_property_request_gallery_table', 120),
(229, '2024_11_15_99_create_client_messages_table', 121),
(230, '2024_11_15_999_create_client_message_users_table', 121),
(231, '2019_02_06_174631_make_acl_rules_table', 122),
(232, '2022_06_16_121966_create_hr_requests_table', 122),
(233, '2023_11_14_224457_alter_add_data_properties_requests', 122),
(234, '2023_11_19_666666_create_properties_requests_table', 122),
(235, '2023_11_20_121422_alter_add_data_properties_requests', 122),
(236, '2023_11_25_214714_create_unit_groups_table', 122),
(237, '2023_11_25_220105_create_unit_group_translations_table', 122),
(238, '2023_11_25_223151_create_unit_group_properties_table', 122),
(239, '2024_12_12_777777_create_properties_rent_table', 122),
(240, '2023_11_26_234901_create_tenants_table', 123),
(241, '2023_11_27_012114_create_tenants_properties_table', 123),
(242, '2022_02_02_666999_create_vendors_table', 124),
(243, '2023_12_02_145851_create_tenants_properties_rents_table', 125),
(244, '2023_12_19_143727_create_services_table', 126),
(245, '2023_12_19_143810_create_service_translations_table', 127),
(246, '2023_12_19_150259_create_car_types_table', 128),
(247, '2023_12_19_150458_create_car_type_translations_table', 129),
(248, '2023_12_20_124842_create_clients_table', 130),
(249, '2023_12_20_131250_create_users_plans_table', 131),
(250, '2022_12_24_115434_create_users_addresses_table', 132),
(251, '2023_12_24_105402_create_orders_table', 133),
(252, '2023_12_31_102134_create_otps_table', 134),
(253, '2015_05_06_194030_create_youtube_access_tokens_table', 135);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 36),
(7, 'App\\Models\\User', 19),
(7, 'App\\Models\\User', 20),
(9, 'App\\Models\\User', 21),
(9, 'App\\Models\\User', 23),
(9, 'App\\Models\\User', 24),
(9, 'App\\Models\\User', 25),
(9, 'App\\Models\\User', 27),
(9, 'App\\Models\\User', 28),
(9, 'App\\Models\\User', 30),
(9, 'App\\Models\\User', 31),
(9, 'App\\Models\\User', 36),
(9, 'App\\Models\\User', 37),
(12, 'App\\Models\\User', 34),
(12, 'App\\Models\\User', 35),
(12, 'App\\Models\\User', 36),
(13, 'App\\Models\\User', 42);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `representative_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_time` time DEFAULT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_status` varchar(255) NOT NULL DEFAULT 'un paid',
  `total` varchar(255) DEFAULT NULL,
  `coupon` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `publish`, `image`, `slug`, `created_by`, `created_at`, `updated_at`) VALUES
(11, 1, 'storage/uploads/pages/23618327305_1704279878.jpg', 'about-us', NULL, '2024-01-03 09:04:38', '2024-01-03 09:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `title`, `content`, `created_at`, `updated_at`) VALUES
(21, 11, 'en', 'About us', '<p>aaa</p>', NULL, NULL),
(22, 11, 'ar', 'من نحن', '<p>من نحن</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `status`, `image`, `created_by`, `created_at`, `updated_at`) VALUES
(5, 1, 'storage/uploads/services/car8597_1702997404.png', NULL, '2023-12-19 12:50:04', '2023-12-19 12:50:04'),
(6, 1, 'storage/uploads/partners/New Project8425_1706372035.png', NULL, '2024-01-27 14:13:55', '2024-01-27 14:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `partner_translations`
--

CREATE TABLE `partner_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partner_translations`
--

INSERT INTO `partner_translations` (`id`, `partner_id`, `locale`, `name`, `content`, `created_at`, `updated_at`) VALUES
(8, 5, 'en', 'Montana Pennington', 'Sequi nulla assumend', NULL, NULL),
(9, 5, 'ar', 'Ronan Chase', 'Aliquip vero dolor d', NULL, NULL),
(10, 6, 'en', 'Home', NULL, NULL, NULL),
(11, 6, 'ar', 'الرئيسية', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(218, 'create_permissions', 'web', '2023-10-17 06:00:03', '2023-10-17 06:00:03'),
(219, 'update_permissions', 'web', '2023-10-17 06:00:03', '2023-10-17 06:00:03'),
(220, 'delete_permissions', 'web', '2023-10-17 06:00:03', '2023-10-17 06:00:03'),
(255, 'show_homepage_social_media', 'web', '2023-10-17 06:00:03', '2023-10-17 06:00:03'),
(256, 'update_homepage_social_media', 'web', '2023-10-17 06:00:03', '2023-10-17 06:00:03'),
(257, 'create_homepage_social_media', 'web', '2023-10-17 06:00:03', '2023-10-17 06:00:03'),
(258, 'delete_homepage_social_media', 'web', '2023-10-17 06:00:03', '2023-10-17 06:00:03'),
(269, 'show_pages', 'web', '2023-10-17 06:00:03', '2023-12-19 12:24:27'),
(270, 'update_pages', 'web', '2023-10-17 06:00:03', '2023-12-19 12:24:31'),
(271, 'create_pages', 'web', '2023-10-17 06:00:03', '2023-12-19 12:24:05'),
(272, 'delete_pages', 'web', '2023-10-17 06:00:03', '2023-12-19 12:24:23'),
(316, 'show_contact_messages', 'web', '2023-10-17 06:00:03', '2023-10-17 06:00:03'),
(319, 'show_users', 'web', '2023-11-13 15:57:01', '2023-11-13 15:57:01'),
(320, 'update_users', 'web', '2023-11-13 15:57:01', '2023-11-13 15:57:01'),
(321, 'create_users', 'web', '2023-11-13 15:57:01', '2023-11-13 15:57:01'),
(322, 'delete_users', 'web', '2023-11-13 15:57:01', '2023-11-13 15:57:01'),
(323, 'show_roles', 'web', '2023-11-13 15:57:01', '2023-11-13 15:57:01'),
(324, 'update_roles', 'web', '2023-11-13 15:57:01', '2023-11-13 15:57:01'),
(325, 'create_roles', 'web', '2023-11-13 15:57:01', '2023-11-13 15:57:01'),
(326, 'delete_roles', 'web', '2023-11-13 15:57:01', '2023-11-13 15:57:01'),
(327, 'show_permissions', 'web', '2023-11-13 15:57:01', '2023-11-13 15:57:01'),
(328, 'assign_permissions', 'web', '2023-11-13 15:57:01', '2023-11-13 15:57:01'),
(329, 'show_settings', 'web', '2023-11-13 15:57:01', '2023-11-13 15:57:01'),
(330, 'store_settings', 'web', '2023-11-13 15:57:01', '2023-11-13 15:57:01'),
(359, 'show_system_settings', 'web', '2023-11-20 22:36:51', '2023-11-20 22:36:51'),
(377, 'show_plans', 'web', '2023-12-19 12:19:54', '2023-12-19 12:19:54'),
(378, 'create_plans', 'web', '2023-12-19 12:19:58', '2023-12-19 12:19:58'),
(379, 'update_plans', 'web', '2023-12-19 12:20:03', '2023-12-19 12:20:03'),
(380, 'delete_plans', 'web', '2023-12-19 12:20:09', '2023-12-19 12:20:09'),
(381, 'create_services', 'web', '2023-12-19 12:40:00', '2023-12-19 12:40:00'),
(382, 'show_services', 'web', '2023-12-19 12:40:05', '2023-12-19 12:40:05'),
(383, 'update_services', 'web', '2023-12-19 12:40:10', '2023-12-19 12:40:10'),
(384, 'delete_services', 'web', '2023-12-19 12:40:16', '2023-12-19 12:40:16'),
(385, 'create_home_sections', 'web', '2023-12-19 13:06:13', '2023-12-19 13:06:13'),
(386, 'update_home_sections', 'web', '2023-12-19 13:06:20', '2023-12-19 13:06:20'),
(387, 'delete_home_sections', 'web', '2023-12-19 13:06:26', '2023-12-19 13:06:26'),
(388, 'show_home_sections', 'web', '2023-12-19 13:06:29', '2023-12-19 13:06:29'),
(389, 'verify_users', 'web', '2023-12-20 11:07:45', '2023-12-20 11:07:45'),
(390, 'active_users', 'web', '2023-12-20 11:07:48', '2023-12-20 11:07:48'),
(391, 'users_plans', 'web', '2023-12-21 11:12:01', '2023-12-21 11:12:01'),
(392, 'show_orders', 'web', '2023-12-24 10:46:57', '2023-12-24 10:46:57'),
(393, 'create_orders', 'web', '2023-12-24 10:47:02', '2023-12-24 10:47:02'),
(394, 'update_orders', 'web', '2023-12-24 10:47:07', '2023-12-24 10:47:07'),
(395, 'delete_orders', 'web', '2023-12-24 10:47:12', '2023-12-24 10:47:12'),
(396, 'create_sections', 'web', '2023-12-19 13:06:13', '2024-01-29 09:03:58'),
(397, 'update_sections', 'web', '2023-12-19 13:06:20', '2024-01-29 09:03:14'),
(398, 'delete_sections', 'web', '2023-12-19 13:06:26', '2024-01-29 09:03:07'),
(399, 'show_sections', 'web', '2023-12-19 13:06:29', '2024-01-29 09:03:00'),
(400, 'show_homepage_footer', 'web', '2023-10-17 06:00:03', '2023-10-17 06:00:03'),
(401, 'show_homepage_faqs', 'web', '2023-10-17 06:00:03', '2023-10-17 06:00:03'),
(402, 'create_partners', 'web', '2024-01-27 14:12:00', '2024-01-27 14:12:00'),
(403, 'show_partners', 'web', '2024-01-27 14:12:04', '2024-01-27 14:12:04'),
(404, 'delete_partners', 'web', '2024-01-27 14:12:08', '2024-01-27 14:12:08'),
(405, 'update_partners', 'web', '2024-01-27 14:12:12', '2024-01-27 14:12:12'),
(406, 'show_home_banner', 'web', '2024-01-27 14:26:42', '2024-01-27 14:26:42'),
(407, 'show_social_channel_media', 'web', '2024-03-14 15:34:35', '2024-03-14 15:34:35'),
(408, 'create_social_channel_media', 'web', '2024-03-14 15:34:41', '2024-03-14 15:34:41'),
(409, 'update_social_channel_media', 'web', '2024-03-14 15:34:46', '2024-03-14 15:34:46'),
(410, 'delete_social_channel_media', 'web', '2024-03-14 15:34:50', '2024-03-14 15:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'Clients\\Models\\Client', 19, 'MyApp', 'be6acd24bdbe69e4f1a155f3330d95c0b22ef724e021d00325a6e235b505f6b7', '[\"*\"]', NULL, NULL, '2023-09-18 07:31:35', '2023-09-18 07:31:35'),
(2, 'Clients\\Models\\Client', 19, 'MyApp', '8ee91f1d454f7a561df83e1b696087fbc80ac78f61279173ca802bddcfb70b77', '[\"*\"]', NULL, NULL, '2023-09-18 07:34:34', '2023-09-18 07:34:34'),
(3, 'Clients\\Models\\Client', 19, 'MyApp', '59c97be9ac8ad86789b0237297e2f73f4c90cb66124a4026abb2ae4d1127d10e', '[\"*\"]', NULL, NULL, '2023-09-18 07:42:55', '2023-09-18 07:42:55'),
(4, 'Clients\\Models\\Client', 20, 'MyApp', '54a0d090e74166e6880bee48156df8f174d7420aa49680edc64ddc32bb4bddfd', '[\"*\"]', NULL, NULL, '2023-09-18 08:01:28', '2023-09-18 08:01:28'),
(5, 'Clients\\Models\\Client', 20, 'MyApp', 'f1f8f84575fc8c416faab0a8f7093c2a261176f589c90532d57dcd9762a26016', '[\"*\"]', NULL, NULL, '2023-09-18 08:47:19', '2023-09-18 08:47:19'),
(6, 'Clients\\Models\\Client', 20, 'MyApp', 'ecd6cc256a5ff6bee37c96285c64cf1713a2ff6c227a65a4307212eb6947b969', '[\"*\"]', NULL, NULL, '2023-09-18 08:48:44', '2023-09-18 08:48:44'),
(7, 'Clients\\Models\\Client', 20, 'MyApp', 'a164ca5f84c48b28227216a2799752b1018a744f6a778767146bb7731996cf63', '[\"*\"]', NULL, NULL, '2023-09-18 08:49:26', '2023-09-18 08:49:26'),
(8, 'Clients\\Models\\Client', 20, 'MyApp', '1764fa5b7db87d374a2b2c4c0dcd3ffb12cee197a76fbab64ca65a58587d1fc2', '[\"*\"]', NULL, NULL, '2023-09-18 08:50:08', '2023-09-18 08:50:08'),
(9, 'Clients\\Models\\Client', 20, 'MyApp', '953ab4c989ebece4b61ee1d4df59b060ba54465a9f20f95d28ac54c69cbd0b09', '[\"*\"]', NULL, NULL, '2023-09-18 08:55:00', '2023-09-18 08:55:00'),
(10, 'Clients\\Models\\Client', 20, 'MyApp', 'b4cd3700abe5f5421c25697e5c2e314bc7148b8f3d5949628586810d30301d70', '[\"*\"]', NULL, NULL, '2023-09-18 08:55:54', '2023-09-18 08:55:54'),
(11, 'Clients\\Models\\Client', 20, 'MyApp', '1455980bfb58ec31cdbc4cf8981d5c384b1560ec4b15c7f3ba429699fa73ec77', '[\"*\"]', NULL, NULL, '2023-09-18 10:11:55', '2023-09-18 10:11:55'),
(12, 'Clients\\Models\\Client', 20, 'MyApp', '516ef3615e3d0b79ab3f2990b64eacb3e8df717ef820431a8c5e7be3596c225d', '[\"*\"]', NULL, NULL, '2023-09-18 10:12:48', '2023-09-18 10:12:48'),
(13, 'Clients\\Models\\Client', 20, 'MyApp', 'e60e631d662f79daa1580b78b5cc9664683b0f336ed94d8c612a7cdf5fd49c22', '[\"*\"]', NULL, NULL, '2023-09-18 10:13:29', '2023-09-18 10:13:29'),
(14, 'Clients\\Models\\Client', 20, 'MyApp', '3e151b4e4c574a0762093b0c1f4dac3b89e0a4b49cc2387d1d8b0327ed34d185', '[\"*\"]', NULL, NULL, '2023-09-18 10:16:19', '2023-09-18 10:16:19'),
(15, 'Clients\\Models\\Client', 20, 'MyApp', '1d8500dba91141ef90b3c684e3e11ddd09b2c8d13268cdc9b1266ecbf65a1f73', '[\"*\"]', NULL, NULL, '2023-09-18 10:39:21', '2023-09-18 10:39:21'),
(16, 'Clients\\Models\\Client', 20, 'MyApp', '1e69ff7a977a210a70d939ba0055c7ff39bc7ac1584e2d86111714939e3dad73', '[\"*\"]', NULL, NULL, '2023-09-18 10:39:55', '2023-09-18 10:39:55'),
(17, 'Clients\\Models\\Client', 20, 'MyApp', '36f4c8a90cf913b28ea308260d2c4050ae47770a0f12866e826f41d2876f7b55', '[\"*\"]', NULL, NULL, '2023-09-18 10:40:30', '2023-09-18 10:40:30'),
(18, 'Clients\\Models\\Client', 20, 'MyApp', '7891d648a25d7200b346ef426243e20926ffe37a163f5208a6b58be26c7aff77', '[\"*\"]', NULL, NULL, '2023-09-19 05:42:48', '2023-09-19 05:42:48'),
(19, 'Clients\\Models\\Client', 20, 'MyApp', 'ba9505ee5485a2db6ee4e316cb42160b7a7d67a79446a0c2ffa182fb1ebb15b8', '[\"*\"]', NULL, NULL, '2023-09-19 05:49:27', '2023-09-19 05:49:27'),
(20, 'Clients\\Models\\Client', 20, 'MyApp', '2a313a7c4fe9e8b1da596c063057f59a06b4e7b89b5ed244f16960eaf74114b5', '[\"*\"]', NULL, NULL, '2023-09-19 05:50:03', '2023-09-19 05:50:03'),
(21, 'Clients\\Models\\Client', 20, 'MyApp', 'fcf80759fc87d47f8515fd9f79388b5b2ab1adbed626422b4433a26a6bb244df', '[\"*\"]', NULL, NULL, '2023-09-19 05:58:38', '2023-09-19 05:58:38'),
(22, 'Clients\\Models\\Client', 20, 'MyApp', 'e1c7aa289afbb7c931e958db352097354b030e881b7fa1c8b4f35cb0699c66ee', '[\"*\"]', NULL, NULL, '2023-09-19 05:59:01', '2023-09-19 05:59:01'),
(23, 'Clients\\Models\\Client', 20, 'MyApp', 'efc2a56e4f6ff2cebe16ee97fdfca23814457f3e48ef731560b8b86e281deabe', '[\"*\"]', NULL, NULL, '2023-09-19 06:01:46', '2023-09-19 06:01:46'),
(24, 'Clients\\Models\\Client', 20, 'MyApp', 'c26a56d7a257250a4b5ccf2f4d6641de7aadc61eb6fc7230aba05b087d9a6135', '[\"*\"]', NULL, NULL, '2023-09-19 11:28:59', '2023-09-19 11:28:59'),
(25, 'Clients\\Models\\Client', 20, 'MyApp', '4b5bee51591693deba3d27b37dcf2a7abb4c092735334250e618ee7224762608', '[\"*\"]', NULL, NULL, '2023-09-19 11:36:21', '2023-09-19 11:36:21'),
(26, 'Clients\\Models\\Client', 20, 'MyApp', '33fe6f0a340d663bd5be9b18ca76d61a094e7def0392faf942009106834efd0f', '[\"*\"]', NULL, NULL, '2023-09-19 11:38:24', '2023-09-19 11:38:24'),
(27, 'Clients\\Models\\Client', 20, 'MyApp', 'f2bbdc544268e3f0f55a73431c731077f73ac82ad0cf6ad4735aaf8b21a4a721', '[\"*\"]', NULL, NULL, '2023-09-19 11:40:46', '2023-09-19 11:40:46'),
(28, 'Clients\\Models\\Client', 20, 'MyApp', '5ed41aaba0ca882e3d74109787bb0223ed6b241ddd196fc50754de1cab79b372', '[\"*\"]', NULL, NULL, '2023-09-19 11:42:27', '2023-09-19 11:42:27'),
(29, 'Clients\\Models\\Client', 20, 'MyApp', '60c02d62e433fbb3ed1f9cc171f62054975893de9757a449f49612b6bbbe3355', '[\"*\"]', NULL, NULL, '2023-09-19 11:42:54', '2023-09-19 11:42:54'),
(30, 'Clients\\Models\\Client', 20, 'MyApp', '17c48638e42aad6a5782651391b96e89b3badc64e5e05c61ce7b4624264ce887', '[\"*\"]', NULL, NULL, '2023-09-19 11:43:49', '2023-09-19 11:43:49'),
(31, 'Clients\\Models\\Client', 20, 'MyApp', '22b173257256ea8855c721112194a9a3f690f596284c94e50b0986c1b6fb8027', '[\"*\"]', NULL, NULL, '2023-09-19 11:47:17', '2023-09-19 11:47:17'),
(32, 'Clients\\Models\\Client', 20, 'MyApp', '0159d3680c0d46a13942521c602b711c04a96798763666b1b357d908d78c21bf', '[\"*\"]', NULL, NULL, '2023-09-19 11:48:19', '2023-09-19 11:48:19'),
(33, 'Clients\\Models\\Client', 20, 'MyApp', 'cc1902b6dd84bb07ec2427193d24d73c37c4efcb001ce8010765c5598a3cfd41', '[\"*\"]', NULL, NULL, '2023-09-19 11:48:33', '2023-09-19 11:48:33'),
(34, 'Vendors\\Models\\Vendor', 3, 'MyApp', '8920c15e3442173df80f246dd2fb49a6b40a14c7df95508b715f9881562971cf', '[\"*\"]', NULL, NULL, '2023-09-19 12:07:09', '2023-09-19 12:07:09'),
(35, 'Vendors\\Models\\Vendor', 3, 'MyApp', '0634d9aaea59baa3dfdc98793f42a072a0784f709d0e16983b4e806326514fe3', '[\"*\"]', NULL, NULL, '2023-09-19 12:07:45', '2023-09-19 12:07:45'),
(36, 'Employees\\Models\\Employee', 3, 'MyApp', 'bfe5f7996fdb7068fd728763c214731f2db96388540bccd5fb25ae01f4e44736', '[\"*\"]', NULL, NULL, '2023-09-19 12:45:08', '2023-09-19 12:45:08'),
(37, 'Employees\\Models\\Employee', 3, 'MyApp', 'ba535f026128e5068f0f7040db471d87f6467c18eba6f9e5edcc9e23a17861c2', '[\"*\"]', NULL, NULL, '2023-09-19 12:46:14', '2023-09-19 12:46:14'),
(38, 'Employees\\Models\\Employee', 3, 'MyApp', '105369f1570f76da033c46b1ddbdc51af95f6b205747cc5715161971590d0fcc', '[\"*\"]', NULL, NULL, '2023-09-19 12:49:18', '2023-09-19 12:49:18'),
(39, 'Employees\\Models\\Employee', 3, 'MyApp', 'c8b6c8c5fc19b43c598af472eee726313ad315d58e81f1291f2e71e880c1d49d', '[\"*\"]', NULL, NULL, '2023-09-19 12:53:01', '2023-09-19 12:53:01'),
(40, 'Employees\\Models\\Employee', 3, 'MyApp', 'c72c7f88626bf37a7a3d72d0196a03cf58a6c2013b34fe7ce41cdd9cb3809550', '[\"*\"]', NULL, NULL, '2023-09-19 12:53:14', '2023-09-19 12:53:14'),
(41, 'Employees\\Models\\Employee', 3, 'MyApp', 'f4425aefb10f9c3502d603e1f76af51af17ef2bf750621fd5f3e1b04cb14ea4b', '[\"*\"]', NULL, NULL, '2023-09-19 12:54:24', '2023-09-19 12:54:24'),
(42, 'Clients\\Models\\Client', 20, 'MyApp', '4c32c21ff0e0435f48c6084306acb925018d5f924223c2d6356804bc09fa03be', '[\"*\"]', NULL, NULL, '2023-09-19 12:56:53', '2023-09-19 12:56:53'),
(43, 'Employees\\Models\\Employee', 3, 'MyApp', '0e0f6888bff233e63a5dbed3ab620cec9383455db7ca44d0f97098cf321d9e62', '[\"*\"]', NULL, NULL, '2023-09-19 12:59:49', '2023-09-19 12:59:49'),
(44, 'Employees\\Models\\Employee', 3, 'MyApp', '5095d799709c686d9b13da66e20ede10f164f4a15e9fe3a259acb70d99a309c7', '[\"*\"]', NULL, NULL, '2023-09-19 12:59:54', '2023-09-19 12:59:54'),
(45, 'Clients\\Models\\Client', 20, 'MyApp', 'fe274963fe4dee74d86d05d16f92aa402c75b8b8d10a2ccc65cc0dae3656af53', '[\"*\"]', NULL, NULL, '2023-09-19 13:01:03', '2023-09-19 13:01:03'),
(46, 'Clients\\Models\\Client', 20, 'MyApp', '835d2515f9e1ba4f48318b729a8da97700d02523ce2a6720da5a48685c5eb8e7', '[\"*\"]', NULL, NULL, '2023-09-19 13:25:25', '2023-09-19 13:25:25'),
(47, 'Employees\\Models\\Employee', 3, 'MyApp', '45dffa1cb9633298f62bf4885a198cf03a8b5bfbceb8065bf1529e7f1a08e267', '[\"*\"]', NULL, NULL, '2023-09-19 13:27:09', '2023-09-19 13:27:09'),
(48, 'Clients\\Models\\Client', 20, 'MyApp', 'ba314163bfc468890df9971fba2fde72cb8b4863c6387383828a33c84bc74e83', '[\"*\"]', NULL, NULL, '2023-09-19 13:30:23', '2023-09-19 13:30:23'),
(49, 'Vendors\\Models\\Vendor', 3, 'MyApp', '08de8739b53040d940a4dfff3f88922b0069c1cc8c3861872703bc5b8688921b', '[\"*\"]', NULL, NULL, '2023-09-19 13:31:39', '2023-09-19 13:31:39'),
(50, 'Vendors\\Models\\Vendor', 3, 'MyApp', 'a8e19a3d11d151c487617837975d23c3bf91dbc096d71b8b4df7a82f0d2015d1', '[\"*\"]', NULL, NULL, '2023-09-19 13:33:18', '2023-09-19 13:33:18'),
(51, 'Vendors\\Models\\Vendor', 3, 'MyApp', 'b5d2f44295ad035af349d173de88ac6f7bfd999e31f458061b130e81f71fa9d3', '[\"*\"]', NULL, NULL, '2023-09-19 13:33:23', '2023-09-19 13:33:23'),
(52, 'Vendors\\Models\\Vendor', 3, 'MyApp', '75a9a35a69e2275b7db84522e896604c712b81121f1be25f8f1c530ce318ce9f', '[\"*\"]', NULL, NULL, '2023-09-19 13:34:13', '2023-09-19 13:34:13'),
(53, 'Vendors\\Models\\Vendor', 3, 'MyApp', 'a56d348fa8228cfaa277b82c57655ba7ad668fe5c133eaa7474adbf79892eb3b', '[\"*\"]', NULL, NULL, '2023-09-19 13:34:47', '2023-09-19 13:34:47'),
(54, 'Vendors\\Models\\Vendor', 3, 'MyApp', '620e81a416add48056c7ccc4d4cebdae2bb8576bd7f63b2fe01a0ec880b08c41', '[\"*\"]', NULL, NULL, '2023-09-19 15:41:39', '2023-09-19 15:41:39'),
(55, 'Clients\\Models\\Client', 20, 'MyApp', 'ecb666a9d5412f18cc8b95690603beb9235d76906b94e645757570e5ab11b9f3', '[\"*\"]', NULL, NULL, '2023-09-19 15:42:09', '2023-09-19 15:42:09'),
(56, 'Employees\\Models\\Employee', 3, 'MyApp', '9c6199050f33b2c0c79cb142189302d88fa1567c3525234fd56b13d4aad9bd3e', '[\"*\"]', NULL, NULL, '2023-09-19 15:43:18', '2023-09-19 15:43:18'),
(57, 'Clients\\Models\\Client', 20, 'MyApp', 'd41d2a96bcc643346bfbcd076042c3b611351ff0ead44e15808bcc41b7474044', '[\"*\"]', '2023-09-19 18:08:17', NULL, '2023-09-19 18:07:51', '2023-09-19 18:08:17'),
(58, 'Clients\\Models\\Client', 20, 'MyApp', '30b34afecf962fecd5e1c862b32fbcfb0d159a287c091a05ba4cb341e1bbe424', '[\"*\"]', NULL, NULL, '2023-09-20 06:49:24', '2023-09-20 06:49:24'),
(59, 'Employees\\Models\\Employee', 3, 'MyApp', '6b29bbd8c3028c0f9a09f19a716281c62dd94fc60db2027c8fedabd2826f6eb8', '[\"*\"]', NULL, NULL, '2023-09-20 09:50:27', '2023-09-20 09:50:27'),
(60, 'Employees\\Models\\Employee', 3, 'MyApp', '7def50065fe223664444f63047b902bcae9d5e062665f5a21c7afc69ed58530f', '[\"*\"]', NULL, NULL, '2023-09-20 09:54:04', '2023-09-20 09:54:04'),
(61, 'Employees\\Models\\Employee', 5, 'MyApp', 'fa63dd16c0671e8573ec1e8e4539bd250271d77584290d1802033eacb1bd1b53', '[\"*\"]', NULL, NULL, '2023-09-20 11:08:39', '2023-09-20 11:08:39'),
(62, 'Vendors\\Models\\Vendor', 7, 'MyApp', 'a409aa9239fbbc41687b72fcd55af32d05791def61a326fae6213bc073cd23eb', '[\"*\"]', NULL, NULL, '2023-09-20 11:13:44', '2023-09-20 11:13:44'),
(63, 'Vendors\\Models\\Vendor', 7, 'MyApp', 'be864079172fc6b3647057d8955e273747dc240c992997ed8ef2073c9f4b069e', '[\"*\"]', NULL, NULL, '2023-09-20 11:14:35', '2023-09-20 11:14:35'),
(64, 'Employees\\Models\\Employee', 5, 'MyApp', '23e628729771c08ed81236ee5d8851ea416ae306f83f3bea71d53df21dcb527a', '[\"*\"]', NULL, NULL, '2023-09-20 11:15:38', '2023-09-20 11:15:38'),
(65, 'Clients\\Models\\Client', 20, 'MyApp', '477d4de3cbdfbcdde06591acd69a187671140c7bee49d636437d12001350af2e', '[\"*\"]', NULL, NULL, '2023-09-20 11:19:38', '2023-09-20 11:19:38'),
(66, 'Clients\\Models\\Client', 20, 'MyApp', 'ae81e3537d288e249e3cbf101c4c56eab9594fbadf03854ca853b08800b8f68f', '[\"*\"]', NULL, NULL, '2023-09-20 11:20:31', '2023-09-20 11:20:31'),
(67, 'Clients\\Models\\Client', 20, 'MyApp', '55aa63afa7ae42544c69dc62a0b9b24ccaf51bef2b5d9570de6ed4a17fe54209', '[\"*\"]', NULL, NULL, '2023-09-21 06:46:01', '2023-09-21 06:46:01'),
(68, 'Clients\\Models\\Client', 20, 'MyApp', '5d473148fe2583483d70b13d742bfce9fe4d92e1ee2fb6b919ae7529131cd271', '[\"*\"]', NULL, NULL, '2023-09-21 10:28:38', '2023-09-21 10:28:38'),
(69, 'Clients\\Models\\Client', 20, 'MyApp', '70a19fad9b14aa01aa37be07dac692e34c400e4b2c065fd95d455d22088196f2', '[\"*\"]', NULL, NULL, '2023-09-21 10:30:08', '2023-09-21 10:30:08'),
(70, 'Clients\\Models\\Client', 20, 'MyApp', 'f719115e75c8b2540c1e6a4c243ba763b7a9492569bae1ecc1edb58a30161081', '[\"*\"]', NULL, NULL, '2023-09-21 10:36:27', '2023-09-21 10:36:27'),
(71, 'Clients\\Models\\Client', 20, 'MyApp', 'e14821366672764989b49e444d9ab23c56209d9382f76a2469bc1ad579711c06', '[\"*\"]', NULL, NULL, '2023-09-21 10:39:52', '2023-09-21 10:39:52'),
(72, 'Clients\\Models\\Client', 20, 'MyApp', '4b297f19fc0276c1b0887e2d6922e5d4f2a0da86dd3ac6afe59cee5cb2d9281a', '[\"*\"]', NULL, NULL, '2023-09-21 10:40:03', '2023-09-21 10:40:03'),
(73, 'Clients\\Models\\Client', 20, 'MyApp', '47c25b85980fd65393344c94c1b7c2405111807ecff8d972eb612c1409944814', '[\"*\"]', NULL, NULL, '2023-09-21 10:40:09', '2023-09-21 10:40:09'),
(74, 'Clients\\Models\\Client', 20, 'MyApp', 'baa9b5712dd2d8f53384b59a437bfd3fc49dcd189da06ae575c725dfe81093bf', '[\"*\"]', NULL, NULL, '2023-09-21 10:51:53', '2023-09-21 10:51:53'),
(75, 'Clients\\Models\\Client', 20, 'MyApp', '2a59924f745b8298d58a334ddeba1573cfd60cfa6e1b81a86fe7382f87f77c91', '[\"*\"]', NULL, NULL, '2023-09-21 11:00:36', '2023-09-21 11:00:36'),
(76, 'Clients\\Models\\Client', 20, 'MyApp', 'f8e8dc9b755901c5421384f3425d75e9463431d82a3f47cd213028e2587e9770', '[\"*\"]', NULL, NULL, '2023-09-21 11:01:49', '2023-09-21 11:01:49'),
(77, 'Clients\\Models\\Client', 20, 'MyApp', '7d2e2365de230d2555af1604453854fd2e1770c7be7136625991218e47ec7d47', '[\"*\"]', NULL, NULL, '2023-09-21 11:01:59', '2023-09-21 11:01:59'),
(78, 'Clients\\Models\\Client', 20, 'MyApp', '6e5b9fa157d0a7e773e8ba818dbf3e73305b24e942d3eebfa73300453dea4dae', '[\"*\"]', NULL, NULL, '2023-09-21 11:22:54', '2023-09-21 11:22:54'),
(79, 'Clients\\Models\\Client', 20, 'MyApp', '34eb22f409d593c96aa85975a459166b865bad19fcd54d94589dc913f78a4179', '[\"*\"]', NULL, NULL, '2023-09-21 11:23:20', '2023-09-21 11:23:20'),
(80, 'Clients\\Models\\Client', 20, 'MyApp', '2c624e4bb30efd13f34c4d163ba556efeaaf17dd5f10d50e1e34ce79c13cc67a', '[\"*\"]', NULL, NULL, '2023-09-21 12:28:39', '2023-09-21 12:28:39'),
(81, 'Clients\\Models\\Client', 20, 'MyApp', 'd2a7f0c737acb6eaf53d56539d91662d41a4aef128df07c97b8031d37acf072e', '[\"*\"]', NULL, NULL, '2023-09-21 12:29:13', '2023-09-21 12:29:13'),
(82, 'Clients\\Models\\Client', 22, 'MyApp', '3d97c52cda2c6df4e6159a43ef6ac202ee29983e8f64f3b19f38790f69bfe680', '[\"*\"]', NULL, NULL, '2023-09-21 12:50:36', '2023-09-21 12:50:36'),
(83, 'Clients\\Models\\Client', 22, 'MyApp', '142fcbd5819a34efc59933035199773e2fdd35fc1fe724a56af5b7517b5b635f', '[\"*\"]', NULL, NULL, '2023-09-21 12:54:35', '2023-09-21 12:54:35'),
(84, 'Clients\\Models\\Client', 22, 'MyApp', '1feb649e9451b6f54b6f3daa03ddaf83ecb29fddef5541df8bed8aac73e9d815', '[\"*\"]', NULL, NULL, '2023-09-21 12:56:24', '2023-09-21 12:56:24'),
(85, 'Clients\\Models\\Client', 22, 'MyApp', '59dfb0eef2474a7a49ace6a101b4970c44daa637b75355b718bc635728459c1c', '[\"*\"]', NULL, NULL, '2023-09-21 13:07:38', '2023-09-21 13:07:38'),
(86, 'Clients\\Models\\Client', 22, 'MyApp', '4a478cef5f303690715c9b3e411bcffd070ada6e27d594be93e3d3e671795bd5', '[\"*\"]', '2023-09-24 07:50:52', NULL, '2023-09-24 07:49:50', '2023-09-24 07:50:52'),
(87, 'Clients\\Models\\Client', 25, 'MyApp', 'eb0aea8866d75c027aebab2e058a0e00594680554975c913cab3e21ced87f8d5', '[\"*\"]', NULL, NULL, '2023-09-24 09:26:53', '2023-09-24 09:26:53'),
(88, 'Clients\\Models\\Client', 26, 'MyApp', '7446a8061b7f6fbefa2bd788c491337fad55948a0cd497bad5c7b9121f77f7b6', '[\"*\"]', NULL, NULL, '2023-09-24 09:27:41', '2023-09-24 09:27:41'),
(89, 'Clients\\Models\\Client', 26, 'MyApp', 'a5313461e97890b66bda50d4b9eaeb244b26779fae6721fd7f82602b77d6c017', '[\"*\"]', NULL, NULL, '2023-09-24 09:29:58', '2023-09-24 09:29:58'),
(90, 'Clients\\Models\\Client', 26, 'MyApp', '2999b5897d4e1baf3f8fdca13ca32db727b0a84fa258cea0f9967c4fd8b94205', '[\"*\"]', '2023-09-24 09:35:14', NULL, '2023-09-24 09:34:32', '2023-09-24 09:35:14'),
(91, 'Clients\\Models\\Client', 26, 'MyApp', '97a858d92fc776c80514177b6e9f7e9d91822ff7e8881b3f5d6298fd57fa350e', '[\"*\"]', NULL, NULL, '2023-09-24 10:45:35', '2023-09-24 10:45:35'),
(92, 'Clients\\Models\\Client', 26, 'MyApp', '6df193b3325d547bcdb878caaadabd85d4bad23622e215eba597315ffc2f8d53', '[\"*\"]', NULL, NULL, '2023-09-24 10:46:25', '2023-09-24 10:46:25'),
(93, 'Clients\\Models\\Client', 1, 'MyApp', '690078004fd814d8596feeb2173acbd3a7651e7864e7e0513cbff0ec1936cdae', '[\"*\"]', NULL, NULL, '2023-09-24 13:07:54', '2023-09-24 13:07:54'),
(94, 'Clients\\Models\\Client', 1, 'MyApp', '4aea9c713c34ba9b26c3f6dc05a1760d8ace14e680ba7dac33a30249d06f98bf', '[\"*\"]', NULL, NULL, '2023-09-24 13:11:28', '2023-09-24 13:11:28'),
(95, 'Clients\\Models\\Client', 4, 'MyApp', '63fcb719ebd1e9139596bb097b500139f39e5fdd5b10f249edc61448b2d87417', '[\"*\"]', NULL, NULL, '2023-09-24 13:15:12', '2023-09-24 13:15:12'),
(96, 'Clients\\Models\\Client', 1, 'MyApp', '8ae46f6ab79ece830a8416fc04bcececf984b536d47c40b6e4deb136676a7c5e', '[\"*\"]', NULL, NULL, '2023-09-24 13:23:50', '2023-09-24 13:23:50'),
(97, 'Clients\\Models\\Client', 2, 'MyApp', 'f409aa092a0b0a0a40a307d07d694cb25fed52cfaf21db1cc0433c3545c67d0e', '[\"*\"]', NULL, NULL, '2023-09-24 13:29:41', '2023-09-24 13:29:41'),
(98, 'Clients\\Models\\Client', 2, 'MyApp', 'd2872f3e31404bdb4e586d72a7a381dbcdcb4f111b6a98d78e75968431bf216f', '[\"*\"]', NULL, NULL, '2023-09-24 13:46:17', '2023-09-24 13:46:17'),
(99, 'Clients\\Models\\Client', 2, 'MyApp', 'd737d98f6b932f4d7f0e521b39440be5f28d70987dfe7179d2a3d376f9d30982', '[\"*\"]', NULL, NULL, '2023-09-24 13:48:31', '2023-09-24 13:48:31'),
(100, 'Clients\\Models\\Client', 2, 'MyApp', '711658e77ed6ed704d15d7141233241795fa30ab9674587fe2cea3f9950e5a9d', '[\"*\"]', NULL, NULL, '2023-09-24 13:48:47', '2023-09-24 13:48:47'),
(101, 'Clients\\Models\\Client', 2, 'MyApp', '62a31a0cab3fa7f4545a4cc93b36917d14969facf713349d4e208692573e9893', '[\"*\"]', NULL, NULL, '2023-09-24 13:49:02', '2023-09-24 13:49:02'),
(102, 'Clients\\Models\\Client', 1, 'MyApp', 'dd4927b8a04e6575aa8d2816fac854199927f7c7708e48e1896b8b2348b34247', '[\"*\"]', NULL, NULL, '2023-09-24 13:49:44', '2023-09-24 13:49:44'),
(103, 'Clients\\Models\\Client', 1, 'MyApp', '3f7231e1daff6147117c330d57c30d7ac78842013a911ac4550ecc6256be9f7e', '[\"*\"]', NULL, NULL, '2023-09-24 13:50:02', '2023-09-24 13:50:02'),
(104, 'Clients\\Models\\Client', 1, 'MyApp', '77a325915cbd846996a9381a435b322cebab1be6d2640be454984501b8aa5345', '[\"*\"]', NULL, NULL, '2023-09-24 13:50:19', '2023-09-24 13:50:19'),
(105, 'Clients\\Models\\Client', 1, 'MyApp', 'f7c9728d1fce8043a2c073f136cd5231f8128c6873c39d0bd11d1fd3b57f7c47', '[\"*\"]', NULL, NULL, '2023-09-24 14:10:37', '2023-09-24 14:10:37'),
(106, 'Clients\\Models\\Client', 1, 'MyApp', '8556c102e8403ad14297754d87f28c79c463b73b7cb5e3373f0e8ec1d2f368dc', '[\"*\"]', NULL, NULL, '2023-09-24 14:13:11', '2023-09-24 14:13:11'),
(107, 'Clients\\Models\\Client', 1, 'MyApp', 'd832063c52b7abd9ed4e342467d52d8b0eaf41d91f02fd1b2299351114b477dc', '[\"*\"]', NULL, NULL, '2023-09-24 14:15:46', '2023-09-24 14:15:46'),
(108, 'Clients\\Models\\Client', 1, 'MyApp', 'b21c56e30649fbf2d5de6dd385ca214671eebddefead2da5cfecc67050a21c66', '[\"*\"]', NULL, NULL, '2023-09-24 14:19:37', '2023-09-24 14:19:37'),
(109, 'Clients\\Models\\Client', 1, 'MyApp', 'ee1bb759227aaaab8369e1d0f213cf9bdaf28606eb73606695d018269f2591f8', '[\"*\"]', NULL, NULL, '2023-09-24 14:22:22', '2023-09-24 14:22:22'),
(110, 'Clients\\Models\\Client', 2, 'MyApp', 'a1a9da9aed72ad6b416cdda44655c58136fdc246f519935492f8f07fba562477', '[\"*\"]', NULL, NULL, '2023-09-24 14:23:26', '2023-09-24 14:23:26'),
(111, 'Clients\\Models\\Client', 2, 'MyApp', 'a35f3ffa351b51b7f40a8915f12480bf749a2067fdef79f27dffd7f6ca499ee5', '[\"*\"]', NULL, NULL, '2023-09-24 14:23:49', '2023-09-24 14:23:49'),
(112, 'Clients\\Models\\Client', 3, 'MyApp', 'c864f2fd61b365301734cd8e914280790a51fc4e4a9cb1643ae67a8b56c6f615', '[\"*\"]', NULL, NULL, '2023-09-24 18:55:15', '2023-09-24 18:55:15'),
(113, 'Clients\\Models\\Client', 3, 'MyApp', 'c6cb138a469b4c7901759c2bf1c7814df8d30051a5e17b5373771d73e3696b51', '[\"*\"]', NULL, NULL, '2023-09-24 18:57:04', '2023-09-24 18:57:04'),
(114, 'Clients\\Models\\Client', 3, 'MyApp', 'd73d8905417c8e40efe35de49ccb730271549c4f59b42e2bea3eccc24466ca85', '[\"*\"]', NULL, NULL, '2023-09-24 18:58:24', '2023-09-24 18:58:24'),
(115, 'Clients\\Models\\Client', 3, 'MyApp', '7e4f9dd0e463bc096860b8ab7b8ef583e06333399672fbbf27712c2d7c3c6ed5', '[\"*\"]', NULL, NULL, '2023-09-25 05:40:25', '2023-09-25 05:40:25'),
(116, 'Clients\\Models\\Client', 3, 'MyApp', '1b5b4cbc9e2daeb634e02eadaec92bf5d1b90c5d80db0e7dcbcbf1c927747e23', '[\"*\"]', NULL, NULL, '2023-09-25 05:46:43', '2023-09-25 05:46:43'),
(117, 'Clients\\Models\\Client', 3, 'MyApp', '3946627a26d1138ce3b7d76f3f4e2f2c7464fe1a14ac27e3d60919bb84ee2751', '[\"*\"]', '2023-09-25 07:19:20', NULL, '2023-09-25 05:47:10', '2023-09-25 07:19:20'),
(118, 'Clients\\Models\\Client', 3, 'MyApp', '1aeb09284ffe2bd5a47cb9826e01e7de39ff718a83fe4b0db8587b10a66bf317', '[\"*\"]', '2023-09-25 18:51:30', NULL, '2023-09-25 07:20:42', '2023-09-25 18:51:30'),
(119, 'Clients\\Models\\Client', 3, 'MyApp', '4e7090f59f8585b4319d7ab4f4b3011c0c3be7999b0cc6a00c9ca02f4fc46395', '[\"*\"]', NULL, NULL, '2023-09-25 08:38:38', '2023-09-25 08:38:38'),
(120, 'Clients\\Models\\Client', 3, 'MyApp', 'e909860a69027218e83d226d9f85b46df03e487e8577fc4bceb875b7b554950c', '[\"*\"]', NULL, NULL, '2023-09-25 08:39:30', '2023-09-25 08:39:30'),
(121, 'Clients\\Models\\Client', 3, 'MyApp', 'c372be805fede6248a8eacef2be78a9affb0c89468a82e3f6df085562e6dee74', '[\"*\"]', '2023-10-01 21:05:18', NULL, '2023-09-25 08:39:59', '2023-10-01 21:05:18'),
(122, 'Clients\\Models\\Client', 3, 'MyApp', 'e117421ec5f43f0cbc9c99e78058075be5c0663848e9f338611725bcf6570aec', '[\"*\"]', NULL, NULL, '2023-09-25 08:50:41', '2023-09-25 08:50:41'),
(123, 'Clients\\Models\\Client', 3, 'MyApp', 'a7cb4bed7dadc1745e2d92c855d8d0e08a3e55c222e18588ce2314aa89ae702a', '[\"*\"]', NULL, NULL, '2023-09-25 08:54:10', '2023-09-25 08:54:10'),
(124, 'Clients\\Models\\Client', 3, 'MyApp', '13fa916128cbf4f0375713ccd2742fe7f1e724484fe4c0dd20901971d104c834', '[\"*\"]', NULL, NULL, '2023-09-25 09:07:45', '2023-09-25 09:07:45'),
(125, 'Clients\\Models\\Client', 3, 'MyApp', '0f23b92fb4ffb58d5953d04afffbdbc5baf20b2d8351ab1ce404b311574327dd', '[\"*\"]', NULL, NULL, '2023-09-25 09:07:53', '2023-09-25 09:07:53'),
(126, 'Clients\\Models\\Client', 4, 'MyApp', '1fba6bbf3683d15a9e260bc541dbaadb094e6a63d974b6f78a3c30ad77600285', '[\"*\"]', NULL, NULL, '2023-09-25 09:08:02', '2023-09-25 09:08:02'),
(127, 'Clients\\Models\\Client', 4, 'MyApp', '21476087b1294e387cd35724e9ee58d69c42ce169d071c5c6fe329873c78932a', '[\"*\"]', NULL, NULL, '2023-09-25 09:09:49', '2023-09-25 09:09:49'),
(128, 'Clients\\Models\\Client', 4, 'MyApp', 'e110bcdb7093f0a7fb92928fdf5ed8e6f32e0db09995f56dc941a8ff1418bbf4', '[\"*\"]', NULL, NULL, '2023-09-25 09:16:15', '2023-09-25 09:16:15'),
(129, 'Clients\\Models\\Client', 4, 'MyApp', '288d1d56994244781dba2ccbb0a26b0e13dbff82f83b863e6b2109a8f9dc43e6', '[\"*\"]', NULL, NULL, '2023-09-25 09:16:58', '2023-09-25 09:16:58'),
(130, 'Clients\\Models\\Client', 4, 'MyApp', '5f6fe02e1454d1a526593c8470c845edae202c52d7babe89d6f3ed0d364b36cd', '[\"*\"]', NULL, NULL, '2023-09-25 09:19:05', '2023-09-25 09:19:05'),
(131, 'Clients\\Models\\Client', 4, 'MyApp', '1243542cf6a945ff905c16e9a54bd4b5bc4cf23be5926dbc94397f49fe50bbe4', '[\"*\"]', NULL, NULL, '2023-09-25 09:19:19', '2023-09-25 09:19:19'),
(132, 'Clients\\Models\\Client', 4, 'MyApp', 'b7e757c5068780e7e318dfb831720463183da3abc78d5dc46e04daf6dccb63ec', '[\"*\"]', NULL, NULL, '2023-09-25 09:22:57', '2023-09-25 09:22:57'),
(133, 'Clients\\Models\\Client', 4, 'MyApp', '426f1e890cb1a34cf9f18585f707c9138dcd5eeef6a543daa83596e17587cf93', '[\"*\"]', NULL, NULL, '2023-09-25 09:23:39', '2023-09-25 09:23:39'),
(134, 'Clients\\Models\\Client', 4, 'MyApp', 'afff97463bb066a5c5b0755889e3a36fa04d92c67c03539c72b37d708d766376', '[\"*\"]', NULL, NULL, '2023-09-25 09:23:47', '2023-09-25 09:23:47'),
(135, 'Clients\\Models\\Client', 4, 'MyApp', '5420a9de23b487eea846c949cc776508f83bddc02eb07fe8e366711746f66ebe', '[\"*\"]', NULL, NULL, '2023-09-25 09:26:15', '2023-09-25 09:26:15'),
(136, 'Clients\\Models\\Client', 3, 'MyApp', '9fa5b84f5d24ec6f394559e4d27d8ab10ad2f19448e440989f1323fb81735076', '[\"*\"]', '2023-10-16 22:11:45', NULL, '2023-09-26 05:51:21', '2023-10-16 22:11:45'),
(137, 'Clients\\Models\\Client', 5, 'MyApp', 'dfa2c4ce33a7ee45509abaa13b2de4a05b7bd68ddc700c1f7e3f80a0c17b0a0e', '[\"*\"]', NULL, NULL, '2023-09-26 06:08:23', '2023-09-26 06:08:23'),
(138, 'Clients\\Models\\Client', 5, 'MyApp', '798195312b1d194f7a773baf328ffcad09372155c3e94f291aa31368e12d750a', '[\"*\"]', '2023-09-27 08:52:20', NULL, '2023-09-26 07:17:13', '2023-09-27 08:52:20'),
(139, 'Clients\\Models\\Client', 7, 'MyApp', '8de506cc5de65a1fd2ac9ffb693a312e3ea66e421aba587f043dd450a0b4719d', '[\"*\"]', NULL, NULL, '2023-10-01 16:08:50', '2023-10-01 16:08:50'),
(140, 'Clients\\Models\\Client', 8, 'MyApp', '9385c37145d0fac1612e3636d8c8a121f2d975bfa958eb972e57ab22ff168581', '[\"*\"]', NULL, NULL, '2023-10-01 16:11:33', '2023-10-01 16:11:33'),
(141, 'Clients\\Models\\Client', 8, 'MyApp', 'eb1cb0867ab5da520e0e525a17fb79b2778f4b493b591d9c83e4ca7619c9f1b3', '[\"*\"]', '2023-10-01 16:20:19', NULL, '2023-10-01 16:16:39', '2023-10-01 16:20:19'),
(142, 'Clients\\Models\\Client', 8, 'MyApp', '38601ce951ccd0602626671037464161a0aa9a2a79328e6b44cf36cf2c601556', '[\"*\"]', NULL, NULL, '2023-10-01 16:20:41', '2023-10-01 16:20:41'),
(143, 'Clients\\Models\\Client', 8, 'MyApp', '7481583d7dea1fc480b10d5bfa5077734746f2005d34329a7ca860b857b1d2df', '[\"*\"]', '2023-10-01 20:55:10', NULL, '2023-10-01 16:31:46', '2023-10-01 20:55:10'),
(144, 'Clients\\Models\\Client', 8, 'MyApp', '6879b2b0782b4ce8476678aef94bf9f4298aad9b8a2d0631d7d39c327a051d64', '[\"*\"]', '2023-10-01 20:54:41', NULL, '2023-10-01 17:27:55', '2023-10-01 20:54:41'),
(145, 'Clients\\Models\\Client', 8, 'MyApp', 'bb22c44a21157b48425c9f09f6ffc86c9f1df9aed8dc6cd10df6713bc11eb2fc', '[\"*\"]', '2023-10-01 22:18:26', NULL, '2023-10-01 21:03:41', '2023-10-01 22:18:26'),
(146, 'Clients\\Models\\Client', 8, 'MyApp', 'c588dfe1e777475810e8b8abf8584999e90c363f41c13415bfbd6549330e1d69', '[\"*\"]', '2023-10-01 22:18:59', NULL, '2023-10-01 21:13:55', '2023-10-01 22:18:59'),
(147, 'Clients\\Models\\Client', 8, 'MyApp', 'b922e904ec80612c0bac957ae372cb503b8ebfb6970affc9e6c8a6f48c711a20', '[\"*\"]', '2023-10-01 22:20:28', NULL, '2023-10-01 22:19:37', '2023-10-01 22:20:28'),
(148, 'Clients\\Models\\Client', 8, 'MyApp', 'c1aaecd50b846db4fe8d07c23f02622252d76089442d737df325e2afd830606b', '[\"*\"]', '2023-10-01 22:24:26', NULL, '2023-10-01 22:24:06', '2023-10-01 22:24:26'),
(149, 'Clients\\Models\\Client', 8, 'MyApp', '87b21bef38374ea60a50610ec758db05622009b51fb3430fff7df8d947cf388e', '[\"*\"]', '2023-10-01 22:29:20', NULL, '2023-10-01 22:26:20', '2023-10-01 22:29:20'),
(150, 'Clients\\Models\\Client', 8, 'MyApp', '0e74ff2350075ad085e64d37a9b110ca1e3052018cd8a85c8dc1e3afa74dc463', '[\"*\"]', '2023-10-03 15:34:43', NULL, '2023-10-01 22:29:42', '2023-10-03 15:34:43'),
(151, 'Clients\\Models\\Client', 10, 'MyApp', '4229278e744725824a03e1f0acd380b185b4707ba1a30150c770f8bd1c138ef5', '[\"*\"]', NULL, NULL, '2023-10-03 21:37:52', '2023-10-03 21:37:52'),
(152, 'Clients\\Models\\Client', 8, 'MyApp', '903a7b9cfacfa5c393666c6ce1949e222c7c1f96ea657cb3a12702979f7d4d55', '[\"*\"]', '2023-10-03 22:18:56', NULL, '2023-10-03 22:17:03', '2023-10-03 22:18:56'),
(153, 'Clients\\Models\\Client', 8, 'MyApp', '5db22fcf223ffd2127f429be89daa889c2aea2083788392e1dddc2f013b39919', '[\"*\"]', '2023-10-04 22:43:05', NULL, '2023-10-04 15:33:20', '2023-10-04 22:43:05'),
(154, 'Clients\\Models\\Client', 8, 'MyApp', '9fe1f766f83fdb51225af9d400fb1fce8d0bb2b5fc83533795e5193e978bbb3b', '[\"*\"]', '2023-10-05 23:34:11', NULL, '2023-10-05 16:43:36', '2023-10-05 23:34:11'),
(155, 'Clients\\Models\\Client', 3, 'MyApp', '3b73eefc032b21f4783d1b7d897679b355bae19967f32397e035205eeedbf03e', '[\"*\"]', '2023-10-18 18:03:25', NULL, '2023-10-05 21:00:17', '2023-10-18 18:03:25'),
(156, 'Clients\\Models\\Client', 3, 'MyApp', '1df73e201be865a0bb7e232e56318afd642fe74d1454f1fa514e0d7df25c6842', '[\"*\"]', '2023-10-05 21:42:20', NULL, '2023-10-05 21:14:43', '2023-10-05 21:42:20'),
(157, 'Clients\\Models\\Client', 8, 'MyApp', 'ee78e08bc6797b320fd1a0bdab7cc98251feea38aa04cd9ba2b87a343bf3e5be', '[\"*\"]', NULL, NULL, '2023-10-08 22:32:04', '2023-10-08 22:32:04'),
(158, 'Clients\\Models\\Client', 8, 'MyApp', '796593fbe9e5fe20a451869685d8ca97857285ae3f3eda4292a116a86603d2e1', '[\"*\"]', '2023-10-09 22:43:55', NULL, '2023-10-08 22:34:37', '2023-10-09 22:43:55'),
(159, 'Clients\\Models\\Client', 8, 'MyApp', 'f32c7a7ce50b9529d1c15aeb679e46d8684e56ed1a832d280e354e3c3ea49774', '[\"*\"]', '2023-10-10 15:11:15', NULL, '2023-10-10 15:10:05', '2023-10-10 15:11:15'),
(160, 'Clients\\Models\\Client', 8, 'MyApp', '4022e56f775c06065d872a3c3c6716979f264f1efc2ef13888584ab47d0dc983', '[\"*\"]', '2023-10-10 22:35:29', NULL, '2023-10-10 15:11:40', '2023-10-10 22:35:29'),
(161, 'Clients\\Models\\Client', 8, 'MyApp', 'f8600a1f1cca99ce618b4bdf652f5457c5ca1e8b0df3c4b3425484d164380327', '[\"*\"]', '2023-10-13 00:57:08', NULL, '2023-10-11 15:01:21', '2023-10-13 00:57:08'),
(162, 'Clients\\Models\\Client', 8, 'MyApp', 'f4f2aa9d6493a1d4da8e73ed529b0267563ea5a664d848052ebbc1531fc3ae96', '[\"*\"]', '2023-10-15 16:08:44', NULL, '2023-10-13 01:08:35', '2023-10-15 16:08:44'),
(163, 'Clients\\Models\\Client', 11, 'MyApp', 'fa4be6f4ea3260cc205de6b796bca08cdf3175995c4f135f860d8aa825dd06b2', '[\"*\"]', NULL, NULL, '2023-10-13 04:00:25', '2023-10-13 04:00:25'),
(164, 'Clients\\Models\\Client', 11, 'MyApp', 'de8770e85e83fa7734000dbf726418d48cbc8e941fd776e0c13718097b630443', '[\"*\"]', '2023-10-13 04:02:13', NULL, '2023-10-13 04:01:36', '2023-10-13 04:02:13'),
(165, 'Clients\\Models\\Client', 3, 'MyApp', 'dbeadefe68b11c4e0443b802b06eeb05b2fd1cd06fa2cbee5e6825d82084010f', '[\"*\"]', '2023-10-13 04:07:56', NULL, '2023-10-13 04:03:12', '2023-10-13 04:07:56'),
(166, 'Clients\\Models\\Client', 12, 'MyApp', '58d4a97dbda836a9b976072e6932af273780eda4010be8d4d12c25fd65fb23a4', '[\"*\"]', '2023-10-14 06:00:06', NULL, '2023-10-14 05:59:43', '2023-10-14 06:00:06'),
(167, 'Clients\\Models\\Client', 12, 'MyApp', 'ce1bbe5b518839acf03bb934183b4210e34eafcd68c644f23b3af97880ff9164', '[\"*\"]', NULL, NULL, '2023-10-14 06:00:13', '2023-10-14 06:00:13'),
(168, 'Clients\\Models\\Client', 12, 'MyApp', '59db2bc1385cd0e11912c3e24bbbb2e28cea727bf299b695c7120e4f875a8b10', '[\"*\"]', NULL, NULL, '2023-10-14 06:00:14', '2023-10-14 06:00:14'),
(169, 'Clients\\Models\\Client', 12, 'MyApp', '1bd30db0d6585870f3e71e74b02fafe836a360c927fc39cfd482e406de80208f', '[\"*\"]', '2023-10-14 06:04:16', NULL, '2023-10-14 06:00:21', '2023-10-14 06:04:16'),
(170, 'Clients\\Models\\Client', 13, 'MyApp', '1d6feef058e30ccdb49da3256c1659d4b550a8f12d725bdd21ca75cd41e6a025', '[\"*\"]', NULL, NULL, '2023-10-14 06:09:56', '2023-10-14 06:09:56'),
(171, 'Clients\\Models\\Client', 14, 'MyApp', '98480b0570acc5358236ada34114ea0b07562554046ec1a6b97780b7cbe591e6', '[\"*\"]', NULL, NULL, '2023-10-14 06:15:36', '2023-10-14 06:15:36'),
(172, 'Clients\\Models\\Client', 14, 'MyApp', '84195578194bd6c270096a45008fb84de5b6f2333743c80d22198ebc882e9159', '[\"*\"]', NULL, NULL, '2023-10-14 06:15:50', '2023-10-14 06:15:50'),
(173, 'Clients\\Models\\Client', 14, 'MyApp', '57f5768ec9636e1d7e9f72602646aef1366b46bdab08e0c11c85d671b5c493cb', '[\"*\"]', NULL, NULL, '2023-10-14 06:19:15', '2023-10-14 06:19:15'),
(174, 'Clients\\Models\\Client', 14, 'MyApp', '43aa0c276b3be5934f3fe9b1725fa9b055e5ddc219573b63517b3fcb1d3263ed', '[\"*\"]', NULL, NULL, '2023-10-14 06:19:24', '2023-10-14 06:19:24'),
(175, 'Clients\\Models\\Client', 14, 'MyApp', 'e315469e97cadc33bad9f8c9d5c97baec47f6610901669d9d2035859207c1939', '[\"*\"]', '2023-10-14 06:57:39', NULL, '2023-10-14 06:19:32', '2023-10-14 06:57:39'),
(176, 'Clients\\Models\\Client', 12, 'MyApp', '90e7ed931fcfd811ca45e6aa5b06f9b281adc9346a9080cb94b059c00966b80b', '[\"*\"]', NULL, NULL, '2023-10-14 19:04:41', '2023-10-14 19:04:41'),
(177, 'Clients\\Models\\Client', 17, 'MyApp', 'c7951b1deea0f34d873998741db81b76cd398780c45839d3324fca123d5b02c2', '[\"*\"]', '2023-10-14 19:55:27', NULL, '2023-10-14 19:05:48', '2023-10-14 19:55:27'),
(178, 'Clients\\Models\\Client', 24, 'MyApp', '280c2ee020d326688a211c9933f50e0a318ef84880c81da3e292d494a9562f26', '[\"*\"]', '2023-10-15 01:15:32', NULL, '2023-10-14 20:02:56', '2023-10-15 01:15:32'),
(179, 'Clients\\Models\\Client', 25, 'MyApp', '21867e1e2d0d5d374dc9b824692b91adea7ff66d587d1edf07aebfc2398afd53', '[\"*\"]', NULL, NULL, '2023-10-15 05:24:12', '2023-10-15 05:24:12'),
(180, 'Clients\\Models\\Client', 25, 'MyApp', '3ea422895d56feecd1a85aec853eac8e76022fc14baed5047f6a9bc0ceeea335', '[\"*\"]', NULL, NULL, '2023-10-15 05:25:31', '2023-10-15 05:25:31'),
(181, 'Clients\\Models\\Client', 25, 'MyApp', '89793d57a00b474f2585e2d986d06acfe1365e9d821c4a18571b56a17ad6acc2', '[\"*\"]', NULL, NULL, '2023-10-15 05:25:49', '2023-10-15 05:25:49'),
(182, 'Clients\\Models\\Client', 25, 'MyApp', '63ff1051a3f64a3496f015249453ec6fb29aac34ca7b20d6ba95f84c5a25b80c', '[\"*\"]', NULL, NULL, '2023-10-15 05:26:57', '2023-10-15 05:26:57'),
(183, 'Clients\\Models\\Client', 3, 'MyApp', '43c640453468438eaa634e6349ed807770016c8b620972f339cae76ae2a372f3', '[\"*\"]', NULL, NULL, '2023-10-15 05:31:12', '2023-10-15 05:31:12'),
(184, 'Clients\\Models\\Client', 26, 'MyApp', 'd1f92d08bea68077ac248a6fbb894e2891583ee6a00a16a13fbbf9f93ecf9043', '[\"*\"]', '2023-10-17 16:51:47', NULL, '2023-10-15 16:14:07', '2023-10-17 16:51:47'),
(185, 'Clients\\Models\\Client', 8, 'MyApp', 'b136c5ce1f8d17ec4513facbbc4b93919c2ae3cb3f49941609a80d617229ce48', '[\"*\"]', NULL, NULL, '2023-10-15 17:37:31', '2023-10-15 17:37:31'),
(186, 'Clients\\Models\\Client', 8, 'MyApp', 'cc463587e682425ed54c06107d62d0a8e71a09aa9d3d1792008720a09590285f', '[\"*\"]', NULL, NULL, '2023-10-15 17:38:15', '2023-10-15 17:38:15'),
(187, 'Clients\\Models\\Client', 8, 'MyApp', 'b0acad374d156e40e3b93bf2f02439f14d4562207f910cb5d8fc58aed7524bfe', '[\"*\"]', NULL, NULL, '2023-10-15 17:41:35', '2023-10-15 17:41:35'),
(188, 'Clients\\Models\\Client', 8, 'MyApp', 'dd3461de29d079f0c4171cd12a3238bf8ac836c002af134e7c61cf3d6f79efb3', '[\"*\"]', NULL, NULL, '2023-10-15 17:42:31', '2023-10-15 17:42:31'),
(189, 'Clients\\Models\\Client', 8, 'MyApp', '67b4b0cce07832701e1fd96faa1556f0e143ec42a2f17bb7c042762f40188b42', '[\"*\"]', NULL, NULL, '2023-10-15 18:49:47', '2023-10-15 18:49:47'),
(190, 'Clients\\Models\\Client', 8, 'MyApp', '19079c85b8f6435661888ac0e3186d2330efb756fc880143971d5ba78f23fe13', '[\"*\"]', NULL, NULL, '2023-10-15 18:50:27', '2023-10-15 18:50:27'),
(191, 'Clients\\Models\\Client', 8, 'MyApp', '3ab75d611e9ef3ad682818fe8ce3b73b06277495832a80d8a01a6adcafdbced1', '[\"*\"]', NULL, NULL, '2023-10-15 18:52:21', '2023-10-15 18:52:21'),
(192, 'Clients\\Models\\Client', 26, 'MyApp', 'a9a944844dd57170b911b088ea39d436eb26aa3aec27f8399bdd02416789d6e4', '[\"*\"]', NULL, NULL, '2023-10-15 19:09:11', '2023-10-15 19:09:11'),
(193, 'Clients\\Models\\Client', 26, 'MyApp', '497a1168fc7bd4622f578732a5aec11281243d2c580cf8d7d0b5bab0d6e35598', '[\"*\"]', NULL, NULL, '2023-10-15 19:10:23', '2023-10-15 19:10:23'),
(194, 'Clients\\Models\\Client', 26, 'MyApp', '0557bf01d40affdfa309721f03425fa2d704e9de1612284be0e22a9e18a76d6e', '[\"*\"]', NULL, NULL, '2023-10-15 19:10:27', '2023-10-15 19:10:27'),
(195, 'Clients\\Models\\Client', 26, 'MyApp', '7199ce1b609ae355fa6ea8c8bae30145c64df1d82532802c40b74dd7abf64fa0', '[\"*\"]', NULL, NULL, '2023-10-15 19:10:31', '2023-10-15 19:10:31'),
(196, 'Clients\\Models\\Client', 26, 'MyApp', '3799dacc819927fea4de89d88af3a2867247e78ae3897364feb0ac16fca6bebc', '[\"*\"]', NULL, NULL, '2023-10-15 19:10:34', '2023-10-15 19:10:34'),
(197, 'Clients\\Models\\Client', 3, 'API TOKEN', 'a136b5d1299b0e722dc24f8bcc54f45be4b665557ebceadb4ec0918b31c5eac6', '[\"*\"]', NULL, NULL, '2023-10-15 20:49:40', '2023-10-15 20:49:40'),
(198, 'Clients\\Models\\Client', 8, 'API TOKEN', '2decaa88b12947e986518b95bbb4386d4942beb299a711a3c37c577763d067e9', '[\"*\"]', NULL, NULL, '2023-10-16 15:56:33', '2023-10-16 15:56:33'),
(199, 'Clients\\Models\\Client', 3, 'API TOKEN', 'fa9c56358ea2742f740042a3fae273ef8f88ae2f2e637858fc41220202e80fae', '[\"*\"]', '2023-10-16 18:26:43', NULL, '2023-10-16 15:57:41', '2023-10-16 18:26:43'),
(200, 'Clients\\Models\\Client', 26, 'API TOKEN', 'daf32ef00c932e6655b6064c92539da92011307f70bc5d0d542f68af9710a3b9', '[\"*\"]', NULL, NULL, '2023-10-16 16:07:41', '2023-10-16 16:07:41'),
(201, 'Clients\\Models\\Client', 27, 'API TOKEN', '0a3a8a90d0f5576eb5b3327d6cae5167afc6a9f195d954c29e5d9fbfd562d945', '[\"*\"]', '2023-10-16 16:10:45', NULL, '2023-10-16 16:08:38', '2023-10-16 16:10:45'),
(202, 'Clients\\Models\\Client', 27, 'API TOKEN', '4a25920147d6c80642bfdb9999002362ef4c31a2e8fa5963b4d87a6fb64a8834', '[\"*\"]', '2023-10-16 16:11:45', NULL, '2023-10-16 16:11:36', '2023-10-16 16:11:45'),
(203, 'Clients\\Models\\Client', 3, 'API TOKEN', '784e4ef9919688b13a93d7161609872bde09aee2fbe7f3efc7df29aa34763454', '[\"*\"]', '2023-10-16 18:26:56', NULL, '2023-10-16 18:26:33', '2023-10-16 18:26:56'),
(204, 'Clients\\Models\\Client', 3, 'API TOKEN', 'fa63d5f6ae798eba081f6b2c30cd569b9e7daa1922f63e9dd6cc897b1c0284a5', '[\"*\"]', NULL, NULL, '2023-10-16 18:59:14', '2023-10-16 18:59:14'),
(205, 'Clients\\Models\\Client', 3, 'API TOKEN', '5db2cb2ac6f68699405e7c5c0c38079b1d0072ad5c729cee8c3e89adc3837c2e', '[\"*\"]', NULL, NULL, '2023-10-16 19:00:03', '2023-10-16 19:00:03'),
(206, 'Clients\\Models\\Client', 3, 'API TOKEN', 'c6af40b7528202c072fc0c68422ba073675a94dfa020e3e0bbcec6ed1c9afda6', '[\"*\"]', NULL, NULL, '2023-10-16 19:01:52', '2023-10-16 19:01:52'),
(207, 'Clients\\Models\\Client', 3, 'API TOKEN', 'b82d858deb4d9d68bb3476c7ccd262ccb7406f5600d88d1b88e7c0d1ab897d5f', '[\"*\"]', NULL, NULL, '2023-10-16 19:01:54', '2023-10-16 19:01:54'),
(208, 'Clients\\Models\\Client', 3, 'API TOKEN', '2ebfb2e9e7b29ef20e899586b3dc1342f9fd25fad9b539bbf81b581f934642f1', '[\"*\"]', NULL, NULL, '2023-10-16 19:01:55', '2023-10-16 19:01:55'),
(209, 'Clients\\Models\\Client', 3, 'API TOKEN', '38af77e085a8ac1a0a37526fc89f52d134396d03622dbafa91b2603e29eee95d', '[\"*\"]', NULL, NULL, '2023-10-16 19:01:56', '2023-10-16 19:01:56'),
(210, 'Clients\\Models\\Client', 3, 'API TOKEN', '306dd0af46e998830dbef7018a1a9b2e456d66a43b100659dd5a74a56d5e070f', '[\"*\"]', NULL, NULL, '2023-10-16 19:01:57', '2023-10-16 19:01:57'),
(211, 'Clients\\Models\\Client', 3, 'API TOKEN', 'f4761273269df57ff4df645cd4ced77aa679fe0de884a0005900dc3542e8e42c', '[\"*\"]', NULL, NULL, '2023-10-16 19:01:58', '2023-10-16 19:01:58'),
(212, 'Clients\\Models\\Client', 3, 'API TOKEN', 'e86fae9bc74740bfd58eb78b53b6c5daf701d51c515802feea252e3dc555e248', '[\"*\"]', NULL, NULL, '2023-10-16 19:01:59', '2023-10-16 19:01:59'),
(213, 'Clients\\Models\\Client', 3, 'API TOKEN', '30528f5c89591a5f1b1997154a43e2026e3114dadf5b3b81c6058508df44d1c0', '[\"*\"]', NULL, NULL, '2023-10-16 19:02:03', '2023-10-16 19:02:03'),
(214, 'Clients\\Models\\Client', 3, 'API TOKEN', 'bc3c44b909f5811da8f31316c20ad793830de5e96fb4a81da57908f9f0b725f8', '[\"*\"]', NULL, NULL, '2023-10-16 19:26:53', '2023-10-16 19:26:53'),
(215, 'Clients\\Models\\Client', 28, 'API TOKEN', '8bca05685bf6d919612923e446fe9561abc83390f3da733f1d8c42c412b55d7c', '[\"*\"]', NULL, NULL, '2023-10-16 20:02:44', '2023-10-16 20:02:44'),
(216, 'Clients\\Models\\Client', 29, 'API TOKEN', '789f9af9ca9b0b61afe2b37e34d87bc1f485898e1b95cc25b523eab2e2124ffd', '[\"*\"]', NULL, NULL, '2023-10-16 20:05:36', '2023-10-16 20:05:36'),
(217, 'Clients\\Models\\Client', 29, 'API TOKEN', '9bfcff2ebabc045101de87bb8a3b5d101bf5271b2e48f56a9da2a929ff815d9c', '[\"*\"]', '2023-10-16 20:29:52', NULL, '2023-10-16 20:07:43', '2023-10-16 20:29:52'),
(218, 'Clients\\Models\\Client', 8, 'API TOKEN', '787a521dff7ade076d7062dd1df07f2b3fa214c42e317b5f02250361132b6fe6', '[\"*\"]', '2023-10-16 21:10:54', NULL, '2023-10-16 21:09:48', '2023-10-16 21:10:54'),
(219, 'Clients\\Models\\Client', 8, 'API TOKEN', 'bfb513ec34054286a52b007302c01af1a793c41ccc037ac85bc67b14dd47529d', '[\"*\"]', '2023-10-17 17:55:58', NULL, '2023-10-16 21:22:25', '2023-10-17 17:55:58'),
(220, 'Clients\\Models\\Client', 3, 'API TOKEN', '1a85f7bee39db7a24a7e111130ec0584045548859bead4833d688b4a40f98df0', '[\"*\"]', NULL, NULL, '2023-10-17 16:31:38', '2023-10-17 16:31:38'),
(221, 'Clients\\Models\\Client', 3, 'API TOKEN', '5a9e54cca99a0e04900fe5ffcedc28a829b1627ccd421eb99b8817d79eb90074', '[\"*\"]', NULL, NULL, '2023-10-17 16:47:39', '2023-10-17 16:47:39'),
(222, 'Clients\\Models\\Client', 3, 'API TOKEN', '416c38ab800f2f1cc857c45c6093dadbb346742f2eea9eaccd33a05d41dae163', '[\"*\"]', NULL, NULL, '2023-10-17 16:47:57', '2023-10-17 16:47:57'),
(223, 'Clients\\Models\\Client', 3, 'API TOKEN', '1a331a1bc8b6f9c88ffe1c280ee3224b5bbf92bea3bd6d585b15779ecf38e4fd', '[\"*\"]', NULL, NULL, '2023-10-17 22:03:44', '2023-10-17 22:03:44'),
(224, 'Clients\\Models\\Client', 3, 'API TOKEN', 'ccb87e63b189cebfc4e05d838cf67d221cd6097b41c9745e6103ed3b7c589026', '[\"*\"]', NULL, NULL, '2023-10-17 22:06:06', '2023-10-17 22:06:06'),
(225, 'Clients\\Models\\Client', 3, 'API TOKEN', 'b1c44ccdda9dd622ed7961f8a3bec809891fd144b46fea54c2495dba01557aa8', '[\"*\"]', NULL, NULL, '2023-10-17 22:09:36', '2023-10-17 22:09:36'),
(226, 'Clients\\Models\\Client', 3, 'API TOKEN', 'ba66eed7a506e75dd7fa6cb57997682f61f9d48ec2f58b28d9e4470888d206fa', '[\"*\"]', NULL, NULL, '2023-10-17 22:29:51', '2023-10-17 22:29:51'),
(227, 'Clients\\Models\\Client', 3, 'API TOKEN', '519b7a6523d2893b0c226c6ad3533fd87f0a715292e693e49631761f205c2483', '[\"*\"]', NULL, NULL, '2023-10-18 17:19:13', '2023-10-18 17:19:13'),
(228, 'Clients\\Models\\Client', 30, 'API TOKEN', '54694fdd222b886feb905f89079111a86a484e0228cd7ba89e2f55583aedc4bf', '[\"*\"]', NULL, NULL, '2023-10-18 17:19:25', '2023-10-18 17:19:25'),
(229, 'Clients\\Models\\Client', 31, 'API TOKEN', '26eccd058700f7894c728e27cba99ee317bc660199081eea69e7befe558d962f', '[\"*\"]', NULL, NULL, '2023-10-18 20:17:53', '2023-10-18 20:17:53'),
(230, 'Clients\\Models\\Client', 32, 'API TOKEN', '338e3c99849c71b24cc207799d985587bd1931029623d36a7141f88800ade4a6', '[\"*\"]', NULL, NULL, '2023-10-18 20:36:12', '2023-10-18 20:36:12'),
(231, 'Clients\\Models\\Client', 32, 'API TOKEN', '8cace1091a23075f51e1ebf148a76f884ad759defaf0c49ceecf8251f96216e7', '[\"*\"]', NULL, NULL, '2023-10-18 20:38:42', '2023-10-18 20:38:42'),
(232, 'Clients\\Models\\Client', 33, 'API TOKEN', '4e8120da5af6919fa91a65eea056acac0ca918acb1cda8b11ba5b2293fdb4cf7', '[\"*\"]', NULL, NULL, '2023-10-18 20:39:37', '2023-10-18 20:39:37'),
(233, 'Clients\\Models\\Client', 33, 'API TOKEN', '2cf0676ce872041bc8229d4267d5a45f802ffefb31c6a2ff157ff02647bcb2af', '[\"*\"]', '2023-10-18 20:45:31', NULL, '2023-10-18 20:39:37', '2023-10-18 20:45:31'),
(234, 'Clients\\Models\\Client', 33, 'API TOKEN', 'f83c9b5b3a13a741eb451cb7629f429b36a2fd3d8c27a71b28fe669e862f25c1', '[\"*\"]', NULL, NULL, '2023-10-18 20:40:13', '2023-10-18 20:40:13'),
(235, 'Clients\\Models\\Client', 33, 'API TOKEN', 'ed71e92614caa24186908a27d914965a45637c78eadcb28ce876239769b5a25a', '[\"*\"]', NULL, NULL, '2023-10-18 20:44:25', '2023-10-18 20:44:25'),
(236, 'Clients\\Models\\Client', 33, 'API TOKEN', '467c1bcb98c1ec4a5f7b221818c3a7e3ac82b500402fd995057a18d2f2723980', '[\"*\"]', NULL, NULL, '2023-10-18 20:45:17', '2023-10-18 20:45:17'),
(237, 'Clients\\Models\\Client', 33, 'API TOKEN', '449bf4049e326f91b54485bef39de9cfd50d22f1add2b0a29014ffb65006f44b', '[\"*\"]', NULL, NULL, '2023-10-18 21:43:16', '2023-10-18 21:43:16'),
(238, 'Clients\\Models\\Client', 36, 'API TOKEN', 'be7a150414ae24c8b040b2e1ef7959725d211039e1b5ab3cf0754cc0a679ccab', '[\"*\"]', NULL, NULL, '2023-10-22 15:46:22', '2023-10-22 15:46:22'),
(239, 'Clients\\Models\\Client', 36, 'API TOKEN', 'c7fb9c5ad86e53cc93f538b6a39a2b590123bda9452830958a55869132f600c4', '[\"*\"]', NULL, NULL, '2023-10-22 16:38:16', '2023-10-22 16:38:16'),
(240, 'Clients\\Models\\Client', 38, 'API TOKEN', 'c9d01ed3867b8d0886a26f0ed923ddd01b29a4ccc9e4985ddb946af56a00fb30', '[\"*\"]', NULL, NULL, '2023-10-22 16:39:23', '2023-10-22 16:39:23'),
(241, 'Clients\\Models\\Client', 36, 'API TOKEN', '33cbee6484d9fbbb34be6ea4938ad1f464201011bc54a118da5a7fc36963e787', '[\"*\"]', NULL, NULL, '2023-10-22 16:39:37', '2023-10-22 16:39:37'),
(242, 'Clients\\Models\\Client', 38, 'API TOKEN', 'a53114e25248598ade460d837cdaf7557dcf70626060abccd88904bfa9016c24', '[\"*\"]', '2023-10-22 16:42:27', NULL, '2023-10-22 16:39:48', '2023-10-22 16:42:27'),
(243, 'Clients\\Models\\Client', 38, 'API TOKEN', '7e12d877871351a21f7930647dd9bd997389df91136e5e50415adb9596af53cc', '[\"*\"]', NULL, NULL, '2023-10-22 17:13:29', '2023-10-22 17:13:29'),
(244, 'Clients\\Models\\Client', 39, 'API TOKEN', '6c24179a2ae440fa3484f8b7fd1d2d78e689a77f4a5cef0704c0c8c84af67d88', '[\"*\"]', NULL, NULL, '2023-10-22 17:17:42', '2023-10-22 17:17:42'),
(245, 'Clients\\Models\\Client', 39, 'API TOKEN', '2c25f4560317442194d51d4cb4b16d07982feb9e1598da0e3e65ba076991c940', '[\"*\"]', NULL, NULL, '2023-10-22 17:18:00', '2023-10-22 17:18:00'),
(246, 'Clients\\Models\\Client', 40, 'API TOKEN', '6ce044533ceca0ae3e5facdf391c35f624ae39ba30e3b6dd8cba87c0c5321c8d', '[\"*\"]', NULL, NULL, '2023-10-22 17:18:38', '2023-10-22 17:18:38'),
(247, 'Clients\\Models\\Client', 39, 'API TOKEN', '9ca4f42edfd12b421944c09b6ccb24265263ffbe223d80a7112f9b4ea3f23d66', '[\"*\"]', NULL, NULL, '2023-10-22 17:19:13', '2023-10-22 17:19:13'),
(248, 'Clients\\Models\\Client', 39, 'API TOKEN', '16c18b0a06d89b16ea8e058aa5339448532dea5ea7cbd176057cfac85262d564', '[\"*\"]', NULL, NULL, '2023-10-22 17:19:16', '2023-10-22 17:19:16'),
(249, 'Clients\\Models\\Client', 40, 'API TOKEN', '1fb0c26e6dec771a1b3ec19e07bc62bbee0bbaab9e633c08c3347018c45b71c0', '[\"*\"]', NULL, NULL, '2023-10-22 17:19:19', '2023-10-22 17:19:19'),
(250, 'Clients\\Models\\Client', 40, 'API TOKEN', 'ade8210b542c58c52466b64c3918aff4b661ada55fc04cd2377ff32b6b112205', '[\"*\"]', NULL, NULL, '2023-10-22 17:22:00', '2023-10-22 17:22:00'),
(251, 'Clients\\Models\\Client', 40, 'API TOKEN', '826f2e15ff0f2789fee2a2451b3a38139c9f9e186e0394fe2517ba01a7a8d406', '[\"*\"]', NULL, NULL, '2023-10-22 17:29:36', '2023-10-22 17:29:36'),
(252, 'Clients\\Models\\Client', 41, 'API TOKEN', 'e15a594ef0caba9af487abc89eae87afac11e6f2e8b554b5d4cc0e4474c054af', '[\"*\"]', NULL, NULL, '2023-10-22 17:30:40', '2023-10-22 17:30:40'),
(253, 'Clients\\Models\\Client', 41, 'API TOKEN', '5fe55618462b9f0458fb7d4ba80f22bb437cdde714d7583c4b834579e34dd54c', '[\"*\"]', NULL, NULL, '2023-10-22 17:31:43', '2023-10-22 17:31:43'),
(254, 'Clients\\Models\\Client', 42, 'API TOKEN', '544b2b6a71052cca498625545359440810a3c0e3a70ff90b89fc913f74960919', '[\"*\"]', NULL, NULL, '2023-10-22 17:32:39', '2023-10-22 17:32:39'),
(255, 'Clients\\Models\\Client', 40, 'API TOKEN', '349da955e46aa54061f43165d30320c6d32e81e21b65ada583cb895b5ff47975', '[\"*\"]', NULL, NULL, '2023-10-22 17:36:39', '2023-10-22 17:36:39'),
(256, 'Clients\\Models\\Client', 40, 'API TOKEN', 'ac25c83fa2f62b92a216f21ee073735405f6814c024dd942a90203989f45e419', '[\"*\"]', NULL, NULL, '2023-10-22 17:38:14', '2023-10-22 17:38:14'),
(257, 'Clients\\Models\\Client', 40, 'API TOKEN', 'd1a0afa9c7308e452dc681b1cd4072c12d05ac769a47fabba55ecf736f02213f', '[\"*\"]', NULL, NULL, '2023-10-22 17:43:20', '2023-10-22 17:43:20'),
(258, 'Clients\\Models\\Client', 43, 'API TOKEN', '4414272397e48af3ac777c87f1186fd6a729e335b0c641f0280d2a3eca00a034', '[\"*\"]', NULL, NULL, '2023-10-22 17:43:57', '2023-10-22 17:43:57'),
(259, 'Clients\\Models\\Client', 43, 'API TOKEN', 'a42d27ebc5256269212734edd48970ac853c1506871f02dc826878401adb0450', '[\"*\"]', '2023-10-22 18:43:31', NULL, '2023-10-22 17:44:03', '2023-10-22 18:43:31'),
(260, 'Clients\\Models\\Client', 44, 'API TOKEN', '2e5686c18be2bfa53105e980b82799b823af047fa42a05372c1eca24ed975316', '[\"*\"]', NULL, NULL, '2023-10-22 17:45:45', '2023-10-22 17:45:45'),
(261, 'Clients\\Models\\Client', 45, 'API TOKEN', 'c8af0a9e94a2bbddd3015383fcabb570762efba3dd8cdcb32b681d53716a1e5b', '[\"*\"]', NULL, NULL, '2023-10-22 18:18:40', '2023-10-22 18:18:40'),
(262, 'Clients\\Models\\Client', 45, 'API TOKEN', '2d38bcc27d20fa6c182e015b40862945ecc3ea80bac4ad6788b96a264c921b88', '[\"*\"]', NULL, NULL, '2023-10-22 18:18:40', '2023-10-22 18:18:40'),
(263, 'Clients\\Models\\Client', 46, 'API TOKEN', '3e434231b4ad8964a3d0a2d92d5664af01e8b1c4206585a663de1d745e5c7296', '[\"*\"]', NULL, NULL, '2023-10-22 18:18:51', '2023-10-22 18:18:51'),
(264, 'Clients\\Models\\Client', 46, 'API TOKEN', '25dc6e66591d9fdf7ad48a2504ec6a498f1eeb149e5a455168669b71e0c2815c', '[\"*\"]', NULL, NULL, '2023-10-22 18:18:51', '2023-10-22 18:18:51'),
(265, 'Clients\\Models\\Client', 47, 'API TOKEN', '0c627f64f3204a149690693d6716221c3a2339766c85550673fdd3c45e22ed0b', '[\"*\"]', NULL, NULL, '2023-10-22 18:18:58', '2023-10-22 18:18:58'),
(266, 'Clients\\Models\\Client', 47, 'API TOKEN', '719f4b245199946498ff18344bed59fe7c4fa30856748a65c85d5a83dfbec715', '[\"*\"]', NULL, NULL, '2023-10-22 18:18:58', '2023-10-22 18:18:58'),
(267, 'Clients\\Models\\Client', 48, 'API TOKEN', '1ef988dc98e1439aac258b89dfe7842c3c412f170523b66f7916518b4c7c8b6a', '[\"*\"]', NULL, NULL, '2023-10-22 18:19:07', '2023-10-22 18:19:07'),
(268, 'Clients\\Models\\Client', 48, 'API TOKEN', '54bf9977824f15663be5d2f6e391535f82228bb373fc52f41ef09d11174d0776', '[\"*\"]', NULL, NULL, '2023-10-22 18:19:08', '2023-10-22 18:19:08');
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(269, 'Clients\\Models\\Client', 43, 'API TOKEN', '4eb6d5baa16707c3d7875d9917dabc65537a555796d7df1c864ef303f992bf1b', '[\"*\"]', '2023-10-22 20:28:51', NULL, '2023-10-22 19:15:35', '2023-10-22 20:28:51'),
(270, 'Clients\\Models\\Client', 43, 'API TOKEN', '5000129e650f5f36f9bd0ccfb1ab68e5e658a91bf5c5a9f8bbf84538876e1a54', '[\"*\"]', '2023-10-23 21:19:59', NULL, '2023-10-22 20:30:34', '2023-10-23 21:19:59'),
(271, 'Clients\\Models\\Client', 36, 'API TOKEN', 'd471072d02f39da5b117c90f23b4a93ee6ec8d43aee2615d4de92aaf4a778cbe', '[\"*\"]', '2023-10-29 06:06:26', NULL, '2023-10-22 23:47:07', '2023-10-29 06:06:26'),
(272, 'Clients\\Models\\Client', 43, 'API TOKEN', '3cb4d44bde79e25661dd32c1bc37ebbaeb9fb1d4f698e3f6fb7f1e06fafd90b2', '[\"*\"]', '2023-10-24 17:58:25', NULL, '2023-10-23 18:29:51', '2023-10-24 17:58:25'),
(273, 'Clients\\Models\\Client', 43, 'API TOKEN', '2046a2629c136dae884c1239ad26abf3470e8f2e9b6365b86f3fb491167b5015', '[\"*\"]', '2023-10-23 23:00:10', NULL, '2023-10-23 18:31:46', '2023-10-23 23:00:10'),
(274, 'Clients\\Models\\Client', 49, 'API TOKEN', 'fb424ab9012d92a52f6ceb6543b4abf46634ed665d921d99960f5def71b80a9e', '[\"*\"]', NULL, NULL, '2023-10-23 20:19:03', '2023-10-23 20:19:03'),
(275, 'Clients\\Models\\Client', 49, 'API TOKEN', '611a84e2b1743cd9647a3199eac91be0163447780a7f5ef17e7bd1b5fd7e8fbd', '[\"*\"]', NULL, NULL, '2023-10-23 20:19:03', '2023-10-23 20:19:03'),
(276, 'Clients\\Models\\Client', 49, 'API TOKEN', 'faa0f5e02f81d21960217ef95065b051a7b05f15bded9266c23404c76794dbad', '[\"*\"]', '2023-10-23 20:22:21', NULL, '2023-10-23 20:22:14', '2023-10-23 20:22:21'),
(277, 'Clients\\Models\\Client', 49, 'API TOKEN', '8189816e9e31fd3d7e0536ba635d10e68ed8fd80fd0572d75e3875b1650ca9cb', '[\"*\"]', '2023-10-23 20:25:28', NULL, '2023-10-23 20:24:32', '2023-10-23 20:25:28'),
(278, 'Clients\\Models\\Client', 49, 'API TOKEN', 'fc044945b999593a56127998abe230c98bd0077a384a4e7a384073ecb65b13a0', '[\"*\"]', NULL, NULL, '2023-10-23 20:27:13', '2023-10-23 20:27:13'),
(279, 'Clients\\Models\\Client', 50, 'API TOKEN', '7010550ccceae24cd9ba95d334ab0bbccf718ffe167ada2e6985c89f0a93d969', '[\"*\"]', NULL, NULL, '2023-10-23 20:28:19', '2023-10-23 20:28:19'),
(280, 'Clients\\Models\\Client', 50, 'API TOKEN', 'cd411b3a5d1c02e45f84d6120eabd4447b4d6a83200a4323ac7e45062c448858', '[\"*\"]', NULL, NULL, '2023-10-23 20:28:19', '2023-10-23 20:28:19'),
(281, 'Clients\\Models\\Client', 51, 'API TOKEN', 'e34341f542c568d3326bebc6c2dc8bfca9a80df8e4c627b10b4767c1b754ca81', '[\"*\"]', NULL, NULL, '2023-10-23 20:30:13', '2023-10-23 20:30:13'),
(282, 'Clients\\Models\\Client', 51, 'API TOKEN', 'cb77c81c6aede12a69af5e366e40f3e8f66baa83259f45a214e7c4d244ba67c6', '[\"*\"]', NULL, NULL, '2023-10-23 20:30:13', '2023-10-23 20:30:13'),
(283, 'Clients\\Models\\Client', 49, 'API TOKEN', 'f6ab3c9f2e8a6f5ac25c31e79280e86f2f0d7f3fb085303ddcc41161158d0a00', '[\"*\"]', '2023-10-23 21:02:15', NULL, '2023-10-23 20:30:51', '2023-10-23 21:02:15'),
(284, 'Clients\\Models\\Client', 43, 'API TOKEN', '80a892cfbca23559cb42555bb11d50cbd0cb9827282d25bcd18bd011c688e97f', '[\"*\"]', NULL, NULL, '2023-10-23 22:15:01', '2023-10-23 22:15:01'),
(285, 'Clients\\Models\\Client', 43, 'API TOKEN', 'c852e65ac060aaf37f56dfd47740420cf09036bb70fbbaa7b98ca433a1afda8c', '[\"*\"]', '2023-10-26 15:36:51', NULL, '2023-10-25 21:50:36', '2023-10-26 15:36:51'),
(286, 'Clients\\Models\\Client', 49, 'API TOKEN', '57ef066b498749ffc5bcc582bd6e391b56f0ca18178dd064a7ea17072179b559', '[\"*\"]', NULL, NULL, '2023-10-26 00:03:51', '2023-10-26 00:03:51'),
(287, 'Clients\\Models\\Client', 49, 'API TOKEN', 'afeaa90e60fb2bab53c8b2a965bab0cbaede14f0f306af032748ce2c7da76f55', '[\"*\"]', '2023-10-26 00:40:14', NULL, '2023-10-26 00:39:49', '2023-10-26 00:40:14'),
(288, 'Clients\\Models\\Client', 52, 'API TOKEN', 'e8598449d03d8458e7fcd8d84ba2ba24b43687235e152a382e162fcb8f485418', '[\"*\"]', NULL, NULL, '2023-10-26 00:40:39', '2023-10-26 00:40:39'),
(289, 'Clients\\Models\\Client', 52, 'API TOKEN', 'b195a946fb021796fac021201d5aade5a7f0d6a5bfedb1de78a02c752f82bf6c', '[\"*\"]', '2023-10-27 06:11:59', NULL, '2023-10-26 00:40:44', '2023-10-27 06:11:59'),
(290, 'Clients\\Models\\Client', 36, 'API TOKEN', '0dc66529d9d479c55078a826029762dff9146fc2d1e33df679e60d68877f672a', '[\"*\"]', '2023-11-06 17:24:16', NULL, '2023-10-26 16:21:25', '2023-11-06 17:24:16'),
(291, 'Clients\\Models\\Client', 43, 'API TOKEN', 'b84ad45bad2a66488fd5831d974659e3d5678a53a940229be08b5627c33fc4e5', '[\"*\"]', '2023-10-26 18:04:27', NULL, '2023-10-26 16:27:34', '2023-10-26 18:04:27'),
(292, 'Clients\\Models\\Client', 43, 'API TOKEN', 'c5e88da6b6a9f88ae47fe15328a42099491a3124d9e6f5392e052e971762f56c', '[\"*\"]', '2023-10-31 16:23:24', NULL, '2023-10-26 18:20:33', '2023-10-31 16:23:24'),
(293, 'Clients\\Models\\Client', 53, 'API TOKEN', '529a9e696ef5616cbbf2b03466d9d61744c1a8f650a4ef3c6478238843ca5613', '[\"*\"]', NULL, NULL, '2023-10-27 14:23:56', '2023-10-27 14:23:56'),
(294, 'Clients\\Models\\Client', 53, 'API TOKEN', '7020c01dd4e506deb50c87c674a3d33e1c82145b647eb357ada42655b71f1a54', '[\"*\"]', NULL, NULL, '2023-10-27 14:24:03', '2023-10-27 14:24:03'),
(295, 'Clients\\Models\\Client', 36, 'API TOKEN', '33a9338b606320e930dea8e614b55da000f73e39831efc99904a5108ef017909', '[\"*\"]', '2023-10-27 14:26:47', NULL, '2023-10-27 14:24:38', '2023-10-27 14:26:47'),
(296, 'Clients\\Models\\Client', 36, 'API TOKEN', 'ba6fa0f0d86532bf2e5598232fb9c5430935c6941a4c5890ab4845bce3c9fd0d', '[\"*\"]', '2023-10-31 17:13:01', NULL, '2023-10-29 05:59:39', '2023-10-31 17:13:01'),
(297, 'Clients\\Models\\Client', 36, 'API TOKEN', 'e437ed8254efdd4becf2ad29b2d15e336a89c27bda4835777d706f34b6aa780e', '[\"*\"]', '2023-11-05 20:51:15', NULL, '2023-10-29 18:11:54', '2023-11-05 20:51:15'),
(298, 'Clients\\Models\\Client', 36, 'API TOKEN', '24e8b0f8ec12fdf6a172c84af1e0cef2246df832530e5c9830fee756915f1f67', '[\"*\"]', NULL, NULL, '2023-10-29 18:43:34', '2023-10-29 18:43:34'),
(299, 'Clients\\Models\\Client', 36, 'API TOKEN', '294083c04767c477e48c5af39173578f24bed4cfc683bde0f5cbe63d377a548d', '[\"*\"]', '2023-10-31 05:47:15', NULL, '2023-10-29 19:01:12', '2023-10-31 05:47:15'),
(300, 'Clients\\Models\\Client', 55, 'API TOKEN', '2c4bd44806d5eac103665cacbbdfc51a173b231ac4aa9f3890ec852b427319d1', '[\"*\"]', NULL, NULL, '2023-10-30 19:01:07', '2023-10-30 19:01:07'),
(301, 'Clients\\Models\\Client', 56, 'API TOKEN', '3b04b1ae13cbaef2af596a3e2f41d9c6b6c28445082f3b9ad068f0cec1e07ab0', '[\"*\"]', NULL, NULL, '2023-10-30 19:01:33', '2023-10-30 19:01:33'),
(302, 'Clients\\Models\\Client', 36, 'API TOKEN', 'ad990d14138ee0fa4541801e6a6420cff2b4f4a13357ae699481832e53842847', '[\"*\"]', NULL, NULL, '2023-10-31 15:58:11', '2023-10-31 15:58:11'),
(303, 'Clients\\Models\\Client', 36, 'API TOKEN', '34bde15ba8819d4ff4fb6a58586ebb7c72574433622e07b97c8de88d0868f704', '[\"*\"]', NULL, NULL, '2023-10-31 16:00:09', '2023-10-31 16:00:09'),
(304, 'Clients\\Models\\Client', 36, 'API TOKEN', '06e395266da12f5575bac2de55f1b7889f6e1f5b3d302aec46ae76b6b7545702', '[\"*\"]', NULL, NULL, '2023-10-31 16:00:10', '2023-10-31 16:00:10'),
(305, 'Clients\\Models\\Client', 58, 'API TOKEN', '34bb64df1383d1e2e53539b195cba8facc4ee2472d951cab9b3c6d5390269b86', '[\"*\"]', NULL, NULL, '2023-10-31 16:00:58', '2023-10-31 16:00:58'),
(306, 'Clients\\Models\\Client', 59, 'API TOKEN', 'ea4921b0906126a6220c564bdd954a7d084c6524160a46aef5025fbbcad9a8ac', '[\"*\"]', NULL, NULL, '2023-10-31 16:03:38', '2023-10-31 16:03:38'),
(307, 'Clients\\Models\\Client', 59, 'API TOKEN', 'addc3d22775945623aa61c8ce69635ea0654d1dc3c65c971b04533d7b66b086f', '[\"*\"]', NULL, NULL, '2023-10-31 16:05:32', '2023-10-31 16:05:32'),
(308, 'Clients\\Models\\Client', 59, 'API TOKEN', 'd627d995745cbf2f8315fc2ea70dbc149d4a782abd6db6c10e025f363a06836e', '[\"*\"]', NULL, NULL, '2023-10-31 16:10:12', '2023-10-31 16:10:12'),
(309, 'Clients\\Models\\Client', 59, 'API TOKEN', 'af2eb5e0f870ed462691ec56018189de0c8b1bbbcca8c462d2cf60478fa03c99', '[\"*\"]', NULL, NULL, '2023-10-31 16:11:06', '2023-10-31 16:11:06'),
(310, 'Clients\\Models\\Client', 58, 'API TOKEN', 'dab365fb30ea9f2a3b969907745c4ccde73cd18b6512baa44fb3bef3b5421edc', '[\"*\"]', NULL, NULL, '2023-10-31 16:11:46', '2023-10-31 16:11:46'),
(311, 'Clients\\Models\\Client', 36, 'API TOKEN', '1a14fd15346b21136102e6a444f8b147daebb73e2065932c27c1c9ae5f5725b6', '[\"*\"]', NULL, NULL, '2023-10-31 16:12:00', '2023-10-31 16:12:00'),
(312, 'Clients\\Models\\Client', 61, 'API TOKEN', 'fd24494a3dbf1b37e0bcbe86dddf647ae49f5fc7ce7f274f907f66b85a4b206c', '[\"*\"]', NULL, NULL, '2023-10-31 16:15:53', '2023-10-31 16:15:53'),
(313, 'Clients\\Models\\Client', 61, 'API TOKEN', '28af814831219de991c8d253c5865daf71d08c2b10453c5d74b0cb090fe5fca8', '[\"*\"]', '2023-10-31 16:17:03', NULL, '2023-10-31 16:15:53', '2023-10-31 16:17:03'),
(314, 'Clients\\Models\\Client', 62, 'API TOKEN', '5aeef19c811bc6e516775be4aff429126edc2910ceb5d3ac16eb72121f78ef29', '[\"*\"]', NULL, NULL, '2023-10-31 16:18:38', '2023-10-31 16:18:38'),
(315, 'Clients\\Models\\Client', 62, 'API TOKEN', '118b593ebae252fd3a1cb4aba9384241d90fa88988c2d133317531789c68de90', '[\"*\"]', NULL, NULL, '2023-10-31 16:18:38', '2023-10-31 16:18:38'),
(316, 'Clients\\Models\\Client', 63, 'API TOKEN', '65e712c807999315ae0f620d8159293b5ca2117e85c06cbe79f7b67cc6b93467', '[\"*\"]', NULL, NULL, '2023-10-31 16:22:21', '2023-10-31 16:22:21'),
(317, 'Clients\\Models\\Client', 63, 'API TOKEN', '2c7aa399bface3c6fc3be1eec6a5301221a0a9079f451531afe4e00766c990f4', '[\"*\"]', NULL, NULL, '2023-10-31 16:22:21', '2023-10-31 16:22:21'),
(318, 'Clients\\Models\\Client', 64, 'API TOKEN', 'b074f15d9808da75df101a17fefc4f87c7d3351a4a49aa4e41e26f6ae9828dfd', '[\"*\"]', NULL, NULL, '2023-10-31 16:23:27', '2023-10-31 16:23:27'),
(319, 'Clients\\Models\\Client', 64, 'API TOKEN', 'c97c7b5b37b2b13df1b458817ac8e45bf0b87772187bcbba8361770d7bf1f39b', '[\"*\"]', NULL, NULL, '2023-10-31 16:23:28', '2023-10-31 16:23:28'),
(320, 'Clients\\Models\\Client', 65, 'API TOKEN', '198462ac7a9ced7792bb353aab29d3c2b3e8b6081f5ee395767c214dd6014be3', '[\"*\"]', NULL, NULL, '2023-10-31 16:23:35', '2023-10-31 16:23:35'),
(321, 'Clients\\Models\\Client', 65, 'API TOKEN', 'dd9f3c79254910aa15bba625ce61bfa724f7d136a2e20cb68ef56530f090c011', '[\"*\"]', NULL, NULL, '2023-10-31 16:23:35', '2023-10-31 16:23:35'),
(322, 'Clients\\Models\\Client', 43, 'API TOKEN', 'b105571a4636ad7d4718010ef1a144d20955b083911782a94864540ecf772962', '[\"*\"]', '2023-11-06 17:42:22', NULL, '2023-10-31 16:23:52', '2023-11-06 17:42:22'),
(323, 'Clients\\Models\\Client', 66, 'API TOKEN', '6b8faae6e2faddf7b78730ed2fac892bdf6a2f57bf3050fa76cbd61140850c79', '[\"*\"]', NULL, NULL, '2023-10-31 16:29:17', '2023-10-31 16:29:17'),
(324, 'Clients\\Models\\Client', 66, 'API TOKEN', '79d99c2df6ff4082bba63bc2ec1fb59faa586b154a373d1a460378e3dfc98332', '[\"*\"]', NULL, NULL, '2023-10-31 16:29:18', '2023-10-31 16:29:18'),
(325, 'Clients\\Models\\Client', 67, 'API TOKEN', '12dd2b0e3531bdeb93cd84ab5a6a227037cbc819465f137d24d894f6455e1097', '[\"*\"]', NULL, NULL, '2023-10-31 16:45:18', '2023-10-31 16:45:18'),
(326, 'Clients\\Models\\Client', 67, 'API TOKEN', '90db97aab40d0cf4a1bce7f8a4afd55994d77151412cff8a975b48a81f6dac6f', '[\"*\"]', NULL, NULL, '2023-10-31 16:45:19', '2023-10-31 16:45:19'),
(327, 'Clients\\Models\\Client', 68, 'API TOKEN', '5cddc3073e4dd058b00c4dda1c4d6a415732e46c9d5aa6782609ea675491c378', '[\"*\"]', NULL, NULL, '2023-10-31 16:46:32', '2023-10-31 16:46:32'),
(328, 'Clients\\Models\\Client', 68, 'API TOKEN', '47b04b51e6db65e9acb8a4b7d2add91529cf0fed867083170c2df532155ea902', '[\"*\"]', '2023-10-31 16:48:08', NULL, '2023-10-31 16:46:32', '2023-10-31 16:48:08'),
(329, 'Clients\\Models\\Client', 69, 'API TOKEN', '0d9b9facd704e91c084982745118a77132a41788de0217a9a1efaf945a5c1566', '[\"*\"]', NULL, NULL, '2023-10-31 16:55:52', '2023-10-31 16:55:52'),
(330, 'Clients\\Models\\Client', 69, 'API TOKEN', 'abdeb6010aa2f343c55e28c32b524f9b4ee54fc929dc8d659b279c40fd3df146', '[\"*\"]', '2023-10-31 17:17:23', NULL, '2023-10-31 16:55:52', '2023-10-31 17:17:23'),
(331, 'Clients\\Models\\Client', 70, 'API TOKEN', '787e3f0ddb1a11ae812f6fdb45b0f10b154080b9d7998bccf54b79a4b73aec86', '[\"*\"]', NULL, NULL, '2023-10-31 17:18:23', '2023-10-31 17:18:23'),
(332, 'Clients\\Models\\Client', 70, 'API TOKEN', '5c88c89131b65f78f9632c6d487d01032a17fa9da0b66f47a71d53b036e33fcd', '[\"*\"]', '2023-10-31 17:30:29', NULL, '2023-10-31 17:18:23', '2023-10-31 17:30:29'),
(333, 'Clients\\Models\\Client', 66, 'API TOKEN', '509796f213db8e7f031ce647fe58d62e8a07b21545ff929de73ed5f349c49f34', '[\"*\"]', '2023-10-31 18:56:32', NULL, '2023-10-31 18:56:18', '2023-10-31 18:56:32'),
(334, 'Clients\\Models\\Client', 62, 'API TOKEN', '62ea4207ecb79f6e04a6a7f2fb3117d711d4cbb5bd29e6415281c44a1f98cd5b', '[\"*\"]', NULL, NULL, '2023-11-01 23:12:03', '2023-11-01 23:12:03'),
(335, 'Clients\\Models\\Client', 78, 'API TOKEN', '383336fa5274b0eee0bfe3aefc9fb5c82aa0f9332d5d1861bac345979b7df209', '[\"*\"]', NULL, NULL, '2023-11-02 23:18:27', '2023-11-02 23:18:27'),
(336, 'Clients\\Models\\Client', 78, 'API TOKEN', 'da3c0a65503817481c703d0c2da6793d19a5ea09de2aa05c4db7aaaac276a619', '[\"*\"]', NULL, NULL, '2023-11-02 23:18:27', '2023-11-02 23:18:27'),
(337, 'Clients\\Models\\Client', 62, 'API TOKEN', '6ab3a78225c0bea3820c3b36184ea4edb42202f0ff989d6e2b26da9f9946784d', '[\"*\"]', NULL, NULL, '2023-11-05 20:08:54', '2023-11-05 20:08:54'),
(338, 'Clients\\Models\\Client', 62, 'API TOKEN', '1984e3714b8046c3817b5932b8b8f3d8352a89b3bc446e26ba78d6191f50cbb4', '[\"*\"]', '2023-11-07 20:07:17', NULL, '2023-11-06 06:01:36', '2023-11-07 20:07:17'),
(339, 'Clients\\Models\\Client', 79, 'API TOKEN', '4f58a6b51ff629b46cb31d1afe9a19d3a7e70d462b1a3491ff86aba628fa5f41', '[\"*\"]', NULL, NULL, '2023-11-06 15:16:12', '2023-11-06 15:16:12'),
(340, 'Clients\\Models\\Client', 79, 'API TOKEN', 'bbc0b2b76f5779f590d8c60413102c9f9ed0829703fc53d09936ca4c0b3aeeb8', '[\"*\"]', NULL, NULL, '2023-11-06 15:16:13', '2023-11-06 15:16:13'),
(341, 'Clients\\Models\\Client', 80, 'API TOKEN', '394c162ea0018ea9722b4e9590ccf968a81f174866c3aa83effca0490753dfb0', '[\"*\"]', NULL, NULL, '2023-11-06 15:18:41', '2023-11-06 15:18:41'),
(342, 'Clients\\Models\\Client', 80, 'API TOKEN', 'fe80967527a33b4457ed812394409a337d246b0a23edb8666b8d8f90188c02f4', '[\"*\"]', '2023-11-06 17:36:28', NULL, '2023-11-06 15:18:41', '2023-11-06 17:36:28'),
(343, 'Clients\\Models\\Client', 80, 'API TOKEN', 'c6c24fa0f007bd08a1490cfa5f31f678ad88543ca2656b221ca5f4bb3ba4abe5', '[\"*\"]', NULL, NULL, '2023-11-06 15:36:32', '2023-11-06 15:36:32'),
(344, 'Clients\\Models\\Client', 81, 'API TOKEN', 'b05f818682a489d7f677b1ae315ae68520987061db71c2b71c592abe0303fdb4', '[\"*\"]', NULL, NULL, '2023-11-06 15:36:52', '2023-11-06 15:36:52'),
(345, 'Clients\\Models\\Client', 81, 'API TOKEN', '98655bc8a80eb131581111e4887c6d9c0d369772bcb0cc9e21d6622ef73a297f', '[\"*\"]', NULL, NULL, '2023-11-06 15:36:52', '2023-11-06 15:36:52'),
(346, 'Clients\\Models\\Client', 81, 'API TOKEN', 'efc249c794350f488b079e63a77959195f87bd17e10ab7504e0c5a494b0c12d2', '[\"*\"]', NULL, NULL, '2023-11-06 16:29:08', '2023-11-06 16:29:08'),
(347, 'Clients\\Models\\Client', 81, 'API TOKEN', 'a2e8d34247f1e8cf1241cdbb16db59cb1d7ff5bf3560df42fe741779bba51526', '[\"*\"]', NULL, NULL, '2023-11-06 17:32:47', '2023-11-06 17:32:47'),
(348, 'Clients\\Models\\Client', 81, 'API TOKEN', '75f508f1cdbde7a6ca7bb5826d25465cac78770dc3cfe0ed3eb0303c6abaafe3', '[\"*\"]', '2023-11-06 19:08:53', NULL, '2023-11-06 17:36:36', '2023-11-06 19:08:53'),
(349, 'Clients\\Models\\Client', 80, 'API TOKEN', '18184dc1663ef0a4839e49cd6a8d718b859fb54b88b0a04fe872df349dfe41cf', '[\"*\"]', '2023-11-06 17:48:39', NULL, '2023-11-06 17:47:06', '2023-11-06 17:48:39'),
(350, 'Clients\\Models\\Client', 80, 'API TOKEN', '6a5a27d14268cd4e8e2ab51afe8a54fd18135bd8e255ef78329e9e161fb3ecce', '[\"*\"]', '2023-11-06 21:25:34', NULL, '2023-11-06 17:51:07', '2023-11-06 21:25:34'),
(351, 'Clients\\Models\\Client', 81, 'API TOKEN', 'd88b87b5796f43daabaaf0f3931acb09281e379fa2a7f6078c52b516e949e8d0', '[\"*\"]', NULL, NULL, '2023-11-06 17:52:26', '2023-11-06 17:52:26'),
(352, 'Clients\\Models\\Client', 80, 'API TOKEN', '000c2b75de0075f44009bb07c057a6f42e4c5e82eb38c6a2c5b80a6c65a164e0', '[\"*\"]', '2023-11-06 18:35:58', NULL, '2023-11-06 17:52:38', '2023-11-06 18:35:58'),
(353, 'Clients\\Models\\Client', 82, 'API TOKEN', '3283f1588342968358b153d1fdf6750e09af660a9729082b677ff1fc8e6f04bc', '[\"*\"]', NULL, NULL, '2023-11-06 18:39:09', '2023-11-06 18:39:09'),
(354, 'Clients\\Models\\Client', 82, 'API TOKEN', '434a345316db8dc0ea6053962025324f3cf39441c704fbd91dcf9094f0b6a729', '[\"*\"]', NULL, NULL, '2023-11-06 18:39:09', '2023-11-06 18:39:09'),
(355, 'Clients\\Models\\Client', 82, 'API TOKEN', '0a6195077940f43068bea41de02cfedd4a61456f947decae3bda0551e2aace7a', '[\"*\"]', NULL, NULL, '2023-11-06 18:40:37', '2023-11-06 18:40:37'),
(356, 'Clients\\Models\\Client', 82, 'API TOKEN', '76ab635baf412461097c718b6ef5cd133a67b00d141f4f83a623097f74dd0203', '[\"*\"]', NULL, NULL, '2023-11-06 18:41:08', '2023-11-06 18:41:08'),
(357, 'Clients\\Models\\Client', 83, 'API TOKEN', 'dfdf73c89b71e072494f371385ab7f787beaf2af32e1f19a26abac0322b97aa5', '[\"*\"]', NULL, NULL, '2023-11-06 18:41:22', '2023-11-06 18:41:22'),
(358, 'Clients\\Models\\Client', 83, 'API TOKEN', 'f8238d7a61938110cd55da8939c350b1a1b7ca577c764836d4610314a14517cd', '[\"*\"]', NULL, NULL, '2023-11-06 18:41:22', '2023-11-06 18:41:22'),
(359, 'Clients\\Models\\Client', 84, 'API TOKEN', 'c3def5be94ace745f777a3c5b416f8a298e3c03d5be0c6b56fb0b7f0a5d9c2a1', '[\"*\"]', NULL, NULL, '2023-11-06 18:42:11', '2023-11-06 18:42:11'),
(360, 'Clients\\Models\\Client', 84, 'API TOKEN', '8af3825475367505d1f36f89479c2f8d45305c848a18c9f09ffd849480c08c45', '[\"*\"]', NULL, NULL, '2023-11-06 18:42:11', '2023-11-06 18:42:11'),
(361, 'Clients\\Models\\Client', 85, 'API TOKEN', 'c965db484bb978a972d6c0a0bd08810ef232deef4696ea152194b0dbe17f84ab', '[\"*\"]', NULL, NULL, '2023-11-06 18:45:04', '2023-11-06 18:45:04'),
(362, 'Clients\\Models\\Client', 85, 'API TOKEN', 'cd11d738b92f3b3bbbeffe278b11388d6ec367db9347cbac2893e5a0c1a6f541', '[\"*\"]', NULL, NULL, '2023-11-06 18:45:04', '2023-11-06 18:45:04'),
(363, 'Clients\\Models\\Client', 87, 'API TOKEN', '95b649b169c89c2497f8ea8447c5cccb948750d9aa944dfe2448364a4aff32ac', '[\"*\"]', NULL, NULL, '2023-11-06 18:53:57', '2023-11-06 18:53:57'),
(364, 'Clients\\Models\\Client', 87, 'API TOKEN', '942228c2d95da5d0888d4a4b7893b10d882ba0e6eafd68d2d245432e6dca8cae', '[\"*\"]', '2023-11-06 19:51:38', NULL, '2023-11-06 18:53:57', '2023-11-06 19:51:38'),
(365, 'Clients\\Models\\Client', 80, 'API TOKEN', 'e3f9ba71fa3f75b99818c363b27ff131df44e3f3274c4dcc53ebb8e1cfd12a29', '[\"*\"]', NULL, NULL, '2023-11-06 21:44:26', '2023-11-06 21:44:26'),
(366, 'Clients\\Models\\Client', 89, 'API TOKEN', 'e86da25e03becbd048bcdfff0c394a926099050f3705275b91c30aafcc174e85', '[\"*\"]', NULL, NULL, '2023-11-06 21:58:48', '2023-11-06 21:58:48'),
(367, 'Clients\\Models\\Client', 89, 'API TOKEN', '4f80b25e14f14250e1cf21beee9e1f070541d3511c9a13ce2877e243a8648556', '[\"*\"]', NULL, NULL, '2023-11-06 21:58:48', '2023-11-06 21:58:48'),
(368, 'Clients\\Models\\Client', 90, 'API TOKEN', 'cc286569590e6e031dac2dc2f11c92fe4424dc88ee9c196a19909b7af89626a7', '[\"*\"]', NULL, NULL, '2023-11-06 22:08:29', '2023-11-06 22:08:29'),
(369, 'Clients\\Models\\Client', 90, 'API TOKEN', '2e8b0aba80b83200492aa0931af27863863f453e476271449a678e1e16092ef7', '[\"*\"]', NULL, NULL, '2023-11-06 22:08:29', '2023-11-06 22:08:29'),
(370, 'Clients\\Models\\Client', 90, 'API TOKEN', '6dc6f00bb9e0cd5aff621b84286ad2c3d9f12fcb898b1910a071e1357c59e850', '[\"*\"]', NULL, NULL, '2023-11-06 22:10:38', '2023-11-06 22:10:38'),
(371, 'Clients\\Models\\Client', 80, 'API TOKEN', 'b40dce8b789f6c3935dd84af855a90eae4bbe2f1d40a129b1b0bdb5b5da10984', '[\"*\"]', '2023-11-07 16:44:44', NULL, '2023-11-06 22:54:37', '2023-11-07 16:44:44'),
(372, 'Clients\\Models\\Client', 90, 'API TOKEN', '4901b17da394b98ab0659de6aa5a2a2d47931df47e7bcc7d6e9d3c789c4d4df7', '[\"*\"]', NULL, NULL, '2023-11-06 23:06:22', '2023-11-06 23:06:22'),
(373, 'Clients\\Models\\Client', 90, 'API TOKEN', '6d10ceef3245981738e4e6f7e122b6e2156a3da2bc25472764bc8fcd55a73eda', '[\"*\"]', NULL, NULL, '2023-11-06 23:07:36', '2023-11-06 23:07:36'),
(374, 'Clients\\Models\\Client', 90, 'API TOKEN', '627a7220f58610aea40290798b1e5cf20416342ec2a196975034d756d58d4196', '[\"*\"]', NULL, NULL, '2023-11-06 23:08:07', '2023-11-06 23:08:07'),
(375, 'Clients\\Models\\Client', 90, 'API TOKEN', '56b2627294f9be408d07d7ca3fee14eaac72f709bdfb5e5c71046c0a69480425', '[\"*\"]', NULL, NULL, '2023-11-06 23:08:58', '2023-11-06 23:08:58'),
(376, 'Clients\\Models\\Client', 90, 'API TOKEN', '1b31659cc1d39890ecf4098a2e005d26014fc56e4cac460e2195b26db9a1bf41', '[\"*\"]', NULL, NULL, '2023-11-06 23:15:41', '2023-11-06 23:15:41'),
(377, 'Clients\\Models\\Client', 87, 'API TOKEN', '034bfa3ee9b7cd6dfc5deddbe88c53402e3b973ee814700dc9a9a71d7dd269e0', '[\"*\"]', NULL, NULL, '2023-11-07 00:37:11', '2023-11-07 00:37:11'),
(378, 'Clients\\Models\\Client', 87, 'API TOKEN', 'a92a5744dc5e1eddb8426e087bc72391e9ea7d9e0594b19926e1e0977740656e', '[\"*\"]', NULL, NULL, '2023-11-07 00:38:23', '2023-11-07 00:38:23'),
(379, 'Clients\\Models\\Client', 87, 'API TOKEN', '04e08677f0ae01cfd042d33117f8fe53f3fb22e074def624949ef472bb386105', '[\"*\"]', '2023-11-07 02:19:26', NULL, '2023-11-07 00:38:56', '2023-11-07 02:19:26'),
(380, 'Clients\\Models\\Client', 93, 'API TOKEN', 'b0477d76448da3a04c8da355d0667ad8dc6487a602c21f566e576b60043085fe', '[\"*\"]', NULL, NULL, '2023-11-07 15:51:17', '2023-11-07 15:51:17'),
(381, 'Clients\\Models\\Client', 93, 'API TOKEN', 'bd08fdc073c26df7cb6ce12f8f4d54c46155619b1a2c9c5974488f3c7d2f94ff', '[\"*\"]', NULL, NULL, '2023-11-07 15:51:17', '2023-11-07 15:51:17'),
(382, 'Clients\\Models\\Client', 80, 'API TOKEN', 'efae3540764533d0265ad45f337803f37718a72b75bfef40eed9b8900f9a85d7', '[\"*\"]', '2023-11-07 16:56:58', NULL, '2023-11-07 16:42:13', '2023-11-07 16:56:58'),
(383, 'Clients\\Models\\Client', 93, 'API TOKEN', 'b63bfa9bbc8004cdfccfd1920055a9d5bbd7d3a48f57c7e8d9ede6446f367d2b', '[\"*\"]', NULL, NULL, '2023-11-07 16:45:19', '2023-11-07 16:45:19'),
(384, 'Clients\\Models\\Client', 93, 'API TOKEN', '5bd1b12fb47ffa2569a5598af6e02621b88d94e1bcfdb116bf2b0f73ee11aaf5', '[\"*\"]', '2023-11-07 16:45:43', NULL, '2023-11-07 16:45:26', '2023-11-07 16:45:43'),
(385, 'Clients\\Models\\Client', 80, 'API TOKEN', '023e5eb0768ebe71df499093823cf8bd149df72b9c8b27c5a7f2d33c8f58308b', '[\"*\"]', NULL, NULL, '2023-11-07 16:45:43', '2023-11-07 16:45:43'),
(386, 'Clients\\Models\\Client', 80, 'API TOKEN', 'b43486426e37824fa2d6ba6c8536c4dac37fa152610f3fd4017940d01cf5853c', '[\"*\"]', NULL, NULL, '2023-11-07 16:45:53', '2023-11-07 16:45:53'),
(387, 'Clients\\Models\\Client', 93, 'API TOKEN', '76178116f26cd7ca2ad2c24801d1178df054a6f18ddfa7b0333d3592ea24fca2', '[\"*\"]', NULL, NULL, '2023-11-07 16:47:46', '2023-11-07 16:47:46'),
(388, 'Clients\\Models\\Client', 90, 'API TOKEN', 'acfd33b5bf76068a5557ec5050f6199a1ac328112199583c1f54384161eda7e2', '[\"*\"]', NULL, NULL, '2023-11-07 16:50:01', '2023-11-07 16:50:01'),
(389, 'Clients\\Models\\Client', 80, 'API TOKEN', 'b19411c47f880a06e2c337c5922b372243a3a523511adf5480e5b9d8e90f247e', '[\"*\"]', NULL, NULL, '2023-11-07 16:50:01', '2023-11-07 16:50:01'),
(390, 'Clients\\Models\\Client', 80, 'API TOKEN', '74ec86b92962217e29bec95a7ef7336f718f5f98b92016004ecd65a6e61a5651', '[\"*\"]', '2023-11-07 17:20:44', NULL, '2023-11-07 16:56:28', '2023-11-07 17:20:44'),
(391, 'Clients\\Models\\Client', 90, 'API TOKEN', 'cb516e1dadc329bfb3e04579e5727ab3d77e7dac4daa37540e14acd2d2e999db', '[\"*\"]', NULL, NULL, '2023-11-07 17:12:57', '2023-11-07 17:12:57'),
(392, 'Clients\\Models\\Client', 80, 'API TOKEN', 'ae65683893441d947adae8e6ef1e3a5688285c412e65d0006dc2ce6cb541ead5', '[\"*\"]', '2023-11-07 17:21:15', NULL, '2023-11-07 17:21:12', '2023-11-07 17:21:15'),
(393, 'Clients\\Models\\Client', 87, 'API TOKEN', '4f6dbda7f63b4544067fb931ad298daed3d89453cdafd498d8cba38ad868d3e7', '[\"*\"]', '2023-11-07 18:51:28', NULL, '2023-11-07 18:51:15', '2023-11-07 18:51:28'),
(394, 'Clients\\Models\\Client', 80, 'API TOKEN', '124ef09513b282238737445278896b962d919b9b730ca70c9430adbfe75272b5', '[\"*\"]', '2023-11-07 19:00:41', NULL, '2023-11-07 19:00:39', '2023-11-07 19:00:41'),
(395, 'Clients\\Models\\Client', 80, 'API TOKEN', 'c82afc567b848eb24140828d1ee3a4788435bde4d82621bcfa647eca204073d8', '[\"*\"]', '2023-11-07 19:23:32', NULL, '2023-11-07 19:04:34', '2023-11-07 19:23:32'),
(396, 'Clients\\Models\\Client', 80, 'API TOKEN', '94a22464e37b635fb19328e0f39bf7d306381424b05caf23c7f657a32b63eaf9', '[\"*\"]', '2023-11-07 20:49:32', NULL, '2023-11-07 19:26:07', '2023-11-07 20:49:32'),
(397, 'Clients\\Models\\Client', 93, 'API TOKEN', 'cc5f361d1f7600b867b3f8ec83212e709b2198d9c9d265616806cc23b642069b', '[\"*\"]', '2023-11-07 20:54:57', NULL, '2023-11-07 20:54:56', '2023-11-07 20:54:57'),
(398, 'Clients\\Models\\Client', 98, 'API TOKEN', '6d4ae090b1f42d827bf76c9348f26f7b7a3e53bfd5e2b3b73b4b70366e76a7c0', '[\"*\"]', NULL, NULL, '2023-11-07 20:56:43', '2023-11-07 20:56:43'),
(399, 'Clients\\Models\\Client', 98, 'API TOKEN', 'bc30b555568274b0f819e6277516450d8153c0b63aa1062a4d4b4f380eee3b6e', '[\"*\"]', NULL, NULL, '2023-11-07 20:56:43', '2023-11-07 20:56:43'),
(400, 'Clients\\Models\\Client', 99, 'API TOKEN', '6e5bf31fd8a987d5aa418f85d08a6aa9e038d260d8e69d09e4ac7c28c426c19f', '[\"*\"]', NULL, NULL, '2023-11-07 21:06:03', '2023-11-07 21:06:03'),
(401, 'Clients\\Models\\Client', 99, 'API TOKEN', '96d284c0afeebc4606a58cdc0a336a61d095b3cdecca3d4770d2871e8303d51d', '[\"*\"]', NULL, NULL, '2023-11-07 21:06:03', '2023-11-07 21:06:03'),
(402, 'Clients\\Models\\Client', 99, 'API TOKEN', '7621c8adb06af78e5d9753b538f4e9e34d0a3947b4ea4a7aa2c694ef13b1c63c', '[\"*\"]', NULL, NULL, '2023-11-07 21:08:25', '2023-11-07 21:08:25'),
(403, 'Clients\\Models\\Client', 99, 'API TOKEN', 'a77628e65a99379f5df626ffdb0a4577a23487b773b2cb680304e3e104233c18', '[\"*\"]', NULL, NULL, '2023-11-07 21:08:48', '2023-11-07 21:08:48'),
(404, 'Clients\\Models\\Client', 99, 'API TOKEN', 'a424a98fb622ecbac57e096d897315c85b3569cf37b5699ab117af66520c0fb6', '[\"*\"]', '2023-11-07 21:17:02', NULL, '2023-11-07 21:10:26', '2023-11-07 21:17:02'),
(405, 'Clients\\Models\\Client', 101, 'API TOKEN', 'b858199b4973d8ab4d1b546c8024eb66d0eec9cc1a100429a5afaae5da469a9e', '[\"*\"]', NULL, NULL, '2023-11-07 21:18:07', '2023-11-07 21:18:07'),
(406, 'Clients\\Models\\Client', 101, 'API TOKEN', '46d37f7631c011641ad7e7ba0b9ec903fbd4dc2fc68e25d0623ea17bb8ec5108', '[\"*\"]', NULL, NULL, '2023-11-07 21:18:07', '2023-11-07 21:18:07'),
(407, 'Clients\\Models\\Client', 101, 'API TOKEN', '1a986c794a18dccc377a404568236f22cc9649be9240fe2b59fe1ec73f194274', '[\"*\"]', '2023-11-07 21:19:21', NULL, '2023-11-07 21:19:19', '2023-11-07 21:19:21'),
(408, 'Clients\\Models\\Client', 102, 'API TOKEN', '644e2b28594aff5371d6c3eb17678204ac51201afdf141d255372ccf91509687', '[\"*\"]', NULL, NULL, '2023-11-07 21:29:59', '2023-11-07 21:29:59'),
(409, 'Clients\\Models\\Client', 102, 'API TOKEN', '57ce367d16697bdbad82f17743ff445c38c547c469276869e30c6b3efa41d5b6', '[\"*\"]', NULL, NULL, '2023-11-07 21:29:59', '2023-11-07 21:29:59'),
(410, 'Clients\\Models\\Client', 99, 'API TOKEN', '07281b3bc7c574ec3ecfaaa85db79e2827da8e90c672540707e5484bdd87d285', '[\"*\"]', NULL, NULL, '2023-11-07 21:34:02', '2023-11-07 21:34:02'),
(411, 'Clients\\Models\\Client', 102, 'API TOKEN', '9c62e62a3d1ba0851c0d1eb195f5041e4d293e1f306fd217c8aa102372cd5285', '[\"*\"]', '2023-11-07 21:34:27', NULL, '2023-11-07 21:34:23', '2023-11-07 21:34:27'),
(412, 'Clients\\Models\\Client', 109, 'API TOKEN', 'bdf2612117b63aaa9053b6f5f366215f8cd78d720fa5443e4d64260a2a4d8fdf', '[\"*\"]', NULL, NULL, '2023-11-07 23:18:20', '2023-11-07 23:18:20'),
(413, 'Clients\\Models\\Client', 109, 'API TOKEN', '97bcc992f910b68c0761dbe609293aabf1abac92a466abe049c314cf6d963324', '[\"*\"]', NULL, NULL, '2023-11-07 23:18:21', '2023-11-07 23:18:21'),
(414, 'Clients\\Models\\Client', 110, 'API TOKEN', 'b0241c4483ad303278ab9ee189df514a50a0cc51be2b5a902abd818e85812db8', '[\"*\"]', NULL, NULL, '2023-11-08 00:13:20', '2023-11-08 00:13:20'),
(415, 'Clients\\Models\\Client', 110, 'API TOKEN', '33b43dfbdc7216bd9b3d9d48b31e80a746c329bc52c9c644137fe1f509cbe79d', '[\"*\"]', NULL, NULL, '2023-11-08 00:13:20', '2023-11-08 00:13:20'),
(416, 'Clients\\Models\\Client', 110, 'API TOKEN', 'a9b338e43ac33909ba201991278a6ee37b076acf4fe4282903b15f2b2584e53a', '[\"*\"]', '2023-11-08 00:13:56', NULL, '2023-11-08 00:13:50', '2023-11-08 00:13:56'),
(417, 'Clients\\Models\\Client', 109, 'API TOKEN', '44e3cd92a35168bcc78c271daf45d3a7fb0aaab7849ae4518f7d1a8714cc6bf9', '[\"*\"]', NULL, NULL, '2023-11-08 00:14:03', '2023-11-08 00:14:03'),
(418, 'Clients\\Models\\Client', 109, 'API TOKEN', '3e8665a927ee658b593b70daece3617cbef43374b639dec55d1eb51746b4e533', '[\"*\"]', NULL, NULL, '2023-11-08 00:20:31', '2023-11-08 00:20:31'),
(419, 'Clients\\Models\\Client', 111, 'API TOKEN', '77c836ddde9ab078e148b23ee80f1996507932288f23a87eb2b21b0c19fa2108', '[\"*\"]', NULL, NULL, '2023-11-08 00:21:37', '2023-11-08 00:21:37'),
(420, 'Clients\\Models\\Client', 111, 'API TOKEN', 'bedff2a3aee689d138a987c5f73299e458e0657316fb46900204dd7702494d8a', '[\"*\"]', NULL, NULL, '2023-11-08 00:21:37', '2023-11-08 00:21:37'),
(421, 'Clients\\Models\\Client', 112, 'API TOKEN', 'a9b4cbe5f437995c4e8ac280d08ab3f6c5b6a7e83f6e599f79eeb423e983e1db', '[\"*\"]', NULL, NULL, '2023-11-08 00:26:36', '2023-11-08 00:26:36'),
(422, 'Clients\\Models\\Client', 112, 'API TOKEN', 'c31d6dc0fa39b85e282ef161178b259dcb262259641a60560d56b85d89c9fed7', '[\"*\"]', NULL, NULL, '2023-11-08 00:26:36', '2023-11-08 00:26:36'),
(423, 'Clients\\Models\\Client', 113, 'API TOKEN', '4ebc668e3b6ca185dde8bdc5eef39a37114b79cbc6d147b3cb4cd1e944a33224', '[\"*\"]', NULL, NULL, '2023-11-08 00:29:17', '2023-11-08 00:29:17'),
(424, 'Clients\\Models\\Client', 113, 'API TOKEN', '65c775af56983bfe32091494104335bcfb030ce165f1f3488e72af1757f3224d', '[\"*\"]', NULL, NULL, '2023-11-08 00:29:17', '2023-11-08 00:29:17'),
(425, 'Clients\\Models\\Client', 114, 'API TOKEN', '61bbeec208c3740fe5304acc5ca2bfbd7283e1e9a507597e0fed6cb2cf4ea602', '[\"*\"]', NULL, NULL, '2023-11-08 05:40:31', '2023-11-08 05:40:31'),
(426, 'Clients\\Models\\Client', 114, 'API TOKEN', 'ee737c1e4123104349b86bc2780ca73a834fd91dd4cfed594528105802e47826', '[\"*\"]', NULL, NULL, '2023-11-08 05:43:13', '2023-11-08 05:43:13'),
(427, 'Clients\\Models\\Client', 114, 'API TOKEN', '34e4a684a775ed02d7fe3ab073f49b057d63b2dd0405ca1a4dfd86e2f676b6ec', '[\"*\"]', NULL, NULL, '2023-11-08 05:46:05', '2023-11-08 05:46:05'),
(428, 'Clients\\Models\\Client', 115, 'API TOKEN', '29edd4b59dc827c7fd327c42cd1a7c2e7791492315cc14e40a1e41013cd47935', '[\"*\"]', NULL, NULL, '2023-11-08 05:52:10', '2023-11-08 05:52:10'),
(429, 'Clients\\Models\\Client', 115, 'API TOKEN', '40715725baee3f276c3bcea7de65bb1feea776a2915f9f7ff62916453cfe371c', '[\"*\"]', NULL, NULL, '2023-11-08 05:52:28', '2023-11-08 05:52:28'),
(430, 'Clients\\Models\\Client', 117, 'API TOKEN', '4551a789f135ebeba1b8054c8a39169ae94756da2b754f83e579c5cd6be52042', '[\"*\"]', '2023-11-08 16:49:54', NULL, '2023-11-08 16:48:59', '2023-11-08 16:49:54'),
(431, 'Clients\\Models\\Client', 117, 'API TOKEN', '53d76930f1621cf83f930d5895e9bebf66fa60ff8ba62f81c80c4ab972a7e4ca', '[\"*\"]', NULL, NULL, '2023-11-08 16:50:11', '2023-11-08 16:50:11'),
(432, 'Clients\\Models\\Client', 118, 'API TOKEN', 'c10b1b5e258dcb4231f1dcb3e07995e708144247ed6fd682d8410e0b5e6e1b63', '[\"*\"]', NULL, NULL, '2023-11-08 17:13:34', '2023-11-08 17:13:34'),
(433, 'Clients\\Models\\Client', 118, 'API TOKEN', 'fda139679d5ec9282ef5f744e44206732df901df8956899053dbd1222f1e515c', '[\"*\"]', NULL, NULL, '2023-11-08 17:14:02', '2023-11-08 17:14:02'),
(434, 'Clients\\Models\\Client', 118, 'API TOKEN', '2d0e117b83a23258b371d1c9ccec39e5d6e0bad8e1ea080206012a636b112dc9', '[\"*\"]', NULL, NULL, '2023-11-08 17:32:01', '2023-11-08 17:32:01'),
(435, 'Clients\\Models\\Client', 119, 'API TOKEN', 'f0326665e115eca04ec802519ded2a3c87bef705ce98db08402e2c77bd0748e7', '[\"*\"]', NULL, NULL, '2023-11-08 17:59:15', '2023-11-08 17:59:15'),
(436, 'Clients\\Models\\Client', 119, 'API TOKEN', '126264ba1a25b818b24c75314102a37bba7ebdecb4eabf916fc0e858ecc45ba1', '[\"*\"]', NULL, NULL, '2023-11-08 17:59:42', '2023-11-08 17:59:42'),
(437, 'Clients\\Models\\Client', 119, 'API TOKEN', '0a346224bc3a3e46e97b206896fa4f679d6142cc8fc2bb5f9977e4f11d81d252', '[\"*\"]', NULL, NULL, '2023-11-08 18:03:26', '2023-11-08 18:03:26'),
(438, 'Clients\\Models\\Client', 119, 'API TOKEN', '52363da9ee2e3ea7a85fa7bd592fc8173254b0bb786226863a5ef6a00a85ff81', '[\"*\"]', NULL, NULL, '2023-11-08 18:03:56', '2023-11-08 18:03:56'),
(439, 'Clients\\Models\\Client', 119, 'API TOKEN', 'b2cfe89bbbc2dd427a66226f43cb3b9c648f9cb8c58b3ae8caff2ebd92058432', '[\"*\"]', NULL, NULL, '2023-11-08 18:05:16', '2023-11-08 18:05:16'),
(440, 'Clients\\Models\\Client', 119, 'API TOKEN', '098a7724052d12b3171ab20d26950341b37223ee9e2714f0c149c82c8ac04045', '[\"*\"]', NULL, NULL, '2023-11-08 18:06:19', '2023-11-08 18:06:19'),
(441, 'Clients\\Models\\Client', 119, 'API TOKEN', '69a9d6b407776c314fd2ba46e42744e472343df1c41ed1e5bb5f79f28fcb6146', '[\"*\"]', NULL, NULL, '2023-11-08 18:11:31', '2023-11-08 18:11:31'),
(442, 'Clients\\Models\\Client', 119, 'API TOKEN', '6bddd9badb99e8d6a1213a58b7c30c16c566fc14ce292ae682cbc73cb570287c', '[\"*\"]', NULL, NULL, '2023-11-08 18:12:44', '2023-11-08 18:12:44'),
(443, 'Clients\\Models\\Client', 119, 'API TOKEN', '9c75eacdd093a1d7a5d338d330d06a06734b71d839a503ce2d1b75628e415601', '[\"*\"]', NULL, NULL, '2023-11-08 18:13:14', '2023-11-08 18:13:14'),
(444, 'Clients\\Models\\Client', 119, 'API TOKEN', '68bfe02cf528b578314d1918f441f8d22033c77ff11a56a449e38c5b7b61654a', '[\"*\"]', NULL, NULL, '2023-11-08 18:14:45', '2023-11-08 18:14:45'),
(445, 'Clients\\Models\\Client', 119, 'API TOKEN', 'a4089a5b0e2b65d800a87afac189ca9fd5f6ee91539615e1179b86a0c3f2b6eb', '[\"*\"]', NULL, NULL, '2023-11-08 18:17:12', '2023-11-08 18:17:12'),
(446, 'Clients\\Models\\Client', 119, 'API TOKEN', '18f3bb30f52178427387ee20dc376724a70342003064cdc99dd6679f7b1e0a0f', '[\"*\"]', '2023-11-08 18:19:04', NULL, '2023-11-08 18:17:33', '2023-11-08 18:19:04'),
(447, 'Clients\\Models\\Client', 120, 'API TOKEN', 'edafb2da86375043013d1693ea5f19922d46e578f1b4d004f19d13d0a7eda620', '[\"*\"]', '2023-11-08 18:24:50', NULL, '2023-11-08 18:22:29', '2023-11-08 18:24:50'),
(448, 'Clients\\Models\\Client', 120, 'API TOKEN', 'a79c88658b82901ca760ef932f2e498cc6317be1f9fce2e72bd82c83a933adc9', '[\"*\"]', NULL, NULL, '2023-11-08 18:27:08', '2023-11-08 18:27:08'),
(449, 'Clients\\Models\\Client', 121, 'API TOKEN', '3d52bd6897c15131e025111fa97f44869cd0161f1ba68afa1c485ac63982ff59', '[\"*\"]', NULL, NULL, '2023-11-08 18:34:57', '2023-11-08 18:34:57'),
(450, 'Clients\\Models\\Client', 120, 'API TOKEN', '85ca0de87bac433b37f1101aa42f9ff289ebc61d467161a4790fd8714d2a7402', '[\"*\"]', '2023-11-08 18:35:28', NULL, '2023-11-08 18:35:25', '2023-11-08 18:35:28'),
(451, 'Clients\\Models\\Client', 122, 'API TOKEN', '725a1a8a3580ae5384d85f431f3afb7dbc4e871e0f039de141589cfe97f37bb9', '[\"*\"]', NULL, NULL, '2023-11-08 18:36:06', '2023-11-08 18:36:06'),
(452, 'Clients\\Models\\Client', 123, 'API TOKEN', 'c45796109ac57cff0a33f826b0927565a8bed877872b4b4a87c9d3cb3849b18f', '[\"*\"]', NULL, NULL, '2023-11-08 18:37:08', '2023-11-08 18:37:08'),
(453, 'Clients\\Models\\Client', 124, 'API TOKEN', 'ad3680a03aad03440539793032cdbbba369400eda1deacd2d8b171d4d66975c3', '[\"*\"]', '2023-11-08 18:38:56', NULL, '2023-11-08 18:37:52', '2023-11-08 18:38:56'),
(454, 'Clients\\Models\\Client', 125, 'API TOKEN', 'd79cea920f1f0930526c51ca1ab35152e18d36f7863f225efc0390971a9dd580', '[\"*\"]', '2023-11-09 19:37:29', NULL, '2023-11-08 18:40:08', '2023-11-09 19:37:29'),
(455, 'Clients\\Models\\Client', 126, 'API TOKEN', '9eae80d0e3285e67b22102fad874e17a583aeffc8bcd50ea6f3ac354d9fce317', '[\"*\"]', '2023-11-09 01:37:50', NULL, '2023-11-08 18:41:48', '2023-11-09 01:37:50'),
(456, 'Clients\\Models\\Client', 127, 'API TOKEN', '76ada24d735f8f292044a06bc3e0b1991e894b761e152cc46a41e9a81be80544', '[\"*\"]', '2023-11-08 19:10:18', NULL, '2023-11-08 19:08:43', '2023-11-08 19:10:18'),
(457, 'Clients\\Models\\Client', 125, 'API TOKEN', '142568af30ead30fcca7c5173353a022ad28fc77fcc8ccfe5177c8e796fc9e97', '[\"*\"]', '2023-11-08 20:21:48', NULL, '2023-11-08 19:29:58', '2023-11-08 20:21:48'),
(458, 'Clients\\Models\\Client', 127, 'API TOKEN', '807c32e27279406587ad8a401a6798d2745a881f7dcc8bbd5ed9055926d8be6a', '[\"*\"]', '2023-11-08 19:53:57', NULL, '2023-11-08 19:51:57', '2023-11-08 19:53:57'),
(459, 'Clients\\Models\\Client', 125, 'API TOKEN', 'd31875c47aa67c9fac861766aaff0e2665acf024567964e6e84c068f643b1bcf', '[\"*\"]', '2023-11-08 21:27:11', NULL, '2023-11-08 20:22:24', '2023-11-08 21:27:11'),
(460, 'Clients\\Models\\Client', 127, 'API TOKEN', '9350846bba1ddcff5a8fdc4190381243277c21157b283e0c46b0d23d7fd94391', '[\"*\"]', '2023-11-08 20:50:48', NULL, '2023-11-08 20:29:31', '2023-11-08 20:50:48'),
(461, 'Clients\\Models\\Client', 126, 'API TOKEN', '1c06b836581a780385b12e4359fbc5584df72460f626fce47a61d53a82e8cfa0', '[\"*\"]', '2023-11-09 01:43:15', NULL, '2023-11-09 01:43:13', '2023-11-09 01:43:15'),
(462, 'Clients\\Models\\Client', 127, 'API TOKEN', 'ac57d662766587584cc90e40a9cdfb867197be90376cc154bc942ae13fda038b', '[\"*\"]', '2023-11-13 00:59:19', NULL, '2023-11-09 10:47:34', '2023-11-13 00:59:19'),
(463, 'Clients\\Models\\Client', 133, 'API TOKEN', '373e2e26202a014c4ca5c4c42c33f77d87f79081f8a80175878678ed7bfde620', '[\"*\"]', NULL, NULL, '2023-11-09 16:22:29', '2023-11-09 16:22:29'),
(464, 'Clients\\Models\\Client', 133, 'API TOKEN', 'b3af25fef29329ab156db5b12f2936b8cece24621e1a599b1ca31a3ed01bb7ee', '[\"*\"]', NULL, NULL, '2023-11-09 16:22:36', '2023-11-09 16:22:36'),
(465, 'Clients\\Models\\Client', 134, 'API TOKEN', '41cf62777ad9ff164009c724a7a929774a502ce5eb2618af9fda283ae3f24a52', '[\"*\"]', NULL, NULL, '2023-11-09 16:23:27', '2023-11-09 16:23:27'),
(466, 'Clients\\Models\\Client', 134, 'API TOKEN', 'a7f785fc5344e489d46c47c11521b8642b3c8b9577060fd8102a57c3193bcc30', '[\"*\"]', '2023-11-09 16:24:51', NULL, '2023-11-09 16:23:31', '2023-11-09 16:24:51'),
(467, 'Clients\\Models\\Client', 127, 'API TOKEN', 'b25682ce98194ad405ad65c8050227e0fada9fb66279e82e6d2c880f1cbc1150', '[\"*\"]', '2023-11-12 18:35:16', NULL, '2023-11-09 17:58:14', '2023-11-12 18:35:16'),
(468, 'Clients\\Models\\Client', 125, 'API TOKEN', 'f45fa0789921f75d245d436612403ae331c1e0a6687b5d623868266f88c60584', '[\"*\"]', NULL, NULL, '2023-11-09 20:38:00', '2023-11-09 20:38:00'),
(469, 'Clients\\Models\\Client', 125, 'API TOKEN', 'bb9be3bbec7354603ff01a1883923c7176222406040e763ee8aad3779e579c03', '[\"*\"]', '2023-11-09 23:23:12', NULL, '2023-11-09 20:38:47', '2023-11-09 23:23:12'),
(470, 'Clients\\Models\\Client', 140, 'API TOKEN', '6cbaa25405541133aecf7ef7aea40989ab06286f88d879c83222743faf01d4b2', '[\"*\"]', NULL, NULL, '2023-11-09 23:23:59', '2023-11-09 23:23:59'),
(471, 'Clients\\Models\\Client', 140, 'API TOKEN', '309eaedf3fb832e2696d1bbb798238aca6b607c72d40ada24b3fe6ba7cbc30a4', '[\"*\"]', '2023-11-09 23:36:30', NULL, '2023-11-09 23:24:42', '2023-11-09 23:36:30'),
(472, 'Clients\\Models\\Client', 140, 'API TOKEN', 'f82c2a5bb4a41da9030c2a30af4d7145bba34dc1a442c2c983b12708bb82ece8', '[\"*\"]', '2023-11-14 01:53:12', NULL, '2023-11-12 14:48:08', '2023-11-14 01:53:12'),
(473, 'Clients\\Models\\Client', 140, 'API TOKEN', 'a7fa38752ffc1f2dde275d850f7cbd0dff1a1ccab83e6315156564f93a102f36', '[\"*\"]', '2023-11-12 20:11:12', NULL, '2023-11-12 16:24:21', '2023-11-12 20:11:12'),
(474, 'Clients\\Models\\Client', 127, 'API TOKEN', '7ebbd57bf4ecbff33098c8ec1aad0d73d27f5eb8da8199e69ac28e102cc5f0bc', '[\"*\"]', '2023-11-27 22:04:59', NULL, '2023-11-12 16:56:23', '2023-11-27 22:04:59'),
(475, 'Clients\\Models\\Client', 127, 'API TOKEN', '57ca5fc0804bd3ed8d2f36406989fcb8e8071fd7371883435984a4fb495d1643', '[\"*\"]', '2023-11-12 18:07:49', NULL, '2023-11-12 18:03:39', '2023-11-12 18:07:49'),
(476, 'Clients\\Models\\Client', 140, 'API TOKEN', '2c7b86b0e68c006c4019ca863649249385878a3e0c10fa8fed37e2f35e9b8f5a', '[\"*\"]', '2023-11-12 20:35:05', NULL, '2023-11-12 18:23:44', '2023-11-12 20:35:05'),
(477, 'Clients\\Models\\Client', 146, 'API TOKEN', '2a2b43b08384745667bbe70bfa7afec7102eb828cb990d43286e4023968afd3c', '[\"*\"]', '2023-11-30 02:15:10', NULL, '2023-11-12 23:11:47', '2023-11-30 02:15:10'),
(478, 'Clients\\Models\\Client', 140, 'API TOKEN', 'b8dafa9f9978e244f83ba8545fb752cc10dd7882ca185f9d00fb166fb2391157', '[\"*\"]', '2023-11-14 23:16:05', NULL, '2023-11-12 23:18:42', '2023-11-14 23:16:05'),
(479, 'Clients\\Models\\Client', 147, 'API TOKEN', '905217cab3c48c4c6515043f6ae1a5a2d403ad39af72d72ad6b7e34dbf609868', '[\"*\"]', '2023-11-26 19:09:09', NULL, '2023-11-13 16:41:00', '2023-11-26 19:09:09'),
(480, 'Clients\\Models\\Client', 148, 'API TOKEN', '19ea668c624ea426be6067de50fba39f8a9f7541327064ce56a85231a25ab713', '[\"*\"]', '2023-11-13 23:00:38', NULL, '2023-11-13 19:35:29', '2023-11-13 23:00:38'),
(481, 'Clients\\Models\\Client', 148, 'API TOKEN', '98ee91952c302e18056f951c1d1296aca6518e7b6315f8c948ab888261736e61', '[\"*\"]', NULL, NULL, '2023-11-13 23:02:52', '2023-11-13 23:02:52'),
(482, 'Clients\\Models\\Client', 148, 'API TOKEN', '90715b91d7e333d841b4e03d725b6944cb4a895bcaeb08cef0c071bb63df8fe7', '[\"*\"]', '2023-11-14 00:01:50', NULL, '2023-11-13 23:03:32', '2023-11-14 00:01:50'),
(483, 'Clients\\Models\\Client', 151, 'API TOKEN', '7e273d81010542e1a2887e6f7b0310c5d8e57f07c4d07a314b67d9d51c36ca04', '[\"*\"]', '2023-11-14 19:32:32', NULL, '2023-11-14 01:54:01', '2023-11-14 19:32:32'),
(484, 'Clients\\Models\\Client', 152, 'API TOKEN', 'd16960074d8b65e5cbe219eed5a9315884ef6e347d0ae96713df535dac8fb74f', '[\"*\"]', '2023-11-14 03:48:12', NULL, '2023-11-14 03:47:47', '2023-11-14 03:48:12'),
(485, 'Clients\\Models\\Client', 140, 'API TOKEN', '95ea0be16c983fc0dfbb3855fa8a12135ef4f7c6d8e6f6d6358125bffb1f6c95', '[\"*\"]', '2023-11-14 19:39:00', NULL, '2023-11-14 19:38:36', '2023-11-14 19:39:00'),
(486, 'Clients\\Models\\Client', 153, 'API TOKEN', 'caa95fd6203b997513f1324587c5e8c9d0691795e0cbc526dee6f412b3ee78bc', '[\"*\"]', '2023-11-14 20:50:49', NULL, '2023-11-14 20:50:17', '2023-11-14 20:50:49'),
(487, 'Clients\\Models\\Client', 154, 'API TOKEN', '45afe1d8471a0fdfa6bd592fe4c937a5c59391dba0c307087d690d8b9f62048d', '[\"*\"]', NULL, NULL, '2023-11-14 20:51:19', '2023-11-14 20:51:19'),
(488, 'Clients\\Models\\Client', 155, 'API TOKEN', '4bffc4101cc978e4443442d574af31e424ca4444a95f4fdd29e3e7ec94235e78', '[\"*\"]', NULL, NULL, '2023-11-14 20:53:25', '2023-11-14 20:53:25'),
(489, 'Clients\\Models\\Client', 156, 'API TOKEN', '0348289d24466401edb79583f082d49951ff1991b3a2f6616132054e6f26f9c1', '[\"*\"]', NULL, NULL, '2023-11-14 20:58:37', '2023-11-14 20:58:37'),
(490, 'Clients\\Models\\Client', 156, 'API TOKEN', 'c907cbcfc9b33c4c83349a4371da77a274ec005bf7cc6642d28d3d53496d5bb1', '[\"*\"]', NULL, NULL, '2023-11-14 21:03:47', '2023-11-14 21:03:47'),
(491, 'Clients\\Models\\Client', 156, 'API TOKEN', '69baa7533860f6bd21556186a9ad1ab4b6e0b2ce920233db67a537106f30f917', '[\"*\"]', '2023-11-14 21:08:05', NULL, '2023-11-14 21:07:51', '2023-11-14 21:08:05'),
(492, 'Clients\\Models\\Client', 157, 'API TOKEN', '34676f7c3a9f227596312d2ec26a92ec1ab87894d7f11ada21b73bfd7ce35324', '[\"*\"]', NULL, NULL, '2023-11-14 21:08:34', '2023-11-14 21:08:34'),
(493, 'Clients\\Models\\Client', 157, 'API TOKEN', 'fae33b2d9863039aa90d0c0b5dab294b9f17621c8c0f7f35e65b2e30f01c4d05', '[\"*\"]', '2023-11-14 21:10:37', NULL, '2023-11-14 21:10:13', '2023-11-14 21:10:37'),
(494, 'Clients\\Models\\Client', 140, 'API TOKEN', '2d742d86c5456bf60492a66a6aa45400f5829e909b0f8a125ad5cb1b60708599', '[\"*\"]', '2023-11-14 21:14:29', NULL, '2023-11-14 21:14:27', '2023-11-14 21:14:29'),
(495, 'Clients\\Models\\Client', 140, 'API TOKEN', '01888f772eeaa82fb0a6215cda7a9730bd656995983ba7c0d97b539a418b4cd2', '[\"*\"]', '2023-11-14 22:50:19', NULL, '2023-11-14 21:29:07', '2023-11-14 22:50:19'),
(496, 'Clients\\Models\\Client', 140, 'API TOKEN', '2ce33c792b5c804faa717b7d0a46329e021e26b83757d8052e89c0a32703c0e7', '[\"*\"]', '2023-11-15 01:19:14', NULL, '2023-11-14 22:57:17', '2023-11-15 01:19:14'),
(497, 'Clients\\Models\\Client', 140, 'API TOKEN', '854159223ec5cba2d9fbaff368a5851b26c86aaccfef1d4721066c4d777cd2e8', '[\"*\"]', '2023-11-17 02:05:57', NULL, '2023-11-14 23:13:51', '2023-11-17 02:05:57'),
(498, 'Clients\\Models\\Client', 140, 'API TOKEN', '777e5e47a81261cd9948b8934c79e4278f7e03bfc32b5b8c354e23cdcba60240', '[\"*\"]', '2023-11-14 23:26:55', NULL, '2023-11-14 23:26:05', '2023-11-14 23:26:55'),
(499, 'Clients\\Models\\Client', 158, 'API TOKEN', '3005f3a4d118e74f3bcf5a2cd36214f2b6eac071822ccc7bc0a661cfd4751367', '[\"*\"]', '2023-11-15 01:37:11', NULL, '2023-11-15 01:29:44', '2023-11-15 01:37:11'),
(500, 'Clients\\Models\\Client', 159, 'API TOKEN', 'f333451c0c8c459581b8b7679e36ea08339eb4e2205edbc3e73dc4f991530f3d', '[\"*\"]', '2023-11-15 01:38:54', NULL, '2023-11-15 01:38:07', '2023-11-15 01:38:54'),
(501, 'Clients\\Models\\Client', 160, 'API TOKEN', '3d8a01a38d98ee27363e76b0770acbe140e77342ac27a6e3c88522eb238dbac7', '[\"*\"]', '2023-11-15 01:41:13', NULL, '2023-11-15 01:39:37', '2023-11-15 01:41:13'),
(502, 'Clients\\Models\\Client', 160, 'API TOKEN', '49a42842b20922b14c03236f3842968e25146451c575d7c65b424b190e5a06b9', '[\"*\"]', '2023-11-15 01:44:52', NULL, '2023-11-15 01:42:15', '2023-11-15 01:44:52'),
(503, 'Clients\\Models\\Client', 161, 'API TOKEN', 'cb6bdd1076574cfe70c60519b5c09fd14b1fec23c92fede1cd0d3aa206761ad2', '[\"*\"]', '2023-11-15 03:57:29', NULL, '2023-11-15 03:48:19', '2023-11-15 03:57:29'),
(504, 'Clients\\Models\\Client', 162, 'API TOKEN', '3e19c43cea3d631e5cd0bf28108b48124e01e46bd5587e9b36d43ec9b9014f80', '[\"*\"]', NULL, NULL, '2023-11-15 20:20:57', '2023-11-15 20:20:57'),
(505, 'Clients\\Models\\Client', 162, 'API TOKEN', 'e57aadeb40e56794daac3ce9bb96791efa3076d082e0be34e06b9553bd0d5ffa', '[\"*\"]', '2023-11-15 20:23:16', NULL, '2023-11-15 20:22:41', '2023-11-15 20:23:16'),
(506, 'Clients\\Models\\Client', 162, 'API TOKEN', '68e56fda839c84961444d57ffed63a8c35e8d34743ecf38e473b524f95905f51', '[\"*\"]', '2023-11-15 20:23:46', NULL, '2023-11-15 20:23:43', '2023-11-15 20:23:46'),
(507, 'Clients\\Models\\Client', 163, 'API TOKEN', 'ad9a625b9ae86ec09dfb9803cb985ecc1d79ee44611ca0fa02ddfbe2270f1730', '[\"*\"]', '2023-11-15 20:24:27', NULL, '2023-11-15 20:24:20', '2023-11-15 20:24:27'),
(508, 'Clients\\Models\\Client', 164, 'API TOKEN', '2f0407b8d2d856baba93d2c0b567c1ccd280392738304740e2ef33d736468548', '[\"*\"]', NULL, NULL, '2023-11-15 20:28:54', '2023-11-15 20:28:54'),
(509, 'Clients\\Models\\Client', 140, 'API TOKEN', 'f922e858632a337aca752598d3a8b94096655e691ac379b69a23a4fb6b9e2fe2', '[\"*\"]', '2023-11-16 00:25:35', NULL, '2023-11-15 20:29:08', '2023-11-16 00:25:35'),
(510, 'Clients\\Models\\Client', 165, 'API TOKEN', 'a4e11641f34b9dc1dda2842c100a4ea5c6ee14fe9596fa1abef4aa0730284b92', '[\"*\"]', '2023-11-15 22:46:34', NULL, '2023-11-15 21:53:36', '2023-11-15 22:46:34'),
(511, 'Clients\\Models\\Client', 140, 'API TOKEN', '5b92c5848b4a40075ae197c719cad8cc02e0fb26ab95beae46a1bc28a9b4f744', '[\"*\"]', '2023-11-21 23:22:40', NULL, '2023-11-15 22:00:34', '2023-11-21 23:22:40'),
(512, 'Clients\\Models\\Client', 165, 'API TOKEN', '6d19421a8f010b00f7a69bf7afcfa288d0a4f48f4e4c2607b3bfed0c9cdbf390', '[\"*\"]', '2023-11-17 02:47:35', NULL, '2023-11-16 00:26:38', '2023-11-17 02:47:35'),
(513, 'Clients\\Models\\Client', 166, 'API TOKEN', '58b489b80465f25586a9556af296547a7eac2c8df68c181c7ae0fe589a495e30', '[\"*\"]', '2023-11-16 05:43:07', NULL, '2023-11-16 05:36:36', '2023-11-16 05:43:07'),
(514, 'Clients\\Models\\Client', 140, 'API TOKEN', '707a78cc32bba2fdd3d614b9739c661edea82b7e68556e2345f5a07b4c7339c2', '[\"*\"]', '2023-11-16 17:49:50', NULL, '2023-11-16 17:49:39', '2023-11-16 17:49:50'),
(515, 'Clients\\Models\\Client', 165, 'API TOKEN', '22d817231ebc38226c96dd20f597ab1a71c66f890d3ccd3af4d2029938531cb8', '[\"*\"]', '2023-11-17 00:24:48', NULL, '2023-11-16 18:10:45', '2023-11-17 00:24:48'),
(516, 'Clients\\Models\\Client', 140, 'API TOKEN', '36b81607580c3a3e230c2c55580254827c1a05acdd5a391b11b1257148af6f3b', '[\"*\"]', '2023-11-16 18:21:33', NULL, '2023-11-16 18:21:06', '2023-11-16 18:21:33'),
(517, 'Clients\\Models\\Client', 165, 'API TOKEN', '7aecc66b4dfa03c8347c64b710ee2d131b354ff45364abb3ab11fd08bb6a0f15', '[\"*\"]', '2023-11-16 23:03:02', NULL, '2023-11-16 18:44:48', '2023-11-16 23:03:02'),
(518, 'Clients\\Models\\Client', 181, 'API TOKEN', 'c5756ee5258567487b0e383ebc349e11fa4b3a2f8c036ba2d044500a8e546ae1', '[\"*\"]', '2023-11-19 16:07:50', NULL, '2023-11-17 02:47:55', '2023-11-19 16:07:50'),
(519, 'Clients\\Models\\Client', 166, 'API TOKEN', 'd40e3542afa3706aa82f9b8ce936ea8122819b5e7de10446859222abc3cb779d', '[\"*\"]', '2023-11-22 01:28:27', NULL, '2023-11-18 06:18:16', '2023-11-22 01:28:27'),
(520, 'Clients\\Models\\Client', 140, 'API TOKEN', 'f7586412f70c32e19878a531b5f26410114cbfc4495f0b4dcbb0995ea54bb2ed', '[\"*\"]', '2023-11-20 18:00:29', NULL, '2023-11-19 16:08:22', '2023-11-20 18:00:29'),
(521, 'Clients\\Models\\Client', 152, 'API TOKEN', '1b628253fe63fcfe4da503a824e8f875e1436fa8c7a838a25417fe5b48a89481', '[\"*\"]', '2023-11-21 06:08:49', NULL, '2023-11-20 06:16:17', '2023-11-21 06:08:49'),
(522, 'Clients\\Models\\Client', 165, 'API TOKEN', 'd16e4bd3dcbe10c308b8ac1b541691bb01d4ccf22abc84d61c8fcdbc649f4706', '[\"*\"]', NULL, NULL, '2023-11-20 15:51:14', '2023-11-20 15:51:14'),
(523, 'Clients\\Models\\Client', 140, 'API TOKEN', '37fb6181aaee9ed28bb2df2992ffd6876ec51d8ae997cb2f667e33d4b3bfdcb9', '[\"*\"]', '2023-11-20 17:33:24', NULL, '2023-11-20 16:51:26', '2023-11-20 17:33:24'),
(524, 'Clients\\Models\\Client', 186, 'API TOKEN', '7a322c819e21c850ef3ed09d3f5f2ed5785618b725370008ff2a5b331fbf03cc', '[\"*\"]', NULL, NULL, '2023-11-20 17:38:27', '2023-11-20 17:38:27'),
(525, 'Clients\\Models\\Client', 140, 'API TOKEN', 'fea629326a054caebc9b527bccd13777f07e3f6124cd3372fa94a0377ba822db', '[\"*\"]', '2023-11-20 17:39:04', NULL, '2023-11-20 17:38:45', '2023-11-20 17:39:04');
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(526, 'Clients\\Models\\Client', 140, 'API TOKEN', '7fac65ec4aa094dcca88e0bd6be0f72b4f31e92264e047ebae4c1a8b433a1779', '[\"*\"]', '2023-11-26 16:27:09', NULL, '2023-11-20 17:40:08', '2023-11-26 16:27:09'),
(527, 'Clients\\Models\\Client', 140, 'API TOKEN', 'c59b579de1d89c50ff746fc7c0b31aa24f536002677e85cf23aaea87778698b0', '[\"*\"]', '2023-11-20 22:59:10', NULL, '2023-11-20 22:55:51', '2023-11-20 22:59:10'),
(528, 'Clients\\Models\\Client', 189, 'API TOKEN', '7ed3762a5906e0fe4deb37a5a853d64b87b202961f70f4e585370d1d60185742', '[\"*\"]', NULL, NULL, '2023-11-20 23:27:04', '2023-11-20 23:27:04'),
(529, 'Clients\\Models\\Client', 190, 'API TOKEN', '0e30c5b346f1f0646ece2d89ce00b13af6cea2e2e1fb0cd6eb5b5fc48fbef19d', '[\"*\"]', NULL, NULL, '2023-11-20 23:27:38', '2023-11-20 23:27:38'),
(530, 'Clients\\Models\\Client', 190, 'API TOKEN', '93e0ac46c7ebd39fce1b094a9a3de5727e5f6fc196828e236b04d6f8c82c6275', '[\"*\"]', '2023-11-21 22:17:19', NULL, '2023-11-20 23:29:42', '2023-11-21 22:17:19'),
(531, 'Clients\\Models\\Client', 152, 'API TOKEN', 'd26f60aa2e99314f8bf161529d920030507399ed9d398a1a7ca9bc94b4b5b741', '[\"*\"]', '2023-11-21 06:55:07', NULL, '2023-11-21 06:45:20', '2023-11-21 06:55:07'),
(532, 'Clients\\Models\\Client', 190, 'API TOKEN', '0fcfe9ba358fdc67b4d5701c8e153a2875283f16f51af6521a425cdd6cb70dab', '[\"*\"]', '2023-11-22 21:03:59', NULL, '2023-11-21 22:18:04', '2023-11-22 21:03:59'),
(533, 'Clients\\Models\\Client', 140, 'API TOKEN', '9d3b45b3e4fa2aa01bf21c24aad999c91e96c574d2b615097fa8d5f946a221b1', '[\"*\"]', '2023-11-22 00:12:55', NULL, '2023-11-22 00:12:44', '2023-11-22 00:12:55'),
(534, 'Clients\\Models\\Client', 166, 'API TOKEN', 'dbb067554ba35e61e6f20f76f5f1faebcabea4c6d0cb8d28723195523aa494d3', '[\"*\"]', '2023-11-22 03:53:34', NULL, '2023-11-22 01:29:06', '2023-11-22 03:53:34'),
(535, 'Clients\\Models\\Client', 140, 'API TOKEN', 'de91e5cf7c839b6c07a8ace5f658bff97cd54098d98d45e08552260ffb8bb8e0', '[\"*\"]', '2023-11-26 16:15:01', NULL, '2023-11-23 20:05:37', '2023-11-26 16:15:01'),
(536, 'Clients\\Models\\Client', 206, 'API TOKEN', '25352b1c32062c6e97b8f5e01e4f3311ff43909f04bbd1f6673f08ebbd4fb96b', '[\"*\"]', '2023-11-23 20:36:54', NULL, '2023-11-23 20:36:32', '2023-11-23 20:36:54'),
(537, 'Clients\\Models\\Client', 140, 'API TOKEN', '2324ea5f48f915572a7c0556574433fccf9d54b49d74010c94b70927edb87d1f', '[\"*\"]', '2023-11-26 21:26:32', NULL, '2023-11-23 20:40:53', '2023-11-26 21:26:32'),
(538, 'Clients\\Models\\Client', 208, 'API TOKEN', '6e7193258d65e0d3d05c0eb460da817eda020ccf42c02d3b448c2d079a2c8142', '[\"*\"]', NULL, NULL, '2023-11-24 00:52:54', '2023-11-24 00:52:54'),
(539, 'Clients\\Models\\Client', 152, 'API TOKEN', 'b09933ecb84d0ef3667a12e0d31b4425137eebdbe4a749430ee80a0f73f670e2', '[\"*\"]', '2023-11-24 19:36:40', NULL, '2023-11-24 00:53:11', '2023-11-24 19:36:40'),
(540, 'Clients\\Models\\Client', 140, 'API TOKEN', '0ec32e21ef32a9d231892252dfb9ff2f19017571f02a64a5068b618c0fd32f58', '[\"*\"]', NULL, NULL, '2023-11-25 00:30:07', '2023-11-25 00:30:07'),
(541, 'Clients\\Models\\Client', 140, 'API TOKEN', '8db562b3f7d29f96677197f707d232384f42ff8ddf3d267515a2ac830bcfb609', '[\"*\"]', '2023-11-25 00:31:58', NULL, '2023-11-25 00:30:18', '2023-11-25 00:31:58'),
(542, 'Clients\\Models\\Client', 152, 'API TOKEN', '60d4efb6b71a22df77e71f4cab71e07a27f4018a21d76992939c1c2d2db0df55', '[\"*\"]', '2023-11-26 01:06:57', NULL, '2023-11-26 01:06:48', '2023-11-26 01:06:57'),
(543, 'Clients\\Models\\Client', 140, 'API TOKEN', 'd8af1647826236944a97af289004fdb4fdcaa5afffc271b03b1309d5bbe51526', '[\"*\"]', '2023-11-27 20:07:35', NULL, '2023-11-26 16:15:16', '2023-11-27 20:07:35'),
(544, 'Clients\\Models\\Client', 140, 'API TOKEN', '155ee3fc0b573ff0cebdf0c73148a1fa3fd0d8e02bfc76c73ec9e5d6de41cc62', '[\"*\"]', NULL, NULL, '2023-11-26 16:24:11', '2023-11-26 16:24:11'),
(545, 'Clients\\Models\\Client', 140, 'API TOKEN', '2c3b591da2b3212801969c4aca805208a9de9c516d44a24037ca3281c9c19e33', '[\"*\"]', '2023-11-27 20:48:24', NULL, '2023-11-26 16:28:47', '2023-11-27 20:48:24'),
(546, 'Clients\\Models\\Client', 140, 'API TOKEN', '4e14e6e59948b9b6cb788d35e12dff4bb283246aa4b05bd9046d7a721a54bb74', '[\"*\"]', NULL, NULL, '2023-11-26 16:36:07', '2023-11-26 16:36:07'),
(547, 'Clients\\Models\\Client', 209, 'API TOKEN', 'f75cfbead451a192bbe165d81cf986d341b65072d8e9d9661b1b7985b7a733ae', '[\"*\"]', '2023-11-30 18:07:28', NULL, '2023-11-26 19:12:53', '2023-11-30 18:07:28'),
(548, 'Clients\\Models\\Client', 140, 'API TOKEN', 'b2447689a035af90382aaede88d9c61517cbf92e9fbbe0d225353845d143cb0a', '[\"*\"]', '2023-11-26 22:44:19', NULL, '2023-11-26 21:37:24', '2023-11-26 22:44:19'),
(549, 'Clients\\Models\\Client', 140, 'API TOKEN', 'c89218398b2972dab7371140a967e76420f15e6ecc04e1c96e31742affc0ffe4', '[\"*\"]', '2023-11-26 22:44:42', NULL, '2023-11-26 22:44:25', '2023-11-26 22:44:42'),
(550, 'Clients\\Models\\Client', 140, 'API TOKEN', 'a4cf0d3686728c81931ab73ff6cd1db6e47d9343c3bad37e3a1707504ce9a28a', '[\"*\"]', '2023-11-27 18:47:44', NULL, '2023-11-26 23:59:28', '2023-11-27 18:47:44'),
(551, 'Clients\\Models\\Client', 140, 'API TOKEN', '43b0cfb7107a367b8eda2695a4e37cc656c85b130ae9b7ca012822c36d995c06', '[\"*\"]', NULL, NULL, '2023-11-27 15:21:39', '2023-11-27 15:21:39'),
(552, 'Clients\\Models\\Client', 140, 'API TOKEN', '5655bcbe09ef2b206e506132b415f93516d686eac56cfce7890a3bd438a2306e', '[\"*\"]', '2023-11-27 15:47:52', NULL, '2023-11-27 15:46:57', '2023-11-27 15:47:52'),
(553, 'Clients\\Models\\Client', 140, 'API TOKEN', '5d2bb823a84e0912fe05ee0c54270f6c2f93268580b5bb8ee901aecabfbfc64e', '[\"*\"]', NULL, NULL, '2023-11-27 15:47:20', '2023-11-27 15:47:20'),
(554, 'Clients\\Models\\Client', 140, 'API TOKEN', 'd24888c56ae07472a734f4cca29cc363e495f0dece270093252a4a4ec07cfcc3', '[\"*\"]', '2023-11-27 18:49:25', NULL, '2023-11-27 16:03:41', '2023-11-27 18:49:25'),
(555, 'Clients\\Models\\Client', 152, 'API TOKEN', '8739e8259f5e9130cdcb0ce672f658a06d582cbbaed0bf4b1f66d592c6312e6c', '[\"*\"]', '2023-11-27 18:10:52', NULL, '2023-11-27 17:10:35', '2023-11-27 18:10:52'),
(556, 'Clients\\Models\\Client', 152, 'API TOKEN', 'dd9521bea5fef4e320a10a680ba8ade4d2e9dac4e02f88c4c55742c99896fc2f', '[\"*\"]', '2023-11-27 23:58:32', NULL, '2023-11-27 18:23:37', '2023-11-27 23:58:32'),
(557, 'Clients\\Models\\Client', 157, 'API TOKEN', 'a1f1cc50f22b77ae07f7ea729ba352eb1668d41f14faaa1a7eee110aeccccc5b', '[\"*\"]', '2023-11-27 20:49:31', NULL, '2023-11-27 20:49:29', '2023-11-27 20:49:31'),
(558, 'Clients\\Models\\Client', 157, 'API TOKEN', '5c366da344545caae7c2a36fa1e67b466812bb5ecb8bbc0b481c9d68a8829602', '[\"*\"]', '2023-11-27 20:49:56', NULL, '2023-11-27 20:49:53', '2023-11-27 20:49:56'),
(559, 'Clients\\Models\\Client', 212, 'API TOKEN', '43796ac679c3c9d41e398e69fe5daf06428c2784fb87e813d2779fe071847626', '[\"*\"]', '2023-11-28 19:18:16', NULL, '2023-11-27 20:50:59', '2023-11-28 19:18:16'),
(560, 'Clients\\Models\\Client', 140, 'API TOKEN', '38fd3887d9c9b7d49c745f3579cc77491189370836cea173d068e8ba6e3533c3', '[\"*\"]', NULL, NULL, '2023-11-27 21:00:50', '2023-11-27 21:00:50'),
(561, 'Clients\\Models\\Client', 212, 'API TOKEN', '9ed3660cabc1e92546a2799a65ba2222a7ccc9b96b32bdaa2cec056df9b57dbc', '[\"*\"]', '2023-11-27 21:56:31', NULL, '2023-11-27 21:55:58', '2023-11-27 21:56:31'),
(562, 'Clients\\Models\\Client', 152, 'API TOKEN', '88e1a3c4a0ecbc4b8170c3797c38b7c8ff25c58fc88c8191e5cd35430ba641b5', '[\"*\"]', '2023-11-28 01:06:53', NULL, '2023-11-28 00:25:58', '2023-11-28 01:06:53'),
(563, 'Clients\\Models\\Client', 214, 'API TOKEN', 'cc8de4a34019c4eea4dfc0434ac7b8dcd3d782e85ad2cdd06ba4ec2b1bbc76fb', '[\"*\"]', '2023-11-28 03:32:39', NULL, '2023-11-28 00:35:51', '2023-11-28 03:32:39'),
(564, 'Clients\\Models\\Client', 215, 'API TOKEN', 'a7e914d4cd5d786ffe3055bab74ed2606fe33d9833ba3b878c156f0daeee1a20', '[\"*\"]', NULL, NULL, '2023-11-28 01:09:39', '2023-11-28 01:09:39'),
(565, 'Clients\\Models\\Client', 215, 'API TOKEN', '77a45a2e0dcca8a1151a1fefb0a67716561f15e1ac26289bb60aab7de6eeee40', '[\"*\"]', '2023-11-28 01:10:23', NULL, '2023-11-28 01:10:00', '2023-11-28 01:10:23'),
(566, 'Clients\\Models\\Client', 152, 'API TOKEN', 'da338ee39c82430dc584775f012368074adadad039dd18f47d293b1eca4d7b11', '[\"*\"]', '2023-11-28 01:12:47', NULL, '2023-11-28 01:11:04', '2023-11-28 01:12:47'),
(567, 'Clients\\Models\\Client', 140, 'API TOKEN', '2f8cac09cdfe7026f99067b19325acc0d36c7c93bafdb824c1869df8c8d01f67', '[\"*\"]', '2023-11-28 13:27:56', NULL, '2023-11-28 01:12:59', '2023-11-28 13:27:56'),
(568, 'Clients\\Models\\Client', 216, 'API TOKEN', 'db355abc24158f1897d61e22b215a16815c7c3b2e52bc769bdac4d66a37d1165', '[\"*\"]', '2023-11-28 03:44:21', NULL, '2023-11-28 02:09:56', '2023-11-28 03:44:21'),
(569, 'Clients\\Models\\Client', 217, 'API TOKEN', '726b036dd5e2580002237ca2b6b9a288fb4456eecd273094f8b1e802cdb197ed', '[\"*\"]', '2023-11-28 03:52:43', NULL, '2023-11-28 03:46:51', '2023-11-28 03:52:43'),
(570, 'Clients\\Models\\Client', 152, 'API TOKEN', '708e18e2c562ba4e5b4e29ea61d0b65607abc9841cb462081a4b9761e8b8cd27', '[\"*\"]', '2023-11-28 13:32:49', NULL, '2023-11-28 13:31:35', '2023-11-28 13:32:49'),
(571, 'Clients\\Models\\Client', 215, 'API TOKEN', 'de978366347ee71b2d2425be0af1a0aeb8ea1415313e9eb94988552cb03ca263', '[\"*\"]', NULL, NULL, '2023-11-28 13:35:17', '2023-11-28 13:35:17'),
(572, 'Clients\\Models\\Client', 140, 'API TOKEN', 'c16506a7225a5314293b5df206e2a3296074c2074c41797874fd6de1cf08de82', '[\"*\"]', '2023-11-29 02:23:44', NULL, '2023-11-28 13:36:12', '2023-11-29 02:23:44'),
(573, 'Clients\\Models\\Client', 140, 'API TOKEN', 'c920e91228e8f1aa5057a2f4512d16c32b4eadd7fd36633d3752479ff44e1d0a', '[\"*\"]', '2023-11-29 23:22:01', NULL, '2023-11-28 19:20:10', '2023-11-29 23:22:01'),
(574, 'Clients\\Models\\Client', 216, 'API TOKEN', 'da9ff73b321f9e302c0b185b45e488e97be869eac03b595acafdfcf16398c38b', '[\"*\"]', '2023-11-29 07:38:01', NULL, '2023-11-29 07:37:18', '2023-11-29 07:38:01'),
(575, 'Clients\\Models\\Client', 159, 'API TOKEN', '622814652906f0ad93266bc189dfdb77dd32b319eefa4bb8ff66e34d00b2e648', '[\"*\"]', '2023-11-29 23:22:31', NULL, '2023-11-29 23:22:28', '2023-11-29 23:22:31'),
(576, 'Clients\\Models\\Client', 218, 'API TOKEN', 'a895951ba950d42fa29a058e6f192770e6de628af980cf68ec8f06f7ebba6053', '[\"*\"]', '2023-11-30 23:03:58', NULL, '2023-11-29 23:23:01', '2023-11-30 23:03:58'),
(577, 'Clients\\Models\\Client', 215, 'API TOKEN', 'd5b08e42de72a0492c3bdd26dc037c3948a82755fb7adb4a10a34761ef5b805d', '[\"*\"]', NULL, NULL, '2023-11-30 01:01:48', '2023-11-30 01:01:48'),
(578, 'Clients\\Models\\Client', 140, 'API TOKEN', '65ff6470392fd9d80a4ace5cbad0a9474fc8299a70c2861b8014728e8ffb32d5', '[\"*\"]', NULL, NULL, '2023-11-30 01:01:57', '2023-11-30 01:01:57'),
(579, 'Clients\\Models\\Client', 140, 'API TOKEN', '01ccfe9443ce227b5485aca92364bc03ed72c2c649894cdd00d607e09b6bb69c', '[\"*\"]', '2023-11-30 03:02:08', NULL, '2023-11-30 01:02:34', '2023-11-30 03:02:08'),
(580, 'Clients\\Models\\Client', 140, 'API TOKEN', '817778e00f206ba14bc38438e0477282a3add954b1e90acd430228a64b5bd9cd', '[\"*\"]', '2023-11-30 02:48:44', NULL, '2023-11-30 02:47:54', '2023-11-30 02:48:44'),
(581, 'Clients\\Models\\Client', 209, 'API TOKEN', 'c093896a10c9c34ca0bff9c27ff8349c0266643b33c74bc4fc9fc2194cf491d3', '[\"*\"]', '2023-11-30 18:38:03', NULL, '2023-11-30 18:33:05', '2023-11-30 18:38:03'),
(582, 'Clients\\Models\\Client', 209, 'API TOKEN', 'ac41cb221313d012c04b5b6d109d29d46aa6db6b33223593b9e036ed46574bcb', '[\"*\"]', '2023-11-30 18:39:31', NULL, '2023-11-30 18:34:25', '2023-11-30 18:39:31'),
(583, 'Clients\\Models\\Client', 140, 'API TOKEN', '8eacd6235438b14eae824928c139c71f221fc151439a616d0a18d1202707b216', '[\"*\"]', '2023-12-02 19:35:21', NULL, '2023-12-02 17:15:03', '2023-12-02 19:35:21'),
(584, 'App\\Models\\User', 36, 'API TOKEN', '3417ce3a9cbaded90ba319161cc6589ec6af7204452e321f480f4ee8b698782c', '[\"*\"]', NULL, NULL, '2023-12-31 08:57:40', '2023-12-31 08:57:40'),
(585, 'App\\Models\\User', 39, 'API TOKEN', '71b970a883bd02c6da4ca9ab16e5f0aa933fd202c88de06321cbc2c6e1fa4b15', '[\"*\"]', NULL, NULL, '2024-01-04 10:13:17', '2024-01-04 10:13:17'),
(586, 'App\\Models\\User', 40, 'API TOKEN', '406920d8f6575ec8196d6d769afde0be05e1c1afe9bc2e33bda49e5242973870', '[\"*\"]', NULL, NULL, '2024-01-04 10:13:25', '2024-01-04 10:13:25'),
(587, 'App\\Models\\User', 41, 'API TOKEN', '48ec6d3c1ec53d83490819d8b8694cfdb6810c8a27df71d2bad5440bae36cf22', '[\"*\"]', NULL, NULL, '2024-01-04 10:13:28', '2024-01-04 10:13:28'),
(588, 'App\\Models\\User', 36, 'API TOKEN', '9c9b930c5b28d04bb4b131aaf52933f0002aa744ccb1e0e0333eec683abfd712', '[\"*\"]', NULL, NULL, '2024-01-04 10:14:54', '2024-01-04 10:14:54'),
(589, 'App\\Models\\User', 36, 'API TOKEN', 'f47ced75425bbeac92355ac3a460d987a85d1940635c16d7ede7f6d09e6d45b8', '[\"*\"]', NULL, NULL, '2024-01-04 10:16:15', '2024-01-04 10:16:15'),
(590, 'App\\Models\\User', 36, 'API TOKEN', '165ded7dad78ffa878f0935d8527785dba56c399440ac09d104bb281ff127165', '[\"*\"]', NULL, NULL, '2024-01-04 10:16:43', '2024-01-04 10:16:43'),
(591, 'App\\Models\\User', 36, 'API TOKEN', '98fe677412f06a3228319fc3d20a9a9559fd29749befd0be091128bb4fc8fd2d', '[\"*\"]', NULL, NULL, '2024-01-04 10:21:41', '2024-01-04 10:21:41'),
(592, 'App\\Models\\User', 36, 'API TOKEN', '720948295b26da8688200c95e7ece5d71beb69fd5604408b53042e0fbdad0ae0', '[\"*\"]', '2024-01-04 10:28:01', NULL, '2024-01-04 10:22:34', '2024-01-04 10:28:01'),
(593, 'App\\Models\\User', 36, 'API TOKEN', 'f69f853a5d11646382f72bb04c460e58e2e899a7269991235316258db9b2d83a', '[\"*\"]', '2024-01-04 10:28:57', NULL, '2024-01-04 10:28:05', '2024-01-04 10:28:57'),
(594, 'App\\Models\\User', 36, 'API TOKEN', '7efa766c25f9af32976f1ae34ab8953df1f652e677a0e923cfdd1960ef206d6c', '[\"*\"]', '2024-01-04 10:30:32', NULL, '2024-01-04 10:29:02', '2024-01-04 10:30:32'),
(595, 'App\\Models\\User', 36, 'API TOKEN', '082ad03b332661fb12758c257b9915e79229667e667556ae5ab279bc8cc1aa82', '[\"*\"]', '2024-01-04 12:40:04', NULL, '2024-01-04 10:30:36', '2024-01-04 12:40:04'),
(596, 'App\\Models\\User', 36, 'API TOKEN', '1d82cfe16faa2fe55aff630c0badb4ea3cf24a67ae9ca3db321a1e73e6449eda', '[\"*\"]', NULL, NULL, '2024-01-10 14:08:42', '2024-01-10 14:08:42'),
(597, 'App\\Models\\User', 42, 'API TOKEN', 'c8e8da3dbcf1afb103d9ec793f13a760f637932f7d4b204a87bf40079fcc44fa', '[\"*\"]', NULL, NULL, '2024-01-31 14:20:18', '2024-01-31 14:20:18'),
(598, 'App\\Models\\User', 42, 'API TOKEN', '7212915f56ad424ab450d6932cf75846e3c18e31522235f7cf4ff08daee0bef2', '[\"*\"]', NULL, NULL, '2024-01-31 14:20:57', '2024-01-31 14:20:57'),
(599, 'App\\Models\\User', 42, 'API TOKEN', '25d1cc258f2608918a875cad3cc3896a88a8beadbdab40f1704d91abbddb98f5', '[\"*\"]', '2024-03-09 16:09:09', NULL, '2024-03-09 15:52:43', '2024-03-09 16:09:09'),
(600, 'App\\Models\\User', 42, 'API TOKEN', '48172c005b898d1e28207dd1a1eae3a9ec0a28be722187c8f1e7783e1692f470', '[\"*\"]', '2024-03-10 22:16:09', NULL, '2024-03-10 21:48:40', '2024-03-10 22:16:09'),
(601, 'App\\Models\\User', 42, 'API TOKEN', '53408e0b3180bad041693b26e2c83c50d976f6bafc0a266169adf1122d67c26f', '[\"*\"]', '2024-03-12 16:22:34', NULL, '2024-03-12 16:19:19', '2024-03-12 16:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `has_ai_assistant` int(10) NOT NULL DEFAULT 0,
  `upload_video` int(10) NOT NULL DEFAULT 0,
  `channels_count` int(10) NOT NULL DEFAULT 0,
  `posts_count` int(10) NOT NULL DEFAULT 0,
  `created_by` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `price`, `status`, `has_ai_assistant`, `upload_video`, `channels_count`, `posts_count`, `created_by`, `created_at`, `updated_at`) VALUES
(6, 100.00, 1, 0, 0, 0, 0, '', '2024-01-31 14:04:14', '2024-01-31 14:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `plan_translations`
--

CREATE TABLE `plan_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `items` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_translations`
--

INSERT INTO `plan_translations` (`id`, `plan_id`, `locale`, `name`, `content`, `items`, `created_at`, `updated_at`) VALUES
(10, 6, 'en', 'Sierra Green', 'Vero amet laboris n', 'Non natus quaerat el,aaaaa,www', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-12-14 12:55:04', '2022-12-14 12:55:04'),
(13, 'Client', 'web', '2024-01-31 13:47:28', '2024-01-31 13:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(218, 1),
(219, 1),
(220, 1),
(255, 1),
(256, 1),
(257, 1),
(258, 1),
(269, 1),
(270, 1),
(271, 1),
(272, 1),
(316, 1),
(319, 1),
(320, 1),
(321, 1),
(322, 1),
(323, 1),
(324, 1),
(325, 1),
(326, 1),
(327, 1),
(328, 1),
(329, 1),
(330, 1),
(359, 1),
(377, 1),
(378, 1),
(379, 1),
(380, 1),
(381, 1),
(382, 1),
(383, 1),
(384, 1),
(385, 1),
(386, 1),
(387, 1),
(388, 1),
(389, 1),
(390, 1),
(391, 1),
(392, 1),
(393, 1),
(394, 1),
(395, 1),
(396, 1),
(397, 1),
(398, 1),
(399, 1),
(400, 1),
(401, 1),
(402, 1),
(403, 1),
(404, 1),
(405, 1),
(406, 1),
(407, 1),
(408, 1),
(409, 1),
(410, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `order_no` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'home',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `status`, `order_no`, `created_by`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 0, NULL, 'home', '2023-12-19 13:09:42', '2023-12-19 13:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `section_gallery`
--

CREATE TABLE `section_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `section_gallery`
--

INSERT INTO `section_gallery` (`id`, `section_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'storage/uploads/home_sections/image-removebg-preview (1)4781_1706288341.png', '2024-01-26 14:59:01', '2024-01-26 14:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `section_translations`
--

CREATE TABLE `section_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `btn_text` varchar(255) DEFAULT NULL,
  `btn_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_translations`
--

INSERT INTO `section_translations` (`id`, `section_id`, `locale`, `name`, `sub_title`, `content`, `btn_text`, `btn_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Ashely Gilmore', NULL, 'Ea voluptates tempor', NULL, NULL, NULL, NULL),
(2, 1, 'ar', 'Bevis Day', NULL, 'Qui temporibus in is', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `status`, `image`, `created_by`, `created_at`, `updated_at`) VALUES
(5, 1, 'storage/uploads/services/car8597_1702997404.png', NULL, '2023-12-19 12:50:04', '2023-12-19 12:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `service_translations`
--

CREATE TABLE `service_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_translations`
--

INSERT INTO `service_translations` (`id`, `service_id`, `locale`, `name`, `content`, `created_at`, `updated_at`) VALUES
(8, 5, 'en', 'Montana Pennington', 'Sequi nulla assumend', NULL, NULL),
(9, 5, 'ar', 'Ronan Chase', 'Aliquip vero dolor d', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_icon` varchar(255) DEFAULT NULL,
  `social_link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sort` int(11) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_media_channels`
--

CREATE TABLE `social_media_channels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `social_icon` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sort` int(11) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media_channels`
--

INSERT INTO `social_media_channels` (`id`, `title`, `social_icon`, `status`, `sort`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'Facebook', 'storage/uploads/social_media_channels/135_2024_03_14_1710438588.png', 1, NULL, NULL, '2024-03-14 15:49:48', '2024-03-14 15:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `publish` int(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `is_verified` int(10) NOT NULL DEFAULT 0,
  `subscription_id` varchar(255) DEFAULT NULL,
  `facebook_token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `type`, `publish`, `created_at`, `updated_at`, `mobile_number`, `device_token`, `avatar`, `is_verified`, `subscription_id`, `facebook_token`) VALUES
(1, 'Admininstrator', 'admin@virallify.com', NULL, '$2y$10$z4G/.L9Cx.EtA.b6kK69cuuJxxlFypl8no9jQS9LTDX6eJu4QuZqS', 'lQ5j5OLvPSI0Eg8ne7NDvy07z6zG4AUZsVdsAt9oHVloE7E4LCmabFyVgsGc', 'admin', 1, '2022-12-14 12:51:32', '2022-12-14 12:51:32', NULL, NULL, NULL, 0, NULL, 'EAACT89d2kZCMBO54wtPdPgwkNiRHeLco1rW9LDtoqmiqo1olYxlqjpkit3GY2IDzZBJcTyZClCfOwbaEfjCzBz8b3nrg87cDg2lhMc3BWgiGDAXc6IZAyIkISUL1HloqNTzXAZCjmF1kg8tiS7Aifs2bR92EVMSStWRZB34vDZAlz5YrSL4ZAQTtgqVC3Aptx1EEgC1RVm9dCwZDZD'),
(42, 'Ahmed Ramadan', 'ahmed@ahmed.com', NULL, '$2y$10$kMJj8a3C1uIZf9jpreY0MeX4amdHdfHw9UgSTV5dDieC1/gNYo88K', NULL, 'client', 1, '2024-01-31 14:20:18', '2024-01-31 14:20:18', '01117725721', NULL, NULL, 0, NULL, 'EAACT89d2kZCMBO54wtPdPgwkNiRHeLco1rW9LDtoqmiqo1olYxlqjpkit3GY2IDzZBJcTyZClCfOwbaEfjCzBz8b3nrg87cDg2lhMc3BWgiGDAXc6IZAyIkISUL1HloqNTzXAZCjmF1kg8tiS7Aifs2bR92EVMSStWRZB34vDZAlz5YrSL4ZAQTtgqVC3Aptx1EEgC1RVm9dCwZDZD');

-- --------------------------------------------------------

--
-- Table structure for table `users_addresses`
--

CREATE TABLE `users_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street_name` varchar(255) DEFAULT NULL,
  `building_no` varchar(255) DEFAULT NULL,
  `floor_no` varchar(255) DEFAULT NULL,
  `flat_no` varchar(255) DEFAULT NULL,
  `address_type` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1 for home 2 for work',
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_addresses`
--

INSERT INTO `users_addresses` (`id`, `street_name`, `building_no`, `floor_no`, `flat_no`, `address_type`, `lat`, `long`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Walter Fry', 'Porro veniam quam n', 'Non praesentium expe', 'Aliqua Dolor sunt', '1', 'Quia libero non fugi', 'Nesciunt in corrupt', 1, '2023-12-25 07:21:45', '2023-12-25 07:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `users_plans`
--

CREATE TABLE `users_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `paypal_plan_id` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `publish` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'foreign key of "users" table',
  `plan_id` int(5) DEFAULT NULL COMMENT 'foreign key of "plans" table',
  `paypal_order_id` varchar(255) DEFAULT NULL,
  `paypal_plan_id` varchar(255) DEFAULT NULL,
  `paypal_subscr_id` varchar(100) NOT NULL,
  `valid_from` datetime DEFAULT NULL,
  `valid_to` datetime DEFAULT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `currency_code` varchar(10) NOT NULL,
  `subscriber_id` varchar(100) DEFAULT NULL,
  `subscriber_name` varchar(50) DEFAULT NULL,
  `subscriber_email` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `youtube_access_tokens`
--

CREATE TABLE `youtube_access_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `access_token` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq_settings`
--
ALTER TABLE `faq_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_setting_translations`
--
ALTER TABLE `faq_setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faq_setting_translations_faq_setting_id_locale_unique` (`faq_setting_id`,`locale`),
  ADD KEY `faq_setting_translations_locale_index` (`locale`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_translations`
--
ALTER TABLE `footer_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `footer_translations_footer_id_locale_unique` (`footer_id`,`locale`),
  ADD KEY `footer_translations_locale_index` (`locale`);

--
-- Indexes for table `home_banner`
--
ALTER TABLE `home_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banner_translations`
--
ALTER TABLE `home_banner_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `footer_translations_footer_id_locale_unique` (`home_banner_id`,`locale`),
  ADD KEY `footer_translations_locale_index` (`locale`);

--
-- Indexes for table `langauges`
--
ALTER TABLE `langauges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_translates`
--
ALTER TABLE `language_translates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_settings`
--
ALTER TABLE `main_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_setting_translations`
--
ALTER TABLE `main_setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `main_setting_translations_main_setting_id_locale_unique` (`main_setting_id`,`locale`),
  ADD KEY `main_setting_translations_locale_index` (`locale`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_car_type_id_foreign` (`car_type_id`),
  ADD KEY `orders_service_id_foreign` (`service_id`),
  ADD KEY `orders_user_plan_id_foreign` (`user_plan_id`),
  ADD KEY `orders_client_id_foreign` (`client_id`),
  ADD KEY `orders_representative_id_foreign` (`representative_id`),
  ADD KEY `orders_user_address_id_foreign` (`user_address_id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otps_user_id_foreign` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_translations_page_id_locale_unique` (`page_id`,`locale`),
  ADD KEY `page_translations_locale_index` (`locale`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_translations`
--
ALTER TABLE `partner_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_translations_service_id_locale_unique` (`partner_id`,`locale`),
  ADD UNIQUE KEY `service_translations_name_unique` (`name`),
  ADD KEY `service_translations_locale_index` (`locale`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_translations`
--
ALTER TABLE `plan_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plan_translations_plan_id_locale_unique` (`plan_id`,`locale`),
  ADD KEY `plan_translations_locale_index` (`locale`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_gallery`
--
ALTER TABLE `section_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home_section_gallery_id_foreign` (`section_id`);

--
-- Indexes for table `section_translations`
--
ALTER TABLE `section_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `car_type_translations_car_type_id_locale_unique` (`section_id`,`locale`),
  ADD UNIQUE KEY `car_type_translations_name_unique` (`name`),
  ADD KEY `car_type_translations_locale_index` (`locale`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_translations`
--
ALTER TABLE `service_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_translations_service_id_locale_unique` (`service_id`,`locale`),
  ADD UNIQUE KEY `service_translations_name_unique` (`name`),
  ADD KEY `service_translations_locale_index` (`locale`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media_channels`
--
ALTER TABLE `social_media_channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_addresses`
--
ALTER TABLE `users_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `users_plans`
--
ALTER TABLE `users_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_plans_plan_id_foreign` (`plan_id`),
  ADD KEY `users_plans_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube_access_tokens`
--
ALTER TABLE `youtube_access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_settings`
--
ALTER TABLE `faq_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faq_setting_translations`
--
ALTER TABLE `faq_setting_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_translations`
--
ALTER TABLE `footer_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_banner`
--
ALTER TABLE `home_banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_banner_translations`
--
ALTER TABLE `home_banner_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `langauges`
--
ALTER TABLE `langauges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `language_translates`
--
ALTER TABLE `language_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=491;

--
-- AUTO_INCREMENT for table `main_settings`
--
ALTER TABLE `main_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_setting_translations`
--
ALTER TABLE `main_setting_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `partner_translations`
--
ALTER TABLE `partner_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=602;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `plan_translations`
--
ALTER TABLE `plan_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section_gallery`
--
ALTER TABLE `section_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section_translations`
--
ALTER TABLE `section_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_translations`
--
ALTER TABLE `service_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `social_media_channels`
--
ALTER TABLE `social_media_channels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users_addresses`
--
ALTER TABLE `users_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_plans`
--
ALTER TABLE `users_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `youtube_access_tokens`
--
ALTER TABLE `youtube_access_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faq_setting_translations`
--
ALTER TABLE `faq_setting_translations`
  ADD CONSTRAINT `faq_setting_translations_faq_setting_id_foreign` FOREIGN KEY (`faq_setting_id`) REFERENCES `faq_settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `footer_translations`
--
ALTER TABLE `footer_translations`
  ADD CONSTRAINT `footer_translations_footer_id_foreign` FOREIGN KEY (`footer_id`) REFERENCES `footer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `home_banner_translations`
--
ALTER TABLE `home_banner_translations`
  ADD CONSTRAINT `home_banner_foregin_key` FOREIGN KEY (`home_banner_id`) REFERENCES `home_banner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `main_setting_translations`
--
ALTER TABLE `main_setting_translations`
  ADD CONSTRAINT `main_setting_translations_main_setting_id_foreign` FOREIGN KEY (`main_setting_id`) REFERENCES `main_settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_car_type_id_foreign` FOREIGN KEY (`car_type_id`) REFERENCES `home_sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_representative_id_foreign` FOREIGN KEY (`representative_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_address_id_foreign` FOREIGN KEY (`user_address_id`) REFERENCES `users_addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_plan_id_foreign` FOREIGN KEY (`user_plan_id`) REFERENCES `users_plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `otps`
--
ALTER TABLE `otps`
  ADD CONSTRAINT `otps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD CONSTRAINT `page_translations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `partner_translations`
--
ALTER TABLE `partner_translations`
  ADD CONSTRAINT `partner_id_foregin_key` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan_translations`
--
ALTER TABLE `plan_translations`
  ADD CONSTRAINT `plan_translations_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `section_gallery`
--
ALTER TABLE `section_gallery`
  ADD CONSTRAINT `about_section_gallery_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section_translations`
--
ALTER TABLE `section_translations`
  ADD CONSTRAINT `about_translations_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_translations`
--
ALTER TABLE `service_translations`
  ADD CONSTRAINT `service_translations_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_addresses`
--
ALTER TABLE `users_addresses`
  ADD CONSTRAINT `users_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_plans`
--
ALTER TABLE `users_plans`
  ADD CONSTRAINT `users_plans_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_plans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
