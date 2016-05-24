SELECT 
		e.id as id_est,e.nombre,e.direccion,
 		c.id as id_can,c.nombre_cancha,c.cant_jugadores,
 		ta.horaInicio,ta.horaFin,ta.precio_cancha 
FROM turnoadmin as ta 
LEFT JOIN turnousuario as tu ON tu.id_turnoAdmin = ta.id 
INNER JOIN cancha as c ON ta.id_cancha = c.id 
INNER JOIN establecimiento as e ON c.id_establecimiento = e.id 
WHERE id_dia = 1 AND tu.id_turnoAdmin IS NULL