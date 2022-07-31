
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
                $continent_code = $getData[0];
                $currency_code = $getData[1];
                $iso2_code = $getData[2];
                $iso3_code = $getData[3];
                $iso_numeric_code = $getData[4];
                $fips_code = $getData[5];
                $calling_code = $getData[6];
                $common_name = $getData[7];
                $official_name = $getData[8];
                $endonym = $getData[9];
                $demonym = $getData[10];
 
                // If user already exists in the database with the same email
                $query = "SELECT id FROM countries WHERE official_name = '" . $getData[8] . "'";
 
                $check = $db->query($query);
 
        if ($check->num_rows > 0)
        {
            $db->query("UPDATE countries SET continent_code = '" . $continent_code . "', currency_code = '" . $currency_code . "', iso2_code = '" . $iso2_code . "', iso3_code = '" . $iso3_code . "', iso_numeric_code = '" . $iso_numeric_code . "', fips_code = '" . $fips_code . "', calling_code = '" . $calling_code . "', common_name = '" . $common_name . "', endonym = '" . $endonym . "', demonym = '" . $demonym . "', created = NOW() WHERE official_name = '" . $official_name . "'");

        }
        else
        {
            $db->query("INSERT INTO countries (continent_code, currency_code, iso2_code, iso3_code, iso_numeric_code, fips_code, calling_code, common_name, official_name, endonym, demonym, created)
            VALUES ('" . $continent_code . "', '" . $currency_code . "', '" . $iso2_code . "', '" . $iso3_code . "', '" . $iso_numeric_code . "', '" . $fips_code . "', '" . $calling_code . "', '" . $common_name . "', '" . $official_name . "', '" . $endonym . "', '" . $demonym . "', NOW())");
 
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
