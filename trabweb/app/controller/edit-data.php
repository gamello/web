<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	$email = $_POST['email_id'];
	// $contact = $_POST['contact_no'];

	if($crud->update($id,$fname,$lname,$email))
	{
		$msg = "<div class='alert alert-info'>
				<strong>Pronto!</strong> Dados atualizados <a href='index.php'>HOME</a>!
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>Desculpe!</strong> Erro ao atualizar !
				</div>";
	}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getID($id));
}

?>
<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">
<?php
if(isset($msg))
{
	echo $msg;
}
?>
</div>

<div class="clearfix"></div><br />

<div class="container">

     <form method='post'>

    <table class='table table-bordered'>

        <tr>
            <td>Nome</td>
            <td><input type='text' name='first_name' class='form-control' value="<?php echo $sabor; ?>" required></td>
        </tr>

        <tr>
            <td>Telefone</td>
            <td><input type='text' name='last_name' class='form-control' value="<?php echo $tamanho; ?>" required></td>
        </tr>

        <tr>
            <td>Pizza</td>
            <td><input type='text' name='email_id' class='form-control' value="<?php echo $valor; ?>" required></td>
        </tr>

        <!-- <tr>
            <td>Refrigerante</td>
            <td><input type='text' name='contact_no' class='form-control' value="<?php echo $contact_no; ?>" required></td>
        </tr> -->

        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Atualizar
				</button>
                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Cancelar</a>
            </td>
        </tr>

    </table>
</form>


</div>

<?php include_once 'footer.php'; ?>
