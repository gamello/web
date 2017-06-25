<?php
include_once 'dbconfig.php';

if(isset($_POST['btn-del']))
{
	$id = $_GET['delete_id'];
	$crud->delete($id);
	header("Location: delete.php?deleted");
}

?>

<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">

	<?php
	if(isset($_GET['deleted']))
	{
		?>
        <div class="alert alert-success">
    	<strong>Pronto!</strong> foi deletado...
		</div>
        <?php
	}
	else
	{
		?>
        <div class="alert alert-danger">
    	<strong>Certo !</strong> deseja remover?
		</div>
        <?php
	}
	?>
</div>

<div class="clearfix"></div>

<div class="container">

	 <?php
	 if(isset($_GET['delete_id']))
	 {
		 ?>
         <table class='table table-bordered'>
         <tr>
         <th>#</th>
         <th>Nome</th>
         <th>Tamanho</th>
         <th>Valor</th>
         <!-- <th>Pizza</th> -->
         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM pizza WHERE id=:id");
         $stmt->execute(array(":id"=>$_GET['delete_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
             <td><?php print($row['id']); ?></td>
             <td><?php print($row['sabor']); ?></td>
             <td><?php print($row['tamanho']); ?></td>
             <td><?php print($row['valor']); ?></td>
         	 <!-- <td><?php print($row['contact_no']); ?></td> -->
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
	 }
	 ?>
</div>

<div class="container">
<p>
<?php
if(isset($_GET['delete_id']))
{
	?>
  	<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; Sim</button>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Não</a>
    </form>
	<?php
}
else
{
	?>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Voltar ao index</a>
    <?php
}
?>
</p>
</div>
<?php include_once 'footer.php'; ?>
