<?php 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database_name = "chand_tour";  

// Create the connection
$conn = mysqli_connect($servername, $username, $password, $database_name);

// Check the connection
if (!$conn) {     
    die("Connection failed: " . mysqli_connect_error()); 
}  

if (isset($_POST['save'])) {     
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $fatherName = mysqli_real_escape_string($conn, $_POST['fatherName']);
    $trip = mysqli_real_escape_string($conn, $_POST['course']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);

    // Insert data into the booking table
    $sql_booking = "INSERT INTO booking (`First Name`, `Last Name`, `Father's Name`, `TRIP`, `Gender`, `User Name`, `Password`, `Contact No.`, `Region/Country`) 
                    VALUES ('$fname', '$lname', '$fatherName', '$trip', '$gender', '$username', '$password', '$contact', '$region')";

    // Execute the booking insert query
    if (!mysqli_query($conn, $sql_booking)) {         
        echo "ERROR in booking insertion: " . mysqli_error($conn);
    } else {
        // Redirect to the landing page after successful insertion
        header("Location: chandigarh_tour.html");  
        exit();
    }
}

// Close the database connection
mysqli_close($conn); 
?>
