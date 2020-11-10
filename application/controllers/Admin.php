<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=' . 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access changed!</div>');
    }

    public function members()
    {
        $data['title'] = 'List of Members';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function books()
    {
        $data['title'] = 'List of Books';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Books_model', 'books');
        $data['buku']  = $this->books->get_data('buku')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/books', $data);
        $this->load->view('templates/footer');
    }

    function addBook()
    {
        $data['title']    = 'Add Book';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Books_model', 'books');
        $data['kategori'] = $this->books->get_data('kategori')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/book-add', $data);
        $this->load->view('templates/footer');
    }

    function addBookAction()
    {
        $data['title'] = 'Proccessing..';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_kategori  = $this->input->post('id_kategori', true);
        $judul        = $this->input->post('judul_buku', true);
        $pengarang    = $this->input->post('pengarang', true);
        $thn_terbit   = $this->input->post('thn_terbit', true);
        $penerbit     = $this->input->post('penerbit', true);
        $isbn         = $this->input->post('isbn', true);
        $jumlah_buku  = $this->input->post('jumlah_buku', true);
        $lokasi       = $this->input->post('lokasi', true);
        $tgl_input    = date('Y-m-d');
        $status_buku  = $this->input->post('status_buku', true);

        $this->form_validation->set_rules('id_kategori', 'Category', 'required');
        $this->form_validation->set_rules('judul_buku', 'Book Title', 'required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
        $this->form_validation->set_rules('isbn', 'ISBN', 'required');
        $this->form_validation->set_rules('status', 'Book Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please go back or <button class="btn btn-danger" onclick="goBack()">Click here</button>!', '</div>');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/book-add', $data);
            $this->load->view('templates/footer');
        } else {
            //configuration upload cover
            $config['upload_path'] = './assets/img/books/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['file_name'] = 'cover' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $image = $this->upload->data();

                $data = array(
                    'id_kategori' => $id_kategori,
                    'judul_buku'  => $judul,
                    'pengarang'   => $pengarang,
                    'thn_terbit'  => $thn_terbit,
                    'penerbit'    => $penerbit,
                    'isbn'        => $isbn,
                    'jumlah_buku' => $jumlah_buku,
                    'lokasi'      => $lokasi,
                    'gambar'      => $image['file_name'],
                    'tgl_input'   => $tgl_input,
                    'status_buku' => $status_buku
                );

                $this->M_perpus->insert_data('buku', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $judul . ' was added!</div>');
                redirect('admin/books');
            }
        }
    }

    function bookDetails($id)
    {
        $where = array('id_buku' => $id);
        $data['buku'] = $this->db->query("SELECT * FROM buku B, kategori K WHERE B.id_kategori=K.id_kategori AND B.id_buku='1'")->result();
        $this->load->model('Books_model', 'books');
        $data['kategori'] = $this->books->get_data('kategori')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/book-details', $data);
        $this->load->view('templates/footer');
    }
}
