-- PRODCEDIMIENTOS ALMACENADOS
USE senatimat;

DELIMITER $$
CREATE PROCEDURE spu_estudiantes_listar()
BEGIN
	
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

/*update estudiantes
	set fotografia = NULL
	where fotografia = '32e36f8a0bd466a48a5107b287ac4f2e2f9588c0.jpg' or
			fotografia  = '';*/
			
CALL spu_estudiantes_listar();

DELIMITER $$
CREATE PROCEDURE spu_estudiantes_registrar(
	IN apellidos_ 				VARCHAR(40),
	IN nombres_ 				VARCHAR(40),
	IN tipodocumento_ 		CHAR(1),
	IN nrodocumento_ 			CHAR(8),
	IN fechanacimiento_ 		DATE,
	IN idcarrera_ 				INT,
	IN idsede_ 					INT,
	IN fotografia_ 			VARCHAR(100)
)
BEGIN

	-- Validar el contenido de fotografía (CAMPO NULL)
	IF fotografia_ = '' THEN 
		SET fotografia_ = NULL;
	END IF;
	
	INSERT INTO estudiantes 
	(apellidos, nombres, tipodocumento, nrodocumento, fechanacimiento, idcarrera, idsede, fotografia) VALUES
	(apellidos_, nombres_, tipodocumento_, nrodocumento_, fechanacimiento_, idcarrera_, idsede_, fotografia_);
END $$
CALL spu_estudiantes_registrar('Yeren Carbajal', 'Margarita', 'D', '21819126', '1972-08-05', 5, 1, '');
CALL spu_estudiantes_registrar('Yeren Carbajal', 'Patricia', 'C', '4390657', '1980-01-15', 5, 1, '');
SELECT * FROM estudiantes;


-- PROCEDIMIENTO PARA LISTAR COLABORADOR
DELIMITER $$
CREATE PROCEDURE spu_colaboradores_listar()
BEGIN
	SELECT 	COL.idcolaborador,
				COL.apellidos, COL.nombres,
				CARG.cargo,
				SED.sede,
				COL.telefono,
				COL.direccion,
				COL.tipocontrato, 
				COL.cv
	FROM colaboradores COL
	INNER JOIN cargos CARG ON CARG.idcargo = COL.idcargo
	INNER JOIN sedes 	SED  ON SED.idsede = COL.idsede
	WHERE COL.estado = '1';				
END$$
CALL spu_colaboradores_listar();


-- PROCEDIMIENTO ALMACENADO PARA REGISTRAR COLABORADORES
DELIMITER $$
CREATE PROCEDURE spu_colaboradores_registrar(
	IN apellidos_ 				VARCHAR(40),
	IN nombres_ 				VARCHAR(40),
	IN idcargo_					INT,
	IN idsede_ 					INT,
	IN telefono_ 				CHAR(9),
	IN direccion_				VARCHAR(40),
	IN tipocontrato_			CHAR(1),
	IN cv_ 						VARCHAR(100)
)
BEGIN
	-- VALIDACION DEL CONTENIDO CV (COMO CAMPO NULL)
	IF cv_ = '' THEN
		SET cv_ = NULL;
	END IF;
		
	INSERT INTO colaboradores
	(apellidos, nombres, idcargo, idsede, telefono, direccion, tipocontrato, cv) VALUES
	(apellidos_, nombres_, idcargo_, idsede_, telefono_, direccion_, tipocontrato_, cv_);
END $$

CALL spu_colaboradores_registrar('Francia Minaya','Jhon Edward',1,1,'Calle Colón - Pueblo Nuevo','956834915','C','');
SELECT * FROM colaboradores;




-- PROCEDIMIENTO DE SEDES, EESCUELAS, CARGOS y CARRERAS LISTAR
DELIMITER $$
CREATE PROCEDURE spu_cargos_listar()
BEGIN
	SELECT * FROM cargos ORDER BY 2;
END $$

DELIMITER $$
CREATE PROCEDURE spu_sedes_listar()
BEGIN
	SELECT * FROM sedes ORDER BY 2;
END $$

DELIMITER $$
CREATE PROCEDURE spu_escuelas_listar()
BEGIN
	SELECT * FROM escuelas ORDER BY 2;
END $$
CALL spu_escuelas_listar();

DELIMITER $$
CREATE PROCEDURE spu_carreras_listar(IN idescuela_ INT)
BEGIN
	SELECT idcarrera, carrera
	 FROM carreras
	 WHERE idescuela = idescuela_;
END $$

CALL spu_carreras_listar(3);
