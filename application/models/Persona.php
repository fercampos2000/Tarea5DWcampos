<?php
class Persona extends CI_Model
{
    public function agregar($persona)
    {
        $this->db->insert('alumnos', $persona);
    }
    public function seleccionar_todo()
    {
        $this->db->select('*');   
        $this->db->from('alumnos');
        return $this->db->get()->result();
    }
    public function eliminar($id_persona) {
        $this->db->where('alumno', $id_persona);
        $this->db->delete('alumnos');
    }
    public function actualizar($persona, $id_alumno) {
        $this->db->where('alumno', $id_alumno);
        $this->db->update('alumnos', $persona);
    }
}

?> 