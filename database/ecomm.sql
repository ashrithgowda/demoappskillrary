-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2019 at 08:11 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-11+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(11, 16, 31, 1),
(12, 16, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(6, 'Testing', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(14, 9, 11, 2),
(15, 9, 13, 5),
(16, 9, 3, 2),
(17, 9, 1, 3),
(18, 10, 13, 3),
(19, 10, 2, 4),
(20, 10, 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date DEFAULT NULL,
  `counter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`) VALUES
(31, 6, 'Concordion', '<p>Automating acceptance tests helps regression testing and iterative development, making project development faster and improving quality of deliverable. A powerful tool that helps write and manage automated acceptance tests in Java based projects is Concordion. It brings together testing and specification and its appeal lies in the fact that its specifications are highly readable and easy to write, helping team members use the framework effectively, irrespective of their technical skill.</p>\r\n', 'concordion', 30999, 'concordion_1574078535.png', '2019-11-18', 7),
(32, 6, 'Cucumber', '<p>The myriad advantages of behaviour driven development (BDD) has led to its widespread adoption by software development teams who want to have a more collaborative approach in the development process. And the one BDD tool that has taken the world by storm is Cucumber.</p>\r\n\r\n<p>One does not have to be a software programming pro to understand and test in Cucumber. The tool is user friendly and offers a way to write tests that can be understood irrespective of technical knowledge. Not only that, Cucumber is a fun tool, bridging the gap between technical and non-technical skills in a development team, and allowing everybody to write tests.</p>\r\n\r\n<p>Cucumber is hugely popular and hence SkillRary brings you a complete Cucumber training course that will introduce you to BDD and the role of Cucumber in promoting it. You will learn to set up Cucumber with Selenium in Eclipse and understand its basics to write your own Cucumber Selenium test. You will learn about Data Driven Testing in Cucumber, parametrization, and how to handle data with Cucumber. This is a complete and comprehensive course where our experienced trainers will help you master Cucumber so that you can implement BDD for project success. We offer materials only to those individuals who registered with us and also provide Cucumber testing certification on successful completion of course.</p>\r\n', 'cucumber', 22999, 'cucumber.jpg', '2019-11-18', 1),
(33, 6, 'Selenium Training', '<p>This is the age of Agile, the age where software processes are highly responsive and interactive. Processes are required to be automated so that actions can run on a loop without much human intervention, thus increasing efficiency and lowering the chances of mistakes. Selenium is one such set of software tools that supports test automation. An open source, portable software testing framework for web applications, Selenium can be deployed on a variety of platforms and supports a number of browsers including IE, Firefox, Mozilla and others. By seamlessly rendering itself to the frequent code changes that are a norm for Agile projects, Selenium is the perfect test automation tool that helps provide flawless products to satisfied customers. Zeolearn&rsquo;s Testing with Selenium course is a one-stop solution for Selenium enthusiasts. Through a series of lectures and hands-on practice sessions, you will learn how to use Selenium to write automated tests for web applications and design a web application testing framework. Get a firm grip on concepts like Selenium IDE, RC, Grid and WebDriver and master the art of providing fast test results with a high rate of accuracy. Each course at our institute includes bonus materials at reasonable costs for everyone who enrolls.</p>\r\n', 'selenium-training', 22999, 'selenium-training.jpeg', NULL, NULL),
(34, 6, 'JUnit Testing ', '<p>Test driven development has immensely benefited developers helping them create products that are less prone to errors and more robust. JUnit is a unit-testing framework for Java that supports test driven development and helps accelerate programming speed and increase the quality of code.</p>\r\n\r\n<p>SkillRary brings you a full-fledged JUnit testing course that is designed not only to help you gain expertise in this framework ad use it to deliver simple, elegant and high quality code in lesser time but also understand the different types of tests and their importance in the software life cycle. Our expert tutors will help you understand the important of features of JUnit such as Fixtures, Test Suites, Test runners and JUnit classes. You will also learn how to validate unit tests and integrate JUnit with Eclipse, Ant and Maven. Enrol now and become proficient in the creation of JUnit tests the usage of the Eclipse IDE for developing software tests.</p>\r\n', 'junit-testing', 19999, 'junit-testing.png', '2019-11-18', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text,
  `contact_info` varchar(100) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `activate_code` varchar(15) DEFAULT NULL,
  `reset_code` varchar(15) DEFAULT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$0SHFfoWzz8WZpdu9Qw//E.tWamILbiNCX7bqhy3od0gvK5.kSJ8N2', 1, 'SkillRary', 'Admin', '', '', 'sr.png', 1, '', '', '2018-05-01'),
(9, 'harry@den.com', '$2y$10$Oongyx.Rv0Y/vbHGOxywl.qf18bXFiZOcEaI4ZpRRLzFNGKAhObSC', 0, 'Harry', 'Den', 'Silay City, Negros Occidental', '09092735719', 'male2.png', 1, 'k8FBpynQfqsv', 'wzPGkX5IODlTYHg', '2018-05-09'),
(12, 'christine@gmail.com', '$2y$10$ozW4c8r313YiBsf7HD7m6egZwpvoE983IHfZsPRxrO1hWXfPRpxHO', 0, 'Christine', 'becker', 'demo', '7542214500', 'female3.jpg', 1, '', '', '2018-07-09'),
(16, 'dlohani1@gmail.com', '$2y$10$4R0.9GqFSFOayL2CxoA5XOF3fWZLu6QXt8ullSVbXJnk1uZZheoie', 0, 'Deepak', 'Lohani', 'Bangalore', '8878100065', NULL, 1, 'syqfPiMRg54m', NULL, '2019-11-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
