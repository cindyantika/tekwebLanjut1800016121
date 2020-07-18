<?php

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model
{
	protected $table = 'user';

	// fungsi untuk mencocokan data form login dengan data yg berada didatabase
	public function get_data($email, $password)
	{
		return $this->db->table($this->table)
			->where(array('user_email' => $email, 'user_pass' => $password))
			->get()->getRowArray();
	}

	// fungsi untuk mengambil semua data pada database
	public function getUser($id = false)
	{
		if ($id === false) {
			return $this->findAll();
		}
		return $this->getWhere(['user_id' => $id]);
	}

	// fungsi untuk menyimpan data yg anda masukan dalam modal tambah data
	public function saveUser($data)
	{
		$query = $this->db->table($this->table)->insert($data);
		return $query;
	}

	// fungsi untuk mengupdate data 
	public function updateUser($data, $id)
	{
		$query = $this->db->table($this->table)->update($data, array('user_id' => $id));
		return $query;
	}

	// fungsi untuk menghapus id
	public function deleteUser($id)
	{
		$query = $this->db->table($this->table)->delete(array('user_id' => $id));
		return $query;
	}
	//--------------------------------------------------------------------

}
