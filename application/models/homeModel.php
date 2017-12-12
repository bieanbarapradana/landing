<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class homeModel extends CI_Model {

	

	function data_beranda($id_konten=null)

	{

		if (isset($id_konten)) 

		{

			$this->db->where('id_konten',$id_konten);

		}

		$this->db->select("*,date_format(tanggal,'%d %m %Y') as tgl");

		$this->db->from('konten');

		$query = $this->db->get();

		return $query;

	}
	
	function data_kategori()
	{
		$query = $this->db->query("select * from kategori");
		
		return $query;
	}

	function data_by_kategori($id_kategori=null)

	{

		if (isset($id_kategori)) 

		{

			$this->db->where('id_kategori',$id_kategori);

		}

		$this->db->select("*,date_format(tanggal,'%d %m %Y') as tgl");

		$this->db->from('konten');

		$query = $this->db->get();

		return $query;

	}

}

