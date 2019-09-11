<?php

class Peoples_model extends CI_model
{
    public function getAllData()
    {
        return $this->db->get('peoples')->result_array();
    }

    public function getDataById($id)
    {
        return $this->db->get_where('peoples', ['id' => $id])->row_array();
    }

    public function getData($limit, $start) {
        return $this->db->get('peoples', $limit, $start)->result_array();
    }

    public function countAllPeoples()
    {
        return $this->db->get('peoples')->num_rows();
    }
}
