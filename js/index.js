//search box
$('.search-icon').click(function() {
    $(this).parents('.new-form').find('.search').toggleClass('open');
});

//abas Programação
$(".main>div").hide(); //ultima mudança aqui [ > ]
$(document).ready(function() {
    $(".main div:nth-child(1)").show();

    $(".item").click(function() {
        var indice = $(this).index();
        indice++;
        $(".main>div").hide(); //e aqui [ > ]
        $(".main div:nth-child(" + indice + ")").show();
    });
});

//abas menu options
$(".wrapper>div").hide();
$(document).ready(function() {
    $(".wrapper div:nth-child(1)").show();

    $(".opt").click(function() {
        var indice = $(this).index();
        indice++;
        $(".wrapper>div").hide();
        $(".wrapper>div:nth-child(" + indice + ")").show();
    });
});



//retorna comandos, sons, eventos selecionado
$('.conteudo div').click(function(event) { //pega o bloco clicado
    event.stopPropagation();
    var bloco = $(this);

    var value = $(this).find(":input").val(); //o valor do input

    if (value != "") { //confere se foi preenchido
        var copy = $(bloco).clone(); //gera novo id pro clone

        //salva id no nome do input hidden
        document.getElementById('retornaID').value = document.getElementById('retornaID').value + copy.attr("id") + "\n";
        document.getElementById('retornaValores').value = document.getElementById('retornaValores').value + value + "\n";

        var randomId = Math.floor(Date.now() * Math.random()).toString(36); //gera um id aleatória
        $(copy).attr("newid", randomId);

        //funções select
        if (copy.attr("id") == "c-5" || copy.attr("id") == "c-6") {
            //document.getElementById(copy.attr("newid")).innerText = "testando";
            var idselecionado = document.getElementById(copy.attr("id"));
            console.log(idselecionado); //ta pegando o div inteiro

            $(copy).find(":input").attr("readonly", "true");
            //console.log($('option: selected').attr("id"));
            //$(copy).children().children().innerhtml = "testando";
            //console.log($(copy).children().children());

            var textselect = ($('#selectcenario option:selected').val());
            console.log(textselect);

            $(copy).children().children().attr("value", textselect); //coloca text selecionado no value do option
            $(copy).children().children().innerhtml = textselect; //talvez funcione, mas não assim

            /*if ($('input').attr('readonly') == true) {
                console.log($('#selectScenario option: selected').attr("id")); //aqui pegava text selecionado IGNORA NAO FUNCIONA
                console.log("aloha");
            }*/
        }

        $(copy).prependTo(".FinalForm"); //adiciona div no começo do finalForm
        //$(copy).appendTo($(".FinalForm"));

        $(bloco).find(":input").val(''); //zera os valores do clone
    }

    //fazer funçao pros blocos com SELECT

    /*$("#selectScenario").on('change', function() {
            valorselect = $(this).val();
        });

        var value2 = $(this).find(":selected").text();

        if (value2 != "") {
            var copy = $(bloco).clone();

            var idoriginal = $(copy).attr("id");
            $(copy).find(":selected").attr("id", "idoriginal");

            //(copy).attr("newid", "id");
            $(copy).attr("newid", randomId);

            $('option:selected').attr("name");

            document.getElementById('retornaID').value = document.getElementById('retornaID').value + "\n";
            document.getElementById('retornaValores').value = document.getElementById('retornaValores').value + value2 + "\n";

            $(copy).prependTo(".FinalForm"); //adiciona a seção ao lado
            document.getElementById(copy.attr("newid")).innerHTML = "testando";

            //document.getElementById(copy.attr("id")).innerHTML = "<label for='selectScenario'> Selecionar cenário < /label> <select name = 'selectScenario'><option></option>";

            //$(bloco).find(":select").val('');
    }*/

});

$(".conteudo div input").click(function(event) {
    event.stopPropagation();
});


//funções
/*function teste(command, value) {
    console.log("oi");
    for (var i = 0; i <= command.length; i++) {
        if (command[i] == "turnRight") {
            alert("valor do turnRight: " + value[i]);
        }
    }
}

$("form").on("submit", function(event) {
            event.preventDefault();
            var sequence = $(this).serialize(); //atribuindo todos os comandos pra uma string
            sequence = sequence.split("&"); //separando os comandos em um array de string
            console.log("array=" + sequence);

            var command = [];
            var value = [];
            for (var i = 0; i < sequence.length; i++) {
                var equalIndex = sequence[i].indexOf("=");

                console.log("==============");
                console.log(sequence[i].replace(/([^\d])+/gim, ''));
                console.log("==============");
                value.push(sequence[i].replace(/([^\d])+/gim, ''));
                command.push(sequence[i].substring(0, equalIndex));
                //  teste(command, value);
            }
            teste(command, value);

        };*/

//funções Novas com objeto 
//FUNCIONA MAS NÃO DEIXA O PHP TRABALHAR COM O FORM 
/*function commandAction(Comandos) {
    for (var i = 0; i < Comandos.length; i++) {
        const woody = document.querySelector('#ch'); // id do personagem (exemplo)
        const balao = document.querySelector('.speechBallon'); //balao de fala
        var n = Comandos[i].nome.split("_", 3);
        var v = Comandos[i].valor;

        if (n[0] == "opacity" || n[1] == "scale(") {
            woody.style.setProperty(n[0], n[1] + v / 100);
        } else if (n[0] == "Say") {
            balao.style.setProperty("display", "block");
            balao.innerHTML = v;
            console.log("texto=" + v);
            setTimeout(
                function() {
                    balao.style.setProperty("display", "none");
                }, 5000);
        } else if (n[0] == "position") {
            balao.style.setProperty(v, "0px");
            console.log("comando=" + Comandos[i].nome + ":" + Comandos[i].valor);
        } else {
            woody.style.setProperty(n[0], n[1] + v + n[2]);
            console.log("comando=" + Comandos[i].nome + ":" + Comandos[i].valor);
            console.log(n[0], n[1] + v + n[2]);
        }
    }
}

$("form").on("submit", function(event) {
    event.preventDefault();
    var Comandos = []; //array de objetos
    var sequence = $(this).serialize().split("&");
    for (var i = 0; i < sequence.length; i++) {
        var comandoItem = new Object(); // cria objeto
        comandoItem.nome = sequence[i].split("=")[0]; // coloca o atributo de nome no array de objetos comando
        comandoItem.valor = sequence[i].split("=")[1]; // coloca o atributo de valor no array de objetos comando
        Comandos.push(comandoItem); // coloca o item recém preenchido na ultima posição no array de objetos comando
    }
    commandAction(Comandos);
});*/


// ******************************************
//id aleatório
// var randomId = Math.floor(Date.now() * Math.random()).toString(36); //gera um id aleatória
// ;)

// **********************************************
// funções alternativas
// for(var i=0; i < Comandos.length; i++){
//   if (Comandos[i].nome == "turnRight"){
//     console.log("valor do turnRight: "+ Comandos[i].valor);
//     $("#ch").css('transform', 'rotate('+Comandos[i].valor+'deg)');
//   }
//   else if(Comandos[i].nome == "turnLeft"){
//     $("#ch").css('transform', 'rotate(-'+Comandos[i].valor+'deg)');
//   }
//   else if(Comandos[i].nome == "CoordinateX"){
//     console.log("lllllll");
//     $("#ch").css('transform','translateX('+Comandos[i].valor+'px)');
//   }
//   else if(Comandos[i].nome == "CoordinateY"){
//     console.log("lllllll");
//     $("#ch").css('transform','translateY('+Comandos[i].valor+'px)');
//   }
//   else if(Comandos[i].nome == "Say"){
//     $(".speechBallon").show().delay(5000).fadeOut();
//   }
// }