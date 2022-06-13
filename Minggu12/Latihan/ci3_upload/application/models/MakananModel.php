<?php if (!defined('BASEPATH')) exit('No direct script access
allowed');
class MakananModel extends CI_Model
{
    public function view()
    {
        $this->load->library('pagination'); // Load librari paginationnya
        $query = "SELECT * FROM makanan"; // Query untuk menampilkan semua data makanan
        $config['base_url'] = base_url('index.php/data/lists');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open'] = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = ' <i class="glyphicon glyphicon-menu-right"></i> ';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = ' <i class="glyphicon glyphicon-menu-left"></i> ';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        // End style pagination

        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT " . $page . ", " . $config['per_page'];
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); //Generate link pagination nya sesuai config diatas
        $data['makanan'] = $this->db->query($query)->result();
        return $data;
    }

    public function search($keyword)
    {
        $this->db->like('kode', $keyword);
        $this->db->or_like('makanan', $keyword);
        $this->db->or_like('jenis_makanan', $keyword);
        $this->db->or_like('stok', $keyword);
        $this->db->or_like('harga', $keyword);

        $result = $this->db->get('makanan')->result(); // Tampilkandata siswa berdasarkan keyword
        return $result;
    }
}
