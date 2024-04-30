<?php
	switch ($_REQUEST["acao"]) {
		case 'cadastrar':
			$nome = $_POST["nome"];
			$email = $_POST["email"];
			$data_nascimento = $_POST["data_nascimento"];
			$senha = md5($_POST["senha"]);
			
			$sql = "INSERT INTO usuarios (nome, email, data_nascimento,
			senha) VALUES (
			'{$nome}', '{$email}', '{$data_nascimento}', 
			'{$senha}')";
			
			$res = $conn->query($sql);
			
			if($res==true){
				print "<script>alert('Cadastro feito com sucesso');</script>";
				print "<script>location.href='?page=listar';</script>"; 
			}else{
				print "<script>alert('Não foi possível cadastrar');</script>";
				print "<script>location.href='?page=listar';</script>"; 
			}
		break;
		
		case 'editar':
			$nome = $_POST["nome"];
			$email = $_POST["email"];
			$data_nascimento = $_POST["data_nascimento"];
			$senha = md5($_POST["senha"]);
			
			$sql = "UPDATE usuarios SET 
				nome='{$nome}',
				email='{$email}',
				data_nascimento='{$data_nascimento}',
				senha='{$senha}'
			WHERE 
				id=".$_REQUEST["id"];
	
			$res = $conn->query($sql);
			
			if($res==true){
				print "<script>alert('Editado com sucesso');</script>";
				print "<script>location.href='?page=listar';</script>"; 
			}else{
				print "<script>alert('Não foi possível editar');</script>";
				print "<script>location.href='?page=listar';</script>"; 
			}
		break;
		
		case'excluir':
			$sql = "DELETE FROM usuarios WHERE id=".$_REQUEST["id"];
			
			$res = $conn->query($sql);
			
			if($res==true){
				print "<script>alert('Excluido com sucesso');</script>";
				print "<script>location.href='?page=listar';</script>"; 
			}else{
				print "<script>alert('Não foi possível excluir');</script>";
				print "<script>location.href='?page=listar';</script>"; 
			}
		
		break;
	}
?>