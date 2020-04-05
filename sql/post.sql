CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `path1` varchar(100) DEFAULT NULL,
  `path2` varchar(100) DEFAULT NULL,
  `publish_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `reply_time` datetime NOT NULL,
  `thumb_up` int(11) NOT NULL,
  `thumb_down` int(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_id_UNIQUE` (`post_id`),
  KEY `author_id_idx` (`author_id`),
  CONSTRAINT `author_id` FOREIGN KEY (`author_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
