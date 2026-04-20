CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Varsayılan şifre: 123456 (password_hash ile bcrypt olarak şifrelenmiştir)
INSERT INTO `users` (`name`, `email`, `password`) VALUES
('Eka Admin', 'admin@eka.com', '$2y$10$wN9aOINB4k0q1g7P.GZ/p.6Z3aXYwH./qB.0/zS.h1h5y6S8H6c5m');
