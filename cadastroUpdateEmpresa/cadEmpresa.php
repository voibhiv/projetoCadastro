<?php

include ('../conectaSQL/conexao.php');

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Cadastro Empresa</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/main.css" type="text/css">
    <link rel="stylesheet" href="style/cadEmpresa.css" type="text/css">
    <script src="https://use.fontawesome.com/d30b1df18e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="javascript/cadEmpresa.js"></script>
    <script src="../javascript/jquery.mask.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row" style="height:100%">
            <div class="col-xl-12 seguraTudo">
                <div class="seguraContainers">
                    <div class="modalCadastros" style="width: 35%;height:80%">
                        <div class="seguraHeader">

                            <div class="esquerdaHeader">
                                <h2>Cadastro de Empresas</h2>
                            </div>

                        </div>
                        <div>
                            
                            <form name="formGravaEmpresa" action="gravaEmpresa.php" id="formGravaEmpresa" method="post">

                                <div class="seguraTextoCampo">
                                    <div style="border-bottom: 1px solid #c3c3c3 ;font-weight: 700;">
                                        <span>Informações Gerais</span>
                                    </div>
                                </div>

                                <div class="seguraTextoCampo">
                                    <label class="titleCampo">Nome</label><span style="color:#ff0000;padding: 0px 5px;">*</span>
                                    <input type="text" class="campoTexto" id="nomeEmpresa" name="nomeEmpresa" size="30">
                                </div>

                                <div class="seguraTextoCampo">
                                    <label class="titleCampo">UF</label><span style="color:#ff0000;padding: 0px 5px;">*</span>
                                    <select id="ufEmpresa" name="ufEmpresa">
                                        <option value="">Selecione o estado da empresa</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                </div>

                                <div class="seguraTextoCampo">
                                    <div style="border-bottom: 1px solid #c3c3c3 ;font-weight: 700;">
                                        <span>Dados</span>
                                    </div>
                                </div>

                                <div class="seguraTextoCampo">
                                    <label class="titleCampo">CNPJ</label> <span style="color:#ff0000;padding: 0px 5px;">*</span>
                                    <input id="inputCnpjEmpresa" placeholder="00.000.000/0000-00" type="text" class="campoTexto" name="numeroCnpjEmpresa" size="10">
                                </div>

                                <div class="seguraTextoCampo">
                                    <button type="button" class="btnCadastro" id="btnCadastroEmpresa" >Cadastrar</button>
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