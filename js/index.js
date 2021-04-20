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


//retorna comandos, sons, eventos selecionados
         // $(function(){
             $('.conteudo div').click(function(){
                 var id = $(this).attr('id');
                 alert(id);
             }); //pra saber o quê tem que fazer aparecer la na outra aba
         // });

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


//Modal
