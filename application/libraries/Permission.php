<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission{
    var $Permission = array();
    var $table = 'usuario_grupo';
    var $pk = 'id';
    var $select = 'ds_chave';
	
    public function  __construct() {
        log_message('debug', "Classe de permissão inicializada");
        $this->CI =& get_instance();
        $this->CI->load->database();
    }

    public function checkPermission($id = null, $atividade = null){
        if($id == null || $atividade == null){
            return false;
        }
        if($this->Permission == null){
            if(!$this->loadPermission($id)){
                return false;
            }
        }
        if(is_array($this->Permission[0])){
            if(array_key_exists($atividade, $this->Permission[0])){
                if ($this->Permission[0][$atividade] == 1) {
                    return true;
                } else {
                    return false;
                }
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
	
    private function loadPermission($id = null){
        if($id != null){
            $this->CI->db->select($this->table.'.'.$this->select);
            $this->CI->db->where($this->pk,$id);
            $this->CI->db->limit(1);
            $array = $this->CI->db->get($this->table)->row_array();
            if(count($array) > 0){
                $array = unserialize($array[$this->select]);
                $this->Permission = array($array);
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
}