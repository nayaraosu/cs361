CREATE TABLE IF NOT EXISTS `goals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `reward` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `end_goal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
)
