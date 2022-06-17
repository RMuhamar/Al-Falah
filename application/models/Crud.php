<?php
class Crud extends CI_Model {
	
	# -------------------------------------------------------------------------
	# Insert Data 
	# -------------------------------------------------------------------------
	public function insert($datato){
		$database = $datato['database'];
		$table = $datato['table'];
		$datato = array_splice($datato, 2, count($datato));
		$this->db->insert($database.'.'.$table, $datato);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	# -------------------------------------------------------------------------
	
	
	# -------------------------------------------------------------------------
	# Update Data 
	# -------------------------------------------------------------------------
	public function update($datato){
		$database = $datato['database'];
		$table = $datato['table'];
		$field = $datato['field'];
		$id = $datato['id'];
		$datato = array_splice($datato, 2, count($datato) - 4);
		$this->db->where($database.'.'.$table.'.'.$field, $id);
		$this->db->update($database.'.'.$table, $datato);
	}
	# -------------------------------------------------------------------------
	
	
	# -------------------------------------------------------------------------
	# Delete Data 
	# -------------------------------------------------------------------------
	public function delete($datato){
		$database = $datato['database'];
		$table = $datato['table'];
		$field = $datato['field'];
		$id = $datato['id'];
		$this->db->where($database.'.'.$table.'.'.$field, $id);
		$this->db->delete($database.'.'.$table);
	}
	# -------------------------------------------------------------------------	
	
	
	# -------------------------------------------------------------------------
	# View Data 
	# -------------------------------------------------------------------------
	public function view_data($data)
	{
		if(isset($data['select'])){	
			$this->db->select($data['select']);
		}else{	
			$this->db->select('*');
		}
		$this->db->from($data['table']);
		if(isset($data['table_join'])){
			for($i=0;$i<count($data['table_join']);$i++){
				$this->db->join($data['table_join'][$i], $data['table_join'][$i].'.'.$data['join_id'][$i].'='.$data['table_join_on'][$i].'.'.$data['join_id'][$i], $data['join_type'][$i]);
			}
		}
		if(isset($data['where'])){
			$this->db->where($data['where']);
		}
		if(isset($data['or_where'])){
			$this->db->or_where($data['or_where']);
		}
		if(isset($data['where_in'])){
			for($i=0;$i<count($data['where_in']);$i++){
				if($data['where_in_data'][$i] != ''){
					$this->db->where_in($data['where_in'][$i], $data['where_in_data'][$i]);
				}
			}
		}
		if(isset($data['or_where_in'])){
			for($i=0;$i<count($data['or_where_in']);$i++){
				if($data['or_where_in_data'][$i] != ''){
					$this->db->or_where_in($data['or_where_in'][$i], $data['or_where_in_data'][$i]);
				}
			}
		}
		if(isset($data['like'])){
			for($i=0;$i<count($data['like']);$i++){
				$this->db->like($data['like'][$i], $data['like_data'][$i], $data['like_type'][$i]);
			}
		}
		if(isset($data['or_like'])){
			for($i=0;$i<count($data['or_like']);$i++){
				$this->db->or_like($data['or_like'][$i], $data['or_like_data'][$i], $data['or_like_type'][$i]);
			}
		}
		if(isset($data['group'])){
			$this->db->group_by($data['group']);
		}
		if(isset($data['order'])){
			for($i=0;$i<count($data['order']);$i++){
				$this->db->order_by($data['order'][$i], $data['order_type'][$i]);
			}
		}
		if(isset($data['limit'])){
			$this->db->limit($data['limit'][0],$data['limit'][1]);
		}
		return $this->db->get();
	}	
	# -------------------------------------------------------------------------
	
	# -------------------------------------------------------------------------
	# View Data Server Side
	# -------------------------------------------------------------------------
	public function _get_datatables_query($data)
    {
        $this->db->from($data['table']);
		if(isset($data['table_join'])){
			for($i=0;$i<count($data['table_join']);$i++){
				$this->db->join($data['table_join'][$i], $data['table_join'][$i].'.'.$data['join_id'][$i].'='.$data['table_join_on'][$i].'.'.$data['join_id'][$i], $data['join_type'][$i]);
			}
		}
		if(isset($data['where'])){
			$this->db->where($data['where']);
		}
		if(isset($data['or_where'])){
			$this->db->or_where($data['or_where']);
		}
		if(isset($data['where_in'])){
			for($i=0;$i<count($data['where_in']);$i++){
				if($data['where_in_data'][$i] != ''){
					$this->db->where_in($data['where_in'][$i], $data['where_in_data'][$i]);
				}
			}
		}
		if(isset($data['or_where_in'])){
			for($i=0;$i<count($data['or_where_in']);$i++){
				if($data['or_where_in_data'][$i] != ''){
					$this->db->or_where_in($data['or_where_in'][$i], $data['or_where_in_data'][$i]);
				}
			}
		}
		if(isset($data['like'])){
			for($i=0;$i<count($data['like']);$i++){
				$this->db->like($data['like'][$i], $data['like_data'][$i], $data['like_type'][$i]);
			}
		}
		if(isset($data['group'])){
			$this->db->group_by($data['group']);
		}
		$i = 0;
        foreach($data['column_search'] as $item){
            if($_POST['search']['value']){
				if($i===0){
					$this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }else{
                    $this->db->or_like($item, $_POST['search']['value']);
                }
				if((count($data['column_search'])-1) == $i){
					$this->db->group_end();
				}
            }
            $i++;
        }
        if(isset($_POST['order'])){
            $this->db->order_by($data['column_order'][$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }elseif(isset($data['order'])){
            $order = $data['order'];
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables($data)
    {
		$this->_get_datatables_query($data);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($data)
    {
        $this->_get_datatables_query($data);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($data)
    {
        $this->db->from($data['table']);
        return $this->db->count_all_results();
    }

    
}
?>