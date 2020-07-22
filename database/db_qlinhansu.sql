-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 21, 2020 lúc 05:13 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_qlinhansu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tong_quan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tam_nhin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `su_menh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `about`
--

INSERT INTO `about` (`id`, `tong_quan`, `tam_nhin`, `su_menh`, `created_at`, `updated_at`) VALUES
(1, '<b> Công Ty Cổ Phần Bellsystem24-HoaSao </b> tiền thân là CTCP Tập Đoàn Hoa Sao (gọi tắt là Hoa Sao) là một trong những công ty đầu tiên của Việt Nam cung cấp các giải pháp, dịch vụ chuyên nghiệp về Contact Center và BPO (Business Process Outsourcing).', '<i class=\"fa fa-check\"></i>Trở thành Thương hiệu/Tổ chức vượt trội về Contact Center và BPO trong khu vực.<br><br>\r\n<i class=\"fa fa-check\"></i>Đưa Việt Nam vào bản đồ Contact Center & BPO toàn thế giới.', '<i class=\"fa fa-check\"></i>Cung cấp nhiều loại hình dịch vụ khách hàng (DVKH) theo tiêu chuẩn quốc tế, kết hợp sự am hiểu bản sắc địa phương, nhằm mang lại những trải nghiệm giá trị cho khách hàng bằng sự tận tâm và chuyên nghiệp, đóng góp đáng kể cho sự phát triển của các đối tác, thương hiệu và tổ chức. <br><br>\r\n<i class=\"fa fa-check\"></i>Kiến tạo hàng ngàn công việc mới cho tri thức Việt Nam, góp phần nâng cao năng suất và thu nhập cho người lao động bằng việc tham gia sâu hơn và rộng hơn vào chuỗi cung ứng dịch vụ toàn cầu.<br><br>\r\n<i class=\"fa fa-check\"></i>Xây dựng môi trường làm việc chuyên nghiệp, năng động và mang nhiều ý nghĩa; tạo điều kiện phát triển tốt nhất cho mỗi thành viên về sự nghiệp, đời sống vật chất và tinh thần.<br><br>\r\n<i class=\"fa fa-check\"></i>Đảm bảo giá trị và lợi ích bền vững cho cổ đông và đối tác. <br><br>\r\n<i class=\"fa fa-check\"></i>Hài hòa lợi ích doanh nghiệp với lợi ích xã hội, đóng góp tích cực vào các hoạt động hướng về cộng đồng, thể hiện tinh thần trách nhiệm của Doanh nghiệp đối với môi trường, xã hội và đất nước.', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucdanh`
--

CREATE TABLE IF NOT EXISTS `chucdanh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_chuc_danh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_chuc_danh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucdanh`
--

INSERT INTO `chucdanh` (`id`, `ma_chuc_danh`, `ten_chuc_danh`, `created_at`, `updated_at`) VALUES
(1, 'DT', 'Điện thoại viên', '2020-07-21 03:06:43', '2020-07-21 03:06:43'),
(2, 'GS', 'Giám sát viên', '2020-07-21 03:07:01', '2020-07-21 03:07:01'),
(3, 'SP', 'Supervisor', '2020-07-21 03:07:23', '2020-07-21 03:07:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duan`
--

CREATE TABLE IF NOT EXISTS `duan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_du_an` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quymo_tbinh` int(11) NOT NULL,
  `thoigian_batdau` date NOT NULL,
  `thoigian_ketthuc` date NOT NULL,
  `mota_duan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `hinh_duan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `duan`
--

INSERT INTO `duan` (`id`, `ten_du_an`, `slug`, `quymo_tbinh`, `thoigian_batdau`, `thoigian_ketthuc`, `mota_duan`, `created_at`, `updated_at`, `id_user`, `hinh_duan`) VALUES
(1, 'Dự án 106x', 'du_an_106x', 100, '2019-06-26', '2021-06-26', '- 106x là dự án tư vấn thông tin kinh tế văn hoá, xã hội tình cảm, pháp luật, thể thao, đời sống.<hr>', '2020-07-21 03:10:36', '2020-07-21 03:10:36', 1, 'fa fa-phone'),
(2, 'Dự án 198', 'du_an_198', 80, '2020-05-20', '2022-05-20', '- 198 là dự án giải đáp cho các khách hàng  về thuê bao di động sử dụng mạng Viettel bao gồm: dịch vụ 4G,...<hr>', '2020-07-21 03:11:31', '2020-07-21 03:11:31', 2, 'fa fa-mobile'),
(3, 'Dự án telesale', 'du_an_telesale', 80, '2019-11-05', '2021-11-05', '- Telesale là dự án chuyên về bán hàng, thuê bao, dịch vụ internet của nhà mạng VIetel. <hr>', '2020-07-21 03:12:38', '2020-07-21 03:12:38', 1, 'fa fa-headphones'),
(4, 'Dự án VTV Cab', 'du_an_vtv_cab', 70, '2020-02-26', '2022-02-26', '- VTV Cab là dự án giải đáp thắc mắc về truyền hình cáp VTV <hr>', '2020-07-21 03:13:34', '2020-07-21 03:13:34', 2, 'fa fa-tv'),
(5, 'Dự án TP Bank', 'du_an_tp_bank', 60, '2020-06-07', '2022-06-07', '- Tp Bank là dự án giải đáp thắc mắc về dịch vụ của ngân hàng TP Bank: kiểm tra tài khoản,... <hr>', '2020-07-21 03:15:41', '2020-07-21 03:15:41', 2, 'fa fa-university');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `huyen`
--

CREATE TABLE IF NOT EXISTS `huyen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_huyen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tinh` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `li_do_tuyen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong_tuyen` int(11) NOT NULL,
  `songay_tieuchuan_vitri` int(11) NOT NULL,
  `thoigian_offer` date NOT NULL,
  `thoigian_den_onboard` date NOT NULL,
  `trang_thai` tinyint(4) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_duan` bigint(20) UNSIGNED NOT NULL,
  `id_chucdanh` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketquaphongvan`
--

CREATE TABLE IF NOT EXISTS `ketquaphongvan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_ketqua_phongvan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_06_07_000001_create_users_table', 1),
(2, '2020_06_08_000000_create_duan', 1),
(3, '2020_06_08_000002_create_password_resets_table', 1),
(4, '2020_06_08_000003_create_failed_jobs_table', 1),
(5, '2020_06_08_000004_create_permission_tables', 1),
(6, '2020_06_09_065057_create_chucdanh', 1),
(7, '2020_06_09_065058_create_job', 1),
(8, '2020_06_09_070356_create_trangthaiphongvan', 1),
(9, '2020_06_09_070619_create_ketquaphongvan', 1),
(10, '2020_06_09_070841_create_tinh', 1),
(11, '2020_06_09_070959_create_huyen', 1),
(12, '2020_06_09_071459_create_xa', 1),
(13, '2020_06_09_071756_create_nguonjob', 1),
(14, '2020_06_09_071930_create_trinhdovanhoa', 1),
(15, '2020_06_09_071931_create_ungvien', 1),
(16, '2020_07_17_151007_about', 1),
(17, '2020_07_17_160124_slider', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 2),
(2, 'App\\User', 4),
(2, 'App\\User', 5),
(2, 'App\\User', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguonjob`
--

CREATE TABLE IF NOT EXISTS `nguonjob` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_nguonjob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'web', '2020-07-18 20:50:19', '2020-07-18 20:50:19'),
(3, 'user-edit', 'web', '2020-07-18 20:51:21', '2020-07-18 20:51:21'),
(4, 'user-create', 'web', '2020-07-21 03:02:36', '2020-07-21 03:02:36'),
(5, 'user-delete', 'web', '2020-07-21 03:02:44', '2020-07-21 03:02:44'),
(6, 'permission-create', 'web', '2020-07-21 03:02:48', '2020-07-21 03:02:48'),
(7, 'permission-edit', 'web', '2020-07-21 03:02:53', '2020-07-21 03:02:53'),
(8, 'permission-list', 'web', '2020-07-21 03:02:58', '2020-07-21 03:02:58'),
(9, 'permission-delete', 'web', '2020-07-21 03:03:02', '2020-07-21 03:03:02'),
(10, 'role-list', 'web', '2020-07-21 03:03:08', '2020-07-21 03:03:08'),
(11, 'role-create', 'web', '2020-07-21 03:03:13', '2020-07-21 03:03:13'),
(12, 'role-edit', 'web', '2020-07-21 03:03:17', '2020-07-21 03:03:17'),
(13, 'role-delete', 'web', '2020-07-21 03:03:21', '2020-07-21 03:03:21'),
(14, 'position-list', 'web', '2020-07-21 03:04:14', '2020-07-21 03:04:14'),
(15, 'position-create', 'web', '2020-07-21 03:04:28', '2020-07-21 03:04:28'),
(16, 'position-edit', 'web', '2020-07-21 03:04:42', '2020-07-21 03:04:42'),
(17, 'position-delete', 'web', '2020-07-21 03:04:50', '2020-07-21 03:04:50'),
(18, 'project-list', 'web', '2020-07-21 03:04:56', '2020-07-21 03:04:56'),
(19, 'project-create', 'web', '2020-07-21 03:05:02', '2020-07-21 03:05:02'),
(20, 'project-edit', 'web', '2020-07-21 03:05:38', '2020-07-21 03:05:38'),
(21, 'project-delete', 'web', '2020-07-21 03:05:43', '2020-07-21 03:05:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Nguoi quan tri', 'web', '2020-07-18 20:51:38', '2020-07-18 20:52:54'),
(2, 'Nguoi dung', 'web', '2020-07-18 20:51:58', '2020-07-18 20:51:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_slider` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_slider` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `class_slider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `ten_slider`, `hinh_slider`, `noi_dung`, `created_at`, `updated_at`, `class_slider`) VALUES
(1, 'BELL SYSTEM 24 HOASAO', 'slider1.jpg', 'Đơn vị cung cấp dịch vụ CONTACT-CENTER & BPO hàng đầu Việt Nam', NULL, NULL, 'one'),
(2, 'BELL SYSTEM 24 HOASAO', 'slider2.jpg', 'TELEHUB - Giải pháp quản lý tổng đài đa kênh số một Việt Nam', NULL, NULL, 'two'),
(3, 'BELL SYSTEM 24 HOASAO', 'slider3.jpg', 'KHÁCH HÀNG THÁM TỬ - đồng hành cùng doanh nghiệp nâng cao chất lượng dịch vụ', NULL, NULL, 'two');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh`
--

CREATE TABLE IF NOT EXISTS `tinh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_tinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaiphongvan`
--

CREATE TABLE IF NOT EXISTS `trangthaiphongvan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_trangthai_phongvan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trinhdovanhoa`
--

CREATE TABLE IF NOT EXISTS `trinhdovanhoa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_trinhdovanhoa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ungvien`
--

CREATE TABLE IF NOT EXISTS `ungvien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_ungvien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` tinyint(4) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `so_dien_thoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sonha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_xa` bigint(20) UNSIGNED NOT NULL,
  `id_huyen` bigint(20) UNSIGNED NOT NULL,
  `id_tinh` bigint(20) UNSIGNED NOT NULL,
  `id_nguonjob` bigint(20) UNSIGNED NOT NULL,
  `id_job` bigint(20) UNSIGNED NOT NULL,
  `id_chucdanh` bigint(20) UNSIGNED NOT NULL,
  `id_trinhdovanhoa` bigint(20) UNSIGNED NOT NULL,
  `id_trangthai_phongvan` bigint(20) UNSIGNED NOT NULL,
  `id_ketqua_phongvan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` tinyint(4) NOT NULL,
  `so_dien_thoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `danhso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email_address`, `avatar`, `hoten`, `gioi_tinh`, `so_dien_thoai`, `danhso`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dautiep', '$2y$10$BeP9i75h2RT/E.n6pDcuHu61isCIxiP5F7NUyP/pjw4F1jVLrDSWC', 'dautiep123@gmail.com', '1595130596.png', 'Đậu Lê Quốc Tiếp', 1, '0388748282', '001', NULL, '2020-07-18 20:36:58', '2020-07-21 02:32:05'),
(2, 'thuhuong', '$2y$10$IH2EP04y2m72dinJnH6lieF.vlCreniotmp4ZLkgh4ykGRA43pQgK', 'thuhuong9x.td@gmail.com', '1595255334.png', 'Trần Thị Thu Hương', 0, '0363623005', '002', NULL, '2020-07-19 02:54:14', '2020-07-20 07:28:54'),
(4, 'leanh', '$2y$10$zHUt1OrpvMlaZ2QMsxx7Euwv7NQb0IuE3xxSCs4XDLhxXkFlvjtci', 'leanh@gmail.com', 'avatar_female.png', 'Lê Thanh Anh', 0, '0156234568', '003', NULL, '2020-07-21 03:00:31', '2020-07-21 03:00:31'),
(5, 'lebao', '$2y$10$AhRgPfudZHft3beMG2NSaudKFdZe01qaK9mwFOcl1reSLEZ9sph7m', 'lebao@gmail.com', 'avatar_male.png', 'Lê Hoài Bảo', 1, '0147842531', '004', NULL, '2020-07-21 03:01:13', '2020-07-21 03:01:13'),
(6, 'lean', '$2y$10$t6f90jMVH9pgscrcY3Y5W.hcgL1UW9dGsWnPyXIIbTQIybsE9uaCC', 'lean@gmail.com', 'avatar_female.png', 'Lê Thị An', 0, '0178415236', '005', NULL, '2020-07-21 03:01:56', '2020-07-21 03:01:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xa`
--

CREATE TABLE IF NOT EXISTS `xa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_xa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_huyen` bigint(20) UNSIGNED NOT NULL,
  `id_tinh` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chucdanh`
--
ALTER TABLE `chucdanh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `duan`
--
ALTER TABLE `duan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `duan_id_user_foreign` (`id_user`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `huyen`
--
ALTER TABLE `huyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `huyen_id_tinh_foreign` (`id_tinh`);

--
-- Chỉ mục cho bảng `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id_user_foreign` (`id_user`),
  ADD KEY `job_id_duan_foreign` (`id_duan`),
  ADD KEY `job_id_chucdanh_foreign` (`id_chucdanh`);

--
-- Chỉ mục cho bảng `ketquaphongvan`
--
ALTER TABLE `ketquaphongvan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `nguonjob`
--
ALTER TABLE `nguonjob`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tinh`
--
ALTER TABLE `tinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trangthaiphongvan`
--
ALTER TABLE `trangthaiphongvan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trinhdovanhoa`
--
ALTER TABLE `trinhdovanhoa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ungvien`
--
ALTER TABLE `ungvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ungvien_id_xa_foreign` (`id_xa`),
  ADD KEY `ungvien_id_huyen_foreign` (`id_huyen`),
  ADD KEY `ungvien_id_tinh_foreign` (`id_tinh`),
  ADD KEY `ungvien_id_nguonjob_foreign` (`id_nguonjob`),
  ADD KEY `ungvien_id_job_foreign` (`id_job`),
  ADD KEY `ungvien_id_chucdanh_foreign` (`id_chucdanh`),
  ADD KEY `ungvien_id_trinhdovanhoa_foreign` (`id_trinhdovanhoa`),
  ADD KEY `ungvien_id_trangthai_phongvan_foreign` (`id_trangthai_phongvan`),
  ADD KEY `ungvien_id_ketqua_phongvan_foreign` (`id_ketqua_phongvan`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `xa`
--
ALTER TABLE `xa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `xa_id_huyen_foreign` (`id_huyen`),
  ADD KEY `xa_id_tinh_foreign` (`id_tinh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chucdanh`
--
ALTER TABLE `chucdanh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `duan`
--
ALTER TABLE `duan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `huyen`
--
ALTER TABLE `huyen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `job`
--
ALTER TABLE `job`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ketquaphongvan`
--
ALTER TABLE `ketquaphongvan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `nguonjob`
--
ALTER TABLE `nguonjob`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tinh`
--
ALTER TABLE `tinh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `trangthaiphongvan`
--
ALTER TABLE `trangthaiphongvan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `trinhdovanhoa`
--
ALTER TABLE `trinhdovanhoa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ungvien`
--
ALTER TABLE `ungvien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `xa`
--
ALTER TABLE `xa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `duan`
--
ALTER TABLE `duan`
  ADD CONSTRAINT `duan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `huyen`
--
ALTER TABLE `huyen`
  ADD CONSTRAINT `huyen_id_tinh_foreign` FOREIGN KEY (`id_tinh`) REFERENCES `tinh` (`id`);

--
-- Các ràng buộc cho bảng `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_id_chucdanh_foreign` FOREIGN KEY (`id_chucdanh`) REFERENCES `chucdanh` (`id`),
  ADD CONSTRAINT `job_id_duan_foreign` FOREIGN KEY (`id_duan`) REFERENCES `duan` (`id`),
  ADD CONSTRAINT `job_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `ungvien`
--
ALTER TABLE `ungvien`
  ADD CONSTRAINT `ungvien_id_chucdanh_foreign` FOREIGN KEY (`id_chucdanh`) REFERENCES `chucdanh` (`id`),
  ADD CONSTRAINT `ungvien_id_huyen_foreign` FOREIGN KEY (`id_huyen`) REFERENCES `huyen` (`id`),
  ADD CONSTRAINT `ungvien_id_job_foreign` FOREIGN KEY (`id_job`) REFERENCES `job` (`id`),
  ADD CONSTRAINT `ungvien_id_ketqua_phongvan_foreign` FOREIGN KEY (`id_ketqua_phongvan`) REFERENCES `ketquaphongvan` (`id`),
  ADD CONSTRAINT `ungvien_id_nguonjob_foreign` FOREIGN KEY (`id_nguonjob`) REFERENCES `nguonjob` (`id`),
  ADD CONSTRAINT `ungvien_id_tinh_foreign` FOREIGN KEY (`id_tinh`) REFERENCES `tinh` (`id`),
  ADD CONSTRAINT `ungvien_id_trangthai_phongvan_foreign` FOREIGN KEY (`id_trangthai_phongvan`) REFERENCES `trangthaiphongvan` (`id`),
  ADD CONSTRAINT `ungvien_id_trinhdovanhoa_foreign` FOREIGN KEY (`id_trinhdovanhoa`) REFERENCES `trinhdovanhoa` (`id`),
  ADD CONSTRAINT `ungvien_id_xa_foreign` FOREIGN KEY (`id_xa`) REFERENCES `xa` (`id`);

--
-- Các ràng buộc cho bảng `xa`
--
ALTER TABLE `xa`
  ADD CONSTRAINT `xa_id_huyen_foreign` FOREIGN KEY (`id_huyen`) REFERENCES `huyen` (`id`),
  ADD CONSTRAINT `xa_id_tinh_foreign` FOREIGN KEY (`id_tinh`) REFERENCES `tinh` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

