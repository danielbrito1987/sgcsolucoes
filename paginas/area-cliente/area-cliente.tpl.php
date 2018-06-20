<section class="section-internas">

<div class="imagem-internas parallax-window" data-parallax="scroll" data-image-src="<?=$data['path_painel']?>/arquivos/clientes_texto/<?=$data['texto_principal']['imagem_fundo']?>"></div>

<div class="box-titulo-internas">
    <div class="container">
        <h2>Área do Cliente</h2>
    </div>
</div>

<div class="bg-internas">
    <div class="container">
            <center>
                Em Desenvolvimento!
            </center>
            <br clear="all">

        
        </div>
    </div>
</div>

</section>



<section id="section-parceiros-main">
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-sm-1 col-xs-2 hidden-lg">
                <a href="javascript:;" id="voltar-slick-parceiros-main" onClick="$('#slick-parceiros-main .slick-prev').click();">
                    <img src="<?=$data['path']?>/imagens/seta-voltar.png" alt="Voltar">
                </a>
            </div>

            <div class="col-lg-12 col-md-10 col-sm-10 col-xs-8">
                <div id="slick-parceiros-main">
                    <?php if(count($data['parceiros_home']) > 0){ ?>
                        <?php foreach($data['parceiros_home'] as $linha){ ?>
                            <a href="<?=(!empty($linha['site']) ? $linha['site'] : 'javascript:;')?>" <?php if(!empty($linha['site'])){ ?>target="blank"<?php } ?>>
                                <img src="<?=$data['path_painel']?>/arquivos/parceiros/<?=$linha['arquivo']?>" class="img-responsive" alt="<?=$linha['titulo']?>">
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2 hidden-lg">
                <a href="javascript:;" id="avancar-slick-parceiros-main" onClick="$('#slick-parceiros-main .slick-next').click();">
                    <img src="<?=$data['path']?>/imagens/seta-avancar.png" alt="Avançar">
                </a>
            </div>
        </div>
    </div>
</section>