//search box
$('.search-icon').click(function(){
  $(this).parents('.new-form').find('.search').toggleClass('open');
});

//abas Programação
$(".main>div").hide(); //ultima mudança aqui [ > ]
 $(document).ready(function(){
  $(".main div:nth-child(1)").show();

  $(".item").click(function(){
    var indice = $(this).index();
    indice++;
    $(".main>div").hide(); //e aqui [ > ]
    $(".main div:nth-child("+indice+")").show();
  });
   });

//abas menu options
      $(".wrapper>div").hide();
       $(document).ready(function(){
        $(".wrapper div:nth-child(1)").show();

        $(".opt").click(function(){
          var indice = $(this).index();
          indice++;
          $(".wrapper>div").hide();
          $(".wrapper>div:nth-child("+indice+")").show();
        });
         });



//retorna comandos, sons, eventos selecionado
         $('.conteudo div').click(function(event) { //pega o bloco clicado
             event.stopPropagation();
             var bloco = $(this);
             // $(this).clone().prependTo()
             // alert(bloco);
             var value = $(this).find(":input").val();//o valor do input
             // console.log(value);
             if (value != "") { //confere se foi preenchido
                 // alert(value);
                 var copy = $(bloco).clone();
                 $(copy).find(":input").attr("readonly","true");
                 // $(copy).attr("id", randomId);

                 $(copy).prependTo(".FinalForm");//adiciona a seção ao lado
                 // console.log((copy).attr("id"));
                 $(bloco).find(":input").val('');
             }
             //fazer funçao pros blocos com SELECT
         });
         $(".conteudo div input").click(function(event) {
           event.stopPropagation();
         });


//retorna backgrounds selecionados
             $('.backgrounds div').click(function(){ //ao clicar em um item de plano de fundo
                 var id = $(this).attr('id');
                 // alert(id);

                 $('.modal, .bg-modal').fadeIn(1000); //aparece uma modal confirmando a escolha

                 $('.close').click(function(){
                   $('.modal, .bg-modal').hide(); //ao clicar no botao cancelar fecha a modal
                 });

                 $('.addItem').click(function(){ //clicando no botao sim, fecha a modal e add o item no jogo
                   $('.modal, .bg-modal').hide();
                   //ai adiciona o item selecionado no jogo... COMO eu não sei!!!
                 });

             });

//retorna personagens selecionados

             $('.characters div').click(function(){
                 var id = $(this).attr('id');
                 // alert(id);
             });

//funções
function teste(command, value) {
  console.log("oi");
  for(var i=0; i<=command.length; i++){
    if (command[i] == "turnRight"){
      alert("valor do turnRight: "+value[i]);
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
    for (var i = 0; i <= sequence.length; i++) {
        var equalIndex = sequence[i].indexOf("=");
        value[i] = sequence[i].replace(/([^\d])+/gim, ''); //pega o valor do input
        command[i] = sequence[i].substring(0, equalIndex); //pega o conteudo da string ate "="
        console.log("comando "+i+": "+command[i]);
        console.log("valor "+i+": "+value[i]);
    }
      teste(command, value);
});


// ******************************************
//id aleatório
// var randomId = Math.floor(Date.now() * Math.random()).toString(36); //gera um id aleatória
// ;)