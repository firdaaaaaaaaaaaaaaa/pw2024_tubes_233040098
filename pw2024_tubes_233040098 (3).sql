-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2024 at 09:43 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040098`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kategori_menu`
--

INSERT INTO `kategori_menu` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'minuman'),
(3, 'makanan penutup');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int NOT NULL,
  `menu_name` varchar(200) NOT NULL,
  `harga` decimal(10,3) NOT NULL,
  `rating_menu` decimal(10,0) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `deskripsi_menu` text NOT NULL,
  `id_User` int DEFAULT NULL,
  `id_kategori` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `menu_name`, `harga`, `rating_menu`, `picture`, `deskripsi_menu`, `id_User`, `id_kategori`) VALUES
(2, 'Chocolat oreo', '5.000', '5', 'ccoklat.jpg', 'minuman yang terbuat dari campuran susu cokelat yang lezat dengan tambahan remah Oreo yang renyah. Minuman ini biasanya disajikan dingin dengan taburan remah Oreo di atasnya untuk memberikan rasa dan tekstur yang unik.\r\n', 3, 2),
(6, 'Coffee latte', '3.000', '4', 'coffe.jpg', 'minuman kopi yang terdiri dari espresso yang dicampur dengan susu dan dihiasi dengan foam susu di bagian atasnya. Minuman ini memiliki rasa kopi yang kaya dan creamy dari susu, dan sering dihidangkan dalam gelas tinggi.\r\n', NULL, 2),
(7, 'Gimbap ', '5.000', '4', 'Gimbap.jpg', 'sejenis makanan Korea yang terdiri dari nasi yang dilapisi dengan rumput laut panggang dan diisi dengan berbagai bahan seperti daging, telur, wortel, dan sayuran lainnya. Gimbap biasanya dibungkus dengan rapat dalam lembaran rumput laut dan dipotong menjadi gulungan sebelum disajikan.\r\n', NULL, 1),
(8, 'Lamon ice', '2.000', '5', 'jeruk.jpg', 'minuman segar yang terbuat dari perasan lemon yang disajikan dengan es batu. Minuman ini memiliki rasa asam segar dari lemon yang menyegarkan, dan sering diberi tambahan gula untuk keseimbangan rasa manis dan asamnya.', NULL, 2),
(9, 'Jajjangmyeon enak', '5.000', '5', 'Jajangmyeon.jpg', 'hidangan mi Korea yang disajikan dengan saus jajang yang terbuat dari pasta kedelai hitam, daging babi cincang, dan sayuran. Hidangan ini memiliki rasa gurih dan manis, dan sering dihidangkan dengan acar dan kimchi enak.', NULL, 1),
(10, 'Ice tea', '2.000', '4', '66633e583e860.jpeg', 'Ice Tea adalah minuman teh yang disajikan dingin dengan tambahan es batu. Teh dingin ini dapat disajikan dengan berbagai varian rasa seperti lemon, peach, atau mint, dan sering diberi tambahan gula atau pemanis lainnya sesuai selera.\r\n', NULL, 2),
(11, 'Tteokbokki', '6.000', '5', 'Tteokbokki.jpg', 'hidangan Korea yang terdiri dari tteok (kue beras) yang dimasak dalam saus pedas manis yang terbuat dari gochujang (pasta cabai Korea), gula, dan bahan lainnya. Tteokbokki sering disajikan dengan telur, odeng (fish cake), dan sayuran.', NULL, 1),
(12, 'Strawberry pie', '8.000', '5', 'pie.jpg', 'Sejenis kue pai yang terbuat dari kulit pai yang renyah dan diisi dengan potongan stroberi segar yang manis. Kue pai ini seringkali dilapisi dengan lapisan gula atau krim untuk memberikan rasa manis tambahan. Rasanya segar dan manis, sangat cocok sebagai hidangan penutup.\r\n', NULL, 3),
(13, 'ice cream manggo', '3.000', '4', '666339c71cc59.jpeg', 'Hidangan segar yang terbuat dari potongan mangga yang di-blend bersama es serut atau es batu. Minuman ini biasanya diberi tambahan sirup mangga atau susu kental manis untuk menambahkan rasa manis dan kaya. Rasanya segar, manis, dan sangat cocok untuk dinikmati di hari yang panas.\r\n', NULL, 3),
(14, 'Ice cream chocolat banana', '3.000', '4', 'ice.jpg', 'Hidangan cokelat yang diolah dengan tambahan potongan pisang segar dan es serut. Hidangan ini memiliki rasa cokelat yang kaya dan manis, dipadu dengan kelezatan pisang yang memberikan sentuhan manis alami. Kombinasi antara cokelat dan pisang memberikan sensasi yang lezat dan menyegarkan.\r\n', NULL, 3),
(15, 'Pudding caramel', '5.000', '5', 'pudding.jpg', 'Hidangan penutup yang terdiri dari lapisan puding lembut dengan rasa karamel yang kaya dan manis. Pudding ini seringkali disajikan dalam keadaan dingin setelah didinginkan di lemari es. Tekstur lembut puding yang dipadu dengan cita rasa karamel yang khas menciptakan paduan rasa yang memikat.', NULL, 3),
(29, 'kimchi', '8.000', '5', '666139f353f73.jpeg', 'Hidangan tradisional Korea yang terbuat dari sayuran fermentasi, biasanya kubis putih dan lobak, yang difermentasi dengan campuran bumbu pedas yang khas. Proses fermentasi memberikan kimchi rasa asam pedas yang kaya dan kompleks. Bumbu yang digunakan umumnya terdiri dari cabai bubuk, bawang putih, jahe, garam, dan kecap ikan. Kimchi sering kali disajikan sebagai lauk pendamping dalam hidangan Korea dan juga dapat dimasukkan ke dalam hidangan seperti kimchi fried rice atau kimchi stew untuk menambahkan rasa yang unik dan pedas. Kimchi dikenal karena manfaat kesehatannya sebagai makanan probiotik yang baik untuk pencernaan.', NULL, 1),
(30, ' Strawberry smoothie', '7.000', '4', '66613ab64b997.jpeg', 'Minuman nikmat dan menyegarkan dengan tekstur lembut serta semburan rasa manis dan tajam. Dibuat dengan stroberi segar atau beku, yogurt Yunani untuk menambah krim dan protein, dan sedikit susu atau jus untuk mencapai konsistensi yang diinginkan. Smoothie diblender hingga halus, menghasilkan minuman segar dan bergizi yang dapat dinikmati sebagai sarapan cepat atau camilan sehat. Stroberi adalah pilihan populer bagi mereka yang mencari minuman lezat dan bergizi yang memadukan kebaikan stroberi dengan kenyamanan smoothie.', NULL, 2),
(31, 'Ice chocolat', '5.000', '5', '66613b22529b8.jpeg', 'Minuman yang menggabungkan coklat dan es krim untuk menciptakan rasa yang manis dan lezat. Ini adalah pilihan yang sempurna untuk menjaga diri tetap sejuk dan memuaskan keinginan akan sesuatu yang manis. Minuman ini terbuat dari campuran susu cokelat dan es krim cokelat yang disajikan dengan es batu. Minuman ini adalah pilihan yang populer dan nikmat untuk dinikmati di hari yang panas atau kapan pun Anda menginginkan sesuatu yang manis dan menyegarkan.', NULL, 2),
(32, 'dessert', '10.000', '5', '66613be93dafc.jpeg', 'enak', NULL, 3),
(33, 'Pancake', '7.000', '5', '66613c8852187.jpeg', 'Hidangan yang terbuat dari adonan berbentuk datar dan bundar yang dipanggang atau digoreng. Adonan dasar pancake terdiri dari tepung terigu, telur, susu, dan bahan lainnya seperti gula, baking powder, dan sedikit garam. Pancake biasanya memiliki tekstur yang lembut dan sedikit renyah di bagian luar. Yang disajikan dengan toping strawberry dan whipped cream untuk memberikan rasa dan tampilan yang lebih menarik. Pancake sering kali menjadi hidangan sarapan yang populer, tetapi juga bisa dinikmati sebagai makanan penutup atau camilan di waktu lain. Kelezatan dan kesederhanaan pancake menjadikannya hidangan yang disukai oleh banyak orang di seluruh dunia.', NULL, 3),
(34, 'Macaroon', '7.000', '5', '66631cde731f5.jpeg', 'Hidangan penutup yang terbuat dari dua keping makaron yang diisi dengan krim atau ganache, kemudian disatukan menjadi satu. Makaron yang digunakan dalam dessert ini memiliki tekstur yang kenyal dan renyah di luar, sementara isian krim atau ganache memberikan rasa yang lembut dan kaya. Makaron sering kali memiliki berbagai varian rasa dan warna yang menarik, seperti cokelat, vanila, stroberi, lemon, kopi, dan masih banyak lagi. Selain itu, makaron juga sering dihias dengan berbagai topping seperti buah-buahan segar, kacang, atau serbuk permen untuk memberikan tampilan yang menarik dan tambahan rasa. Hidangan penutup yang elegan dan lezat, sering kali dianggap sebagai makanan penutup yang mewah. Kelezatan dan keindahan visualnya menjadikan dessert makaron populer di restoran-restoran mewah dan acara-acara khusus.', NULL, 3),
(35, 'Waffle', '6.000', '5', '66631d2b560f4.jpeg', 'Hidangan penutup yang terdiri dari wafel yang dipanggang dengan tekstur yang renyah di luar dan lembut di dalam. Wafel ini disajikan dengan berbagai macam topping dan eskrim untuk menambahkan rasa dan tampilan yang menarik. Waffle adalah pilihan makanan penutup yang terbaik. Kombinasi antara tekstur renyah wafel dan beragam topping yang lezat menjadikan waffle sebagai hidangan yang memuaskan dan cocok dinikmati di berbagai kesempatan.', NULL, 3),
(36, 'drink', '5.000', '4', '66631de168dd3.jpeg', 'segar', NULL, 2),
(37, ' Dirty Matcha', '7.000', '5', '66631e19c2323.jpeg', 'Minuman lembut dengan rasa teh hijau matcha yang khas. Ini berfungsi sebagai alternatif yang bagus untuk secangkir kopi biasa. Teh hijau dengan sempurna melengkapi rasa kopi yang sedikit asam dan pahit. Minuman ini dapat disajikan dingin maupun panas sehingga cocok bagi pecinta kopi maupun teh hijau.', NULL, 2),
(38, 'kong-gugsu', '9.000', '5', '6663203f86057.jpeg', 'Hidangan mie Korea yang terdiri dari mie gandum yang disajikan dalam kuah kaldu yang terbuat dari susu kedelai dan pasta kedelai. Hidangan ini sering disajikan dengan irisan mentimun, potongan tomat, dan potongan telur rebus sebagai hiasan. Kuah kaldu yang lembut dan kaya rasa ini memberikan cita rasa gurih dan kaya protein dari susu kedelai. Kong-guksu adalah hidangan yang populer di musim panas karena rasa segar dan lembutnya yang cocok untuk cuaca panas.', NULL, 1),
(39, 'food', '6.000', '4', '6663206197f56.jpeg', 'enak', NULL, 1),
(40, 'Mul naengmyeon', '8.000', '5', '666320835a2e6.jpeg', 'Hidangan mie dingin Korea yang disajikan dalam kuah kaldu dingin. Mie ini terbuat dari tepung buckwheat dan digarnis dengan irisan mentimun, irisan daging sapi rebus, telur rebus, dan potongan lobak. Kuah kaldu yang digunakan terbuat dari kaldu daging sapi yang disajikan dingin dengan tambahan mustard, cuka, dan gula untuk memberikan rasa yang segar dan asam. Mul naengmyeon sering disajikan dengan es batu untuk menjaga suhu hidangan tetap dingin dan menyegarkan. Hidangan ini populer di musim panas karena kesegarannya dan merupakan pilihan makanan yang cocok untuk cuaca panas.', NULL, 1),
(41, 'Samgyetang', '10.000', '5', '6663209bd869c.jpeg', 'Hidangan sup ayam Korea yang disajikan dengan ayam utuh yang diisi dengan beras ketan, bawang putih, dan jahe. Sup ini kemudian direbus dalam kuah kaldu yang kaya rasa hingga ayam menjadi lembut dan bumbu meresap. Samgyetang sering disajikan panas dan diberi taburan wijen di atasnya. Hidangan ini sering disajikan sebagai makanan musim panas karena dipercaya dapat membantu mengatasi panas tubuh dan meningkatkan stamina. Samgyetang memiliki rasa gurih, hangat, dan lezat yang membuatnya menjadi hidangan yang populer di Korea.', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_User` int NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_User`, `username`, `password`, `role`) VALUES
(7, 'admin', '$2y$10$iXgt/jRkDKADXRLabrBxQeMaA61H22hVF.3varRamNwKpdhANg9fq', 'admin'),
(8, 'user', '$2y$10$wF6HK2ja169U6frp8TgEUeWel84k/jYP37aionhyM/G/98LSy8Xf.', 'user'),
(9, 'rajaiblis', '$2y$10$4Mkjc7xAYt2Z1KtUlgzvUOhoZQoLxVGXFHEKW65/6KrT1TeQ9JoTC', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `fk_menu_user` (`id_User`),
  ADD KEY `fk_menu_kategori` (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_User` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_menu` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
