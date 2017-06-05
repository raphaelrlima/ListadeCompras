<h1>Cadastrar Livro</h1>
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
		<form action="?page=salvar-cadastro&acao=livros" method="POST">
			<div class="form-group">
				<label>Categoria</label>
				<select name="categoria_id_categoria" class="form-control">
				<?php
					$sql = "SELECT * FROM categoria";
					
					$result = $conn->query($sql);
					
					$qtd = $result->num_rows;
					
					if($qtd > 0){
						while($row = $result->fetch_assoc()){
							print "<option value='".$row["id_categoria"]."'>".$row["categoria"]."</option>";
						}
					}else{
						print "<option>Não encontrou resultados</option>";
					}
				?>
				</select>
			</div>			
			<div class="form-group">
				<label>Autor</label>
				<select name="autor_id_autor" class="form-control">
				<?php
					$sql = "SELECT * FROM autor";
					
					$result = $conn->query($sql);
					
					$qtd = $result->num_rows;
					
					if($qtd > 0){
						while($row = $result->fetch_assoc()){
							print "<option value='".$row["id_autor"]."'>".$row["nome_autor"]."</option>";
						}
					}else{
						print "<option>Não encontrou resultados</option>";
					}
				?>
				</select>
			</div>
			<div class="form-group">
				<label>Título</label>
				<input type="text" name="titulo_livros" class="form-control" />
			</div>
			<div class="form-group">
				<label>Editora</label>
				<input type="text" name="editora_livros" class="form-control" />
			</div>
			<div class="form-group">
				<label>Edição</label>
				<input type="text" name="edicao_livros" class="form-control" />
			</div>
			<div class="form-group">
				<label>Local</label>
				<input type="text" name="local_livros" class="form-control" />
			</div>
			<div class="form-group">
				<label>Ano da Publicação</label>
				<input type="text" name="ano_livros" class="form-control" />
			</div>
			<button type="submit" class="btn btn-primary">
				Cadastrar
			</button>
		</form>
	</div>
</div>
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
				print "</tr>";
			}
		}else{
			print "Não há registros";
		}
	?>
</table>































