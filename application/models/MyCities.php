<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyCities extends CI_Model {


    public function getCities()
    {

        $message ="";
        $q = [];
        $status=0;
        $table ="tbl_cities";
        $q = $this->getData($table);
         if($q->row_array()){

                 $message = "Data Cities Tersedia";
                 $data =  $q->result();
                 $status =200;

            }else{
                $message = "Data Cities Tidak Tersedia";
                $data =  [];
                $status =201;
            }
            return array('status' => $status, 'message' => $message, 'data' => $data);
    }

    function addCities($nama_cities, $kode_region) {

        $message ="";
        $data = [];
        $table = "tbl_cities";

           $data = array(
                        'kode_cities' => 'region'.date("Ymdhis"),
                        'nama_cities' => $nama_cities,
                        'kode_region' => $kode_region
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

    function deleteCities($kode_cities) {
        $message ="";
        $data = [];
        $status=0;

        $table ="tbl_cities";
        $this->deleteData($table, array('kode_cities' => $kode_cities));

        $message = "Sukses Delete Data Cities";
        $data =  [];
        $status =200;

    
        return array('status' => $status, 'message' => $message, 'data' => $data);
    }

    function updateCities($kode_cities, $nama_cities, $kode_region) {
        
        $message ="";
        $data = [];
        $table = "tbl_cities";

                $data = array(
                    'nama_cities' => $nama_cities,
                    'kode_region' => $kode_region
                );

              
            $q = $this->updateData($table, $data, $kode_cities);
               
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
        $this->db->where("kode_cities", $kode_region);
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