<?php
require_once'../classes/Funcionario.php';
require_once'Conexao.php';
function mask($val, $mask)
{
     $maskared = '';
     $k = 0;
     for($i = 0; $i<=strlen($mask)-1; $i++)
     {
        if($mask[$i] == '#')
        {
            if(isset($val[$k]))
            $maskared .= $val[$k++];
        }
        else
        {
            if(isset($mask[$i]))
            $maskared .= $mask[$i];
        }
     }
     return $maskared;
}

class FuncionarioDAO
{
	public function incluir($funcionario)
    {        
        try {
            $sql = 'insert into funcionario (nome_func,email,senha,cpf,matricula,id_cargo,nascimento) values (:nome,:email,:senha,:cpf,:matricula,:id_cargo,:nascimento);';
            $sql = str_replace("'", "\'", $sql);            
            $pdo = Conexao::connect();
            $stmt = $pdo->prepare($sql);
            $senha=$funcionario->getSenha();
            $nome=$funcionario->getNome();
            $cpf=$funcionario->getCpf();
            $nascimento=$funcionario->getDataNasc();
            $email=$funcionario->getEmail();
            $matricula=$funcionario->getMatricula();
            $idcargo=$funcionario->getIdCargo();
            $ativo=$funcionario->getAtivo();
            $stmt->bindParam(':senha',$senha);
            $stmt->bindParam(':nome',$nome);
            $stmt->bindParam(':cpf',$cpf);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':matricula',$matricula);
            $stmt->bindParam(':id_cargo',$idcargo);
            $stmt->bindParam(':nascimento',$nascimento);

            $stmt->execute();
        }catch (PDOExeption $e) {
            echo 'Error: <b>  na tabela funcionario = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    // excluir
    public function excluir($funcionario)
    {
        try {
            $sql = 'DELETE from funcionario WHERE id_funcionario = :idfuncionario';
            $sql = str_replace("'", "\'", $sql);
            $pdo = Conexao::connect();            
            $stmt = $pdo->prepare($sql);
            $idfuncionario=$funcionario;
            
            $stmt->bindParam(':idcargo', $idcargo);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela funcionario = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    // Editar
    public function alterar($funcionario)
    {
        try {
            $sql = 'update funcionario set idfuncionario=:idfuncionario,nome=:nome,cpf=:cpf,nascimento=:nascimento,matricula=:matricula,ativo=:ativo,email=:email,idcargo=:idcargo,senha=:senha';
            
            $sql = str_replace("'", "\'", $sql); 
            $pdo = Conexao::connect();          
            $stmt = $pdo->prepare($sql);
            $senha=$funcionario->getSenha();
            $nome=$funcionario->getNome();
            $cpf=$funcionario->getCpf();
            $nascimento=$funcionario->getDataNasc();
            $email=$funcionario->getEmail();
            $matricula=$funcionario->getMatricula();
            $idcargo=$funcionario->getIdCargo();
            $ativo=$funcionario->getAtivo();
            $stmt->bindParam(':senha',$senha);
            $stmt->bindParam(':nome',$nome);
            $stmt->bindParam(':cpf',$cpf);
            $stmt->bindParam(':nascimento',$nascimento);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':matricula',$matricula);
            $stmt->bindParam(':id_cargo',$idcargo);
            $stmt->bindParam(':ativo',$ativo);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }
    public function listarTodos(){

        try{
            $funcionarios=array();
            $pdo = Conexao::connect();
            $consulta = $pdo->query("SELECT * FROM funcionario");
            $x=0;
            while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                $funcionarios[$x]=array('cpf'=>mask($linha['cpf'],'###.###.###-##'),'nome'=>$linha['nome'],);
                $x++;
            }
            } catch (PDOExeption $e){
                echo 'Error:' . $e->getMessage;
            }
            return json_encode($funcionarios);
        }

    public function listar($cpf){
        $nome = "%" . $nome . "%";
        try{
            $pdo = Conexao::connect();
            $sqc = "SELECT p.nome,p.cpf, p.senha, p.sexo, p.telefone,p.data_nascimento,p.imagem, p.cep,p.cidade,p.bairro,p.logradouro,p.numero_endereco,p.complemento,p.ibge,p.registro_geral,p.orgao_emissor,p.data_expedicao,p.nome_pai,p.nome_mae,p.tipo_sanguineo,i.nome_contato_urgente,i.telefone_contato_urgente_1,i.telefone_contato_urgente_2,i.telefone_contato_urgente_3 FROM pessoa p INNER JOIN interno i ON p.id_pessoa = i.id_pessoa WHERE p.nome LIKE :nome";
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':nome' => $nome
            ));
            $internos = Array();
            while ($linha = $consulta-fetch(PDO::FETCH_ASSOC)) {
                $interneo = new Interno();
                $internos[] = $interno;
            }
        }catch (PDOExeption $e){
            echo 'Error: ' .  $e->getMessage();
        }
        return $internos;
    }
}
?>