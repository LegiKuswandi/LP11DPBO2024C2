<?php

include_once("presenter/KontrakPresenter.php");

class ProsesPasien implements KontrakPasienPresenter{
	private $tabelpasien;
	private $data = [];

	function __construct(){
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; //nama db
			$this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name);
			$this->data = array(); 
		} catch (Exception $e) {
			echo "wiw error" . $e->getMessage();
		}
	}

	function prosesDataPasien(){
		try {
			$this->tabelpasien->open();
			$this->tabelpasien->getPasien();
			while ($row = $this->tabelpasien->getResult()) {
				$pasien = new Pasien(); 
				$pasien->setId($row['id']); 
				$pasien->setNik($row['nik']); 
				$pasien->setNama($row['nama']); 
				$pasien->setTempat($row['tempat']); 
				$pasien->setTl($row['tl']); 
				$pasien->setGender($row['gender']); 
				$pasien->setEmail($row['email']); 
				$pasien->setTelp($row['telp']); 


				$this->data[] = $row; //tambahkan data pasien ke dalam list
			}
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}
	function prosesSatuPasien($id){
		try {
			//mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->getPasienById($id);
			while ($row = $this->tabelpasien->getResult()) {
				//ambil hasil query
				$pasien = new Pasien();
				$pasien->setId($row['id']); 
				$pasien->setNik($row['nik']); 
				$pasien->setNama($row['nama']); 
				$pasien->setTempat($row['tempat']); 
				$pasien->setTl($row['tl']); 
				$pasien->setGender($row['gender']); 
				$pasien->setEmail($row['email']); 
				$pasien->setTelp($row['telp']); 


				$this->data[] = $row; //tambahkan data pasien ke dalam list
			}
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}

	function createPasien($data){
		$this->tabelpasien->open();
		$this->tabelpasien->create($data);
		$this->tabelpasien->close();
	}
	function updatePasien($id, $data){
		$this->tabelpasien->open();
		$this->tabelpasien->update($id, $data);
		$this->tabelpasien->close();
	}
	function deletePasien($id){
		$this->tabelpasien->open();
		$this->tabelpasien->delete($id);
		$this->tabelpasien->close();
	}

	function getId($i){
		return $this->data[$i]['id'];
	}
	function getNik($i){
		return $this->data[$i]['nik'];
	}
	function getNama($i){
		return $this->data[$i]['nama'];
	}
	function getTempat($i){
		return $this->data[$i]['tempat'];
	}
	function getTl($i){
		return $this->data[$i]['tl'];
	}
	function getGender($i){
		return $this->data[$i]['gender'];
	}
	function getEmail($i){
		return $this->data[$i]['email'];
	}
	function getTelp($i){
		return $this->data[$i]['telp'];
	}
	function getSize(){
		return sizeof($this->data);
	}
}