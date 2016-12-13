<?php 

	class DbConnection
	{

		private $server = null;
		private $user = null;
		private $password = null;
		private $database = null;

		private $connection = null;
		
		function __construct(array $config = null)
		{
			$this->server = isset($config['server']) ? $config['server'] : null;
			$this->user = isset($config['user']) ? $config['user'] : null;
			$this->password = isset($config['password']) ? $config['password'] : null;
			$this->database = isset($config['database']) ? $config['database'] : null;
		}

		public function setServer($server){
			$this->server = $server;
		}

		public function setUser($user){
			$this->user = $user;
		}

		public function setPassword($password){
			$this->password = $password;
		}

		public function setDatabse($databse){
			$this->databse = $databse;
		}

		public function getServer(){
			return $this->server;
		}

		public function getUser(){
			return $this->user;
		}

		public function getDatabase(){
			return $this->database;
		}

		public function query($sql){

			if (empty($sql)) {
				throw new Exception("Não foi possível realizar a conexão");
			}

			try {
				$this->connection();
			} catch (Exception $e) {
				return false;
			}

			$query = $this->connection->query($sql);

			$data = $query->fetch_all(MYSQLI_ASSOC);

			$return = [];
			foreach ($data as $key => $value) {
				$return[] = (object) $data[$key];
			}
			return $return;
		}

		private function connection(){
			
			@$this->connection = new mysqli($this->server, $this->user, $this->password, $this->database);

			if (mysqli_connect_errno()) {
				throw new Exception("Não foi possível realizar a conexão");
			}
		}
	}

?>