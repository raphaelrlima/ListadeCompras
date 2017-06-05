<h1>Cadastrar Categoria</h1>

<?php if(@$_REQUEST["res"]=="ok"){ ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  Cadastrado com sucesso!
</div>
<?php }elseif(@$_REQUEST["res"]=="no"){ ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  Não foi possível cadastrar.
</div>
<?php } ?>

<div class="row">
	<div class="offset-lg-3 col-lg-6">
		<form action="?page=salvar-cadastro&acao=categoria" method="POST">
			<div class="form-group">
				<label>Nome da Categoria</label>
				<input type="text" name="categoria" class="form-control" />
			</div>
			<button type="submit" class="btn btn-primary">
				Cadastrar
			</button>
		</form>
	</div>
</div>
<h1>Categorias Cadastradas</h1>



<table class="table table-bordered table-striped table-hover">
	<tr>
		<th>#</th>
		<th>Categoria</th>
	</tr>
	<?php
		$sql = "SELECT * FROM categoria";
		
		$result = $conn->query($sql);
		
		$qtd = $result->num_rows;
		
		print "Encontrou <b>".$qtd. "</b> registros";
		
		if($qtd > 0){
			while($row = $result->fetch_assoc()){
				print "<tr>";
				print "<td>".$row["id_categoria"]."</td>";
				print "<td>".$row["categoria"]."</td>";
				print "</tr>";
			}
		}else{
			print "Não encontrou resultados";
		}
	?>
</table>
























