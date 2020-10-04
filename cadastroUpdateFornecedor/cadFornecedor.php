<?php 
include ('../conectaSQL/conexao.php');
$prepara = $conexao_pdo->prepare('SELECT * FROM empresa');
$prepara->execute();
?>

<html lang="ptbr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Cadastro de Fornecedores</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/main.css" type="text/css">
    <link rel="stylesheet" href="style/cadFornecedor.css" type="text/css">
    <script src="https://use.fontawesome.com/d30b1df18e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="javascript/cadFornecedor.js"></script>
    <script src="../javascript/jquery.mask.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row" style="height:100%">
            <div class="col-xl-12 seguraTudo">
                <div class="seguraContainers">
                    <div class="modalCadastros" style="width: 35%;height: 80%;">
                        <div class="seguraHeader">

                            <div class="esquerdaHeader">
                                <h2>Cadastro de Fornecedor</h2>
                            </div>

                        </div>
                        <div>
                            
                            <form name="formGravaFornecedor" action="gravaFornecedor.php" id="formGravaFornecedor" method="post">

                                <div class="seguraTextoCampo">
                                    <div style="border-bottom: 1px solid #c3c3c3 ;font-weight: 700;">
                                        <span>Informações Pessoais</span>
                                    </div>
                                </div>

                                <div class="seguraTextoCampo">
                                    <label  class="titleCampo">Tipo Pessoa</label>
                                    <select name="tipoPessoa" class="selectEmpresa" id="tipoPessoa">
                                        <option value="1">Pessoa Física</option>
                                        <option value="2">Pessoa Jurídica</option>
                                    </select>
                                </div>

                                <div class="seguraTextoCampo">
                                    <label class="titleCampo">Nome</label><span style="color:#ff0000;padding: 0px 5px;">*</span>
                                    <input type="text" class="campoTexto" id="nomeFornecedor" name="nomeFornecedor" size="30">
                                </div>
                            

                                <div class="seguraTextoCampo">
                                    <label id="titleCpf" class="titleCampo btTitle btSelecionado">CPF</label> <label id="titleCnpj" class="titleCampo btTitle btNaoSelecionado">CNPJ</label> <span style="color:#ff0000;padding: 0px 5px;">*</span> <i class="fa fa-info-circle" id="infoCampos" title="Selecione o campo para inscrição dos dados" aria-hidden="true"></i>
                                    <input id="inputCpf" type="text" placeholder="000.000.000-00" class="campoTexto" name="numeroCpf" size="10">
                                    <input id="inputCnpj" placeholder="00.000.000/0000-00" type="text" class="campoTexto" name="numeroCnpj" size="10">
                                    <input id="auxCad" type="hidden" name="auxCad" value='0'>
                                </div>

                                <div class="seguraTextoCampo" id="seguraRg">
                                    <label  class="titleCampo">RG</label><span style="color:#ff0000;padding: 0px 5px;">*</span>
                                    <input type="hidden" class="campoTexto" placeholder="000.000.000-A" name="campoRg" id="campoRg" size="10">
                                </div>

                                <div class="seguraTextoCampo">
                                    <div style="border-bottom: 1px solid #c3c3c3 ;font-weight: 700;">
                                        <span>Informações Gerais</span>
                                    </div>
                                </div>

                                <div class="seguraTextoCampo">
                                    <label  class="titleCampo">Telefone</label> <span style="color:#ff0000;padding: 0px 5px;">*</span>
                                    <input type="text" class="campoTexto" placeholder="(00) 00000-0000" name="numeroTelefone" id="numeroTelefone" size="10">
                                </div>

                                <div class="seguraTextoCampo">
                                    <label class="titleCampo">Empresa</label> <span style="color:#ff0000;padding: 0px 5px;">*</span>
                                    <select name="nomeEmpresa" class="selectEmpresa" id="nomeEmpresa">
                                        <option value="0">Selecione a empresa</option>
                                            <?php
                                            while ( $linha = $prepara->fetch() ) {
                                                echo "<option value='$linha[nome_empresa]'>$linha[nome_empresa]</option>";
                                            }
                                            ?>
                                    </select>
                                </div>

                                <div class="seguraTextoCampo">
                                    <button type="button" class="btnCadastro" id="btCadastroFornecedor" >Cadastrar</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>