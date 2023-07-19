<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class District extends CI_Controller {

    public function getDistrict()
    {   
        $response = $this->MyDistrict->getDistrict();
        json_output($response['status'],$response);
    }

    public function addDistrict()
    {   
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {

			$params = json_decode(file_get_contents('php://input'), TRUE);

			$nama_district = $params['nama_district'];
			$kode_cities = $params['kode_cities'];

			$response = $this->MyDistrict->addDistrict($nama_district, $kode_cities);
			json_output($response['status'],$response);

		}
    }

    public function updateDistrict()
    {   
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'PUT'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$params = json_decode(file_get_contents('php://input'), TRUE);

            $kode_district = $params['kode_district'];
			$nama_district = $params['nama_district'];
			$kode_cities = $params['kode_cities'];

			$response = $this->MyDistrict->updateDistrict($kode_district, $nama_district, $kode_cities);

			json_output($response['status'],$response);

		}
    }
 
    public function deleteDistrict()
    {   
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'DELETE'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$params = json_decode(file_get_contents('php://input'), TRUE);

			$kode_district = $params['kode_district'];
			$response = $this->MyDistrict->deleteDistrict($kode_district);
			json_output($response['status'],$response);

		}
    }




   

}