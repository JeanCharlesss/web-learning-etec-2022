<?php
    // require_once("../model/Produto.php");
    // require_once '../model/Categoria.php';
    // require_once '../dao/ProdutoDao.php';

    require_once '../global.php';

   
    


    $cliente = new Cliente();
    if((isset($_POST['checked'])) ){
        if( (!empty($_POST['txtNome'])) &&
            (!empty($_POST['txtCpf'])) &&
            (!empty($_POST['txtComplemento'])) &&
            (!empty($_POST['txtCep'])) &&
            (!empty($_POST['txtData'])) &&
            (!empty($_POST['txtUf'])) &&
            (!empty($_POST['txtNumero'])) &&
            (!empty($_POST['txtUsuario'])) &&
            (!empty($_POST['txtConfirmar'])) &&
            (!empty($_POST['txtSenha']))
        ){
            $senha = $_POST['txtSenha'];
            $confirmar = $_POST['txtConfirmar'];

            //removendo traços para verificar
            $cpf = str_replace("-","",$_POST['txtCpf']);
            $cpfArray= str_replace(".","",$cpf);

            if(($senha ==  $confirmar)){
                if(validarCpf($cpfArray)==true){
                    $cliente = new Cliente();
                
                    $cliente->setNome($_POST['txtNome']);
                    $cliente->setCpf($cpfArray);
                    $cliente->setEmail($_POST['txtEmail']);
                    $cliente->setSenha($_POST['txtSenha']);
                    $cliente->setLogradouro($_POST['txtLogradouro']);
                    $cliente->setNumero($_POST['txtNumero']);
                    $cliente->setComplemento($_POST['txtComplemento']);
                    $cliente->setBairro($_POST['txtBairro']);
                    $cliente->setCidade($_POST['txtCidade']);
                    $cliente->setUf($_POST['txtUf']);
                    $cliente->setCep($_POST['txtCep']);
                    //formatando a data para entrar no bd
                    $data = $_POST['txtData'];
                    $data = date("Y-m-d",strtotime(str_replace('/','-',$data)));  
                    $cliente->setData($data);
                    $cliente->setUsuario($_POST['txtUsuario']);
    
                    ClienteDao::cadastrar($cliente);
                }else{
                    echo('
                    <script>
                        alert("Digite um CPF válido!");
                        window.location = "../cadastro.php";
                    </script>
                    ');
                }
            }else{
                echo('
                <script>
                    alert("Senha diferente! Ambas devem ser iguais.");
                    window.location = "../cadastro.php";
                </script>
                ');
            }
        }else{
            echo('
                <script>
                    alert("Preencha todos campos!");
                    window.location = "../cadastro.php";
                </script>
            ');
        }
    }else{
        echo('
        <script>
            alert("Leia e aceite os termos de privacidade!");
            window.location = "../cadastro.php";
        </script>
        ');
    }

    function validarCpf($cpfArray){
        //        --------verificação digito 1--------
       $j = 10;
       $soma1 = 0;
       for($i = 0;$i<9;$i++){
           $soma1 = $soma1 + ($cpfArray[$i]*$j);
           $j--;
       }

       $digito1 = 0;
       $res1 = $soma1 % 11;
       if($res1 < 2){
           $digito1 = 0;
       }else{
           $digito1 = 11-$res1;
       }

       //reset 
       $j = 11;
       $i = 0;

       //        --------verificação digito 2--------
       $soma2 = 0;
       for($i = 0;$i<9;$i++){
           $soma2 = $soma2 + ($cpfArray[$i]*$j);
           $j--;
       }
       $soma2 = $soma2 +(2*$digito1);
       $res2 = $soma2 % 11;
       $digito2 = 0;
       if($res2 <2){
           $digito2 = 0;
       }else{
           $digito2 = 11 - $res2;
       }
       
       if(($digito1 == $cpfArray[9]) && ($digito2 == $cpfArray[10])){
           return true;
       }else{
           return false;
       }
   }
?>