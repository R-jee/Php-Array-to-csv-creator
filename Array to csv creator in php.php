
function convert_multiline_toSingleLine_text($s){
    return str_replace(array("\r","\n"),"", trim($s) );
}
function CREATE_CSV_FEEDS___Generic_function( $array , $separated_By){
    $csv = '';
    $separated_By_char = "";
    
    if($separated_By == "comma" ){
        $separated_By_char = " , ";
    }if($separated_By == "tab" ){
        $separated_By_char = "   ";
    }if($separated_By == "semi_colon" ){
        $separated_By_char = " ; ";
    }if($separated_By == "pipe" ){
        $separated_By_char = " | ";
    }

    $header = false;
    foreach ($array as $line) {	
        if (empty($header)) {
            $header = array_keys($line);
            $csv .= implode( $separated_By_char , $header);
            $header = array_flip($header);		
        }
        $line_array = array();
        foreach($line as $value) {
            array_push($line_array,  convert_multiline_toSingleLine_text($value) );
        }
        $csv .= "\n" .  implode( $separated_By_char, $line_array) ;
    }
    return $csv ;
}


$csv = CREATE_CSV_FEEDS___Generic_function( $array , $separated_By______);

$file = "../channels/". trim($selected_channel__) ."/". trim($shop) . time() . trim($separated_By______) ."_separated_csv.txt";
$file_real_PATH =  $Url_________ . substr($file, 2);
file_put_contents($file, $csv);
