ALTER TABLE `companies` DROP `points_match`, DROP `points_exact_match`;
ALTER TABLE `companies` CHANGE `colors` `custom_css` TEXT NULL DEFAULT NULL;