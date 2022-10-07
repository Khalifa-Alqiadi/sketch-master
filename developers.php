<!-- <?php/*
    //include("connect.php");
    $db= $conn;
    $FtableName="sketc";
    $StableName="users";
    
    $Fcolumns= ['id_sketc', 'cost','energy','cost_ds','energy_ds', 'created_at'];
    $Scolumns= ['id', 'user', 'is_admin', 'name', 'id_energy']
    $FfetchData = fetch_data($db, $FtableName, $Fcolumns);
    $SfetchData = fetch_data($db, $StableName, $Scolumns);
    function fetch_data($db, $tableName, $columns){
    if(empty($db)){
        $msg= "Database connection error";
    }elseif (empty($columns) || !is_array($columns)) {
        $msg="columns Name must be defined in an indexed array";
    }elseif(empty($tableName)){
        $msg= "Table Name is empty";
    }else{
        $columnName = implode(", ", $columns);
        $query = "SELECT ".$columnName." FROM $tableName"." ORDER BY id DESC";
        $result = $db->query($query);
        if($result== true){ 
            if ($result->num_rows > 0) {
                $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg= $row;
            } else {
                $msg= "No Data Found"; 
            }
        }else{
            $msg= mysqli_error($db);
        }
    }
    return $msg;
    }
?> -->