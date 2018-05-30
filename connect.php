<?php
class connect
{

  function __construct()
  {
    mysql_connect("localhost","root","");
    mysql_select_db("clinicmgtdb");
    //echo "Database is connected";
  }

  public function family_master($param1="",$param2="")
  {
        if($param1=="view")
        {
          $query="select * from tbl_family_master";
          $resultset=mysql_query($query);
          while($row=mysql_fetch_assoc($resultset))
          {
          	$output_data[]=$row;
          }
          print json_encode($output_data);
        }
        else if($param1=="add")
        {
          //echo "Add is called";
          $data=json_decode($param2);
          $fname=mysql_real_escape_string($data->fname);
          $mname=mysql_real_escape_string($data->mname);
          $sname=mysql_real_escape_string($data->sname);
          $full_name=mysql_real_escape_string($data->full_name);
          $phone=mysql_real_escape_string($data->phone);
          $mobile=mysql_real_escape_string($data->mobile);
          $email=mysql_real_escape_string($data->email);
          $address=mysql_real_escape_string($data->address);
          $city=mysql_real_escape_string($data->city);
          $state=mysql_real_escape_string($data->state);
          $pincode=mysql_real_escape_string($data->pincode);
          $fax=mysql_real_escape_string($data->fax);
          $notes=mysql_real_escape_string($data->notes);

          $query="insert into tbl_family_master values(NULL,'".$fname."','".$mname."','".$sname."','".$full_name."','".$address."','".$city."',
          '".$phone."','".$mobile."','".$pincode."','".$fax."','".$email."','".$state ."','".$notes."')";
          mysql_query($query);

        }
        else if($param1=="delete")
        {
          //$data=json_decode($_POST["data"]);
          $data=json_decode($param2);
          $pid = mysql_real_escape_string($data->id);
          $query="delete from tbl_family_master where family_master_id=".$pid;
          mysql_query($query);
        }
        else if($param1=="edit")
        {
          $data=json_decode($param2);
          $pid = mysql_real_escape_string($data->id);
          $query="select * from tbl_family_master where family_master_id=".$pid;
          $resultset=mysql_query($query);
          while($row=mysql_fetch_assoc($resultset))
          {
          	$output_data[]=$row;
          }
          print json_encode($output_data);
        }
        else if($param1=="do_update")
        {
          $data=json_decode($param2);

          $id=mysql_real_escape_string($data->id);
          $fname=mysql_real_escape_string($data->fname);
          $mname=mysql_real_escape_string($data->mname);
          $sname=mysql_real_escape_string($data->sname);
          $full_name=mysql_real_escape_string($data->full_name);
          $phone=mysql_real_escape_string($data->phone);
          $mobile=mysql_real_escape_string($data->mobile);
          $email=mysql_real_escape_string($data->email);
          $address=mysql_real_escape_string($data->address);
          $city=mysql_real_escape_string($data->city);
          $state=mysql_real_escape_string($data->state);
          $pincode=mysql_real_escape_string($data->pincode);
          $fax=mysql_real_escape_string($data->fax);
          $notes=mysql_real_escape_string($data->notes);

          $query="update tbl_family_master set family_first_name='".$fname."',family_middle_name='".$mname."',family_last_name='".$sname."',
          family_full_name='".$full_name."',family_address='".$address."',family_city='".$city."',family_phone='".$phone."',
          family_mobile='".$mobile."',family_pin='".$pincode."',family_fax='".$fax."',family_email='".$email."',
          family_state='".$state."',family_note='".$notes."' where family_master_id=".$id;
          mysql_query($query);
        }
        else if($param1=="search")
        {
          $data=json_decode($param2);
          $name = trim(mysql_real_escape_string($data->name));
          $query="select * from tbl_family_master where family_full_name like '%".$name."%'";
          $resultset=mysql_query($query);
          while($row=mysql_fetch_assoc($resultset))
          {
          	$output_data[]=$row;
          }
          print json_encode($output_data);
        }
  }
  public function diagnosis($param1="",$param2="")
  {
        if($param1=="view")
        {
          $query="select * from tbl_diagnosis";
          $resultset=mysql_query($query);
          while($row=mysql_fetch_assoc($resultset))
          {
          	$output_data[]=$row;
          }
          print json_encode($output_data);
        }
        else if($param1=="add")
        {
          $data=json_decode($param2);
          $diagnosis_name=mysql_real_escape_string($data->diagnosis_name);
          $query="insert into tbl_diagnosis values(NULL,'".$diagnosis_name."')";
          mysql_query($query);
        }
        else if($param1=="delete")
        {
          $data=json_decode($param2);
          $pid = mysql_real_escape_string($data->id);
          $query="delete from tbl_diagnosis where diagnosis_id=".$pid;
          mysql_query($query);
        }
        else if($param1=="edit")
        {
          $data=json_decode($param2);
          $pid = mysql_real_escape_string($data->id);
          $query="select * from tbl_diagnosis where diagnosis_id=".$pid;
          $resultset=mysql_query($query);
          while($row=mysql_fetch_assoc($resultset))
          {
          	$output_data[]=$row;
          }
          print json_encode($output_data);
        }
        else if($param1=="do_update")
        {
          $data=json_decode($param2);
          $id=mysql_real_escape_string($data->id);
          $diagnosis_name=mysql_real_escape_string($data->diagnosis_name);
          $query="update tbl_diagnosis set diagnosis_name='".$diagnosis_name."' where diagnosis_id=".$id;
          mysql_query($query);
        }
        else if($param1=="search")
        {
          $data=json_decode($param2);
          $name = trim(mysql_real_escape_string($data->name));
          $query="select * from tbl_diagnosis where diagnosis_name like '%".$name."%'";
          $resultset=mysql_query($query);
          while($row=mysql_fetch_assoc($resultset))
          {
          	$output_data[]=$row;
          }
          print json_encode($output_data);
        }
  }
  public function dosage($param1="",$param2="")
  {
        if($param1=="view")
        {
          $query="select * from tbl_dosage";
          $resultset=mysql_query($query);
          while($row=mysql_fetch_assoc($resultset))
          {
          	$output_data[]=$row;
          }
          print json_encode($output_data);
        }
        else if($param1=="add")
        {
          $data=json_decode($param2);
          $dose_name=mysql_real_escape_string($data->dose_name);
          $dose_description=mysql_real_escape_string($data->dose_description);
          $dose_description2=mysql_real_escape_string($data->dose_description2);
          $dose_med_qty=mysql_real_escape_string($data->dose_med_qty);

          $query="insert into tbl_dosage values(NULL,'".$dose_name."','".$dose_description."','".$dose_description2."',
          '".$dose_med_qty."')";
          mysql_query($query);
        }
        else if($param1=="delete")
        {
          $data=json_decode($param2);
          $pid = mysql_real_escape_string($data->id);
          $query="delete from tbl_dosage where dose_id=".$pid;
          mysql_query($query);
        }
        else if($param1=="edit")
        {
          $data=json_decode($param2);
          $pid = mysql_real_escape_string($data->id);
          $query="select * from tbl_dosage where dose_id=".$pid;
          $resultset=mysql_query($query);
          while($row=mysql_fetch_assoc($resultset))
          {
          	$output_data[]=$row;
          }
          print json_encode($output_data);
        }
        else if($param1=="do_update")
        {
          $data=json_decode($param2);
          $id=mysql_real_escape_string($data->id);
          $dose_name=mysql_real_escape_string($data->dose_name);
          $dose_description=mysql_real_escape_string($data->dose_description);
          $dose_description2=mysql_real_escape_string($data->dose_description2);
          $dose_med_qty=mysql_real_escape_string($data->dose_med_qty);

          $query="update tbl_dosage set dose_name='".$dose_name."',dose_description='".$dose_description."',
          dose_description2='".$dose_description2."',dose_med_qty='".$dose_med_qty."' where dose_id=".$id;
          mysql_query($query);
        }
        else if($param1=="search")
        {
          $data=json_decode($param2);
          $name = trim(mysql_real_escape_string($data->name));
          $query="select * from tbl_dosage where dose_name like '%".$name."%'";
          $resultset=mysql_query($query);
          while($row=mysql_fetch_assoc($resultset))
          {
          	$output_data[]=$row;
          }
          print json_encode($output_data);
        }
  }

  public function medicine($param1="",$param2="")
  {
        if($param1=="view")
        {
          $query="select * from tbl_medicine";
          $resultset=mysql_query($query);
          while($row=mysql_fetch_assoc($resultset))
          {
          	$output_data[]=$row;
          }
          print json_encode($output_data);
        }
        else if($param1=="add")
        {
          $data=json_decode($param2);
          $medicine_name=mysql_real_escape_string($data->medicine_name);
          $medicine_status=mysql_real_escape_string($data->medicine_status);
          $medicine_per_day=mysql_real_escape_string($data->medicine_per_day);
          $medicine_strength=mysql_real_escape_string($data->medicine_strength);
          $medicine_mg_kg_day=mysql_real_escape_string($data->medicine_mg_kg_day);
          $medicine_stock=mysql_real_escape_string($data->medicine_stock);


          $query="insert into tbl_medicine values(NULL,'".$medicine_name."','".$medicine_status."','".$medicine_per_day."',
          '".$medicine_strength."','".$medicine_mg_kg_day."','".$medicine_stock."')";
          mysql_query($query);
        }
        else if($param1=="delete")
        {
          $data=json_decode($param2);
          $pid = mysql_real_escape_string($data->id);
          $query="delete from tbl_medicine where medicine_id=".$pid;
          mysql_query($query);
        }
        else if($param1=="edit")
        {
          $data=json_decode($param2);
          $pid = mysql_real_escape_string($data->id);
          $query="select * from tbl_medicine where medicine_id=".$pid;
          $resultset=mysql_query($query);
          while($row=mysql_fetch_assoc($resultset))
          {
          	$output_data[]=$row;
          }
          print json_encode($output_data);
        }
        else if($param1=="do_update")
        {
          $data=json_decode($param2);
          $id=mysql_real_escape_string($data->id);
          $medicine_name=mysql_real_escape_string($data->medicine_name);
          $medicine_status=mysql_real_escape_string($data->medicine_status);
          $medicine_per_day=mysql_real_escape_string($data->medicine_per_day);
          $medicine_strength=mysql_real_escape_string($data->medicine_strength);
          $medicine_mg_kg_day=mysql_real_escape_string($data->medicine_mg_kg_day);
          $medicine_stock=mysql_real_escape_string($data->medicine_stock);

          $query="update tbl_dosage set dose_name='".$dose_name."',dose_description='".$dose_description."',
          dose_description2='".$dose_description2."',dose_med_qty='".$dose_med_qty."' where dose_id=".$id;
          mysql_query($query);
        }
        else if($param1=="search")
        {
          $data=json_decode($param2);
          $name = trim(mysql_real_escape_string($data->name));
          $query="select * from tbl_dosage where dose_name like '%".$name."%'";
          $resultset=mysql_query($query);
          while($row=mysql_fetch_assoc($resultset))
          {
          	$output_data[]=$row;
          }
          print json_encode($output_data);
        }
  }
}
?>
