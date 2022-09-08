

<footer>

    <div class="corfoot" style="color: white;
    background-image: linear-gradient(#0C2A43, black);">
        <div class="contact-area" style="text-align: center; color:white;">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="main-title">Entre em cotato conosco</h3>
                    </div>
                    <hr style="width: 130; height:3">
                    <div class="col-md-4 contact-box">
                        <i class="fas fa-phone"></i>
                        <p><span class="contact-title">Ligue para:</span>(47)9999-9999</p>
                        <p><span class="contact-title">Horário de funcionamento:</span> 8:00 - 19:00</p>
                    </div>

                    <div class="col-md-4 contact-box">
                        <i class="fas-fa-envelope"></i>
                        <p><span class="contact-title">Envie-nos um email</span> clawer_automoveis@gmail.com</p>
                    </div>

                    <div class="col-md-4 contact-box">
                        <p><span class="contact-title">Venha tomar um café:</span> Rua XXXX - 1340 </p>
                    </div>
                    <hr style="width:200; height:3">
                    <div class="col-md-6" id="msg-box">
                        <p>Ou nos deixe uma mensagem:</p>
                    </div>
                    <div class="col-md-6" id="contact-form">
                        <form action=""></form>
                        <input type="text" class="form-control" placeholder="Seu nome" name="nome" value="<?php echo $nome ?>">
                        <span class="obrigatorio">*<?php echo $nomeErro ?></span>
                        <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?php echo $email ?>">
                        <span class="obrigatorio">*<?php echo $emailErro ?></span>
                        <br>
                        <textarea class="form-control" rows="3" placeholder="Sua mensagem..." name="mensagem" value="<?php echo $mensagem ?>"> </textarea>
                        <input type="submit" class="main-btn" value="Enviar" style="background-color:#0C2A43; color:white; border-bottom: solid white 2px;
                         width:110px; height: 55px; border-radius:20px; font-size:20px ">
                        <span class="obrigatorio">*<?php echo $mensagemErro ?></span>
                    </div>
                </div>
            </div>



        </div>

        <div id="copy-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>Desenvolvido por <a href="#">Clawer Automóveis</a>&copy; 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


</body>

</html>