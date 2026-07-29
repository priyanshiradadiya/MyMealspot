-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2026 at 06:38 PM
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
-- Database: `testing1`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rating` int(1) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `rating`, `message`, `created_at`) VALUES
(1, 'Aarav Mehta', 5, 'Amazing experience! The food was delicious and beautifully presented. Will definitely visit again!', '2025-11-14 09:17:13'),
(2, 'Diya Shah', 4, 'Loved the cozy ambiance and friendly staff. The desserts were truly the highlight of our evening.', '2025-11-14 09:17:13'),
(3, 'Rohan Patel', 5, 'Everything was perfect — from the service to the flavor. The chef’s special is a must-try!', '2025-11-14 09:17:13'),
(4, 'Ishita Nair', 4, 'The mocktails were refreshing and the pasta was creamy and flavorful. Highly recommended!', '2025-11-14 09:17:13'),
(5, 'Karan Joshi', 5, 'Best dining experience I’ve had in Surat! The staff was attentive and the food quality was top-notch.', '2025-11-14 09:17:13'),
(6, 'Priya Desai', 5, 'Beautiful interior, soothing music, and delicious food. A perfect place to relax and enjoy a meal.', '2025-11-14 09:17:13'),
(7, 'Vivek Rana', 4, 'Good value for money. Paneer dishes were tasty and fresh. Will visit again soon!', '2025-11-14 09:17:13'),
(8, 'Sneha Iyer', 5, 'Loved how quickly the food arrived and everything was served hot. Excellent presentation too!', '2025-11-14 09:17:13'),
(9, 'Harsh Thakkar', 5, 'A perfect blend of taste and ambiance. The live kitchen setup was really cool!', '2025-11-14 09:17:13'),
(10, 'Neha Verma', 4, 'Service could be a little faster but the food made up for it. Loved the brownie dessert!', '2025-11-14 09:17:13'),
(11, 'nisha', 5, 'good ', '2025-12-02 12:44:08'),
(12, 'jiya', 5, 'very good', '2025-12-02 13:26:23'),
(13, 'sadhana', 5, 'goooddddd', '2025-12-02 15:05:29'),
(14, 'priyanshi', 5, 'Delicious meals with fresh ingredients!!', '2025-12-02 17:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `item_name` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(50) NOT NULL DEFAULT 'General',
  `hotel_name` varchar(50) NOT NULL DEFAULT 'Amiras',
  `rating` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `item_name`, `description`, `price`, `image`, `category`, `hotel_name`, `rating`) VALUES
(1, 'Pizza', 'Cheesy pizza', 199.00, 'pizza.jpg', 'General', 'Amiras', 5),
(2, 'Burger', 'Veg burger', 99.00, 'burger.jpg', 'General', 'Amiras', 4),
(3, 'Pasta', 'Creamy pasta', 149.00, 'pasta.jpg', 'General', 'Amiras', 3),
(4, 'Churros', 'Crispy fried-dough pastry sticks coated in cinnamon sugar, served with chocolate dip.', 250.00, 'churros.jpg', 'Snacks & Fries', 'Amiras', 5),
(5, 'Avocado Open Toast', 'Fresh avocado spread on toasted bread topped with herbs and seasoning.', 420.00, 'avacado_open_toast.jpg', 'Main Dishes', 'Amiras', 4),
(6, 'Aglio Olio', 'Classic Italian pasta tossed with garlic, olive oil, and chili flakes.', 350.00, 'aglio_olio.jpg', 'Main Dishes', 'Amiras', 3),
(7, 'Butter Croissant', 'Flaky and buttery French pastry, baked golden and soft inside.', 220.00, 'butter_croissant.jpg', 'Main Dishes', 'Amiras', 5),
(8, 'Mexican Rice Bowl', 'A wholesome bowl with Mexican rice, beans, salsa, and fresh toppings.', 460.00, 'Mexican_Rice_Bowl.jpg', 'Main Dishes', 'Amiras', 4),
(9, 'Pesto Pasta', 'Creamy basil pesto pasta garnished with parmesan and pine nuts.', 420.00, 'Pesto_Pasta.jpg', 'Main Dishes', 'Amiras', 3),
(10, 'Chilli Garlic Spaghetti', 'Spaghetti tossed in spicy chili and garlic sauce with herbs.', 380.00, 'Chilli_Garlic_Spaghetti.jpg', 'Main Dishes', 'Amiras', 5),
(11, 'Salted Fries', 'Crispy golden fries lightly salted and served hot.', 240.00, 'Salted_Fries.jpg', 'Snacks & Fries', 'Amiras', 4),
(12, 'Peri Peri Fries', 'Spicy and crispy fries tossed in Peri Peri seasoning.', 260.00, 'Peri_Peri_Fries.jpg', 'Snacks & Fries', 'Amiras', 3),
(13, 'Oreo Shake', 'Creamy milkshake blended with Oreo cookies and chocolate.', 380.00, 'Oreo_Shake.jpg', 'Shakes & Beverages', 'Amiras', 5),
(14, 'Nutella Milkshake', 'Rich Nutella blended with chilled milk and ice cream.', 380.00, 'Nutella_Milkshake.jpg', 'Shakes & Beverages', 'Amiras', 4),
(15, 'Ferrero Rocher Milkshake', 'Decadent milkshake with Ferrero Rocher chocolate pieces.', 480.00, 'Ferrero_Rocher_Milkshake.jpg', 'Shakes & Beverages', 'Amiras', 3),
(16, 'Browne Caramel Milkshake', 'Chocolate brownie and caramel blended into a creamy milkshake.', 420.00, 'Browne_Caramel_Milkshake.jpg', 'Shakes & Beverages', 'Amiras', 5),
(17, 'Blueberry Cheesecake Milkshake', 'Smooth cheesecake milkshake with fresh blueberries.', 440.00, 'Blueberry_Cheesecake_Milkshake.jpg', 'Shakes & Beverages', 'Amiras', 4),
(18, 'Biscoff Cheesecake Milkshake', 'Creamy Biscoff cheesecake flavored milkshake.', 440.00, 'Biscoff_Cheesecake_Milkshake.jpg', 'Shakes & Beverages', 'Amiras', 3),
(19, 'Yuzu Ice Tea', 'Refreshing iced tea infused with yuzu citrus.', 280.00, 'Yuzu_Ice_Tea.jpg', 'Iced Teas & Drinks', 'Amiras', 5),
(20, 'Passion Fruit Iced Tea', 'Tangy passion fruit flavored iced tea, perfect for summer.', 280.00, 'Passion_Fruit_Iced_Tea.jpg', 'Iced Teas & Drinks', 'Amiras', 4),
(21, 'Mango Mint Iced Tea', 'Sweet mango iced tea with a hint of fresh mint.', 280.00, 'Mango_Mint_Iced_Tea.jpg', 'Iced Teas & Drinks', 'Amiras', 3),
(22, 'Blueberry Fizz', 'Sparkling blueberry drink with refreshing bubbles.', 300.00, 'Blueberry_Fizz.jpg', 'Iced Teas & Drinks', 'Amiras', 5),
(42, 'Pasta with Tomato Sauce', 'Delicious pasta with rich tomato sauce', 350.00, 'pasta_with_tomato_sauce.jpg', 'General', 'Spice Villa', 3),
(43, 'French Fries', 'Crispy golden french fries', 120.00, 'french_fries.jpg', 'Breakfast', 'Spice Villa', 5),
(44, 'Quinoa Salad', 'Healthy quinoa with fresh veggies', 470.00, 'quinoa_salad.jpg', 'Salads', 'Spice Villa', 4),
(45, 'Paneer Vegetable Salad', 'Paneer with mixed vegetables', 390.00, 'paneer_vegetable_salad.jpg', 'Salads', 'Spice Villa', 3),
(46, 'Caesar Salad', 'Classic Caesar salad with dressing', 370.00, 'Caesar_Salad.jpg', 'Salads', 'Spice Villa', 5),
(47, 'Veg Omelette Sandwich', 'Omelette sandwich with fresh veggies', 440.00, 'veg_omelette_sandwich.jpg', 'General', 'Spice Villa', 4),
(48, 'Croissant French Toast', 'Buttery croissant French toast', 440.00, 'Croissant_French_Toast.jpg', 'Breakfast', 'Spice Villa', 3),
(49, 'Caprese Croissant Sandwich', 'Tomato, basil and cheese croissant', 470.00, 'caprese_croissant_sandwich.jpg', 'Breakfast', 'Spice Villa', 5),
(50, 'Cherry Tomato Basil Open Toast', 'Open toast with cherry tomato and basil', 370.00, 'cherry_tomato_basil_open_toast.jpg', 'Breakfast', 'Spice Villa', 4),
(51, 'Avocado Open Toast', 'Open toast topped with avocado', 590.00, 'avocado_open_toast.jpg', 'Breakfast', 'Spice Villa', 3),
(52, 'Lettuce Tomato Bagel', 'Bagel with lettuce and tomato', 290.00, 'lettuce_tomato_bagel.jpg', 'Breakfast', 'Spice Villa', 5),
(54, 'Butter Pancakes', 'Fluffy butter pancakes', 390.00, 'Butter_Pancakes.jpg', 'Breakfast', 'Spice Villa', 3),
(55, 'Butter Croissant', 'Buttery flaky croissant', 220.00, 'butter_Croissant.jpg', 'Desserts', 'Spice Villa', 5),
(56, 'Mocha', 'Rich chocolate coffee', 240.00, 'mocha.jpg', 'Beverages', 'Spice Villa', 4),
(58, 'Americano', 'Smooth americano coffee', 200.00, 'Americano.jpg', 'Beverages', 'Spice Villa', 5),
(59, 'Cappuccino', 'Classic cappuccino coffee', 290.00, 'cappuccino.jpg', 'Beverages', 'Spice Villa', 4),
(60, 'Oreo Cookie', 'Delicious Oreo cookie', 290.00, 'Oreo_cookie.jpg', 'Desserts', 'Spice Villa', 3),
(61, 'Chicken Sausage Pizza', 'Pizza with chicken sausage topping', 500.00, 'Chicken_Sausage_Pizza.jpg', 'General', 'Spice Villa', 5),
(62, 'Pomegranate Mocktail', 'Refreshing pomegranate drink', 350.00, 'pomegranate_mocktail.jpg', 'Beverages', 'Spice Villa', 4),
(63, 'Vanilla Milkshake', 'Creamy vanilla milkshake', 450.00, 'Vanilla_Milkshake.jpg', 'Beverages', 'Spice Villa', 3),
(64, 'Cold Chocolate', 'Chilled chocolate drink', 290.00, 'cold_chocolate.jpg', 'Beverages', 'Spice Villa', 5),
(65, 'Egg Roll', 'Delicious egg roll with fresh vegetables', 80.00, 'egg_roll.jpg', 'Snacks', 'Pavillion', 4),
(66, 'Spring Roll', 'Crispy vegetable spring roll', 140.00, 'spring_roll.jpg', 'Snacks', 'Pavillion', 3),
(67, 'Manchuriyan', 'Spicy Indo-Chinese manchuriyan', 280.00, 'manchuriyan.jpg', 'Chinese', 'Pavillion', 5),
(68, 'Hakka Noodles', 'Stir-fried Hakka noodles', 350.00, 'hakka_noodles.jpg', 'Chinese', 'Pavillion', 4),
(69, 'Pulao Basmati Rice', 'Fragrant basmati rice pulao', 250.00, 'pulao_basmati_rice.jpg', 'Rice', 'Pavillion', 3),
(70, 'Pav Bhaji', 'Famous Mumbai pav bhaji', 120.00, 'Pav_bhaji.jpg', 'Indian', 'Pavillion', 5),
(71, 'Mapo Tofu', 'Spicy mapo tofu Chinese dish', 280.00, 'mapo_tofu.jpg', 'Chinese', 'Pavillion', 4),
(72, 'Dumplings', 'Steamed dumplings with filling', 600.00, 'dumplings.jpg', 'Chinese', 'Pavillion', 3),
(73, 'Paneer Momos', 'Steamed momos stuffed with paneer', 80.00, 'paneer_momos.jpg', 'Chinese', 'Pavillion', 5),
(74, 'Chinese Samosa', 'Crispy samosa with Chinese filling', 240.00, 'chinese_samosa.jpg', 'Snacks', 'Pavillion', 4),
(75, 'Baby Corn Manchurian', 'Spicy baby corn manchurian', 450.00, 'baby_corn_manchurian.jpg', 'Chinese', 'Pavillion', 3),
(76, 'Honey Chilli Potato', 'Sweet and spicy honey chilli potato', 499.00, 'honey_chilli_potato.jpg', 'Chinese', 'Pavillion', 5),
(77, 'Dosa', 'Crispy South Indian dosa', 350.00, 'dosa.jpg', 'Indian', 'Pavillion', 4),
(78, 'Maggi', 'Instant maggi noodles', 250.00, 'maggi.jpg', 'Snacks', 'Pavillion', 3),
(79, 'Cocktail', 'Refreshing cocktail drink', 220.00, 'cocktail.jpg', 'Beverages', 'Pavillion', 5),
(80, 'Pina Colada', 'Classic pina colada cocktail', 330.00, 'pina_colada.jpg', 'Beverages', 'Pavillion', 4),
(81, 'Watermelon Cocktail', 'Chilled watermelon cocktail', 290.00, 'Watermelon_Cocktail.jpg', 'Beverages', 'Pavillion', 3),
(82, 'Hamburger', 'Juicy beef hamburger', 199.00, 'Hamburger.jpg', 'Chinese', 'Pavillion', 5),
(83, 'Chicken', 'Grilled chicken dish', 599.00, 'chicken.jpg', 'Chinese', 'Pavillion', 4),
(84, 'Cake', 'Delicious cake slice', 89.00, 'cake.jpg', 'Desserts', 'Pavillion', 3),
(85, 'Praline', 'Sweet praline chocolate', 40.00, 'praline.jpg', 'Desserts', 'Pavillion', 5),
(228, 'Tomato Soup', 'Hot tomato soup', 80.00, 'Tometo_soup.jpg', 'Soups', 'Navjivan', 3),
(229, 'Manchow Soup', 'Spicy Manchow soup', 90.00, 'Manchow_soup.jpg', 'Soups', 'Navjivan', 5),
(230, 'Sweet Corn Veg Soup', 'Sweet corn vegetable soup', 110.00, 'sweet_corn_veg_soup.jpg', 'Soups', 'Navjivan', 4),
(231, 'Kaju Curry Sabji', 'Cashew nut curry', 100.00, 'Kaju_curry_sabji.jpg', 'Sabji', 'Navjivan', 3),
(232, 'Paneer Shahi Korma Sabji', 'Rich paneer korma curry', 90.00, 'Paneer_shahi_korma_sabji.jpg', 'Sabji', 'Navjivan', 5),
(233, 'Paneer Tikka', 'Grilled paneer tikka', 200.00, 'paneer_tikka.jpg', 'Sabji', 'Navjivan', 4),
(234, 'Paneer Bhurji Sabji', 'Scrambled paneer with spices', 120.00, 'paneer_Bhurji_sabji.jpg', 'Sabji', 'Navjivan', 3),
(235, 'Malai Kofta', 'Creamy malai kofta curry', 100.00, 'Malai_kofta_sabji.jpg', 'Sabji', 'Navjivan', 5),
(236, 'Jira Rice', 'Jeera rice with aromatic spices', 100.00, 'Jira_rice.jpg', 'Rice', 'Navjivan', 4),
(237, 'Kaju Pulav Rice', 'Cashew nut pulao', 140.00, 'kaju_pulav_rice.jpg', 'Rice', 'Navjivan', 3),
(238, 'Biryani Rice', 'Fragrant biryani rice', 110.00, 'Biryani_Rice.jpg', 'Rice', 'Navjivan', 5),
(239, 'Roasted Papad', 'Crispy roasted papad', 30.00, 'Roasted_Papad.jpg', 'Accompaniments', 'Navjivan', 4),
(240, 'Masala Papad', 'Spiced papad', 40.00, 'Masala_Papad.jpg', 'Accompaniments', 'Navjivan', 3),
(241, 'Green Salad', 'Fresh green salad', 80.00, 'Green_salad.jpg', 'Salads', 'Navjivan', 5),
(242, 'Fruit Salad', 'Mixed fruit salad', 100.00, 'fruit_salad.jpg', 'Salads', 'Navjivan', 4),
(243, 'Chapatti Roti', 'Soft chapatti roti', 20.00, 'chapatti_roti.jpg', 'Roti', 'Navjivan', 3),
(244, 'Tandoori Roti', 'Tandoori baked roti', 25.00, 'Tandoori_roti.jpg', 'Roti', 'Navjivan', 5),
(245, 'Nan', 'Soft naan bread', 30.00, 'nan.jpg', 'Roti', 'Navjivan', 4),
(246, 'Dal Fry', 'Lentil curry', 100.00, 'dal_fry.jpg', 'Sabji', 'Navjivan', 3),
(247, 'Vanilla Ice Cream', 'Classic vanilla ice cream', 80.00, 'vanila_ice_cream.jpg', 'Desserts', 'Navjivan', 5),
(248, 'Butter Scotch Ice Cream', 'Rich butterscotch ice cream', 90.00, 'butter_scotch_ice_cream.jpg', 'Desserts', 'Navjivan', 4),
(249, 'Pistachio Ice Cream', 'Creamy pistachio ice cream', 150.00, 'pistachio_ice_cream.jpg', 'Desserts', 'Navjivan', 3),
(250, 'Alfredo Sauce Pasta', 'Creamy Alfredo sauce pasta', 345.00, 'Alfredo_sauce_pasta.jpg', 'Pasta', 'Amrutras', 5),
(251, 'Arrabiata Sauce Pasta', 'Spicy Arrabiata pasta', 450.00, 'Arrabiata_sauce_pasta.jpg', 'Pasta', 'Amrutras', 4),
(252, 'Creamy Mushroom Ravioli Pasta', 'Mushroom stuffed ravioli in creamy sauce', 600.00, 'creamy_mushroom_ravioli_pasta.jpg', 'Pasta', 'Amrutras', 3),
(253, 'Spaghetti Aglio e Olio Pasta', 'Spaghetti with garlic and olive oil', 650.00, 'spaghetti_aglio_e_olio_pasta.jpg', 'Pasta', 'Amrutras', 5),
(254, 'Basil Margherita Pizza', 'Classic Margherita pizza with fresh basil', 550.00, 'Basil_Margherita_pizza.jpg', 'Pizza', 'Amrutras', 4),
(255, 'Creamy Spinach Pizza', 'Pizza topped with creamy spinach', 630.00, 'Creamy_spinach_pizza.jpg', 'Pizza', 'Amrutras', 3),
(256, 'Roasted Peri Peri Paneer Pizza', 'Paneer pizza with spicy peri peri sauce', 650.00, 'Roasted_peri_peri_paneer_pizza.jpg', 'Pizza', 'Amrutras', 5),
(257, 'Buddha Bowl', 'Healthy Buddha bowl with veggies and grains', 350.00, 'Buddha_salad.jpg', 'Salad', 'Amrutras', 4),
(258, 'Tex Mex Salad', 'Tex Mex style fresh salad', 330.00, 'Tex_Mex_salad.jpg', 'Salad', 'Amrutras', 3),
(259, 'Roasted Veggie Paneer Salad', 'Salad with roasted veggies and paneer', 350.00, 'Roasted_veggie_paneer_salad.jpg', 'Salad', 'Amrutras', 5),
(260, 'Biscoff Chiscake', 'Biscoff flavored cheesecake', 310.00, 'Biscoff_chiscake.jpg', 'Desserts', 'Amrutras', 4),
(261, 'Nutella Chiscake', 'Nutella flavored cheesecake', 310.00, 'Nutella_chiscake.jpg', 'Desserts', 'Amrutras', 3),
(262, 'Blueberry Chiscake', 'Blueberry flavored cheesecake', 310.00, 'Blueberry_chiscake.jpg', 'Desserts', 'Amrutras', 5),
(263, 'Classic Cold Coffee', 'Iced coffee with milk and sugar', 220.00, 'cold_coffee.jpg', 'Beverages', 'Amrutras', 4),
(264, 'Iced Americano', 'Cold espresso coffee', 180.00, 'Americano.jpg', 'Beverages', 'Amrutras', 3),
(265, 'Iced Chocolate', 'Chilled chocolate drink', 250.00, 'Iced_Choclate.jpg', 'Beverages', 'Amrutras', 5),
(266, 'Iced Latte', 'Cold latte coffee', 220.00, 'Iced_latte.jpg', 'Beverages', 'Amrutras', 4),
(267, 'Anjeer Shake', 'Fig flavored milkshake', 370.00, 'anjeer_shake.jpg', 'Shakes', 'Amrutras', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `total` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','paid','completed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `table_number` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `status`, `created_at`, `table_number`, `updated_at`) VALUES
(1, 0, 597.00, 'paid', '2025-09-23 05:44:24', NULL, '2025-11-09 09:54:51'),
(2, 0, 398.00, 'pending', '2025-09-23 06:59:31', NULL, '2025-11-09 09:54:51'),
(3, 0, 199.00, 'pending', '2025-09-23 07:12:31', NULL, '2025-11-09 09:54:51'),
(4, 0, 398.00, 'pending', '2025-09-23 07:13:09', NULL, '2025-11-09 09:54:51'),
(5, 0, 398.00, 'pending', '2025-09-23 07:18:03', NULL, '2025-11-09 09:54:51'),
(6, 0, 398.00, 'pending', '2025-09-23 07:18:59', NULL, '2025-11-09 09:54:51'),
(7, 0, 398.00, 'pending', '2025-09-23 07:43:17', NULL, '2025-11-09 09:54:51'),
(8, 0, 447.00, 'pending', '2025-09-23 08:55:24', NULL, '2025-11-09 09:54:51'),
(9, 2, 396.00, '', '2025-11-09 10:17:43', '2', '2025-11-09 10:17:43'),
(10, 2, 396.00, '', '2025-11-09 10:25:33', '2', '2025-11-09 10:25:33'),
(11, 2, 99.00, '', '2025-11-09 10:25:54', '3', '2025-11-09 10:25:54'),
(12, 2, 447.00, '', '2025-11-09 10:30:08', '5', '2025-11-09 10:30:08'),
(13, 2, 99.00, '', '2025-11-09 10:34:17', '2', '2025-11-09 10:34:17'),
(14, 2, 297.00, '', '2025-11-09 10:36:32', '2', '2025-11-09 10:36:32'),
(15, 2, 198.00, 'pending', '2025-11-09 10:46:58', NULL, '2025-11-09 10:46:58'),
(16, 2, 297.00, 'pending', '2025-11-09 10:47:21', NULL, '2025-11-09 10:47:21'),
(17, 2, 149.00, 'pending', '2025-11-09 10:47:48', NULL, '2025-11-09 10:47:48'),
(18, 2, 99.00, 'pending', '2025-11-09 11:52:48', NULL, '2025-11-09 11:52:48'),
(19, 2, 198.00, 'pending', '2025-11-09 12:02:54', NULL, '2025-11-09 12:02:54'),
(20, 2, 297.00, 'pending', '2025-11-09 12:03:12', NULL, '2025-11-09 12:03:12'),
(21, 2, 297.00, 'pending', '2025-11-09 12:09:56', NULL, '2025-11-09 12:09:56'),
(22, 2, 297.00, 'pending', '2025-11-09 12:10:34', NULL, '2025-11-09 12:10:34'),
(23, 2, 447.00, 'pending', '2025-11-09 12:11:17', NULL, '2025-11-09 12:11:17'),
(24, 2, 0.00, 'pending', '2025-11-09 12:13:19', NULL, '2025-11-09 12:13:19'),
(25, 2, 0.00, 'pending', '2025-11-09 12:14:21', NULL, '2025-11-09 12:14:21'),
(26, 2, 447.00, 'pending', '2025-11-09 12:14:55', NULL, '2025-11-09 12:14:55'),
(27, 10, 297.00, 'pending', '2025-11-11 08:41:25', NULL, '2025-11-11 08:41:25'),
(28, 10, 297.00, 'pending', '2025-11-11 09:05:21', NULL, '2025-11-11 09:05:21'),
(29, 10, 297.00, 'pending', '2025-11-11 09:48:19', NULL, '2025-11-11 09:48:19'),
(30, 10, 99.00, 'pending', '2025-11-11 09:50:02', NULL, '2025-11-11 09:50:02'),
(31, 11, 396.00, 'pending', '2025-11-11 10:14:57', NULL, '2025-11-11 10:14:57'),
(32, 11, 297.00, 'pending', '2025-11-11 10:53:46', NULL, '2025-11-11 10:53:46'),
(33, 11, 99.00, 'pending', '2025-11-11 11:07:37', NULL, '2025-11-11 11:07:37'),
(34, 13, 99.00, 'pending', '2025-12-02 12:43:52', NULL, '2025-12-02 12:43:52'),
(35, 13, 280.00, 'pending', '2025-12-02 13:19:38', NULL, '2025-12-02 13:19:38'),
(36, 13, 330.00, 'pending', '2025-12-02 13:25:58', NULL, '2025-12-02 13:25:58'),
(37, 13, 600.00, 'pending', '2025-12-02 15:05:08', NULL, '2025-12-02 15:05:08'),
(38, 14, 297.00, 'pending', '2025-12-03 04:31:32', NULL, '2025-12-03 04:31:32'),
(39, 14, 198.00, 'pending', '2025-12-03 07:25:07', NULL, '2025-12-03 07:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `menu_id`, `quantity`, `price`) VALUES
(1, 10, 2, 4, 99.00),
(2, 11, 2, 1, 99.00),
(3, 12, 3, 3, 149.00),
(4, 13, 2, 1, 99.00),
(5, 14, 2, 3, 99.00),
(6, 15, 2, 2, 99.00),
(7, 16, 2, 3, 99.00),
(8, 17, 3, 1, 149.00),
(9, 18, 2, 1, 99.00),
(10, 19, 2, 2, 99.00),
(11, 20, 2, 3, 99.00),
(12, 21, 2, 3, 99.00),
(13, 22, 2, 3, 99.00),
(14, 23, 3, 3, 149.00),
(15, 24, 3, 3, 0.00),
(16, 25, 3, 3, 0.00),
(17, 26, 3, 3, 149.00),
(18, 27, 2, 3, 99.00),
(19, 28, 2, 3, 99.00),
(20, 29, 2, 3, 99.00),
(21, 30, 2, 1, 99.00),
(22, 31, 2, 4, 99.00),
(23, 32, 2, 3, 99.00),
(24, 33, 2, 1, 99.00),
(25, 34, 2, 1, 99.00),
(26, 35, 21, 1, 280.00),
(27, 36, 80, 1, 330.00),
(28, 37, 252, 1, 600.00),
(29, 38, 2, 3, 99.00),
(30, 39, 2, 2, 99.00);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `amount`, `payment_method`, `payment_status`, `created_at`) VALUES
(1, 18, 99.00, 'UPI', 'success', '2025-11-09 11:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `table_booking`
--

CREATE TABLE `table_booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT 1,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `table_no` varchar(20) NOT NULL,
  `table_type` varchar(50) NOT NULL,
  `guests` int(11) NOT NULL DEFAULT 1,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_booking`
--

INSERT INTO `table_booking` (`id`, `user_id`, `name`, `phone`, `table_no`, `table_type`, `guests`, `booking_date`, `booking_time`, `created_at`) VALUES
(1, 1, '', '', '1', '2', 1, '2025-12-05', '10:46:00', '2025-12-02 13:17:04'),
(2, 1, '', '', '2', '2', 1, '2025-12-12', '22:49:00', '2025-12-02 13:19:18'),
(3, 1, '', '', '6', '6', 1, '2025-12-05', '10:54:00', '2025-12-02 13:24:48'),
(4, 1, '', '', '1', '2', 1, '0046-05-26', '03:26:00', '2025-12-03 04:32:20'),
(5, 1, '', '', '2', '2', 1, '0046-05-26', '10:11:00', '2025-12-03 04:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `mobile`, `password`) VALUES
(7, 'rutu2o23', 'rutuvaghasiya26@gmail.com', '6355797322', '26092006'),
(10, 'mitanshi', 'mitanshi@gmail.com', '4567891238', '$2y$10$yNDl12CFtzE9S71987Zdauo.0xdd7ZOXjlR2EjrMea4b3yjfCPEtW'),
(11, 'priyanshi', 'priyanshi@gmail.com', '4567893217', '$2y$10$widVmdI6WWdg1YfnQEM3xe2FIwsbaGsyjWI3fCpnFHYOIK4GIs9uG'),
(12, 'nisha', 'nishamangukiya0511@gmail.com', '9725632448', '$2y$10$Ygkgn7VWengw9j8nSFfJbu5orPUz8XgW6xrwHWg5q/NKvY8V6u4nq'),
(13, 'nisha', 'nisha@gmail.com', '9725632449', '$2y$10$08qcVQNBKRtJBxKpk.2rdu3BwhJtJvbASEv3KuKy5bg4YE9i4zrlG'),
(14, 'mitu', 'shihora@gmail.com', '6521478963', '$2y$10$FqRNfKhPmVsEbnfuijLudexSlwk.tHH4JI9PNM0a2cLzFgj7Go8te'),
(15, 'priyanshi', 'priyanshiradadiya1@gmail.com', '1234567891', '$2y$10$yxOpNdbubijoXrVgArG49uZTw4exLU9IeMYg0.MeBDvFTkhuCAQ8C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_booking`
--
ALTER TABLE `table_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_booking`
--
ALTER TABLE `table_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
