$(function(){
    //Campo input cpf ou cnpj
    $("#inputCnpj").attr("type" , "hidden");
    $("#seguraRg").css('display' , 'none');

    $("#titleCnpj").click( function() {

        $("#titleCpf").removeClass('btSelecionado').addClass('btNaoSelecionado');
        $('#auxCad').val(1);
        $("#titleCnpj").addClass('btSelecionado').removeClass('btNaoSelecionado');

        if ( $("#titleCnpj").hasClass('btSelecionado') ) {
            $('#inputCpf').attr('type' , 'hidden');
            $('#inputCnpj').attr('type' , 'text');
            
        }

    });

    $("#titleCpf").click( function() {
        
        $("#titleCnpj").removeClass('btSelecionado').addClass('btNaoSelecionado');
        $("#titleCpf").addClass('btSelecionado').removeClass('btNaoSelecionado');
        $('#auxCad').val(0);
        if ( $("#titleCpf").hasClass('btSelecionado') ) {
            $('#inputCpf').attr('type' , 'text');
            $('#inputCnpj').attr('type' , 'hidden');
        }

    });

    // Campo RG caso pessoa seja Jurídica
    $("#tipoPessoa").change(function() { 
        let recebeVal = $("#tipoPessoa").val();

        if ( recebeVal == 1 ) {
            $("#seguraRg").css('display' , 'none');
            $("#campoRg").attr('type' , 'hidden');
        } else {
            $("#seguraRg").css('display' , 'block');
            $("#campoRg").attr('type' , 'text');
        }
    });

    //Adicionando redirecionamento somente se todos os campos forem preenchidos
    $("#btCadastroFornecedor").click(function(){

        var cont = 0;
        $("#formGravaFornecedor select").each(function(){
            if ( $(this).val() == 0 ) {
                cont++;
            }
        });

        $("#formGravaFornecedor input[type=text]").each(function(){
            if( $(this).val() == "" ) {
                    cont++;
            }
        });

        if(cont == 0){
            $("#formGravaFornecedor").submit();
        } else {
            alert('Por favor, preencha todos os campos!');
        }

    });

    //MASK 
    $("#inputCpf").mask('000.000.000-00');
    $("#inputCnpj").mask('00.000.000/0000-00');
    $("#numeroTelefone").mask('(00) 00000-0000');
    $("#campoRg").mask('999.999.999-A' , {
        translation: {
            'A' : {
                pattern: /[X0-9]/
            }
        },
        reverse: true
    });
    
});
