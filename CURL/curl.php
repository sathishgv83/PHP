<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" >
$(document).ready(function(){
  //sendAjax();
});

function sendAjax() {

$.ajax({ 
	url: "http://10.8.26.14:8082/nxg/project/add_project_medgenome.do",
	crossDomain: true,
    //url: "/nxg/project/add_project_medgenome.do", 
    type: 'GET',
    dataType: 'jsonp', 
    //"{\"name\":\"hmkcode\",\"id\":2}"
    data: "{\"projectName\":\"testProject\"}",		    
    contentType: 'application/json',
    //mimeType: 'application/json',
    success: function(data) { 
        alert("project name " + data.projectName);
    },
    error:function(data,status,er) { 
        alert("error: "+data+" status: "+status+" er:"+er);
    }
});
}
</script>
</head>
<body>
test dfd
<?php
	$url = 'http://10.8.26.14:8082/nxg/project/add_project_medgenome.do';
	$fields_string = '';
	$responseArray = array();
	$data = array("projectName" => "Hagrid");                                                                    
	$data_string = json_encode($data); 
	
	//open connection
	$ch = curl_init();
	//set the url, number of POST vars, POST data
	// print $url.$fields_string;exit;
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($data));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
	curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		'Content-Type: application/json',                                                                                
		'Content-Length: ' . strlen($data_string))                                                                       
	);      
	$curlResponse = curl_exec($ch);
	$curlError = curl_error($ch);
	$curlInfo = curl_getinfo($ch);
	curl_close($ch);//close connection

	echo "<pre>";
	print_r($curlResponse);
	print_r($curlInfo);
	echo "</pre>";
?>
</body>
</html>