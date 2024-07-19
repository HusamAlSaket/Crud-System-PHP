<?php 
//$name ='Yoshi';
include('config/db_connect.php');
//$stringOne = 'my email is ';
//$stringTwo ='mario123@thenetninja.co.uk';
//$name = 'sora';
//echo $stringOne.$stringTwo;
//echo "hello,ninjas";
//echo "hey my email is $stringTwo";
//echo "sora is screaming \"LETS GO FNATIC\" ";
//echo $name[1];
//echo strlen($name);
//echo strtoupper($name);
//echo floor round it up to the floor
//echo ceil round it up to the ceiling 
//print_r ($ages)
//$ages[] =60; add another value to the array 
//$ages[1]=35; override to the array 
// array_push($ages);
//echo count
//array_merge($age1,$age2);
//associative arrays
//$test =['husam'=>'diamond 3'];
//echo $test ['husam'];
//$age =2;
//$ninjas = ['sora','zora','senior'];
//for($i =0; $i<count($ninjas);$i++){
	//echo $ninjas[$i].'<br />';
//}
//foreach($ninjas as $ninja){
	//echo $ninja . '<br />';
//}
//echo 5<10;
 // connect to database
$conn = mysqli_connect('localhost','Husam','hs2001ce','ninja_pizza');
//check connection;
if (!$conn) {
	echo 'connection error:' . mysqli_connect_error();

}
// write query for all pizzas
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';
//make query & get result
$result =mysqli_query($conn,$sql);
//fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);

// free result

mysqli_free_result($result);

//close connection
mysqli_close($conn);

//explode(',',$pizzas[0]['ingredients']);



 ?>
 <!DOCTYPE html>
 <html>
 <?php include('templates/header.php'); ?>

<h4 class="center grey-text">Pizzas!</h4>

<div class="container">
	<div class="row">
		<?php foreach ($pizzas as $pizza ):  ?>
		<div class="col s6 md3">
			<div class="card z-depth-0">
				<div class="card-content center">
					<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
					<ul>
						 <?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>
    <li> <?php echo htmlspecialchars($ing); ?> </li>
<?php endforeach; ?>

					</ul>
				</div>
				<div class="card-action right-align">
					<a class="brand-text " href="details.php?id=<?php echo $pizza['id'] ?> ">more info</a>
				</div>
			</div>
		</div>

		<?php endforeach ;?>
		

	</div>
</div>

<?php include('templates/footer.php'); ?>

 

 </html>
