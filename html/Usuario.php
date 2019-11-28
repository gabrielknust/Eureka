<?php 
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
    function nascimento($nascimento)
    {
        $nascimento=explode("-", $nascimento);
        return $string=$nascimento[2].'/'.$nascimento[1].'/'.$nascimento[0];

    }
    require_once '../dao/Conexao.php';
    $funcionarios=array();
    $pdo = Conexao::connect();
    $consulta = $pdo->query("SELECT f.nome_func,f.nascimento,f.email,f.id_funcionario,f.matricula,f.cpf,ce.nome_celula FROM funcionario f inner join cargo c on c.id_cargo=f.id_cargo  inner join celula ce on c.id_celula=ce.id_celula ORDER BY nome_func");
    $x=0;
    while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
        $nascimento=nascimento($linha['nascimento']);
         $funcionarios[$x]=array('id'=>$linha['id_funcionario'],'nome'=>$linha['nome_func'],'matricula'=>$linha['matricula'],'cpf'=>mask($linha['cpf'],'###.###.###-##'),'celula'=>$linha['nome_celula'],'nascimento'=>$nascimento);
         $x++;
    }
    $funcionarios=json_encode($funcionarios);
    $time=7 * 60 * 60;
    session_set_cookie_params($time);
    session_start();
    if(!isset($_SESSION['id']) || !isset($_SESSION['permissao']))
    {
        header("Location:index.html");
    }
    $id=$_SESSION['id'];
    $permissao=$_SESSION['permissao'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Usuario.css">
    <link href="fonte/ARLRDBD.TTF" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="geral.css">
    <script src="../html/jquery.min.js"></script>
    <title>projeto</title>
    <script>
        var permissao=<?php echo $permissao; ?>;
        var id_usuario=<?php echo $id; ?>;
        var funcionarios=<?php echo $funcionarios; ?>;
        console.log(permissao);
        $(function(){

            if(permissao==1)
            {
                $("#profile").append($("<center>").append($("<a>").attr("href","RegistroFuncionario.php").append($("<i>").attr("class","fas fa-3x fa-plus").attr("id","icone"))));
                $.each(funcionarios,function(i,item){
                    $("#tabela").append($("<tr>").attr("id",item.id).attr("class","click").append($("<td>").append($("<center>").append($("<p>").attr("class","Escrever").html(item.nome)))).append($("<td>").append($("<center>").append($("<p>").attr("class","Escrever").html("Situação")))).append($("<td>").append($("<img>").attr("src","iconEditar.png").attr("class","iconLixeira")).append($("<img>").attr("src","iconLixeira.png").attr("class","iconLixeira"))));
                });
            }
            else{
                $.each(funcionarios,function(i,item){
                    if(item.id==id_usuario){
                    $("#tabela").append($("<tr>").attr("id",item.id).attr("class","click").append($("<td>").append($("<center>").append($("<p>").attr("class","Escrever").html(item.nome)))).append($("<td>").append($("<center>").append($("<p>").attr("class","Escrever").html("Situação")))).append($("<td>").append($("<img>").attr("src","iconEditar.png").attr("class","iconLixeira")).append($("<img>").attr("src","iconLixeira.png").attr("class","iconLixeira"))));
                    $("#nome").text(item.nome);
                        $("#cpf").text(item.cpf);
                        $("#matricula").text(item.matricula);
                        $("#nome").text(item.nome);
                        $("#celula").text(item.celula);
                        $("#nascimento").text(item.nascimento);
                }
                });
            }
            $(".click").on("click",function(){
                var id_func=$(this).attr("id");
                $.each(funcionarios,function(i,item){
                    if(id_func==item.id)
                    {
                        $("#nome").text(item.nome);
                        $("#cpf").text(item.cpf);
                        $("#matricula").text(item.matricula);
                        $("#nome").text(item.nome);
                        $("#celula").text(item.celula);
                        $("#nascimento").text(item.nascimento);
                    }
                })
                
            });
        });
    </script>
</head>

<body>

        <table>
            <tr>
                   
                <th>
        
    
                        <div class="PG2-RetanguloEsquerda"> 
        
                            <center> <a href="home.php"> <img src="focusfc.png" 
                            srcset="focusfc@2x.png 2x,
                            focusfc@3x.png 3x"
                            class="focusfc"> </center></a>


                            <center id="profile"> <a href="usuario.php"> <img src="iconPessoa.png"
                            srcset="icoPessoa(2).png 2x,
                            iconPessoa(3).png 3x"
                            class="icons8-pessoa-do-sexo-masculino-64"> </a> </center>

                            <center> <a href="">  <img src="iconAtendimento.png"
                            srcset="iconAtendimento@2x.png 2x,
                            iconAtendimento@3x.png 3x"
                            class="icons8-atendimento-80"> </a> </center>

                            <center> <a href=""> <img src="iconCalendario.png"
                            srcset="iconCalendario@2x.png 2x,
                            iconCalendario@3x.png 3x"
                            class="icons8-calendario-100"></a>
                            </center>

                            <center> <a href="Justificativa.html"><img src="iconCarta.png"
                            class="iconCarta"></a>
                            </center>

                            <center> <a href="plantao-index.html"><img src="iconCalendario2.png"
                            srcset="iconCalendario2@2x.png 2x,
                            iconCalendario2@3x.png 3x"
                            class="icons8-calendario-50"> </a>
                            </center>

                            <center> <a href=""><img src="iconRolagem.png"
                            srcset="iconRolagem@2x.png 2x,
                            iconRolagem@3x.png 3x"
                            class="icons8-rolagem-128"> </a>
                            </center>

                            <center> <img src="iconSair.png"
                            srcset="iconSair@2x.png 2x,
                            iconSair@3x.png 3x"
                            class="icons8-sair-100-2">
                            </center>
                        </div>
                </th> 
                
                <th>
                    <p class="EscreverUsuario"> Usuário </p>
                    <div class="Caminho-6">
                        <table style="width:100%" id="tabela">
                            <tr>
                              <td style="width: 300px;"><center> <p class="EscreverTitulosTabela" > Nome </p> </center> </td>
                              <td><center> <p class="EscreverTitulosTabela"> Situação </p> </center></td>
                              <td><center> <p class="EscreverTitulosTabela"> Modificações </p> </center> </td>
                            </tr>
                        </table>
                    </div> 
                </th>
                        
                <th>
                        
                    <div class="Subir">
                    <img src="FotoPessoa.png"
                        srcset="iconSair@2x.png 2x,
                        iconSair@3x.png 3x"
                        class="foto">
                   <center> <p class="EscreverNome" id="nome"> Nome do Usuário Shark </p> </center>
                    </div>
                    <table style="width:100%">
                        <tr>
                        <th><div class= "Retangulo_Campo"> <center id="celula">Célula</center></div></th>
                        <th><div class= "Retangulo_Campo"> <center id="nascimento">Nascimento</center></div></th>
                      
                        </tr>
                         <tr>
                            <th><div class= "Retangulo_Campo"> <center id="matricula">Matrícula</center></div></th>
                            <th><div class= "Retangulo_Campo"> <center id="cpf">CPF</center></div></th>
                
                        </tr>
                    </table>
                    <p class="EscreverPlantao"> Plantões </p>
                    <div class="CaixaPlantão"></div>

                </th>

                    

                
            </tr>
                 
        </table>
</body>
        
