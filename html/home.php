<?php 
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
    <link rel="stylesheet" href="home.css">
    <link href="fonte/ARLRDBD.TTF" rel="stylesheet">
    <script src="../html/jquery.min.js"></script>
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="geral.css">
    <title>projeto</title>
    <script>
        var permissao=<?php echo $permissao; ?> 
        console.log(permissao);
        $(function(){
            if(permissao==1)
            {
                $("#profile").append($("<center>").append($("<a>").attr("href","RegistroFuncionario.php").append($("<i>").attr("class","fas fa-3x fa-plus").attr("id","icone"))));
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

                            <center> <img class="edit-slot" src="iconSair.png"
                            srcset="iconSair@2x.png 2x,
                            iconSair@3x.png 3x"
                            class="icons8-sair-100-2">
                            </center>
                        </div>
                    </th> 

                    <th>
                            <p class=Bv> Bem vindo, Shark! </p>
                            
                           
                    </th>
                   
             </tr>
             <tr>
                <th></th>
                         <th>   
                             <div class= "sharkin"> <center>Sharkin</center></div>  
                                
                            <div class= "sharkout"> Sharkout</div>  
                                
                            <div class= "hora"><center><p><?php echo $_SESSION['hora'.$id]; ?></p></center></div> 
                                
                            <div class= "hora2"><center><p>00:00:00</p></center></div> 
                            
                            </th>

                            
            <tr>
                <th></th>
                       




                    
                </th>





            </tr>

                        
                







             </tr>

    </table>

    
    <table>
        
            


   






    </table>

<div id="modal-background" class="modal">
        <div class="modal-content">
            <div class="modal-header">  
                <span class="modal-close">&times;</span>
                <h2>O que deseja fazer?</h2>
            </div>
            <div class="modal-body">
                <h3></h3>
                <ul class="modal-lista-plantao">
                    <input class="formaBotao" type="button" value="SHARKOUT" onclick="window.location.assign('sharkout.php');">
                    <input class="formaBotao" type="button" value="SAIR" onclick="window.location.assign('logout.php');">
                </ul>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
</div>
<script>
var modal = document.getElementById("modal-background");
var slots = document.getElementsByClassName("edit-slot");
var closeButton = document.getElementsByClassName("modal-close")[0];
for(let slot of slots) {
    slot.onclick = function() {
        modal.style.display = "block";
    }
}
closeButton.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>




</body>
