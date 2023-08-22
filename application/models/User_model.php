<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{

    public function countStandar1()
    {
        $id_user =  $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as standar1
                               FROM standar1
                               WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->standar1;
        } else {
            return 0;
        }
    }

    public function countStandar2()
    {
        $id_user =  $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as standar2
                               FROM standar2
                               WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->standar2;
        } else {
            return 0;
        }
    }

    public function countStandar3()
    {
        $id_user =  $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as standar3
                               FROM standar3
                               WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->standar3;
        } else {
            return 0;
        }
    }

    public function countStandar4()
    {
        $id_user = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as standar4
                        FROM standar4
                        WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->standar4;
        } else {
            return 0;
        }
    }

    public function countStandar5()
    {
        $id_user = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as standar5
                        FROM standar5
                        WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->standar5;
        } else {
            return 0;
        }
    }

    public function countStandar6()
    {
        $id_user = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as standar6
                        FROM standar6
                        WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->standar6;
        } else {
            return 0;
        }
    }

    public function countStandar7()
    {
        $id_user = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as standar7
                        FROM standar7
                        WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->standar7;
        } else {
            return 0;
        }
    }

    public function countStandar8()
    {
        $id_user = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as standar8
                        FROM standar8
                        WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->standar8;
        } else {
            return 0;
        }
    }

    public function countStandar9()
    {
        $id_user = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as standar9
                        FROM standar9
                        WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->standar9;
        } else {
            return 0;
        }
    }

    public function countDokKerja()
    {
        $id_user = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as dok_kerja
                        FROM dok_kerja
                        WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->dok_kerja;
        } else {
            return 0;
        }
    }

    public function countDokPribadi()
    {
        $id_user = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as dok_pribadi
                        FROM dok_pribadi
                        WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->dok_pribadi;
        } else {
            return 0;
        }
    }

    public function getStandar1Limit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar1');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar2Limit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar2');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar3Limit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar3');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar4Limit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar4');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar5Limit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar5');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar6Limit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar6');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar7Limit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar7');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar8Limit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar8');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar9Limit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar9');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getDokKerjaLimit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('dok_kerja');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getDokPribadiLimit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('dok_pribadi');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar1()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar1');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar2()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar2');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar3()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar3');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar4()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar4');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar5()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar5');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar6()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar6');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar7()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar7');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar8()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar8');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getStandar9()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('standar9');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getDokKerja()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('dok_kerja');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getDokPribadi()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('dok_pribadi');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }
}