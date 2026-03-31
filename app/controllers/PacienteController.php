// app/controllers/PacienteController.php

require_once '../models/Paciente.php';

class PacienteController {
    public function registrar($data) {
        $paciente = new Paciente();
        return $paciente->guardar($data);
    }
}
