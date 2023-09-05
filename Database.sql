-- Adminer 4.8.1 MySQL 8.1.0 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions`
(
    `id`               bigint                                  NOT NULL AUTO_INCREMENT,
    `telegram_id`      bigint                                  NOT NULL,
    `amount`           bigint                                  NOT NULL,
    `server`           varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
    `service_username` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
    `created_at`       timestamp                               NOT NULL ON UPDATE CURRENT_TIMESTAMP,
    `updated_at`       timestamp                               NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_persian_ci;


DROP TABLE IF EXISTS `wallets`;
CREATE TABLE `wallets`
(
    `telegram_id`       bigint                                  NOT NULL,
    `telegram_username` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
    `name`              varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
    `mobile`            varchar(10) COLLATE utf8mb4_persian_ci  NOT NULL,
    `amount`            int                                     NOT NULL,
    `created_at`        timestamp                               NOT NULL ON UPDATE CURRENT_TIMESTAMP,
    `updated_at`        timestamp                               NOT NULL,
    UNIQUE KEY `telegram_id` (`telegram_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_persian_ci;


-- 2023-08-30 10:07:14