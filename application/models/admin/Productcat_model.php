<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Productcat_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
		
		
    }
    
    /*
     * Get productcat by ProductCatId
     */
    function get_productcat($ProductCatId)
    {
        return $this->db->get_where('productcat',array('ProductCatId'=>$ProductCatId))->row_array();
    }
    
    /*
     * Get all productcat count
     */
    function get_all_productcat_count()
    {
        $this->db->from('productcat');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all productcat
     */
    function get_all_productcat($params = array())
    {
        $this->db->order_by('ProductCatId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('productcat')->result_array();
    }
	
	function get_all_productcat_dropdown()
	{
		$this->db->order_by('catname', 'asc');
        
		$result = $this->db->get('productcat')->result_array();
		
		$returnArray=array();
		foreach($result as $val)
		{
			$returnArray[$val["ProductCatId"]]=$val["CatName"];
		}
		
        return $returnArray;
	}
        
    /*
     * function to add new productcat
     */
    function add_productcat($params)
    {
        $this->db->insert('productcat',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update productcat
     */
    function update_productcat($ProductCatId,$params)
    {
        $this->db->where('ProductCatId',$ProductCatId);
        return $this->db->update('productcat',$params);
    }
    
    /*
     * function to delete productcat
     */
    function delete_productcat($ProductCatId)
    {
        return $this->db->delete('productcat',array('ProductCatId'=>$ProductCatId));
    }
}