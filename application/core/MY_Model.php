<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Especialização de CI_Model com métodos específicos da aplicação.
 * @author Gabriel Vieira - gabrielvra@outlook.com
 */
abstract class MY_Model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Definir a tabela que será utilizada para realizar o CRUD
     */
    abstract public function getTableName();
    
    /**
     * Definir quais são as colunas ordenadas
     */
    abstract public function getColumnOrder();
    
    /**
     * Definir quais são as colunas que participam da seleção dos dados
     */
    abstract public function getColumnSearch();
    
    /**
     * Definir a ordenação padrão dos registros.
     */
    abstract public function getOrder();
    
    /**
     * Definir uma coluna para gerar próximo código.
     */
    abstract public function getColumnCode();
    
    /**
     * Retorna o registro pelo identificador
     * @param $id
     * @return 
     */
    public function getById($id){
        if (isset($id)){
            $this->db->select('*');
            $this->db->from($this->getTableName());
            $this->db->where($this->getTableName().'.id', $id);
            $this->db->limit(1);
            return $this->db->get()->row();
        }
        return null;
    }
    /**
     * Adiciona um novo registro no banco de dados conforme os dados passados no array <code>$data</code>
     * @param $data - Array com os registros que serão gravados
     * @return boolean - Se ocorreu com sucesso ou não.
     */
    public function add($data){
        $this->db->trans_start();
        //Verificar se alguma coluna gera sequencia e se essa coluna já possui valor informado.
        if ($this->getColumnCode() != null && $data[$this->getColumnCode()] == null){
            //Selecinar a sequencia na tabela de sequencias
            $query = $this->db->query('select cd_proximo_codigo from table_sequence WHERE ds_denominacao = "'.
                $this->getTableName().'" and ds_chave = "'.$this->getColumnCode().'" LIMIT 1 for UPDATE');
            $codigo = null;
            foreach ($query->result() as $row) {
                $codigo = $row->cd_proximo_codigo;
            }
            if (isset($codigo) && $codigo != null){
                $codigo++;
                $generator = array('cd_proximo_codigo' => $codigo);
                $this->db->where('ds_denominacao', $this->getTableName());
                $this->db->where('ds_chave', $this->getColumnCode());
                $this->db->update('table_sequence', $generator);
                $columCode = $this->getColumnCode();
                $data[$columCode] = $codigo;
            } else {
                $generator = array(
                    'cd_proximo_codigo' => 1,
                    'ds_denominacao' => $this->getTableName(),
                    'ds_chave' => $this->getColumnCode());
                $this->db->insert('table_sequence', $generator);
                $columCode = $this->getColumnCode();
                $data[$columCode] = 1;
            }
        }
        //Inserir o registro na base de dados.
        $this->db->insert($this->getTableName(), $data);
        $id = $this->db->insert_id();
        $this->db->trans_complete();        
        if ($this->db->trans_status() === false){
            return 0;
        }
        return $id;
    }
    
    /**
     * Edita um registro conforme o identificador, atualizando o registro com os dados em <code>$data</code>
     * @param $data - Array com os dados
     * @param $id - Identificador
     * @return boolean - Se ocorreu com sucesso ou não.
     */
    public function edit($data, $id){
        $this->db->where('id', $id);
        $this->db->update($this->getTableName(), $data);
        if ($this->db->affected_rows() >= 0) {
            return $id;
        }
        return 0;
    }
    
    function delete($id){
        if (isset($id)){
            $this->db->where('id', $id);
            $this->db->delete($this->getTableName());
            if ($this->db->affected_rows() > 0) {
                return true;
            }
            return false;
        }
    }
    
    /**
     * Conta todos os registros da tabela
     * @return
     */
    public function count_all() {
        $this->db->from($this->getTableName());
        return $this->db->count_all_results();
    }
    
    /**
     * Conta todos os registros conforme filtros.
     * @return 
     */
    public function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }  
    
    private function _get_datatables_query() {
        $this->db->from($this->getTableName());
        $i = 0;
        foreach ($this->getColumnSearch() as $item) {
            if($_POST['search']['value']) {
                if($i===0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->getColumnSearch()) - 1 == $i){
                    $this->db->group_end();
                }
            }
            $i++;
        }
        if(isset($_POST['order'])) {
            $this->db->order_by($this->getColumnOrder()[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $order = $this->getOrder();
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
    public function get_datatables() {
        $this->_get_datatables_query();
        if($_POST['length'] != -1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
}