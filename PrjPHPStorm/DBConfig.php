<?php

/**
 * Created by PhpStorm.
 * User: rapha
 * Date: 23/05/17
 * Time: 18:22
 */
class DBConfig
{
    //Definição dos atributos para realizar o login no server MySQL
    private $user = 'id1672963_listadecomrpasbd';
    private $pass = '123456';
    private $server = 'Localhost';
    private $database = 'id1672963_listadecomprasbd';
    //Função para realizar a conexão com o banco de dados MySQL
    public function connectDB()
    {
        //tentativa de realiazar a conexão
        try {
            $dbh = new PDO('mysql:host=' . $this->server . ';dbname=' . $this->database, $this->user, $this->pass); //conexão realizada com PDO, passando como parametros os atributos previamente definidos
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbh;
        } //caso falhe em realizar a conexão
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    //Realiza a inserção dos valores 'name', 'level' e 'class' na tabela char no db.
    public function insertChar($name, $server)
    {
        try {
            $json = file_get_contents('https://us.api.battle.net/wow/character/' . $server . '/' . $name . '?locale=en_US&apikey=ndy6c9t2r9qt4mnw248sj9pj83mztrep');
            $arr = json_decode($json);
            $dbh = $this->connectDB(); //conectar no db
            $statement = $dbh->prepare("INSERT INTO `char`(name, level, nme_class) VALUES(:name, :level, :nme_class)");
            //transformar as informações em array para realizar a inclusão utilizando a função execute
            // *******PREVINE SQL INJECTION********//
            $statement->execute(array(
                ':name' => $arr->name,
                ':level' => $arr->level,
                ':nme_class' => $arr->class
            ));
            echo $statement->rowCount();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    //Retorna os valores 'name', 'level' e 'class' da tabela char no db para ser apresentado.
    public function returnInfo()
    {
        try {
            $dbh = $this->connectDB();
            $statement = $dbh->prepare("SELECT * FROM `tb_produto`");
            $statement->execute();
            $chars = $statement->fetchAll();
            $chars = array_splice($chars, 1);
            foreach($chars as $char){
                echo $char['name']." - Nível: ".$char['level']." - ".$char['nme_class'].'<hr>';
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    /**
     *Seleciona todos os produtos e insere na tabela
     */
    public function selectProd(){
        try {
            $dbh = $this->connectDB();
            $statement = $dbh->prepare("SELECT * FROM `tb_produto`");
            $statement->execute();
            $produtos = $statement->fetchAll();
            foreach ($produtos as $produto) {
                echo "<tr><td>" . $produto['nme_produto'] . "</td><td>".$produto['qtd_produto']."</td><td>".$produto['tpo_produto']."</td><td>".$produto['med_produto']."</td><td>".$produto['prc_produto']."</td></tr>";
            }
        }
        catch
            (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
            }





    }





