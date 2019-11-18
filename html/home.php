<?php 
    $time=7 * 60 * 60;
    session_set_cookie_params($time);
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo1.css">
    <link href="fonte/ARLRDBD.TTF" rel="stylesheet">
    <title>projeto</title>
</head>

<body>
        
    
   

        <table>
            <tr>
                   <th>
        
    
                        <div class="PG2-RetanguloEsquerda"> 
        
                            <center><img src="img/focusfc.png"
                            srcset="img/focusfc@2x.png 2x,
                            img/focusfc@3x.png 3x"
                            class="focusfc"></center>

                            <center> <img src="img/iconPessoa.png"
                            srcset="icoPessoa(2).png 2x,
                            iconPessoa(3).png 3x"
                            class="icons8-pessoa-do-sexo-masculino-64"> </center>

                            <center> <img src="img/iconAtendimento.png"
                            srcset="img/iconAtendimento@2x.png 2x,
                            img/iconAtendimento@3x.png 3x"
                            class="icons8-atendimento-80"> </center>

                            <center> <img src="img/iconCalendario.png"
                            srcset="img/iconCalendario@2x.png 2x,
                            img/iconCalendario@3x.png 3x"
                            class="icons8-calendario-100">
                            </center>
                            
                            <center> <img src="img/iconCarta.png"
                            class="iconCarta">
                            </center>

                            <center> <img src="img/iconCalendario2.png"
                            srcset="img/iconCalendario2@2x.png 2x,
                            img/iconCalendario2@3x.png 3x"
                            class="icons8-calendario-50">
                            </center>

                            <center> <img src="img/iconRolagem.png"
                            srcset="img/iconRolagem@2x.png 2x,
                            img/iconRolagem@3x.png 3x"
                            class="icons8-rolagem-128">
                            </center>

                            <center> <img src="img/iconSair.png"
                            srcset="img/iconSair@2x.png 2x,
                            img/iconSair@3x.png 3x"
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
                                
                            <div class= "hora"><center><p><?php echo $_SESSION['hora1']; ?></p></center></div> 
                                
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






</body>
