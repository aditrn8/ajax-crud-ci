<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('tb_barang')->result();
    }

    public function save()
    {
        $data = [
            'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
            'jumlah_barang' => htmlspecialchars($this->input->post('jumlah_barang', true)),
            'keterangan_barang' => htmlspecialchars($this->input->post('keterangan_barang', true)),
        ];

        return $this->db->insert('tb_barang', $data);
    }

    public function delete()
    {
        $id = $this->input->post('id_barang');
        $this->db->where('id_barang', $id);
        return $this->db->delete('tb_barang');
    }

    public function update()
    {
        $id = $this->input->post('id_barang');
        $data = [
            'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
            'jumlah_barang' => htmlspecialchars($this->input->post('jumlah_barang', true)),
            'keterangan_barang' => htmlspecialchars($this->input->post('keterangan_barang', true)),
        ];
        $this->db->where('id_barang', $id);
        return $this->db->update('tb_barang', $data);
    }
}

/* End of file ModelName.php */
