<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tglindo');
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('User_model', 'get_laporan');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['data_standar1'] = $this->get_laporan->countStandar1();
        $data['data_standar2'] = $this->get_laporan->countStandar2();
        $data['data_standar3'] = $this->get_laporan->countStandar3();
        $data['data_standar4'] = $this->get_laporan->countStandar4();
        $data['data_standar5'] = $this->get_laporan->countStandar5();
        $data['data_standar6'] = $this->get_laporan->countStandar6();
        $data['data_standar7'] = $this->get_laporan->countStandar7();
        $data['data_standar8'] = $this->get_laporan->countStandar8();
        $data['data_standar9'] = $this->get_laporan->countStandar9();                
        $data['dok_kerja'] = $this->get_laporan->countDokKerja();
        $data['dok_pribadi'] = $this->get_laporan->countDokPribadi();

        $data['standar1_saya'] = $this->get_laporan->getStandar1Limit();
        $data['standar2_saya'] = $this->get_laporan->getStandar2Limit();
        $data['standar3_saya'] = $this->get_laporan->getStandar3Limit();
        $data['standar4_saya'] = $this->get_laporan->getStandar4Limit();
        $data['standar5_saya'] = $this->get_laporan->getStandar5Limit();
        $data['standar6_saya'] = $this->get_laporan->getStandar6Limit();
        $data['standar7_saya'] = $this->get_laporan->getStandar7Limit();
        $data['standar8_saya'] = $this->get_laporan->getStandar8Limit();
        $data['standar9_saya'] = $this->get_laporan->getStandar9Limit();                
        $data['dok_kerja_saya'] = $this->get_laporan->getDokKerjaLimit();
        $data['dok_pribadi_saya'] = $this->get_laporan->getDokPribadiLimit();

        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['standar1_saya'] = $this->get_laporan->getStandar1Limit();
        $data['standar2_saya'] = $this->get_laporan->getStandar2Limit();
        $data['standar3_saya'] = $this->get_laporan->getStandar3Limit();
        $data['standar4_saya'] = $this->get_laporan->getStandar4Limit();
        $data['standar5_saya'] = $this->get_laporan->getStandar5Limit();
        $data['standar6_saya'] = $this->get_laporan->getStandar6Limit();
        $data['standar7_saya'] = $this->get_laporan->getStandar7Limit();
        $data['standar8_saya'] = $this->get_laporan->getStandar8Limit();
        $data['standar9_saya'] = $this->get_laporan->getStandar9Limit();        
        $data['dok_kerja_saya'] = $this->get_laporan->getDokKerjaLimit();
        $data['dok_pribadi_saya'] = $this->get_laporan->getDokPribadiLimit();

        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profile()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'My Profile';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['id']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Update Gagal</div>');
                    redirect('user/edit_profile');
                }
            }
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $this->db->set('nama', $nama);
            $this->db->where('id', $id);
            $this->db->update('mst_user');
            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_profile');
        }
    }

    public function changePassword()
    {
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password1', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubah Password';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">GAGAL..... Password baru tidak boleh sama dengan password lama</div>');
                redirect('user/edit_profile');
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('username', $this->session->userdata('username'));
                $this->db->update('mst_user');
                $this->session->set_flashdata('message', 'Ubah password');
                redirect('user/edit_profile');
            }
        }
    }

    public function standar1()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Standar 1';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar1_saya'] = $this->get_laporan->getStandar1();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/standar1', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar|txt';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar1/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar1/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_file' => $this->input->post('nama_file'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('standar1', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/standar1');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/standar1');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/standar1');
            }
        }
    }

    public function edit_standar1($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Standar1';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar1'] = $this->db->get_where('standar1', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_standar1', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar1/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['standar1']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar1/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_standar1/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
            $this->db->where('id', $id);
            $this->db->update('standar1');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_standar1/' . $id);
        }
    }

    public function file_download_standar1($id)
    {
        $data = $this->db->get_where('standar1', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/standar1/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/standar1/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_standar1($id)
    {
        $_id = $this->db->get_where('standar1', ['id' => $id])->row();
        $query = $this->db->delete('standar1', ['id' => $id]);
        if ($query) {
            unlink("assets/files/standar1/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/standar1');
    }

    public function standar2()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Standar 2';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar2_saya'] = $this->get_laporan->getStandar2();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/standar2', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar2/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar2/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_file' => $this->input->post('nama_file'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('standar2', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/standar2');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/standar2');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/standar2');
            }
        }
    }

    public function edit_standar2($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Standar 2';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar2'] = $this->db->get_where('standar2', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_standar2', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar2/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['standar2']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar2/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_standar2/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
            $this->db->where('id', $id);
            $this->db->update('standar2');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_standar2/' . $id);
        }
    }

    public function file_download_standar2($id)
    {
        $data = $this->db->get_where('standar2', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/standar2/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/standar2/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_standar2($id)
    {
        $_id = $this->db->get_where('standar2', ['id' => $id])->row();
        $query = $this->db->delete('standar2', ['id' => $id]);
        if ($query) {
            unlink("assets/files/standar2/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/standar2');
    }


    public function standar3()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Standar 3';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar3_saya'] = $this->get_laporan->getStandar3();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/standar3', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar3/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar3/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_file' => $this->input->post('nama_file'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('standar3', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/standar3');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/standar3');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/standar3');
            }
        }
    }

    public function edit_standar3($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Standar 3';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar3'] = $this->db->get_where('standar3', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_standar3', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar3/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['standar3']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar3/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_standar3/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
            $this->db->where('id', $id);
            $this->db->update('standar3');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_standar3/' . $id);
        }
    }

    public function file_download_standar3($id)
    {
        $data = $this->db->get_where('standar3', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/standar3/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/standar3/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_standar3($id)
    {
        $_id = $this->db->get_where('standar3', ['id' => $id])->row();
        $query = $this->db->delete('standar3', ['id' => $id]);
        if ($query) {
            unlink("assets/files/standar3/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/standar3');
    }

    public function standar4()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Standar 4';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar4_saya'] = $this->get_laporan->getStandar4();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/standar4', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar4/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar4/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_file' => $this->input->post('nama_file'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('standar4', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/standar4');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/standar4');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/standar4');
            }
        }
    }

    public function edit_standar4($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Standar 4';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar4'] = $this->db->get_where('standar4', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_standar4', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar4/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['standar4']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar4/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_standar4/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
            $this->db->where('id', $id);
            $this->db->update('standar4');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_standar4/' . $id);
        }
    }

    public function file_download_standar4($id)
    {
        $data = $this->db->get_where('standar4', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/standar4/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/standar4/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_standar4($id)
    {
        $_id = $this->db->get_where('standar4', ['id' => $id])->row();
        $query = $this->db->delete('standar4', ['id' => $id]);
        if ($query) {
            unlink("assets/files/standar4/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/standar4');
    }

    public function standar5()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Standar 5';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar5_saya'] = $this->get_laporan->getStandar5();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/standar5', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar5/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar5/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_file' => $this->input->post('nama_file'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('standar5', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/standar5');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/standar5');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/standar5');
            }
        }
    }

    public function edit_standar5($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Standar 5';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar5'] = $this->db->get_where('standar5', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_standar5', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar5/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['standar5']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar5/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_standar5/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
            $this->db->where('id', $id);
            $this->db->update('standar5');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_standar5/' . $id);
        }
    }

    public function file_download_standar5($id)
    {
        $data = $this->db->get_where('standar5', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/standar5/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/standar5/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_standar5($id)
    {
        $_id = $this->db->get_where('standar5', ['id' => $id])->row();
        $query = $this->db->delete('standar5', ['id' => $id]);
        if ($query) {
            unlink("assets/files/standar5/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/standar5');
    }

    public function standar6()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Standar 6';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar6_saya'] = $this->get_laporan->getStandar6();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/standar6', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar6/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar6/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_file' => $this->input->post('nama_file'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('standar6', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/standar6');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/standar6');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/standar6');
            }
        }
    }

    public function edit_standar6($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Standar 6';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar6'] = $this->db->get_where('standar6', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_standar6', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar6/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['standar6']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar6/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_standar6/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
            $this->db->where('id', $id);
            $this->db->update('standar6');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_standar6/' . $id);
        }
    }

    public function file_download_standar6($id)
    {
        $data = $this->db->get_where('standar4', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/standar6/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/standar6/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_standar6($id)
    {
        $_id = $this->db->get_where('standar6', ['id' => $id])->row();
        $query = $this->db->delete('standar6', ['id' => $id]);
        if ($query) {
            unlink("assets/files/standar6/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/standar6');
    }

    public function standar7()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Standar 7';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar7_saya'] = $this->get_laporan->getStandar7();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/standar7', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar7/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar7/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_file' => $this->input->post('nama_file'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('standar7', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/standar7');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/standar7');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/standar7');
            }
        }
    }

    public function edit_standar7($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Standar 7';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar7'] = $this->db->get_where('standar7', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_standar7', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar7/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['standar7']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar7/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_standar7/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
            $this->db->where('id', $id);
            $this->db->update('standar7');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_standar7/' . $id);
        }
    }

    public function file_download_standar7($id)
    {
        $data = $this->db->get_where('standar7', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/standar7/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/standar7/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_standar7($id)
    {
        $_id = $this->db->get_where('standar7', ['id' => $id])->row();
        $query = $this->db->delete('standar7', ['id' => $id]);
        if ($query) {
            unlink("assets/files/standar7/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/standar7');
    }

    public function standar8()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Standar 8';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar8_saya'] = $this->get_laporan->getStandar8();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/standar8', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar8/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar8/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_file' => $this->input->post('nama_file'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('standar8', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/standar8');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/standar8');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/standar8');
            }
        }
    }

    public function edit_standar8($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Standar 8';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar8'] = $this->db->get_where('standar8', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_standar8', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar8/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['standar8']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar8/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_standar8/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
            $this->db->where('id', $id);
            $this->db->update('standar8');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_standar8/' . $id);
        }
    }

    public function file_download_standar8($id)
    {
        $data = $this->db->get_where('standar8', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/standar8/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/standar8/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_standar8($id)
    {
        $_id = $this->db->get_where('standar8', ['id' => $id])->row();
        $query = $this->db->delete('standar8', ['id' => $id]);
        if ($query) {
            unlink("assets/files/standar8/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/standar8');
    }

    public function standar9()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Standar 9';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar9_saya'] = $this->get_laporan->getStandar9();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/standar9', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar9/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar9/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_file' => $this->input->post('nama_file'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('standar9', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/standar9');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/standar9');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/standar9');
            }
        }
    }

    public function edit_standar9($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Standar 9';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['standar9'] = $this->db->get_where('standar9', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_standar9', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/standar9/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['standar9']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/standar9/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_standar9/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
            $this->db->where('id', $id);
            $this->db->update('standar9');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_standar9/' . $id);
        }
    }

    public function file_download_standar9($id)
    {
        $data = $this->db->get_where('standar9', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/standar9/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/standar9/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_standar9($id)
    {
        $_id = $this->db->get_where('standar9', ['id' => $id])->row();
        $query = $this->db->delete('standar9', ['id' => $id]);
        if ($query) {
            unlink("assets/files/standar9/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/standar9');
    }

    public function dok_kerja()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Dokumen Kerja';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['dok_kerja_saya'] = $this->get_laporan->getDokKerja();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/dok_kerja', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar|txt';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/dok_kerja/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/dok_kerja/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_file' => $this->input->post('nama_file'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('dok_kerja', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/dok_kerja');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/dok_kerja');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/dok_kerja');
            }
        }
    }

    public function edit_dok_kerja($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Dokumen Kerja';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['dok_kerja'] = $this->db->get_where('dok_kerja', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_dok_kerja', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/dok_kerja/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['dok_kerja']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/dok_kerja/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_dok_kerja/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
            $this->db->where('id', $id);
            $this->db->update('dok_kerja');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_dok_kerja/' . $id);
        }
    }

    public function file_download_dok_kerja($id)
    {
        $data = $this->db->get_where('dok_kerja', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/dok_kerja/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/dok_kerja/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_dok_kerja($id)
    {
        $_id = $this->db->get_where('dok_kerja', ['id' => $id])->row();
        $query = $this->db->delete('dok_kerja', ['id' => $id]);
        if ($query) {
            unlink("assets/files/dok_kerja/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/dok_kerja');
    }

    public function dok_pribadi()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Dokumen Pribadi';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['dok_pribadi_saya'] = $this->get_laporan->getDokPribadi();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/dok_pribadi', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar|txt';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/dok_pribadi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/dok_pribadi/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_file' => $this->input->post('nama_file'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('dok_pribadi', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/dok_pribadi');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/dok_pribadi');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/dok_pribadi');
            }
        }
    }

    public function edit_dok_pribadi($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Dokumen Pribadi';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['dok_pribadi'] = $this->db->get_where('dok_pribadi', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_dok_pribadi', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/dok_pribadi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['dok_pribadi']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/dok_pribadi/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_dok_pribadi/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
            $this->db->where('id', $id);
            $this->db->update('dok_pribadi');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_dok_pribadi/' . $id);
        }
    }

    public function file_download_dok_pribadi($id)
    {
        $data = $this->db->get_where('dok_pribadi', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/dok_pribadi/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/dok_pribadi/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_dok_pribadi($id)
    {
        $_id = $this->db->get_where('dok_pribadi', ['id' => $id])->row();
        $query = $this->db->delete('dok_pribadi', ['id' => $id]);
        if ($query) {
            unlink("assets/files/dok_pribadi/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/dok_pribadi');
    }
}
