<?php 

    require_once '../dao/Conexao.php';
    $celulas=array();
    $pdo = Conexao::connect();
    $consulta = $pdo->query("SELECT * FROM celula");
    $x=0;
    while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
         $celulas[$x]=array('id'=>$linha['id_celula'],'nome'=>$linha['nome_celula'],);
         $x++;
    }
    $cargos=array();
    $consulta = $pdo->query("SELECT id_cargo,nome_cargo,id_celula FROM cargo");
    $x=0;
    while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
         $cargos[$x]=array('id'=>$linha['id_cargo'],'nome'=>$linha['nome_cargo'],'id_celula'=>$linha['id_celula']);
         $x++;
    }
    $cargos=json_encode($cargos);
    $celulas=json_encode($celulas);
    $time=7 * 60 * 60;
    session_set_cookie_params($time);
    session_start();
    if($_SESSION['permissao']!=1)
    {
        header("Location:../html/home.php");
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
    <link rel="stylesheet" href="RegistroFuncionario.css">
    <link href="fonte/ARLRDBD.TTF" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="geral.css">
    <script src="../html/jquery.min.js"></script>
    <title>projeto</title>
    <script>
        var permissao=<?php echo $permissao; ?> ;
        var celulas=<?php echo $celulas; ?>;
        var cargos=<?php echo $cargos; ?>;
        $(function(){
            if(permissao==1)
            {
                $("#profile").append($("<center>").append($("<a>").attr("href","RegistroFuncionario.php").append($("<i>").attr("class","fas fa-3x fa-plus").attr("id","icone"))));
                $.each(celulas,function(i,item){
                    $("#celula").append($("<option>").attr("value",item.id).html(item.nome));
                });
                $("#celula").change(function(){
                    var id=$("#celula option:selected").attr("value");
                    $.each(cargos,function(i,item){
                        if(item.id_celula==id)
                        {
                            $("#cargo").append($("<option>").attr("value",item.id).html(item.nome));
                        }
                });
                });
            }
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

                            <center id="profile"> <a href="Usuario.php"> <img src="iconPessoa.png"
                            srcset="icoPessoa(2).png 2x,
                            iconPessoa(3).png 3x"
                            class="icons8-pessoa-do-sexo-masculino-64"> </a> </center>

                            <center> <a href="">  <img src="iconAtendimento.png"
                            srcset="iconAtendimento@2x.png 2x,
                            iconAtendimento@3x.png 3x"
                            class="icons8-atendimento-80"> </a>  </center>

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
                   </tr>
                   </table>
                        <table>
                                <tr>
                                    <th>
                                        <div class="Caminho-6" >  <div class="container">  
                                                <form action="../controle/control.php" class="form-contact" method="post" tabindex="1">  
                                                   <input type="text" class="form-contact-input" name="nome" placeholder="Nome Completo" autocomplete="off"   autofocus required />
                                                   <input type="email" class="form-contact-input" name="email" placeholder="email@email.com" autocomplete="off" required />  
                                                   <input type="text" class="form-contact-input" name="matricula" placeholder="Matrícula" autocomplete="off" required />  
                                                   <input type="text" class="form-contact-input" name="cpf" placeholder="CPF"  maxlength= "11" autocomplete="off"  required pattern="[0-9]{11}" />  
                                                   <input type="text" class="form-contact-input" name="data" placeholder="Data de Nascimento (dd/mm/aaaa)" autocomplete="off" required pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" />  
                                                   <select name="Celula" class="form-contact-input" id="celula">
                                                        <option value="celula" selected disabled >Célula</option >
                                                    </select> 
                                                    <select name="cargo" class="form-contact-input" id="cargo">
                                                        <option value="cargo" selected disabled >Cargo</option >
                                                    </select> 
                                                    <input type="hidden" name="nomeClasse" value="FuncionarioControle">
                                                    <input type="hidden" name="metodo" value="incluir">    
                                                   <button type="submit"  class="form-contact-button">Enviar</button>  
                                                </form>  
                                              </div>   </div>
                                    

                                       
                                </th>
                        </tr>
                 </table>


                 <div class="tubarao"><img src="tubarao1.png"></div>
                 </div>
                </table>

                <table>

                 <div class="registro"><img src="reg.png"  width="600px"></div>

                </table>
        </body>
</html>

                        
