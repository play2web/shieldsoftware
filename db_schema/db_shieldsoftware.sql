-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Домаћин: custsql-dom01.eigbox.net
-- Време креирања: 16. јул 2017. у 14:38
-- Верзија сервера: 5.6.32
-- верзија PHP-a: 4.4.9
-- 
-- База података: `db_shiledsoftware`
-- 

-- --------------------------------------------------------

-- 
-- Структура табеле `companies`
-- 

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Приказ података табеле `companies`
-- 

INSERT INTO `companies` VALUES (2, 'Pepsi');
INSERT INTO `companies` VALUES (3, 'Coca Cola');
INSERT INTO `companies` VALUES (6, 'Sinalco');

-- --------------------------------------------------------

-- 
-- Структура табеле `products`
-- 

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` text COLLATE utf8_unicode_ci,
  `product_company` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=48 ;

-- 
-- Приказ података табеле `products`
-- 

INSERT INTO `products` VALUES (33, 'Sok', '3');
INSERT INTO `products` VALUES (42, 'Zuti sok', '6');
INSERT INTO `products` VALUES (44, 'Lizalica', '2');
INSERT INTO `products` VALUES (45, 'Sokovnik', '2');
