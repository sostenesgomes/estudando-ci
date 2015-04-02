<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    /**
     * Constructor
     */
    public function __construct($rules=array()){
        parent::__construct($rules);
    }

    // --------------------------------------------------------------------

    /**
     * Match one field to another
     *
     * @access	public
     * @param	string
     * @param	field
     * @return	bool
     */
    public function is_unique_update($str, $field){
        $explode = explode('.', $field);

        $table = $explode[0];
        $field = $explode[1];
        $field_excluded = $explode[2];

        $query = $this->CI->db->limit(1)->get_where($table, array($field => $str));

        $result = $query->row_array();

        if( ($query->num_rows() === 0) or ( ($query->num_rows() > 0) and ($_POST[$field_excluded] == $result[$field_excluded])))
            return true;

        return false;
    }

}

/* End of file MY_Form_validation.php */
/* Location: ./application/libraries/MY_Form_validation.php */
