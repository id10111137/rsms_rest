<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyPasien extends CI_Model {

   
    public function getPasien()
    {

        $message ="";
        $q = [];
        $status=0;
        $table ="tbl_pasien";
        $q = $this->getData($table);
         if($q->row_array()){

                 $message = "Data pasien Tersedia";
                 $data =  $q->result();
                 $status =200;

            }else{
                $message = "Data pasien Tidak Tersedia";
                $data =  [];
                $status =201;
            }
            return array('status' => $status, 'message' => $message, 'data' => $data);
    }

    function addPasien(
        $nama_pasien, $alamat_pasien, $nomor_telp, $rtrw, $tanggal_lahir, 
        $jenis_kelamin, $kode_region, 
        $kode_district, $kode_subdistrict,  $kode_cities
    ) {

        $message ="";
        $data = [];
        $table = "tbl_pasien";

           $data = array(
                        'id_pasien' => date("Ym").'0001',
                        'nama_pasien' => $nama_pasien,
                        'alamat_pasien' => $alamat_pasien,
                        'nomor_telp' => $nomor_telp,
                        'rtrw' => $rtrw,
                        'tanggal_lahir' => $tanggal_lahir,
                        'jenis_kelamin' => $jenis_kelamin,
                        'kode_region' => $kode_region,
                        'kode_district' => $kode_district,
                        'kode_subdistrict' => $kode_subdistrict,
                        'kode_cities' => $kode_cities,
            );
            
           $q = $this->insertData($table, $data);
           
           if($q){
             $message = "Sukses Insert Data";
             $data =  $data;
             $status=200;
           }else{
             $message = "Gagal Insert Data";
             $data =  null;
             $status=201;
           }
        

        return array('status' => $status, 'message' => $message, 'data' => $data);
    }

    function deletePasien($id_pasien) {
        $message ="";
        $data = [];
        $status=0;

        $table ="tbl_pasien";
        $this->deleteData($table, array('id_pasien' => $id_pasien));

        $message = "Sukses Delete Data Pasien";
        $data =  [];
        $status =200;

    
        return array('status' => $status, 'message' => $message, 'data' => $data);
    }
    

    function updatePasien(
        $id_pasien, $nama_pasien, $alamat_pasien, $nomor_telp, $rtrw, $tanggal_lahir, 
        $jenis_kelamin, $kode_region, 
        $kode_district, $kode_subdistrict,  $kode_cities
    ) {
        
        $message ="";
        $data = [];
        $table = "tbl_pasien";

        $data = array(
            'nama_pasien' => $nama_pasien,
            'alamat_pasien' => $alamat_pasien,
            'nomor_telp' => $nomor_telp,
            'rtrw' => $rtrw,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'kode_region' => $kode_region,
            'kode_district' => $kode_district,
            'kode_subdistrict' => $kode_subdistrict,
            'kode_cities' => $kode_cities,
);


              
            $q = $this->updateData($table, $data, $id_pasien);
               
               if($q){
                 $message = "Sukses Update Data";
                 $data =  $data;
                 $status=200;
               }else{
                 $message = "Gagal Update Data";
                 $data =  [];
                 $status=201;
               }

            return array('status' => $status, 'message' => $message, 'data' => $data);
    }



    /*
        Basic Crud
    */

    public function getData($table)
    {
        $q = [];
        $this->db->select('*');
        $this->db->from($table);
        $q = $this->db->get();
        return $q;
    }

    public function updateData($table,$data, $id_pasien)
    {
        $q = [];
        $this->db->where("id_pasien", $id_pasien);
        $q =  $this->db->update($table, $data);
        return $q;
    }

    public function deleteData($table,$data)
    {
         $this->db->delete($table, $data);
    }

    public function insertData($table,$data)
    {
        $q = [];
        $q = $this->db->insert($table, $data);
        return $q;
    }




}