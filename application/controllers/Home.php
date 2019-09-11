<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peoples_model');
        $this->load->library('form_validation');
    }

    // menampilkan semua data
    public function index()
    {
        $data['title'] = 'List Of Data';
        // Pagination
        $this->load->library('pagination');

        // config
        $config['base_url'] = 'http://localhost/sbadmin/home/index/';
        $config['total_rows'] = $this->Peoples_model->countAllPeoples();
        $config['per_page'] = 5;
        $config['num_links'] = 2;

        // styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');



        // initialize
        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(3);
        $data['peoples'] = $this->Peoples_model->getData($config['per_page'], $data['start']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    // tambah data baru
    public function tambahData()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[peoples.email]', [
            'is_unique' => 'This email has been added, replace the others.'
        ]);
        $this->form_validation->set_rules('address', 'Address', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Data';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('home/tambah');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'address' => htmlspecialchars($this->input->post('address', true)),
                'email' => htmlspecialchars($this->input->post('email', true))
            ];
            $this->db->insert('peoples', $data);
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('home');
        }
    }

    // detail data
    public function detailData($id)
    {
        $data['peoples'] = $this->Peoples_model->getDataById($id);
        $data['title'] = 'Detail Data';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('home/detail', $data);
        $this->load->view('templates/footer');
    }

    // Delete Data
    public function deleteData($id)
    {
        $this->db->delete('peoples', ['id' => $id]);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('home');
    }

    // Edit Data
    public function editData($id)
    {

        $data['peoples'] = $this->Peoples_model->getDataById($id);
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('address', 'Address', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Data';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('home/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'address' => htmlspecialchars($this->input->post('address', true)),
                'email' => htmlspecialchars($this->input->post('email', true))
            ];
            $this->db->where('id', $id);
            $this->db->update('peoples', $data);
            $this->session->set_flashdata('message', 'Diubah');
            redirect('home');
        }
    }
}
