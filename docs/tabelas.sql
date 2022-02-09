CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `perguntas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `texto` varchar(200) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `respostas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pergunta_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `texto` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_pergunta_id_idx` (`pergunta_id`),
  KEY `fk_usuario_id_idx` (`usuario_id`),
  CONSTRAINT `fk_respostas_pergunta_id` FOREIGN KEY (`pergunta_id`) REFERENCES `perguntas` (`id`),
  CONSTRAINT `fk_respostas_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `avaliacoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `resposta_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `voto` tinytext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_resposta_id_idx` (`resposta_id`) /*!80000 INVISIBLE */,
  KEY `fk_usuario_id_idx` (`usuario_id`),
  CONSTRAINT `fk_avaliacoes_resposta_id` FOREIGN KEY (`resposta_id`) REFERENCES `respostas` (`id`),
  CONSTRAINT `fk_avaliacoes_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `log_tb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data_log` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `texto` varchar(500) NOT NULL,
  `status` int DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
