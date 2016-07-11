SELECT 
        e.id as id_est,
        e.nombre,
        e.direccion,
        c.id as id_can,
        c.nombre_cancha,
        c.cant_jugadores,
        GROUP_CONCAT(ta.horaInicio ORDER BY ta.horaInicio DESC SEPARATOR ','),
        GROUP_CONCAT(ta.horaFin ORDER BY ta.horaFin DESC SEPARATOR ','),
        ta.precio_cancha 
        FROM turnoadmin as ta 
        LEFT JOIN turnousuario as tu ON tu.id_turnoAdmin = ta.id 
        INNER JOIN cancha as c ON ta.id_cancha = c.id 
        INNER JOIN establecimiento as e ON c.id_establecimiento = e.id 
        WHERE id_dia = 1 AND tu.id_turnoAdmin IS NULL
        GROUP BY (c.id)
        ORDER BY e.id,c.id DESC





SELECT e.id AS id_est,e.nombre,e.direccion,
c.id as id_can,c.nombre_cancha,c.cant_jugadores,
ta.horaInicio,ta.horaFin,ta.precio_cancha
FROM turnoadmin as ta 
LEFT JOIN turnousuario as tu ON tu.id_turnoAdmin = ta.id
INNER JOIN cancha as c ON ta.id_cancha = c.id
INNER JOIN establecimiento as e ON c.id_establecimiento = e.id
WHERE id_dia = 1  AND tu.id_turnoAdmin IS NULL