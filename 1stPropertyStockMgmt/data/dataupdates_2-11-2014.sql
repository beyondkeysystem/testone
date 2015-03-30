UPDATE `pdcisinl_myviko`.`property` SET `property_initial_price` = '3000', `property_current_price` = '4000' WHERE `property`.`id` = 9; UPDATE `pdcisinl_myviko`.`property` SET `property_initial_price` = '2000', `property_current_price` = '3000', `property_price_last_update` = '2000' WHERE `property`.`id` = 10; UPDATE `pdcisinl_myviko`.`property` SET `property_initial_price` = '3222', `property_current_price` = '5222', `property_price_last_update` = '52222' WHERE `property`.`id` = 11; UPDATE `pdcisinl_myviko`.`property` SET `property_initial_price` = '2345', `property_current_price` = '5678' WHERE `property`.`id` = 12; UPDATE `pdcisinl_myviko`.`property` SET `property_initial_price` = '2345', `property_current_price` = '5643', `property_price_last_update` = '5643' WHERE `property`.`id` = 13; UPDATE `pdcisinl_myviko`.`property` SET `property_initial_price` = '4567', `property_current_price` = '2345' WHERE `property`.`id` = 14; UPDATE `pdcisinl_myviko`.`property` SET `property_initial_price` = '21334', `property_current_price` = '1234' WHERE `property`.`id` = 15; UPDATE `pdcisinl_myviko`.`property` SET `property_initial_price` = '6789', `property_current_price` = '7896' WHERE `property`.`id` = 16; UPDATE `pdcisinl_myviko`.`property` SET `property_initial_price` = '3453', `property_current_price` = '3421' WHERE `property`.`id` = 17;

ALTER TABLE `user_property` ADD `profit` INT NOT NULL AFTER `property_share_in_per`;
ALTER TABLE `user_property` ADD `loss` INT NOT NULL AFTER `profit`;


ALTER TABLE `user_property` CHANGE `property_status` `property_status` VARCHAR(100) NOT NULL;

ALTER TABLE `user_property` DROP `property_status`;

ALTER TABLE `property` ADD `property_image` VARCHAR( 100 ) NOT NULL

ALTER TABLE `membership` ADD `img_path` VARCHAR( 100 ) NOT NULL 
