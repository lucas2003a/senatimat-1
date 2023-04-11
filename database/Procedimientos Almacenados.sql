-- PRODCEDIMIENTOS ALMACENADOS
USE senatimat;

DELIMITER $$
CREATE PROCEDURE spu_estudiantes_listar()
BEGIN
	SELECT * FROM estudiantes;
	
	SELECT 	EST.idestudiante,
				EST.apellidos, EST.nombres,
				EST.tipodocumento, EST.nrodocumento,
				EST.fechanacimiento,
				ESC.escuela,
				CAR.carrera,
				SED.sede,
				EST.fotografia
		FROM estudiantes EST
		INNER JOIN carreras CAR ON CAR.idcarrera = EST.idcarrera
		INNER JOIN sedes 	SED	ON SED.idsede = EST.idsede 
		INNER JOIN escuelas ESC ON ESC.idescuela = CAR.idescuela
		WHERE EST.estado = '1';
END $$

DELIMITER $$
CREATE PROCEDURE spu_estudiantes_registrar()
BEGIN
END $$

DELIMITER $$
CREATE PROCEDURE spu_estudiantes_listar()
BEGIN
END $$