<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";
  
$conn = new mysqli($servername,$username,$password,$dbname);
  
 if ($conn -> connect_errno)
 {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
 }

 $sql = "select * from stutable";
 $result = ($conn->query($sql));

//  $row = []; 

 if ($response->num_rows > 0) {
    while($row[] = $response -> fetch_assoc()) {
        $item = $row;
        $json = json_encode($item);
    }
}

//  $jsondata = json_encode($row); 
//  echo "const javascript_array = " . $jsondata . ";\n"; 
//  print_r($jsondata);
// if($result !== false) {
//     // Create the beginning of HTML table, and the first row with colums title
//     $html_table = '<table border="1" cellspacing="0" cellpadding="2"><tr><th>ID</th><th>Site</th><th>Visits</th></tr>';

//     // Parse the result set, and adds each row and colums in HTML table
//     foreach($result as $row) {
//       $html_table .= '<tr><td>' .$row['id']. '</td><td>' .$row['site']. '</td><td>' .$row['visits']. '</td></tr>';
//     }
// }


// $hostdb = 'localhost';
// $namedb = 'student';
// $userdb = 'root';
// $passdb = '';


// try {
//     $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
//     $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
//     $sql = "select * from stutable";
//     $result = $conn->query($sql);
  
//     if($result !== false) {
//         // print_r($result);
//       // Create the beginning of HTML table, and the first row with colums title
//       $html_table = '<table border="1" cellspacing="0" cellpadding="2"><tr><th>ID</th><th>Name</th></tr>';
  
//       // Parse the result set, and adds each row and colums in HTML table
//       foreach($result as $row) {
//         $html_table .= '<tr><td>' .$row['id']. '</td><td>' .$row['Name']. '</td></tr>';
//       }
//     }
  
//     $conn = null;        // Disconnect
  
//     $html_table .= '</table>';           // ends the HTML table
  
//     echo $html_table;        // display the HTML table
//   }
//   catch(PDOException $e) {
//     echo $e->getMessage();
//   }










 

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data = file_get_contents('php://input');
    $dataArray = json_decode($data, true);
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'student';
    $conn = mysqli_connect($hostname, $username, $password, $database);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $usertable1 = "stutable";
    $stmt = $conn->prepare("INSERT INTO $usertable1 (`Name`) VALUES (?)");
    $query = "SELECT * FROM `stutable`;";
  
    $result = $conn->query($query);
    
    //   print_r($result);
    if (!$stmt) {
        die("Error preparing the statement: " . $conn->error);
    }
    

    foreach ($dataArray as $data) {

        $value = $data['value'];

        $stmt->bind_param('s',  $value);

        if (!$stmt->execute()) {
            die("Error executing the query: " . $stmt->error);
        }
    // print_r($stmt);exit;

    }

    $stmt->close();
    $conn->close();
    $response = array('message' => 'Data received successfully');
    echo json_encode($response);
}



    // $hostname = 'localhost';
    // $username = 'root';
    // $password = '';
    // $database = 'student';
    // $conn = mysqli_connect($hostname, $username, $password, $database);
    
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }
    // $query = "SELECT * FROM `stutable`;";

    // $result = mysqli_query($conn, $query);

    // if(!result){
    //     die("Connection failed: " . mysqli_error($conn));
    // }

    // $dataArray = array();


    // while($row = mysqli_fetch_assoc($result)){
    //     $dataArray[] = $row;
    // }


    // $conn->close();

    // $response = array('message' => 'Get Data successfully');
    // echo json_encode($response);











?>
