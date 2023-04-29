


<?php
//edit: db and sql query. goods na

include_once('xxxdbconfig.php'); //edit mo lang db
 //try lang
                    // Set the filename and content type header
                    $filename = 'data.csv';
                    header('Content-Type: text/csv');
                    header('Content-Disposition: attachment; filename=' . $filename);

                    // Open a file pointer connected to php://output
                    $fp = fopen('php://output', 'w');

                    // Fetch the data from MySQL and write it to the file pointer as CSV
                    $sql = "SELECT * FROM posts"; //edit mo lang ini
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        fputcsv($fp, $row);
                    }

                    // Close the file pointer and exit
                    fclose($fp);
                    exit();

    ?>