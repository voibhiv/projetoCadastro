<?php
include ('../conectaSQL/conexao.php');

//Inicia Variável
$nomeFornecedor = $_POST['nomeFornecedor'];
$auxCad = $_POST['auxCad'];
$numeroTelefone = $_POST['numeroTelefone'];
$nomeEmpresa = $_POST['nomeEmpresa'];
$campoRg = $_POST['campoRg'];
$tipoRegistro = '';
$nada = '';
//variável cpf ou cnpj
if ( $auxCad == 1 ) {
    $tipoRegistro = $_POST['numeroCnpj'];
} else {
    $tipoRegistro = $_POST['numeroCpf'];
}

try{
    $consulta = $conexao_pdo->prepare("SELECT * FROM fornecedor WHERE ( cnpj_fornecedor='$tipoRegistro' OR cpf_fornecedor='$tipoRegistro' ) AND rg_fornecedor ='$campoRg' ");
    $consultaExec = $consulta->execute();
    $totalLinhasErro = $consulta->rowCount();

    if( $totalLinhasErro > 0 ) {
        echo 'Erro na Inserção de Dados, Verifique se já não exista um cadastro com esses dados <br>';
        echo '<a class="btCadastro" href="../index.php" >Voltar</a> ';
        
    } else {
        $pdo = $conexao_pdo->prepare("INSERT INTO fornecedor(id_fornecedor, nome_fornecedor, cpf_fornecedor, cnpj_fornecedor, telefone_fornecedor, rg_fornecedor, empresa_vinculada) VALUES ('', :nome_fornecedor, :cpf_fornecedor, :cnpj_fornecedor, :telefone_fornecedor, :rg_fornecedor, :empresa_vinculada)");
        $pdo->bindParam(":nome_fornecedor", $nomeFornecedor , PDO::PARAM_STR);
        if ( $auxCad == 1 ) {
            $pdo->bindParam(":cnpj_fornecedor", $tipoRegistro , PDO::PARAM_STR);
            $pdo->bindParam(":cpf_fornecedor", $nada , PDO::PARAM_STR);
        } else {
            $pdo->bindParam(":cpf_fornecedor", $tipoRegistro , PDO::PARAM_STR);
            $pdo->bindParam(":cnpj_fornecedor", $nada , PDO::PARAM_STR);
        }
        $pdo->bindParam(":telefone_fornecedor", $numeroTelefone , PDO::PARAM_STR);
        $pdo->bindParam(":rg_fornecedor", $campoRg , PDO::PARAM_STR);
        $pdo->bindParam(":empresa_vinculada", $nomeEmpresa , PDO::PARAM_STR);
        $executa = $pdo->execute();
        
        if( $executa ){
            header('Location: ../index.php');
        } 
    }
    
}
catch(PDOException $e){
    echo $e->getMessage();
}


?>