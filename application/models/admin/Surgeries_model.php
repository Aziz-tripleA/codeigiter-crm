<?php 
defined('BASEPATH') or exit('No direct script access allowed');


class Surgeries_model extends CI_Model
{
    public function surgeries_list()
    {
        $data = $this->db->select('*')
        ->from('surgeries')
        ->get()
        ->result();

        return $data;
    }


    /**
     * 
     * store new clinic 
     */
    public function surgeries_create($data)
    {
        $this->db->insert('surgeries',$data);
    }


    /**
     * get clinic for edit from clinics tbl
     */

    public function get_surgery($id)
    {
        return $this->db->select('*')
        ->from('surgeries')
        ->where('id',$id)
        ->get()
        ->row();

    }

    public function surgery_update($data , $id)
    {
        $this->db->where('id',$id)->update('surgeries',$data);
    }
}
