<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubDistrict extends CI_Controller {

    public function getSubDistrict()
    {   
        $response = $this->MySubDistrict->getSubDistrict();
        json_output($response['status'],$response);
    }

    public function addSubDistrict()
    {   
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {

			$params = json_decode(file_get_contents('php://input'), TRUE);

			$nama_subdistrict = $params['nama_subdistrict'];
			$kode_district = $params['kode_district'];

			$response = $this->MySubDistrict->addSubDistrict($nama_subdistrict, $kode_district);
			json_output($response['status'],$response);

		}
    }

    public function updateSubDistrict()
    {   
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'PUT'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$params = json_decode(file_get_contents('php://input'), TRUE);

			$kode_subdistrict = $params['kode_subdistrict'];
			$nama_subdistrict = $params['nama_subdistrict'];
			$kode_district = $params['kode_district'];

			$response = $this->MySubDistrict->updateSubDistrict($kode_subdistrict, $nama_subdistrict, $kode_district);

			json_output($response['status'],$response);

		}
    } 

    public function deleteSubDistrict()
    {   
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'DELETE'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$params = json_decode(file_get_contents('php://input'), TRUE);

			$kode_subdistrict = $params['kode_subdistrict'];
			$response = $this->MySubDistrict->deleteSubDistrict($kode_subdistrict);
			json_output($response['status'],$response);

		}
    }




   

}