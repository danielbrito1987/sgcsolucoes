<section class="section-internas">

<div class="imagem-internas parallax-window" data-parallax="scroll" data-image-src="<?=$data['path_painel']?>/arquivos/servicos_texto/<?=$data['texto_principal']['imagem_fundo']?>"></div>

<div class="box-titulo-internas">
    <div class="container">
        <h2 class="wow bounceInLeft" data-wow-delay="0.5s">Soluções e Serviços</h2>
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
            <?php ?>
            <?php if(count($data['servicos']) > 0){ ?>
                <?php $d = 9; foreach($data['servicos'] as $linha){ ?>
                    <div class="col-md-3 col-sm-6 col-xs-12" style="padding-right: 5px !important;padding-left: 5px !important;">
                        <article class="reg-servicos wow fadeInUp" data-wow-delay="0.<?=$d?>s">
                            <a href="<?=$data['path']?>/solucoes-e-servicos/<?=$linha['id']?>/<?=url_amigavel($linha['titulo'])?>">
                                    
                                <div class="img-reg-servicos">
                                    <img src="<?=$data['path_painel']?>/arquivos/servicos/<?=$linha['imagem']?>" class="img-responsive" alt="<?=$linha['titulo']?>">
                                    <h1>+</h1>
                                    <h3><?=$linha['titulo']?></h3>
                                    <h2>+</h2>
                                    <div class="dados-reg-servicos">
                                        <p><?=substr(strip_tags($linha['subtitulo']),0,200)?>...</p>
                                    </div>
                                </div>

                            </a>
                        </article>
                    </div>
                <?php $d++; } ?>
            <?php } ?>

            <br clear="all">

            <?=$data['paginacao']?>
        </div>
    </div>
</div>

</section>
