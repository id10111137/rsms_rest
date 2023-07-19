<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cities extends CI_Controller {

    public function getCities()
    {   
        $response = $this->MyCities->getCities();
        json_output($response['status'],$response);
    }

    public function addCities()
    {   
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {

			$params = json_decode(file_get_contents('php://input'), TRUE);

			$nama_cities = $params['nama_cities'];
			$kode_region = $params['kode_region'];

			$response = $this->MyCities->addCities($nama_cities, $kode_region);
			json_output($response['status'],$response);

		}
    }

    public function updateCities()
    {   
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'PUT'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$params = json_decode(file_get_contents('php://input'), TRUE);

            $kode_cities = $params['kode_cities'];
			$nama_cities = $params['nama_cities'];
			$kode_region = $params['kode_region'];

			$response = $this->MyCities->updateCities($kode_cities, $nama_cities, $kode_region);

			json_output($response['status'],$response);

		}
    }

    public function deleteCities()
    {   
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'DELETE'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$params = json_decode(file_get_contents('php://input'), TRUE);

			$kode_cities = $params['kode_cities'];
			$response = $this->MyCities->deleteCities($kode_cities);
			json_output($response['status'],$response);

		}
    }




   

}