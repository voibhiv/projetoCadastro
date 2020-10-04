$(function() {
    //Verifica os campos antes do submit
    $("#btnCadastroEmpresa").click(function(){

        var cont = 0;
        $("#formGravaEmpresa select").each(function(){
            if ( $(this).val() == '' ) {
                cont++;
            }
        });

        $("#formGravaEmpresa input[type=text]").each(function(){
            if( $(this).val() == "" ) {
                    cont++;
            }
        });

        if(cont == 0){
            $("#formGravaEmpresa").submit();
        } else {
            alert('Por favor, preencha todos os campos!');
        }

    });

    //MASK
    $("#inputCnpjEmpresa").mask('00.000.000/0000-00');
});