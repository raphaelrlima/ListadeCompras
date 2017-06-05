<h1>Cadastrar Autor</h1>
<div class="row">
	<div class="offset-lg-3 col-lg-6">
		<form action="?page=salvar-cadastro&acao=autor" method="POST">
			<div class="form-group">
				<label>Nome do Autor</label>
				<input type="text" name="nome_autor" class="form-control" />
			</div>
			<div class="form-group">
				<label>Filiação</label>
				<input type="text" name="filiacao_autor" class="form-control" />
			</div>
			<button type="submit" class="btn btn-primary">
				Cadastrar
			</button>
		</form>
	</div>
</div>
<h1>Autores Cadastrados</h1>
<table class="table table-bordered table-striped table-hover">
	<tr>
		<th>#</th>
		<th>Nome</th>
		<th>Filiação</th>
	</tr>
	<?php
		$sql = "SELECT * FROM autor";
		
		$result = $conn->query($sql);
		
		$qtd = $result->num_rows;
		
		print "Encontrou <b>".$qtd. "</b> registros";
		
		if($qtd > 0){
			while($row = $result->fetch_assoc()){
				print "<tr>";
				print "<td>".$row["id_autor"]."</td>";
				print "<td>".$row["nome_autor"]."</td>";
				print "<td>".$row["filiacao_autor"]."</td>";
				print "</tr>";
			}
		}else{
			print "Não encontrou resultados";
		}
	?>
</table>