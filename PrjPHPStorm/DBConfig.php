<?php

/**
 * Created by PhpStorm.
 * User: rapha
 * Date: 23/05/17
 * Time: 18:22
 */
class DBConfig
{
    private $user = 'id1672963_listadecomrpasbd';
    private $pass = '123456';
    private $server = 'localhost';
    private $database = 'id1672963_listadecomprasbd';

    public function connectDB()
    {

        try {
            $dbh = new PDO('mysql:host=' . $this->server . ';dbname=' . $this->database, $this->user, $this->pass); //conexão realizada com PDO, passando como parametros os atributos previamente definidos
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbh;
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function insertChar($name, $server)
    {
        try {

            $dbh = $this->connectDB();
            $statement = $dbh->prepare("INSERT INTO `char`(name, level, nme_class) VALUES(:name, :level, :nme_class)");
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
                echo "<tr>".
                    "<td>"."<input type='checkbox' value='". $produto['idt_produto']."'"."></td>".
                    "<td>" . $produto['nme_produto']."</td>".
                    "<td>".$produto['qtd_produto']."</td>".
                    "<td>".$produto['tpo_produto']."</td>".
                    "<td>".$produto['med_produto']."</td>".
                    "<td>".$produto['prc_produto']."</td>".
                    "</tr>";
            }
        }
        catch
            (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
            }

    /**
     *Criar usuário
     */
    public function criarUsuario(){
        try{

            $nmeUsuario= $_POST['nmeUsuario'];
            $lgnUsuario= $_POST['lgnUsuario'];
            $pwdUsuario= $_POST['pwdUsuario'];
            $emlUsuario= $_POST['emlUsuario'];

            $exists=0;
            $result= $dbh->query("SELECT lgn_usuario FROM tb_usuario WHERE lgn_usuario = '$nmeUsuario' LIMIT 1");
            if ($result->num_rows == 1) {
                $exists = 1;
                $result = $dbh->query("SELECT eml_usuario from tb_usuario WHERE eml_usuario = '$emlUsuario' LIMIT 1");
                if ($result->num_rows == 1) $exists = 2;
            } else {
                $result = $dbh->query("SELECT eml_usuario from tb_usuario WHERE eml_usuario = '$emlUsuario' LIMIT 1");
                if ($result->num_rows == 1) $exists = 3;
            }

            if ($exists == 1) echo "<p>Username already exists!</p>";
            else if ($exists == 2) echo "<p>Username and Email already exists!</p>";
            else if ($exists == 3) echo "<p>Email already exists!</p>";
            else {
                $sql = "INSERT INTO tb_usuario (nme_usuario, lgn_usuario, pwd_usuario, eml_usuario) VALUES ('$nmeUsuario','$lgnUsuario','$pwdUsuario','$emlUsuario')";

                if($dbh->query($sql)){
                    echo "<p>Usuário Inserido com Sucesso</p>";
                }else{
                    echo "<p>MySQL ERRO no {$dbh->errno} : {$dbh->error}</p>";
                    exit();
                }
            }
        }
        catch ( PDOException $e){

            echo 'Error: ' . $e->getMessage();
        }
    }




    }





