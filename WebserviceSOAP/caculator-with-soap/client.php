<?php
    require_once ('lib/nusoap.php');
    //Give it value at parameter
    // echo $_GET['x'];
    
    $x = $_POST['x'];
    $y = $_POST['y'];
    $z = $_POST['z'];
    $param = array( 'x' => $x,
                    'y' => $y,
                    'z' => $z);
    //Create object that referer a web services
    $client = new soapclient('http://localhost/WebServiceSOAP/server.php');
    //Call a function at server and send parameters too
    $response = $client->call('caculate',$param);
    //Process result
    if($client->fault)
    {
        echo "FAULT: <p>Code: (".$client->faultcode."</p>";
        echo "String: ".$client->faultstring;
    }
    else
    {
        ?>
        <table>
        <tr>
        <td>The result is: </td>
        <td> <?php echo $response; ?></td>
        </tr>
        </table>
        
        
        <?php
    }
?>