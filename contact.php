<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    // Check if contact form fields are set
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        
        // Insert data into the contact table
        $sql_contact = "INSERT INTO contact (`Name`, `Email_id`, `Message`) 
                        VALUES ('$Name', '$Email_id', '$Message')";

        // Execute the contact insert query
        if (!mysqli_query($conn, $sql_contact)) {         
            echo "ERROR in contact insertion: " . mysqli_error($conn);
        } else {
            echo "Contact data inserted successfully!";
        }
    }

    // Redirect to the landing page after successful insertion
    header("Location: chandigarh_tour.html");  
    exit();     
}

// Close the connection
mysqli_close($conn); 
?>
