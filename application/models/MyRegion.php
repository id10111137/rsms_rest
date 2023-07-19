<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyRegion extends CI_Model {


    public function getRegion()
    {

        $message ="";
        $q = [];
        $status=0;
        $table ="tbl_region";
        $q = $this->getData($table);
         if($q->row_array()){

                 $message = "Data Region Tersedia";
                 $data =  $q->result();
                 $status =200;

            }else{
                $message = "Data Region Tidak Tersedia";
                $data =  [];
                $status =201;
            }
            return array('status' => $status, 'message' => $message, 'data' => $data);
    }

    function addRegion($nama_region) {

        $message ="";
        $data = [];
        $table = "tbl_region";

           $data = array(
                        'kode_region' => 'region'.date("Ymdhis"),
                        'nama_region' => $nama_region
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

    function deleteRegion($kode_region) {
        $message ="";
        $data = [];
        $status=0;

        $table ="tbl_region";
        $this->deleteData($table, array('kode_region' => $kode_region));

        $message = "Sukses Delete Data Region";
        $data =  [];
        $status =200;

    
        return array('status' => $status, 'message' => $message, 'data' => $data);
    }

    function updateRegion($kode_region, $nama_region) {
        
        $message ="";
        $data = [];
        $table = "tbl_region";

                $data = array(
                    'nama_region' => $nama_region
                );

              
            $q = $this->updateData($table, $data, $kode_region);
               
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

    public function updateData($table,$data, $kode_region)
    {
        $q = [];
        $this->db->where("kode_region", $kode_region);
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