<section class="section-internas">

<div class="imagem-internas parallax-window" data-parallax="scroll" data-image-src="<?=$data['path_painel']?>/arquivos/clientes_texto/<?=$data['texto_principal']['imagem_fundo']?>"></div>

<div class="box-titulo-internas">
    <div class="container">
        <h2 class="wow bounceInLeft" data-wow-delay="0.5s">Parceiros</h2>
    </div>
</div>

<div class="bg-internas">
    <div class="container">
        <?php if(!empty($data['texto_principal']['texto_principal'])){ ?>
            <center class="wow fadeInUp" data-wow-delay="0.7s">
                <?=$data['texto_principal']['texto_principal'];?>
            </center>
            <br clear="all">
        <?php } ?>

        <div class="row">
            <?php if(count($data['parceiros']) > 0){ ?>
                <?php $C=7; foreach($data['parceiros'] as $linha){ ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <article class="reg-clientes wow rotateIn" data-wow-delay="0.<?=$C?>s">
                            <a href="<?=$linha['link']?>" target="blank">
                                <img src="<?=$data['path_painel']?>/arquivos/clientes/<?=$linha['arquivo']?>" alt="<?=$linha['titulo']?>" class="img-responsive">
                            </a>
                        </article>
                    </div>
                <?php $C++; } ?>
            <?php } ?>

            <br clear="all">

            <?=$data['paginacao']?>
        </div>
    </div>
</div>

</section>

