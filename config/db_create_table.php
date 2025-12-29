<?php 

include("db_connect.php")

CREATE TABLE `users` (
`id` int(11) NOT NULL,
`f_name` varchar(100) NOT NULL,
`l_name` varchar(150) NOT NULL,
`password` varchar(200) NOT NULL,
`email` varchar(255) NOT NULL,
`created_at` timestamp NOT NULL DEFAULT current_timestamp(),
`updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
`address` varchar(255) DEFAULT NULL,
`phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;


?>