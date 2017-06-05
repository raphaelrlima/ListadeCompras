<?php
	switch(@$_REQUEST["acao"]){
		case "categoria":		
			$categoria = $_REQUEST["categoria"];
	
			$sql = "INSERT INTO categoria (categoria) VALUES ('$categoria')";
			
			$result = $conn->query($sql);
			
			if($result){
				print "<script>location.href='index.php?page=cadastrar-categoria&res=ok';</script>";
			}else{
				print "<script>location.href='index.php?page=cadastrar-categoria&res=no';</script>";
			}			
			//print "<a class='btn btn-primary' href='?page=cadastrar-categoria'>Voltar</a>";
		break;
		case "autor":		
			$nome_autor = $_REQUEST["nome_autor"];
			$filiacao_autor = $_REQUEST["filiacao_autor"];
	
			$sql = "INSERT INTO autor (nome_autor, filiacao_autor) VALUES ('$nome_autor', '$filiacao_autor')";
			
			$result = $conn->query($sql);
			
			if($result){
				print "<div style='margin-top: 30px;' class='alert alert-success'>Foi cadastrado com sucesso!</div>";
			}else{
				print "<div class='alert alert-danger'>Houve um problema</div>";
			}			
			print "<a class='btn btn-primary' href='?page=cadastrar-autor'>Voltar</a>";
		break;
		case "livros":
			$categoria = $_REQUEST["categoria_id_categoria"];
			$autor 	   = $_REQUEST["autor_id_autor"];
			$titulo    = $_REQUEST["titulo_livros"];
			$editora   = $_REQUEST["editora_livros"];
			$edicao    = $_REQUEST["edicao_livros"];
			$local     = $_REQUEST["local_livros"];
			$ano       = $_REQUEST["ano_livros"];
			
			$sql = "INSERT INTO livros (categoria_id_categoria, autor_id_autor, titulo_livros, editora_livros, edicao_livros, local_livros, ano_livros) VALUES ($categoria, $autor, '$titulo', '$editora', '$edicao', '$local', '$ano')";			
			
			$result = $conn->query($sql);
			
			if($result){
				print "<script>location.href='index.php?page=cadastrar-livro&res=ok';</script>";
			}else{
				print "<script>location.href='index.php?page=cadastrar-livro&res=no';</script>";
			}
		break;
	}
	
?>


















