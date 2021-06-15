<?php
	
	// include database connection file

	include_once "connection.php";

	// autocomplete textbox jquery ajax in PHP
	
	if (isset($_POST['city'])) {

  		$output = "";
  		$city = $_POST['city'];
  		$query = "SELECT * FROM stocks WHERE Name LIKE '%$city%'";
  		$result = $conn->query($query);

  		$output = '<ul class="list-unstyled">';		

  		if ($result->num_rows > 0) {
  			while ($row = $result->fetch_array()) {
  				$output .= '<li>'.ucwords($row['Name']).'</li>';
  			}
  		}else{
  			  $output .= '<li> name not Found</li>';
  		}
  		
	  	$output .= '</ul>';
	  	echo $output;
	}

   if (isset($_POST['name'])) {
    $name=$_POST['name'];
    //echo $name;
    $output = "";
    $query="SELECT * FROM stocks where name='".$name."'";
    $result = $conn->query($query);
$output = '<table class="table table-bordered table-striped">
    <tr>
    <th>S.No</th>
    <th>Name</th>
    <th>Current Market Price</th>
    <th>Market Cap</th>
    <th>Stock P/E</th>
    </tr>

    ';
   while ($row = $result->fetch_array()) {
          $output .='<tr>
            <td>'.$row["S.No"].'</td>
            <td>'.$row["Name"].'</td>
            <td>'.$row["Current Market Price"].'</td>
            <td>'.$row["Market Cap"].'</td>
            <td>'.$row["Stock P/E"].'</td>';

        }
        $output.='<table>';

echo $output;
    
}
?>