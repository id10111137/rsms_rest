<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MySubDistrict extends CI_Model {

 
    public function getSubDistrict()
    {

        $message ="";
        $q = [];
        $status=0;
        $table ="tbl_subdistrict";
        $q = $this->getData($table);
         if($q->row_array()){

                 $message = "Data subdistrict Tersedia";
                 $data =  $q->result();
                 $status =200;

            }else{
                $message = "Data subdistrict Tidak Tersedia";
                $data =  [];
                $status =201;
            }
            return array('status' => $status, 'message' => $message, 'data' => $data);
    }

    function addSubDistrict($nama_subdistrict, $kode_district) {

        $message ="";
        $data = [];
        $table = "tbl_subdistrict";

           $data = array(
                        'kode_subdistrict' => 'district'.date("Ymdhis"),
                        'nama_subdistrict' => $nama_subdistrict,
                        'kode_district' => $kode_district
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

    function deleteSubDistrict($kode_subdistrict) {
        $message ="";
        $data = [];
        $status=0;

        $table ="tbl_subdistrict";
        $this->deleteData($table, array('kode_subdistrict' => $kode_subdistrict));

        $message = "Sukses Delete Data Cities";
        $data =  [];
        $status =200;

    
        return array('status' => $status, 'message' => $message, 'data' => $data);
    }

    function updateSubDistrict($kode_subdistrict, $nama_subdistrict, $kode_district) {
        
        $message ="";
        $data = [];
        $table = "tbl_subdistrict";

        $data = array(
            'nama_subdistrict' => $nama_subdistrict,
            'kode_district' => $kode_district
        );


              
            $q = $this->updateData($table, $data, $kode_subdistrict);
               
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
        $this->db->where("kode_subdistrict", $kode_district);
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