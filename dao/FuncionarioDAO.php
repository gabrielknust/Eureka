<?php
require_once'../classes/Funcionario.php';
require_once'Conexao.php';
require_once'../Functions/funcoes.php';

class FuncionarioDAO
{
	public function incluir($funcionario)
    {        
        try {
            $sql = 'insert into funcionario (nome,email,senha,nascimento,cpf,matricula,ativo,id_cargo) values (:nome,:email,:senha,:nascimento,:cpf,:matricula,:ativo,:id_cargo);';
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
            $idfuncionario=$funcionario
            
            $stmt->bindParam(':idcargo', $idcargo);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    // Editar
    public function alterar($idfuncionario, $tipo, $carga_mensal, $primeira_entrada, $primeira_saida, $segunda_entrada, $segunda_saida, $carga_diaria, $dias_trabalhados, $folgas)
    {
        try {
            $sql = 'update pessoas set idfuncionario=:idfuncionario, idpessoa=:idpessoa, idcargo=:idcargo, imagem=:imagem, vale_transporte=:vale_transporte, data_admissao=:data_admissao, registro_geral=:registro_geral, orgao_emissor=:orgao_emissor, data_expedicao=:data_expedicao, pis=:pis, ctps=:ctps, uf_ctps=:uf_ctps, zona=:zona, certificado_reservista_numero=:certificado_reservista_numero, nome_mae=:nome_mae, nome_pai=:nome_pai';
            
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':idfuncionario', $idfuncionario);
            $stmt->bindParam(':idpessoa', $idpessoa);
            $stmt->bindParam(':idcargo', $idcargo);
            $stmt->bindParam(':imagem', $imagem);
            $stmt->bindParam(':vale_transporte', $vale_transporte);
            $stmt->bindParam(':data_admissao', $data_admissao);
            $stmt->bindParam(':registro_geral', $registro_geral);
            $stmt->bindParam(':orgao_emissor', $orgao_emissor);
            $stmt->bindParam(':data_expedicao', $data_expedicao);
            $stmt->bindParam(':pis', $pis);
            $stmt->bindParam(':ctps', $ctps);
            $stmt->bindParam(':uf_ctps', $uf_ctps);
            $stmt->bindParam(':zona', $zona);
            $stmt->bindParam(':certificado_reservista_numero', $certificado_reservista_numero);
            $stmt->bindParam(':nome_mae', $nome_mae);
            $stmt->bindParam(':nome_pai', $nome_pai);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }
    public function listarTodos(){

        try{
            $internos=array();
            $pdo = Conexao::connect();
            $consulta = $pdo->query("SELECT p.nome,p.cpf, p.senha, p.sexo, p.telefone,p.data_nascimento,p.imagem, p.cep,p.cidade,p.bairro,p.logradouro,p.numero_endereco,p.complemento,p.ibge,p.registro_geral,p.orgao_emissor,p.data_expedicao,p.nome_pai,p.nome_mae,p.tipo_sanguineo,i.nome_contato_urgente,i.telefone_contato_urgente_1,i.telefone_contato_urgente_2,i.telefone_contato_urgente_3,i.certidao_nascimento,i.curatela,i.inss,i.loas,i.bpc,i.funrural,i.saf,i.sus FROM pessoa p INNER JOIN interno i ON p.id_pessoa = i.id_pessoa");
            $produtos = Array();
            $x=0;
            while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                $internos[$x]=array('cpf'=>mask($linha['cpf'],'###.###.###-##'),'nome'=>$linha['nome'],'sexo'=>$linha['sexo'],'data_nascimento'=>$linha['data_nascimento'],'registro_geral'=>$linha['registro_geral'],'orgao_emissor'=>$linha['orgao_emissor'],'data_expedicao'=>$linha['data_expedicao'],'nome_mae'=>$linha['nome_mae'],'nome_pai'=>$linha['nome_pai'],'tipo_sanguineo'=>$linha['tipo_sanguineo'],'senha'=>$linha['senha'],'telefone'=>$linha['telefone'],'imagem'=>$linha['imagem'],'cep'=>$linha['cep'],'cidade'=>$linha['cidade'],'bairro'=>$linha['bairro'],'logradouro'=>$linha['logradouro'],'numero_endereco'=>$linha['numero_endereco'],'complemento'=>$linha['complemento'],'nome_contato_urgente'=>$linha['nome_contato_urgente'],'telefone_contato_urgente_1'=>$linha['telefone_contato_urgente_1'],'telefone_contato_urgente_2'=>$linha['telefone_contato_urgente_2'],'telefone_contato_urgente_3'=>$linha['telefone_contato_urgente_3'],'certidao_nascimento'=>$linha['certidao_nascimento'],'curatela'=>$linha['curatela'],'inss'=>$linha['inss'],'loas'=>$linha['loas'],'bpc'=>$linha['bpc'],'funrural'=>$linha['funrural'],'saf'=>$linha['saf'],'sus'=>$linha['sus']);
                $x++;
            }
            } catch (PDOExeption $e){
                echo 'Error:' . $e->getMessage;
            }
            return json_encode($internos);
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