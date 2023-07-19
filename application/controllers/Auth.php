<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
    {   
        $response = $this->MyAuth->getRetriveData();
        json_output($response['status'],$response);
    }
	
	public function login(){

		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {

			$params = json_decode(file_get_contents('php://input'), TRUE);
			$email = $params['email'];
			$password = $params['password'];
			$response = $this->MyAuth->mylogin($email, $password);
			json_output($response['status'],$response);
		}

	}

    public function register()
    {
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {

			$params = json_decode(file_get_contents('php://input'), TRUE);

			$nama_user = $params['nama_user'];
			$status_user = $params['status_user'];
			$email = $params['email'];
			$password = $params['password'];

			$response = $this->MyAuth->myregister($nama_user, $status_user, $email, $password);
			json_output($response['status'],$response);

		}
        
    }

    public function update()
    {
       
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'PUT'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$params = json_decode(file_get_contents('php://input'), TRUE);

            $kode_user = $params['kode_user'];
			$nama_user = $params['nama_user'];
			$status_user = $params['status_user'];
			$email = $params['email'];
			$password = $params['password'];

			$response = $this->MyAuth->update($kode_user, $nama_user, $status_user, $email, $password);

			json_output($response['status'],$response);

		}
        
    }


    public function delete()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'DELETE'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$params = json_decode(file_get_contents('php://input'), TRUE);

			$kode_user = $params['kode_user'];
			$response = $this->MyAuth->delete($kode_user);
			json_output($response['status'],$response);
		}
	}


	

}