<?php
	switch(@$_REQUEST["acao"]){
		case "categoria":		
			$categoria = $_REQUEST["categoria"];
	
			$sql = "UPDATE categoria SET categoria='$categoria' WHERE id_categoria=".$_REQUEST["id_categoria"];
			
			$result = $conn->query($sql);
			
			if($result){
				print "<script>location.href='index.php?page=editar-categoria&res=ok';</script>";
			}else{
				print "<script>location.href='index.php?page=editar-categoria&res=no';</script>";
			}			
			//print "<a class='btn btn-primary' href='?page=cadastrar-categoria'>Voltar</a>";
		break;
		case "autor":		
			$nome_autor = $_REQUEST["nome_autor"];
			$filiacao_autor = $_REQUEST["filiacao_autor"];
	
			$sql = "UPDATE autor SET nome_autor='$nome_autor', filiacao_autor='$filiacao_autor' WHERE id_autor=".$_REQUEST["id_autor"];
			
			$result = $conn->query($sql);
			
			if($result){
				print "<div style='margin-top: 30px;' class='alert alert-success'>Foi editado com sucesso!</div>";
			}else{
				print "<div class='alert alert-danger'>Houve um problema</div>";
			}			
			print "<a class='btn btn-primary' href='?page=editar-autor'>Voltar</a>";
		break;
		case "livros":
			$categoria = $_REQUEST["categoria_id_categoria"];
			$autor 	   = $_REQUEST["autor_id_autor"];
			$titulo    = $_REQUEST["titulo_livros"];
			$editora   = $_REQUEST["editora_livros"];
			$edicao    = $_REQUEST["edicao_livros"];
			$local     = $_REQUEST["local_livros"];
			$ano       = $_REQUEST["ano_livros"];
			
			$sql = "UPDATE livros SET categoria_id_categoria=$categoria, autor_id_autor=$autor, titulo_livros='$titulo', editora_livros='$editora', edicao_livros='$edicao', local_livros='$local', ano_livros='$ano' WHERE id_livros=".$_REQUEST["id_livros"];			
			
			$result = $conn->query($sql);
			
			if($result){
				print "<script>location.href='index.php?page=editar-livro&res=ok';</script>";
			}else{
				print "<script>location.href='index.php?page=editar-livro&res=no';</script>";
			}
		break;
	}
	
?>


















