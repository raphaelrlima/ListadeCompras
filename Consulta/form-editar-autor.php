<h1>Editar Autor</h1>
<?php
	$sql = "SELECT * FROM autor WHERE id_autor=".$_REQUEST["id_autor"];
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
?>
<div class="row">
	<div class="offset-lg-3 col-lg-6">
		<form action="?page=salvar-editar&acao=autor&id_autor=<?php print $row["id_autor"]; ?>" method="POST">
			<div class="form-group">
				<label>Nome do Autor</label>
				<input type="text" name="nome_autor" value="<?php print $row["nome_autor"]; ?>" class="form-control" />
			</div>
			<div class="form-group">
				<label>Filiação</label>
				<input type="text" name="filiacao_autor" value="<?php print $row["filiacao_autor"]; ?>" class="form-control" />
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
		print "Nenhum autor foi encontrado.";
	}

?>