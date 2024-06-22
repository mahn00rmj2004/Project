<?php  
include("connect.php");

function getdata(){
    $data = array();
    $data['email'] = $_POST['email'];
    $data['password'] = $_POST['password'];
    return $data;
}

if (isset($_POST['insert'])){
    $info = getdata();
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO userdata (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $info['email'], $info['password']);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
