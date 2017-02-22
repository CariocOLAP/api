<!DOCTYPE html>
<!-- Template by quackit.com -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>CariocOLAP API</title>
		<style type="text/css">
		

			h1 {
				font-size: 25px;
			}
			body {
				margin:0;
				padding:0;
				font-family: Sans-Serif;
				line-height: 1.5em;
			}
			
			header {
				background: #ccc;
				height: 60px;
			}
			
			header h1 {
				margin: 0;
				padding-top: 15px;
			}
			
			main {
				padding-bottom: 10010px;
				margin-bottom: -10000px;
				float: left;
				width: 100%;
			}
			
			nav {
				padding-bottom: 10010px;
				margin-bottom: -10000px;
				float: left;
				width: 230px;
				margin-left: -230px;
				background: #eee;
			}
			
			footer {
				clear: left;
				width: 100%;
				background: #ccc;
				text-align: center;
				padding: 4px 0;
			}
			
			.table > thead > tr > th {
			    background: #EEEFF1;
			    padding: 7px;
			}
			#wrapper {
				overflow: hidden;
			}
						
			.innertube {
				margin: 15px; /* Padding for content */
				margin-top: 0;
			}
		
			p {
				color: #555;
			}
	
			nav ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
			}
			
			nav ul a {
				color: darkgreen;
				text-decoration: none;
			}

			table.table { table-layout:fixed; }
			table.table td { overflow: hidden; }
		</style>
	
</head>
	
	<body>		

		<header>
			<div class="innertube">
				<h1>CariocOLAP API</h1>
			</div>
		</header>
		
		<div id="wrapper">
		
			<main>
				<div id="content">
					<div class="innertube">
						<h1>Descrição</h1>
						<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum rhoncus auctor quam in commodo. Sed eget tortor mattis, iaculis dui et, luctus lacus. Maecenas euismod lacinia orci, non finibus justo facilisis ut. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque auctor interdum elit quis posuere. </p>
						

						<h1>URL</h1>
						<p>http://www.cariocolap.com/api/?t={nome_tabela}&{ord=ornacao}&{di=data_inicio}&{df=data_fim}&{l=limite}&{o=offset}</p>

						<h1>Formato</h1>
						<p>JSON</p>

						<h1>Exemplo</h1>
						<p><a href='http://www.cariocolap.com/api/?t=dm_atividade_mte'>http://www.cariocolap.com/api/?t=dm_atividade_mte</a></p>
						
						<h1>Tabelas</h1>
						<ul>
						<?php
						foreach($result_table as $table_name) {
							echo "<li>".$table_name['table_name']."</li>";
						}
							?>
						</ul>

						<h1>Parâmetros</h1>
						<table class="table">
						<col width="10%" />
					    <col width="10%" />
					    <col width="10%" />
					    <col width="70%" />
							<thead>
								<tr>
									<th>Campo</th>
									<th>Tipo</th>
									<th>Obrigatório</th>
									<th>Descrição</th>
								</tr>
							</thead>
							<tbody>
									<tr>
										<td>t</td>
										<td>Texto</td>
										<td>Sim</td>
										<td>Retorna valores das tabelas disponíveis no DW. Veja a lista de tabelas acima.</td>
									</tr>
									<tr>
										<td>j</td>
										<td>Booleano</td>
										<td>Sim</td>
										<td>Realiza junção entre a tabela selecionada e todos os seus relacionamentos dentro da base de dados. Valores aceitos: true ou false</td>
									</tr>
									<tr>
										<td>ord</td>
										<td>Texto</td>
										<td>Não</td>
										<td>Atributo utilizado para indicar se ordenação é crescente ou decrescente. Valores aceitos: 'asc' ou 'desc'.</td>
									</tr>
									<tr>
										<td>di</td>
										<td>Data</td>
										<td>Não</td>
										<td>Seleciona os resultados a partir da data definida. Formato esperado: AAAA-MM-DD </td>
									</tr>
									<tr>
										<td>df</td>
										<td>Data</td>
										<td>Não</td>
										<td>Seleciona os resultados até a data definida. Formato esperado: AAAA-MM-DD</td>
									</tr>
									<tr>
										<td>l</td>
										<td>Inteiro</td>
										<td>Não</td>
										<td>Limita a quantidade de resultados. Padrão: 100. Máximo: 500</td>
									</tr>
									<tr>
										<td>offset</td>
										<td>Inteiro</td>
										<td>Não</td>
										<td>Quantidade de registros ignorados a partir do início da lista de resultados ordenando pelo ID. Útil para paginar consultas que retornam mais que 500 resultados. Ex.: offset=3000, retorna até 500 registros ignorando os 3000 primeiros.</td>
									</tr>
							</tbody>
						</table>
					</div>
				</div>						
			</main>

		<footer>
			<div class="innertube">
				<p>Para saber mais sobre o projeto, acesse <a href='http://www.cariocolap.com'>www.cariocolap.com</a></p>
			</div>
		</footer>
	
	</body>
</html>