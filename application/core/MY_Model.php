<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	/**
	 *	Insère une nouvelle ligne dans la base de données.
	 */
	public function create($options_echappees = array(), $options_non_echappees = array())
	{
		//	Vérification des données à insérer
		if(empty($options_echappees) AND empty($options_non_echappees))
		{
			return false;
		}

		$this->db->set($options_echappees)
						->set($options_non_echappees, null, false)
						->insert($this->table);

		return $this->db->insert_id();
	}

	/**
	 *	Récupère des données dans la base de données.
	 */
	public function read()
	{
		
	}

	/**
	 *	Modifie une ou plusieurs lignes dans la base de données.
	 */
	public function update($where, $options_echappees = array(), $options_non_echappees = array())
	{
		//	Vérification des données à mettre à jour
		if(empty($options_echappees) AND empty($options_non_echappees))
		{
			return false;
		}

		//	Raccourci dans le cas où on sélectionne l'id
		if(is_integer($where))
		{
			$where = array('id' => $where);
		}

		return (bool) $this->db->set($options_echappees)
							   ->set($options_non_echappees, null, false)
							   ->where($where)
							   ->update($this->table);
	}

	/**
	 *	Supprime une ou plusieurs lignes de la base de données.
	 */
	public function delete($where)
	{
		if(is_integer($where))
		{
			$where = array('id' => $where);
		}

		$this->db->where($where)
				 ->delete($this->table);

        if ($this->db->affected_rows() > 0)
		    return TRUE;
        return FALSE;
	}

	/**
	 *	Retourne le nombre de résultats.
	 */
	public function count($champ = array(), $valeur = null)
	{
		return (int) $this->db->where($champ, $valeur)
							   ->from($this->table)
							   ->count_all_results();
	}
}

/* End of file MY_Model.php */
/* Location: ./system/application/core/MY_Model.php */
