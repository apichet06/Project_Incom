-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2021 at 11:31 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spz`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `c_tel` int(10) NOT NULL,
  `c_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `customer_id`, `customer_name`, `c_address`, `c_tel`, `c_date`) VALUES
(1, 'xxxx1', 'เคมี เทคโนโลยี', 'xxxx เคมี', 0, '0000-00-00'),
(2, 'xxx2', 'xxxx', '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`d_id`, `d_name`) VALUES
(1, 'ตรวจรับสินค้า'),
(3, 'ฝ่ายผลิต'),
(4, 'ตรวจสอบสินค้า'),
(5, 'ขนส่ง'),
(6, 'ทรัพยากรบุคคล'),
(7, 'บัญชี/การเงิน'),
(8, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `new_order`
--

CREATE TABLE `new_order` (
  `n_id` int(11) NOT NULL COMMENT 'รหัส',
  `n_customerStatus` varchar(30) NOT NULL COMMENT 'ลูกค้าเก่าใหม่',
  `n_datejob` date NOT NULL COMMENT 'วันที่ออกใบจัดทำงานใหม่',
  `n_number` varchar(30) NOT NULL COMMENT 'เลขที่',
  `n_specstatus` varchar(20) NOT NULL COMMENT 'spac ชั่วคราว/ถาวร',
  `n_lot` varchar(20) NOT NULL COMMENT 'Lot NO',
  `c_id` int(11) NOT NULL COMMENT 'id ลูกค้า',
  `customer_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'รหัสลูกค้า',
  `pa_id` int(11) NOT NULL COMMENT 'รหัส part',
  `pa_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'ชื่อ part',
  `n_admissiondate` date NOT NULL COMMENT 'วันที่รับเข้า',
  `n_desired` date NOT NULL COMMENT 'date วันที่ต้องการ',
  `n_line` varchar(30) NOT NULL COMMENT 'Line การผลิต',
  `n_barel` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `n_rack` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `n_baking` varchar(50) NOT NULL COMMENT 'baking',
  `n_product_safety` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT ' ความปลอดภัยด้านผลิตภัณฑ์(ถ้ามี)',
  `n_white_rust` varchar(255) NOT NULL COMMENT 'สนิมขาว',
  `n_red_rust` varchar(255) NOT NULL COMMENT 'สนิมแดง',
  `n_customeritem` varchar(30) NOT NULL COMMENT 'ลูกค้าต้องการ/ไม่ต้องการ',
  `n_item` varchar(11) NOT NULL COMMENT 'จำนวนชิ้น',
  `n_producgroup` varchar(20) NOT NULL COMMENT 'กลุ่มผลิตภัณท์',
  `n_producgroupother` varchar(50) NOT NULL COMMENT 'กลุ่มอื่นๆ',
  `n_automotivetype` varchar(255) NOT NULL COMMENT 'ประเภทยานยนต์',
  `n_carcamp` varchar(255) NOT NULL COMMENT 'ค่ายรถ',
  `n_workgroup` varchar(30) NOT NULL COMMENT 'กลุ่มงาน 2 4 ล้อ อื่นๆ',
  `n_weight` varchar(20) NOT NULL COMMENT 'น้ำหนักตัว',
  `n_madel` varchar(11) NOT NULL COMMENT 'model life ปี',
  `n_remark` varchar(255) NOT NULL COMMENT 'จุดระวังพิเศษ',
  `n_volume` varchar(50) NOT NULL COMMENT 'volume',
  `n_amount_mk` varchar(50) NOT NULL COMMENT 'ปริมาณเดือน กก.',
  `n_amount_mitem` varchar(50) NOT NULL COMMENT 'ปริมาณเดือน ชิ้น',
  `n_amount_yk` varchar(50) NOT NULL COMMENT 'ปริมาณปี กก',
  `n_amount_yitem` varchar(50) NOT NULL COMMENT 'ปริมาณปี ชิ้น',
  `n_thickness` varchar(80) NOT NULL COMMENT 'วัดความหนา',
  `n_thickness_other` varchar(255) NOT NULL COMMENT 'กำหนดจึดวัดระบุ',
  `n_examine` varchar(130) NOT NULL COMMENT 'การตรวจสอบ',
  `n_examine_percen` varchar(11) NOT NULL COMMENT 'ไม่เกิน %',
  `n_nuantity_input` varchar(20) NOT NULL COMMENT 'จำนวนที่รับเข้า',
  `n_itemk` varchar(20) NOT NULL COMMENT 'ชิ้น กก.',
  `n_container` varchar(50) NOT NULL COMMENT 'ภาชนะบรรจุ',
  `n_box` varchar(50) NOT NULL COMMENT 'มาตรฐานบรรจุ',
  `ref` varchar(255) NOT NULL,
  `n_boxk` varchar(50) NOT NULL COMMENT 'กก./ชิ้น',
  `n_itembag` varchar(20) NOT NULL COMMENT 'ใส่ถุงละ ชิ้น',
  `n_inout_procuct` varchar(50) NOT NULL COMMENT 'การรับ-ส่งสินค้า',
  `n_inout_other` varchar(255) NOT NULL COMMENT 'อื่นๆ',
  `n_open_fly` varchar(30) NOT NULL COMMENT 'การเปิดบิล',
  `n_open_flythink` varchar(30) NOT NULL COMMENT 'คิดเหมา',
  `n_bin_number` varchar(30) NOT NULL COMMENT 'เลขที่บิล',
  `n_userbin_name` varchar(255) NOT NULL COMMENT 'ผู้เปิดบิล',
  `n_bindate` date NOT NULL COMMENT 'วันที่',
  `n_approve_data` varchar(255) NOT NULL COMMENT 'อนุมัติเพิ่มในฐานระบบ',
  `n_id_ecacc` varchar(150) NOT NULL COMMENT 'รหัสสินค้าในระบบ ECACC',
  `n_user_approve` int(11) NOT NULL COMMENT 'ผู้อนมัติ เก็บ u_username',
  `n_approve_date` date NOT NULL COMMENT 'วันที่อนุมัติ',
  `n_reject` text NOT NULL COMMENT 'ข้อความ reject',
  `n_reject_date` date NOT NULL COMMENT 'วันที่ Reject',
  `n_nuote_nuote` varchar(255) NOT NULL COMMENT 'อ้างอิงใบเสนอราคาเลขที่',
  `n_bid_date` date NOT NULL COMMENT 'วันที่เสนอราคา',
  `n_flac_status` varchar(1) NOT NULL COMMENT 'N ro Y',
  `n_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `new_order`
--

INSERT INTO `new_order` (`n_id`, `n_customerStatus`, `n_datejob`, `n_number`, `n_specstatus`, `n_lot`, `c_id`, `customer_id`, `pa_id`, `pa_name`, `n_admissiondate`, `n_desired`, `n_line`, `n_barel`, `n_rack`, `n_baking`, `n_product_safety`, `n_white_rust`, `n_red_rust`, `n_customeritem`, `n_item`, `n_producgroup`, `n_producgroupother`, `n_automotivetype`, `n_carcamp`, `n_workgroup`, `n_weight`, `n_madel`, `n_remark`, `n_volume`, `n_amount_mk`, `n_amount_mitem`, `n_amount_yk`, `n_amount_yitem`, `n_thickness`, `n_thickness_other`, `n_examine`, `n_examine_percen`, `n_nuantity_input`, `n_itemk`, `n_container`, `n_box`, `ref`, `n_boxk`, `n_itembag`, `n_inout_procuct`, `n_inout_other`, `n_open_fly`, `n_open_flythink`, `n_bin_number`, `n_userbin_name`, `n_bindate`, `n_approve_data`, `n_id_ecacc`, `n_user_approve`, `n_approve_date`, `n_reject`, `n_reject_date`, `n_nuote_nuote`, `n_bid_date`, `n_flac_status`, `n_date`) VALUES
(1, 'ลูกค้าใหม่', '2021-09-27', '1', 'ชั่วคราว', ' Lot NO.', 1, 'xxxx1', 67, 'dfg', '2021-09-27', '2021-09-30', 'RA', '', '', 'No', 'ความปลอดภัยด้านผลิตภัณฑ์(ถ้ามี)', 'สนิมขาว', 'สนิมแดง', 'ลูกค้าต้องการ', 'ชิ้น', 'Screw_Bolt', 'อื่นๆ', 'ยานยนต์ประเภท', 'ค่ายรถ', '4ล้อ', 'grum', 'ปี', 'จุดระวังพิเศษ', '', 'กก.', 'ชิ้น', 'กก.', 'ชิ้น', 'ไม่กำหนดจุดวัด', 'กำหนดจุดวัดระบุbox', 'ตรวจสอบ100', '%', '', '', '', 'บรรจุตามมาตรฐานของลูกค้า', '', 'กก ชิ้น', 'ชิ้น', 'ลูกค้า', 'อื่นๆ  ', 'บิลชั่วคราว', 'คิดเหมา  ', '350', 'อออ', '2021-09-27', 'อนุมัติเพิ่มในฐานระบบ', 'รหัสสินค้าในระบบ ECACC', 0, '0000-00-00', '', '0000-00-00', 'อ้างอิงใบเสนอราคาเลขที่', '2021-09-28', '', '0000-00-00'),
(3, 'ลูกค้าใหม่', '2021-10-13', '1111', 'ถาวร', '20', 1, 'xxxx1', 67, 'dfg', '2021-10-13', '2021-10-13', 'กลึง', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-10-11', '', '', 0, '0000-00-00', '', '0000-00-00', '', '2021-10-11', '', '0000-00-00'),
(4, 'ลูกค้าเดิม', '2021-10-14', '64100001', '', 'ss', 1, 'xxxx1', 67, 'dfg', '2021-10-13', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 2, '2021-10-27', '', '0000-00-00', '', '0000-00-00', 'Y', '2021-10-13'),
(5, 'ลูกค้าเดิม', '2021-10-14', '64100002', '', 'ss', 1, 'xxxx1', 67, 'dfg', '2021-10-13', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 2, '2021-10-27', '', '0000-00-00', '', '0000-00-00', 'Y', '2021-10-13'),
(18, 'ลูกค้าใหม่', '2021-10-16', '64100003', 'ถาวร', '', 2, 'xxx2', 67, 'dfg', '2021-10-16', '2021-10-18', 'ALZ', 'Barel', 'Rack', 'Yes', 'ความปลอดภัยด้านผลิตภัณฑ์(ถ้ามี)', 'สนิมขาว', 'สนิมแดง', 'ลูกค้าไม่ต้องการ', 'ชิ้น', 'Screw_Bolt', 'อื่นๆ ', 'ยานยนต์ประเภท', 'ค่ายรถ', '2ล้อ', 'น้ำหนัก/ตัว', 'model Life', 'จุดระวังพิเศษ', '', 'ปริมาณ/เดือน', 'ปริมาณ/เดือน', 'ปริมาณ/ปี', 'ปริมาณ/ปี', 'X-ray', 'Spz กำหนด', 'ตรวจสอบ100', 'สุ่มตรวจสอบ', '', '', '', 'ใส่ Box ลูกค้า', '', 'ใส่ Box ลูกค้า', '', 'อื่นๆ', 'หมายเหตุ', 'ใบกำกับภาษี', 'คิดเหมา', 'เลขที่บิล', ' ผู้เปิดบิล', '2021-10-16', 'อนุมัติเพิ่มในฐานระบบ', ' รหัสสินค้าในระบบ ECACC', 2, '2021-10-27', '', '0000-00-00', 'อ้างอิงใบเสนอราคาเลขที่', '2021-10-16', 'Y', '2021-10-16'),
(21, '', '0000-00-00', '64100004', '', '', 2, 'xxx2', 67, 'dfg', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', 'ลูกค้าต้องก', 'Spring', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ใส่ Box ลูกค้า ', '', '', '', '', '', '', '', '0000-00-00', '', '', 2, '2021-10-27', '', '0000-00-00', '', '0000-00-00', 'Y', '2021-10-16'),
(22, '', '0000-00-00', '64100005', '', 'Lot NO.', 2, 'xxx2', 67, 'dfg', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 2, '2021-10-27', '', '0000-00-00', '', '0000-00-00', 'Y', '2021-10-16'),
(23, '', '0000-00-00', '64100006', '', '', 2, 'xxx2', 67, 'dfg', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ส่ถุงละ', '', '', '', '', '', '', '0000-00-00', '', '', 0, '0000-00-00', 'reject', '2021-10-27', '', '0000-00-00', 'Y', '2021-10-16'),
(24, 'ลูกค้าใหม่', '2021-10-17', '64100007', 'ชั่วคราว', '', 1, 'xxxx1', 68, 'xxxx', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00', 'Y', '2021-10-17'),
(25, 'ลูกค้าเดิม', '2021-10-17', '64100008', '', '', 2, 'xxx2', 67, 'dfg', '2021-10-17', '2021-10-17', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00', 'Y', '2021-10-17'),
(26, 'ลูกค้าเดิม', '2021-10-17', '64100009', 'ถาวร', '', 1, 'xxxx1', 67, 'dfg', '2021-10-17', '2021-10-12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00', 'Y', '2021-10-17'),
(27, '', '2021-10-17', '64100010', '', 'Lot NO.', 2, 'xxx2', 67, 'dfg', '2021-10-17', '2021-10-17', 'ALZ', 'Barel', 'Rack', '', 'ความปลอดภัยด้านผลิตภัณฑ์(ถ้ามี)', 'สนิมขาว', 'สนิมแดง', 'ลูกค้าต้องการ', 'ลูกค้าต้องก', 'Stud', ' อื่นๆ ', 'ยานยนต์ประเภท', 'ค่ายรถ', 'Electonic', 'น้ำหนัก/ตัว', 'model Life', 'จุดระวังพิเศษ', '', ' ปริมาณ/เดือน', ' ปริมาณ/เดือน', 'ปริมาณ/ปี', 'ปริมาณ/ปี', 'X-ray', 'Spz กำหนด', 'สุ่มตรวจสอบไม่เกิน', 'ม่เกิน', '', '', '', 'ใส่ Box ลูกค้า', '', 'Box ลูกค้า', 'ส่ถุงละ  ', '', 'หมายเหตุ', 'ฟรี', 'คิดเหมา', 'เลขที่บิล', 'ผู้เปิดบิล', '2021-10-17', 'อนุมัติเพิ่มในฐานระบบ', 'รหัสสินค้าในระบบ ECACC', 0, '0000-00-00', '', '0000-00-00', 'อ้างอิงใบเสนอราคาเลขที่', '2021-10-17', 'Y', '2021-10-17'),
(28, '', '0000-00-00', '64100011', '', 'Lot NO.', 2, 'xxx2', 68, 'xxxx', '0000-00-00', '0000-00-00', 'ALZ', 'Barel', 'Rack', '', 'ความปลอดภัยด้านผลิตภัณฑ์(ถ้ามี)', 'สนิมขาว', 'สนิมแดง', 'ลูกค้าต้องการ', 'ลูกค้าต้องก', 'Stud', ' อื่นๆ ', 'ยานยนต์ประเภท', 'ค่ายรถ', 'Electonic', 'น้ำหนัก/ตัว', 'model Life', 'จุดระวังพิเศษ', '', ' ปริมาณ/เดือน', ' ปริมาณ/เดือน', 'ปริมาณ/ปี', 'ปริมาณ/ปี', 'X-ray', 'Spz กำหนด', 'สุ่มตรวจสอบไม่เกิน', 'ม่เกิน', '', '', '', 'ใส่ Box ลูกค้า', '', 'Box ลูกค้า', 'ส่ถุงละ  ', '', 'หมายเหตุ', 'ฟรี', 'คิดเหมา', 'เลขที่บิล', 'ผู้เปิดบิล', '0000-00-00', 'อนุมัติเพิ่มในฐานระบบ', 'รหัสสินค้าในระบบ ECACC', 0, '0000-00-00', '', '0000-00-00', 'อ้างอิงใบเสนอราคาเลขที่', '0000-00-00', 'Y', '2021-10-17'),
(29, '', '2021-10-25', '64100012', '', '555', 1, 'xxxx1', 67, 'dfg', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ใส่ Box ลูกค้า', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00', 'Y', '2021-10-25'),
(30, '', '2021-10-25', '64100013', '', '555', 1, 'xxxx1', 67, 'dfg', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'spz_ref', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00', 'Y', '2021-10-25'),
(31, 'ลูกค้าใหม่', '2021-10-25', '64100014', '', '555', 1, 'xxxx1', 67, 'dfg', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'spz_ref', 'เเเเเเ', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00', 'Y', '2021-10-25'),
(32, '', '2021-10-25', '64100015', '', '', 1, 'xxxx1', 67, 'dfg', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'spz_ref', 'dfdf', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 2, '2021-10-27', 'dgfgdf', '2021-10-27', '', '0000-00-00', 'Y', '2021-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE `part` (
  `pa_id` int(10) NOT NULL,
  `pa_no` varchar(50) NOT NULL,
  `pa_name` varchar(255) NOT NULL,
  `pa_spec` varchar(255) NOT NULL,
  `pa_color` varchar(255) NOT NULL,
  `pa_thickness` varchar(150) NOT NULL,
  `pa_img` varchar(100) NOT NULL,
  `pa_date` date NOT NULL,
  `u_upload` int(11) NOT NULL COMMENT 'user ที่กรอกข้อมูล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`pa_id`, `pa_no`, `pa_name`, `pa_spec`, `pa_color`, `pa_thickness`, `pa_img`, `pa_date`, `u_upload`) VALUES
(67, 'p5646', 'dfg', 'dfg', 'dfg', 'dfg', 'p5646.jpg', '2021-09-23', 2),
(68, 'xxxx', 'xxxx', 'xxxx', 'xxxx', 'xxxx', 'xxxx.jpg', '2021-10-17', 2);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`p_id`, `p_name`) VALUES
(1, 'ผู้จัดการ'),
(3, 'หัวหน้าแผนก'),
(4, 'พนักงานทั่วไป'),
(5, 'ผู้ดูแลระบบ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `u_password` varchar(20) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_sur` varchar(50) NOT NULL,
  `u_tel` varchar(10) NOT NULL,
  `p_id` int(11) NOT NULL,
  `d_id` int(10) NOT NULL,
  `u_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_username`, `u_password`, `u_name`, `u_sur`, `u_tel`, `p_id`, `d_id`, `u_date`) VALUES
(1, 'admin1', '123456', 'ณัฐพล', 'ทรัพตรีย์กูล', '', 5, 8, '2021-09-22'),
(2, 'admin2', '4744', 'อภิเชษฐ์', 'สิงห์นาครอง', '', 5, 8, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `new_order`
--
ALTER TABLE `new_order`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`pa_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `new_order`
--
ALTER TABLE `new_order`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `part`
--
ALTER TABLE `part`
  MODIFY `pa_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
