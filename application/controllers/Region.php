<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region extends CI_Controller {

    public function getRegions()
    {   
        $response = $this->MyRegion->getRegion();
        json_output($response['status'],$response);
    }

    public function addRegion()
    {   
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {

			$params = json_decode(file_get_contents('php://input'), TRUE);
			$nama_region = $params['nama_region'];

			$response = $this->MyRegion->addRegion($nama_region);
			json_output($response['status'],$response);

		}
    }

    public function updateRegion()
    {   
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'PUT'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$params = json_decode(file_get_contents('php://input'), TRUE);

            $kode_region = $params['kode_region'];
			$nama_region = $params['nama_region'];

			$response = $this->MyRegion->updateRegion($kode_region, $nama_region);

			json_output($response['status'],$response);

		}
    }

    public function deleteRegion()
    {   
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'DELETE'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$params = json_decode(file_get_contents('php://input'), TRUE);

			$kode_region = $params['kode_region'];
			$response = $this->MyRegion->deleteRegion($kode_region);
			json_output($response['status'],$response);

		}
    }




   

}