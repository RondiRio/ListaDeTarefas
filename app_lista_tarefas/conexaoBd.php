
<!-- <?php 
class Conexao {
    private $host = 'localhost';
    private $dbName = 'php_com_pdo';
    private $dbUser = 'root';
    private $dbPass = '';

    public function conectar() {
        try {
            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbName",
                $this->dbUser,
                $this->dbPass
            );

            return $conexao;
        } catch (PDOException $e) {
            echo $e->getMessage() . 'Erro na conexão';
        }
    }
}
?> -->