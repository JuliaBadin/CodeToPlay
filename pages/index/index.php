<!DOCTYPE html>
<html lang="pt-br">

<?php
    include "../padroes/header.php";
    include "../login/redirect.php";
  ?>
<body>
    <link rel="stylesheet" href="../../css/index.css">

        <section class="options">
            <div class="opt programation-1">
                <h2>Programação</h2>
            </div>

            <div class="opt background-2">
                <h2>Planos de Fundo</h2>
            </div>

            <div class=" opt characters-3">
                <h2>Personagens</h2>
            </div>

            <div class=" opt sounds-4">
                <h2>Sons</h2>
            </div>
            
        </section>

        <div class="content wrapper">

            <div class="content programation">

                <section class="prog">
                    <div class="options">
                        <div class="item commands">
                            <p> Comandos </p>
                        </div>

                        <div class="item events">
                            <p> Eventos </p>
                        </div>

                        <div class="item sounds">
                            <p> Sons </p>
                        </div>
                    </div>
  
                   <!-- conteudos das abas -->
                   <div class="main">
                        <div class="conteudo">
                          <form action="../../arquivos/sequencia.php" method="get" class="FormCommands">
                            <!-- Comandos -->
                            <div class="Block inputButton" id="c-1">
                              <label for="transform_rotate(_deg)"> Gire / Rotate
                              <input name="transform_rotate(_deg)" id="abc" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                              ° a direita</label>
                            </div>

                            <div class="Block inputButton" id="c-2">
                              <label for="transform_rotate(-_deg)"> Gire
                              <input name="transform_rotate(-_deg)" type="text"onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                              ° a esquerda </label>
                            </div>

                            <div class="Block inputButton" id="c-3">
                              <label for="transform_translateX(_px)"> Ir para X =</label>
                              <input name="transform_translateX(_px)" type="text"onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                              <label for="transform_translateY(_px)"> e Y = </label>
                              <input name="transform_translateY(_px)" type="text"onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>

                            <div class="Block inputButton" id="c-4">
                              <label for="Repeat">Repetir
                              <input name="Repeat" type="text"onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                vezes </label>
                            </div>

                            <div class="Block inputButton" id="c-5">
                                <label for="selectScenario">Selecionar cenário</label>
                                <select id="selectcenario" name="selectScenario">
                                  <?php
                                    echo $ve_scenarios = "SELECT * FROM project_has_scenarios WHERE project_idProject = '{$_SESSION['idProject']}'";
                                    $verifica_scenarios = mysqli_query($connection, $ve_scenarios);
                                    
                                    echo "<option id='selectScenario'></option>"; //primeiro option vazio pro js não clonar sem selecionar
                                    while($fetch_scenarios = mysqli_fetch_array($verifica_scenarios)){
                                      echo "<option id='".$fetch_scenarios['scenarios_NameScenario']."'>".$fetch_scenarios['scenarios_NameScenario']."</option>";
                                    }                                      
                                  ?>
                                </select>
                            </div>

                            <div class="Block inputButton" id="c-6">
                                <label for="selectCharacter">Selecionar personagem</label>
                                <select id="selectCharacter" name="selectCharacter">
                                <?php
                                  echo $ve_characters = "SELECT * FROM project_has_characters WHERE project_idProject = '{$_SESSION['idProject']}'";
                                  $verifica_characters = mysqli_query($connection, $ve_characters);
                                  
                                  echo "<option id='selectScenario'></option>"; //primeiro option vazio pro js não clonar sem selecionar
                                  while($fetch_characters = mysqli_fetch_array($verifica_characters)){
                                    echo "<option id='selectScenario'>".$fetch_characters['characters_NameCharacter']."</option>";
                                      }                                      
                                  ?>
                                </select>
                            </div>

                            <div class="Block inputButton" id="c-7">
                              <label for="Say"> Dizer
                              <input type="text" name="Say" class="textInput">
                              na posição </label>

                              <select name="SelectPositionA">
                              <option value=""></option>
                                <option value="top">Superior </option>
                                <option value="bottom">Inferior </option>
                                <option value="center">Central </option>
                              </select>

                              <select name="SelectPositionB">
                                <option value=""></option>
                                <option value="left">Esquerda</option>
                                <option value="right">Direita </option>
                                <option value="top">Central </option>
                              </select>
                            </div>

                            <div class="Block inputButton" id="c-8">
                              <label for="transform_translateX(_px)_MoveTo"> Mover X = </label>
                              <input name="transform_translateX(_px)_MoveTo" type="text"onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                               <label for="transform_translateY(_px)_MoveTo"> e Y = </label>
                               <input name="transform_translateY(_px)_MoveTo" type="text"onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>

                            <div class="Block inputButton" id="c-9">
                              <label for="transform_translateY(_px)_MoveTo2"> Mover Y = </label>
                              <input name="transform_translateY(_px)_MoveTo2" type="text"onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                              <label for="transform_translateX(_px)_MoveTo2">e X = </label>
                              <input name="transform_translateX(_px)_MoveTo2" type="text"onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>

                            <div class="Block inputButton" id="c-10">
                              <label for="If">Se
                              <input class="increaseWidth" name="If" type="text" placeholder="nº da condição"onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                              faça </label>
                            </div>

                            <div class="Block inputButton" id="c-11">
                              <label for="transform_scale(_)"> Mudar tamanho para </label>
                              <input name="transform_scale(_)" type="text"onkeypress="return event.charCode >= 48 && event.charCode <= 57">%
                            </div>

                            <div class="Block inputButton" id="c-12">
                              <label for="opacity__">Mostrar </label>
                              <input name="opacity__" type="text"onkeypress="return event.charCode >= 48 && event.charCode <= 57">%
                            </div>

                            <div class="Block inputButton" id="c-13">
                               <label for="opacity___2">Esconder </label>
                              <input name="opacity___2" type="text"onkeypress="return event.charCode >= 48 && event.charCode <= 57">%
                            </div>

                          </form>
                        </div>

                        <div class="conteudo">
                            <!-- Eventos-->
                            <form action="../../arquivos/sequencia.php" method="get" class="FormEvents">
                            <div class="Block inputButton" id="e-1">
                              <label for="Wait">Espere
                            <input name="Wait" type="text"onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                             segundos </label>
                            </div>

                            <div class="Block inputButton" id="e-2">
                              <label for="KeyPress">Quando a tecla
                            <input name="KeyPress" type="text">
                             for pressionada </label>
                            </div>

                            <div class="Block inputButton" id="e-3">
                              <p> When start checked </p>
                            </div>

                            <div class="Block inputButton" id="e-4">
                              <label for="selectScenario"> Quando o cenário
                              <select id="selectScenario" name="selectScenario">
                                  <?php
                                    echo $ve_scenarios = "SELECT * FROM project_has_scenarios WHERE project_idProject = '{$_SESSION['idProject']}'";
                                    $verifica_scenarios = mysqli_query($connection, $ve_scenarios);
                                    
                                    echo "<option id='selectScenario'></option>"; //primeiro option vazio pro js não clonar sem selecionar
                                    while($fetch_scenarios = mysqli_fetch_array($verifica_scenarios)){
                                      echo "<option id='selectScenario'>".$fetch_scenarios['scenarios_NameScenario']."</option>";
                                    }                                      
                                  ?>
                                </select>
                            </div>

                            <div class="Block inputButton" id="e-5">
                                <label for="selectCharacter">Quando o personagem n°
                                <input name="selectCharacter" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                 for selecionado </label>
                            </div>
                          </form>
                        </div>

                        <div class="conteudo">
                            <!-- Sons -->
                            <form action="../../arquivos/sequencia.php" method="get" class="FormSounds">
                            <div class="Block inputButton" id="s-1">
                                <label for="selectSound">Tocar a música </label>
                                <select name="selectSound">
                                  <?php
                                    echo $ve_sounds = "SELECT * FROM project_has_sounds WHERE project_idProject = '{$_SESSION['idProject']}'";
                                    $verifica_sounds = mysqli_query($connection, $ve_sounds);
                                    
                                    echo "<option id='selectScenario'></option>"; //primeiro option vazio pro js não clonar sem selecionar
                                    while($fetch_sounds = mysqli_fetch_array($verifica_sounds)){
                                      echo "<option id='selectScenario'>".$fetch_sounds['sounds_NameSound']."</option>";
                                        }                                      
                                    ?>
                                </select>
                            </div>

                            <div class="Block inputButton" id="s-2">
                              <label for="SetVolume">Definir volume em
                            <input name="SetVolume" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                           % </label>
                            </div>

                            <div class="Block inputButton" id="s-3">
                              <label for="modifyVolume">Alterar volume para
                            <input name="modifyVolume" type="text"onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                           % </label>
                            </div>

                          </form>
                        </div>
                    </div>
                </section>
                <section class="game create">
                  <form action="../../arquivos/sequencia.php" method="get" class="FinalForm">  
                      <?php
                        $le_sequencia = "SELECT sequencia, valores_seq FROM project WHERE users_idUser = '{$_SESSION['idUser']}'";
                        $verifica_sequencia = mysqli_query($connection, $le_sequencia);
                        $fetch_sequencia = mysqli_fetch_array($verifica_sequencia);
                        $verifica = mysqli_num_rows($verifica_sequencia);

                        if($verifica > 0){
                          //sequência
                          $array_funcoes = (explode("\n",$fetch_sequencia['sequencia'])); //tira \n
                          $array_funcoes = array_map('trim', $array_funcoes); //tira espaços
                          $array_funcoes = array_filter($array_funcoes); //tira elementos nulo ou vazio

                          //funções
                          $le_funcoes = "SELECT * FROM functions";
                          $verifica_funcoes = mysqli_query($connection, $le_funcoes);
                          $fetch_funcoes = mysqli_fetch_array($verifica_funcoes);

                          while($fetch_funcoes = mysqli_fetch_array($verifica_funcoes)){
                            $array[] = $fetch_funcoes['id_function'];
                            $arraycode[] = $fetch_funcoes['code'];
                          }
                          foreach ($array_funcoes as $i => $value){   
                            foreach ($array as $j => $valorbanco){
                              if($valorbanco == $value){
                                echo ($arraycode[$j]);
                              }
                            }
                          }
                        }
                      ?>                    
                    <input type="hidden" id="retornaID" value="" name="retornaID">
                    <input type="hidden" id="retornaValores" value="" name="retornaValores">

                    <div class="CreateFooter" type="submit">
                      <button type="button" class="edit">
                        <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="-36 0 468 468.43967" width="40px"><path d="m316.1875 284.640625 26.078125-26.078125 47.410156 47.414062-26.074219 26.078126zm0 0" fill="#6fe3ff"/><path d="m363.601562 332.054688-106.691406 106.6875-47.410156-47.417969 4.050781-4.039063 82.9375-82.941406 19.703125-19.699219zm0 0" fill="#f8ec7d"/><path d="m296.488281 304.34375-82.9375 82.941406-.121093-.121094-164.859376.820313c-22.484374.109375-40.796874-18.027344-40.910156-40.511719l-1.441406-299.886718c-.105469-22.484376 18.027344-40.800782 40.511719-40.910157l142.871093-.683593 1.929688.183593.300781 62.160157c.105469 22.480468 18.417969 40.617187 40.898438 40.507812l62.351562-.300781.007813 1.5.800781 193.699219zm0 0" fill="#c8a2c8"/><path d="m295.082031 108.324219v.21875l-62.351562.300781c-22.480469.109375-40.792969-18.027344-40.898438-40.507812l-.300781-62.160157.207031.019531zm0 0" fill="#bcf1f7"/><path d="m209.5 391.324219 47.410156 47.417969-71.121094 23.703124zm0 0" fill="#6fe3ff"/><g fill="#63316d"><path d="m15.503906 380.464844c8.726563 8.6875 20.546875 13.550781 32.863282 13.519531h.234374l153.941407-.769531-22.445313 67.328125c-.71875 2.15625-.15625 4.53125 1.449219 6.140625 1.609375 1.605468 3.984375 2.167968 6.140625 1.449218l71.121094-23.699218c.078125-.027344.148437-.066406.222656-.09375.078125-.027344.175781-.066406.261719-.105469.3125-.132813.613281-.292969.898437-.472656.023438-.015625.042969-.035157.066406-.050781.28125-.191407.542969-.40625.789063-.644532.03125-.03125.070313-.050781.097656-.085937l132.777344-132.765625c2.34375-2.34375 2.34375-6.144532 0-8.484375l-47.417969-47.410157c-2.34375-2.34375-6.144531-2.34375-8.488281 0l-26.066406 26.070313-10.113281 10.113281-.746094-180.5-.007813-1.679687c0-1.601563-.644531-3.140625-1.785156-4.265625l-103.339844-102.132813c-.984375-.96875-2.273437-1.570312-3.648437-1.699219l-2.152344-.1992182c-.191406-.0195313-.378906-.02343755-.585938-.0273438l-142.871093.679688c-25.777344.164062-46.566407 21.15625-46.480469 46.933593l1.441406 299.890625c.027344 12.394532 5.011719 24.261719 13.84375 32.960938zm300.683594-87.339844 38.925781 38.929688-98.203125 98.199218-38.925781-38.929687zm-120.910156 159.832031 16.84375-50.523437 33.683594 33.6875zm146.984375-185.90625 38.933593 38.921875-17.59375 17.59375-38.929687-38.925781zm-61.496094-164.4375-48.066406.230469h-.171875c-19.089844-.023438-34.585938-15.445312-34.699219-34.539062l-.230469-47.882813zm-234.007813-89.9375 138.800782-.664062.273437 56.351562c.148438 25.691407 21.003907 46.449219 46.699219 46.480469h.230469l56.351562-.269531.777344 187.882812-78.714844 78.71875-162.628906.808594h-.175781c-19.101563-.003906-34.609375-15.4375-34.707032-34.539063l-1.445312-299.886718c-.066406-19.160156 15.382812-34.761719 34.539062-34.882813zm0 0"/><path d="m165.539062 221.515625h-20.347656c-3.316406 0-6 2.683594-6 6 0 3.3125 2.683594 6 6 6h20.347656c3.316407 0 6-2.6875 6-6 0-3.316406-2.683593-6-6-6zm0 0"/><path d="m66.75 182.632812h168.941406c3.3125 0 6-2.683593 6-6 0-3.3125-2.6875-6-6-6h-168.941406c-3.3125 0-6 2.6875-6 6 0 3.316407 2.6875 6 6 6zm0 0"/><path d="m66.75 233.515625h52.660156c3.3125 0 6-2.6875 6-6 0-3.316406-2.6875-6-6-6h-52.660156c-3.3125 0-6 2.683594-6 6 0 3.3125 2.6875 6 6 6zm0 0"/></g></svg>
                     </button>
                    
                   <button class="edit" type="submit">
                     <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 512 512" height="40px" viewBox="0 0 512 512" width="40px"><g><g><ellipse cx="254.583" cy="256" fill="#c8a2c8" rx="247.083" ry="248.482"/><path d="m155.432 149.558v214.702c0 20.214 21.822 32.9 39.388 22.899l188.546-107.351c17.75-10.106 17.75-35.691 0-45.797l-188.546-107.351c-17.566-10.002-39.388 2.684-39.388 22.898z" fill="#bcf1f7"/><path d="m256 7.5c-5.718 0-11.386.211-17.008.591 129.308 8.742 231.492 116.384 231.492 247.909s-102.184 239.167-231.492 247.909c5.622.38 11.29.591 17.008.591 137.243 0 248.5-111.257 248.5-248.5s-111.257-248.5-248.5-248.5z" fill="#b18cb1"/></g><g><path d="m510.512 228.242c0-.002 0-.004 0-.006-13.963-129.395-123.593-228.236-254.512-228.236-141.491 0-256 114.497-256 256 0 15.831 1.456 31.684 4.328 47.116.758 4.071 4.671 6.762 8.746 6.001 4.072-.758 6.759-4.673 6.001-8.745-2.704-14.53-4.075-29.459-4.075-44.372 0-132.888 108.112-241 241-241 123.383 0 226.388 92.366 239.598 214.846 0 .002 0 .004.001.006.93 8.622 1.401 17.42 1.401 26.148 0 132.888-108.112 241-241 241-103.501 0-195.28-65.836-228.38-163.824-1.325-3.925-5.582-6.029-9.506-4.705-3.924 1.325-6.031 5.581-4.705 9.506 35.161 104.088 132.651 174.023 242.591 174.023 141.491 0 256-114.497 256-256 0-9.264-.5-18.603-1.488-27.758z"/><path d="m181.819 130.669c3.241 0 6.366.844 9.29 2.509l21.094 12.011c3.6 2.051 8.179.793 10.229-2.807 2.049-3.6.793-8.179-2.807-10.229l-21.094-12.011c-5.14-2.927-10.919-4.474-16.712-4.474-18.685 0-33.887 15.203-33.887 33.89v214.702c0 18.687 15.202 33.89 33.887 33.89 5.795 0 11.574-1.547 16.712-4.474l188.545-107.351c10.709-6.097 17.102-17.094 17.102-29.418 0-12.323-6.394-23.32-17.102-29.415l-137.036-78.022c-3.6-2.049-8.178-.793-10.229 2.807-2.049 3.6-.793 8.179 2.807 10.229l137.037 78.022c5.962 3.395 9.522 9.518 9.522 16.38 0 6.863-3.56 12.987-9.523 16.383l-188.546 107.352c-2.922 1.664-6.047 2.508-9.289 2.508-9.083 0-18.887-7.222-18.887-18.89v-214.702c.001-11.668 9.804-18.89 18.887-18.89z"/></g></g></svg>
                   </button>
                 </div>
                  </form>
                </section>

                <section class="view game">
                  <img src="../../midia/images/others/personagem.png" id="ch">
                </section>

                <section class="code prog">
                  <iframe src="mostra_codigo.php"></iframe>
                </section>

            </div>

            <div class="backgrounds">
                <!--content -->
                <?php
                    $consulta = "SELECT * FROM scenarios ORDER BY name";
                    $res_consulta = mysqli_query($connection, $consulta);
                    $i=0;

                    while ($dados = mysqli_fetch_array($res_consulta)){
                      echo "<div id='" . ++$i . "'> <H2 id='". $dados["name"] ."'>" . $dados["name"] . "</H2><img src = '" . $dados["link"] . "'></div>";
                    }
                ?>
            </div>
            
            <div class="characters backgrouds">
                <!--aproveitei a a classe backgrounds aqui, caso tenha que colocar
                    alguma estilizaçao que nao serve pra essa parte, é só copiar a 5° funçao no js -->

                <?php
                    $consulta = "SELECT * FROM characters ORDER BY name";
                    $res_consulta = mysqli_query($connection, $consulta);
                    $i=0;

                    while ($dados = mysqli_fetch_array($res_consulta)){
                      echo "<div id='" . ++$i . "'> <H2 id='". $dados["name"] ."'>" . $dados["name"] . "</H2><img src = '" . $dados["link"] . "'></div>";
                    }
                ?>
            </div>

            <div class="sounds backgrounds">
                <!--aproveitei a a classe backgrounds aqui, caso tenha que colocar
                    alguma estilizaçao que nao serve pra essa parte, é só copiar a 5° funçao no js -->

                <?php
                    $consulta = "SELECT * FROM sounds ORDER BY name";
                    $res_consulta = mysqli_query($connection, $consulta);
                    $i=0;

                    while ($dados = mysqli_fetch_array($res_consulta)){
                      echo "<div id='" . ++$i . "'> <H2 id='". $dados["name"] ."'>" . $dados["name"] . "</H2><audio controls><source src= '" . $dados["link"] . "' type='audio/mp3'>clique</audio></div>";
                    }
                ?>
            </div>

        </div>

        <!-- Modal -->

        <div class="bg-modal">
        </div>
        <div class="modal">
          <form action="add_scenario.php" method="post">
            <input type="hidden" id="idscenario" name="idscenario" value="">
            <input type="hidden" id="namescenario" name="namescenario" value="">
          </form>
          <form action="add_character.php" method="post">
            <input type="hidden" id="idcharacter" name="idcharacter" value="">
            <input type="hidden" id="namecharacter" name="namecharacter" value="">
          </form>
          <form action="add_sound.php" method="post">
            <input type="hidden" id="idsound" name="idsound" value="">
            <input type="hidden" id="namesound" name="namesound" value="">
          </form>
            <div class="text">
                <h1>Deseja adicionar este item ao seu jogo?</h1>
            </div>
            <div class="buttons">
                <button class="addItem"> SIM
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="19" height="19" x="0" y="0" viewBox="0 0 341.333 341.333" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                  <g xmlns="http://www.w3.org/2000/svg">
                    <g>
                      <path d="M170.667,0C76.41,0,0,76.41,0,170.667s76.41,170.667,170.667,170.667s170.667-76.41,170.667-170.667S264.923,0,170.667,0z     M170.667,298.667c-70.692,0-128-57.308-128-128s57.308-128,128-128s128,57.308,128,128S241.359,298.667,170.667,298.667z" fill="#ad0000" data-original="#000000"/>
                    </g>
                  </g>
                  <g xmlns="http://www.w3.org/2000/svg">
                  </g>
                  <g xmlns="http://www.w3.org/2000/svg">
                  </g>
                  <g xmlns="http://www.w3.org/2000/svg">
                  </g>
                  <g xmlns="http://www.w3.org/2000/svg">
                  </g>
                  <g xmlns="http://www.w3.org/2000/svg">
                  </g>
                  <g xmlns="http://www.w3.org/2000/svg">
                  </g>
                  <g xmlns="http://www.w3.org/2000/svg">
                  </g>
                  <g xmlns="http://www.w3.org/2000/svg">
                  </g>
                  <g xmlns="http://www.w3.org/2000/svg">
                  </g>
                  <g xmlns="http://www.w3.org/2000/svg">
                  </g>
                  <g xmlns="http://www.w3.org/2000/svg">
                  </g>
                  <g xmlns="http://www.w3.org/2000/svg">
                  </g>
                  <g xmlns="http://www.w3.org/2000/svg">
                  </g>
                  <g xmlns="http://www.w3.org/2000/svg">
                  </g>
                  <g xmlns="http://www.w3.org/2000/svg">
                  </g>
                  </g></svg>
                </button>
                <button class="close"> NÃO
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="18" height="18" x="0" y="0" viewBox="0 0 329.26933 329" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g xmlns="http://www.w3.org/2000/svg" fill="#f44336"><path d="m21.339844 329.398438c-5.460938 0-10.925782-2.089844-15.082032-6.25-8.34375-8.339844-8.34375-21.824219 0-30.164063l286.589844-286.59375c8.339844-8.339844 21.824219-8.339844 30.164063 0 8.34375 8.339844 8.34375 21.824219 0 30.164063l-286.589844 286.59375c-4.183594 4.179687-9.621094 6.25-15.082031 6.25zm0 0" fill="#000b73" data-original="#f44336" class=""/><path d="m307.929688 329.398438c-5.460938 0-10.921876-2.089844-15.082032-6.25l-286.589844-286.59375c-8.34375-8.339844-8.34375-21.824219 0-30.164063 8.339844-8.339844 21.820313-8.339844 30.164063 0l286.589844 286.59375c8.34375 8.339844 8.34375 21.824219 0 30.164063-4.160157 4.179687-9.621094 6.25-15.082031 6.25zm0 0" fill="#000b73" data-original="#f44336" class=""/></g></g></svg>
               </button>
            </div>
        </div>

        <?php  "../padroes/footer.php"; ?>

    </section>
    <!--fim do centro (conteudo)!-->

    <script type="text/javascript" src="../../js/index.js"></script>
    <script>
      //retorna backgrounds selecionados
      $('.backgrounds div').click(function() { //ao clicar em um item de plano de fundo

          var idscenario = $(this).attr('id');
          var namescenario = $(this).children().attr('id');

          $('.modal, .bg-modal').fadeIn(1000); //aparece uma modal confirmando a escolha

          $('.close').click(function() {
              $('.modal, .bg-modal').hide(); //ao clicar no botao cancelar fecha a modal
          });

          $('.addItem').click(function() { //clicando no botao sim, fecha a modal e add o item no jogo
              $('.modal, .bg-modal').hide();

              document.getElementById('idscenario').value = idscenario; //coloca id do cenario no input hidden do form do modal
              document.getElementById('namescenario').value = namescenario; //coloca name do cenario no input hidden do form do modal
              
              $.ajax({
                url : 'add_scenario.php',
                type : 'POST',
                data : {'idscenario' : idscenario, 'namescenario' : namescenario},
                
                /*beforeSend : function () {
                  console.log('Carregando...');
                },
                success : function(retorno){
                    console.log(retorno);
                },
                error : function(a,b,c){
                    console.log('Erro: '+a[status]+' '+c);
                }*/
              });
              
          });
      });

      //retorna characters selecionados
      $('.characters div').click(function() { //ao clicar em um item de plano de fundo

        var idcharacter = $(this).attr('id');
        var namecharacter = $(this).children().attr('id');

        $('.modal, .bg-modal').fadeIn(1000); //aparece uma modal confirmando a escolha

        $('.close').click(function() {
            $('.modal, .bg-modal').hide(); //ao clicar no botao cancelar fecha a modal
        });

        $('.addItem').click(function() { //clicando no botao sim, fecha a modal e add o item no jogo
            $('.modal, .bg-modal').hide();

            document.getElementById('idcharacter').value = idcharacter; //coloca id do character no input hidden do form do modal
            document.getElementById('namecharacter').value = namecharacter; //coloca name do cenario no input hidden do form do modal

            $.ajax({
              url : 'add_character.php',
              type : 'POST',
              data : {'idcharacter' : idcharacter, 'namecharacter' : namecharacter}
            });
          });
      });

      //retorna characters selecionados
      $('.sounds div').click(function() { //ao clicar em um item de plano de fundo

        var idsound = $(this).attr('id');
        var namesound = $(this).children().attr('id');

        $('.modal, .bg-modal').fadeIn(1000); //aparece uma modal confirmando a escolha

        $('.close').click(function() {
            $('.modal, .bg-modal').hide(); //ao clicar no botao cancelar fecha a modal
        });

        $('.addItem').click(function() { //clicando no botao sim, fecha a modal e add o item no jogo
            $('.modal, .bg-modal').hide();

            document.getElementById('idsound').value = idsound; //coloca id do sound no input hidden do form do modal
            document.getElementById('namesound').value = namesound; //coloca name do cenario no input hidden do form do modal
            
            $.ajax({
              url : 'add_sound.php',
              type : 'POST',
              data : {'idsound' : idsound, 'namesound' : namesound}
            });
          });
      });
    </script>
    
  
</body>

</html>