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

<?php
	$sql = "SELECT * FROM livros l
			INNER JOIN categoria c 
			ON c.id_categoria = l.categoria_id_categoria
			INNER JOIN autor a
			ON a.id_autor = l.autor_id_autor
			WHERE id_livros=".$_REQUEST["id_livros"];
	
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
?>
<div class="row">
	<div class="offset-lg-3 col-lg-6">
		<form action="?page=salvar-editar&acao=livros&id_livros=<?php print $row["id_livros"]; ?>" method="POST">
			<div class="form-group">
				<label>Categoria</label>
				<select name="categoria_id_categoria" class="form-control">
				<?php
					print "<option value='".$row["id_categoria"]."'>".$row["categoria"]."</option>";
					print "<option></option>";
				
					$sql1 = "SELECT * FROM categoria";
					
					$result1 = $conn->query($sql1);
					
					$qtd1 = $result1->num_rows;
					
					if($qtd1 > 0){
						while($row1 = $result1->fetch_assoc()){
							print "<option value='".$row1["id_categoria"]."'>".$row1["categoria"]."</option>";
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
					print "<option value='".$row["id_autor"]."'>".$row["nome_autor"]."</option>";
					print "<option></option>";
				
					$sql2 = "SELECT * FROM autor";
					
					$result2 = $conn->query($sql2);
					
					$qtd2 = $result2->num_rows;
					
					if($qtd2 > 0){
						while($row2 = $result2->fetch_assoc()){
							print "<option value='".$row2["id_autor"]."'>".$row2["nome_autor"]."</option>";
						}
					}else{
						print "<option>Não encontrou resultados</option>";
					}
				?>
				</select>
			</div>
			<div class="form-group">
				<label>Título</label>
				<input type="text" name="titulo_livros" value="<?php print $row["titulo_livros"]; ?>" class="form-control" />
			</div>
			<div class="form-group">
				<label>Editora</label>
				<input type="text" name="editora_livros" value="<?php print $row["editora_livros"]; ?>" class="form-control" />
			</div>
			<div class="form-group">
				<label>Edição</label>
				<input type="text" name="edicao_livros" value="<?php print $row["edicao_livros"]; ?>"  class="form-control" />
			</div>
			<div class="form-group">
				<label>Local</label>
				<input type="text" name="local_livros" value="<?php print $row["local_livros"]; ?>"  class="form-control" />
			</div>
			<div class="form-group">
				<label>Ano da Publicação</label>
				<input type="text" name="ano_livros" value="<?php print $row["ano_livros"]; ?>"  class="form-control" maxlenght="4" />
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
		print "Nenhum livro encontrado";
	}
?>