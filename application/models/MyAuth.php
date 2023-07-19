<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyAuth extends CI_Model {


  public function mylogin($email,$password)
    {

        $message ="";
        $data = [];
        $status=0;

        $this->db->select('a.*');
        $this->db->from('tbl_user a');
        $array = array('a.email' => $email, 'a.password' => md5($password));
        $this->db->where($array);
        $query = $this->db->get();
        
            if($query->row_array()){

                
                foreach ($query->result() as $row)
                {
                        $this->updatetoken('tbl_user',$row->kode_user);
                }

                 $message = "Login success";
                 $data =  $query->row_array();
                 $status =200;

            }else{
                $message = "Login failed, please fill in the correct data";
                $data =  $query->row_array();
                $status =201;
            }

            return array('status' => $status, 'message' => $message, 'data' => $data);
    }
    
   
 

        function myregister($nama_user, $status_user, $email, $password) {
            
            $message ="";
            $data = [];
            $table = "tbl_user";

               $data = array(
                            'kode_user' => 'rscm'.date("Ymdhis"),
                            'nama_user' => $nama_user,
                            'status_user' => $status_user,
                            'email' => $email,
                            'password' => md5($password),
                            'token' =>md5(date("Ymdhis"))
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


        public function update($kode_user, $nama_user, $status_user, $email, $password)
        {
    
            $message ="";
            $data = [];
            $table = "tbl_user";
    
                    $data = array(
                        'nama_user' => $nama_user,
                        'status_user' => $status_user,
                        'email' => $email,
                        'password' => $password
                    );
    
                  
                $q = $this->updateData($table, $data, $kode_user);
                   
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


        public function getRetriveData()
        {
    
            $message ="";
            $q = [];
            $status=0;
            $table ="tbl_user";
            $q = $this->getData($table);
             if($q->row_array()){
                     $message = "Data User Tersedia";
                     $data =  $q->result();
                     $status =200;
    
                }else{
                    $message = "Data User Tidak Tersedia";
                    $data =  [];
                    $status =201;
                }
                return array('status' => $status, 'message' => $message, 'data' => $data);
        }



        public function delete($kode_user)
    {
        $message ="";
        $data = [];
        $status=0;

        $table ="tbl_user";

        $this->deleteData($table, array('kode_user' => $kode_user));

        $message = "Sukses Delete Data Produk";
        $data =  [];
        $status =200;

    
        return array('status' => $status, 'message' => $message, 'data' => $data);
    }


        public function updatetoken($table, $kode_user)
        {
                $data = array(
                    'token' => md5(date("Ymdhis"))
                   );
    
            $this->db->where('kode_user', $kode_user);
            $this->db->update($table, $data);
        }

        public function insertData($table,$data)
    {
        $q = [];
        $q = $this->db->insert($table, $data);
        return $q;
    }


    public function getData($table)
    {
        $q = [];
        $this->db->select('*');
        $this->db->from($table);
        $q = $this->db->get();
        return $q;
    }


    public function deleteData($table,$data)
    {
         $this->db->delete($table, $data);
    }

    public function updateData($table,$data, $id)
    {
        $q = [];
        $this->db->where("kode_user", $id);
        $q =  $this->db->update($table, $data);
        return $q;
    }

    }