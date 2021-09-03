<?php

//Include Class Database
include 'database.php';

class model
{

	//Create Instance
	function __construct()
	{
		$this->dbh = Database::getInstance();
	}

	//Get Single Data By Id
	function select($id)
	{
		$data = $this->dbh->query("SELECT * FROM tbl_pegawai WHERE id =" . $id);
		return $data->fetch();
	}

	//Get All Data
	function selectAll()
	{
		return $this->dbh->query("SELECT * FROM tbl_pegawai");
	}

	//Insert Data
	function insert($id, $nip, $nama, $jns_kel, $tgl_lahir, $status, $mulai_bekerja)
	{
		return $this->dbh->query("INSERT INTO tbl_pegawai VALUES ('" . $id . "','" . $nip . "','" . $nama . "','" . $jns_kel . "','" . $tgl_lahir . "','" . $status . "','" . $mulai_bekerja . "')");
	}

	//Update Data
	function update($id, $nip, $nama, $jns_kel, $tgl_lahir, $status, $mulai_bekerja)
	{
		return $this->dbh->query("UPDATE tbl_pegawai SET nip='$nip', nama='$nama', jns_kel='$jns_kel', tgl_lahir='$tgl_lahir', status='$status', mulai_kerja='$mulai_bekerja' where id = $id");
	}

	//Remove Instance
	function __destruct()
	{
	}
}
