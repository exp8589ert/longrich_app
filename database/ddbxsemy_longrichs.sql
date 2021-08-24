-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2020 at 03:15 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ddbxsemy_longrichs`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_code` varchar(14) NOT NULL,
  `referral_count` int(10) UNSIGNED DEFAULT NULL,
  `login_attempt` int(10) UNSIGNED DEFAULT NULL,
  `family_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `package` varchar(20) NOT NULL,
  `doc_type` varchar(255) DEFAULT NULL,
  `doc_image` blob,
  `bank_name` varchar(255) NOT NULL,
  `acc_number` varchar(255) NOT NULL,
  `date_of_brth` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `active` int(10) NOT NULL DEFAULT '0',
  `reg_Ip_address` varchar(255) DEFAULT NULL,
  `reg_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `suspended` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `date_suspended` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `user_code`, `referral_count`, `login_attempt`, `family_name`, `first_name`, `display_name`, `password`, `email`, `phone`, `address`, `package`, `doc_type`, `doc_image`, `bank_name`, `acc_number`, `date_of_brth`, `gender`, `state`, `city`, `hash`, `active`, `reg_Ip_address`, `reg_date`, `suspended`, `date_suspended`) VALUES
(1, '3a91bf5f2ed2ca', 1, 1, 'Longrich ', 'Services', 'Longrich  Service', '$2y$10$dga60NO87J38ACCmelrqw.LULsSryEfc76dcZvhLN4js/0MiODT82', 'grandhustle19@gmail.com', 'D4IZVJTBowpRg+wpG1Y2h0VXC9PPFGcSe4FBqljiHcI97ml/LTkHm3xQr09uZJDibkQjaXN6JTzQVgbepF1QHA==', 'wM4JBj4t8O4oCtjuMQxp2XOt1Lb0wK3IdS+Sww24ekRQrSw5JiaogahXfIjL7MRlmOPvE+BwdePxC3cgAqqtScszi8AOsiq0nir1rEmY2ZwyJU3F5Yc99E4wPyW+D7Vo', '750,750', '', '', 'KnLqCwJeV+WQHCMr2oZGTyhKIsks/PUYOzgPqnZClJKD+hRY9qn2b+wTDaxGLxu9Kg0ItXrDs8suLXJqVV5BKQ==', 'kWaMkfUz60vNu/Xz5zPFD/MfSscc5o049zj7MLF4NU3VdY07flifQ1nEfBzA5pF4k6pTGrNgQZdjn/Ist5rfIw==', 'Hszz+wp4xa88jCbbZSZtowcexAl99iIbNiC2XJ+AG2L+adN/QO05M6SA6iTwX+7bDra8ubYQcMwhWrhINpS1fw==', 'hFHtSSnmARoGPmKuCvMrUbypm5fZMgQAB7ogHAdn4H6EESBQEL8MykxgY0CoPxFUqQ9YXNby3aJvOC+ZdzKJ2A==', '/57ZnofyobJU/sO4djO8bd57BAq07RvHJTd1T7F6e6VzU5USl1rCtkD1qk/0oqwsanFxXkgpWAQHCzq0WlAdaw==', 'rB6z9sS+X8zO2OYy87QdLHTi9acLggvh3I31nuO6pzP5e/6xRdoDBvdZc0g0HHWpNazhU9D22Gd7QxtccMhXWQ==', 'f779c57afeddf6adae0b78bead1dd9c1', 1, NULL, '2019-06-19 00:42:40.307922', 0, NULL),
(2, '5fa88c22669102', NULL, NULL, 'Egbonu', 'Chinyere', NULL, '$2y$10$vod9PAE.8FBpWencBKAzfO4o9svu2eqwuviFq2RwHdjsULVMYxyzm', 'integratednetwork@outlook.com', 'eS9to5QCmz9AUPUREap70WmeBsbMYy+8lV0PAiK9jkIt9JKLeA1Lya+HMI00bvEXwMNPDb/prsvaqo/Fg0/sNA==', '4/iw8w6Q7y/qiFhfqIZ0xTjCbfYJBVP4TjVIUJn4dTvWdo1Zvwr9bG8Rd1LRMIwxhfySPFIDFLZuCX8xb89NgWDlOT63dctZ2MKtuH9BFCI=', '121,600', '0', '', 'lnpF7L0IBuKuL8tGUuCB5PV4ycNxxriGENnkbWOK+1BSpJ/9oGypPLO285r9ZaL00UMi055QRnX/C1iEwkfxOg==', 'pIqYw1R3blzfu4MjZasK2r3o9uwPOh//b7vXXgDoNDMsomVJHV3HPX2lnLslWbZOSBM/7I/0+NWD7JZl0G2QEg==', 'NfWSimbXMdccAgfITf5rAqvHG2luM9b7EZCqTB0XaNDbh5HX+Wjtgn+V7cRNWGzgO1Oy429evOPdPkd0nUnnpA==', 'NsuxSXnMhsRGDx6YMReGab06X0RgVoGvxjkmMUG5xHSfjNUCTtnnFLdAeKuyTTl5Q0ZhnLvFlkRjHEJUmeBNDw==', 'NRjmgXO8CKMhCspI9kjtJPSlMZ9M1rMivvOqF9mpT55XpJNTTPtMgtTFOjWBrJbmuUvFMSENfDVX+lAQk17JjQ==', 'JZmJg3Gm6YjJQ4m3nBWyJTEF1JjL+1sc6bbQcuqYg6rZmoZfC7hw66smJ4K13GimoCPFlOit7v+6Uwojy6dvRQ==', '82efadf22ad2fec89b2b681b257bbe19', 1, NULL, '2020-06-16 03:06:08.996106', 0, NULL),
(3, '3479ad17543534', NULL, NULL, 'Edeh', 'Okwuchukwu Deborah', NULL, '$2y$10$YhdraezeyfeH2JtgpKecLu0cJC9W/RQCQ4Z3kPmBLydwdshhjIeYC', 'Okwyjoe2000@yahoo.com', '8mq4VLhOiWhPcI7ai/aZrFajLyWMuCxm568DfUEMj0kdHxWQ4PTcUAf4/ofic7lzz/bKvKvChzbhoRYHymcS6Q==', 'dZVRZ5ol9qWyKVCYKouNFzNCkRlgcctSErRK5+ETef17l6Qx2w0i66JzxF2An60GdClU9wsHL4yCJsXeZdEZz7w3qoMQ1WlY/xpY3FmI9wbwJ1qnFUPcrTtvhoNj+wxvYpzhXRqtjeNi81T5nirWzg==', '40,000', '0', '', 's2xmFI9CUWGqBxgGQZBrxLqTFyjkA3v3fCFADlELt6gITVasht4DMi2wyJSr5f4yzHDJnPuFJ9xGwmGAzQy5dQ==', 'de46PiLUgmEn1ss5cEo9RATKMEV4heaaCVLPtLQibGMYP7pgF2BuUrxsB+j7hx4Ju9aVMbZTPISCWuI2ow1GPw==', 'sJVO6tbGLpDPlTRBIyJnHFCmTQIoUA1+kVRwgEgHe6WsqS79vlpG+r6FKz3+TmjEatq92AsQlSEF6P88GsVR2w==', 'Hp3R6nXtSAsll1H+8HbMR9VaMSeUPrX5HZBsAHomiFaaZUpLbyo12t8j31hN3e4UAgHfGNWsR7WTjKaq6XfAkg==', 'yssS9ekJ/Osder9+Yc6LHZKjvkbn2ve0Xhut9LKSviPYBt5pcUXxNz4ZZlcemkyo+dGo/RRrSk4qD1Lis5Dqow==', 'sOFSJ6F4i0nh7b7RRjzbH27S2clsrveffhhJJ9mzCLMDdeFPljT/6rtrS6R8FzbCtQH1TDDEIo8T4Oo8smimVQ==', '457d0ce70c774f7cc43081a3ce94be34', 0, NULL, '2020-07-27 15:59:14.561376', 0, NULL),
(4, 'd8a32e6b403bea', NULL, NULL, 'Onyekezini', 'Innocent', NULL, '$2y$10$KZ8dLrDrm7hAT57oQkwgpeqSIZ/4.7gCih7jVrp1g/hZOnJZJbUzm', 'zininno@gmail.com', 'JWYwmkeqOGygd4AgRUNU9P39XFC7K6KNmVghRNbbmD6JVhvB2nRS1uJUfL+3fMr0Mk/m6bctvujAw6+Gq8yaIA==', 'ITGsC1TUcvhQ4NEXdr68ckDAcMsCu6PJXEVpHq5AUegYvB9y/ewKSRhK5rUr3W39oz0DCthbMQuvd+Jx2RFVt2t6mZYFL/7rvEN4guQg5wbxiZ2/ip+W6LjxcsI5IK6H', '750,000', '0', '', 'IO2KNYBLy1hI5oD1hLpOSYktm/moSfowVaksO2h6eQGGoCrMxehzVZJMdjahH9p6cHii9Gr8dy+DHbkg86d45g==', '18FwK8hbqhun4PptBgJ3tpiqu5U0G8KmnwTgY/V70u2CUyPQKvLwTGofGviQxdeIbLw35CT9o8dzLcKuXmKSGA==', 'UD7h8v3GZvr7EharVDT6UmTOeUGD9zADA8AUzx7o0CIG4BecWfVvUmM6v5def7jwpYfIBsfPTZ9HgUdk641J/Q==', 'XeSwOTPy7QW2IAlhM2oXX02IgQ/N5TcoO1gya4JuTCBWE2dxw566Oi1asSz9CihzxsMJKObfz5bRM/0WfANMwg==', 'WOtexMfYPxYFtTFio3l6JEbjDlOeClJ0X8Y14osU68Hr9PYZYURs+fN7g2SFCkqzLxEwYDezcJTPQ7JcA+VLkQ==', 'ZMHcUCj/UHmIlWSyO0OUwAz655lFTcAR61Mciy27FUqgcGNIix4hqIEHiNddVxXodMApDBgNevVT79cn0IGU8A==', '5ff4b908a49d17610d5e693cc1e8f274', 1, NULL, '2020-08-13 12:06:20.269928', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attenders`
--

CREATE TABLE `attenders` (
  `attendee_id` int(10) UNSIGNED NOT NULL,
  `seat_no` varchar(10) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `serial_no` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_code` varchar(14) NOT NULL,
  `follower_id` int(10) UNSIGNED NOT NULL,
  `follower_uc` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`serial_no`, `user_id`, `user_code`, `follower_id`, `follower_uc`) VALUES
(1, 2, '5fa88c22669102', 1, '3a91bf5f2ed2ca');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `serial_no` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `post_text` varchar(1100) DEFAULT NULL,
  `post_image` blob,
  `post_code` varchar(16) DEFAULT NULL,
  `post_video` longblob,
  `post_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`serial_no`, `user_id`, `post_text`, `post_image`, `post_code`, `post_video`, `post_date`) VALUES
(1, 2, 'I joined longrich business not long ago like most people, but whether you’re trying to make more sales or you are stucked up in the business&#10;1. Don&#39;t give up.&#10;2. Take a break and pray.&#10;3. Surround yourself with successful people.&#10;4. Re-strategist. &#10;&#10;Running a successful business, whether online or offline requires a lot work, and some days you might feel like you won’t see the fruits of your labor.', '', '44a7146ca4d02aeb', NULL, '2020-06-16 00:49:11.217000'),
(2, 1, 'Consistency is Key in whatever u do. I present to you a man who has been consistent from day 1. Despite his financial condition as at the time he started he rose to become a steady weekly earner with his family. He is called the one toothpaste man because he could not afford the normal entry level but because he was hungry for success he went an bought just 1 toothpaste and asked to be registered like that. &#10;&#10;He kept buying his family daily consumables till he got to normal entry levels and started building his empire. Today he is DIAMOND 6 level. Congratulations Sir. We celebrate you.', 0x7265736f75726365732f696d616765732f666f72756d2f363233653232383238332e6a706567, '06417aaf134df2c0', NULL, '2020-06-17 04:01:59.935110'),
(3, 1, 'This is David Imonitie, a Nigerian from Benin, Edo state. He is 37 years with two kids. He has been in network marketing for 15 years, started with ogano gold where he shattered their records now with another mlm. He is the highest earning black man in network marketing. David Imonitie earns 1 million dollars monthly that is 360 million naira every month,someone will still say &#34;na lie&#34; David was like every other Nigerian immigrant who instead of wasting his life chasing shadows,went into network marketing at the age of 22.  &#10;&#10;Dear youths, the reason your parents are forcing you to sit in government office is because they don&#39;t know what network marketing is all about or what value it holds, they think it&#39;s not a profession. &#10;&#10;Well,network marketing is 90 years old as a profession. You want to make millions and enjoy freedom? You need network marketing and you need to be proud to show it off, because everyone in this industry shows what they do,that&#39;s how we roll.', 0x7265736f75726365732f696d616765732f666f72756d2f383963383430646231662e6a706567, '00be68b123945dce', NULL, '2020-06-17 04:02:59.800072'),
(4, 2, 'Someone said, network marketing businesses are for poor people. That he can&#39;t do it.&#10;He sees himself as someone that have outgrown such a venture. Also, he said he belongs to the working class and he&#39;s quite a busy person. &#10;&#10;He agreed for my down line to send his number. I want to know the best way to handle this.', '', '4432448e9e1495bd', NULL, '2020-06-18 20:06:22.932496'),
(5, 1, 'Technology has changed almost all major ways of doing business. Communication is easy now. Even technology has made work easier for us. Here we can easily use our referral links to invite people to participate in such lucrative business. The more you refer new members, the more bonuses you earn when they get to make purchase.', '', 'bdf5f912ef172688', NULL, '2020-06-21 20:20:38.027000'),
(6, 1, 'Longrich 2020 car promo explanation:&#10;&#10;1. For 5 Million (5,000,000) naira car qualification in 2020, only 110,000PV required instead of 150,000pv and 15% incremental rate required instead of 35% in 2019.&#10;&#10;2. For higher-level car fund in 2020, car promo company is offering 15 Million naira (15,000,000) award instead of 10M. 350,000PV required instead of 300,000pv (only 50,000PV added), but 50% incremental rate required instead of 60%. &#10;&#10;3. If you miss to qualify for 15M car, there is also 7M car waiting for you. Only 25% rate required to avoid settling for 5M car. (Note: If you can qualify 5M car in 2019, you can qualify for 7M car in 2020).&#10;&#10;4. 100,000PV required for 3.5M car for 2019. In 2020 only 110,000PV required for 5M car.&#10;&#10;5. Star Director car promo for 2019 was 20 &#38; 30 Million naira. In 2020, it is 25 &#38; 50 Million naira. In consideration of  the pandemic and economic downturn in 2020, company has given best ever offer on 2020 car award promo, you can not afford to miss it.', 0x7265736f75726365732f696d616765732f666f72756d2f663333383336343732662e6a706567, 'dae074b9be9b22c2', NULL, '2020-06-22 04:23:18.464201'),
(7, 1, 'Make a decision today, to change your financial status! Make a decision today to start a business. Make a decision today to Become better than yesterday. Be the change you wish to see. Good evening.', '', '2499ca8851a0b449', NULL, '2020-06-25 04:23:57.353612'),
(8, 1, 'THE POWER OF PROSPECTING&#10;&#10;&#34;Yes&#34; is next to the person that says &#34;No&#34;. Multi level marketing is a business of No, No, No, No, Yes! Never get discouraged when you are meeting No, No because the next person that will appreciate your business idea and say Yes to it is close by. The more (No)s you get the more stronger you should become with more experience. The next person may say &#34;Yes&#34;.&#10;&#10;THE SECRET: Those who say no to you are moving you closer to the next person that will say &#34;Yes&#34;.&#10;&#10;THE SUCCESS: One single &#34;Yes&#34; can give you the whole nation. That is the power of steadfastness toward success. Power of direction. Power of focus. Power of belief.&#10;No one can stop you from achieving your goals no matter what, if you really want success enough. It doesn&#39;t matter who don&#39;t believe your business idea but what matters to you should be who does. It is the Power of leverage that builds a giant business. That  &#34;Yes&#34; is next to the person that says &#34;No&#34;.', '', '94bb9a40879c6f57', NULL, '2020-06-25 10:31:43.605279'),
(9, 1, 'Good morning dear.&#10;&#10;I returned this morning to encourage us all to commit to, and take responsibility of our personal growth. While it remains an unending process through our life time, it is important that this awareness is realized as we seek to make a conscious effort towards developing a plan that aid our navigation through life maze. The picture here bullets on certain parts of our lives and services - as it relates to our Personal Development plan. &#10;&#10;Keep pushing , discovering who you are and developing you.&#10;&#10;Have a rewarding week ahead.', '', 'd57add74e86371c8', NULL, '2020-06-28 11:06:05.432065'),
(10, 1, '7 &#38; 15 Million naira car fund. &#10;&#10;Requirement: New group pv (Teams performance) &#62;= 1,200,000 pv.', 0x7265736f75726365732f696d616765732f666f72756d2f306238363862376263612e6a706567, '9642e0147cde71b1', NULL, '2020-06-28 16:17:01.240999'),
(11, 1, '25 &#38; 50 Million naira car fund. &#10;&#10;Requirement:  New group pv (Teams performance) &#62;= 160,000 pv.', 0x7265736f75726365732f696d616765732f666f72756d2f653938636366376463322e6a706567, '9eeeae529acc64c0', NULL, '2020-07-01 11:19:42.296491'),
(12, 1, '5 Million naira car fund. &#10;&#10;Requirement:  New group pv (Teams performance) &#62;= 110,000 pv.', 0x7265736f75726365732f696d616765732f666f72756d2f313335336532333935302e6a706567, '9b53b0e8c13fbb81', NULL, '2020-07-06 11:20:38.536240'),
(13, 1, 'Its going to be another Thursday soon. Will you earn something this Thursday? &#10;Have you worked for your pay? You are not in longrich to be counted in the numbers, you are here to make money. Make efforts towards your business. We all have equal opportunity here. Let&#39;s go get involved.', '', 'ada1bc5178941398', NULL, '2020-07-09 11:33:19.614379'),
(14, 2, 'She started when things were tough for her. She fought the good fight by grinding in her business,  traveling every city and now living her life in style. She had 16 Pioneer leaders and only 5 stood with her  to the top and now over hundreds of multi-millionaires. Her organization has birthed 40 Star Directors in 7 years. &#10;&#10;How was she able to build her leadership? How does it feel like to start from scratch and now a mother to multi-millionaires. If I were you, I will not miss this call today. I will invite all my village people,  team members, friends and even &#39;enemies&#39; to be at this event from the comfort of their home/workplace. Get plugged in.&#10;&#10;If you blink you miss! I am happy for her.', 0x7265736f75726365732f696d616765732f666f72756d2f306162636164343933642e6a706567, '419497063b61579b', NULL, '2020-07-19 11:38:45.671429'),
(16, 1, 'Have you heard Joy Okorie speak? She is still very shy and reserved. Yet she has built her Longrich business into a multimillion naira Business. If she can, you too can. The good news is that, you have your referral link to use if you&#39;re the shy type.&#10; &#10;&#10;Joy Okorie is in her early 20&#39;s, I remembered when she first started out, as a youth corper. Just like every other person, she said to herself, if she was able to make at least 20K weekly in this business, she&#39;s okay with it. She was a Shy girl with low expectations, she wasn&#39;t expecting much would come out of this. The first time she earned a 6 figure bonus in a week, she almost went crazy.&#10;&#10;One thing I love about Joy, she&#39;s was teachable, open to learning and always follow Instructions. Yes she is a shy girl, buy She didn&#39;t shy away from hard work and smart work. You can Imagine a girl in her early 20&#39;s a millionaire already. There are endless possibilities in this business if only you can just take a look at it.', 0x7265736f75726365732f696d616765732f666f72756d2f333639376634333965382e6a706567, '5bd99ad419188632', NULL, '2020-07-21 11:50:17.388959'),
(17, 1, '[FOR OUR NEW PARTNERS] #NEWPARTNERSERIES&#10;&#10;1. Explanation of PVs:&#10;&#10;The only Language we understand in Longrich is PV. PV is what is used universally as our currency in over 100 countries that we have the Longrich business trademark!&#10;PV as an acronym means Purchase or Product Value. When you sign up with Longrich&#10;Whatever capital you invest you are entitled to select products of your choice worth your money to the tune of your entry level PV.&#10;&#10;Fast Rich Pack - 60pv&#10;Silver - 120pv&#10;Gold - 240pv&#10;Platinum - 720pv&#10;Vip Shareholder - 1680pv&#10;&#10;Any product selected below any pv benchmark could jeopardize your accurate entry level.&#10;&#10;The first thing on your ‘to do’ list once you are on board is to refer&#10;3 people DIRECTLY into your team. The best option is FAMILY FIRST&#10;This enables multiple streams of weekly income from your labor. These 3 are your direct referrals everything else will be built under these 3 for life.&#10;&#10;Any new person you refer must be placed under any of your direct 3 legs.', '', '19f277a597397a08', NULL, '2020-07-24 11:57:54.309748'),
(19, 1, '&#34;If you want to enjoy fat bonuses,&#34; make sure you and your team are doing the 30 pv monthly maintenance orders. &#10;&#10;Retail orders pay you the retail and leadership bonus as well. This is the gold mine you must utilize a lot in order to make money in Longrich. The money you get from it is more than what you get during other weeks. Retail orders are not forced on anyone. The company encourages us to do it so that we can enjoy leadership bonuses.', '', 'ae291d55d3d75567', NULL, '2020-08-03 21:57:01.680015'),
(20, 1, 'Our toiletries are something that we buy every month. Note: if you have 100,000 team members who do 30pv you make N200 x $1.35 x 100,000 = N27,000,000. The culture must start now!', '', '3a2840f47b008890', NULL, '2020-08-03 21:57:43.882333'),
(21, 1, 'Her car fund just dropped. She had every reason to give up but she kept pushing   *30 Million naira Car Fund just received now. Congratulations SD4 Oluchi Abraham.&#10;&#10;NIP/FBN/FBN MORTGAGES LIMITED/TRSF &#10;CR Amt:NGN30,000,000.00&#10;Longrich or nothing. &#10;The system works when you work it.', 0x7265736f75726365732f696d616765732f666f72756d2f393535373037396662372e6a706567, 'cbcad9f826e07448', NULL, '2020-08-03 22:00:51.781179'),
(22, 1, 'Car award winners.', 0x7265736f75726365732f696d616765732f666f72756d2f616439643531666135652e6a706567, '83ec6d174562c8eb', NULL, '2020-08-12 23:06:47.333121'),
(23, 1, 'Travel incentive winners.', 0x7265736f75726365732f696d616765732f666f72756d2f656464326662326135302e6a706567, '6e95225941eb152d', NULL, '2020-08-12 23:08:22.189577'),
(24, 1, 'In just the first quarter of the year 2020, Longrich International has produced 6 Star Directors . For most of them the journey was not an easy one, it took a lot of commitment, hard work and determination to succeed. Longrich is a platform for financial stability and independence.', 0x7265736f75726365732f696d616765732f666f72756d2f353564663639653562352e6a706567, 'a4169ef0a8bc085d', NULL, '2020-08-12 23:36:13.040348'),
(25, 1, '30,10 and 5 million naira Car award. Congratulations to them.', 0x7265736f75726365732f696d616765732f666f72756d2f623130626433346561362e6a706567, 'd11b6663cd3d1f52', NULL, '2020-08-12 23:37:45.251436'),
(26, 1, 'Car qualifiers. Congratulations to them, hard work and commitment pays.', 0x7265736f75726365732f696d616765732f666f72756d2f613864363031393035632e6a706567, '44352cc26775fd07', NULL, '2020-08-12 23:39:25.392780'),
(27, 1, 'Trip awards and Car awards.', 0x7265736f75726365732f696d616765732f666f72756d2f333933613466323435322e6a706567, '311e42e2b796a3cd', NULL, '2020-08-12 23:40:13.289885'),
(28, 1, 'Congratulations to the little girl. She bagged 5 million naira Car award and a trip to China. 2019 awardees.', 0x7265736f75726365732f696d616765732f666f72756d2f393039343533343666332e6a706567, 'f993aee80ce1453b', NULL, '2020-08-12 23:42:52.863142'),
(29, 1, 'Longrich executives.', 0x7265736f75726365732f696d616765732f666f72756d2f653663353537656232362e6a706567, '6a6931d1da1a486b', NULL, '2020-08-12 23:44:48.744302'),
(30, 1, 'Suchow university scholarship awardees.', 0x7265736f75726365732f696d616765732f666f72756d2f363764656631313831382e6a706567, '6bccebc71db62ead', NULL, '2020-08-12 23:47:10.276431'),
(31, 1, 'China trip awardees.', 0x7265736f75726365732f696d616765732f666f72756d2f326466323936383839612e6a706567, '604e2e9da2b20045', NULL, '2020-08-12 23:47:51.123412'),
(32, 1, 'Presentation.', 0x7265736f75726365732f696d616765732f666f72756d2f666434303465373234332e6a706567, 'b00e97ac5699d502', NULL, '2020-08-12 23:49:57.603156'),
(33, 1, 'Highlights of Longrich Nigeria 7th anniversary. Congratulations to the lucky winners of an All-expenses-paid Trip to Greece. Wow this was simply obtained by purchasing the #1,500 raffle ticket for the Anniversary. All this can only be possible on the Longrich platform.', 0x7265736f75726365732f696d616765732f666f72756d2f623931376666363766362e6a706567, 'fe92885364210ef9', NULL, '2020-08-12 23:51:06.160766'),
(34, 1, 'Mr. Xu Zhiwei Chairman, Longrich International.', 0x7265736f75726365732f696d616765732f666f72756d2f326132356430623262332e6a706567, '8578292e3aaf94a6', NULL, '2020-08-12 23:53:58.093208'),
(35, 1, 'Award night. Group photos.', 0x7265736f75726365732f696d616765732f666f72756d2f333830346435633365612e6a706567, 'fe9642e46b3a8ecb', NULL, '2020-08-12 23:56:40.416927'),
(36, 1, 'Award night. Lagos car award.', 0x7265736f75726365732f696d616765732f666f72756d2f646539653734663737342e6a706567, '0e0bbdaec737512a', NULL, '2020-08-12 23:57:55.791947'),
(37, 1, 'Over 600 million naira car awards hosted at Eko Hotel and Suites 6TH April, 2019.', 0x7265736f75726365732f696d616765732f666f72756d2f646463353734313431382e6a706567, 'c9c8ed4f8a5fbd42', NULL, '2020-08-13 00:00:42.192688');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(10) NOT NULL,
  `picture_name` varchar(50) NOT NULL,
  `picture_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `picture_name`, `picture_url`) VALUES
(1, 'Award Night', 'resources/images/gallery/01.png'),
(2, '', 'resources/images/gallery/02.jpg'),
(3, '', 'resources/images/gallery/03.jpg'),
(4, '', 'resources/images/gallery/04.png'),
(5, '', 'resources/images/gallery/05.png'),
(6, '', 'resources/images/gallery/06.png'),
(7, '', 'resources/images/gallery/07.png'),
(8, '', 'resources/images/gallery/08.png'),
(9, '', 'resources/images/gallery/09.png'),
(10, '', 'resources/images/gallery/10.png'),
(11, '', 'resources/images/gallery/11.png'),
(12, '5 Million naira car fund', 'resources/images/gallery/12.jpg'),
(13, '7 & 15 Million naira car fund', 'resources/images/gallery/13.jpg'),
(14, '25 & 50 Million naira car fund', 'resources/images/gallery/14.jpg ');

-- --------------------------------------------------------

--
-- Table structure for table `inbox_message`
--

CREATE TABLE `inbox_message` (
  `serial_no` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `message_subject` varchar(250) NOT NULL,
  `text_message` varchar(1000) NOT NULL,
  `notification` varchar(10) NOT NULL,
  `date_sent` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inbox_message`
--

INSERT INTO `inbox_message` (`serial_no`, `user_id`, `user_email`, `message_subject`, `text_message`, `notification`, `date_sent`) VALUES
(1, 1, 'grandhustle19@gmail.com', 'New referral notification', 'Congratulation! Longrich  Services, a new referral has registered using your referral link. please switch over to the referral tab to see your new referral.', '1', '2020-07-24 03:57:52.170980');

-- --------------------------------------------------------

--
-- Table structure for table `login_ip_address`
--

CREATE TABLE `login_ip_address` (
  `user_id` int(11) NOT NULL,
  `user_Ip_address` varchar(255) NOT NULL,
  `login_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `serial_no` int(10) NOT NULL,
  `depositor_name` varchar(100) DEFAULT NULL,
  `teller_number` bigint(20) DEFAULT NULL,
  `account_name` varchar(100) DEFAULT NULL,
  `amount_paid` int(10) DEFAULT NULL,
  `payment_date` int(20) DEFAULT NULL,
  `paid` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_response`
--

CREATE TABLE `post_response` (
  `serial_no` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reply_no` varchar(6) NOT NULL,
  `reply_text` varchar(1100) NOT NULL,
  `reply_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `post_code` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_response`
--

INSERT INTO `post_response` (`serial_no`, `user_id`, `reply_no`, `reply_text`, `reply_date`, `post_code`) VALUES
(1, 1, 'ca93db', 'Good morning,&#10;&#10;I think this person has already given away a pointer to his weakness through his response. From his statement, he believes network marketing is for low class people. He views working class, with probably reasonable monthly pay, as superior in social class and that is what he wants you to understand.&#10;So my advice is this:&#10;1. Don&#39;t put up an argument on that with him.&#10;2. Rather use that as a penetrating point to his interest&#10;3. Do that through adopting an indirect approach in prospecting him.&#10;&#10;Application:&#10;1. You can tell him that Longrich Network Marketing offers him a unique advantage for empowering the less privileged around him who have always depended on him. He should see his coming on board as an opening and a privilege for others whom he had always wanted to help to attain good financial standing without much risk on himself.&#10;', '2020-07-23 15:12:10.185253', '4432448e9e1495bd'),
(2, 1, '004ccd', 'Prospects like this have had their minds flooded with fear and the best way to take deal with that mindset and reset them. No doubt there are many ways to recruit prospects like this and one difficult way is through phone call. If you plan recruiting this prospect through phone call it could take over a year. One easy method is to organize a physical meeting then go with a D6 or D7 partner or a star director who has a FAT back office to show the prospect. Once this prospect sees a day back office, a RESET occurs and you would notice his tone changes for soft landing. Congratulations in advance to the partner who has this prospect because prospects like this once they sign up and understand the business usually go all out. I had one like this that I spotted last year June. I tried convincing him in a phone call but to no avail until I organized a physical meeting last May. He signed up last month and within three weeks has recruited 20 people.', '2020-07-23 15:13:08.762000', '4432448e9e1495bd'),
(4, 1, '59ac16', 'The PV Of The new registration adds up to the PV of your direct leg the new registration placed under. &#10;&#10;For example if you have 3 legs: &#10;A, B, and C.&#10;&#10;If each Of The legs signed up with 120PV, then their cumulative PV per leg is &#10;&#10;A: 120PV&#10;B: 120PV&#10;C: 120PV &#10;&#10;If A signs up 3 Q-silver, B signs up 2 VIPs and C signs up 2 Gold members.  Their cumulative PV till date will be&#10;&#10;A: 120PV + (3x60)  = 300PV&#10;B: 120PV + (2x1680) =3,480PV&#10;C: 120PV + (2x240) = 600PV&#10;&#10;If you registered with 240PV. Then your cumulative PV till date will be your PV plus those of A, B and C. &#10;&#10;240 + 300 + 3,480 + 600 = 4,620. &#10;&#10;So your personal PV = 240 which is gold entry level&#10;And your cumulative PV is 4,620 which is Diamond 2 ranking. &#10;&#10;2. Earning from the PVs:&#10;&#10;From the illustration, The cumulative PVs of your 3 legs are &#10;A: 300&#10;B: 3,480&#10;C: 600&#10;&#10;You are paid performance bonus on 2 lower Of The 3 legs cumulative at the end of the week.', '2020-07-24 11:59:24.523249', '19f277a597397a08'),
(5, 1, 'b0bd93', 'So assuming these activities happened in one week, then you will be paid on 300 and 600PVs (900PVs). As a gold member, your performance bonus is 10%. &#10;So your earning will be 10% X 900 = $90. This will be converted to any local currency you joined with. Naira, pounds, dollars, yen etc and paid into your account. &#10;&#10;NOTE 1pv = $1&#10;&#10;You will also be paid development bonus which is another 10%.&#10;&#10;3. Other incentives from the PVs.  &#10;&#10;A. Trip Promo: &#10;We run all expense paid trips 3-4 times yearly to the USA, UK, Asia or Any African country that Longrich is looking at starting up her trademark. ***D2. =1,680pv (VIP)&#10;This is bought when you join as a Vip (800,000).', '2020-07-24 11:59:58.914808', '19f277a597397a08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_value` varchar(10) NOT NULL,
  `small_description` varchar(100) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `modal_description` varchar(444) NOT NULL,
  `Item_usage` varchar(150) NOT NULL,
  `item_content` varchar(100) NOT NULL,
  `item_caution` varchar(150) NOT NULL,
  `shipping_info` varchar(135) NOT NULL DEFAULT 'Normally delivered between 1 - 7 Business days after payment is received.',
  `out_of_stock` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_category`, `product_name`, `product_value`, `small_description`, `product_price`, `product_image`, `modal_description`, `Item_usage`, `item_content`, `item_caution`, `shipping_info`, `out_of_stock`) VALUES
(1, 'Daily Cosmetics', 'Antiperspirant (Roll-on)', '3.5', 'Contains a cooling factor that can effectively  reduce under arm sweat.', 1400, 'resources/images/products/daily-cosmetics/anti-perspirant/01.jpg', 'Longrich Antiperspirant Dew Deodorant Roll-on 50ml is very effective in preventing itching under the armpit and enabling heat to be distributed without any side effects due to free chemical content. With it\'s nice fragrance, it removes odour and keeps you fresh making you feel pleasant and confident all day. It is made from skin friendly formulation suitable for all skin types. ', 'Apply to armpits  or feet to prevent body odor due to bacterial breakdown of perspiration.', 'Contains antiperspirant factor, an \r\n Organic substance: Aloe  extracted essence.', 'Discontinue usage immediately if irritation or sensitivities occur. Do not consume. Keep in a cool and dry place.', 'Normally delivered between 1 - 7\r\nBusiness days after payment is received.', 0),
(2, 'Daily Cosmetics', 'Baby shampoo &  wash', '6', 'Gentle and mild on any skin type. Natural, unique & Long Lasting everyday.', 2750, 'resources/images/products/daily-cosmetics/baby-shampoo-and-body-wash/01.png', 'Fine mild formula specially intended for children\'s delicate skin. Formulated with herbal extract, it cleanses gently and thoroughly without irritation to eye and skin enriched with natural corn germ oil and fruit extract. It refuses and nourishes deeply, leaving skin feeling cool and comfortable.', 'Coat Hair With A Liberal Amount Of Shampoo. Gently Massage The Scalp And Roots With Fingertips To Work Into A Lather.', 'Poly phenol, a powerful ant-oxidant. Formulated with herbal extract -  Natural corn germ oil.', 'Do not consume. Avoid contact with eyes. Can cause eye irritation. In case of contact with eyes, flush thoroughly with water.', '', 0),
(3, 'Daily Cosmetics', 'Mosquito repellent', '4', 'Disturbs the function of special receptors in mosquito antennae. ', 1800, 'resources/images/products/daily-cosmetics/mosquito-repellent/01.jpg', '5% Deet concentration and 8-hour protection against insect bites. Apply to the external part of the body. It does not cause cancer nor harmful to the skin. It does not cause oxidation. Can be used as nail polish and it dries easily. It disturbs the insect ability to locate animals or human to feed on. It disturbs the function of special receptors in mosquito antennae. The active content does not cause skin irritation or skin sensitization.', 'Spray to the external part of the body and rub t on. You can also spray in bed rooms or closet.', 'Alcohol, Aqua, Diethyl Toluamide, Fragnance, Benzophenone-4, Triethanolamine, CI 42090.', 'It is not edible. Do not spray to the eye or mouth. And keep away from children. Not suitable for asthmatic patient and pregnant women.', '', 0),
(4, 'Daily Cosmetics', 'Natural Bamboo Soap', '5', 'The bamboo charcoal in the soap makes it more absorbent than normal soaps.', 2400, 'resources/images/products/daily-cosmetics/bamboo-charchoal-soap/01.png', 'Benefits of Activated Charcoal (also known as Activated Carbon) include; Coconut oil extract moisturizes skin. Mil and suitable for combination and oily skin. Recommended for daily Use Absorb minerals, toxins, impurities, and other harmful substances from your skin, leaving you with stronger, healthier skin. It can act as a natural exfoliant to remove dead skin cells. Activated Bamboo Charcoal is an effective, natural treatment for acne.', 'Used in a variety of cleansing and lubricating products. usually used for bathing, and other types of housekeeping.', 'Contains coconut oil. Bamboo carbon. Charcoal and activated bamboo charcoal.', 'Bamboo soap is not meant for consumption. Please do not consume.', '', 0),
(5, 'Daily Cosmetics', 'Mouth Freshener', '2.2', 'Longrich mouth freshener is created specifically for fresh breath.', 980, 'resources/images/products/daily-cosmetics/mouth-freshener/01.jpg', 'Helps get rid of mouth odor after eating, smoking or drinking.Great for asthma patients.It is effective in treating cough in children, enabling the lungs to relax.It acts as a good emulsifier.Used for treating loss of appetite, common cold, bronchitis, sinusitis, fever, nausea, vomiting and indigestion as a herbal agent.Can evaluate liver antioxidant defenses.  ', 'Hold vertically straight and spray directly into open mouth.  Avoid spraying into eyes. Can be used to treat weak gum, bad breath & tooth decay.  ', 'Contains white tea extract and peppermint oil that helps to maintains fresh breath and  oral health', 'Slight transient irritation on contact with the eyes. Rinse open eyes with running water for 5 minutes', '', 0),
(6, 'Daily Cosmetics', 'Tooth paste (100g)', '1.2', '100g. Prevents tooth decay, reinforces the gum and relieves toothache', 925, 'resources/images/products/daily-cosmetics/toothpaste-100g/01.png', 'It is fluorine-free decay resistance: the white tea essence prevents decay and improves dental roots conditions.  Deep cleansing: the antiseptic and soft silicon abrasives give you a clean mouth with white teeth and fresh breath. Gum strengthening: strontium chloride and composite aloe extract protects you against teeth sensitivity (cold, heat, acidity and sweetness).', 'Used to promote oral hygiene: it is an abrasive that aids in removing dental plaque and food from the teeth, assists in suppressing halitosis.', 'Main ingredients (white tea essence, CaGP & xylitol)', 'Keep out of reach of children. Store in a cool and dry place.', '', 0),
(7, 'Daily Cosmetics', 'Tooth paste (200g)', '3.5', 'Versatile and suitable for everyone. children under 6 must be supervised. ', 1600, 'resources/images/products/daily-cosmetics/toothpaste-200g/01.png', 'It contains white tea extract + CaGP (glycerol phosphate) + Xylitol (Xylitol) compound ingredients, that helps strong root solid tooth and prevents tooth decay. It contains antibacterial agents TCS + high abrasive dentifrice soft that clean and make your teeth healthy; it helps consolidate the gums, with strontium chloride + aloe extract compound ingredients that can protect the gums and give it strong root and make it glister.', 'Used to promote oral hygiene: it is an abrasive that aids in removing dental plaque and food from the teeth, assists in suppressing halitosis.', 'Composite ingredients (white tea essence, CaGP & xylitol)', 'Keep out of reach of children. Store in a cool and dry place.', '', 0),
(8, 'Daily Cosmetics', 'Hand Cream', '3.5', 'Brightening Hand Cream - Soft. keeps palms supple with nice fragrance.', 1500, 'resources/images/products/daily-cosmetics/hand-cream/01.png', 'Gives the hand and skin moisture.  it makes the hand softer and leaves it with nice fragrance. it has the ability to treat allergic reaction caused by chemical content of local soaps and it is very effective.  It is rich in protein, vitamin A, C & E. It contains various types of high moisturizing ingredients that repairs dryness, heavy dark  and dehydrated skin. Frequent use can makes hand skin stay young, soft and smooth.', 'Evenly apply on clean hands and skill, massage gently for full absorption.', 'Contains glycerin, mineral oil, Ethylhexyl palmitate, Glyceryl Stearate, Peg-100 stearate, e.t.c.', 'Discontinue immediately if irritation or sensitivities occur. Keep out of reach of children. Store in a cool and dry place.', '', 0),
(9, 'Daily Cosmetics', 'Body Cream (SOD MILK)', '4.2', 'Removes Stretch marks, pimples, dark spots, pregnancy scars from the skin.', 1850, 'resources/images/products/daily-cosmetics/body-cream-(sod)/01.jpg', 'Good for both light & dark skin. The body cream offers long-lasting nourishment and protection for dry skin. The ultra rich texture absorbs quickly for maximum results and instant comfort. Help soften your skin with this invigorating and moisturizing blend .A Fresh and Light Fragrance: Our moisturizer is naturally scented, providing a crisp, clean aroma without any harsh chemicals found in other skin creams, this leaves behind no residue.', 'Apply after you shower. Warm or moist skin (damped skin). This helps your skin get ready for maximum absorption.\r\n', 'alpha-arbutin, collagen, cucumber seed extract, vitamin E, jojoba oil and natural extracts.', 'Not for consumption. Keep out of reach of children. Store in a cool and dry place.', '', 0),
(10, 'Daily Cosmetics', 'Body Shampoo & wash', '6', 'Cleansing & Treatment 2 in 1 shampoo is for conditioning your hair.', 2750, 'resources/images/products/daily-cosmetics/body-shampoo-and-body-wash/01.jpg', 'A simple effective solution to greasy hair, dandruff and scalp. No more dandruff. It leaves hair refreshingly supple. Contains EMP Protein: Amino acid that is similar to hair composition, nourishes scalp and conditions hairs; Innovative platelet ZPT anti-dandruff factor and natural mint extract: Remove dirt and excess sebum effectively to soothe scalp and eliminate dandruff. Adds mint essence that is extracted from the plant for cleansing', 'Apply on Damp hair, massage hair and scalp gently, rinse thoroughly.', 'Contains EMP Protein: Amino acid that is similar to hair composition.', 'Wear protective gloves/clothing/face/eye protection. Not to be consumed. Keep out of reach of children.', '', 0),
(11, 'Daily Cosmetics', 'White Tea Shampoo', '3.2', 'Specially for Damaged Hair and Dandruff, to achieve Silky Smooth Softness. ', 2000, 'resources/images/products/daily-cosmetics/white-tea-dandruff-shampoo/01.png', 'Removes dirt and excess sebum effectively to soothe the scalp and eliminate dandruff leaving hair smooth and easy to manage. Shampooing and Conditioning your hair in just one step, quick and convenient. Longrich Natural Essense White Tea Dandruff Control Shampoo Active formula cleanses and removes dandruff thoroughly, restores moisture balance to hair and scalp; hair looks clean, soft and shinny. Effective On All Hair Types.', 'Apply on Damp hair, massage hair and scalp gently, rinse thoroughly.', 'Contains Active Ingredient ZPT and White Tea Polyphenol.', 'Not for consumption. Wear protective gloves/clothing/face/eye protection. Keep out of reach of children. Store in a cool and dry place.', '', 0),
(12, 'Daily Cosmetics', 'Baby Cream', '3', 'Perfect for sensitive and all  baby skin types', 1550, 'resources/images/products/daily-cosmetics/baby-cream/01.png', 'Repairs damaged parts of the skin from infections. Eliminates scars and Marks with repetitive use. Contains placenta essence. Gives radiant and vigorous youthful skin. Has the affinity to skin, can penetrate into the skin and help to improve damaged skin. This body cream\'s deep maintenance makes the skin keep rich lipid, prevent the skin coarse and aging wrinkles, make skin smooth and tender, white and radiant youthful vitality.', 'Perfect for sensitive and all  baby skin types. Apply after shower. Warm or moist skin. This helps your skin get ready for maximum absorption.', 'Contains placenta essence and glycerin. Glycerin helps in atopic dermatitis treatment.', 'Not for consumption. Keep out of reach of children. Store in a cool and dry place.', '', 0),
(13, 'Daily Cosmetics', 'White Tea Soap', '6', 'White Tea Soap contains coconut oil and cleanse without irritating skin.', 1700, 'resources/images/products/daily-cosmetics/white-tea-soap/01.png', 'Contains white tea extract for radiant skin and also skin moisturizing and smoothing honey ingredients. White Tea Soap also contains coconut oil derivatives cleanse without irritating skin. Mild,suitable for facial and body cleansing. Recommended for daily use. Some benefits are facial cleansing, body cleansing, Its long lasting relaxes & restores skin.', 'Apply water on soap, scrub with hands until it foams. Gently apply to skin, rinse with water.', 'Contains white tea extract for radiant skin and skin moisturizing and smoothing honey ingredients', 'Not for consumption. Keep out of reach of children. Store in a cool and dry place.', '', 0),
(14, 'Daily Cosmetics', 'Heat Powder', '6', 'Made using natural corn extract. Non sticky and is safe to use on babies.', 2750, 'resources/images/products/daily-cosmetics/baby-heat-powder/01.png', 'Corn germ oil - 100% natural, is a refined vegetable oil obtained from the germ of Zeamays (corn) plant. Corn germ oil it\'s one of the plant oils that accumulate the highest levels of unsaturated fatty acids in the triacylglycerol fraction. Sunflower seed oil - Helps protect the skin from exposure to sunlight. Zinc oxide - Zinc oxide is a topical skin product that is used as a protective coating for mild skin irritations and abrasions. ', 'Best use after shower. Apply suitable amount on body.', 'Rich in corn germ oil, sunflower seed oil and zinc oxide. Vitamin E in seed oil protect collagen.', 'Not for consumption. Keep out of reach of children. Store in a cool and dry place.', '', 0),
(15, 'Daily Cosm...xxx', 'Evergreen 120ml', '80', '', 49000, '', '', '', '', '', '', 0),
(16, 'Daily Cosmetics', 'Rejuvenating Body Lotion', '3', 'As we age, our skin’s ability to produce collagen diminishes', 2050, 'resources/images/products/daily-cosmetics/rejuvenating-body-lotion/01.jpg', 'As we age, our skin’s ability to produce collagen diminishes. And depending on our lifestyle proclivities, from too much sunning to unhealthy habits like smoking or poor diet, collagen breakdown can leave us weathered, wrinkled and sagging.   This dual nourishing Lotion which contains Snake Collagen and Cereal Extract. Snake Collagen helps to replenish the skin\'s diminishing collagen hence taking care of wrinkling and sagging.', 'Use on all skin types. Keep out of reach of children.', 'Natural Ingredients: cereal extracts (myotonin, oats, soybean, etc)', 'Do not consumed. If you have health problems like skin cuts, infections or sores, please consult your doctor or pharmacist before using this product.', '', 0),
(17, 'Daily Cosmetics', 'Snake Oil No. 1', '2', 'Longrich Snake Oil (For Arthritis, Stretch Marks, 100% Pure)', 1250, 'resources/images/products/daily-cosmetics/snake-oil/01.jpg', 'Chinese water-snake oil contains 20 percent eicosapentaenoic acid (EPA), one of the two types of omega-3 fatty acids most readily used by our bodies. Salmon, one of the most popular food sources of omega-3s, contains a maximum of 18 percent EPA, lower than that of snake oil. Omega-3s are vital for human metabolism. Not only do they sooth inflammation in muscles and joints, but also, they can help \"cognitive function\"', 'For people suffering joint pain and arthritis, topical inflammation, stretch marks, dandruff .', '20% Eicosapentaenoic acid (EPA) an omega-3 fatty acid.', 'Keep out of reach of children. Store in a cool and dry place.', '', 0),
(18, 'Daily Cosmetics', 'Travel Pack', '5', 'Travel size toiletries. (1 Shampoo, 1 Shower gel e.t.c).', 6900, 'resources/images/products/daily-cosmetics/travel-pack/01.jpg', 'Travel size toiletries. (1 Shampoo, 1 Shower gel, Soap, 1 Toothpaste, 1 Tooth brush)', 'Use on short Journey/vacations or in hotels. Can be carried around for emergency travels.', 'Travel size toiletries. (1 Shampoo, 1 Shower gel, Soap, 1 Toothpaste, 1 Tooth brush)', 'Keep out of reach of children. Store in a cool and dry place. ', '', 0),
(19, 'Daily Cosmetics', 'Evergreen Facial Mask', '20', 'Provides your skin with added nutrients, vitality, radiance and fineness.', 12300, 'resources/images/products/daily-cosmetics/evergreen-facial-mask/01.jpg', 'This product contains double pomegranate essence. The active ingredients, pomegranate polyphenols and anthocyanins, inject nutrients into the skin and revitalize dark skin. The composite mineral ingredients can relax and nourish the skin, restore elasticity and soften cuticle, facilitating the absorption of other products from the Live Nutrition Series and bringing out their wonderful effects.', 'Uuse 3 or 4 times for every week, it is recommended to use persistently to recover a fresh and ', 'water, butylene glycol, glycerin, trehalose, fruit extract, magnesium aspartate, lecithin e.t.c', ' Do not consume and keep out of reach of children.', '', 0),
(20, 'Accessories', 'Power Bank', '1', '10,000 mAh powerbank. Perfectly charges various types of mobile devices.', 8200, 'resources/images/products/accessories/power-bank/01.jpg', 'High Capacity Storage of up to 10000mAh. Comes with USB cable for all phones. USB adapter for iPhones. 1.0A and 2.0A Charging output. Slim design durable Casing.  It is designed to last for years and with the actual storage capacity, this is what Longrich power bank offers you. Power bank has a dual charging port for multiple use. This has the capacity to charge a phone up to 4 times depending on the battery capacity of the device. ', 'Charges all various types of mobile devices; Phones, Tablet, MP3\'s, MP4\'s', '10,000 mAh', 'Do not incinerate.', '', 0),
(21, 'Daily Cosmetics', 'Artemisin Toothpaste 120g', '0.5', '120g Fluoride free, rich in white tea and aloe vera gel which protect teeth.', 700, 'resources/images/products/daily-cosmetics/artemisin-toothpaste-120g/01.jpg', ' 120g pack. For treating tooth pain, weak gum, bad breath & tooth decay. (You do NOT have to remove that tooth!) It is highly effective for every tooth without any future side effect when you discontinue. This product is just more than ordinary toothpaste, it’s made from natural herbs and it helps to kill the bacteria that eats up the gum, whitens the teeth and freshens the breath. Relieves all forms of toothache and prevents tartar. ', 'Use as mouth wash. For treating weak gum, bad breath and tooth decay.', 'Triclosan, antibacterial, hexahydrate and sodium benzoate as its content is an anti-fungal agent.', 'Keep out of reach of children. Store in a cool and dry place.', '', 0),
(22, 'Daily Cosmetics', 'Artemisin Toothpaste 200g', '1', '200g Fluoride free, rich in white tea and aloe vera gel which protect teeth.', 1100, 'resources/images/products/daily-cosmetics/artemisin-toothpaste-200g/01.jpg', ' 200g pack. For treating tooth pain, weak gum, bad breath & tooth decay. (You do NOT have to remove that tooth!) It is highly effective for every tooth without any future side effect when you discontinue. This product is just more than ordinary toothpaste, it’s made from natural herbs and it helps to kill the bacteria that eats up the gum, whitens the teeth and freshens the breath. Relieves all forms of toothache and prevents tartar. ', 'Use as mouth wash. For treating weak gum, bad breath and tooth decay.', 'Triclosan, antibacterial, hexahydrate and sodium benzoate as its content is an anti-fungal agent.', 'Keep out of reach of children. Store in a cool and dry place.', '', 0),
(23, 'Daily Cosmetics', 'Artemisin Mouthwash', '1.5', 'Longrich Antemisin Multi-action wash cleanses mouth and freshens breath.', 1350, 'resources/images/products/daily-cosmetics/artemisin-mouthwash/01.jpg', 'Longrich Antemisin Multi-action Total Care Mouth wash is an extract from the plant Artemisia annua (sweet wormwood) or Qinghao (pronounced: Ching-hao). It is a robust plant that grows in many areas of the world. However, only plants grown in special  geographic conditions contain artemisinin. The Artemisinin sold by Longrich Biosciences is obtained from plants grown in the mountains near Chongqing in the Szechuan Province of China. ', 'Vigorously swish 2 teaspoonfuls of rinse between your teeth for 1 minute and spit out.', 'Extracts of sweet wormwood (Artemisia annua)', 'Not to be consumed and keep out of reach of children.', '', 0),
(24, 'Daily Cosmetics', 'Artemisin Hand Soap', '1.5', 'Artemisin handsoap is specially formulated to give antibacterial protection.', 1350, 'resources/images/products/daily-cosmetics/artemisin-hand-soap/01.jpg', 'Antibacterial & Moisturizing - at last a Handwash which does cleans while softening skin Seablue freshness or Green with Aloe Vera Convenient Plunger Dispenser - for extra hygiene hands feel hygienically smooth and cleansed after washing.  Contains triclosan, Benzophenone-4, Citric Acid, Benzyl Alcohol, Magnesium Nitrate, Magnesium Chloride,  e.t.c. Artemisin Moisturizing Protection Handsoap leaves your hands hygienically clean and soft.', 'For laundry. Perfect for promoting personal hygiene and killing bacterial/germs on underwears. ', 'Antibacterial protection, alcohol free Aqua, Sodium Laureth Sulfate, Cocamide DEA, Parfum.', 'Not to be consumed, store in a cool and dry place and keep out of reach of children.', '', 0),
(25, 'Daily Cosmetics', 'Artemisin Body Wash', '2', 'Longrich Artemisin soothing Body Wash is all you need for a beautiful skin.', 1350, 'resources/images/products/daily-cosmetics/artemisin-body-wash/01.png', 'Artemisinins are derived from extracts of sweet wormwood (Artemisia annua) and are well established for the treatment of MALARIA, including highly drug-resistant strains.', 'Use as a batting soap. Can be used for body was or for laundry. ', 'Contains plant extracts. Antibacterial protection.', 'Not to be consumed and keep out of reach of children.', '', 0),
(26, 'Daily Cosmetics', 'Artemisin Shampoo', '2', 'Artemisin Shampoo freshen your hair, makes it soft and gets rid of dandruff.', 1550, 'resources/images/products/daily-cosmetics/artemisin-shampoo/01.png', 'Artemisin Shampoo freshen your hair, makes it soft and gets rid of dandruff. It contains some ingredients taken from egg endometrium and processed with the patented EMP protein technology. The innovative crystal flakes of ZPT anti-dandruff factors and the natural mint essence extracted from plants can relax your hair and remove dandruff, dirt and excessive grease from your hair so that it\'s easier to comb and shape. ', 'Apply to wet hair and gently massage into a lather. Rinse thoroughly after some minutes.', 'Ingredients taken from egg endometrium and processed with the patented EMP protein technology.', 'Not to be consumed, store in a cool and dry place and keep out of reach of children.', '', 0),
(27, 'Daily Cosmetics', 'Artemisin Conditioner', '2', 'Artemisin nourishing conditioner moisturizes and conditions the hair.', 1550, 'resources/images/products/daily-cosmetics/artemisin-conditioner/01.png', 'Suitable for all hair including color treatment hair.  The artemisin conditioner is the best among equal. It is not like every other regular hair conditioner. It contains plant extracts. The Artemisin conditioner moisturizes and conditions the hair. It also repairs damaged hair. Artemisin is known to have anti-bacterial, anti-fungal, antioxidant, anti-tumor and anti-inflammatory. This is your best choice if you have a stubborn hair type.', 'Apply to wet hair and gently massage into a lather. Rinse thoroughly. ', 'Has pomegranate essence and EMP protein that helps maintains smooth and silky hair.', 'Not to be consumed and keep out of reach of children.', '', 0),
(28, 'Health Series', 'Cup Replacement Filter', '5', 'Filter component for Pi Cup, for exchanging damaged filters in the pi cup.', 6150, 'resources/images/products/health-series/cup-filter/01.jpg', 'Pi Cup Portable Alkaline Water Dispenser The Pod is a portable water dispenser that converts regular water into alkaline and ionized water that anyone can drink anywhere, anytime. The Alkaline Pod uses 13 types of minerals in its filter including Tourmaline, Zeolite and Maifanshi stone. These have been scientifically combined to give the optimal effect to the source water. Filter can be replaced after 1 year. ', 'Directions for use is written on the user manual inside the item package.', 'Contains silver ceramic and anti-bacterial balls', 'Do not mix liquid content with reactive chemical. Always wash and keep clean after use.', '', 0),
(29, 'Health Series', 'Fujian Cup', '45', ' Alkaline cup effectively enhances dechlorination: Reduction of chlorine. ', 19800, 'resources/images/products/health-series/alkaline-cup/01.png', 'Providing users with alkaline water that helps to reduce the high acidity level in the body and helps to improve quality of our drinking water by removing chlorine from your drinking water, balancing PH of water, enhances the concentration of required nutrients such as zinc. Drinking water from PI Cup daily helps to improve overall physical condition over a long term consumption. ', 'Directions for use is written on the user manual inside the item package.', 'Longrich PI Cup is made of stainless steel grade and is suitable for all ages.', 'Do not mix liquid content with reactive chemical. Always wash and keep clean after use.', '', 0),
(30, 'Health Series', 'Energy Pan (24cm)', '170', 'The classy energy pot was made using physical field synergy effect technology.', 75500, 'resources/images/products/health-series/energy-pot-(24cm)/01.jpg', 'Size: 24cm. The Longrich classy energy pot\'s core technology is “Sixty-four Harmonious column matrix”, also known as “Harmonious energy” generation system, which is the exclusive innovation of China with world leading technology. The system’s working principle is that it can spontaneously generate resonance to automatically gather, enhance and amplify the weak and disorderly energy in space, and integrate them into the a new energy field.  ', 'Can be used on a stove or on a cooking gas burner.', 'Made with the finest 304 and 340 type grade stainless steel.', 'Avoid boiling/cooking reactive chemicals with the pot.', '', 0),
(31, 'Health Series', 'Energy Pan (28cm)', '180', 'Made with the finest 304 and 340 type grade stainless steel and not Aluminium.', 79000, 'resources/images/products/health-series/energy-pot-(28cm)/01.png', 'Size: 28cm. According to the function test report of animal experiment by the Institute of Nutrition and Food Safety of the Chinese Academy of Disease Control and Prevention in 1997, the oxygen content of blood increases and the body’s resistance against hypoxia, fatigue and diseases is enhanced in the environment of “Harmonious energy field”. The Longrich classy energy pot\'s core technology is “Sixty-four Harmonious column matrix”.', 'Application can be on stove or on a cooking gas burner.', 'Built with the finest 304 and 340 type grade stainless steel.', 'Do not heat with reactive chemicals with the energy pot.', '', 0),
(32, 'Health Series', 'Necklace (Female)', '150', 'The energy necklace (F) works like the energy shoes - It uses nanotechnology.', 98000, 'resources/images/products/health-series/necklace-(female)/01.jpg', 'The energy necklace is a very beautiful, round  and smooth bead like necklace. Fashionable and fanciful. It has tourmaline gem stones in it which helps repels radiation. It has far infrared which fights against anything that can endanger the cells of the human body. The position of the necklace around the neck is to stimulate and enhance blood circulation. There\'s an important meridian point around the neck which connects vital organs.', 'Worn around the neck which helps to stimulate and enhance blood circulation.', 'Built material: pearl/Jade.', 'Do not swallow or consume as it may result to the need for medical operation.', '', 0),
(33, 'Health Series', 'Necklace (Male)', '150', 'Made of fashionable, fanciful and smooth beads. It is a healing necklace.', 98000, 'resources/images/products/health-series/necklace-(male)/01.png', 'There\'s an important meridian point around the neck which connects the vital organs of the human body. The necklace ensures that right signals are sent to the brain at every point in time. The necklace prevents you from lumbar and spine problems in the future. According to research, before the invention of smart phones, man posture was different and there was no tendency of unnecessary bent, swelling, or inflammation of bone joints. ', 'To be worn around the neck which helps to stimulate and enhance blood circulation.', 'Built material: pearl/Jade.', 'Do not swallow or consume as it may result to the need for medical operation.', '', 0),
(34, 'Superklean', 'Sanitary Napkin', '50', 'Superklean anion sanitary napkin made to ease the monthly discomfort of women.', 21000, 'resources/images/products/superklean/sanitary-napkin-(night-use)/01.jpg', 'Longrich Superbklean Magnetic Anion Sanitary Napkin offers better resistance to damp, mold and bacteria. It is comfortable, absorbent, air permeable.  It contains healthy Magnetism that can prolong life, accelerate blood circulation and enhance the vitality of cells. It contains Anions that are acclaimed as \'vitamin of life\' and \'guard of the human body\'. They can purity the air and increase the amount of oxygen as well as moisture.', 'Can be worn both during the day or at night.', 'It contains anions that are acclaimed as \'vitamin of life\' and \'guard of the human body.', 'Please dispose properly after use.', '', 0),
(35, 'Superklean', 'Panty Liner', '50', 'Made of thick layers of cotton and far infrared that prevents fibroid. ', 21000, 'resources/images/products/superklean/panty-liner/01.jpg', 'Longrich  Superbklean Panty Liner is a natural product. It helps cure many illnesses and it relieves Menstrual pain and discomfort.  It treats Anti-tumour, waist pain, neck, wound, swollen boils and also prevent toilet infection. For relieving pains of rheumatism and arthritis. Helps to relieve prostate problem and prevents prostate cancer in men. It has the Ability to kill 99% bacteria with the help of the Anion Strip.', 'Worn during the day or at night as you care comfortable doing.', 'Contains anions that kill bacteria. Eliminates odour, prevents itching and rashes in vagina.', 'Please dispose properly after use.', '', 0),
(36, 'Superklean', 'Sanitary Napkin (4 in 1)', '50', '(4 in 1) Anion sanitary napkin made to ease the monthly discomfort of women.', 23000, 'resources/images/products/superklean/sanitary-napkin-(4-in-1)/01.jpg', 'The Superbklean Magnetic Anion Sanitary Napkin offers better resistance to damp, mold and bacteria. It is comfortable, absorbent, air permeable.  It contains healthy Magnetism that can prolong life, accelerate blood circulation and enhance the vitality of cells. It contains Anions that are acclaimed as \'vitamin of life\' and \'guard of the human body\'. They can purity the air and increase the amount of oxygen as well as moisture.', 'Worn during the day or at night as you care comfortable doing.', 'contains anions that are acclaimed as \'vitamin of life\' and \'guard of the human body.', 'Please dispose properly after use.', '', 0),
(37, 'Superklean', 'Superbklean PVC Napkins', '10', 'Convenient package, suitable for all, helps stay healthy and odor free.', 6650, 'resources/images/products/superklean/superbklean-pvc-napkins/01.jpg', 'Convenient package, suitable for all, helps stay healthy and odor free. It is highly absorbent , anti-bacterial, anti-inflammatory and deodorizes. It helps to improve the endocrine function and the immune system in vagina. Prevents breeding of anaerobic bacteria. Stimulate blood circulation and micro-circulation. Increases resistance to infection.4 packs of Daily Use. 1 pack pantyliner. 1 pack day use. 1 pack night use. 1 pack light flow.', 'It is used as regular sanitary pad. Try out the panty liner before your menstrual period.', 'Contains anti-bacterial, anti-inflammatory and deodorizes agents.', 'Please dispose properly after use.', '', 0),
(38, 'Superklean', 'Energy Baby Diaper(S)', '2', 'The new 5D Energy diapers (small) is made from quality and friendly materials.', 4000, 'resources/images/products/superklean/energy-baby-diaper(s)/01.png', '(Small) 5D Energy Baby Diaper is thin, breathable and very absorbable. You can get this for your babies or as a gift to new mums. Is very comfortable. - kills 99% bacteria  - breathable. - clears rashes. - clear jaundice. The baby powder leaves your baby feeling fresh and comfortable.', 'The energy baby diapers is used as regular diaper .', 'Contains anti-bacteria agent.', 'Please dispose properly after use.', '', 0),
(39, 'Superklean', 'Energy Baby Diaper(M)', '2', 'The 5D Energy  diapers (medium) is made from quality and friendly materials.', 4000, 'resources/images/products/superklean/energy-baby-diaper(m)/01.jpg', '(Medium) 5D Energy Baby Diaper is thin, breathable and very absorbable. You can get this for your babies or as a gift to new mums. Is very comfortable. - kills 99% bacteria  - breathable. - clears rashes. - clear jaundice. The baby powder leaves your baby feeling fresh and comfortable.', 'The energy baby diapers is used as regular diaper .', 'Contains anti-bacteria agent.', 'Please dispose properly after use.', '', 0),
(40, 'Superklean', 'Energy Baby Diaper(L)', '2', 'The 5D Energy  diapers (large) is made from quality and friendly materials.', 4000, 'resources/images/products/superklean/energy-baby-diaper(l)/01.jpg', '(Large) 5D Energy Baby Diaper is thin, breathable and very absorbable. You can get this for your babies or as a gift to new mums. Is very comfortable. - kills 99% bacteria  - breathable. - clears rashes. - clear jaundice. The baby powder leaves your baby feeling fresh and comfortable.', 'The energy baby diapers is used as regular diaper .', 'Contains anti-bacteria agent.', 'Please dispose properly after use.', '', 0),
(41, 'Superklean', 'Energy Baby Diaper(XL)', '2', 'Energy baby diapers (extra-large) is made from quality and friendly materials.', 4000, 'resources/images/products/superklean/energy-baby-diaper(xl)/01.jpg', '(Extra-large) 5D Energy Baby Diaper is thin, breathable and very absorbable. You can get this for your babies or as a gift to new mums. Is very comfortable. - kills 99% bacteria  - breathable. - clears rashes. - clear jaundice. The baby powder leaves your baby feeling fresh and comfortable.', 'The energy baby diapers is used as regular diaper .', 'Contains anti-bacteria agent.', 'Please dispose properly after use.', '', 0),
(42, 'NutriVRich', 'NutriVRich-Blue', '90', 'NutriVrich-Blue is a healthy blend of food with 40 plus kinds of organic food', 36900, 'resources/images/products/nutri-vrich/nutrivrich-blue/01.jpg', 'NutriVrich Nutritious Vegefruit Instant Drink (Blue) is a healthy blend of food consisting 40 plus kinds of organic food. It is made up of Nature’s ingredient like Grains, Mushrooms, Brown rice Sorghum, Job’s tears, Broccoli, Spirulina, Mangosteen, Black sesame, Laver(Seaweeds) etc, and fruits organically grown on fertile soil.  It provides a well-balanced nutritional diet for our body with the abundance of photo chemicals and vitamins.', 'People who want healthy life and people with low immunity or weak immunity conditions.', 'Convenient food supplement. Low-calorie organic food without fat supplement.', 'Avoid overdose usage. Store in a cool and dry place. Keep out of reach of Children.', '', 0),
(43, 'NutriVRich', 'NutriVRich-Pink', '90', 'Longrich NutriVRich pink tea (Slim tea) Helps to regulate glucose levels.', 36900, 'resources/images/products/nutri-vrich/nutrivrich-pink/01.png', 'Longrich NutriVRich pink tea (slim tea) helps to regulate glucose levels by slowing down the rise of blood sugar after eating. It Helps to prevent internal blood clot, thus reduces the risk of heart attack. The tea properties antioxidant Catechin can destroy bacteria and viruses that cause throat infection, dental caries and other dental conditions. Excellent for body weight management and Good for the treatment of Herpes infection. ', 'Aids weight control, reduces risk of cancer types, treats constipation and protects brain cells', 'Antioxidant Catechin', 'Avoid overdose usage. Store in a cool and dry place. Keep out of reach of Children.', '', 0),
(44, 'Value Pack', 'VIP Combo 2', 'N/A', 'You earn a combo bonus of N108,000 on each combo selected by a new member sponsored.', 177900, 'resources/images/products/value-pack/vip-combo-2/01.png', 'The VIP Combo comes with 3 Berry oil, 3 Arthro SupReviver, 17 Body Cream,  13 Calcium, 1 Cordyceps. Requirement: Pay N177,900 for registration and buy additional 1,050PV to earn additional bonuses in one order. You earn a combo bonus of N108,000 on each combo selected by a new member sponsored. The bonus is paid on the second Thursday of next month.', 'Berry oil: 2 x 3 daily. Arthro SupReviver: 2x2 daily morning and night. Calcium: Dosage : 1 capsule x 3 Times Daily. 1 Cordyceps: 1 - 2 bags a day. ', 'The VIP Combo comes with 3 Berry oil, 3 Arthro SupReviver, 17 Body Cream,  13 Calcium, 1 Cordyceps.', 'The VIP Combo 2 does not come with PV. But members on VIP Combo 2 earn a combo bonus of N108,000 on each combo selected by a new member sponsored.', '', 0),
(45, 'Value Pack', 'Platinum Combo 2', 'N/A', 'You earn a combo bonus of N52,000 on each platinum combo selected by  a new member sponsored.', 81000, 'resources/images/products/value-pack/platinum-combo-2/01.png', 'The Platinum Combo comes with 2 Berry oil, 2 Arthro SupReviver, 6 Body Cream and 7 Calcium. Requirement: Pay N81,000 for registeration  and buy additional 550PV to earn additional bonuses in one order. You earn a combo bonus of N52,000 on each platinum combo selected by  a new member sponsored.', 'These items normal dosage are: Berry oil: 2 x 3 daily. Arthro SupReviver: 2x2 daily morning and night. Calcium: Dosage : 1 capsule x 3 Times Daily. ', 'The Platinum Combo comes with 2 Berry oil, 2 Arthro SupReviver, 6 Body Cream, 7 Calcium packs.', 'The Platinum Combo does not come with PV. But members on platinum Combo earn  combo bonus of N52,000 on each Platinum  combo selected by a referral.', '', 0),
(46, 'Value Pack', 'Mini Combo 2', 'N/A', 'You earn a combo bonus of N10,000 on each combo selected by a new member sponsored.', 14900, 'resources/images/products/value-pack/min-combo-2/01.png', 'The Mini Combo 2 comes with 3 Calcium and 1 Body Cream.  Requirement: Pay N14,500 for registeration  and buy additional 105PV to earn additional bonuses in one order. You earn a combo bonus of N10,000 on each mini combo selected by  a new member sponsored.', 'The Calcium normal dosage is: 1 capsule x 3 Times Daily. Then the Body cream  can be applied on the body.', 'The Mini Combo 2 comes with 3 Calcium and 1 Body Cream. ', 'The Mini Combo doesn\'t come with PV. But members on Mini Combo 2 earn a  combo bonus of N10,000 on each Mini combo selected by a new member sponsored.', '', 0),
(47, 'Value Pack', 'Starter Combo 3', '4', 'You earn bonus of N2,900 on 1st generation, N700 on 2nd and N1,400 on 3rd generation on each combo.', 10050, 'resources/images/products/value-pack/starter-combo-3/01.png', 'The start combo has two options. The 1st option comes with 1 Hand cream, 1 Toothpaste, 2 Anti-Mosquito Spray and 2 Body Cream. The 2nd option comes with 1 Shampoo, 1 Toothpaste, 1 Calcium and 2 Anti-Mosquito Spray. You earn a combo bonus of N2,900 on 1st generation, N700 on 2nd generation and N1,400 on 3rd generation on each combo selected by a new member sponsored. The Starter combo can be purchased only once.', 'Hand cream can be applied on hand and skin.  Use the toothpase to wash your teeth and mouth.  Apply the Mosquito repellent on skin.', 'Start combo 1st option comes with 1 Hand cream, 1 Toothpaste, 2 Anti-Mosquito Spray & 2 Body Cream.', 'Store in a cool and dry place. Do not take overdoes of any drug. ', '', 0),
(48, 'Value Pack', 'Starter Combo', '4', 'You earn bonus of N2,900 on 1st generation, N700 on 2nd and N1,400 on 3rd generation on each combo.', 10050, 'resources/images/products/value-pack/starter-combo/01.png', 'The start combo has two options. The 1st option comes with 1 Hand cream, 1 Toothpaste, 2 Anti-Mosquito Spray and 2 Body Cream. The 2nd option comes with 1 Shampoo, 1 Toothpaste, 1 Calcium and 2 Anti-Mosquito Spray. You earn a combo bonus of N2,900 on 1st generation, N700 on 2nd generation and N1,400 on 3rd generation on each combo selected by a new member sponsored. The Starter combo can be purchased only once.', 'Use the Shampoo to wash off dirt from hair. Wash your teeth and mouth  with the toothpaste. Calcium: 1 x 3 Daily. Apply Mosquito repellent on skin.', 'Start combo 2nd option comes with 1 Shampoo, 1 Toothpaste, 1 Calcium and 2 Anti-Mosquito Spray.', 'Store in a cool and dry place. Do not take overdoes of any drug. ', '', 0),
(49, 'Value Pack', 'Starter Pack', 'N/A', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences.', 4100, 'resources/images/products/value-pack/starter-pack/01.png', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences. For any inquiry please contact customer service or send us a mail using any of the available options on our website.', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences. For any inquiry please contact customer service.', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences.', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences. For any inquiry please contact customer service.', '', 1),
(50, 'Value Pack', 'Fast Rich Pack A', '60', 'Fast Rich Pack Referral Bonus: N8,000', 41000, 'resources/images/products/value-pack/fast-rich-pack-a/01.png', 'Comes with 6 pieces of 200g Toothpaste, 6 pieces of Hand Cream, 6 pieces of Anti-Mosquito Spray,  3 pieces of 2 in 1 Shampoo, 3 pieces of White Tea Shampoo and 2 Mini packs of Panty Liner. Requirement: Pay N41,000 for registeration.  You earn N8,000 bonus during promo when you refer 1 person to join.  N40,000 when you refer 5 people, N80,000 for 10 people. All the Fast Rich Bonus will be paid the next working day.', 'Shampoo can be applied on hair to wash off dirts.  Use the toothpase to wash your teeth and mouth. Apply the Mosquito repellent on skin.', 'x6 of Toothpaste, x6 of H-Cream, x6 of Mosquito-S, x3 of 2-1 Shampoo, x3 of W-T Shampoo & 2 Panty L.', 'Do not swallow Shampoo or consume chemical products as it may result to the need for medical attention.', '', 0),
(51, 'Value Pack', 'Fast Rich Pack B', '120', 'Fast Rich Pack Referral Bonus: N16,000', 82000, 'resources/images/products/value-pack/fast-rich-pack-b/01.png', 'Comes with 6 pieces of 200g Toothpaste, 6 pieces of Hand Cream, 6 pieces of Anti-Mosquito Spray,  3 pieces of 2 in 1 Shampoo, 3 pieces of White Tea Shampoo, 6 pieces of Xinchang Tea, 6 pieces of Tianjiang Tea, 6 pieces of Slimming Tea. Requirement: Pay N82,000 for registeration.  You earn N16,000 bonus during promo when you refer 1 person to join.  N80,000 when you refer 5 people, N160,000 for 10 people. Bonus will be paid next working day.', 'Cleaning and protection agent for delicate skins. Provide soft cleansing while maintaining your skin', 'x6 of Tooth-p, x6 of H-Cream, x6 of Mosquito-S, x3 of 2 in 1 Shampoo, x3 of W-T Shampoo e.t.c', 'Do not swallow Shampoo or consume chemical products as it may result to the need for medical attention.', '', 0),
(52, 'Value Pack', 'Fast Rich Pack C', '120', 'Fast Rich Pack Referral Bonus: N16,000. Comes with Nutriv plus ultimate facial cleanser 125g.', 82000, 'resources/images/products/value-pack/fast-rich-pack-c/01.png', 'Comes with Nutriv-Plus Ultimate Facial Cleanser, Nutriv-Plus Essence Toner, Nutriv-Plus Ultimate Firming Cream.  Evergreen Nutriv-Plus Ultimate Facial Cleanser can also produce rich and delicate foam, provide soft cleansing while maintain skin’s own protection. You earn N16,000 bonus during promo when you refer 1 person to join.  N80,000 when you refer 5 people, N160,000 for 10 people. All Fast Rich Bonus will be paid the next working day.', 'Enhance outer beauty without harming the skin.  ', 'Nutriv-Plus Ultimate Facial Cleanser, Nutriv-Plus Essence Toner, Nutriv-Plus Ultimate Firming Cream.', 'Do not swallow or consume as it may result to the need for medical attention.', '', 0),
(53, 'Value Pack', 'Fast Rich Pack D', '60', 'Referral Bonus: N8,800. The cosmetics Kit complements your cosmetics which adds to your beauty.', 45000, 'resources/images/products/value-pack/fast-rich-pack-d/01.png', 'The make up palette consist of Blush On,  Eye shadow, Lip gloss and Mascara. The kit comes with 60pv. You get to earn referral bonus of N8,800 per person. If you sponsor 10 people, you earn N88,000 which is payable the next working day. This referral bonus is different from performance bonus which is the bonus you\'ll continue to earn so long there is activities under you. Contains 16 different colors of eye shadow.', 'With elegant color choices, giving your eyes a brighter look and making it easier for you to apply makeup.', 'Made from soft powder, easy to apply, sticky, durable and does not easily fade.', 'Do not swallow or consume as it may result to the need for medical attention.', '', 0),
(54, 'Accessories', 'Demo Kit', 'N/A', 'The toolkit or work box is a box to organize and carry your daily used tools.', 4000, 'resources/images/products/accessories/demo-kit/01.jpg', 'The  toolbox (also called toolkit, tool chest or work box) is a box to organize, carry, and protect your daily used items/tools. They could be used for trade, a hobby or DIY, and their contents vary with your daily craft.', 'Used for organizing and protecting your daily used items/tools. ', 'Dependent of owner\'s craft.', 'Keep the box clean and always store in a cool and dry place.', '', 0),
(55, 'Accessories', 'Seed Box', 'N/A', 'Contains fruits and vegetables used in making the Nutri-V rich pink and Blue.', 5650, 'resources/images/products/accessories/seed-box/01.jpg', 'This seed box contains all the fruits and vegetables used in producing the Nutri-V rich pink and Blue . It is the best natural diet. Raw foodism is to eat fresh fruits, vegetables and cereals without cooking. What we eat determines our physical conditions. est natural diet. Does not require cooking. Quality guaranteed.', 'Used for making the Nutri-V rich pink and Blue supplements.', 'Contains  fruits and vegetables supplements in proportions.', 'Keep the box clean. And put away from reach of Children.', '', 0),
(56, 'Accessories', 'Test Pass Gadget', 'N/A', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences.', 510, 'resources/images/products/accessories/test-pass-gadget/01.jpg', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences. For any inquiry please contact customer service or send us a mail using any of the available options on our website.', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences. For any inquiry please contact customer service.', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences.', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences. For any inquiry please contact customer service.', '', 1),
(57, 'Accessories', 'Water Tester', 'N/A', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences.', 360, 'resources/images/products/accessories/water-tester/01.jpg', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences. For any inquiry please contact customer service or send us a mail using any of the available options on our website.', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences. For any inquiry please contact customer service.', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences.', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences. For any inquiry please contact customer service.', '', 0),
(58, 'Accessories', 'Syringe', 'N/A', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences.', 410, 'resources/images/products/accessories/syringe/01.jpg', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences. For any inquiry please contact customer service or send us a mail using any of the available options on our website.', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences. For any inquiry please contact customer service.', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences.', 'Content for this item will be filled as soon as it\'s available. We apologize for any inconveniences. For any inquiry please contact customer service.', '', 0),
(59, 'Accessories', 'Superklean Indicator', 'N/A', '(For women). Used mostly for vagina self test card instruction.', 200, 'resources/images/products/accessories/indicator/01.jpg', 'Color reaction: Yellow => Normal, Acidic. Yellow/Orange => Satisfactory Health Status. light green => Mild Inflammation. Yellow green => Inflammation / Bacteria. Green => Severe Vaginal Inflammation. Dark green => Serious Vaginitis (Advised to go to OB-Gyne for Check Up).', 'Take some secretion from vagina by cotton stick, then apply on self test card. After 30 seconds, compare the color with the indicator to get result.', 'Color indicator, cotton stick, indicator, Kemasan', 'After taking secretion from vagina, do not taste/put cotton stick into your mouth. Dispose properly after using cotton stick.', '', 0),
(60, 'Accessories', 'Registration Form', 'N/A', 'Used for new members/referral registrations. Sold for N820 per booklet', 820, 'resources/images/products/accessories/registration-form/01.png', 'Used for new members/referral registrations. Sold for N820 per booklet', 'Used for new members/referral registrations. Sold for N820 per booklet', 'Used for new members/referral registrations. Sold for N820 per booklet', '', '', 0);
INSERT INTO `products` (`product_id`, `product_category`, `product_name`, `product_value`, `small_description`, `product_price`, `product_image`, `modal_description`, `Item_usage`, `item_content`, `item_caution`, `shipping_info`, `out_of_stock`) VALUES
(61, 'Accessories', 'Product Form', 'N/A', 'Used for new members/referral product order. Sold for N800 per booklet', 820, 'resources/images/products/accessories/product-form/01.jpg', 'Used for new/old members product order. Sold for N820 per booklet', 'Used for new/old members product order. Sold for N820 per booklet', 'Used for new/old members product order. Sold for N820 per booklet', '', '', 0),
(62, 'Daily Cosmetics', 'Artemisin Detergent', '3', 'Artemisin detergent liquid gives you the great clean and 2x freshness. ', 3500, 'resources/images/products/daily-cosmetics/artemisin-laundry-detergent/01.jpg', 'Longrich Artemisin Concentrated Antibacterial Laundry Detergent is the expert in removing tough stains in your fabrics. Specifically formulated to penetrate deep into the fibers of your clothes to remove even the tough stains.  Longrich Artemisin concentrated Antibacterial Laundry Detergent is suited for all machine types. Just one capful is enough to remove the tough stains in your machine. ', 'For laundry. Perfect for promoting personal hygiene and killing bacterial/germs on underwears. ', 'Concentrated Antibacterial Laundry detergent. Enriched with added moisturizers.', 'Not to be consumed, store in a cool and dry place and keep out of reach of children.', '', 0),
(63, 'Daily Cosmetics', 'Artemisin Laundry Soap', '0.5', 'Artemisin Underwear Laundry Soap is a bar known for its anti-bacterial agents.', 650, 'resources/images/products/daily-cosmetics/artemisin-laundry-soap/01.jpg', 'Artemisin Underwear Laundry Bar Soaps keep you healthy and provide 100% better protection vs ordinary soaps. Personal hygiene plays a critical role in preventing the spread of illness and infection. Poor personal hygiene can cause infections, skin complaints, and an unpleasant smell. Reassuringly, Artemisin Underwear Laundry Soap protects from a wide range of illness-causing germs and bacteria to help you and your family stay healthy.', 'Perfect for promoting personal hygiene and killing bacterial/germs on underwears.', 'Enriched with added moisturizers.', 'Not to be consumed and keep out of reach of children.', '', 0),
(64, 'Daily Cosmetics', 'Artemisin Soap', '0.5', 'Artemisin Nourishing Soap is a special soap that eliminates odor and germs.', 650, 'resources/images/products/daily-cosmetics/artemisin-nourishing-soap/01.jpg', 'Finally the care and protection that your family deserves to help keep your hands healthy. Artemisin Nourishing Soap moisturizes and nourishes the body. Artemisin is known to have anti-bacterial, anti-fungal, anti-leishmanial, antioxidant, anti-tumor and anti-inflammatory activity. ', 'Use twice daily for an amazing significant result.', 'Contains Artemisin : Artemisin is known for anti-bacterial, antioxidant and anti-fungal activity.', 'Not to be consumed, store in a cool and dry place and keep out of reach of children.', '', 0),
(65, 'Health Care', 'Vintage wine', '10', 'Vintage Nutritional Liquor (wine) boost and strengthened the immune system.', 7400, 'resources/images/products/health-care/vintage-wine/01.png', 'The Longrich Vintage Wine offers you the sophistication of a vintage Liquor. which is not only for pleasure and relaxation but as well as health benefits. Contains Longrich traditional recipe. Safflower, papaya plus the quality wines acquired with age. Suitable for people who need extra immunity boost. Not suitable for Children, Pregnant women, and those with cardiovascular and cerebrovascular disease or alcohol allergies.', 'Can be taken for pleasure/ To boost the quality of a man\'s sperm. Prevent heart diseases.', ' Safflower, cortex acanethopanacis radicis, papaya.', 'Warning and caution to not drive a car under influence of alcohol and being drunk.', '', 0),
(66, 'Health Care', 'Cordyceps militaris', '70', 'Longrich Cordyceps Militaris (Decaffeinated Coffee)', 30500, 'resources/images/products/health-care/cordyceps-militaris/01.jpg', 'Longrich Cordyceps Militaris (Decaffeinated Coffee) is a blend of cordyceps militaris and coffee beans. Is pecially formulated to improve health. It enhances and strengthens the immune system, It improves physical performance, It provides anti-anging and fatigue-reducing effects. Also, Improves respiratory functions. Enhances cellular oxygen intake. Protects the liver and kidneys. And it is suitable for all.', 'Can be taken for pleasure/ To boost the quality of a man\'s sperm. Prevent heart diseases.', 'Main Material: Natural Ingredients', 'May not be suitable for Pregnant women. Store in a cool and dry place.', '', 0),
(67, 'Health Care', 'Arthro SupReviver', '22.5', 'The Longrich Arthro SupReviver enhances immunity and strengthen bones', 8100, 'resources/images/products/health-care/arthro-supreviver/01.png', 'Suitable for Stroke patient, Arthritis, Rheumatism, Bone/Joint Issue. The Arthro SupReviver enhances lmmunity and Strengthen Bones. It\'s a Health food with main ingredients are chondroitin sulfate and glucosamine hydrochloride, which play an important role in the growth and repair of articular cartilage. It combined with ginger extract and green tea extract with highly effective and without any side effects in anti-inflammatory pain relief.', 'Prescription: Taken 2x2 daily morning and night. Not suitable for children and pregnant women.', 'Contains chondroitin sulfate and glucosamine hydrochloride,', 'Not suitable for children, pregnant women and people who are allergic to seafood should consult medical advice before taking it.', '', 0),
(68, 'Health Care', 'Mengqian(Female)', '28', 'Longrich Mengqian Fertility Supplement For Women. Boost female immune system.', 9400, 'resources/images/products/health-care/mengqian-(female)-capsule/01.jpg', 'Mengqian Fertility Supplement is very much effective for female infertility. It helps prepare women\'s bodies to conceive and carry pregnancy to term. It is specially made for women to boost their hormonal imbalance (especially during menopause) and deals with fertility problems. It is recommended for those looking to conceive. The supplement also helps tighten loosened stomach skin in women. Clears patches on skin and lightens uneven skin.', 'Dosage: 2 Capsules twice daily (2x2 per day).', 'Amino Acids, Mucopoly Saccharides and an array of minerals which include Calcium, Cinc Iron e.t.c.', 'Not suitable for men. Store in a cool and dry place and away from direct sunlight.', '', 0),
(69, 'Health Care', 'Libao (Male)', '28', 'Longrich Libao (Male Erection Supplement). Improves men sexual performance.', 9800, 'resources/images/products/health-care/libao-(male)/01.jpg', 'The Libao (Male Erection Supplement) It is suitable for men with low immunity and those who gets tired easily. It penetrates the bone to expel pathogenic wind. It travels everywhere in the body, outward to the skin and inward to the viscera. Increases sexual performance, Improves sperm count, Helps to prevent aging in sperm,  Eliminates fatigue, Keeps you alert, Adjusts immunity. It increases the sex drive of patient(s) with low libido.', 'Dosage: Can be taken daily, 4 tablets 1/2 hour before going to sleep only', 'mixture majorly from Zaocys Carinatus.', 'Not suitable for children and women. Store in a cool and dry place and away from direct sunlight.', '', 0),
(70, 'Health Care', 'Cordycept Coffee (10 PCS)', '1.5', 'Cordyceps Coffee is made of superior cordyceps extract and best coffee beans.', 2050, 'resources/images/products/health-care/cordycept-coffee-(10 pcs)/01.jpg', 'Cordycept Coffee blended with finest Quality Columbian coffee . Highly antioxidative & anti-aging. Cordyceps is known in China for helping to manage blood sugar levels, supporting heart health, supporting kidney health and boosting the immune system. BF Suma 4 in 1 Cordyceps Coffee is made of superior cordyceps extract and the best coffee beans, which has a good taste and refreshing effect. Cordyceps can effectively improve immunity.', 'Can be taken as a regular morning break fast/Late in the evening.', 'Each sachet contains 250mg cordyceps extract and superior cordyceps extract.', 'Store in a cool and dry place and away from direct sunlight.', '', 0),
(71, 'Health Care', 'Calcium Tablet', '13.75', 'Milky Chewable Calcium, Iron And Zinc Tablets provides the cells with energy.', 4350, 'resources/images/products/health-care/calcium-tablet/01.jpg', 'Milky Chewable Calcium provides the body cells with energy and building blocks that they use for healing and reproduction. It is used for treating stiffness e.g. arthritis; for filling up our dietary calcium requirements especially for healthy bones and teeth. The tablets can be taken to supplement calcium, iron and zinc for healthcare purposes.  Calcium helps to build strong bone and teeth, prevent osteoporosis and other bone diseases. ', 'Dosage : 1 capsule x 3 Times Daily.', 'Contains Magnesium, Zinc And Iron.', 'Pregnant women are to take it at the second trimester of their pregnancy. Store in a cool and dry place and away from direct sunlight.', '', 0),
(72, 'Health Care', 'Berry Oil', '33', 'Longrich Berry Oil (120 Capsules) protects kidney from chemical damages. ', 12200, 'resources/images/products/health-care/berry-oil-capsule/01.jpg', 'Longrich Berry Oil (120 Capsules) protects kidney from chemical damage. Great for breast firming and boosts eye sight. Its suitable for people suffering from or exposed to chemicals. Takes care of Cardio Vascular disease (heart disease), Menopause, menstrual pain and Virginal inflammation. Makes you look younger, promote skin and hair. Helps healing process etc. Berry Oil is an all round health Supplement which is good for every adult.', 'Dosage : 2 capsule x 3 Times Daily.', 'Natural herbs.', 'May not be suitable for pregnant women and young children. Store in a cool dry place and away from the sun.', '', 0),
(73, 'Health Care', 'XinChang Tea (Green Tea)', '5', 'The Xinchang Tea (Green Tea) fresh green tea.  Contains 15 Sachets in a Box.', 2650, 'resources/images/products/health-care/xinchang-tea-(green-tea)/01.jpg', 'The Xinchang Tea (Green Tea) is a fresh green tea with Chinese yam rhizome, semen raphani, poria cocos and cassia seed. It aids intestinal peristalsis and promotes digestion. It is indispensable when you are busy at work, with no side effects on the human body and other adverse reactions. Contains 15 Sachets in a Box Effective as a good detoxifier and blood purifier. Treats malaria, regulates blood pressure as well as blood sugar level.', '1 - 2 bags a day, infuse repeatedly with boiling water until tea becomes colorless. ', 'Contains Chinese yam rhizome, semen raphani, poria cocos and cassia seed.', 'Store in a cool and dry place and away from direct sunlight.', '', 0),
(74, 'Health Care', 'Tianjiang Tea (Brown Tea)', '5', 'Blood Pressure & Fat Reducing. Tianjiang contains large numbers of mucilage', 2650, 'resources/images/products/health-care/tianjiang-tea-(brown-tea)/01.jpg', 'Tianjiang Tea contains big numbers of mucilage and mucilage are thick, slimy substance produced by plant which has a soothing effect on mucous membrane such as the tissues that line the respiratory passages.The aloe vera gel in it contains an abundance of vitamins and minerals. It lowers accumulation of fats in the liver and the aorta. It lowers high cholesterol and can improve the amount of blood pumped out of the heart during contraction.', '1 - 2 bags a day, infuse repeatedly with boiling water until tea becomes colorless. ', 'Contains large numbers of mucilage and mucilage are thick, slimy substance produced by plant', 'Not suitable for Pregnant women, infants, children and those who are allergic to edible fungus.', '', 0),
(75, 'Health Care', 'Pink Tea', '5', 'Pink Slimming Tea For Weight Loss ( 15 Bags) and It increases the metabolism.', 2650, 'resources/images/products/health-care/pink-tea/01.png', 'Longrich  slimming Tea is for weight loss. The polyphenol found in slimming tea works to intensify level of fat oxidation and the rate at which your body turns food into calories.The tea helps to regulate glucose levels showing the rise of blood sugar after eating. It can reduce bad cholesterol in the blood and improve the ratio of good Cholesterol and can help to control blood pressure.', '1 - 2 bags a day, infuse repeatedly with boiling water until tea becomes colorless. ', 'Contains polyphenol which helps to intensify fat oxidation.', 'Not suitable for Pregnant women, infants, children and those who are allergic to edible fungus.', '', 0),
(76, 'Health Care', 'Cordyceps Militaris & Ginger', '30', 'Longrich Cordyceps Militaris and black ginger is a supplement Capsules.', 24000, 'resources/images/products/health-care/cordyceps-militaris-&-black-ginger/01.jpg', 'Cordyceps & Black Ginger: Increases oxygen supply to the brain. It increases sperm quality and production. It increases sex drive in people with low libido. It nourishes lungs and provides energy. Effective in fighting cancerous tumor. Cordyceps Capsule is a powerful natural capsule used for treating a wide range of infections caused by bacteria. It improves immune competence of human cells. It is purely natural and does not destroy cells.', '1 - 2 bags a day, infuse repeatedly with boiling water until tea becomes colorless. ', 'Contains Cordyceps capsule for treating a wide range of infections caused by bacteria.', 'Not suitable for Pregnant women, infants, children and those who are allergic to edible fungus.', '', 0),
(77, 'Health Care', 'Black Tea & Tremelia Drink', '8', 'Tremella known as a \"beauty mushroom\" because of it\'s anti aging properties. ', 8250, 'resources/images/products/health-care/black-tea-&-tremelia-drink/01.jpg', 'Black Tea & Tremella drink Tea naturally moisturises, slows skin aging, brightens complexion and deeply hydrates inside and out. With these two combined you are guaranteed weight loss without the ugly skin sagging and will look younger & beautiful. White fungus Extract from Tremella, Inhibits Fsp27, controls the growth of lipid droplets,keeps obesity at bay;  White fat cells are transformed into brown fat cells to increase fat consumption.', '1 - 2 bags a day, infuse repeatedly with boiling water until tea becomes colorless. ', 'Contains tremella which possess an anti aging properties.', 'Not suitable for Pregnant women, infants, children and those who are allergic to edible fungus.', '', 0),
(78, 'Energy Shoe', 'Energy Shoes (type E)', '240', 'Aplus energy shoe is one of the most outstanding pieces among others.', 234000, 'resources/images/products/energy-shoes/energy-shoes-(type-e,-black)/01.jpg', 'Benefits of longrich energy shoes: First human power bank: Recharges, reboots and revitalizes. Limited mechanical correction technology which shapes foot arches, rectifies body skeleton, and also corrects spinal column. Unblocks all meridians, channels and collaterals. Arouses self-repair and self-healing potentials. Stimulates blood circulation to all organs of the body, promotes metabolism and eliminates toxins from the blood. ', 'Suitable for people who easily get tired or people who are suffering from chronic diseases.', 'Contains super-magnetic energy and herbal agent which synergistically stimulate acupuncture points .', 'Not suitable for: Pregnant women. People with internal/cerebral/retinal haemorrhage (bleeding). People wearing pacemakers. People with high fever.', '', 0),
(79, 'Energy Shoe', 'Energy Shoes (type C)', '300', 'Suitable for people with joint issues, arthritis, rheumatism, etc.', 288000, 'resources/images/products/energy-shoes/energy-shoes-(type-c,-black)/01.png', 'Suitable for people with joint issues, arthritis, rheumatism, etc. Stroke patients. Cervical/lumbar spondylosis patients. People with hormonal imbalance. People with painful periods. People with cardiovascular diseases. People who are wheelchair bound People with varicose veins.  Not suitable for: Pregnant women. People with internal/cerebral/retinal haemorrhage (bleeding). People wearing pacemakers. People with high fever.', 'Suitable for people who easily get tired or people who are suffering from chronic diseases.', 'Contains super-magnetic energy and herbal agent which synergistically stimulate acupuncture points .', 'Not suitable for: Pregnant women. People with internal/cerebral/retinal haemorrhage (bleeding). People wearing pacemakers. People with high fever.', '', 0),
(80, 'xxxx', '', '', '', 0, '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_ordered`
--

CREATE TABLE `products_ordered` (
  `serial_no` int(10) UNSIGNED NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `delivery_status` varchar(50) NOT NULL DEFAULT 'pending...',
  `delivery_cost` varchar(20) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_value` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `amount` varchar(255) NOT NULL,
  `buyer_user_id` int(10) UNSIGNED NOT NULL,
  `order_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_ordered`
--

INSERT INTO `products_ordered` (`serial_no`, `order_number`, `delivery_status`, `delivery_cost`, `product_id`, `product_value`, `quantity`, `amount`, `buyer_user_id`, `order_date`) VALUES
(1, '4d06c055e31f4a', 'delivered', '1500', 77, 8, 8, '8250', 1, '2020-07-21 01:37:19.609606'),
(2, '4d06c055e31f4a', 'delivered', '1500', 65, 10, 3, '7400', 1, '2020-07-21 01:37:19.610385'),
(3, '4d06c055e31f4a', 'delivered', '1500', 76, 30, 2, '24000', 1, '2020-07-21 01:37:19.611522'),
(4, '4d06c055e31f4a', 'delivered', '1500', 43, 90, 3, '36900', 1, '2020-07-21 01:37:19.612152'),
(5, '4d06c055e31f4a', 'delivered', '1500', 13, 6, 7, '1700', 1, '2020-07-21 01:37:19.612652'),
(6, '4d06c055e31f4a', 'delivered', '1500', 72, 33, 19, '12200', 1, '2020-07-21 01:37:19.613191'),
(7, '4d06c055e31f4a', 'delivered', '1500', 68, 28, 7, '9400', 1, '2020-07-21 01:37:19.613690'),
(8, '4d06c055e31f4a', 'delivered', '1500', 36, 50, 2, '23000', 1, '2020-07-21 01:37:19.614185'),
(9, '4d06c055e31f4a', 'delivered', '1500', 29, 45, 3, '19800', 1, '2020-07-21 01:37:19.614704'),
(10, '4d06c055e31f4a', 'delivered', '1500', 7, 4, 9, '1600', 1, '2020-07-21 01:37:19.615233'),
(11, '4d06c055e31f4a', 'delivered', '1500', 3, 4, 5, '1800', 1, '2020-07-23 01:37:19.620250'),
(12, '4d06c055e31f4a', 'delivered', '1500', 1, 4, 3, '1400', 1, '2020-07-23 01:37:19.620750'),
(13, '4d06c055e31f4a', 'delivered', '1500', 8, 4, 4, '1500', 1, '2020-07-23 01:37:19.621277'),
(14, '4d06c055e31f4a', 'delivered', '1500', 69, 28, 3, '9800', 1, '2020-07-22 01:37:19.621769'),
(15, '4d06c055e31f4a', 'delivered', '1500', 4, 5, 4, '2400', 1, '2020-07-21 01:37:19.622762'),
(16, '4d06c055e31f4a', 'delivered', '1500', 2, 6, 3, '2750', 1, '2020-07-21 01:37:19.623241'),
(17, '4d06c055e31f4a', 'delivered', '1500', 67, 23, 1, '8100', 1, '2020-07-21 01:37:19.623749'),
(18, '1867ed1fb9f743', 'delivered', '1500', 35, 50, 2, '21000', 2, '2020-07-24 03:21:29.962196'),
(19, '1867ed1fb9f743', 'delivered', '1500', 16, 3, 7, '2050', 2, '2020-07-24 03:21:29.962912'),
(20, '1867ed1fb9f743', 'delivered', '1500', 8, 4, 5, '1500', 2, '2020-07-24 03:21:29.963559'),
(21, '1867ed1fb9f743', 'delivered', '1500', 10, 6, 3, '2750', 2, '2020-07-24 03:21:29.964111'),
(22, '1867ed1fb9f743', 'delivered', '1500', 7, 4, 2, '1600', 2, '2020-07-24 03:21:29.964583'),
(23, '1867ed1fb9f743', 'delivered', '1500', 19, 20, 1, '12300', 2, '2020-07-24 03:21:29.965076'),
(24, '1867ed1fb9f743', 'delivered', '1500', 13, 6, 8, '1700', 2, '2020-07-24 03:21:29.965562'),
(25, '1867ed1fb9f743', 'delivered', '1500', 1, 4, 5, '1400', 2, '2020-07-24 03:21:29.966018'),
(26, '1867ed1fb9f743', 'delivered', '1500', 11, 3, 2, '2000', 2, '2020-07-24 03:21:29.966460'),
(27, '1867ed1fb9f743', 'delivered', '1500', 68, 28, 1, '9400', 2, '2020-07-24 03:21:29.966923');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `product_id` int(10) NOT NULL,
  `product_images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`product_id`, `product_images`) VALUES
(1, 'resources/images/products/daily-cosmetics/anti-perspirant/01.jpg'),
(1, 'resources/images/products/daily-cosmetics/anti-perspirant/02.png'),
(2, 'resources/images/products/daily-cosmetics/baby-shampoo-and-body-wash/01.png'),
(3, 'resources/images/products/daily-cosmetics/mosquito-repellent/01.jpg'),
(3, 'resources/images/products/daily-cosmetics/mosquito-repellent/02.png'),
(3, 'resources/images/products/daily-cosmetics/mosquito-repellent/03.jpg'),
(3, 'resources/images/products/daily-cosmetics/mosquito-repellent/04.png'),
(4, 'resources/images/products/daily-cosmetics/bamboo-charchoal-soap/01.png'),
(4, 'resources/images/products/daily-cosmetics/bamboo-charchoal-soap/02.png'),
(4, 'resources/images/products/daily-cosmetics/bamboo-charchoal-soap/03.png'),
(4, 'resources/images/products/daily-cosmetics/bamboo-charchoal-soap/04.jpg'),
(5, 'resources/images/products/daily-cosmetics/mouth-freshener/01.jpg'),
(5, 'resources/images/products/daily-cosmetics/mouth-freshener/02.png'),
(5, 'resources/images/products/daily-cosmetics/mouth-freshener/03.png'),
(6, 'resources/images/products/daily-cosmetics/toothpaste-100g/01.png'),
(6, 'resources/images/products/daily-cosmetics/toothpaste-100g/02.jpg'),
(6, 'resources/images/products/daily-cosmetics/toothpaste-100g/03.png'),
(6, 'resources/images/products/daily-cosmetics/toothpaste-100g/04.jpg'),
(7, 'resources/images/products/daily-cosmetics/toothpaste-200g/01.png'),
(7, 'resources/images/products/daily-cosmetics/toothpaste-200g/02.jpg'),
(7, 'resources/images/products/daily-cosmetics/toothpaste-200g/03.jpg'),
(7, 'resources/images/products/daily-cosmetics/toothpaste-200g/04.png'),
(8, 'resources/images/products/daily-cosmetics/hand-cream/01.png'),
(9, 'resources/images/products/daily-cosmetics/body-cream-(sod)/01.jpg'),
(9, 'resources/images/products/daily-cosmetics/body-cream-(sod)/02.jpg'),
(9, 'resources/images/products/daily-cosmetics/body-cream-(sod)/03.jpg'),
(9, 'resources/images/products/daily-cosmetics/body-cream-(sod)/04.jpg\r\n'),
(10, 'resources/images/products/daily-cosmetics/body-shampoo-and-body-wash/01.jpg'),
(10, 'resources/images/products/daily-cosmetics/body-shampoo-and-body-wash/02.jpg'),
(11, 'resources/images/products/daily-cosmetics/white-tea-dandruff-shampoo/01.png'),
(11, 'resources/images/products/daily-cosmetics/white-tea-dandruff-shampoo/02.png'),
(11, 'resources/images/products/daily-cosmetics/white-tea-dandruff-shampoo/03.png'),
(11, 'resources/images/products/daily-cosmetics/white-tea-dandruff-shampoo/04.png'),
(12, 'resources/images/products/daily-cosmetics/baby-cream/01.png'),
(13, 'resources/images/products/daily-cosmetics/white-tea-soap/01.png'),
(13, 'resources/images/products/daily-cosmetics/white-tea-soap/02.png'),
(13, 'resources/images/products/daily-cosmetics/white-tea-soap/03.png'),
(13, 'resources/images/products/daily-cosmetics/white-tea-soap/04.jpg'),
(14, 'resources/images/products/daily-cosmetics/baby-heat-powder/01.png'),
(14, 'resources/images/products/daily-cosmetics/baby-heat-powder/02.jpg'),
(14, 'resources/images/products/daily-cosmetics/baby-heat-powder/03.png'),
(14, 'resources/images/products/daily-cosmetics/baby-heat-powder/04.png'),
(16, 'resources/images/products/daily-cosmetics/rejuvenating-body-lotion/01.jpg'),
(16, 'resources/images/products/daily-cosmetics/rejuvenating-body-lotion/02.jpg'),
(16, 'resources/images/products/daily-cosmetics/rejuvenating-body-lotion/03.jpg'),
(16, 'resources/images/products/daily-cosmetics/rejuvenating-body-lotion/04.jpg'),
(17, 'resources/images/products/daily-cosmetics/snake-oil/01.jpg'),
(17, 'resources/images/products/daily-cosmetics/snake-oil/02.png'),
(18, 'resources/images/products/daily-cosmetics/travel-pack/01.jpg'),
(18, 'resources/images/products/daily-cosmetics/travel-pack/02.jpg'),
(18, 'resources/images/products/daily-cosmetics/travel-pack/03.jpg'),
(19, 'resources/images/products/daily-cosmetics/evergreen-facial-mask/01.jpg'),
(19, 'resources/images/products/daily-cosmetics/evergreen-facial-mask/02.jpg'),
(19, 'resources/images/products/daily-cosmetics/evergreen-facial-mask/03.jpg'),
(19, 'resources/images/products/daily-cosmetics/evergreen-facial-mask/04.jpg'),
(19, 'resources/images/products/daily-cosmetics/evergreen-facial-mask/05.jpg'),
(20, 'resources/images/products/accessories/power-bank/01.jpg'),
(20, 'resources/images/products/accessories/power-bank/02.jpg'),
(20, 'resources/images/products/accessories/power-bank/03.jpg'),
(20, 'resources/images/products/accessories/power-bank/04.jpg'),
(21, 'resources/images/products/daily-cosmetics/artemisin-toothpaste-120g/01.jpg'),
(22, 'resources/images/products/daily-cosmetics/artemisin-toothpaste-200g/01.jpg'),
(23, 'resources/images/products/daily-cosmetics/artemisin-mouthwash/01.jpg'),
(24, 'resources/images/products/daily-cosmetics/artemisin-hand-soap/01.jpg'),
(25, 'resources/images/products/daily-cosmetics/artemisin-body-wash/01.png'),
(26, 'resources/images/products/daily-cosmetics/artemisin-shampoo/01.png'),
(27, 'resources/images/products/daily-cosmetics/artemisin-conditioner/01.png'),
(28, 'resources/images/products/health-series/cup-filter/01.jpg'),
(29, 'resources/images/products/health-series/alkaline-cup/01.png'),
(29, 'resources/images/products/health-series/alkaline-cup/02.jpg'),
(29, 'resources/images/products/health-series/alkaline-cup/03.png'),
(29, 'resources/images/products/health-series/alkaline-cup/04.jpg'),
(30, 'resources/images/products/health-series/energy-pot-(24cm)/01.jpg'),
(30, 'resources/images/products/health-series/energy-pot-(24cm)/02.jpg'),
(31, 'resources/images/products/health-series/energy-pot-(28cm)/01.png'),
(31, 'resources/images/products/health-series/energy-pot-(28cm)/02.jpg'),
(32, 'resources/images/products/health-series/necklace-(female)/01.jpg'),
(32, 'resources/images/products/health-series/necklace-(female)/02.jpg'),
(32, 'resources/images/products/health-series/necklace-(female)/03.jpg'),
(33, 'resources/images/products/health-series/necklace-(male)/01.png'),
(33, 'resources/images/products/health-series/necklace-(male)/02.jpg'),
(34, 'resources/images/products/superklean/sanitary-napkin-(night-use)/01.jpg'),
(35, 'resources/images/products/superklean/panty-liner/01.jpg'),
(35, 'resources/images/products/superklean/panty-liner/02.png'),
(35, 'resources/images/products/superklean/panty-liner/03.png'),
(35, 'resources/images/products/superklean/panty-liner/04.png'),
(36, 'resources/images/products/superklean/sanitary-napkin-(4-in-1)/01.jpg'),
(37, 'resources/images/products/superklean/superbklean-pvc-napkins/01.jpg'),
(38, 'resources/images/products/superklean/energy-baby-diaper(s)/01.png'),
(38, 'resources/images/products/superklean/energy-baby-diaper(s)/02.jpg'),
(38, 'resources/images/products/superklean/energy-baby-diaper(s)/03.png'),
(38, 'resources/images/products/superklean/energy-baby-diaper(s)/04.jpg'),
(39, 'resources/images/products/superklean/energy-baby-diaper(m)/01.jpg'),
(39, 'resources/images/products/superklean/energy-baby-diaper(m)/02.jpg'),
(39, 'resources/images/products/superklean/energy-baby-diaper(m)/03.png'),
(40, 'resources/images/products/superklean/energy-baby-diaper(l)/01.jpg'),
(40, 'resources/images/products/superklean/energy-baby-diaper(l)/02.jpg'),
(40, 'resources/images/products/superklean/energy-baby-diaper(l)/03.png'),
(41, 'resources/images/products/superklean/energy-baby-diaper(xl)/01.jpg'),
(42, 'resources/images/products/nutri-vrich/nutrivrich-blue/01.jpg'),
(42, 'resources/images/products/nutri-vrich/nutrivrich-blue/02.jpg'),
(43, 'resources/images/products/nutri-vrich/nutrivrich-pink/01.png'),
(43, 'resources/images/products/nutri-vrich/nutrivrich-pink/02.jpg'),
(44, 'resources/images/products/value-pack/vip-combo-2/01.png'),
(45, 'resources/images/products/value-pack/platinum-combo-2/01.png'),
(46, 'resources/images/products/value-pack/min-combo-2/01.png'),
(47, 'resources/images/products/value-pack/starter-combo-3/01.png'),
(48, 'resources/images/products/value-pack/starter-combo/01.png'),
(49, 'resources/images/products/value-pack/starter-pack/01.png'),
(50, 'resources/images/products/value-pack/fast-rich-pack-a/01.png'),
(51, 'resources/images/products/value-pack/fast-rich-pack-b/01.png'),
(52, 'resources/images/products/value-pack/fast-rich-pack-c/01.png'),
(52, 'resources/images/products/value-pack/fast-rich-pack-c/02.png'),
(52, 'resources/images/products/value-pack/fast-rich-pack-c/03.png'),
(52, 'resources/images/products/value-pack/fast-rich-pack-c/04.png'),
(53, 'resources/images/products/value-pack/fast-rich-pack-d/01.png'),
(53, 'resources/images/products/value-pack/fast-rich-pack-d/02.png'),
(53, 'resources/images/products/value-pack/fast-rich-pack-d/03.png'),
(54, 'resources/images/products/accessories/demo-kit/01.jpg'),
(54, 'resources/images/products/accessories/demo-kit/02.jpg'),
(54, 'resources/images/products/accessories/demo-kit/03.jpg'),
(54, 'resources/images/products/accessories/demo-kit/04.jpg'),
(55, 'resources/images/products/accessories/seed-box/01.jpg'),
(55, 'resources/images/products/accessories/seed-box/02.png'),
(56, 'resources/images/products/accessories/test-pass-gadget/01.jpg'),
(57, 'resources/images/products/accessories/water-tester/01.jpg'),
(57, 'resources/images/products/accessories/water-tester/02.png'),
(58, 'resources/images/products/accessories/syringe/01.jpg'),
(59, 'resources/images/products/accessories/indicator/01.jpg'),
(59, 'resources/images/products/accessories/indicator/02.jpg'),
(59, 'resources/images/products/accessories/indicator/03.png'),
(60, 'resources/images/products/accessories/registration-form/01.png'),
(61, 'resources/images/products/accessories/product-form/01.jpg'),
(62, 'resources/images/products/daily-cosmetics/artemisin-laundry-detergent/01.jpg'),
(63, 'resources/images/products/daily-cosmetics/artemisin-laundry-soap/01.jpg'),
(64, 'resources/images/products/daily-cosmetics/artemisin-nourishing-soap/01.jpg'),
(64, 'resources/images/products/daily-cosmetics/artemisin-nourishing-soap/02.png'),
(65, 'resources/images/products/health-care/vintage-wine/01.png'),
(65, 'resources/images/products/health-care/vintage-wine/02.jpg'),
(65, 'resources/images/products/health-care/vintage-wine/03.png'),
(65, 'resources/images/products/health-care/vintage-wine/04.png'),
(66, 'resources/images/products/health-care/cordyceps-militaris/01.jpg'),
(66, 'resources/images/products/health-care/cordyceps-militaris/02.jpg'),
(67, 'resources/images/products/health-care/arthro-supreviver/01.png'),
(67, 'resources/images/products/health-care/arthro-supreviver/02.png'),
(67, 'resources/images/products/health-care/arthro-supreviver/03.png'),
(67, 'resources/images/products/health-care/arthro-supreviver/04.png'),
(67, 'resources/images/products/health-care/arthro-supreviver/05.png'),
(68, 'resources/images/products/health-care/mengqian-(female)-capsule/01.jpg'),
(68, 'resources/images/products/health-care/mengqian-(female)-capsule/02.jpg'),
(68, 'resources/images/products/health-care/mengqian-(female)-capsule/03.jpg'),
(68, 'resources/images/products/health-care/mengqian-(female)-capsule/04.jpg'),
(69, 'resources/images/products/health-care/libao-(male)/01.jpg'),
(69, 'resources/images/products/health-care/libao-(male)/02.jpg'),
(70, 'resources/images/products/health-care/cordycept-coffee-(10 pcs)/01.jpg'),
(71, 'resources/images/products/health-care/calcium-tablet/01.jpg'),
(71, 'resources/images/products/health-care/calcium-tablet/02.jpg'),
(71, 'resources/images/products/health-care/calcium-tablet/03.png'),
(71, 'resources/images/products/health-care/calcium-tablet/04.png'),
(72, 'resources/images/products/health-care/berry-oil-capsule/01.jpg'),
(72, 'resources/images/products/health-care/berry-oil-capsule/02.png'),
(72, 'resources/images/products/health-care/berry-oil-capsule/03.png'),
(72, 'resources/images/products/health-care/berry-oil-capsule/04.jpg'),
(73, 'resources/images/products/health-care/xinchang-tea-(green-tea)/01.jpg'),
(73, 'resources/images/products/health-care/xinchang-tea-(green-tea)/02.jpg'),
(73, 'resources/images/products/health-care/xinchang-tea-(green-tea)/03.png'),
(73, 'resources/images/products/health-care/xinchang-tea-(green-tea)/04.png'),
(74, 'resources/images/products/health-care/tianjiang-tea-(brown-tea)/01.jpg'),
(75, 'resources/images/products/health-care/pink-tea/01.png'),
(75, 'resources/images/products/health-care/pink-tea/02.jpg'),
(75, 'resources/images/products/health-care/pink-tea/03.jpg'),
(76, 'resources/images/products/health-care/cordyceps-militaris-&-black-ginger/01.jpg'),
(76, 'resources/images/products/health-care/cordyceps-militaris-&-black-ginger/02.jpg'),
(76, 'resources/images/products/health-care/cordyceps-militaris-&-black-ginger/03.jpg'),
(77, 'resources/images/products/health-care/black-tea-&-tremelia-drink/01.jpg'),
(77, 'resources/images/products/health-care/black-tea-&-tremelia-drink/02.jpg'),
(78, 'resources/images/products/energy-shoes/energy-shoes-(type-e,-black)/01.jpg'),
(78, 'resources/images/products/energy-shoes/energy-shoes-(type-e,-black)/02.jpg'),
(78, 'resources/images/products/energy-shoes/energy-shoes-(type-e,-black)/03.jpg'),
(79, 'resources/images/products/energy-shoes/energy-shoes-(type-c,-black)/01.png'),
(79, 'resources/images/products/energy-shoes/energy-shoes-(type-c,-black)/02.jpg'),
(79, 'resources/images/products/energy-shoes/energy-shoes-(type-c,-black)/03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `prof_image` blob,
  `user_name` varchar(50) DEFAULT NULL,
  `mem_code` varchar(50) DEFAULT 'N/A',
  `prof_biography` varchar(305) NOT NULL DEFAULT 'Tell your viewers a little about yourself. Your biography is simply an account or detailed description about your life. It entails basic facts such as education, work, career, relationships, childhood and family. You can also add benefits of Longrich.',
  `user_status` varchar(10) NOT NULL DEFAULT '0',
  `amount_paid` varchar(20) DEFAULT '0',
  `total_pv` varchar(20) NOT NULL DEFAULT '0',
  `referral_url` varchar(100) DEFAULT NULL,
  `referral_vault` varchar(14) DEFAULT NULL,
  `sponsor_code` varchar(15) DEFAULT NULL,
  `shipping_address` varchar(255) NOT NULL DEFAULT 'Use registered address as shipping address.',
  `facebook_link` varchar(255) NOT NULL DEFAULT 'Add facebook link here...',
  `instagram_link` varchar(255) NOT NULL DEFAULT 'Add instagram link here...',
  `whatsapp_link` varchar(255) NOT NULL DEFAULT 'Add whatsapp link here...',
  `reported` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `prof_image`, `user_name`, `mem_code`, `prof_biography`, `user_status`, `amount_paid`, `total_pv`, `referral_url`, `referral_vault`, `sponsor_code`, `shipping_address`, `facebook_link`, `instagram_link`, `whatsapp_link`, `reported`) VALUES
(1, 0x7265736f75726365732f696d616765732f70726f66696c652f333966346235383139632e6a7067, 'Longrich@3f89', 'N/A', 'Tell your viewers a little about yourself. Your biography is simply an account or detailed description about your life. It entails basic facts such as education, work, career, relationships, childhood and family. You can also add benefits of Longrich.', '1', '750,750', '1,744.5', 'https://longrichs.com/crypt?lock=3a91bf5f2ed2ca', '3a91bf5f2ed2ca', '', '', 'Add facebook link here...', 'Add instagram link here...', 'Add whatsapp link here...', NULL),
(2, 0x7265736f75726365732f696d616765732f70726f66696c652f323963633638626234352e6a7067, 'Egbonu@fe5b', 'N/A', 'Tell your viewers a little about yourself. Your biography is simply an account or detailed description about your life. It entails basic facts such as education, work, career, relationships, childhood and family. You can also add benefits of Longrich.', '1', '121,600', '283.4', 'https://longrichs.com/crypt?lock=5fa88c22669102', '5fa88c22669102', '', '7 Omu crescent GRA,', 'Add facebook link here...', 'Add instagram link here...', 'Add whatsapp link here...', NULL),
(3, 0x7265736f75726365732f766563746f72732f757365722e737667, 'Edeh@9516', 'N/A', 'Tell your viewers a little about yourself. Your biography is simply an account or detailed description about your life. It entails basic facts such as education, work, career, relationships, childhood and family. You can also add benefits of Longrich.', '0', '0', '0', 'https://longrichs.com/crypt?lock=3479ad17543534', '3479ad17543534', '', '26 Abagana street fegge onitsh, 26 Abagana street fegge Onitsh', 'Add facebook link here...', 'Add instagram link here...', 'Add whatsapp link here...', NULL),
(4, 0x7265736f75726365732f766563746f72732f757365722e737667, 'Onyekezini@e28f', 'N/A', 'Tell your viewers a little about yourself. Your biography is simply an account or detailed description about your life. It entails basic facts such as education, work, career, relationships, childhood and family. You can also add benefits of Longrich.', '0', '0', '0', 'https://longrichs.com/crypt?lock=d8a32e6b403bea', 'd8a32e6b403bea', '', '11, Lawrence Ekwuabu street, Asaba', 'Add facebook link here...', 'Add instagram link here...', 'Add whatsapp link here...', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `random_message`
--

CREATE TABLE `random_message` (
  `message_id` int(10) NOT NULL,
  `short_message` varchar(130) NOT NULL,
  `long_message` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `random_message`
--

INSERT INTO `random_message` (`message_id`, `short_message`, `long_message`) VALUES
(1, 'Your referral volume will rise quickly if you share your referral links on facebook, twitter, whatsapp and other social platform.', 'We are committed to providing the best health care services to our customers. Keep sharing your experience and the wealth opportunity with your loved ones.'),
(2, 'Our management is eager to hear from you should you have any question.', 'Don’t waste time standing in line, order more products to keep your health in good condition while you also advance to a greater life time earning capacity.');

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `user_id` int(10) NOT NULL,
  `user_code` varchar(14) NOT NULL,
  `post_code` varchar(16) NOT NULL,
  `rating_action` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`user_id`, `user_code`, `post_code`, `rating_action`) VALUES
(1, '3a91bf5f2ed2ca', '00be68b123945dce', 'like'),
(1, '3a91bf5f2ed2ca', '06417aaf134df2c0', 'like'),
(2, '5fa88c22669102', '419497063b61579b', 'like'),
(1, '3a91bf5f2ed2ca', '4432448e9e1495bd', 'dislike'),
(1, '3a91bf5f2ed2ca', '44a7146ca4d02aeb', 'like'),
(2, '5fa88c22669102', '44a7146ca4d02aeb', 'like'),
(1, '3a91bf5f2ed2ca', '5bd99ad419188632', 'like'),
(1, '3a91bf5f2ed2ca', '94bb9a40879c6f57', 'like'),
(1, '3a91bf5f2ed2ca', 'cbcad9f826e07448', 'like');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `family_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `user_prof_url` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_reg_amount` varchar(20) DEFAULT NULL,
  `ref_by_user_code` varchar(14) NOT NULL DEFAULT 'None',
  `ref_by_email` varchar(255) NOT NULL DEFAULT 'None',
  `ref_by_userid` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ref_by_vault` varchar(14) DEFAULT NULL,
  `referred_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read_status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`user_id`, `family_name`, `first_name`, `user_prof_url`, `user_email`, `user_reg_amount`, `ref_by_user_code`, `ref_by_email`, `ref_by_userid`, `ref_by_vault`, `referred_date`, `read_status`) VALUES
(1, 'Longrich ', 'service', 'https://longrichs.com/profile?_r=3a91bf5f2ed2calongrich .service', 'grandhustle19@gmail.com', '750,000', 'None', 'None', 0, NULL, '2020-07-24 00:42:40', 1),
(2, 'Egbonu', 'Chinyere', 'https://longrichs.com/profile?_r=5fa88c22669102egbonu.chinyere', 'integratednetwork@outlook.com', '120,000', '3a91bf5f2ed2ca', 'grandhustle19@gmail.com', 1, '3a91bf5f2ed2ca', '2020-07-24 03:06:09', 1),
(3, 'Edeh', 'Okwuchukwu Deborah', 'https://longrichs.com/profile?_r=3479ad17543534edeh.okwuchukwu deborah', 'Okwyjoe2000@yahoo.com', '40,000', 'None', 'None', 0, NULL, '2020-07-27 15:59:14', 1),
(4, 'Onyekezini', 'Innocent', 'https://longrichs.com/profile?_r=d8a32e6b403beaonyekezini.innocent', 'zininno@gmail.com', '750,000', 'None', 'None', 0, NULL, '2020-08-13 12:06:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reported_post`
--

CREATE TABLE `reported_post` (
  `reporter_id` int(10) NOT NULL,
  `post_code` varchar(16) NOT NULL,
  `post_owner_id` int(10) NOT NULL,
  `report_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reported_users`
--

CREATE TABLE `reported_users` (
  `reporter_id` varchar(10) NOT NULL,
  `reporter_uc` varchar(14) NOT NULL,
  `offender_id` varchar(10) NOT NULL,
  `offender_uc` varchar(14) NOT NULL,
  `reported_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `session_token` varchar(255) DEFAULT NULL,
  `session_cookie` varchar(255) DEFAULT NULL,
  `session_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`user_id`, `session_id`, `session_token`, `session_cookie`, `session_date`) VALUES
(1, 'af6446edb07aae79a2d7520aa46d133b', '6ffa27e3b192c8b2', '2fe412d449f89735dc', '2020-08-13 12:59:22'),
(2, 'cbb40c59d43a9db963ff8c50199d06ea', 'fdb2635ef9e89f46', 'ddaaeb6b98d8d5fec5', '2020-07-24 11:38:06'),
(3, '6975f2740532ee28c72d9aea5c6dfe7f', '3ebb7dbfd356a6de', '274b6acb86618ce49a', '2020-08-02 09:20:32'),
(4, '548f4e67154dcb0e18ca5776d90bbd13', 'ad7224044a74f666', 'a0096c8148b845b1da', '2020-08-13 12:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(10) UNSIGNED NOT NULL,
  `prod_id` int(10) DEFAULT NULL,
  `video_name` varchar(100) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `thumbnail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `prod_id`, `video_name`, `video_url`, `thumbnail`) VALUES
(1, 0, 'intro', 'resources/videos/intro.mp4', 'resources/videos/intro.png'),
(2, 30, 'longrich-classy-style-snergy-pot', 'resources/videos/longrich-classy-style-snergy-pot.mp4', 'resources/videos/longrich-classy-style-snergy-pot.png'),
(3, 7, 'longrich-white-tea-toothpaste', 'resources/videos/longrich-white-tea-toothpaste.mp4', 'resources/videos/longrich-white-tea-toothpaste.png'),
(4, 0, 'longrich-all-purpose-cleanser', 'resources/videos/longrich-all-purpose-cleanser.mp4', 'resources/videos/longrich-all-purpose-cleanser.png'),
(5, 10, 'longrich-bodywash', 'resources/videos/longrich-bodywash.mp4', 'resources/videos/longrich-bodywash.png'),
(6, 11, 'longrich-2-in-1-shampoo', 'resources/videos/longrich-2-in-1-shampoo.mp4', 'resources/videos/longrich-2-in-1-shampoo.png'),
(7, 4, 'longrich-bamboo-charcoal-soap', 'resources/videos/longrich-bamboo-charcoal-soap.mp4', 'resources/videos/longrich-bamboo-charcoal-soap.png'),
(8, 37, 'longrich-superbklean-magnetic-sanitary-napkin', 'resources/videos/longrich-superbklean-magnetic-sanitary-napkin.mp4', 'resources/videos/longrich-superbklean-magnetic-sanitary-napkin.png'),
(9, 29, 'longrich-classy-style-pi-water-cup', 'resources/videos/longrich-classy-style-pi-water-cup.mp4', 'resources/videos/longrich-classy-style-pi-water-cup.png'),
(10, 38, 'longrich-baby-diaper', 'resources/videos/longrich-baby-diaper.mp4', 'resources/videos/longrich-baby-diaper.png'),
(11, 80, 'longrich-energy-shoe', 'resources/videos/longrich-energy-shoe.mp4', 'resources/videos/longrich-energy-shoe.png'),
(12, 79, 'longrich-aplus-energy-shoe', 'resources/videos/longrich-aplus-energy-shoe.mp4', 'resources/videos/longrich-aplus-energy-shoe.png'),
(13, 0, 'longrich-bone-m', 'resources/videos/longrich-bone-m.mp4', 'resources/videos/longrich-bone-m.png'),
(14, 0, 'testimony 1', 'resources/videos/testimony-1.mp4', 'resources/videos/testimony-1.png'),
(15, 0, 'testimony 1', 'resources/videos/testimony-1.mp4', 'resources/videos/testimony-1.png'),
(16, 0, 'testimony 2', 'resources/videos/testimony-2.mp4', 'resources/videos/testimony-2.png'),
(17, 0, 'testimony 3', 'resources/videos/testimony-3.mp4', 'resources/videos/testimony-3.png'),
(18, 0, 'testimony 4', 'resources/videos/testimony-4.mp4', 'resources/videos/testimony-4.png'),
(19, 0, 'testimony 5', 'resources/videos/testimony-5.mp4', 'resources/videos/testimony-5.png'),
(20, 0, 'testimony 6', 'resources/videos/testimony-6.mp4', 'resources/videos/testimony-6.png'),
(21, 0, 'testimony 7', 'resources/videos/testimony-7.mp4', 'resources/videos/testimony-7.png'),
(22, 0, 'testimony 8', 'resources/videos/testimony-8.mp4', 'resources/videos/testimony-8.png'),
(23, 0, 'testimony 9', 'resources/videos/testimony-9.mp4', 'resources/videos/testimony-9.png'),
(24, 0, 'testimony 10', 'resources/videos/testimony-10.mp4', 'resources/videos/testimony-10.png'),
(25, 0, 'testimony 11', 'resources/videos/testimony-11.mp4', 'resources/videos/testimony-11.png'),
(26, 0, 'testimony 12', 'resources/videos/testimony-12.mp4', 'resources/videos/testimony-12.png'),
(27, 0, 'testimony 13', 'resources/videos/testimony-13.mp4', 'resources/videos/testimony-13.png'),
(28, 0, 'testimony 14', 'resources/videos/testimony-14.mp4', 'resources/videos/testimony-14.png'),
(29, 0, 'testimony 15', 'resources/videos/testimony-15.mp4', 'resources/videos/testimony-15.png'),
(30, 0, 'testimony 16', 'resources/videos/testimony-16.mp4', 'resources/videos/testimony-16.png'),
(31, 0, 'testimony 17', 'resources/videos/testimony-17.mp4', 'resources/videos/testimony-17.png'),
(32, 0, 'testimony 18', 'resources/videos/testimony-18.mp4', 'resources/videos/testimony-18.png'),
(33, 0, 'testimony 19', 'resources/videos/testimony-19.mp4', 'resources/videos/testimony-19.png'),
(34, 0, 'testimony 20', 'resources/videos/testimony-20.mp4', 'resources/videos/testimony-20.png'),
(35, 0, 'testimony 21', 'resources/videos/testimony-21.mp4', 'resources/videos/testimony-21.png'),
(36, 0, 'testimony 22', 'resources/videos/testimony-22.mp4', 'resources/videos/testimony-22.png'),
(37, 0, 'testimony 23', 'resources/videos/testimony-23.mp4', 'resources/videos/testimony-23.png'),
(38, 0, 'testimony 24', 'resources/videos/testimony-24.mp4', 'resources/videos/testimony-24.png'),
(39, 0, 'testimony 25', 'resources/videos/testimony-25.mp4', 'resources/videos/testimony-25.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `attenders`
--
ALTER TABLE `attenders`
  ADD PRIMARY KEY (`attendee_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`serial_no`),
  ADD KEY `userid_3` (`user_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `inbox_message`
--
ALTER TABLE `inbox_message`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `post_response`
--
ALTER TABLE `post_response`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_ordered`
--
ALTER TABLE `products_ordered`
  ADD PRIMARY KEY (`serial_no`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `random_message`
--
ALTER TABLE `random_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `post_code` (`post_code`,`user_id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attenders`
--
ALTER TABLE `attenders`
  MODIFY `attendee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `serial_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `serial_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `inbox_message`
--
ALTER TABLE `inbox_message`
  MODIFY `serial_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `serial_no` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_response`
--
ALTER TABLE `post_response`
  MODIFY `serial_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `products_ordered`
--
ALTER TABLE `products_ordered`
  MODIFY `serial_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `random_message`
--
ALTER TABLE `random_message`
  MODIFY `message_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_userid_fk` FOREIGN KEY (`user_id`) REFERENCES `account` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `referrals`
--
ALTER TABLE `referrals`
  ADD CONSTRAINT `referral_userid_fk` FOREIGN KEY (`user_id`) REFERENCES `account` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `session_userid_fk` FOREIGN KEY (`user_id`) REFERENCES `account` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
