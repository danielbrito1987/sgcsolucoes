<section class="section-internas">

<div class="imagem-internas parallax-window" data-parallax="scroll" data-image-src="<?=$data['path_painel']?>/arquivos/noticias_texto/<?=$data['texto_principal']['imagem_fundo']?>"></div>

<div class="box-titulo-internas">
    <div class="container">
        <h2 class="wow bounceInLeft" data-wow-delay="0.5s">Notícias</h2>
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
            <?php $d = 1; ?>
            <?php if(count($data['noticias']) > 0){ ?>
                <?php $d = 9; foreach($data['noticias'] as $linha){ 

                    $dia_noticia=date("d", strtotime($linha['data']));
                    $mes_noticia=date("m", strtotime($linha['data']));
                    $ano_noticia=date("Y", strtotime($linha['data']));

                ?>

                <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 20px !important;">
                    <article class="reg-noticias wow fadeInUp" data-wow-delay="0.<?=$d?>s">
                        <a href="<?=$data['path']?>/noticias/<?=$linha['id']?>/<?=url_amigavel($linha['titulo'])?>">
                            <div class="conteudo-reg-noticias hidden-xs hidden-sm hidden-sd hidden-md">
                                <div class="data-reg-noticias"><?=$dia_noticia?> <?=nome_mes_abreviado($mes_noticia)?> <?=$ano_noticia?>,</div>
                                <div class="titulo-reg-noticias"><?=$linha['titulo']?></div>
                                <div class="chamada-reg-noticias"><p><?=substr(strip_tags($linha['subtitulo']),0,300)?></p></div>
                                <a href="<?=$data['path']?>/noticias/<?=$linha['id']?>/<?=url_amigavel($linha['titulo'])?>" class="registro-mais-detalhes" style="margin-left: 12px;">
                                    <span>Mais detalhes</span>
                                </a>
                            </div>

                            <div class="img-reg-noticias">
                                <figure>
                                    <div class="img" style="background-image:url(<?=$data['path_painel']?>/arquivos/noticias/<?=$linha['imagem']?>);"></div>
                                    <img src="<?=$data['path_painel']?>/arquivos/noticias/<?=$linha['imagem']?>" class="img-responsive hidden">
                                    <figcaption></figcaption>
                                </figure>
                            </div>

                            <div class="conteudo-reg-noticias hidden-lg">
                                <div class="data-reg-noticias"><?=$dia_noticia?> <?=nome_mes_abreviado($mes_noticia)?> <?=$ano_noticia?>,</div>
                                <div class="titulo-reg-noticias"><?=$linha['titulo']?></div>
                                <div class="chamada-reg-noticias">
                                    <p>
                                        <?php 
                                            if(!empty($linha['subtitulo'])){ 
                                                echo substr(strip_tags($linha['subtitulo']),0,200);
                                            } else {
                                                echo substr(strip_tags($linha['texto']),0,200);
                                            }
                                        ?>
                                    </p>
                                </div>
                                <a href="<?=$data['path']?>/noticias/<?=$linha['id']?>/<?=url_amigavel($linha['titulo'])?>" class="registro-mais-detalhes" style="margin-left: 12px;">
                                    <span>Mais detalhes</span>
                                </a>
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
