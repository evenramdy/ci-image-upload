<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_model extends CI_Model {

	private $table = 'images';

	public $title;
	public $image;

	public function __construct()
	{
		parent::__construct();
	}

	public function flush()
	{
		$this->title = '';
		$this->image = '';
	}

	public function all()
	{
		$this->db->order_by('id', 'desc');
		$q = $this->db->get($this->table);

		return $q->result();
	}

	public function get($id)
	{
		$q = $this->db->get_where($this->table, ['id' => $id]);

		return $q->num_rows() > 0 ? $q->row()->image : '';
	}

	public function destroy($id)
	{
		return $this->db->delete($this->table, array('id' => $id));
	}

	public function store()
	{
		try {
			if (
				empty($this->title) ||
				empty($this->image)
			) {
				return FALSE;
			} else {
				$action = $this->db->insert($this->table, $this);
				$this->flush();

				return $action;
			}
		} catch (Exception $e) {
			return FALSE;
		}
	}

}

/* End of file Welcome_model.php */
/* Location: ./application/models/Welcome_model.php */