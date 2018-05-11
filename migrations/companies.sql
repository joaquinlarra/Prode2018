ALTER TABLE `companies` DROP `points_match`, DROP `points_exact_match`;
ALTER TABLE `companies` CHANGE `colors` `custom_css` TEXT NULL DEFAULT NULL;


ALTER TABLE `companies` ADD `contact_email` VARCHAR(255) NOT NULL AFTER `default_user_id`;

ALTER TABLE `companies` ADD `email_owners` TEXT NOT NULL AFTER `contact_email`;

ALTER TABLE  `companies` ADD  `register_code` VARCHAR( 10 ) NOT NULL ;
