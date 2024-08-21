-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 04:24 PM
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
-- Database: `myblog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `image`, `date`, `role`) VALUES
(2, 'M_Abeer_Ansari', 'muhammadabeeransari@gmail.com', '$2y$10$ksQKaTPbEM1W4zOZJLGbOuWahE8OrvTZQFLWcqiFeObZOPDEjhUAe', 'uploads/1707398654my-image.jpg', '2024-02-05 09:54:38', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `disabled` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `slug`, `disabled`) VALUES
(8, 'Travel', 'travel', 0),
(9, 'Lifestyle', 'lifestyle', 0),
(10, 'Technology', 'technology', 0),
(11, 'Food and Cooking', 'food-and-cooking', 0),
(12, 'Personal Finance', 'personal-finance', 0),
(14, 'DIY and Crafts', 'diy-and-crafts', 0),
(15, 'Book and Movie Reviews', 'book-and-movie-reviews', 0),
(18, 'Home Decor', 'home-decor', 1),
(19, 'Photography', 'photography', 1),
(20, 'Gaming', 'gaming', 1),
(21, 'Environmental Sustainability', 'environmental-sustainability', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `content`, `image`, `date`, `slug`) VALUES
(15, 2, 8, 'Discovering the World', '<p><span style=\"background-color: var(--bs-body-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Welcome to my travel diary, where each page is filled with the colors, sounds, and memories of the incredible places I\'ve had the privilege to explore. Join me on a journey around the world as I share the highs, lows, and everything in between. Whether you\'re a seasoned globetrotter or an armchair traveler, this blog is your passport to vicarious adventures and travel inspiration:</span><br></p><p><b>1. Bali Bliss: Embracing the Island Spirit</b></p><p>In this post, I\'ll take you on a virtual tour of Bali, Indonesia. From the serene beaches of Uluwatu to the lush rice terraces of Tegallalang, discover the magic of the Island of the Gods. I\'ll share my favorite spots, cultural insights, and tips for navigating the bustling markets.</p><p><br></p><p><b>2. European Escapade: A Backpacker\'s Guide</b></p><p>Embark on a European adventure with me as I recount my backpacking journey through iconic cities like Paris, Rome, and Barcelona. Learn how to make the most of your budget, find hidden gems off the beaten path, and immerse yourself in the rich history and diverse cultures of the Old Continent.</p><p><br></p><p><b>3. Safari Serenity: Exploring the Wilderness of Africa</b></p><p>Experience the thrill of a safari through my eyes as we venture into the heart of Africa. From the majestic Serengeti to the awe-inspiring Victoria Falls, this post will showcase the beauty of the continent\'s wildlife, landscapes, and the unique cultural tapestry that makes Africa a must-visit destination.</p><p><br></p><p><b>4. Asian Adventures: From Tokyo\'s Neon Lights to the Temples of Kyoto</b></p><p>Join me on a captivating journey through Japan, where modernity meets tradition. Explore the bustling streets of Tokyo, savor the tranquility of Kyoto\'s temples, and indulge in the country\'s culinary delights. I\'ll share practical tips for navigating Japan\'s efficient transportation system and embracing its cultural nuances.</p><p><br></p><p><b>5. South American Sojourn: From Machu Picchu to the Amazon Rainforest</b></p><p>In this post, I\'ll recount my expedition through the breathtaking landscapes of South America. Discover the ancient wonders of Machu Picchu, navigate the Amazon River, and immerse yourself in the vibrant cultures of countries like Peru and Brazil. I\'ll offer insights into responsible travel practices in ecologically sensitive areas.</p><p><br></p><p><b>Conclusion:</b></p><p>Whether you\'re an avid traveler or someone dreaming of their next getaway, I hope this blog series inspires you to embark on your adventures. Travel is not just about the places we visit but the stories we collect along the way. Stay tuned for more tales from around the globe, and may your wanderlust be forever ignited!</p>', 'uploads/1707401141ce-travel.jpg', '2024-02-08 19:05:41', 'discovering-the-world'),
(16, 2, 9, 'Navigate Mosaic of Lifestyle', '<p><span style=\"background-color: var(--bs-body-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Welcome to the intersection of health, fashion, personal development, and all things lifestyle! In this blog series, I invite you to explore the diverse facets of living well. From cultivating a positive mindset to embracing the latest fashion trends, join me on this journey toward a vibrant and fulfilling lifestyle:</span></p><p>1. Mindful Mornings: A Guide to Establishing a Morning Routine</p><p>In this post, I\'ll delve into the importance of morning routines and share practical tips on creating a mindful start to your day. From meditation practices to energizing breakfast ideas, discover how a well-crafted morning routine can set a positive tone for the rest of your day.</p><p><br></p><p>2. Fashion Forward: Navigating Seasonal Trends</p><p>Explore the world of fashion with me as we dissect the latest trends and discuss how to incorporate them into your style. Whether you\'re a trendsetter or prefer timeless classics, this post will offer insights into building a versatile wardrobe that aligns with your taste.</p><p><br></p><p>3. The Art of Self-Care: Nurturing Your Body and Soul</p><p>In this wellness-focused post, I\'ll share tips and techniques for practicing self-care. From skincare routines to mindfulness practices, learn how to prioritize your well-being and create a balanced and fulfilling lifestyle.</p><p><br></p><p>4. Goal Setting 101: Turning Dreams into Achievable Milestones</p><p>Embark on a journey of personal development as we explore the art of goal setting. I\'ll provide practical strategies for defining and achieving your aspirations, whether they\'re related to career growth, fitness, or personal relationships.</p><p><br></p><p>5. The Power of Positive Habits: Cultivating a Productive Lifestyle</p><p>Delve into the science of habits and discover how small changes in your daily routine can lead to significant improvements in productivity and overall well-being. From time management techniques to habit-building strategies, this post will guide you towards a more efficient and fulfilling lifestyle.</p><p><br></p><p>Conclusion:</p><p>Living well is an ongoing journey, and I\'m excited to be your companion on this exploration of lifestyle choices. Whether you\'re seeking inspiration for fashion, wellness, or personal growth, this blog series aims to provide practical tips and insights to enhance your daily life. Stay tuned for more discussions on creating a life that aligns with your values and brings you joy!</p>', 'uploads/1707401283healthy-habits.jpg', '2024-02-08 19:08:03', 'navigate-mosaic-of-lifestyle'),
(17, 2, 10, 'Navigating the Digital Frontier', '<p><span style=\"background-color: var(--bs-body-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Welcome to the ever-evolving world of technology! In this blog series, we\'ll embark on a journey through the digital landscape, exploring the latest gadgets, software innovations, and tech trends that are shaping our future. Whether you\'re a tech enthusiast or just curious about the digital realm, join me as we navigate the exciting and dynamic world of technology:</span><br></p><p><br></p><p>1. Unveiling the Latest Tech Gadgets: A Review Extravaganza</p><p>In this post, I\'ll provide hands-on reviews and insights into the hottest gadgets on the market. From smartphones to smart home devices, stay updated on the latest releases and discover how these technological marvels can enhance your daily life.</p><p><br></p><p>2. The Rise of Artificial Intelligence: Impact on Industries and Everyday Life</p><p>Explore the transformative power of artificial intelligence (AI) in this post. We\'ll discuss how AI is revolutionizing industries, from healthcare to finance, and delve into the ethical considerations surrounding the integration of AI into our daily lives.</p><p><br></p><p>3. Cybersecurity 101: Protecting Yourself in the Digital Age</p><p>In a world dominated by digital connectivity, cybersecurity is more important than ever. Learn about the latest cybersecurity threats, practical tips for protecting your online identity, and how to navigate the digital landscape safely.</p><p><br></p><p>4. The Future of Virtual and Augmented Reality: Beyond Gaming</p><p>Immerse yourself in the world of virtual and augmented reality (VR/AR). From gaming to practical applications in healthcare and education, discover how these technologies are reshaping our experiences and creating new possibilities.</p><p><br></p><p>5. Sustainable Tech: Navigating the Green Side of Innovation</p><p>In this post, we\'ll explore the intersection of technology and sustainability. Learn about eco-friendly innovations, from energy-efficient devices to sustainable tech practices, and how the tech industry is contributing to a greener and more sustainable future.</p><p><br></p><p>Conclusion:</p><p>As we navigate the digital frontier together, I hope this blog series provides you with valuable insights into the ever-evolving world of technology. From the latest gadgets to futuristic innovations, stay tuned for in-depth discussions on how technology is shaping our lives and influencing the way we connect, work, and play in the 21st century.</p>', 'uploads/1707401398tech.jpg', '2024-02-08 19:09:58', 'navigating-the-digital-frontier'),
(18, 2, 11, ' A Journey Through Flavors', '<p><span style=\"background-color: var(--bs-body-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Welcome to a delectable journey through the world of food and cooking! In this blog series, we\'ll explore the art of culinary creation, from mouthwatering recipes to the cultural significance of different cuisines. Whether you\'re a seasoned chef or a kitchen novice, join me as we embark on a flavorful adventure that will tantalize your taste buds and inspire your inner foodie:</span><br></p><p><br></p><p>1. Global Gastronomy: Exploring Cuisines from Around the World</p><p>Embark on a virtual world tour as we explore the diverse and rich tapestry of global cuisines. From the spicy delights of Indian curry to the comforting flavors of Italian pasta, each post will delve into the unique ingredients, techniques, and cultural stories behind these delicious dishes.</p><p><br></p><p>2. Kitchen Diaries: Tried and True Recipes from My Culinary Adventures</p><p>In this series, I\'ll share some of my favorite tried-and-true recipes that have become staples in my kitchen. From hearty soups to decadent desserts, each recipe will come with step-by-step instructions, tips, and personal anecdotes that bring the joy of cooking to life.</p><p><br></p><p>3. Cooking for Beginners: Simple Recipes for Kitchen Confidence</p><p>If you\'re a beginner in the kitchen, fear not! This post is dedicated to providing easy-to-follow recipes and essential cooking tips that will boost your confidence in the kitchen. Start your culinary journey with simple yet delicious dishes that anyone can master.</p><p><br></p><p>4. Seasonal Delights: Embracing the Flavors of Each Season</p><p>Discover the magic of cooking with seasonal ingredients. From spring\'s fresh produce to winter\'s hearty comfort foods, I\'ll guide you through creating dishes that celebrate the unique flavors and textures of each season.</p><p><br></p><p>5. Culinary Adventures: Dining Out and Exploring Food Festivals</p><p>Step outside the kitchen and join me on culinary adventures as we explore the best restaurants, food markets, and festivals. From street food delights to Michelin-starred experiences, these posts will offer recommendations and insights into the vibrant world of dining out.</p><p><br></p><p>Conclusion:</p><p>As we embark on this flavorful journey together, I hope this blog series becomes a source of inspiration for your culinary adventures. Whether you\'re a passionate home cook or someone who simply enjoys savoring delicious food, stay tuned for a variety of posts that celebrate the joy and creativity found in the world of cooking. Get ready to spice up your kitchen and elevate your dining experiences!</p>', 'uploads/1707401485foodie.jpg', '2024-02-08 19:11:25', 'a-journey-through-flavors'),
(19, 2, 12, 'Path to Financial Freedom', '<p><span style=\"background-color: var(--bs-body-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Welcome to the realm of personal finance, where we\'ll unravel the mysteries of money management and explore strategies for building a secure financial future. In this blog series, join me on a journey toward financial freedom, where we\'ll discuss budgeting, saving, investing, and smart financial decision-making. Whether you\'re a financial guru or just starting on your journey, let\'s navigate the path to wealth wisdom together:</span><br></p><p><br></p><p>1. Budgeting Basics: A Blueprint for Financial Success</p><p>In this post, we\'ll dive into the fundamental principles of budgeting. Learn how to create a realistic budget, track your expenses, and make informed financial decisions that align with your goals. Budgeting is the cornerstone of financial stability, and I\'ll guide you through the process step by step.</p><p><br></p><p>2. The Art of Saving: Building a Financial Safety Net</p><p>Explore the importance of saving money and creating a financial safety net. From emergency funds to long-term savings goals, discover strategies to cultivate healthy saving habits that will provide security and peace of mind in the face of life\'s uncertainties.</p><p><br></p><p>3. Investing 101: Demystifying the World of Investments</p><p>Investing can be a powerful tool for building wealth, but it can also be complex. In this post, we\'ll demystify the world of investments, discussing stocks, bonds, mutual funds, and more. Whether you\'re a novice or an experienced investor, gain insights into creating a diversified investment portfolio that aligns with your risk tolerance and financial goals.</p><p><br></p><p>4. Debt Management: Strategies for Tackling Financial Obligations</p><p>Addressing and managing debt is a crucial aspect of financial health. Learn effective strategies for tackling debt, whether it\'s student loans, credit card debt, or other financial obligations. I\'ll provide tips on debt consolidation, negotiation, and creating a plan to become debt-free.</p><p><br></p><p>5. Financial Milestones: Planning for Major Life Events</p><p>In this post, we\'ll explore how to plan for major life events such as buying a home, starting a family, or saving for education. Discussing strategies for achieving these financial milestones will help you navigate the complexities of major life changes with confidence.</p><p><br></p><p>Conclusion:</p><p>As we embark on this journey toward financial wisdom, my goal is to empower you with the knowledge and tools needed to make informed financial decisions. Whether you\'re striving for financial security, planning for the future, or aiming for early retirement, stay tuned for insightful discussions that will guide you on the path to financial freedom. Let\'s make your financial goals a reality!</p>', 'uploads/1707401564finance.jpg', '2024-02-08 19:12:44', 'path-to-financial-freedom'),
(20, 2, 13, 'Rollercoaster of Parenthood', '<p><span style=\"background-color: var(--bs-body-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Welcome to the wonderful world of parenting, where each day brings new challenges, joys, and discoveries. In this blog series, join me as we navigate the rollercoaster of parenthood together. From pregnancy and newborn care to the teenage years and beyond, we\'ll explore the ups and downs, share parenting tips, and celebrate the unique journey of raising resilient and happy children:</span><br></p><p><br></p><p>1. The Pregnancy Chronicles: A Guide to the First Trimester</p><p>Embark on the journey of pregnancy with me as we navigate the first trimester together. From morning sickness to prenatal care, this post will provide insights, tips, and personal anecdotes to support expecting parents during this exciting and sometimes challenging phase.</p><p><br></p><p>2. Newborn Essentials: Surviving the Early Days of Parenthood</p><p>For new parents, the arrival of a newborn can be both thrilling and overwhelming. In this post, we\'ll explore the essentials of newborn care, from sleep routines to feeding schedules, offering practical advice for navigating the early days of parenthood with confidence.</p><p><br></p><p>3. Toddler Tales: Nurturing Curiosity and Independence</p><p>As our little ones grow into toddlers, their personalities blossom, and so do the challenges of parenting. Discover strategies for fostering curiosity, managing toddler tantrums, and encouraging independence in this post dedicated to the adventures of toddlerhood.</p><p><br></p><p>4. School Years: Balancing Academics, Activities, and Family Life</p><p>Navigating the school years involves juggling academics, extracurricular activities, and family time. This post will explore effective ways to support your child\'s education, maintain a healthy work-life balance, and nurture their social and emotional development.</p><p><br></p><p>5. Teenage Transitions: Navigating Adolescence with Understanding</p><p>As our children enter their teenage years, parenting takes on a new set of challenges. Explore strategies for fostering open communication, understanding the unique needs of teenagers, and navigating the transitions from adolescence to young adulthood.</p><p><br></p><p>Conclusion:</p><p>Parenting is a journey filled with love, laughter, and learning. As we navigate the rollercoaster of parenthood together, I aim to provide support, share insights, and celebrate the joys of raising resilient and happy children. Whether you\'re a new parent or navigating the teenage years, stay tuned for discussions that resonate with the diverse experiences of parenting. Here\'s to the adventure of raising the next generation!</p>', 'uploads/1707401657parenting.png', '2024-02-08 19:14:17', 'rollercoaster-of-parenthood'),
(21, 2, 14, 'Crafty Chronicles', '<p><span style=\"background-color: var(--bs-body-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Welcome to the realm of creativity and handmade wonders! In this blog series, we\'ll embark on a journey of self-expression, exploring the world of DIY and crafts. Whether you\'re a seasoned crafter or a novice eager to discover your creative side, join me as we delve into a diverse array of projects, from simple crafts to intricate DIY delights that bring joy and satisfaction to your creative endeavors:</span><br></p><p><br></p><p>1. The Art of Upcycling: Transforming the Old into Something New</p><p>Discover the magic of upcycling in this post, where we\'ll explore creative ways to breathe new life into old items. From turning thrift store finds into home decor treasures to repurposing everyday objects, learn the art of upcycling and contribute to a more sustainable and unique living space.</p><p><br></p><p>2. Handmade Happiness: Crafting Personalized Gifts for Loved Ones</p><p>Explore the joy of handmade gift-giving in this post. I\'ll share ideas for creating personalized gifts for friends and family, whether it\'s a custom-made piece of jewelry, a hand-knitted scarf, or a DIY photo album. Handmade gifts carry a special touch, and I\'ll guide you through the process of crafting thoughtful and memorable presents.</p><p><br></p><p>3. Home Decor DIY: Infusing Personality into Your Living Space</p><p>Transform your home into a haven of creativity with this post on home decor DIY projects. From wall art and customized furniture to decorative accents, discover how to infuse your living space with personality and style through creative and budget-friendly DIY home decor.</p><p><br></p><p>4. Crafting with Kids: Family-Friendly DIY Adventures</p><p>Get the whole family involved in crafting with this post dedicated to family-friendly DIY projects. I\'ll share ideas for age-appropriate crafts, tips for organizing crafting sessions with kids, and ways to create lasting memories through shared creative experiences.</p><p><br></p><p>5. Paper Crafts Galore: From Origami to Handmade Cards</p><p>Explore the versatile world of paper crafts in this post. Whether you\'re into the meditative art of origami or enjoy creating personalized handmade cards, I\'ll provide step-by-step guides and inspiration for a variety of paper-based DIY projects.</p><p><br></p><p>Conclusion:</p><p>As we embark on this creative journey together, I hope that these DIY and craft ideas inspire you to unleash your imagination and infuse your life with handmade delights. Whether you\'re crafting for self-expression, gift-giving, or home decor, stay tuned for a variety of projects that celebrate the joy of creating with your own two hands. Let the crafting adventure begin!</p>', 'uploads/1707401773arts_crafts_blog_lg.jpg', '2024-02-08 19:16:13', 'crafty-chronicles'),
(22, 2, 15, 'Page to Screen', '<p><span style=\"background-color: var(--bs-body-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Welcome to a realm where stories come alive, whether on the pages of a book or the frames of a movie. In this blog series, join me as we explore the dynamic interplay between literature and cinema. From riveting book reviews to insightful movie critiques, we\'ll navigate the worlds of imagination, emotion, and storytelling. Whether you\'re an avid reader, movie buff, or both, let\'s dive into the magic of narratives that captivate and inspire:</span><br></p><p><br></p><p>1. Literary Gems: Book Reviews That Transport You to Other Worlds</p><p>In this post, we\'ll embark on a literary journey with reviews of captivating books that transport readers to other worlds. From gripping novels to thought-provoking non-fiction, discover a diverse range of recommendations and insights into the power of storytelling through the written word.</p><p><br></p><p>2. From Page to Screen: Navigating Book-to-Movie Adaptations</p><p>Explore the fascinating world of book-to-movie adaptations in this post. We\'ll discuss the challenges and successes of bringing beloved stories to the big screen, compare the differences between the two mediums, and share thoughts on whether the adaptations lived up to the expectations set by the original literary works.</p><p><br></p><p>3. Hidden Gems: Indie Films and Under-the-Radar Novels Worth Exploring</p><p>Delve into the realm of hidden gems in literature and cinema. Discover indie films that deserve more attention and lesser-known novels that hold hidden treasures. This post aims to shine a spotlight on the underappreciated works that might have slipped under the radar but are worth exploring.</p><p><br></p><p>4. Classics Revisited: Reimagining Timeless Stories in Literature and Film</p><p>Revisit timeless classics, both in literature and film, as we explore how these stories continue to resonate across generations. Whether it\'s a classic novel that has stood the test of time or a cinematic masterpiece that continues to influence modern storytelling, we\'ll dive into the enduring allure of timeless tales.</p><p><br></p><p>5. Genre Spotlight: Exploring Themes Across Books and Movies</p><p>In this post, we\'ll shine a spotlight on specific genres and themes that bridge the gap between literature and cinema. From exploring the depths of science fiction to the intricacies of historical dramas, join me in examining how certain themes captivate audiences across different mediums.</p><p><br></p><p>Conclusion:</p><p>As we navigate the rich landscapes of books and movies, my goal is to provide you with engaging reviews, thoughtful analyses, and recommendations that celebrate the magic of storytelling. Whether you prefer the tactile experience of turning pages or the visual spectacle of the big screen, stay tuned for discussions that bridge the gap between these two captivating worlds. Here\'s to the joy of getting lost in a good story, no matter the form it takes!</p>', 'uploads/1707401860book.jpg', '2024-02-08 19:17:40', 'page-to-screen'),
(23, 2, 16, 'Career Compass', '<p><span style=\"background-color: var(--bs-body-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Welcome to the dynamic realm of career and professional development! In this blog series, we\'ll embark on a journey through the intricacies of building a successful and fulfilling career. Whether you\'re a recent graduate, a seasoned professional, or someone considering a career change, join me as we explore strategies for career advancement, personal growth, and navigating the ever-evolving landscape of the professional world:</span><br></p><p><br></p><p>1. Crafting Your Career Blueprint: Setting Goals and Creating a Roadmap</p><p>In this post, we\'ll delve into the importance of setting clear career goals and creating a strategic roadmap for professional growth. Learn how to assess your skills, identify your passions, and develop a plan that aligns with your long-term aspirations.</p><p><br></p><p>2. Networking Navigations: Building Meaningful Professional Connections</p><p>Explore the art of networking and building meaningful professional connections. Whether you\'re attending industry events, utilizing social media platforms, or engaging in informational interviews, this post will provide practical tips for expanding your network and opening doors to new opportunities.</p><p><br></p><p>3. Mastering the Art of Resume Crafting and LinkedIn Optimization</p><p>Crafting an effective resume and optimizing your LinkedIn profile are essential steps in today\'s competitive job market. Learn how to showcase your skills, accomplishments, and professional brand in a way that captures the attention of recruiters and hiring managers.</p><p><br></p><p>4. Interview Insights: Strategies for Success in Job Interviews</p><p>Navigate the job interview process with confidence. This post will cover common interview questions, effective communication techniques, and strategies for showcasing your strengths. Whether you\'re a recent graduate or a seasoned professional, mastering the art of job interviews is a crucial aspect of career development.</p><p><br></p><p>5. Embracing Lifelong Learning: Professional Development Beyond the Office</p><p>Explore the concept of lifelong learning and its impact on professional development. From online courses and certifications to attending workshops and conferences, discover how continuous learning can enhance your skill set, keep you competitive in the job market, and contribute to your overall career satisfaction.</p><p><br></p><p>Conclusion:</p><p>As we navigate the path to professional growth together, I aim to provide insights, resources, and actionable tips that empower you on your career journey. Whether you\'re aiming for a promotion, considering a career switch, or simply seeking personal development in your current role, stay tuned for discussions that will guide you toward a fulfilling and successful professional life. Here\'s to unlocking the doors to your career aspirations!</p>', 'uploads/1707401990professional-development-3.jpg', '2024-02-08 19:19:50', 'career-compass'),
(24, 2, 17, 'Wellness Wonders', '<p><span style=\"background-color: var(--bs-body-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Welcome to the realm of fitness and wellness, where the pursuit of a healthy lifestyle takes center stage. In this blog series, join me on a journey to explore the wonders of physical and mental well-being. Whether you\'re a fitness enthusiast or someone taking the first steps toward a healthier life, let\'s navigate the path to wellness together, discovering tips, insights, and inspiration along the way:</span></p><p><br></p><p>1. The Holistic Approach to Wellness: Mind, Body, and Soul</p><p>In this post, we\'ll explore the concept of holistic wellness, emphasizing the interconnectedness of mind, body, and soul. From mindfulness practices to nutritional choices, discover how adopting a holistic approach can contribute to overall well-being and a more balanced life.</p><p><br></p><p>2. Fitness Foundations: Creating a Sustainable Exercise Routine</p><p>Embark on a journey to establish a sustainable exercise routine that fits your lifestyle. Whether you\'re a gym enthusiast, outdoor adventurer, or prefer at-home workouts, this post will provide tips for creating a fitness plan that aligns with your goals and keeps you motivated.</p><p><span style=\"background-color: var(--bs-body-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"background-color: var(--bs-body-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">3. Nutritional Nourishment: Making Informed Choices for a Healthy Diet</span><br></p><p>Navigate the world of nutrition and learn how to make informed choices for a healthy and balanced diet. From understanding food labels to incorporating superfoods into your meals, this post aims to demystify the complexities of nutrition, supporting your journey to a healthier lifestyle.</p><p><br></p><p>4. Mindfulness Matters: Cultivating Mental Well-Being</p><p>Explore the transformative power of mindfulness in this post. Discover techniques for reducing stress, enhancing focus, and cultivating mental resilience. Whether through meditation, breathing exercises, or other mindfulness practices, learn how to prioritize your mental well-being.</p><p><br></p><p>5. Sleep Serenity: Navigating the Path to Quality Rest</p><p>Quality sleep is a cornerstone of overall wellness. In this post, we\'ll explore the importance of sleep, discuss common sleep challenges, and provide tips for creating a sleep-friendly environment. Discover how optimizing your sleep can positively impact your physical and mental health.</p><p><br></p><p>Conclusion:</p><p>As we embark on this wellness journey together, my goal is to provide you with practical insights, actionable tips, and inspiration to support your pursuit of a healthier lifestyle. Whether you\'re taking the first steps toward fitness or seeking ways to enhance your overall well-being, stay tuned for discussions that celebrate the wonders of wellness. Here\'s to a journey of health, happiness, and self-discovery!</p>', 'uploads/1707402095wellness.jpg', '2024-02-08 19:21:35', 'wellness-wonders');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `role` varchar(10) NOT NULL,
  `email_verified` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image`, `date`, `role`, `email_verified`) VALUES
(12, 'Abeer', 'muhammadabeeransari@yahoo.com', '$2y$10$LM4sinnBQbxhsGPEZ5c0z.uKdcr4vwSucOOxeLZSfUJW6f7YvMfim', 'uploads/1707403866Abeer Ansari.jpg', '2024-02-06 15:05:08', 'user', ''),
(15, 'Hamza', 'hamza@yahoo.com', '$2y$10$nRH.puugiZTdj3gqr76PZuFBBti.O8Ebg54zWKqnRBNfz72ksTETe', NULL, '2024-02-08 18:58:09', 'user', ''),
(16, 'Rabi', 'rabi@gmail.com', '$2y$10$ZptyAiz.n4yr8lQGzlcO4.UqOgk/JkHfNilFeJlKOST9E5xFu1jRC', NULL, '2024-02-08 18:59:05', 'user', ''),
(17, 'Aqsa', 'aqsa@gmail.com', '$2y$10$urWIVfLsxewfoJBADBa5GOZkfqBQRyC4N5njH1K89Tc4T.kDiouyK', NULL, '2024-02-08 18:59:30', 'user', ''),
(27, 'Abeer', 'muhammadabeeransari@gmail.com', '$2y$10$s3oTHbpEigbgwHU4ol6oGuFoODicrKTcroRBp4iRUR/vVG/W75lVq', NULL, '2024-05-05 12:04:36', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id` int(11) NOT NULL,
  `code` int(5) NOT NULL,
  `expires` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_like` (`post_id`,`user_ip`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `title` (`title`),
  ADD KEY `slug` (`slug`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `expires` (`expires`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
