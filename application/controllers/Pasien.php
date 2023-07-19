<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    public function getPasien()
    {   
        $response = $this->MyPasien->getPasien();
        json_output($response['status'],$response);
    }
 
    public function addPasien()
    {   
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {


			$params = json_decode(file_get_contents('php://input'), TRUE);

			$nama_pasien = $params['nama_pasien'];
			$alamat_pasien = $params['alamat_pasien'];
			$nomor_telp = $params['nomor_telp'];
			$rtrw = $params['rtrw'];
			$tanggal_lahir = $params['tanggal_lahir'];
			$jenis_kelamin = $params['jenis_kelamin'];
			$kode_region = $params['kode_region'];
			$kode_district = $params['kode_district'];
			$kode_subdistrict = $params['kode_subdistrict'];
			$kode_cities = $params['kode_cities'];

			$response = $this->MyPasien->addPasien(
				$nama_pasien, $alamat_pasien, $nomor_telp, $rtrw, $tanggal_lahir, 
				$jenis_kelamin, $kode_region, 
				$kode_district, $kode_subdistrict,  $kode_cities
			);
			json_output($response['status'],$response);

		}
    }

    public function updatePasien()
    {   
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'PUT'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$params = json_decode(file_get_contents('php://input'), TRUE);

            $id_pasien = $params['id_pasien'];
			$nama_pasien = $params['nama_pasien'];
			$alamat_pasien = $params['alamat_pasien'];
			$nomor_telp = $params['nomor_telp'];
			$rtrw = $params['rtrw'];
			$tanggal_lahir = $params['tanggal_lahir'];
			$jenis_kelamin = $params['jenis_kelamin'];
			$kode_region = $params['kode_region'];
			$kode_district = $params['kode_district'];
			$kode_subdistrict = $params['kode_subdistrict'];
			$kode_cities = $params['kode_cities'];

			$response = $this->MyPasien->updatePasien(
				$id_pasien, $nama_pasien, $alamat_pasien, $nomor_telp, $rtrw, $tanggal_lahir, 
				$jenis_kelamin, $kode_region, 
				$kode_district, $kode_subdistrict,  $kode_cities
			);

			json_output($response['status'],$response);

		}
    }

    public function deletePasien()
    {   
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'DELETE'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$params = json_decode(file_get_contents('php://input'), TRUE);

			$id_pasien = $params['id_pasien'];
			$response = $this->MyPasien->deletePasien($id_pasien);
			json_output($response['status'],$response);

		}
    }




   

}