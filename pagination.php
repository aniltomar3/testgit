<?php
// Code for pagination showing adjacent two numbers 

$conn= mysql_connect('localhost','root','');
mysql_select_db('rough',$conn);

if( isset($_GET['page']) ){ $page= $_GET['page']; }else{ $page=1; }
$limit=2; // how much data to show
$start_from= ($page-1)*$limit; // to show data from 0 in db

$sql= "select recipe_name from recipes limit $start_from,$limit";   // 0,2
$qry= mysql_query($sql)or die (mysql_error());

while( $data=mysql_fetch_array($qry) )
{
	echo $data['recipe_name'];	
}
echo "<br/>"."<br/>"."<br/>"."<br/>"."<br/>";

$query= mysql_query("select * from recipes");
$count= mysql_num_rows($query);
$total_rows= ceil($count/$limit);
$adc= 2;

if($page>$adc){ $min= $page-$adc; }else{ $min=1; }
if($page<($total_rows-$adc)){ $max= $page+$adc; }else{ $max= $total_rows; }
echo 'min: '.$min.' max: '.$max;
echo "<br/>"."<br/>"."<br/>"."<br/>"."<br/>";
for($i=$min; $i<=$max; $i++){
  echo "<a href='?page=".$i."'>".$i."</a>";	echo "&nbsp";
}

if($page>1){ echo "<a href='?page=".($page-1)."'>PREV</a>"; }
if($page<$total_rows){ echo "<a href='?page=".($page+1)."'>NEXT</a>";}



?>