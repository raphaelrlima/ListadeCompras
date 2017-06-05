<h1>Autores Cadastrados</h1>
<table class="table table-bordered table-striped table-hover">
	<tr>
		<th>#</th>
		<th>Nome</th>
		<th>Filiação</th>
		<th>Ações</th>
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
				print "<td><a href='?page=form-editar-autor&id_autor=".$row["id_autor"]."' class='btn btn-primary'>Editar</a></td>";
				print "</tr>";
			}
		}else{
			print "Não encontrou resultados";
		}
	?>
</table>