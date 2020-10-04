<?php
include ('../conectaSQL/conexao.php');

$nomeEmpresa = $_POST['nomeEmpresa'];
$ufEmpresa = $_POST['ufEmpresa'];
$numeroCnpjEmpresa = $_POST['numeroCnpjEmpresa'];

try{
    $consulta = $conexao_pdo->prepare("SELECT * FROM empresa WHERE cnpj_empresa='$numeroCnpjEmpresa' ");
    $consultaExec = $consulta->execute();
    $totalLinhasErro = $consulta->rowCount();

    if( $totalLinhasErro > 0 ) {
        echo 'Erro na Inserção de Dados, Verifique se já não exista um cadastro com esses dados <br>';
        echo '<a class="btCadastro" href="../index.php" >Voltar</a> ';
    
    } else {
        $pdo = $conexao_pdo->prepare("INSERT INTO empresa(id_empresa, dado_uf, nome_empresa, cnpj_empresa) VALUES ('', :dado_uf, :nome_empresa, :cnpj_empresa)");
        $pdo->bindParam(":dado_uf", $ufEmpresa , PDO::PARAM_STR);
        $pdo->bindParam(":nome_empresa", $nomeEmpresa , PDO::PARAM_STR);
        $pdo->bindParam(":cnpj_empresa", $numeroCnpjEmpresa , PDO::PARAM_STR);
        $executa = $pdo->execute();
        
        if( $executa ){
            header('Location: ../index.php');
        } else {
            echo 'Erro no cadastro';
        }
    }
    
}
catch(PDOException $e){
    echo $e->getMessage();
}

?>