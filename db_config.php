<?php
//$servername = "71.43.247.130\\sqlexpress, 9000";
//$servername = "docwatts.dyndns.org\\sqlexpress, 9000";
$servername = "APP-SERVER";
$username = "SharePoint";
$password = "ConnectMe2023!";
$dbname = "DocWatts";
$connectionInfo = array( "UID"=>$username ,                            
                         "PWD"=>$password ,                            
                         "Database"=>$dbname); 

/* Connect using SQL Server Authentication. */  
$conn = sqlsrv_connect( $servername , $connectionInfo);  
if( $conn ) {
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

if(isset($_REQUEST["type"])&&$_REQUEST["type"]=="all"){

    $sql = "Select * from invntryitm";
    $result = sqlsrv_query($conn, $sql);
    if( $result === false) {
       	echo -1;
    }else{
    	$result_array = array();
	while( $row = sqlsrv_fetch_array( $result , SQLSRV_FETCH_ASSOC) ) {
      		array_push($result_array,$row);
    	}
	echo json_encode($result_array );
    }


}

if(isset($_REQUEST["type"])&&$_REQUEST["type"]=="filter"){

    $filter = $_REQUEST["filter"];
    $filter = trim($filter);
    $words = explode(" ", $filter);
    $sql = "Select * from invntryitm";
    $result = sqlsrv_query($conn, $sql);
    if($result=== false){
	echo -1;
    }else {
      // output data of each row
      $result_array = array();

      while($row = sqlsrv_fetch_array( $result , SQLSRV_FETCH_ASSOC) ) {
        array_push($result_array,$row);
      }
      $result_arr = array();
      //asdf
      foreach($result_array as $item){
          $count = 0;
          foreach($words as $word){
            if(strpos(strtolower($item['invntryitm_nme']), strtolower($word)) !== false)
                $count++;
            else
                break;
          } 
          if($count==count($words)){
            array_push($result_arr,$item);
          }
      }
       echo json_encode($result_arr);
    } 
}


?>