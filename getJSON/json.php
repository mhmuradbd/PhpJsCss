<?php
error_reporting('E_ALL');
ini_set('display_errors', '1');
ini_set("default_charset", "UTF-8");
header('Content-Type: text/html; charset=utf-8');

?>
<!DOCTYPE html>
<html lang="pl">
<head>
<title>JSON js tutorial</title>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<script type="text/javascript">
// XMLhttp request
function loadDoc() {
    alert("XMLhttp load data");
  var xhttp;
  if (window.XMLHttpRequest) {
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  // get data
  //xhttp.open("GET", "json-obj.php", true);
  //xhttp.send();

  // post data
  xhttp.open("POST", "json-obj.php", true);
  //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  //xhttp.setRequestHeader("Content-type", "Content-Type: application/json");
  xhttp.send("name=Jim&year=1234");

  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
        // put to div
        document.getElementById("demo").innerHTML = xhttp.responseText;
        // javascript parse JSON
        var json = JSON.parse(xhttp.responseText);
        // show json  obj values
        alert("Data json xhttp "+ json.users[1].firstName +" "+ json.users[1].lastName);
        // get all headers
        //xhttp.getAllResponseHeaders();
        //xhttp.getResponseHeader(headerName)
    }
  };
}

$(document).ready(function(){

    // post with data type execute first
    $.post( "json-obj.php", { sendCmd: "getNameAndLastName" }, function( data ) {
        alert( data.users[2].name + " " + data.users[2].lastName );      
    }, "json");

    // simple getjson
    $.getJSON("json-obj.php", { name: "John", time: "2pm" }, function(json) {
        alert("JSON Data: " + json.users[1].lastName);
    });
    
    // getJSON example
    $(".btn1").click(function(){
    // create json from array
    var arr = new Array('listingID', 'site', 'browser', 'dimension');    
    var jsonString = JSON.stringify(arr);
    // send this to server
    var senddata = { 'name': 'Imię1' , 'lastname': 'Nazwisko1', 'jsonString': jsonString};

        $.getJSON("json-obj.php", senddata, function(data, status, xhr){
            $.each(data.users, function(i, users){
                $("div").append(users.firstName + " " + users.lastName + "<br>");
            });
        }).fail(function(xhr, d, e){
        	alert("Something goes wrong " + d);
    			switch (xhr.status) {
                case 404:
                    alert(xhr.statusText + " error " + xhr.status);
                    break;
                case 405:
                    alert(xhr.statusText + " error " + xhr.status);
                    break;
                case 403:
                    alert(xhr.statusText + " error " + xhr.status);
                    break;
                case 500:
                    alert(xhr.statusText + " error " + xhr.status);
                    break;
                case 503:
                    alert(xhr.statusText + " error " + xhr.status);
                    break;   				
    			}
    	});
    });

  // ajax JSON example  
  $(".btn2").click(function(){
    // create json from array
    var arr = new Array('listingID', 'site', 'browser', 'dimension');    
    var jsonString = JSON.stringify(arr);
    // send this to server
    var senddata = { 'name': 'Imię' , 'lastname': 'Nazwisko', 'jsonString': jsonString};
    
        $.ajax({
        type: 'POST', // or method 'GET' if you need
        data: senddata,
        url: 'json-obj.php',
        dataType: 'json',
        success: function( data ) {
          //alert( "SUCCESS:  " + data );
          $.each(data.users, function(j, obj) {
          	$("p").append(obj.firstName + " " + obj.lastName + "<br>");
          });
        },
        error: function( xhr, d, e ) {
        	alert("Something goes wrong " + d);
        		switch (xhr.status) {
                case 404:
                    alert(xhr.statusText + " error " + xhr.status);
                    break;
                case 405:
                    alert(xhr.statusText + " error " + xhr.status);
                    break;
                case 403:
                    alert(xhr.statusText + " error " + xhr.status);
                    break;
                case 500:
                    alert(xhr.statusText + " error " + xhr.status);
                    break;
                case 503:
                    alert(xhr.statusText + " error " + xhr.status);
                    break;   				
        		}
        }
        });
  });
  
});	



</script>
</head>
<body>

<button class="btn1">getJSON request</button>
<button class="btn2">ajax JSON request</button>
<button type="button" onclick="loadDoc()">XMLhttp</button>

<div>getJSON</div>
<p>AJAX</p>
<p id="demo">XMLhttp</p>

</body>
</html>

<?php
// json-obj.php file
// json from string
$user = '{ "users" : [{ "firstName":"John" , "lastName":"Doe" },{ "firstName":"Anna" , "lastName":"Smith" },{ "firstName":"Peter" , "lastName":"Jones" } ]}';
// echo $user

// or from array
$user = array(
    "users" => array(
        array(
            "firstName" => "Jon",
            "lastName" => "Doe"
        ),
        array(
            "firstName" => "Venice",
            "lastName" => "Wonderland"
        ),
        array(
            "firstName" => "Zorro",
            "lastName" => "Bohaterski"
        )
    )
);
//echo json_encode($user);
?>
