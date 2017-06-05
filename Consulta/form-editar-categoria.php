<h1>Editar Categoria</h1>
<?php
	$sql = "SELECT * FROM categoria WHERE id_categoria = ".$_REQUEST["id_categoria"];
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){			
?>
<div class="row">
	<div class="offset-lg-3 col-lg-6">
		<form action="?page=salvar-editar&acao=categoria&id_categoria=<?php print $row["id_categoria"]; ?>" method="POST">
			<div class="form-group">
				<label>Nome da Categoria</label>
				<input type="text" name="categoria" class="form-control" value="<?php print $row["categoria"]; ?>" />
			</div>
			<button type="submit" class="btn btn-primary">
				Editar
			</button>
		</form>
	</div>
</div>
<?php
		}//fim do while
	}else{
		print "Não foi possível encontrar resultados";
	}
?>

