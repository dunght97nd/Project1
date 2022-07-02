-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 02, 2022 lúc 07:52 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopthoitrang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `subtitle`, `image`, `category`, `content`, `created_at`, `updated_at`) VALUES
(1, 3, 'The Personality Trait That Makes People Happier', '', 'blog-1.jpg', 'TRAVEL', '', '2022-05-25 15:37:13', NULL),
(2, 3, 'This was one of our first days in Hawaii last week.', '', 'blog-2.jpg', 'FASHION', '', NULL, NULL),
(3, 3, 'Last week I had my first work trip of the year to Sonoma Valley', '', 'blog-3.jpg', 'TRAVEL', '', NULL, NULL),
(4, 3, 'Happppppy New Year! I know I am a little late on this post', '', 'blog-4.jpg', 'FASHION', '', '2022-05-28 15:07:30', NULL),
(5, 3, '7 years old birthday', 'TONY4MEN officially celebrates 7 years of establishment and development. It is a journey that is neither too long nor too short, but it is just enough time for us to try to shape the fashion style for the majority of young Vietnamese', 'blog-5.jpg', 'MODEL', '', '2022-05-28 15:06:55', NULL),
(6, 3, 'How to coordinate with a white shirt?', 'Just know how to coordinate with men\'s white shirts and you can create \"extreme\" outfits! The truth is… 90% of women admit they are completely \"cut down\" by the image of a guy wearing it. White shirt. Indeed, a white shirt is a \"wordless weapon\" that help', 'blog-6.jpg', 'FASHION', '', '2022-05-05 15:37:48', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs_comments`
--

CREATE TABLE `blogs_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Chanel', NULL, NULL),
(2, 'Gucci', NULL, NULL),
(3, 'Polo', NULL, NULL),
(4, 'Tommy Hilfiger', NULL, NULL),
(5, 'TOMMMMY', '2021-11-23 09:29:26', '2021-11-23 09:29:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` int(50) NOT NULL,
  `condition` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`id`, `name`, `time`, `condition`, `number`, `code`) VALUES
(1, 'Giảm giá 30/4', 10, 1, 10, '30042022'),
(2, 'Giảm giá Covid', 10, 2, 88, 'COVID2021');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `details`
--

CREATE TABLE `details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_28_095906_create_orders_table', 1),
(6, '2021_10_28_100523_create_details_table', 1),
(7, '2021_10_28_101014_create_products_table', 1),
(8, '2021_10_28_101838_create_brands_table', 1),
(9, '2021_10_28_102054_create_product_categories_table', 1),
(10, '2021_10_28_102249_create_product_images_table', 1),
(11, '2021_10_28_102647_create_product_details_table', 1),
(12, '2021_10_28_102956_create_product_comments_table', 1),
(13, '2021_10_28_103240_create_blogs_table', 1),
(14, '2021_10_28_103510_create_blogs_comments_table', 1),
(15, '2021_10_28_112622_create_order_details_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `postcode_zip` varchar(255) DEFAULT NULL,
  `town_city` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `total` double NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `first_name`, `last_name`, `company_name`, `country`, `street_address`, `postcode_zip`, `town_city`, `email`, `phone`, `payment_type`, `coupon_code`, `total`, `status`, `created_at`, `updated_at`) VALUES
(87, 15, 'Hoàng Thọ', 'Dũng', '2B', 'Việt Nam', '49 Mai Phúc ,Phúc Đồng, Long Biên', '888888', 'Hà Nội', 'hoangthodung1997@gmail.com', '0399565599', 'pay_later', '30042021', 13879.8, 3, '2021-11-30 14:13:00', '2021-11-30 14:23:36'),
(90, 15, 'Hoàng Thọ', 'Dũng', '2B', 'Việt Nam', '49 Mai Phúc ,Phúc Đồng, Long Biên', '888888', 'Hà Nội', 'hoangthodung1997@gmail.com', '0399565599', 'pay_later', 'COVID2021', 19343, 3, '2021-12-01 16:40:28', '2021-12-01 16:44:59'),
(91, NULL, 'THI XUAN XUAN', 'HOANG', '2BB', 'Vietnam', 'số 49 Mai Phúc, Phúc Đồng, Long Biên', '222222', 'Hà Nội', 'xuan@gmail.com', '0336627041', 'pay_later', '30042021', 8050.5, 1, '2021-12-01 16:47:46', '2021-12-01 16:47:46'),
(92, 1, 'Dũng', 'Hoàng', 'abc', 'abc', 'đá', 'đâsdasds', 'dádasdasd', 'dunght97nd@gmail.com', '0399565599', 'pay_later', '30042022', 3331.8, 1, '2022-07-02 15:53:28', '2022-07-02 15:53:28'),
(93, 1, 'Dũng', 'Hoàng', 'abc', 'abc', 'đá', 'đâsdasds', 'dádasdasd', 'dunght97nd@gmail.com', '0399565599', 'pay_later', '30042022', 3331.8, 1, '2022-07-02 15:54:29', '2022-07-02 15:54:29'),
(94, 15, 'Hoàng Thọ', 'Dũng', '2B', 'Việt Nam', '49 Mai Phúc ,Phúc Đồng, Long Biên', '888888', 'Hà Nội', 'hoangthodung1997@gmail.com', '0399565599', 'pay_later', '30042022', 3331.8, 1, '2022-07-02 15:56:16', '2022-07-02 15:56:16'),
(95, 15, 'Hoàng Thọ', 'Dũng', '2B', 'Việt Nam', '49 Mai Phúc ,Phúc Đồng, Long Biên', '888888', 'Hà Nội', 'hoangthodung1997@gmail.com', '0399565599', 'pay_later', '30042022', 3331.8, 1, '2022-07-02 16:21:22', '2022-07-02 16:21:22'),
(96, 15, 'Hoàng Thọ', 'Dũng', '2B', 'Việt Nam', '49 Mai Phúc ,Phúc Đồng, Long Biên', '888888', 'Hà Nội', 'hoangthodung1997@gmail.com', '0399565599', 'pay_later', '', 2468, 1, '2022-07-02 16:23:04', '2022-07-02 16:23:04'),
(97, NULL, 'THI XUAN XUAN', 'HOANG', 'dsadas', 'Vietnam', 'số 49 Mai Phúc, Phúc Đồng, Long Biên', 'đâsdasdas', 'Hà Nội', 'xuan04041995@gmail.com', '0336627041', 'pay_later', '', 2468, 1, '2022-07-02 16:30:03', '2022-07-02 16:30:03'),
(98, 15, 'Hoàng Thọ', 'Dũng', '2B', 'Việt Nam', '49 Mai Phúc ,Phúc Đồng, Long Biên', '888888', 'Hà Nội', 'hoangthodung1997@gmail.com', '0399565599', 'pay_later', '', 2468, 3, '2022-07-02 16:35:53', '2022-07-02 16:55:04'),
(99, 15, 'Hoàng Thọ', 'Dũng', '2B', 'Việt Nam', '49 Mai Phúc ,Phúc Đồng, Long Biên', '888888', 'Hà Nội', 'hoangthodung1997@gmail.com', '0399565599', 'pay_later', '', 2468, 3, '2022-07-02 16:42:28', '2022-07-02 16:46:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `productDetail_id` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `productDetail_id`, `color`, `size`, `qty`, `amount`, `created_at`, `updated_at`) VALUES
(62, 56, 1, NULL, 'blue', 'L', 1, 1234, '2021-11-22 10:14:46', '2021-11-22 10:14:46'),
(63, 56, 10, NULL, 'black', 'L', 1, 555, '2021-11-22 10:14:46', '2021-11-22 10:14:46'),
(64, 57, 1, NULL, 'blue', 'M', 1, 1234, '2021-11-22 10:22:42', '2021-11-22 10:22:42'),
(65, 58, 1, NULL, 'blue', 'M', 5, 1234, '2021-11-22 10:42:43', '2021-11-22 10:42:43'),
(66, 58, 10, NULL, 'gray', 'xl', 4, 555, '2021-11-22 10:42:43', '2021-11-22 10:42:43'),
(67, 59, 1, NULL, 'blue', 'M', 1, 1234, '2021-11-22 11:08:15', '2021-11-22 11:08:15'),
(108, 85, NULL, 4, 'blue', 'XS', 4, 1234, '2021-11-30 14:09:00', '2021-11-30 14:09:00'),
(109, 85, NULL, 8, 'gray', 'xl', 5, 555, '2021-11-30 14:09:00', '2021-11-30 14:09:00'),
(112, 87, NULL, 4, 'blue', 'XS', 4, 1234, '2021-11-30 14:13:00', '2021-11-30 14:13:00'),
(113, 87, NULL, 3, 'blue', 'L', 4, 1234, '2021-11-30 14:13:00', '2021-11-30 14:13:00'),
(114, 87, NULL, 8, 'gray', 'xl', 10, 555, '2021-11-30 14:13:00', '2021-11-30 14:13:00'),
(115, 88, NULL, 4, 'blue', 'XS', 4, 1234, '2021-11-30 14:27:21', '2021-11-30 14:27:21'),
(116, 88, NULL, 2, 'blue', 'M', 4, 1234, '2021-11-30 14:27:21', '2021-11-30 14:27:21'),
(117, 90, NULL, 4, 'blue', 'XS', 5, 1234, '2021-12-01 16:40:28', '2021-12-01 16:40:28'),
(118, 90, NULL, 2, 'blue', 'M', 4, 1234, '2021-12-01 16:40:28', '2021-12-01 16:40:28'),
(119, 90, NULL, 8, 'gray', 'xl', 11, 555, '2021-12-01 16:40:28', '2021-12-01 16:40:28'),
(120, 90, NULL, 7, 'black', 'L', 4, 555, '2021-12-01 16:40:28', '2021-12-01 16:40:28'),
(121, 91, NULL, 4, 'blue', 'XS', 5, 1234, '2021-12-01 16:47:46', '2021-12-01 16:47:46'),
(122, 91, NULL, 8, 'gray', 'xl', 5, 555, '2021-12-01 16:47:46', '2021-12-01 16:47:46'),
(123, 92, NULL, 1, 'blue', 'S', 3, 1234, '2022-07-02 15:53:29', '2022-07-02 15:53:29'),
(124, 93, NULL, 1, 'blue', 'S', 3, 1234, '2022-07-02 15:54:29', '2022-07-02 15:54:29'),
(125, 94, NULL, 1, 'blue', 'S', 3, 1234, '2022-07-02 15:56:16', '2022-07-02 15:56:16'),
(126, 95, NULL, 1, 'blue', 'S', 3, 1234, '2022-07-02 16:21:22', '2022-07-02 16:21:22'),
(127, 96, NULL, 1, 'blue', 'S', 2, 1234, '2022-07-02 16:23:04', '2022-07-02 16:23:04'),
(128, 97, NULL, 4, 'blue', 'XS', 2, 1234, '2022-07-02 16:30:03', '2022-07-02 16:30:03'),
(129, 98, NULL, 2, 'blue', 'M', 2, 1234, '2022-07-02 16:35:53', '2022-07-02 16:35:53'),
(130, 99, NULL, 1, 'blue', 'S', 2, 1234, '2022-07-02 16:42:28', '2022-07-02 16:42:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `price` double NOT NULL,
  `discount` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `brand_id`, `product_category_id`, `name`, `description`, `content`, `price`, `discount`, `weight`, `sku`, `featured`, `tag`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Leather Jacket 6101', '<p>Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor</p>', 'Update ...', 1234, NULL, 1, '00012', 1, 'coat', NULL, '2021-12-01 16:29:40'),
(2, 2, 1, 'Krik Slimfit Shirt 2037', NULL, NULL, 35, 13, NULL, NULL, 1, 'shirt', NULL, NULL),
(3, 3, 1, 'Krik Rayon Slimfit Polo Shirt 4006', NULL, NULL, 35, 34, NULL, NULL, 1, 'polo', NULL, NULL),
(4, 4, 2, 'Krik Slimfit Jeans 1001', '<p>.</p>', '.', 64, 35, 0.9, 'QJ1001', 1, 'jean', NULL, '2022-07-02 15:26:42'),
(5, 1, 3, 'Oxford Shoes 9010', NULL, NULL, 44, 35, NULL, NULL, 0, 'shoe', NULL, NULL),
(6, 1, 1, 'Sweater 7015', NULL, NULL, 35, 34, NULL, NULL, 1, 'sweater', NULL, NULL),
(7, 1, 2, 'Krik Slimfit Fabric Shorts 1521', NULL, NULL, 64, 35, NULL, NULL, 1, 'short', NULL, NULL),
(8, 1, 2, 'Krik Slimfit European Pants 1723', NULL, NULL, 44, 35, NULL, NULL, 1, 'casual', NULL, NULL),
(9, 1, 2, 'Jogger pants 1801', NULL, NULL, 35, 34, NULL, NULL, 1, 'jogger', NULL, NULL),
(10, 1, 1, 'Mango 6100', NULL, NULL, 666, 555, 1, 'MT6100', 1, 'coat', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Mens Shirt', 'banner-1.jpg', NULL, NULL),
(2, 'Male Pants', 'banner-2.jpg', NULL, NULL),
(3, 'Accessory', 'banner-3.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `messages` varchar(255) NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `email`, `name`, `messages`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'BrandonKelley@gmail.com', 'Brandon Kelley', 'Nice !', 4, NULL, NULL),
(2, 1, 5, 'RoyBanks@gmail.com', 'Roy Banks', 'Nice !', 4, NULL, NULL),
(3, 1, 1, 'dunght97nd@gmail.com', 'Dung', 'Greattttttttttttttt', 4, '2021-11-16 07:46:57', '2021-11-16 07:46:57'),
(4, 1, 1, 'xuan04041995@gmail.com', 'TÉT', 'OKE', 5, '2021-11-16 12:00:40', '2021-11-16 12:00:40'),
(7, 1, NULL, 'comment01@gmail.com', 'comment01', 'test01', 5, '2021-11-27 08:16:48', '2021-11-27 08:16:48'),
(8, 1, 12, 'user04@gmail.com', 'user04', 'test user dang nhap', 4, '2021-11-27 08:22:38', '2021-11-27 08:22:38'),
(9, 1, 13, 'user05@gmail.com', 'user05', 'okekekekeke', 3, '2021-11-27 11:26:21', '2021-11-27 11:26:21'),
(10, 10, 15, 'hoangthodung1997@gmail.com', 'Hoàng Dũng', 'Nice !!!!', 5, '2021-11-29 16:21:07', '2021-11-29 16:21:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `sold` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `color`, `size`, `qty`, `sold`, `created_at`, `updated_at`) VALUES
(1, 1, 'blue', 'S', 5, 0, NULL, '2022-07-02 16:46:08'),
(2, 1, 'blue', 'M', 5, 0, NULL, '2022-07-02 16:55:04'),
(3, 1, 'blue', 'L', 5, 0, NULL, '2021-11-30 14:23:36'),
(4, 1, 'blue', 'XS', 5, 0, NULL, '2021-12-01 16:44:59'),
(5, 1, 'yellow', 'S', 0, 0, NULL, NULL),
(6, 1, 'violet', 'S', 0, 0, NULL, NULL),
(7, 10, 'black', 'L', 10, 0, NULL, '2021-12-01 16:44:59'),
(8, 10, 'gray', 'xl', 15, 0, NULL, '2021-12-01 16:44:59'),
(15, 2, 'black', 'm', 10, NULL, '2022-07-02 15:21:58', '2022-07-02 15:21:58'),
(16, 4, 'black', 'm', 10, NULL, '2022-07-02 15:24:16', '2022-07-02 15:24:16'),
(17, 3, 'black', 'm', 999, NULL, '2022-07-02 17:00:12', '2022-07-02 17:00:12'),
(18, 3, 'black', 's', 888, NULL, '2022-07-02 17:00:26', '2022-07-02 17:00:26'),
(19, 6, 'yellow', 'm', 999, NULL, '2022-07-02 17:01:15', '2022-07-02 17:01:15'),
(20, 5, 'black', 's', 999, NULL, '2022-07-02 17:01:26', '2022-07-02 17:01:26'),
(21, 10, 'black', 'm', 888, NULL, '2022-07-02 17:01:48', '2022-07-02 17:01:48'),
(22, 6, 'yellow', 'l', 555, NULL, '2022-07-02 17:03:00', '2022-07-02 17:03:00'),
(23, 10, 'black', 'x', 555, NULL, '2022-07-02 17:03:20', '2022-07-02 17:03:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, 'product-1.jpg', NULL, NULL),
(2, 1, 'product-1-1.jpg', NULL, NULL),
(3, 1, 'product-1-2.jpg', NULL, NULL),
(4, 2, 'product-2.jpg', NULL, NULL),
(5, 3, 'product-3.jpg', NULL, NULL),
(6, 4, 'product-4.jpg', NULL, NULL),
(7, 5, 'product-5.jpg', NULL, NULL),
(8, 6, 'product-6.jpg', NULL, NULL),
(9, 7, 'product-7.jpg', NULL, NULL),
(10, 8, 'product-8.jpg', NULL, NULL),
(11, 9, 'product-9.jpg', NULL, NULL),
(12, 1, 'product-1-3.jpg', NULL, NULL),
(14, 2, 'product-2-1.jpg', NULL, NULL),
(15, 2, 'product-2-2.jpg', NULL, NULL),
(16, 2, 'product-2-3.jpg', NULL, NULL),
(18, 3, 'product-3-1.jpg', NULL, NULL),
(19, 3, 'product-3-2.jpg', NULL, NULL),
(20, 3, 'product-3-3.jpg', NULL, NULL),
(21, 3, 'product-3-4.jpg', NULL, NULL),
(22, 6, 'product-6-1.jpg', NULL, NULL),
(23, 6, 'product-6-2.jpg', NULL, NULL),
(24, 6, 'product-6-3.jpg', NULL, NULL),
(26, 4, 'product-4-1.jpg', NULL, NULL),
(27, 4, 'product-4-2.jpg', NULL, NULL),
(28, 7, 'product-7-1.jpg', NULL, NULL),
(29, 7, 'product-7-1.jpg', NULL, NULL),
(30, 8, 'product-8-1.jpg', NULL, NULL),
(31, 8, 'product-8-2.jpg', NULL, NULL),
(33, 9, 'product-9-1.jpg', NULL, NULL),
(34, 9, 'product-9-2.jpg', NULL, NULL),
(35, 5, 'product-5-1.jpg', NULL, NULL),
(36, 5, 'product-5-2.jpg', NULL, NULL),
(37, 5, 'product-5-3.jpg', NULL, NULL),
(38, 10, 'product-10.jpg', NULL, NULL),
(39, 10, 'product-10-1.jpg', NULL, NULL),
(40, 10, 'product-10-2.jpg', NULL, NULL),
(41, 10, 'product-10-3.jpg', NULL, NULL),
(42, 10, 'product-10-4.jpg', NULL, NULL),
(43, 10, 'product-10-5.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `level` tinyint(4) NOT NULL,
  `description` text DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `postcode_zip` varchar(255) DEFAULT NULL,
  `town_city` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `user_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `avatar`, `level`, `description`, `first_name`, `last_name`, `gender`, `company_name`, `country`, `street_address`, `postcode_zip`, `town_city`, `phone`, `user_token`, `created_at`, `updated_at`) VALUES
(1, 'dunght97nd', 'dunght97nd@gmail.com', NULL, '$2y$10$z/adWY4YEurRRSRtAF0zbeX4jJlqLRGgE9z2MFW1w98IIADXBWbeS', NULL, 'RxkZ_description.jpg', 0, NULL, 'Dũng', 'Hoàng', NULL, 'abc', 'abc', 'đá', 'đâsdasds', 'dádasdasd', '0399565599', NULL, NULL, '2022-07-02 15:51:18'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$nShpYcmD56ibWeQuOCQyVOA5gjGLXyfg4gVNUG3KXYhRd9ZjRlgh.', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Shane Lynch', 'ShaneLynch@gmail.com', NULL, '$2y$10$t3w7XJDX0S8EspdQ9cpN7uskF6nEy3Vt4YHdL75JPHk/0P7HqkeGy', NULL, 'avatar-0.png', 1, 'Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum bore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud amodo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Brandon Kelley', 'BrandonKelley@gmail.com', NULL, '$2y$10$UgEqFpZilx4ML6mVidpUGu2UoPQNsE8YyO6EdqMDurB4seJAv9nci', NULL, 'avatar-1.png', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Roy Banks', 'RoyBanks@gmail.com', NULL, '$2y$10$6/3/ylo9KS02CGQ0fpH8FOnmMkDpFu6.CEiIDFHaVDSfwKUPYE2rK', NULL, 'avatar-2.png', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'admin01', 'admin01@gmail.com', NULL, '$2y$10$vpr4YOfHXDVgyNDtq7LYS.slrn2HyaetrSMWx2WBj4uhy0YnwDrd6', NULL, 'g4G8_Capture.PNG', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-26 11:11:20', '2021-11-27 10:35:28'),
(9, 'No Name', 'user01@gmail.com', NULL, '$2y$10$.UzwEJNLhU8agKcY1MLxxev35WmNDVOlnP5cm6/QKPG.AUojtxIue', NULL, 'default-avatar.PNG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-26 17:47:42', '2021-11-26 17:47:42'),
(10, 'user02', 'user02@gmail.com', NULL, '$2y$10$iWOPRNy02uPI82XN6Zkv/ubBjmNnAD180U9IRTLMPFteISUvO9Hru', NULL, 'default-avatar.PNG', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-26 17:55:51', '2021-11-26 17:55:51'),
(11, 'user03', 'user03@gmail.com', NULL, '$2y$10$WEQu9O1tNshAGbZaPsgYhOudrvsPiQ95P5o0FUp7Dp0sWWh8iWb42', NULL, 'default-avatar.PNG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-26 18:02:24', '2021-11-26 18:02:24'),
(12, 'user04', 'user04@gmail.com', NULL, '$2y$10$/uiIvYX13eBv74V6XLjtTeQuJGpJNVNVPkLqbM6Bo7BzWnpSIzT46', NULL, '01lp_default-avatar.png', 1, NULL, 'user', '01', NULL, '2B', 'Viet Nam', '49 Mai Phuc', '888888', 'Ha Noi', '0399565599', NULL, '2021-11-26 18:19:12', '2021-11-28 10:52:08'),
(13, 'user05', 'user05@gmail.com', NULL, '$2y$10$nFXzPYhycs9PtVeo9AttIuAV.V8YLOVuuBjAfvtNHe9rzpPPpy3bO', NULL, 'fGDs_z2502531218315_9a7063c85ae8803a1d2709d31b76464d.jpg', 1, NULL, 'user', '05', NULL, '2b', 'Vietnam', 'số 49 Mai Phúc, Phúc Đồng, Long Biên', '888888', 'Hà Nội', '0336627041', NULL, '2021-11-26 18:23:26', '2021-11-28 10:48:42'),
(14, 'test01', 'hoangthodung997@gmail.com', NULL, '$2y$10$hmLxg8v93Tua1JolnSOiMunv1/CVcvPbMFKo7xFbUtaj0u/qtX1Tm', NULL, 'default-avatar.PNG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tWLQskHk8qIgB1YW', '2021-11-28 13:21:44', '2021-11-28 14:34:15'),
(15, 'Hoàng Dũng', 'hoangthodung1997@gmail.com', NULL, '$2y$10$kR5GC/N9JJQVpqA30DnopejZeWe1Vb5HSDjjN/5HVhDsa69UfNwW.', NULL, 'XW7P_z2502531282977_0255de68fdc7a44778515afe6245bf8c.jpg', 1, NULL, 'Hoàng Thọ', 'Dũng', NULL, '2B', 'Việt Nam', '49 Mai Phúc ,Phúc Đồng, Long Biên', '888888', 'Hà Nội', '0399565599', NULL, '2021-11-29 16:17:25', '2021-11-29 16:19:42'),
(16, 'abc', 'abc@gmail.com', NULL, '$2y$10$k6dynboCe8l2w7Ra2J1ASuxCJCozEnlrLuE59oAdwA81WGhF.osFq', NULL, 'default-avatar.PNG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-30 14:24:48', '2021-11-30 14:24:48');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogs_comments`
--
ALTER TABLE `blogs_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `blogs_comments`
--
ALTER TABLE `blogs_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
