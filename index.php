<?php
include ('conectaSQL\conexao.php');
$conectaEmpresa = $conexao_pdo-> prepare('SELECT * from empresa');
$conectaEmpresa-> execute();
$totalLinhasEmpresa = $conectaEmpresa-> rowCount();

$conectaFornecedor = $conexao_pdo-> prepare('SELECT * from fornecedor');
$conectaFornecedor-> execute();
$totalLinhasFornecedor = $conectaFornecedor-> rowCount();

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>
    <link rel="stylesheet" href="style/main.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row" style="height:100%">
            <div class="col-xl-6 seguraTudo">
                <div class="seguraContainers">
                    <div class="modalCadastros" style="height:80%">
                        <div class="seguraHeader">

                            <div class="esquerdaHeader">
                                <h2>Lista de Fornecedores</h2>
                            </div>

                            <div class="direitaHeader">
                                <a href="cadastroUpdateFornecedor/cadFornecedor.php" class="btnCadastro">Novo Fornecedor</a>
                            </div>

                        </div>
                        
                        <div class="seguraInfo">
                            <div class="seguraUF01"><span class="textTitle">EMPRESA</span></div>
                            <div class="seguraUF02"><span class="textTitle">NOME</span></div>
                            <div class="seguraUF03"><span class="textTitle">CPF/CNPJ</span></div>
                            <div class="seguraUF04"><span class="textTitle">TELEFONE</span></div>
                        </div>
                        <!-- Listagem Dos Fornecedores -->
                        <div>
                            <?php
                            while ( $linhaFornecedor = $conectaFornecedor->fetch() ) {
                                $cpfCnpj = '';
                                ( $linhaFornecedor['cpf_fornecedor'] == '' ) ? $cpfCnpj = $linhaFornecedor['cnpj_fornecedor'] : $cpfCnpj = $linhaFornecedor['cpf_fornecedor'];
                                ?>
                                <div class="seguraLista">
                                    <div class="seguraInfoLinhas">
                                        <div class="seguraUF01"><?=substr($linhaFornecedor['empresa_vinculada'], 0, 30) ;?></div>
                                        <div class="seguraUF02"><?=substr($linhaFornecedor['nome_fornecedor'], 0, 30) ;?></div>
                                        <div class="seguraUF03"><?=substr($cpfCnpj, 0, 30) ;?></div>
                                        <div class="seguraUF04"><?=substr($linhaFornecedor['telefone_fornecedor'], 0, 30) ;?></div>
                                    </div>
                                </div>
                            <?php 
                            }?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-6 seguraTudo">
                <div class="seguraContainers">
                    <div class="modalCadastros" style="height:80%">

                        <div class="seguraHeader">
                            <div class="esquerdaHeader">
                                <h2>Lista de Empresas</h2>
                            </div>

                            <div class="direitaHeader">
                                <a href="cadastroUpdateEmpresa/cadEmpresa.php" class="btnCadastro">Nova Empresa</a>
                            </div>
                        </div>

                        <div class="seguraInfo">
                            <div class="seguraUF1"><span class="textTitle">UF</span></div>
                            <div class="seguraUF2"><span class="textTitle">NOME FANTASIA</span></div>
                            <div class="seguraUF3"><span class="textTitle">CNPJ</span></div>
                        </div>
                        <!-- Listagem Das Empresas -->
                        <div>
                            <?php
                            while ( $linha = $conectaEmpresa->fetch() ) {?>
                                <div class="seguraLista">
                                    <div class="seguraInfoLinhas">
                                        <div class="seguraUF1"><?=$linha['dado_uf']?></div>
                                        <div class="seguraUF2"><?=substr($linha['nome_empresa'], 0, 30) ;?></div>
                                        <div class="seguraUF3"><?=substr($linha['cnpj_empresa'], 0, 30) ;?></div>
                                    </div>
                                </div>
                            <?php 
                            }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>