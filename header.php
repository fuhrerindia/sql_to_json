<?php
    include('string.php');
    function debug_error($message){
        global $debug_mode;
        if ($debug_mode){
            return $message;
        }else{
            return "Error";
        }
    }
    function dump_sql($con, $sql){
        $sql_terms = explode(" ", $sql);
        $output = array();
        if ($con){
            switch($sql_terms[0]){
                case 'INSERT':
                    if (mysqli_query($con, $sql)){
                        $output['message'] = "success";
                        $output['status'] = "200";
                    }else{
                        $output['message'] = debug_error("Unknown query provided");
                    }
                    break;
                case 'SELECT':
                    if ($run = mysqli_query($con, $sql)){
                        $row_count = mysqli_num_rows($run);
                        $result = array();
                        while($row = mysqli_fetch_assoc($run)){
                            array_push($result, $row);
                        }
                        $output['response'] = array();
                        $output['response']['quantity'] = $row_count;
                        $output['response']['result'] = $result;
                        $output['status'] = '200';
                        $output['message'] = 'success';
                        
                    }else{
                        $output['message'] = debug_error("SQL Query Error or Error in running query. Check query or user permissions");
                        $output['status'] = '500';

                    }
                    break;
            }
        }else{
            $output['message'] = debug_error("Error while connecting to database");
            $output['status'] = "500";
        }
        return json_encode($output);
    }
?>
