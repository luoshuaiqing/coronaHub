CREATE TABLE `post_comment` (
  `post_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `comment_author_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `publish_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `reply_time` datetime NOT NULL,
  `parent_id` int(11) NOT NULL,
  `thumb_up` int(11) NOT NULL,
  `thumb_down` int(11) NOT NULL,
  PRIMARY KEY (`post_comment_id`),
  UNIQUE KEY `post_comment_id_UNIQUE` (`post_comment_id`),
  KEY `post_id_idx` (`post_id`),
  KEY `author_id_idx` (`comment_author_id`),
  CONSTRAINT `comment_author_id` FOREIGN KEY (`comment_author_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
