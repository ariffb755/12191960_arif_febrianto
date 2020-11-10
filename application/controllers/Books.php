<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Books extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'List of Books';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Books_model', 'books');
        $data['buku']  = $this->books->get_data('buku')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('books/index', $data);
        $this->load->view('templates/footer');
    }

    function bookDetails($id)
    {
        $where = array('id_buku' => $id);
        $data['buku'] = $this->db->query("SELECT * FROM buku B, kategori K WHERE B.id_kategori=K.id_kategori AND B.id_buku='1'")->result();
        $data['kategori'] = $this->M_perpus->get_data('kategori')->result();
    }
}
