<?php defined('BASEPATH') or exit('No direct script access allowed');


class Procedure_model extends CI_Model
{
    public function procedures_list()
    {
        $data = $this->db->select('*')
        ->from('procedures')
        ->get()
        ->result();

        return $data;
    }
    public function procedure_create($data)
    {
        $this->db->insert('procedures', $data);
    }


    /*
    |------------------------------------------------
    |  get procedure
    |------------------------------------------------
    */
    public function get_procedure($id=null)
    {
        return $result = $query = $this->db->select("*")
       ->from("procedures")
       ->where("id", $id)
       ->get()->row();
    }


    /*
    |------------------------------------------------
    |  update procedure to procedures tbl 
    |------------------------------------------------
    */
    

    public function save_edit_procedure($savedata,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('procedures',$savedata);
    }

}
