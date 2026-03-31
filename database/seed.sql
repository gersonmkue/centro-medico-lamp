USE centro_medico;

-- Usuario de prueba (password: 1234)
INSERT INTO usuarios (username, password)
VALUES (
    'admin',
    '$2y$10$wHcXQk9J5kZ8x1w6Gz7Z2uYzYQz0Fv6vZ5K5J5lZ9zJ5Z5Z5Z5Z5Z'
);

-- Pacientes de ejemplo
INSERT INTO pacientes (nombre, edad, telefono) VALUES
('Juan Perez', 30, '6641234567'),
('Maria Lopez', 25, '6647654321'),
('Carlos Ramirez', 40, '6649998888');
