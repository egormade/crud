//Confirma delete
  


/*
function confirmDelete(self) {
    var id = self.getAttribute("data-id");
 
    document.getElementById("form-delete-user").id.value = id;
    $("#myModal").modal("show");
}


Teste que funciona

function confirmacao(id) {
    var resposta = confirm("Deseja remover esse registro?");
    if (resposta == true) {
         window.location.href = "../control/delete.php?id="+id;
    }
}*/

/* Função Estado & Cidade ADD*/

$(function () {
    $("#estados").change(function () {
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "control/exibe_cidade.php?id=" + id,
            dataType: "text",
            success: function (res) {
                $("#cidades").children(".op_cidades").remove();
                $("#cidades").append(res);
            }
        });
    });
});

/* Função Estado & Cidade UPDATE*/

$(function () {
    $("#estados_update").change(function () {
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: "../control/exibe_cidade.php?id=" + id,
            dataType: "text",
            success: function (res) {
                $("#cidades").children(".op_cidades").remove();
                $("#cidades").append(res);
            }
        });
    });
});


/* Máscara Celular */
function mascara(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmascara()", 1)
}
function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}
function mtel(v) {
    v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id(el) {
    return document.getElementById(el);
}
window.onload = function () {
    id('celular').onkeyup = function () {
        mascara(this, mtel);
    }
}

function validacaoEmail(field) {
    usuario = field.value.substring(0, field.value.indexOf("@"));
    dominio = field.value.substring(field.value.indexOf("@") + 1, field.value.length);

    if ((usuario.length >= 1) &&
        (dominio.length >= 3) &&
        (usuario.search("@") == -1) &&
        (dominio.search("@") == -1) &&
        (usuario.search(" ") == -1) &&
        (dominio.search(" ") == -1) &&
        (dominio.search(".") != -1) &&
        (dominio.indexOf(".") >= 1) &&
        (dominio.lastIndexOf(".") < dominio.length - 1)) {
        document.getElementById("msgemail").innerHTML = "E-mail válido";
        alert("E-mail valido");
    }
    else {
        document.getElementById("msgemail").innerHTML = "<font color='red'>E-mail inválido </font>";
        alert("E-mail invalido");
    }
}




