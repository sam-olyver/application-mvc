<?php
/**
 * Database - Classe para gerenciamento da base de dados (mysqli)
 *
 * @package AppMvc
 * @since 0.1
 */	
	class Database 
	{
		private $connect;

		function __construct()
		{//a definir
			
		}

		//####### CONEXAO #######

		//define os dados de conexao
		private function setConnect($host, $user, $password, $database, $charset)
		{
			define('DB_HOSTNAME', $host);
			define('DB_USERNAME', $user);
			define('DB_PASSWORD', $password);
			define('DB_DATABASE', $database);
			define('DB_CHARSET', $charset);
		}

		//retorna o atributo de conexao
		private function getConnect()
		{
			$this->db_conectar();

			return $this->connect;

			$this->db_close();
		}

		//abre conexao
		private function db_conectar()
		{
			$this->connect = @mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE)
					or die(mysqli_connect_error($this->connect));
			@mysqli_set_charset($this->connect, DB_CHARSET) or die(myqsli_error($this->connect));

			echo "<br>ABRIU CONEXAO";
			return $this->connect;	
		}

		//fechar conexao
		private function db_close($conexao)
		{
			$this->connect = $conexao;
			if(@mysqli_close($this->connect) or die(mysqli_error($this->connect)))
			echo "<br>FECHOU CONEXAO";
		}
		

		//protege contra SQL Injection - nao testado
		public function db_escape($dados)
		{
			$this->db_conectar();
			if(!is_array($dados))
			
				$dados = mysqli_real_escape_string($this->connect,$dados);
			else
			{
				$arr = $dados;

				foreach($arr as $key => $value)
				{
					$key = mysqli_real_escape_string($this->connect,$key);
					$value =  mysqli_real_escape_string($this->connect,$value);
					$dados[$key] = $value;
				}
			}	

			$this->db_close($this->connect);
			return $dados;
		}	

		//######### metodos que irao gerenciar a base de dados

		//executa querys
		function db_execute($query)
		{
			$this->db_conectar();

			$result = @mysqli_query($this->connect,$query) or die (mysqli_error($this->connect));

			$this->db_close($this->connect);
			return $result;
		} 

		/*  INSERT - inserir registros ##########
			possui dois parametros, o nome da tabela que
			recebera os registros e um array com os campos e 
			registro a serem adicionados
			Exemplo:
			$inserir = array(
		      'campo1' =>  'registro1', 
		      'campo2' =>  'registro2' ,
		      'campo3' =>  'registro3' 
				);
			$gravar = $objeto->db_insert('tabela', $inserir);
		*/

		
		public function db_insert($tabela, array $data)
		{

			$data = $this->db_escape($data);
			$fields = implode(', ', array_keys($data));
			$values = "'".implode("' , '", $data)."'";

			$query = "INSERT INTO {$tabela} ({$fields}) VALUES ({$values})";

			return $this->db_execute($query);

		}

		/* 	SELECT - lê registros ########	
			possui três parametros, o nome da tabela, parametro da consulta (WHERE, LIKE, ETC...) e os campos a serem consultados ( * = all | campo1, campo2...)
			Exemplo: 
			$select = $obeto->db_select('tabela', 'WHERE id = 1', 'id, nome, ultimo acesso');
		*/
		public function db_select($table, $params = null, $fields = '*')
		{
			$params = ($params) ? "{$params}" : null;

			$query = "SELECT {$fields} FROM {$table} {$params}";

			$result = $this->db_execute($query);

			if(!mysqli_num_rows($result))
				return false;
			else
			{
				while($res = mysqli_fetch_assoc($result))
				{
					$data[] = $res;
				}
				return $data;
			}		
		}

		/*	UPDATE - atualiza registros (semelhante ao insert) ########
			possui tres parametros, o nome da tabela, o array com os campos e registros a serem alterados, e clausula WHERE da query
			Exemplo: 
			$alterar = array(
		      'campo1' =>  'registro1', 
		      'campo2' =>  'registro2' ,
		      'campo3' =>  'registro3' 
				);
			terceiro parametro nao necessita escrever where...
			$update = $objeto->db_update('tabela',$alterar, 'id = 3');
		*/
		public function db_update($table, array $data, $where = null)
		{
			foreach($data as $key => $value)
			{
				$fields[] = "{$key} = '{$value}'";
			}

			$fields = implode(', ',$fields);
			$where = ($where) ? " WHERE {$where}" : null;

			$query = "UPDATE {$table} SET {$fields}{$where}";

			return $this->db_execute($query);

		}

		/*	DELETE - exclui registros ##########
			possui dois parametros, o nome da tabela, e a 
			clausula WHERE do registro a ser excluido
			Exemplo:
			para excluir dados, segundo parametro nao necessita escrever where
			$delete = $objeto->db_delete('tabela', 'id = 3');
		*/
		public function db_delete($table, $where = null)
		{
			$where = ($where) ? " WHERE {$where}" : null;

			$query = "DELETE FROM {$table}{$where}"; 
			return $this->db_execute($query);

		}

	}//fim classe
	

?>