<?php if(@$_REQUEST["res"]=="ok"){ ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  Editar com sucesso!
</div>
<?php }elseif(@$_REQUEST["res"]=="no"){ ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  Não foi possível editar.
</div>
<?php } ?>

<h1>Livros Cadastrados</h1>
<table class="table table-bordered table-striped table-hover">
	<tr>
		<th>#</th>
		<th>Categoria</th>
		<th>Autor</th>
		<th>Título</th>
		<th>Editora</th>
		<th>Edição</th>
		<th>Local</th>
		<th>Ano</th>
		<th>Ações</th>
	</tr>
	<?php
		$sql = "SELECT * FROM livros l
				INNER JOIN categoria c ON l.categoria_id_categoria = c.id_categoria
				INNER JOIN autor a ON l.autor_id_autor = a.id_autor";
		
		$result = $conn->query($sql);
		
		$qtd = $result->num_rows;
		
		print "Existem <b>".$qtd."</b> livros";
		
		if($qtd > 0){
			while($row = $result->fetch_assoc()){
				print "<tr>";
				print "<td>".$row["id_livros"]."</td>";
				print "<td>".$row["categoria"]."</td>";
				print "<td>".$row["nome_autor"]."</td>";
				print "<td>".$row["titulo_livros"]."</td>";
				print "<td>".$row["editora_livros"]."</td>";
				print "<td>".$row["edicao_livros"]."</td>";
				print "<td>".$row["local_livros"]."</td>";
				print "<td>".$row["ano_livros"]."</td>";
				print "<td><a href='?page=form-editar-livro&id_livros=".$row["id_livros"]."' class='btn btn-primary'>Editar</a></td>";
				print "</tr>";
			}
		}else{
			print "Não há registros";
		}
	?>
</table>































