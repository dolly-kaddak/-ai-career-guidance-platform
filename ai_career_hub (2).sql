-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 11:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ai_career_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `email`, `industry`, `specialization`, `experience`, `skills`, `bio`) VALUES
(1, 'dolly kaddak', 'dolly@gmail.com', 'Technology', 'Software Development', '1', 'JavaScript, React, Node.js', 'software devlopment'),
(3, 'Pooja Dharpure', 'poojadharpure140@gmail.com', 'Healthcare & Life Sciences', 'Cloud Computing', '4', 'Figma, Adobe XD, Photoshop', 'diploma in computer science'),
(4, '', '', '', '', '', '', ''),
(5, '', '', '', '', '', '', ''),
(6, '', '', '', '', '', '', ''),
(7, '', '', '', '', '', '', ''),
(8, '', '', '', '', '', '', ''),
(9, '', '', '', '', '', '', ''),
(10, '', '', '', '', '', '', ''),
(11, 'nikita waghmare', 'nw76433@gmail.com', 'Manufacturing & Industrial', 'Blockchain & Cryptocurrency', '4', 'JavaScript, React, Node.js', 'diploma in etx'),
(12, 'ajay kaddak', 'ajaykaddak@gmail.com', 'Financial Services', 'Cloud Computing', '10', 'Figma, Adobe XD, Photoshop', 'home finance'),
(13, 'Pooja Dharpure', 'poojadharpure140@gmail.com', 'Financial Services', 'Cybersecurity', '4', 'JavaScript, React, Node.js', 'diploma in IT'),
(14, 'Pooja Dharpure', 'poojadharpure140@gmail.com', 'Financial Services', 'Cybersecurity', '4', 'JavaScript, React, Node.js', 'diploma in IT'),
(15, 'Pooja Dharpure', 'poojadharpure140@gmail.com', 'Financial Services', 'Cybersecurity', '1', 'JavaScript, React, Node.js', 'diploma in IT'),
(16, 'dolly kaddak', 'dollykaddak07@gmail.com', 'Financial Services', 'Internet & Web Services', '10', 'Figma, Adobe XD, Photoshop', 'hh'),
(17, 'Dolly Kaddak', 'dollykaddak07@gmail.com', 'Education & Training', 'Software Development', '10', 'Figma, Adobe XD, Photoshop', 'information technology'),
(18, 'Dolly Kaddak', 'dollykaddak07@gmail.com', 'Education & Training', 'Software Development', '10', 'Figma, Adobe XD, Photoshop', 'information technology'),
(19, 'Tanmai Kadu', 'tanami@gmail.com', 'Technology', 'Specialization', '2', 'JavaScript, React, Postgres, Node.js', 'iam ...........'),
(20, 'Tanmai Kadu', 'tanami@gmail.com', 'Technology', 'Software Development', '2', 'JavaScript, React, Postgres, Node.js', 'iam ...........'),
(21, 'Tanmai Kadu', 'tanami@gmail.com', 'Technology', 'IT Services', '2', 'JavaScript, React, Postgres, Node.js', 'iam ...........'),
(22, 'dolly kaddak', 'dolikaddak35@gmail.com', 'Manufacturing & Industrial', 'IoT (Internet of Things)', '13', 'python', 'hi'),
(23, 'rashmi vaidya', 'rashmi@gmail.com', 'Manufacturing & Industrial', 'Artificial Intelligence/Machine Learning', '1', 'JavaScript, React, Node.js', 'information technology'),
(24, 'Dolly Kaddak', 'dollykaddak07@gmail.com', 'Telecommunications', 'IT Services', '13', 'JavaScript, React, Postgres, Node.js', 'information technology'),
(25, 'Dolly Kaddak', 'dollykaddak07@gmail.com', 'Manufacturing & Industrial', 'IoT (Internet of Things)', '13', 'JavaScript, React, Postgres, Node.js', 'hii'),
(26, 'Pooja Dharpure', 'poojadharpure140@gmail.com', 'Professional Services', 'Robotics', '13', 'JavaScript, React, Node.js', 'hi'),
(27, 'Dolly Kaddak', 'dollykaddak07@gmail.com', 'Manufacturing & Industrial', 'Quantum Computing', '13', 'python', 'HI'),
(28, 'Anushka desai', 'anushka@gmail.com', 'Manufacturing & Industrial', 'Data Science & Analytics', '13', 'JavaScript, React, Postgres, Node.js', 'hi'),
(29, 'dolly kaddak', 'dollykaddak07@gmail.com', 'Healthcare & Life Sciences', 'Robotics', '10', 'Figma, Adobe XD, Photoshop', 'hi'),
(30, 'Dolly Kaddak', 'dollykaddak07@gmail.com', 'Financial Services', 'Software Development', '13', 'JavaScript, React, Postgres, Node.js', 'hi'),
(31, 'Dolly Kaddak', 'dollykaddak07@gmail.com', 'Technology', 'Software Development', '3 years', 'JavaScript, React, Node.js', 'information technology'),
(32, 'Dolly Kaddak', 'rashmi@gmail.com', 'Technology', 'Robotics', '12', 'JavaScript, React, Postgres, Node.js', 'hi'),
(33, 'Dolly Kaddak', 'dollykaddak07@gmail.com', 'Technology', 'Artificial Intelligence/Machine Learning', '1', 'JavaScript, React, Postgres, Node.js', 'information technology');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_option` char(1) NOT NULL,
  `explanation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `explanation`) VALUES
(1, 'Which of the following is NOT a core feature of React?', 'Component-based', 'Virtual DOM', 'Two-way data binding', 'Hooks', 'C', 'React utilizes a unidirectional data flow, not two-way data binding.'),
(2, 'In Tailwind CSS, what is the purpose of the @apply directive?', 'To define global styles', 'To inline utility classes', 'To create components', 'To import styles', 'B', '@apply directly inlines the styles of pre-defined utility classes into the current class.'),
(3, 'What is the primary purpose of useEffect hook in React?', 'To handle asynchronous operations', 'To perform side effects in components', 'To modify the state directly', 'To define CSS classes', 'B', 'useEffect allows performing side effects in functional components, such as data fetching.'),
(4, 'Which of the following is NOT a core feature of React?', 'Component-based', 'Virtual DOM', 'Two-way data binding', 'Hooks', 'C', 'React utilizes a unidirectional data flow, not two-way data binding.'),
(5, 'In Tailwind CSS, what is the purpose of the @apply directive?', 'To define global styles', 'To inline utility classes', 'To create components', 'To import styles', 'B', '@apply directly inlines the styles of pre-defined utility classes into the current class.'),
(6, 'What is the primary purpose of useEffect hook in React?', 'To handle asynchronous operations', 'To perform side effects in components', 'To modify the state directly', 'To define CSS classes', 'B', 'useEffect allows performing side effects in functional components, such as data fetching.'),
(7, 'Which of the following is used to manage state in React?', 'Redux', 'Context API', 'Both A & B', 'None of the above', 'C', 'React allows state management through Redux and Context API, both commonly used for different scenarios.'),
(8, 'What does SQL stand for?', 'Structured Question Language', 'Simple Query Language', 'Structured Query Language', 'System Query Language', 'C', 'SQL stands for Structured Query Language, which is used for managing relational databases.'),
(9, 'Which of the following is a NoSQL database?', 'MySQL', 'MongoDB', 'PostgreSQL', 'SQL Server', 'B', 'MongoDB is a NoSQL database, whereas MySQL, PostgreSQL, and SQL Server are relational databases.'),
(10, 'Which JavaScript method is used to add a new element to an array?', 'push()', 'add()', 'insert()', 'append()', 'A', 'The push() method adds a new element to the end of an array in JavaScript.'),
(11, 'Which HTTP method is used to update a resource?', 'GET', 'POST', 'PUT', 'DELETE', 'C', 'The PUT method is used to update a resource in RESTful APIs.'),
(12, 'Which CSS property is used to make text bold?', 'font-style', 'text-bold', 'font-weight', 'bold', 'C', 'The font-weight property controls the boldness of text.'),
(13, 'Which programming language is mainly used for backend development?', 'JavaScript', 'Python', 'PHP', 'All of the above', 'D', 'All these languages can be used for backend development depending on the framework and use case.');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` decimal(5,2) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `correct_answers` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `user_id`, `score`, `total_questions`, `correct_answers`, `timestamp`) VALUES
(1, 1, 90.00, 10, 9, '2025-03-30 05:54:02'),
(2, 2, 75.00, 10, 7, '2025-03-30 05:54:02'),
(3, 3, 85.00, 10, 8, '2025-03-30 05:54:02'),
(4, 4, 60.00, 10, 6, '2025-03-30 05:54:02'),
(5, 5, 40.00, 10, 4, '2025-03-30 05:54:02'),
(6, 6, 100.00, 10, 10, '2025-03-30 05:54:02'),
(7, 0, 50.00, 10, 5, '2025-03-30 05:54:02'),
(8, 8, 95.00, 10, 9, '2025-03-30 05:54:02'),
(9, 9, 30.00, 10, 3, '2025-03-30 05:54:02'),
(10, 10, 80.00, 10, 8, '2025-03-30 05:54:02'),
(11, 1, 4.00, 9, 4, '2025-03-30 06:47:30'),
(12, 1, 3.00, 9, 3, '2025-03-30 06:50:47'),
(13, 1, 3.00, 9, 3, '2025-03-30 06:58:58'),
(14, 1, 4.00, 9, 4, '2025-03-30 07:00:31'),
(15, 1, 0.00, 9, 0, '2025-03-30 07:01:00'),
(16, 1, 4.00, 9, 4, '2025-03-30 07:01:15'),
(17, 1, 0.00, 0, 0, '2025-03-30 07:02:40'),
(18, 1, 4.00, 9, 4, '2025-03-30 07:09:42'),
(19, 1, 4.00, 9, 4, '2025-03-30 07:10:42'),
(20, 1, 2.00, 9, 2, '2025-03-30 07:42:17'),
(21, 1, 0.00, 0, 0, '2025-03-30 08:47:42'),
(22, 1, 0.00, 0, 0, '2025-03-30 09:55:03'),
(23, 1, 1.00, 9, 1, '2025-03-30 09:55:39'),
(24, 1, 0.00, 0, 0, '2025-03-30 10:04:16'),
(25, 1, 4.00, 9, 4, '2025-03-30 10:13:09'),
(26, 1, 4.00, 9, 4, '2025-03-30 10:13:28'),
(27, 1, 3.00, 9, 3, '2025-03-30 10:13:45'),
(28, 1, 0.00, 0, 0, '2025-03-30 10:29:04'),
(29, 1, 1.00, 9, 1, '2025-04-25 12:20:45'),
(30, 1, 0.00, 0, 0, '2025-04-26 06:58:58'),
(31, 1, 0.00, 0, 0, '2025-04-26 06:59:07'),
(32, 1, 4.00, 9, 4, '2025-04-27 07:35:58'),
(33, 1, 4.00, 9, 4, '2025-04-28 06:54:33'),
(34, 1, 2.00, 9, 2, '2025-05-01 17:57:06'),
(35, 1, 3.00, 9, 3, '2025-05-05 02:27:02'),
(36, 1, 3.00, 9, 3, '2025-05-05 09:12:20'),
(37, 1, 2.00, 8, 2, '2025-05-07 04:41:49'),
(38, 1, 2.00, 9, 2, '2025-05-09 08:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` int(11) NOT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `min_salary` int(11) DEFAULT NULL,
  `median_salary` int(11) DEFAULT NULL,
  `max_salary` int(11) DEFAULT NULL,
  `market_outlook` varchar(50) DEFAULT NULL,
  `industry_growth` decimal(5,2) DEFAULT NULL,
  `demand_level` varchar(50) DEFAULT NULL,
  `top_skills` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `specialization`, `min_salary`, `median_salary`, `max_salary`, `market_outlook`, `industry_growth`, `demand_level`, `top_skills`) VALUES
(1, 'Software Development', 60, 100, 150, 'Positive', 15.00, 'High', 'Java, Python, C++, Full-Stack Development, Agile, DevOps'),
(2, 'IT Services', 50, 85, 130, 'Positive', 10.00, 'Moderate', 'IT Support, Network Administration, System Administration, ITIL, Cloud Management'),
(3, 'Cybersecurity', 70, 110, 160, 'Very Positive', 30.00, 'Very High', 'Ethical Hacking, Network Security, Penetration Testing, SIEM, Risk Management'),
(4, 'Cloud Computing', 75, 120, 170, 'Very Positive', 28.00, 'Very High', 'AWS, Azure, Google Cloud, Kubernetes, DevOps, Cloud Security'),
(5, 'Artificial Intelligence/Machine Learning', 90, 140, 180, 'Extremely Positive', 35.00, 'Extremely High', 'Deep Learning, NLP, TensorFlow, PyTorch, Data Engineering, MLOps'),
(6, 'Data Science & Analytics', 80, 130, 175, 'Very Positive', 32.00, 'High', 'SQL, Python, R, Tableau, Big Data, Machine Learning'),
(7, 'Internet & Web Services', 55, 95, 140, 'Positive', 12.00, 'High', 'JavaScript, React, Node.js, UI/UX, Web Security, API Development'),
(8, 'Robotics', 65, 110, 160, 'Positive', 18.00, 'Moderate to High', 'ROS, MATLAB, Automation, Embedded Systems, Mechanical Engineering'),
(9, 'Quantum Computing', 85, 140, 180, 'Neutral (Future Growth)', 40.00, 'Emerging', 'Qiskit, Quantum Algorithms, Cryptography, Quantum Mechanics'),
(10, 'Blockchain & Cryptocurrency', 70, 120, 175, 'Mixed', 25.00, 'Fluctuating', 'Solidity, Smart Contracts, DeFi, Cryptography, Ethereum, Bitcoin'),
(11, 'IoT (Internet of Things)', 65, 105, 160, 'Positive', 22.00, 'High', 'Embedded Systems, IoT Security, Edge Computing, Python, Sensor Networks');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `created_at`) VALUES
(1, 'dolly', 'dollykaddak07@gmail.com', '$2y$10$OmnrrmHYNMe1reooQKDFcOM0N2k2Wz6eHd0lPQQN3irzXjbxN/dby', '2025-03-16 17:24:13'),
(2, 'pooja dharpure', 'poojadharpure140@gmail.com', '$2y$10$0sY4lgnu4CMHSwIcatpo5eR0Ujjdz6Cs.UJSyd4ck7EBTtALkq9JK', '2025-03-23 03:34:29'),
(3, 'krishna dharpure', 'krishnadharpure6@gmail.com', '$2y$10$/fX4EsEfsd2pbsUY7Ye6ee.OG.6OIVcugxR1KkEyjMDRRLuKu1okq', '2025-03-23 03:55:47'),
(4, 'ajay kaddak', 'ajaykaddak@gmail.com', '$2y$10$7cs5I4iffucJZ6dekGiOauKTja/lQpMlhT3vYl5BP44X5RkDT4BFC', '2025-03-23 03:59:03'),
(5, 'nikita wagh', 'nw76433@gmail.com', '$2y$10$SvmSmHlQSHLhj42UU3UqcehIg61pRG3/KZ7tbV07.y7FyTFdMlqBG', '2025-03-24 07:17:05'),
(6, 'prajakta', 'prajakta@gmail.com', '$2y$10$CMr/7gBeF4QnJnxgZXaKfuOgRDK.ALsl76joR0g1veevjumkBK7bG', '2025-03-24 10:52:42'),
(7, 'Tanmai Kadu', 'tanami@gmail.com', '$2y$10$s4bWLLYYOwrm/UVT2eKGR.RpFUjhd.xT.ULWTCvaUS./qWcJhwNp.', '2025-04-24 05:56:09'),
(8, 'rashmi vaidya', 'rashmi@gmail.com', '$2y$10$3KruIQklInW1MiZ0ExIG..MQAZTppvXIDrO5bvy7cZJDyEZ0IU5pO', '2025-04-25 12:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `users_answers`
--

CREATE TABLE `users_answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `selected_option` varchar(5) NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_answers`
--

INSERT INTO `users_answers` (`id`, `user_id`, `question_id`, `selected_option`, `submitted_at`) VALUES
(66, 1, 4, 'B', '2025-03-30 07:09:42'),
(67, 1, 5, 'B', '2025-03-30 07:09:42'),
(68, 1, 11, 'B', '2025-03-30 07:09:42'),
(69, 1, 6, 'B', '2025-03-30 07:09:42'),
(70, 1, 3, 'B', '2025-03-30 07:09:42'),
(71, 1, 10, 'B', '2025-03-30 07:09:42'),
(72, 1, 2, 'B', '2025-03-30 07:09:42'),
(73, 1, 13, 'B', '2025-03-30 07:09:42'),
(74, 1, 12, 'B', '2025-03-30 07:09:42'),
(75, 1, 8, 'B', '2025-03-30 07:10:42'),
(76, 1, 6, 'B', '2025-03-30 07:10:42'),
(77, 1, 1, 'B', '2025-03-30 07:10:42'),
(78, 1, 11, 'B', '2025-03-30 07:10:42'),
(79, 1, 7, 'B', '2025-03-30 07:10:42'),
(80, 1, 2, 'B', '2025-03-30 07:10:42'),
(81, 1, 12, 'B', '2025-03-30 07:10:42'),
(82, 1, 5, 'B', '2025-03-30 07:10:42'),
(83, 1, 9, 'B', '2025-03-30 07:10:42'),
(84, 1, 6, 'C', '2025-03-30 07:42:17'),
(85, 1, 7, 'D', '2025-03-30 07:42:17'),
(86, 1, 8, 'C', '2025-03-30 07:42:17'),
(87, 1, 4, 'D', '2025-03-30 07:42:17'),
(88, 1, 10, 'C', '2025-03-30 07:42:17'),
(89, 1, 5, 'D', '2025-03-30 07:42:17'),
(90, 1, 3, 'C', '2025-03-30 07:42:17'),
(91, 1, 12, 'D', '2025-03-30 07:42:17'),
(92, 1, 11, 'C', '2025-03-30 07:42:17'),
(93, 1, 9, 'A', '2025-03-30 09:55:39'),
(94, 1, 12, 'A', '2025-03-30 09:55:39'),
(95, 1, 6, 'A', '2025-03-30 09:55:39'),
(96, 1, 4, 'A', '2025-03-30 09:55:39'),
(97, 1, 11, 'A', '2025-03-30 09:55:39'),
(98, 1, 5, 'A', '2025-03-30 09:55:39'),
(99, 1, 10, 'A', '2025-03-30 09:55:39'),
(100, 1, 8, 'A', '2025-03-30 09:55:39'),
(101, 1, 2, 'A', '2025-03-30 09:55:39'),
(102, 1, 13, 'B', '2025-03-30 10:13:09'),
(103, 1, 6, 'B', '2025-03-30 10:13:09'),
(104, 1, 12, 'B', '2025-03-30 10:13:09'),
(105, 1, 2, 'B', '2025-03-30 10:13:09'),
(106, 1, 1, 'B', '2025-03-30 10:13:09'),
(107, 1, 9, 'B', '2025-03-30 10:13:09'),
(108, 1, 11, 'B', '2025-03-30 10:13:09'),
(109, 1, 3, 'B', '2025-03-30 10:13:09'),
(110, 1, 8, 'B', '2025-03-30 10:13:09'),
(111, 1, 2, 'B', '2025-03-30 10:13:28'),
(112, 1, 13, 'B', '2025-03-30 10:13:28'),
(113, 1, 6, 'B', '2025-03-30 10:13:28'),
(114, 1, 8, 'B', '2025-03-30 10:13:28'),
(115, 1, 11, 'B', '2025-03-30 10:13:28'),
(116, 1, 5, 'B', '2025-03-30 10:13:28'),
(117, 1, 9, 'B', '2025-03-30 10:13:28'),
(118, 1, 7, 'B', '2025-03-30 10:13:28'),
(119, 1, 12, 'B', '2025-03-30 10:13:28'),
(120, 1, 5, 'B', '2025-03-30 10:13:45'),
(121, 1, 11, 'B', '2025-03-30 10:13:45'),
(122, 1, 10, 'B', '2025-03-30 10:13:45'),
(123, 1, 7, 'B', '2025-03-30 10:13:45'),
(124, 1, 8, 'B', '2025-03-30 10:13:45'),
(125, 1, 12, 'B', '2025-03-30 10:13:45'),
(126, 1, 4, 'B', '2025-03-30 10:13:45'),
(127, 1, 9, 'B', '2025-03-30 10:13:45'),
(128, 1, 2, 'B', '2025-03-30 10:13:45'),
(129, 1, 6, 'D', '2025-04-25 12:20:45'),
(130, 1, 5, 'D', '2025-04-25 12:20:45'),
(131, 1, 11, 'D', '2025-04-25 12:20:45'),
(132, 1, 2, 'D', '2025-04-25 12:20:45'),
(133, 1, 10, 'D', '2025-04-25 12:20:45'),
(134, 1, 9, 'D', '2025-04-25 12:20:45'),
(135, 1, 4, 'D', '2025-04-25 12:20:45'),
(136, 1, 13, 'D', '2025-04-25 12:20:45'),
(137, 1, 1, 'D', '2025-04-25 12:20:45'),
(138, 1, 2, 'B', '2025-04-27 07:35:58'),
(139, 1, 11, 'B', '2025-04-27 07:35:58'),
(140, 1, 4, 'B', '2025-04-27 07:35:58'),
(141, 1, 8, 'B', '2025-04-27 07:35:58'),
(142, 1, 5, 'B', '2025-04-27 07:35:58'),
(143, 1, 13, 'B', '2025-04-27 07:35:58'),
(144, 1, 9, 'B', '2025-04-27 07:35:58'),
(145, 1, 3, 'B', '2025-04-27 07:35:58'),
(146, 1, 10, 'B', '2025-04-27 07:35:58'),
(147, 1, 2, 'C', '2025-04-28 06:54:33'),
(148, 1, 13, 'C', '2025-04-28 06:54:33'),
(149, 1, 8, 'C', '2025-04-28 06:54:33'),
(150, 1, 7, 'C', '2025-04-28 06:54:33'),
(151, 1, 12, 'C', '2025-04-28 06:54:33'),
(152, 1, 1, 'C', '2025-04-28 06:54:33'),
(153, 1, 9, 'C', '2025-04-28 06:54:33'),
(154, 1, 5, 'C', '2025-04-28 06:54:33'),
(155, 1, 6, 'C', '2025-04-28 06:54:33'),
(156, 1, 10, 'B', '2025-05-01 17:57:06'),
(157, 1, 1, 'B', '2025-05-01 17:57:06'),
(158, 1, 8, 'B', '2025-05-01 17:57:06'),
(159, 1, 13, 'B', '2025-05-01 17:57:06'),
(160, 1, 2, 'B', '2025-05-01 17:57:06'),
(161, 1, 4, 'B', '2025-05-01 17:57:06'),
(162, 1, 3, 'B', '2025-05-01 17:57:06'),
(163, 1, 7, 'B', '2025-05-01 17:57:06'),
(164, 1, 11, 'B', '2025-05-01 17:57:06'),
(165, 1, 11, 'B', '2025-05-05 02:27:02'),
(166, 1, 8, 'B', '2025-05-05 02:27:02'),
(167, 1, 13, 'B', '2025-05-05 02:27:02'),
(168, 1, 3, 'B', '2025-05-05 02:27:02'),
(169, 1, 2, 'B', '2025-05-05 02:27:02'),
(170, 1, 4, 'B', '2025-05-05 02:27:02'),
(171, 1, 10, 'B', '2025-05-05 02:27:02'),
(172, 1, 5, 'B', '2025-05-05 02:27:02'),
(173, 1, 1, 'B', '2025-05-05 02:27:02'),
(174, 1, 1, 'B', '2025-05-05 09:12:20'),
(175, 1, 13, 'B', '2025-05-05 09:12:20'),
(176, 1, 8, 'B', '2025-05-05 09:12:20'),
(177, 1, 2, 'B', '2025-05-05 09:12:20'),
(178, 1, 12, 'B', '2025-05-05 09:12:20'),
(179, 1, 5, 'B', '2025-05-05 09:12:20'),
(180, 1, 11, 'B', '2025-05-05 09:12:20'),
(181, 1, 4, 'B', '2025-05-05 09:12:20'),
(182, 1, 9, 'B', '2025-05-05 09:12:20'),
(183, 1, 3, 'B', '2025-05-07 04:41:49'),
(184, 1, 4, 'B', '2025-05-07 04:41:49'),
(185, 1, 6, 'B', '2025-05-07 04:41:49'),
(186, 1, 12, 'B', '2025-05-07 04:41:49'),
(187, 1, 8, 'B', '2025-05-07 04:41:49'),
(188, 1, 1, 'B', '2025-05-07 04:41:49'),
(189, 1, 7, 'B', '2025-05-07 04:41:49'),
(190, 1, 11, 'B', '2025-05-07 04:41:49'),
(191, 1, 1, 'C', '2025-05-09 08:42:15'),
(192, 1, 3, 'C', '2025-05-09 08:42:15'),
(193, 1, 9, 'C', '2025-05-09 08:42:15'),
(194, 1, 10, 'C', '2025-05-09 08:42:15'),
(195, 1, 4, 'B', '2025-05-09 08:42:15'),
(196, 1, 2, 'D', '2025-05-09 08:42:15'),
(197, 1, 13, 'B', '2025-05-09 08:42:15'),
(198, 1, 5, 'D', '2025-05-09 08:42:15'),
(199, 1, 8, 'C', '2025-05-09 08:42:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_answers`
--
ALTER TABLE `users_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_answers`
--
ALTER TABLE `users_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_answers`
--
ALTER TABLE `users_answers`
  ADD CONSTRAINT `users_answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
