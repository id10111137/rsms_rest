<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyDistrict extends CI_Model {

 
    public function getDistrict()
    {

        $message ="";
        $q = [];
        $status=0;
        $table ="tbl_district";
        $q = $this->getData($table);
         if($q->row_array()){

                 $message = "Data district Tersedia";
                 $data =  $q->result();
                 $status =200;

            }else{
                $message = "Data district Tidak Tersedia";
                $data =  [];
                $status =201;
            }
            return array('status' => $status, 'message' => $message, 'data' => $data);
    }

    function addDistrict($nama_district, $kode_cities) {

        $message ="";
        $data = [];
        $table = "tbl_district";

           $data = array(
                        'kode_district' => 'district'.date("Ymdhis"),
                        'nama_district' => $nama_district,
                        'kode_cities' => $kode_cities
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

    function deleteDistrict($kode_district) {
        $message ="";
        $data = [];
        $status=0;

        $table ="tbl_district";
        $this->deleteData($table, array('kode_district' => $kode_district));

        $message = "Sukses Delete Data Cities";
        $data =  [];
        $status =200;

    
        return array('status' => $status, 'message' => $message, 'data' => $data);
    }

    function updateDistrict($kode_district, $nama_district, $kode_cities) {
        
        $message ="";
        $data = [];
        $table = "tbl_district";

        $data = array(
            'nama_district' => $nama_district,
            'kode_cities' => $kode_cities
        );


              
            $q = $this->updateData($table, $data, $kode_district);
               
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

    public function updateData($table,$data, $kode_district)
    {
        $q = [];
        $this->db->where("kode_district", $kode_district);
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