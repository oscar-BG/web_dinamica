# hacemos uso de la base de datos panel_control
# Tabla de los usuario
CREATE TABLE tm_usuario(
	usu_id INT auto_increment,
	usu_nom varchar(150),
	usu_correo varchar(200),
	usu_pass varchar(255),
	est int ,
	PRIMARY KEY (usu_id)	
)

# Creamos un procedimiento alamcenado para registrar usuarios
DELIITER $$
CREATE PROCEDURE insert_tmusuario(
	IN p_nom VARCHAR(150),
	IN p_correo VARCHAR(200),
	IN p_pass VARCHAR(255)
)
BEGIN
	INSERT INTO tm_usuario(usu_nom, usu_correo, usu_pass, est) VALUES (p_nom, p_correo, p_pass, 1);
END$$

# Procedimiento almacenado para verificar correo
DELIMITER $$
CREATE PROCEDURE get_email(
    IN p_correo VARCHAR(200)
)
BEGIN
	SELECT usu_correo, est FROM tm_usuario WHERE usu_correo=p_correo AND est=1;
END$$