<?php
require_once('../config.php');
Class Master extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	function capture_err(){
		if(!$this->conn->error)
			return false;
		else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			return json_encode($resp);
			exit;
		}
	}
	function save_category(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k,['id'])){
				$v = $this->conn->real_escape_string($v);
				if(!empty($data)) $data .= ", ";
				$data .= "`{$k}` = '{$v}'";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `category_list` set {$data}";
		}else{
			$sql = "UPDATE `category_list` set {$data} where id = '{$id}'";
		}
		$save = $this->conn->query($sql);
		if($save){
			$cid= empty($id) ? $this->conn->insert_id : $id ;
			$resp['status'] = 'success';
				if(empty($id))
					$this->settings->set_flashdata('success',"Category has been added successfully.");
				else
					$this->settings->set_flashdata('success',"Category has been updated.");
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = 'Saving Category failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function delete_category(){
		extract($_POST);
		$delete = $this->conn->query("UPDATE `category_list` set delete_flag = 1 where id = '{$id}' ");
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Category has been deleted successfully");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;

		}
		return json_encode($resp);
	}
	function dt_categories(){
		extract($_POST);
 
		$totalCount = $this->conn->query("SELECT * FROM `category_list` where  delete_flag = 0 ")->num_rows;
		$search_where = "";
		if(!empty($search['value'])){
			$search_where .= "name LIKE '%{$search['value']}%' ";
			$search_where .= " OR description LIKE '%{$search['value']}%' ";
			$search_where .= " OR date_format(date_updated,'%M %d, %Y') LIKE '%{$search['value']}%' ";
			$search_where = " and ({$search_where}) ";
		}
		$columns_arr = array("unix_timestamp(date_updated)",
							"unix_timestamp(date_updated)",
							"name",
							"description",
							"status",
							"unix_timestamp(birthdate)");
		$query = $this->conn->query("SELECT * FROM `category_list`  where  delete_flag = 0  {$search_where} ORDER BY {$columns_arr[$order[0]['column']]} {$order[0]['dir']} limit {$length} offset {$start} ");
		$recordsFilterCount = $this->conn->query("SELECT * FROM `category_list`  where  delete_flag = 0  {$search_where} ")->num_rows;
		
		$recordsTotal= $totalCount;
		$recordsFiltered= $recordsFilterCount;
		$data = array();
		$i= 1 + $start;
		while($row = $query->fetch_assoc()){
			$row['no'] = $i++;
			$row['date_updated'] = date("F d, Y H:i",strtotime($row['date_updated']));
			$data[] = $row;
		}
		echo json_encode(array('draw'=>$draw,
							'recordsTotal'=>$recordsTotal,
							'recordsFiltered'=>$recordsFiltered,
							'data'=>$data
							)
		);
	}
	function save_clinic(){
		$_POST['doctors'] = implode('||',$_POST['doctor']);
		$_POST['contacts'] = implode('||',$_POST['contact']);
		$_POST['emails'] = implode('||',$_POST['email']);
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k,['id','category_id']) && !is_array($_POST[$k])){
				$v = $this->conn->real_escape_string($v);
				if(!empty($data)) $data .= ", ";
				$data .= "`{$k}` = '{$v}'";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `clinic_list` set {$data}";
		}else{
			$sql = "UPDATE `clinic_list` set {$data} where id = '{$id}'";
		}
		$save = $this->conn->query($sql);
		if($save){
			$cid= empty($id) ? $this->conn->insert_id : $id ;
			$resp['cid'] = $cid;
			$data = "";
			foreach($category_id as $k => $v){
				$category_id = $v;
				if(!empty($data)) $data .= ", ";
				$data .= "('{$cid}','{$category_id}')";
			}
			if(!empty($data)){
				$this->conn->query("DELETE FROM `clinic_category` where clinic_id = '{$cid}'");
				$sql2 = "INSERT INTO `clinic_category` (`clinic_id`, `category_id`) VALUES {$data}";
				$save2 = $this->conn->query($sql2);
				if($save2){
					$resp['status'] = 'success';
					if(empty($id))
						$this->settings->set_flashdata('success',"Clinic has been added successfully.");
					else
						$this->settings->set_flashdata('success',"Clinic has been updated.");
				}else{
					$resp['status'] = 'failed';
					$resp['msg'] = 'Saving Clinic failed';
					$resp['error'] = $this->conn->error;
					if(empty($id))
						$this->conn->query("DELETE FROM `clinic_list` where id = '{$cid}'");
				}
			}
			
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = 'Saving Clinic failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function delete_clinic(){
		extract($_POST);
		$delete = $this->conn->query("UPDATE `clinic_list` set delete_flag = 1 where id = '{$id}' ");
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Clinic has been deleted successfully");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;

		}
		return json_encode($resp);
	}
	function dt_clinics(){
		extract($_POST);
 
		$totalCount = $this->conn->query("SELECT * FROM `clinic_list` where  delete_flag = 0 ")->num_rows;
		$search_where = "";
		$columns_arr = array("unix_timestamp(date_updated)",
							"unix_timestamp(date_updated)",
							"doctors",
							"status",
							"unix_timestamp(birthdate)");
		if(!empty($search['value'])){
			$search_where .= "location LIKE '%{$search['value']}%' ";
			$search_where .= " OR doctors LIKE '%{$search['value']}%' ";
			$search_where .= " OR contacts LIKE '%{$search['value']}%' ";
			$search_where .= " OR emails LIKE '%{$search['value']}%' ";
			$search_where .= " OR date_format(date_updated,'%M %d, %Y') LIKE '%{$search['value']}%' or id in (SELECT clinic_id FROM clinic_category where category_id in (SELECT id FROM category_list where name LIKE '%{$search['value']}%') ) ";
			$search_where = " and ({$search_where}) ";
		}
		$query = $this->conn->query("SELECT * FROM `clinic_list`  where  delete_flag = 0  {$search_where} ORDER BY {$columns_arr[$order[0]['column']]} {$order[0]['dir']} limit {$length} offset {$start} ");
		$recordsFilterCount = $this->conn->query("SELECT * FROM `clinic_list`  where  delete_flag = 0  {$search_where} ")->num_rows;
		
		$recordsTotal= $totalCount;
		$recordsFiltered= $recordsFilterCount;
		$data = array();
		$i= 1 + $start;
		while($row = $query->fetch_assoc()){
			$row['no'] = $i++;
			$categories = $this->conn->query("SELECT cc.name as category FROM clinic_category c inner join category_list cc on c.category_id = cc.id where c.clinic_id = '{$row['id']}' ")->fetch_all(MYSQLI_ASSOC);
			$cats = array_column($categories,'category');
			$cats = implode(", ", $cats);
			$row['category'] = $cats;
			$row['doctors'] = str_replace("||"," & ",$row['doctors']);
			$row['date_updated'] = date("F d, Y H:i",strtotime($row['date_updated']));
			$data[] = $row;
		}
		echo json_encode(array('draw'=>$draw,
							'recordsTotal'=>$recordsTotal,
							'recordsFiltered'=>$recordsFiltered,
							'data'=>$data
							)
		);
	}
	function dt_clinics_public(){
		extract($_POST);
 
		$totalCount = $this->conn->query("SELECT * FROM `clinic_list` where  delete_flag = 0 ")->num_rows;
		$search_where = "";
		$columns_arr = array("unix_timestamp(date_updated)",
							"unix_timestamp(date_updated)",
							"doctors",
							"status",
							"unix_timestamp(birthdate)");
		if(!empty($search['value'])){
			$search_where .= "location LIKE '%{$search['value']}%' ";
			$search_where .= " OR id in (SELECT clinic_id FROM clinic_category where category_id in (SELECT id FROM category_list where name LIKE '%{$search['value']}%') ) ";
			$search_where = " and ({$search_where}) ";
		}
		$query = $this->conn->query("SELECT * FROM `clinic_list`  where  delete_flag = 0  {$search_where} ORDER BY {$columns_arr[$order[0]['column']]} {$order[0]['dir']} limit {$length} offset {$start} ");
		$recordsFilterCount = $this->conn->query("SELECT * FROM `clinic_list`  where  delete_flag = 0  {$search_where} ")->num_rows;
		
		$recordsTotal= $totalCount;
		$recordsFiltered= $recordsFilterCount;
		$data = array();
		$i= 1 + $start;
		while($row = $query->fetch_assoc()){
			$row['no'] = $i++;
			$categories = $this->conn->query("SELECT cc.name as category FROM clinic_category c inner join category_list cc on c.category_id = cc.id where c.clinic_id = '{$row['id']}' ")->fetch_all(MYSQLI_ASSOC);
			$cats = array_column($categories,'category');
			$cats = implode(", ", $cats);
			$row['category'] = $cats;
			$row['doctors'] = str_replace("||"," & ",$row['doctors']);
			$row['date_updated'] = date("F d, Y H:i",strtotime($row['date_updated']));
			$data[] = $row;
		}
		echo json_encode(array('draw'=>$draw,
							'recordsTotal'=>$recordsTotal,
							'recordsFiltered'=>$recordsFiltered,
							'data'=>$data
							)
		);
	}
	
}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'save_category':
		echo $Master->save_category();
	break;
	case 'delete_category':
		echo $Master->delete_category();
	break;
	case 'dt_categories':
		echo $Master->dt_categories();
	break;
	case 'save_clinic':
		echo $Master->save_clinic();
	break;
	case 'delete_clinic':
		echo $Master->delete_clinic();
	break;
	case 'dt_clinics':
		echo $Master->dt_clinics();
	break;
	case 'dt_clinics_public':
		echo $Master->dt_clinics_public();
	break;
	default:
		// echo $sysset->index();
		break;
}