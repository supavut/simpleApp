<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class My_GenericModel extends CI_Model {

    protected $table_name = null;

    protected $fields = array();
    protected $exclude_fileds = array();
    protected $protected_fileds = array();

    protected $timestamp = true;
    protected $created_at_column = "created_at";
    protected $updated_at_column = "updated_at";

    protected $primary_column = "id";


    public function __construct(){
        parent::__construct();
        if ($this->table_name == null){
            throw new Exception('Table Name in model not found.');
        }
        $fields = $this->db->field_data($this->table_name);
        foreach ($fields as $field)
        {
            $this->fields[] = $field->name;
            $this->{$field->name} = "";
        }
        date_default_timezone_set("Asia/Bangkok");
    }

    public function set($data){
        foreach ($data AS $key => $value){
            $this->{$key} = $value;
        }
    }

    public function get(){
        $this->db->select($this->table_name.'.*');
        $query = $this->db->get($this->table_name);
        return $this->converntReseult($query->result());
    }

    public function get_unique_result(){
        $query = $this->db->get($this->table_name);
        $results = $this->converntReseult($query->result());

        return count($results)?$results[0]:null;
    }

    public function count_all_result(){
        return $this->db->count_all($this->table_name);
    }

    public function count_result(){
        return $this->db->count_all_results($this->table_name);
    }

    public function order_by($column = null ,$sort_type = null){
        if($column === null){
            $column = $this->created_at_column;
        }
        if($sort_type === null){
            $sort_type = 'DESC';
        }
        $this->db->order_by($column, $sort_type);
        return $this;
    }

    public function find($value){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where($this->primary_column,$value);
        $query = $this->db->get();
        return  $query->num_rows()>0?$this->converntReseult($query->row()):null;
    }

    public function pagination($per_page = 0,$offset = 0){
        $this->db->select($this->table_name.'.*');
        if($per_page == 0 || $per_page == null){
            $query = $this->db->get($this->table_name);
        }else{
            $query = $this->db->get( $this->table_name,$per_page,$offset);
        }
        return $this->converntReseult($query->result());
    }

    public function query($conditions = null){
        foreach($conditions as $condition=>$value){
            $this->db->where($condition,$value);
        }
        return $this;
    }

    public function save(){
        if($this->{$this->primary_column} == 0 || $this->{$this->primary_column} == "" || $this->{$this->primary_column} == null){

            if($this->timestamp){
                $date = new Datetime;
                $this->{$this->created_at_column}= $date->format('Y-m-d H:i:s');
                $this->{$this->updated_at_column}= $date->format('Y-m-d H:i:s');
            }
            $temp = array();

            foreach ($this->fields as $field)
            {
                $temp[$field] = $this->{$field};
            }

            $is_complete = $this->db->insert($this->table_name, $temp);
            if($is_complete){
                $this->id = $this->db->insert_id();
            }
            return $is_complete;
        }else{
            return $this->update();
        }
    }

    public function update(){
        if($this->timestamp){
            $date = new Datetime;
            $this->{$this->updated_at_column}= $date->format('Y-m-d H:i:s');
        }

        $this->db->where($this->primary_column, $this->{$this->primary_column});
        $temp = array();

        foreach ($this->fields as $field)
        {
            $temp[$field] = $this->{$field};
        }

       $this->db->update($this->table_name, $temp);
       //$this->db->update($this->table_name, $this);

        if($this->db->affected_rows() > 0 ){
            return true;
        }else{
            return false;
        }
    }

    public function delete(){
        $this->db->where($this->primary_column, $this->{$this->primary_column});
        $this->db->delete($this->table_name);
        if($this->db->affected_rows() > 0 ){
            return true;
        }else{
            return false;
        }
    }

    public function toArray(){
        $result = array();
        foreach (array_diff($this->fields,$this->protected_fileds) as $field){
            $result[$field] = $this->{$field};
        }
        return $result;
    }

    public function converntReseult($result){
        $class_name = get_class($this);
        if(is_array($result)){
            $results = array();
            foreach($result as $data){
                $instance = new $class_name();
                foreach ($this->fields as $field){
                    $instance->{$field} = $data->{$field};
                }
                $results[] = $instance;
            }
            return $results;
        }else{
            $instance = new $class_name();
            foreach ($this->fields as $field){
                $instance->{$field} = $result->{$field};
            }
            return $instance;
        }
    }

    public function addProtected($field){
        array_push($this->protected_fileds,$field);
    }

    public function resetProtected(){
        $this->protected_fileds= array();
    }

    public function fillToObject($array){
        foreach ($array as $key => $value){
            if (in_array($key, array_diff($this->fields,$this->exclude_fileds))){
                $this->{$key} = $value;
            }
        }
    }

}
