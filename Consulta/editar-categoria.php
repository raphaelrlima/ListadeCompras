<?php if(@$_REQUEST["res"]=="ok"){ ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  Editado com sucesso!
</div>
<?php }elseif(@$_REQUEST["res"]=="no"){ ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  Não foi possível editar.
</div>
<?php } ?>

<h1>Categorias Cadastradas</h1>
<table class="table table-bordered table-striped table-hover">
	<tr>
		<th>#</th>
		<th>Categoria</th>
		<th>Ações</th>
	</tr>
	<?php
		$sql = "SELECT * FROM categoria ORDER BY categoria";
		
		$result = $conn->query($sql);
		
		$qtd = $result->num_rows;
		
		print "Encontrou <b>".$qtd. "</b> registros";
		
		if($qtd > 0){
			$count = 1;
			while($row = $result->fetch_assoc()){
				print "<tr>";
				print "<td>".$count++."</td>";
				print "<td>".$row["categoria"]."</td>";
				print "<td><a href='?page=form-editar-categoria&id_categoria=".$row["id_categoria"]."' class='btn btn-primary'>Editar</a></td>";
				print "</tr>";
			}
		}else{
			print "Não encontrou resultados";
		}
	?>
</table>