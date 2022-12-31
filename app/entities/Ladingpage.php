<?php
require_once('Conexao.php');

class dados
{
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $data;
    private $mensagem;
    private $database;

    public function __construct($nome = null, $email = null, $telefone = null, $data = null, $mensagem = null)
    {
        
        if($nome != null) $this->nome = $nome;
        if($email != null) $this->email = $email;
        if($telefone != null) $this->telefone = $telefone;
        if($data != null) $this->data = $data;
        if($mensagem != null) $this->mensagem = $mensagem;
        $this->database = Conexao::getInstancia();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of titulo
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of mensagem
     */ 
    public function getmensagem()
    {
        return $this->mensagem;
    }

    /**
     * Set the value of mensagem
     *
     * @return  self
     */ 
    public function setmensagem($mensagem)
    {
        $this->mensagem = $mensagem;

        return $this;
    }

    /**
     * Get the value of autor
     */ 
    public function getemail()
    {
        return $this->email;
    }

    /**
     * Set the value of autor
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function listar()
    {
        $conexao = $this->database->getConexao();
        $consulta = $conexao->query('SELECT * FROM dados');
        return $consulta->fetchAll(PDO::FETCH_CLASS, 'dados');
    }

    public function selecionar($id)
    {
        $sql = 'SELECT * FROM dados WHERE id = ?';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1, $id, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchObject('dados'); //retorna 1 registro no formato de objeto da classe Post
    }

    public function salvar()
    {
        $sql = 'INSERT INTO dados (nome, email, telefone, data, mensagem) 
                    VALUES (?, ?, ?, ?, ?)';
        $conexao = $this->database->getConexao(); //pegar a conexao
        $consulta = $conexao->prepare($sql); //preparar a consulta
        //comecar a informar os dados:
        $consulta->bindValue(1, $this->nome, PDO::PARAM_STR);
        $consulta->bindValue(2, $this->email, PDO::PARAM_STR);
        $consulta->bindValue(3, $this->telefone, PDO::PARAM_STR);
        $consulta->bindValue(4, $this->data, PDO::PARAM_STR);
        $consulta->bindValue(5, $this->mensagem, PDO::PARAM_STR);
        $resultado = $consulta->execute();
        // return $resultado;
        // return $consulta->execute();
        if($resultado) return true;
        return false;
    }

    public function atualizar()
    {
        if($this->id == null) return false;


        $sql = 'UPDATE dados SET nome = ?, email = ?, telefone = ?, 
                data = ?, mensagem = ?,  
                WHERE id = ?';
        
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1, $this->nome, PDO::PARAM_STR);
        $consulta->bindValue(2, $this->email, PDO::PARAM_STR);
        $consulta->bindValue(3, $this->telefone, PDO::PARAM_STR);
        $consulta->bindValue(4, $this->data, PDO::PARAM_STR);
        $consulta->bindValue(5, $this->mensagem, PDO::PARAM_STR);
        $consulta->bindValue(6, $this->id, PDO::PARAM_INT);
        return $consulta->execute(); //true or false
    }

    public function excluir()
    {
        if($this->id == null) return false; //mecanismo de seguranca pra verificar se objeto e concreto
        
        $sql = 'DELETE FROM dados WHERE id = ?';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(1, $this->id, PDO::PARAM_INT);
        if($consulta->execute()) return true;
        $consulta->errorInfo(); //metodo do PDO que traz detalhes de erros
        return false;
    }
}