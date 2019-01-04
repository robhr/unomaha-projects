<?php
    require_once 'config.php';
    
    // set default timezone
    date_default_timezone_set('America/Chicago');

    if($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        /* get all customers */
        $db = getDbInstance();

        // return customer list
        $customers = $db->get('customers');
        echo json_encode($customers);
    }
    else if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        if(array_key_exists("guid", $_POST))
        {
            if(strlen($_POST["guid"]) > 0 && !array_key_exists("delete", $_POST))
            {
                /* edit customer */
                $db = getDbInstance();

                // send update query
                $db->where("guid", $_POST["guid"]);
                $db->update('customers', $_POST);
            }
            else if(strlen($_POST["guid"]) > 0 && array_key_exists("delete", $_POST))
            {
                /* delete customer */
                $db = getDbInstance();

                // remove unnecessary attributes
                unset($_POST["delete"]);

                // send delete query
                $db->where("guid", $_POST["guid"]);
                $db->delete('customers');
            }
        }
        else
        {
            /* add customer */
            $db = getDbInstance();

            // generate guid
            $guid = bcdechex(str_replace(".", "", microtime(true)));
            $_POST["guid"] = $guid;

            // send insert query
            $db->insert('customers', $_POST);
        }
    }
    else
    {
        http_response_code(404);
        die();
    }

    function bcdechex($dec) {
        $hex = '';

        do {    
            $last = bcmod($dec, 16);
            $hex = dechex($last).$hex;
            $dec = bcdiv(bcsub($dec, $last), 16);
        } while($dec > 0);

        return strtoupper($hex);
    }
?>