<h1>Listar Usuários</h1>
<?php
	$sql = "SELECT * FROM usuarios";
	
	$res = $conn->query($sql);
	
	$qtd = $res->num_rows;
	
	if($qtd > 0){
		print "<table class='table table-hover table-striped 
		table-bordered'>";
			print "<tr>";
			print "<th>#</th>";
			print "<th>Nome</th>";
			print "<th>Email</th>";
			print "<th>Data de nascimento</td>";
			print "<th>Ações</td>";
			print "</tr>";
		while($row = $res->fetch_object()){
			print "<tr>";
			print "<td>".$row->id."</td>";
			print "<td>".$row->nome."</td>";
			print "<td>".$row->email."</td>";
			print "<td>".$row->data_nascimento."</td>";
			print "<td>
				<button onclick=\"location.href='?page=editar&id=".$row->id."';\" class='btn 
				btn-sucess'>Editar</button>
					
				<button onclick=\"
				if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{false;}\" 
				class='btn 
				btn-sucess'>Excluir</button>
					</td>";
			print "</tr>";
		}
		print "</table>";
	}else{
		print "<p class='alert alert-danger'>Não 
		encontrou resultados!</p>";
	}
?>