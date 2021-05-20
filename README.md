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