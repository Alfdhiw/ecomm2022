<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('MakananModel'); // Load MakananModel yang ada di folder models
    }


    public function index()
    {
        redirect("data/lists"); // Untuk redirect ke function lists
    }

    public function lists()
    {
        $data['title'] = 'Menu Makanan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['model'] = $this->MakananModel->view(); // Panggil fungsi view() yang ada di model makanan

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/index', $data);
        $this->load->view('templates/footer');
    }
}
