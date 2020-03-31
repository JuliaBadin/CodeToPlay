<div id="fundo-modal-registro" class="hide">
    <div class="modal" id="modal-registro">

        <div id="content">
            <h2>Registrar-se</h2>
            <form action="">

                <div class="input-form">
                    <label for="name">Seu nome completo</label>
                    <input name="name" type="text" placeholder="Fulano da Silva">
                </div>

                <div class="input-form">
                    <label for="email">Email</label>
                    <input name="email" type="email" placeholder="exemplo@projeto.com">
                </div>
                
                <div class="input-form">
                    <label for="nickname">Nome de usuário</label>
                    <input name="nickname" type="text" placeholder="Seu_Nome">
                </div>

                <div class="input-form">
                    <label for="password">Senha</label>
                    <input name="password" type="password" placeholder="********">
                </div>

                <div class="input-form">
                    <label for="data_nascimento">Data de nascimento</label>
                    <input name="data_nascimento" type="date" placeholder=" ">
                </div>

                <div class="input-form">
                    <label for="nacionalidade">País de origem</label>
                    <select name=Pais>
                        <?php include("lista-paises.html"); ?>
                    </select>
                </div>
                
                <h6>Já tem uma conta?</h6>
                <button class="button"><a href="./index.php" id="registrar-login">Entrar</a></button>
                <input type="submit" value="Registrar-se" id="submit">

            </form>
        </div>

    </div>
</div>