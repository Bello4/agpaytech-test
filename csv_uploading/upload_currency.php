
<?php
// include mysql database configuration file
include_once 'db_config.php';
 
if (isset($_POST['importSubmit']))
{
   
    // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
 
    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
    {

 
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
            // Skip the first line
            fgetcsv($csvFile);
 
            // Parse data from CSV file line by line
             // Parse data from CSV file line by line
            while ( ($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
            {
            // Get row data
            $iso_code = $getData[0];
            $iso_numeric_code = $getData[1];
            $common_name = $getData[2];
            $official_name = $getData[3];
            $symbol = $getData[4];

            // If user already exists in the database with the same email
            $query = "SELECT id FROM curren WHERE official_name = '" . $getData[3] . "'";

            $check = $db->query($query);

       if ($check->num_rows > 0)
       {
           $db->query("UPDATE curren SET iso_code = '" . $iso_code . "', iso_numeric_code = '" . $iso_numeric_code . "', common_name = '" . $common_name . "', symbol = '" . $symbol . "', created = NOW() WHERE official_name = '" . $official_name . "'");

       }
       else
       {
           $db->query("INSERT INTO curren (iso_code, iso_numeric_code, common_name, official_name, symbol, created)
           VALUES ('" . $iso_code . "', '" . $iso_numeric_code . "', '" . $common_name . "', '" . $official_name . "', '" . $symbol . "', NOW())");

       }
    }
 
            // Close opened CSV file
            fclose($csvFile);
 
            header("Location: index.php");
         
    }
    else
    {
        echo "Please select valid file";
    }
}

?>





<!-- // Get row data
                $iso_code = $getData[0];
                $iso_numeric_code = $getData[1];
                $common_name = $getData[2];
                $official_name = $getData[3];
                $symbol = $getData[4];
 
                // If user already exists in the database with the same email
                $query = "SELECT id FROM currencies WHERE official_name = '" . $getData[3] . "'";
 
                $check = $db->query($query);
 
        if ($check->num_rows > 0)
        {
            $db->query("UPDATE currencies SET iso_code = '" . $iso_code . "', iso_numeric_code = '" . $iso_numeric_code . "', common_name = '" . $common_name . "', symbol = '" . $symbol . "', created = NOW() WHERE official_name = '" . $official_name . "'");

        }
        else
        {
            $db->query("INSERT INTO currencies (iso_code, iso_numeric_code, common_name, official_name, symbol, created)
            VALUES ('" . $iso_code . "', '" . $iso_numeric_code . "', '" . $common_name . "', '" . $official_name . "', '" . $symbol . "', NOW())");
 
        } -->
