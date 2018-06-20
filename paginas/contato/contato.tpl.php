<section class="section-internas">

<div class="imagem-internas parallax-window" data-parallax="scroll" data-image-src="<?=$data['path_painel']?>/arquivos/fale_conosco/<?=$data['contato']['imagem_fundo']?>"></div>

<div class="box-titulo-internas">
    <div class="container">
        <h2 class="wow bounceInLeft" data-wow-delay="0.5s">Contato</h2>
    </div>
</div>

<div class="bg-internas">
    <div class="container wow fadeInUp" data-wow-delay="0.7s">
        <?php if(!empty($data['contato']['texto_principal'])){ ?>
            <center>
                <?=$data['contato']['texto_principal'];?>
            </center>
            <br clear="all">
        <?php } ?>

            <form id="form-contato" method="post" action='<?=$data['path']?>/contato/?enviar=1' enctype="multipart/form-data" class="form-horizontal" style="max-width:700px; margin:0px auto;">

            <div class="form-group">
                <label for="input_nome" class="col-sm-2 hidden-xs control-label">* Assunto</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="input_area" id="input_area" required>
                            <option value="">Escolha um assunto</option>
                            <?php foreach($data['areas'] as $linha){ ?>
                                    <option value="<?=$linha['id']?>"><?=$linha['nome']?></option>
                            <?php } ?>
                        </select>
                    </div>
            </div>

            <div class="form-group">
                <label for="input_nome" class="col-sm-2 hidden-xs control-label">* Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input_nome" name="input_nome" placeholder="Nome" required>
                </div>
            </div>

            <div class="form-group">
                <label for="input_email" class="col-sm-2 hidden-xs control-label">* Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="input_email" name="input_email" placeholder="email" required>
                </div>
            </div>

            <div class="form-group">
                <label for="input_telefone" class="col-sm-2 hidden-xs control-label">* Telefone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control telefone" id="input_telefone" name="input_telefone" placeholder="telefone" style="width:200px;" required>
                </div>
            </div>
    
           
            
            <div class="form-group">
                <label for="input_obs" class="col-sm-2 hidden-xs control-label">* Mensagem</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="input_obs" name="input_obs" rows="7" placeholder="Observações" required></textarea>
                </div>
            </div>


            <center>
                <br clear="all">
                <div class="g-recaptcha" data-sitekey="6LcnBjsUAAAAAB2Auv6fTQDwfRhsxsvI-3Lxw0-z"></div>
                <br clear="all"><br clear="all">
                <button id="btn-contato">
                                            <span>Enviar</span>
                </button>
            </center>


        </form>
    </div>
</div>


</section>


<!-- Mantém preenchido os campos quando o formulário não é enviado -->
<?php if($data['erro'] == 1){ ?>
    
    <script>
        $(function(){
            <?php foreach($_POST as $key=>$linha){ ?>
                $('#form-contato').find('*[name="<?=$key?>"]').val('<?=$linha?>');
            <?php } ?>
        });
    </script>

<?php } ?>


<!-- Google Code for Cota&ccedil;&atilde;o pelo site Conversion Page
<?php if($data['enviou'] == 1){ ?>
	
	<script type="text/javascript">
		/* <![CDATA[ */
		var google_conversion_id = 965883414;
		var google_conversion_language = "en";
		var google_conversion_format = "3";
		var google_conversion_color = "ffffff";
		var google_conversion_label = "slhJCJ-Zk3IQluzIzAM";
		var google_remarketing_only = false;
		/* ]]> */
	</script>
	
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
	
	<noscript>
		<div style="display:inline;">
			<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/965883414/?label=slhJCJ-Zk3IQluzIzAM&amp;guid=ON&amp;script=0"/>
		</div>
	</noscript>
	
<?php } ?> -->

