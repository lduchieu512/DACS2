-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2021 at 04:50 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `email`, `password`, `role`, `active`, `image`, `created_at`, `updated_at`) VALUES
(1, 'hohuuvinh', 'vinhhofb@gmail.com', '$2b$10$Qp5/0ahsy3JGC3n152MJNOMuobpixAzD.tQDlh8gUi5m58xs0Ch2a', 1, 1, '1.jpg', '2021-02-04 10:40:09', '2021-02-04 10:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_analytic`
--

CREATE TABLE `tbl_analytic` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_analytic`
--

INSERT INTO `tbl_analytic` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'total_rental', 24, '2021-02-18 11:39:04', '2021-02-07 03:43:07'),
(2, 'total_return', 6, '2021-02-04 11:39:21', '2021-02-04 11:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `price` float DEFAULT NULL,
  `type` int(11) DEFAULT 1,
  `category` int(11) DEFAULT NULL,
  `quanlity` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `total_rental` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`id`, `name`, `note`, `price`, `type`, `category`, `quanlity`, `active`, `image`, `total_rental`, `created_at`, `updated_at`) VALUES
(1, 'Changing Life With Arithmetic Multiplication', 'The book Changing Life with Anthropology is a work developed by Mrs. Le Do Quynh Huong from the original work \"The Complete Book of Numerology\" by Dr. David A. Phillips, making the subject of Anthropology originate at home. Pythagoras\' mathematics became closer and easier to understand with Vietnamese readers.\r\n\r\nIn early 2020, a series of programs \"Change your life with the Arithmetic\" of the familiar editor and host in Vietnam Le Do Quynh Huong was born on Youtube, with the aim of sharing knowledge, helping everyone. people who learn and develop, perfect themselves, and social relationships through the Department of Arithmetic. The show has received positive love and feedback from many viewers and readers after each broadcast episode.\r\n\r\nArithmetic is a study of the relationship between birthdays numbers, names and lives, destiny, life paths and personalities. This subject was initiated 2,600 years ago by mathematician Pythagoras and has been continuously inherited and developed by many generations of students.', 170000, 1, 1, 5, 1, '1.jpg', 9, '2021-02-04 10:34:06', '2021-02-04 10:34:06'),
(2, 'Kimetsu No Yaiba - Episode 21: Farewell Memory - [Limited Edition] - With a Poster', 'The toughest war with the Most Venerable is finally coming to an end !! After a strenuous victory, the cost was too great… On the other hand, deep inside the Infinite city, the ancestor of the demon -Kibutsuji Muzan - had begun to act…! What will Tanjiro do… !?\r\nHello everyone, this is Gotouge! The year 2020 begins with a lot of bad news and a long blockade, how did people get over it? Ever since the series was published, no day has been without trouble for me. Although my heart was broken, I reinforced it with tape and continued on this journey. I think your everyday life is the same. Although there is no specific enemy, every day everyone tries and tells themselves that not to lose and overcome their own difficulties, that is enough to become a hero. Please motivate and reward yourself with worthy gifts!', 220000, 1, 2, 4, 1, '2.jpg', 6, '2021-02-04 10:36:55', '2021-02-06 14:11:19'),
(3, 'Blue Bird Flying Back - Special Edition Printed Only Once - Hardcover - Included 6 Postcards', 'Unlike previous works set in the Central countryside full of pure and simple childhood memories with characters at puberty, in this new book, writer Nguyen Nhat Anh is set. The main scene is Saigon - Ho Chi Minh City where the author lives (as a tribute to the land in the South). The main characters in the story are also \"bigger\", with arduous and challenging career stories of ambitious young students. Of course, it is indispensable to love touching, dramatic and unexpected love stories that make readers bewildered, laughed out loud. And as in all Nguyen Nhat Anh works, kindness and inclination are still important points in this new book.', 250000, 1, 1, 6, 1, '3.jpg', 0, '2021-02-03 08:55:44', '2021-02-04 08:55:44'),
(4, 'Many Times, Many Lives - Small Size', 'Professor John Vu - Nguyen Phong and unprecedented stories about his past lives, discovering the Law of Cause and Effect, Reincarnation.\r\n\r\n\"Lifetime of life\" is a work written by Professor John Vu - Nguyen Phong in 2017 and completed in early 2020, recording strange past life stories and experiences from many lives of a longtime confidant. Mr. Thomas - a famous financial businessman in New York. These unrevealed stories will help people all over the world to contemplate and explore the laws of the Law of Cause and Effect and Reincarnation of the universe in the midst of daily disasters, upheavals and crises. .\r\n\r\n\"Lifetime of life\" is a big picture with countless pieces of life, is a huge, vivid film about mysterious lives, stretching from the mighty Atlantis civilization to the ancient kingdom of Egypt. of the mighty Pharaohs, to the United States of America today.\r\n\r\n\"All lifetimes of life\" offers readers new, endless knowledge of humanity revealed for the first time, along with scholarly analysis, unexpected predictions about the present and future world of sages. wise philosophy. Human life seemed very long but passed very quickly, prosperity and death, fragile like water waves. The law of cause and effect is extremely precise, detailed and complex, collected over many generations, many lives, and interrelated relationships, no one can calculate this virtue, can you subtract the other karma? , no one can know when the cause will bear fruit. But, once cause has been caused, it will surely reap the results - the Law of Cause and Effect of the universe has never been wrong.\r\n\r\nThe Law of Reincarnation and Cause and Effect create conditions for one person to meet another. Meeting sometimes is predestined, sometimes it\'s debt; Meeting sometimes to pay debts, sometimes to reconnect old conditions. There are so many things going on in life, seemingly coincidental but actually arranged in advance. Reincarnation is a large school where all humans, all creatures have to learn their own lessons until they are perfect. If you do not learn or have not learned completely, you must repeat it, exactly according to the law of Cause and Effect.\r\n\r\nThomas shared why he told these mysterious private stories with Professor John Vu to make his work \"Lives of Life\":\r\n\r\n “Right now the world is going through a period of turmoil and turmoil, in fact, every country is suffering from the karma they caused in the past. Each nation, as well as every individual, has its own karmic effects caused by the causes that they have caused. Personally, there is ‘individual career’, but country there ‘karma’ that all people living in it have to pay.\r\n\r\nUsually people, when they act, few people think about the consequences, but once the consequences happen, what do they think, do? Do they resent, blame heaven, blame the earth, and blame those around them for causing those consequences? How many people can contemplate, blame themselves and change?\r\n\r\nI hope we - tiny, fluttering butterflies can also create powerful hurricanes to wake people up.\r\n\r\nThe future of each human being, every organization, each country and the whole planet will be like in the coming period depending on the behavior, recognition and awakening of each individual, each organization, each of which makes up. If you want to change, you need to start with the awareness, transformation of mind, spreading love and sharing knowledge from each of us first.\r\n\r\nCausality do not wait to see to believe.\r\n\r\nCause and effect is the signpost, helping people find the truth \"\r\n\r\nThe book is published in Vietnamese before transferring the copyright to other countries around the world.\r\n\r\nAbout the author\r\n\r\nThe author Nguyen Phong (Vu Van Du) studied abroad in the US since 1968, graduated with a master\'s degree in Biology and Computing. He used to be Chief Engineer, CIO of Boeing Corporation of America, Director of the Institute of Biotechnology, Carnegie Mellon University. He is known as Professor John Vu - a prestigious information technology scientist. , CMMI and has taught in many universities around the world.\r\n\r\n Nguyen Phong is the pseudonym of the cultural and spiritual books translated and adapted from the experience, subconscious mind and the process of researching and discovering Eastern spiritual values. He wrote an adaptation of the immortal work Journey to the East at the age of 24 (1974). Other works of Nguyen Phong have been loved by readers for generations: Bright Jade in the Lotus, By Snow Mountain, Lotus in the Snow, Flowers on the Water Wave, Magic and the Tibetan Taoists, Back from Land of snow, Back from the light realm, Wisdom in life, Road of clouds through snow, Footprints on sand, Road of clouds in the land of dreams, Road of clouds on land ... and a set of books for students and teachers: Khoi Practice, Connect, Step out to the world, Create a preeminent Vietnamese generation, Prof. John Vu and advice for teachers, Professor John Vu and advice for parents.', 230000, 1, 1, 4, 1, '4.jpg', 0, '2021-02-17 08:58:18', '2021-02-07 03:43:31'),
(5, '10 Reveals About Love', 'We all crave love and emotional relationships more than anything and constantly look for that special relationship. So why do so many people live in solitude, searching, hoping, but rarely finding? If everyone yearns for love so much, why has the divorce rate and family breakdown reached record numbers? Why do many single mothers and fathers struggle to build their own homes? Why are so many people feeling lonely and lost in a densely populated city? Are we looking for love in the wrong place?\r\n\r\nContrary to popular belief, love is not the result of fate or luck, much less something we enter or step out of. Love is something we create ... and everyone has the ability to create love. We can all love and be loved and build relationships. Whatever our current circumstances - living in solitude or in an unhappy relationship - life can change and we have the capacity to change our life completely.\r\n\r\nUnlike most of the other parables, many of the characters in book 10 \"Revelations\" About Love are based on real people, even though of course their names have been changed. The book contains timeless secrets of wisdom and love.\r\n\r\nThe book contains a simple yet powerful message: we all have the power to not only love, but to have full love!\r\n\r\n10 \"Disclosures\" About Love tells the story of a lonely young man who, after accidentally meeting a mysterious Chinese old man, begins his journey to find love.\r\n\r\n10 “Revealing” about Love is in the best-selling book worldwide, including: 10 “Revealing” about Health, 10 “Revealing” About Love, 10 “Revealing” About Happiness and 10 “Revealing” The Eyelid ”About Wealthy.\r\n\r\n10 Love\'s “Reals” has been translated into more than 30 languages ​​and has changed the lives of countless readers around the world.', 150000, 1, 1, 1, 1, '5.jpg', 0, '2021-02-05 09:03:20', '2021-02-06 14:10:25'),
(6, 'Teen Secrets to Success', 'If you are in an immature age, or have gone through this age, you will surely agree that this is a period where we have a lot of problems with family, school and life: what are the problems With friends, extracurricular activities take up too much time, homework is piled up, extra lessons like running \"number\", even problems with siblings in the house, disagreeing with parents ...\r\n\r\nThere is good news for you: If you apply the right methods, you will quickly overcome current challenges, turning your challenging teenage days into a stage of great success. in study, family and life. Do you want yourself to: Balance learning, play and family effectively? Be in the top of the best students in school? Know how to turn parents into allies? Motivate yourself whenever you feel lazy? Make easy and well-known friends at school? Confidently face any challenge in your family. Life? Make wise decisions? These desires may sound \"difficult\" but are actually extremely simple when you have in hand the book Secrets of Teen Success by two famous authors. Adam Khoo and Gary Lee. Continuing the proven learning methods in I Am Gifted, So Are You! - a record book published with more than 200,000 copies sold and considered an educational phenomenon in Vietnam in 2009-2011, The Secret of Teen Success focuses on other important aspects of young people like: how to get along with parents, make friends with good friends, love yourself, ... help you to create a solid foundation in all fields. The Teen Congregation will not only make your life easier, but also enable you to reap outstanding results on whatever path you choose. My teenage years are not only the best years but also the successful years, guys!\r\n\r\nAre you ready to make Miracles for your teen?', 52000, 1, 1, 1, 1, '6.jpg', 0, '2021-02-05 09:04:47', '2021-02-05 09:04:47'),
(7, '10 Revelations About Wealth', 'It has been 17 years since the 10 Rich-Sang Revelations were first published in the UK. Since then, the book has been translated and published in more than 30 languages ​​with more than 90 reprints in several languages ​​and has changed the lives of countless readers around the world.\r\n\r\nNothing is more valuable than the pursuit of wealth, for the pursuit of wealth is the pursuit of strength. It is about adding value to other people\'s lives and through which we also add value to our own. Wealthy 10 “Revelation” gives you the tools you need to create a rich life. The stories in this book are based on real people.\r\n\r\n10 “Revelations” About Wealthy contains timeless secrets of wisdom and wealth. The book contains a simple yet powerful message: we all have the power to become not only rich, but full of riches!\r\n\r\n10 Rich Sang\'s \"Disclosures\" tells the story of a young man who is in debt and is in bad luck and has begun his journey to find wealth. Accidentally met a mysterious Chinese old man, the young man was \"given the way\" to 10 special people, each holding a secret in his hand.\r\n\r\n10 \"Revelations\" About Wealthy in the global bestseller series include: 10 \"Reveals\" about Health, 10 \"Riddles\" About Love, 10 \"Reveals\" About Happiness and 10 \"Reveals\" The Eyelid ”About Wealthy.', 43000, 1, 1, 1, 1, '7.jpg', 0, '2021-02-05 09:05:40', '2021-02-05 09:05:40'),
(8, '10 Health Disclosures', 'All of us want to be healthy, but why are so few truly healthy? Why in spite of the advances of modern medicine, the developments in the pharmaceutical business and a variety of dietary supplements, diseases such as cancer, heart disease, obesity, asthma and anxiety disorders Europe has been raging over the decades? Are we looking for ways to live well in the wrong place?\r\n\r\nMedicine is not something that can guarantee your long-term health. Nor can we rely on juices or machines to stay healthy. Each of us is responsible for our own health and that of our children, and we are not only healthy, but also healthy. Perfect Health is not just a state of not being sick - many people who have no illness in their body but feel tired, lethargic and exhausted - but a state of happiness, full of energy. Quality and vitality allow us to live our full lives.\r\n\r\n10 Health “Reveals” contains the timeless secrets of Full Health. The story is about a young man suffering from a terminal illness who begins his journey to find his health again.\r\n\r\nAccidentally met a mysterious Chinese old man, the young man was \"guided the way\" to 10 special people, each holding a secret. These secrets are the 10 Laws of the Universe that govern everything in Nature and Life. Hidden in these Rules are the secrets of Perfect Health.\r\n\r\nHealth\'s 10 “Revelation” is a unique and inspiring book that has changed the lives of countless readers around the world.\r\n\r\n10 Health “Disclosures” has been translated into more than 30 languages. This book is part of a global bestseller series that includes: 10 \"Reveals\" about Health, 10 \"Reveals\" About Love, 10 \"Reveals\" About Happiness and 10 \"Reveals\" About Wealth.', 50000, 1, 1, 1, 1, '8.jpg', 0, '2021-02-05 09:08:15', '2021-02-05 09:08:15'),
(9, '10 Paradoxes of Life (2019 Edition)', '\"Our lives always have paradoxes - brave and noble people always accept and overcome them.\"\r\n\r\nFamous work Anyway - 10 paradoxes of life by Dr. Kent Keith has become a classic book and loved by readers around the world about the unique and frank about life experiences. The book has been continuously voted one of the best-selling works for many years and has been translated into many languages.\r\n\r\nThe most special feature of Anyway is the profound and practical meaning of the work that has influenced many different audiences, bringing the necessary tranquility to think about a noble way to live fully. Author Kent Keith is a concrete and authentic proof of this way of life. He wrote and devoted his life to supporting those truths.', 150000, 1, 1, 1, 1, '9.jpg', 0, '2021-02-05 09:09:46', '2021-02-05 09:09:46'),
(10, '100 Touching Stories About Friendship', 'For children, time will bring maturity. In the process of growing up there are many joys as well as sadness. That is a life. But every little girl in too mature has things to touch others. In childhood, if the children do not have things to touch people\'s hearts, it will be like a dish lacking in spices.\r\n\r\nReading the book 100 Touching Stories of Friendship, we not only feel many fascinating details, but also feel the emotions from the characters. Each story has different characters, different lives. When we read the story, it feels like we enter the world of that story. When we read magic stories, we feel more attractive and interesting.\r\n\r\nThis is a book for elementary school students. The stories all delight the children. Hope these stories will bring you more fun! The book content will also guide you on your way to adulthood! It will bring a lot of noble love to you !.', 120000, 1, 1, 1, 1, '10.jpg', 0, '2021-02-05 09:16:08', '2021-02-05 09:16:08'),
(13, 'Detective Conan - Episode 98', 'Sera Masumi continues to probe Haibara Ai and is in a position to confront Okiya Subaru!\r\n\r\nMeanwhile, Conan has come close to the idea of the \"little sister in the territory\" - Mary ... !?\r\n\r\nHaneda Shukichi unexpectedly met his murder at a shogi group lesson!\r\n\r\nThe case happened suddenly with many turning points, and finally, Akai Shuichi appeared… !? Not stopping there, episode 98 also brings to the case of a maid\'s decryption case, where the crime race between Conan and Heiji has begun with Ooka Momiji\'s scheme !!', 53000, 1, 2, 1, 1, '1480282991.PNG', 1, '2021-02-05 17:23:15', '2021-02-07 03:18:51'),
(14, 'Wonderful World Of Animals - Starfish And Crab (Level 2)', 'Wonderful World Of Animals - Starfish And Crab (Level 2)\r\n\r\nThe wonderful world of animals is a collection of fantasy stories based on real animals. The series uses stories as a bridge to help children learn about animals and gain information about them. With simple language presentations, eye-catching images, the book combines reading, learning and imagination of students. Each book is the perfect method for your child to read and shine!\r\n\r\nRead And Shine\r\n\r\nRead and shine is an effective reading program categorized by age. This program offers stories with a variety of themes including condensed classics such as: Fairy, mythology as well as animal stories. The books include activities before reading, after reading.', 25000, 1, 25, 1, 1, '982143597.PNG', 2, '2021-02-05 17:25:28', '2021-02-07 03:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Life skills', 1, '2021-02-04 10:39:16', '2021-02-04 10:39:16'),
(2, 'Comic', 1, '2021-02-04 10:39:37', '2021-02-04 10:39:37'),
(3, 'Arts & Music', 1, '2021-02-05 17:13:38', '2021-02-05 17:13:38'),
(4, 'Biographies', 1, '2021-02-05 17:13:38', '2021-02-05 17:13:38'),
(5, 'Business', 1, '2021-02-05 17:14:04', '2021-02-05 17:14:04'),
(6, 'Computers & Tech', 1, '2021-02-05 17:14:04', '2021-02-05 17:14:04'),
(7, 'Cooking', 1, '2021-02-05 17:14:04', '2021-02-05 17:14:04'),
(8, 'Edu & Reference', 1, '0000-00-00 00:00:00', '2021-02-05 17:14:04'),
(9, 'Entertainment', 1, '2021-02-05 17:14:04', '2021-02-05 17:14:04'),
(10, 'Health & Fitness', 1, '2021-02-05 17:14:04', '2021-02-05 17:14:04'),
(11, 'History', 1, '2021-02-05 17:14:04', '2021-02-05 17:14:04'),
(12, 'Hobbies & Crafts', 1, '2021-02-05 17:14:04', '2021-02-05 17:14:04'),
(13, 'Home & Garden', 1, '2021-02-05 17:14:04', '2021-02-05 17:14:04'),
(14, 'Horror', 1, '2021-02-05 17:14:04', '2021-02-05 17:14:04'),
(15, 'Kids', 1, '2021-02-05 17:16:58', '2021-02-05 17:16:58'),
(16, 'Literature & Fiction', 1, '2021-02-05 17:16:58', '2021-02-05 17:16:58'),
(17, 'Medical', 1, '2021-02-05 17:17:47', '2021-02-05 17:17:47'),
(18, 'Mysteries', 1, '2021-02-05 17:17:47', '2021-02-05 17:17:47'),
(19, 'Parenting', 1, '2021-02-05 17:17:47', '2021-02-05 17:17:47'),
(20, 'Religion', 1, '2021-02-05 17:17:47', '2021-02-05 17:17:47'),
(21, 'Romance', 1, '2021-02-05 17:17:47', '2021-02-05 17:17:47'),
(22, 'Sci-Fi & Fantasy', 1, '2021-02-05 17:17:47', '2021-02-05 17:17:47'),
(23, 'Science & Math', 1, '2021-02-05 17:17:47', '2021-02-05 17:17:47'),
(24, 'Self-Help', 1, '2021-02-05 17:17:47', '2021-02-05 17:17:47'),
(25, 'Social Sciences', 1, '2021-02-05 17:17:47', '2021-02-05 17:17:47'),
(26, 'Sports', 1, '2021-02-05 17:17:47', '2021-02-05 17:17:47'),
(27, 'Teen', 1, '2021-02-05 17:20:03', '2021-02-05 17:20:03'),
(28, 'Travel', 1, '2021-02-05 17:20:03', '2021-02-05 17:20:03'),
(29, 'True Crime', 1, '2021-02-05 17:20:37', '2021-02-05 17:20:37'),
(30, 'Westerns', 1, '2021-02-05 17:20:37', '2021-02-05 17:20:37'),
(31, 'other', 1, '2021-02-05 17:21:17', '2021-02-05 17:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rental`
--

CREATE TABLE `tbl_rental` (
  `id` int(11) NOT NULL,
  `idbook` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `from_date` datetime DEFAULT NULL,
  `to_date` datetime DEFAULT NULL,
  `idadmin` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rental`
--

INSERT INTO `tbl_rental` (`id`, `idbook`, `iduser`, `note`, `from_date`, `to_date`, `idadmin`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ok', '2021-02-04 10:41:06', '2021-02-20 00:00:00', 1, 0, '2021-02-04 10:41:06', '2021-02-06 13:49:14'),
(2, 2, 1, 'ok', '2021-02-04 10:41:54', '2021-02-05 00:00:00', 1, 1, '2021-02-04 10:41:54', '2021-02-06 13:38:47'),
(3, 2, 8, 'fd', '2021-02-10 00:00:00', '2021-02-25 00:00:00', 1, 1, '2021-02-05 20:58:04', '2021-02-06 13:38:52'),
(4, 2, 1, 'sđssdsdsđs', '2021-02-19 00:00:00', '2021-02-24 00:00:00', 1, 0, '2021-02-05 20:59:10', '2021-02-06 14:11:18'),
(5, 7, 8, 'ghh', '2021-02-18 00:00:00', '2021-02-26 00:00:00', 1, 1, '2021-02-05 21:06:06', '2021-02-06 04:29:59'),
(7, 5, 1, '42hhb', '2021-02-11 00:00:00', '2021-02-11 00:00:00', 1, 0, '2021-02-05 21:11:23', '2021-02-06 04:12:54'),
(8, 8, 14, 'gfcdgf', '2021-02-18 00:00:00', '2021-02-19 00:00:00', 1, 0, '2021-02-05 21:31:37', '2021-02-06 04:12:44'),
(9, 5, 13, 'ok', '2021-02-09 00:00:00', '2021-02-19 00:00:00', 1, 0, '2021-02-06 10:58:23', '2021-02-06 04:13:24'),
(10, 5, 8, 'dđfdf', '2021-02-11 00:00:00', '2021-02-10 00:00:00', 1, 0, '2021-02-06 21:07:52', '2021-02-06 14:58:28'),
(11, 4, 12, 'ok', '2021-02-12 00:00:00', '2021-02-25 00:00:00', 1, 0, '2021-02-07 09:54:40', '2021-02-07 03:43:31'),
(12, 14, 1, 'hg', '2021-02-19 00:00:00', '2021-02-18 00:00:00', 1, 0, '2021-02-07 09:57:05', '2021-02-07 03:43:28'),
(13, 14, 12, 'vnn', '2021-02-12 00:00:00', '2021-02-11 00:00:00', 1, 1, '2021-02-07 10:15:05', '2021-02-07 10:15:05'),
(14, 13, 14, 'vhhj', '2021-02-19 00:00:00', '2021-02-19 00:00:00', 1, 1, '2021-02-07 10:18:51', '2021-02-07 10:18:51'),
(15, 16, 1, 'ok', '2021-02-07 00:00:00', '2021-02-24 00:00:00', 1, 1, '2021-02-07 10:43:07', '2021-02-07 03:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `passport` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT 1,
  `total_rental` int(11) DEFAULT 0,
  `total_return` int(11) DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `passport`, `name`, `address`, `phone`, `image`, `active`, `total_rental`, `total_return`, `created_at`, `updated_at`) VALUES
(1, 201783899, 'ho huu vinh', 'california', '0799438990', '1.jpg', 1, 2, 1, '2021-02-04 10:32:25', '2021-02-04 10:32:25'),
(8, 44554555, 'rrrtrddd', 'Da nang', '0434545454', '1544650552.PNG', 1, 0, 0, '2021-02-05 12:21:30', '2021-02-05 11:16:15'),
(12, 202838383, 'fdffdfdfdfd', 'gfgfgg', '0799438999', '1816063450.jpg', 1, 0, 0, '2021-02-05 21:26:33', '2021-02-05 21:26:33'),
(13, 43435454, 'fdff', 'gffg', '0799438999', '367057124.jpg', 1, 0, 0, '2021-02-05 21:29:55', '2021-02-05 21:29:56'),
(14, 43435454, 'fdff', 'gffg', '0799438999', '1847913860.jpg', 1, 0, 0, '2021-02-05 21:30:37', '2021-02-05 21:30:37'),
(15, 54455454, 'fd df', 'gffg', '0799438999', 'avatarDefault.jpg', 1, 0, 0, '2021-02-05 21:31:02', '2021-02-05 21:31:02'),
(16, 353535355, 'test user', 'dffdfdfd', '3333333333', '2031060753.jpg', 1, 0, 0, '2021-02-07 10:44:58', '2021-02-07 10:44:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_analytic`
--
ALTER TABLE `tbl_analytic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rental`
--
ALTER TABLE `tbl_rental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_analytic`
--
ALTER TABLE `tbl_analytic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_rental`
--
ALTER TABLE `tbl_rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
