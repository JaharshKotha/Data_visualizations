<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM simplelims";
$result = mysqli_query($conn, $sql);

$data="";
$nodes ='"nodes":[{"name":"sun", "x": 250,"y": 250},' ;
$ns=0;
$xc=200;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
        $data =$data .  '{"name": "' . $row["pname"]. '","x":200 ,"y":' . (250-$row["orbit_radius"]). '},';
		$ns = $row["satellites"];
			while($ns>0)
			{
				 $data = $data. '{"name": "sat_' . $row["pname"]. $ns.'","x":' .rand(100,200). ',"y":' .(250-$row["orbit_radius"]-$row["sradius"]). '},';
				$ns-=1;
			}
    }
}
$data = substr($data, 0, -1);
$nodes =$nodes.$data.']' ;

$res = mysqli_query($conn, $sql);
$links = ',"links":[';

$ls=1;
$tem=1;
$dat="";

if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
		
		$dat=$dat. '{"source":0,"target":'.$ls.'},'; 
		$ns = $row["satellites"];
		$tem+=1;
		while($ns>0)
		{
			$dat=$dat. '{"source":'.$ls.',"target":'.$tem.'},'; 
			$tem+=1;
			$ns-=1;
		}
		$ls=$tem+1;
		
      
    }

	
	}
$dat = substr($dat, 0, -1);
$links = $links .$dat.']' ;

$jd = '{'.$nodes.$links.'}';
echo $jd;



mysqli_close($conn);
?>
