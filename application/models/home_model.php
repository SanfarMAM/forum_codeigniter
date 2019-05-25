<?php

class Home_model extends CI_Model {
    public function get_all_category()
    {
        return $this->db->select('*')->get('category')->result('array');
        
    }

    public function get_posts_by_category($category)
    {
        $cat = $this->db->where('category', $category)
                            ->get('category')->last_row();
                            // return $cat;
        return $this->db->select('*')->where('cat_id', $cat->cat_id)
                                ->get('tblpost')->result('array');
        
        
    }
}