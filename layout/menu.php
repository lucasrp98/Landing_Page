<section>

    <div class="menu">

        <html>

        <head>
            <title>Formulário de contato - Dora ArtBiju</title>
            <meta charset="iso-8859-1">
            <link rel="stylesheet" href="landingpage.css" media="all" />
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        </head>

        <body>
            <h2>Formulário de contato - Dora ArtBiju</h2>
            <form method="post" onsubmit="validaForm(); return false;" class="form">
                <p class="name">
                    <label for="nome" class="lable-inferior">Nome</label>
                    <input type="text" class="intextarea" placeholder="Seu nome" required="required" name="nome" />
                    
                </p>
                <p class="email">
                    <label for="email" class="lable-inferior">E-mail</label>
                    <input type="text" name="email" class="intextarea" placeholder="mail@exemplo.com.br" required="required" />
                </p>
                <p class="telefone">
                <label for="telefone" class="lable-inferior">Telefone</label>
                    <input type="number" name="telefone" class="intextarea" placeholder="(99)999999999" required="required" />
                    
                </p>

                <p>
                    <label for="data" >Data</label>
                    <input type="date" name="data" class="intextarea" value="<?= $dataQuebrada[0]; ?>" />
                </p>

                <p>
                    <label for="hora" class="label-inferior">Hora</label>
                    <input type="time" name="hora" required="required" class="intextarea" value=" <?= $dataQuebrada[1]; ?>" />
                </p>
                <br>
                <textarea name="texto" placeholder="Mensagem" required="required"></textarea>
                <br><br>
                <input type="hidden" name="op" value="salvar">
                <input type="submit" class="enviar" value="Salvar">


            </form>
        </body>

        </html>


    </div>
</section>