<?php
session_start();
include('connect_db.php');
if(isset($_POST['submit'])){
$a = $_POST['code'];
$b = $_POST['name'];
$c = $_POST['exdate'];
$d = $_POST['price'];
$e = $_POST['manufact'];
$l = $_POST['grams'];
$f = $_POST['qty'];
$g = $_POST['o_price'];
$h = $_POST['profit'];
$i = $_POST['gen'];
$j = $_POST['date_arrival'];
$k = $_POST['qty_sold'];
$l = $_POST['grams'];
// query
function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}
$qry = $dbh->prepare("SELECT * FROM products WHERE chem_name = :chem_name ");

$qry->bindParam(':chem_name', $i);
$qry->execute();

				
$row = $qry->fetch();
$result = $dbh->prepare("SELECT *, price * qty as total FROM products ORDER BY product_id DESC");
$result->execute();
$row = $result->fetch();
$total=$row['total'];
$availableqty=$row['qty'];
if ($qry->rowCount() > 0){
    echo "<script type= 'text/javascript'>alert('Product exist Update the Existing Product');</script>";

?>
    <table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="12%"> Brand Name </th>
			<th width="14%"> Chemical Name </th>
			<th width="13%"> Category / Description </th>
			<th width="7%"> manufacturer </th>
			<th width="7%"> Weight </th>
			<th width="9%"> Date Received </th>
			<th width="10%"> Expiry Date </th>
			<th width="6%"> Original Price </th>
			<th width="6%"> Selling Price </th>
			<th width="6%"> QTY/Packets Sold </th>
			<th width="5%"> Qty/Packets Left </th>
			<th width="8%"> Total </th>
			<th width="8%"> Action </th>
		</tr>
	</thead>
    <tbody>
    

   

    
		

			<td><?php echo $row['product_code']; ?></td>
			<td><?php echo $row['chem_name']; ?></td>
			<td><?php echo $row['product_name']; ?></td>
					<td><?php echo $row['manufact']; ?></td>
					<td><?php echo $row['grams']; ?></td>
			<td><?php echo $row['date_arrival']; ?></td>
			<td><?php echo $row['expiry_date']; ?></td>
			<td><?php
			$oprice=$row['o_price'];
			echo formatMoney($oprice, true);
			?></td>
			<td><?php
			$pprice=$row['price'];
			echo formatMoney($pprice, true);
			?></td>
			<td><?php echo $row['qty_sold']; ?></td>
			<td><?php echo $row['qty']; ?></td>
			<td>
			<?php
			$total=$row['total'];
			echo formatMoney($total, true);
			?>
			</td>			<td><a rel="facebox" title="Click to edit the product" href="editproduct.php?id=<?php echo $row['product_id']; ?>"><button class="btn btn-warning"><i class="icon-edit"></i> </button> </a>
			<a href="#" id="<?php echo $row['product_id']; ?>" class="delbutton" title="Click to Delete the product"><button class="btn btn-danger"><i class="icon-trash"></i></button></a></td>
			</tr>
			
		
		
		
	</tbody>
</table>
<?php }else { ?>

            
 <?php
    // Do Something If name Doesn't Exist
    $sql = "INSERT INTO products (product_code,product_name,expiry_date,price,manufact,grams,qty,o_price,profit,chem_name,date_arrival,qty_sold) VALUES (:a,:b,:c,:d,:e,:l,:f,:g,:h,:i,:j,:k)";
$q = $dbh->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,'l'=>$l,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k));
header("location: products.php");


}
}
?>