<section class="section-internas">

<div class="imagem-internas parallax-window" data-parallax="scroll" data-image-src="<?=$data['path_painel']?>/arquivos/servicos_texto/<?=$data['texto_principal']['imagem_fundo']?>"></div>

    <div class="box-titulo-internas">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2 class="wow bounceInLeft" data-wow-delay="0.5s">Soluções e Serviços</h2>
                </div>

                <div class="col-md-5">
                    <div class="addthis">
                        <div class="addthis_sharing_toolbox"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-titulo-noticias">
        <div class="container">
            <h2 class="wow fadeInUp" data-wow-delay="0.7s" id="titulo-noticia"><?=$data['detalhes']['titulo']?></h2>

            <h4 class="wow fadeInUp" data-wow-delay="0.8s" id="subtitulo-noticia"><?=$data['detalhes']['subtitulo']?></h4>
        </div>
    </div>

    <div class="bg-conteudo-internas">
        <div class="container wow fadeInUp" data-wow-delay="0.9s">
            <?php if(!empty($data['detalhes']['imagem'])){ ?>
                <a href="<?=$data['path_painel']?>/arquivos/servicos/<?=$data['detalhes']['imagem']?>" id="img-detalhe-noticias">
                    <img src="<?=$data['path_painel']?>/arquivos/servicos/<?=$data['detalhes']['imagem']?>" alt="" class="img-responsive">
                </a>
            <?php } ?>
            
            <?=$data['detalhes']['texto']?>

        </div>
    </div>

</section>


<?php if(count($data['servicos_relacionadas']) > 0){ ?>
    <section id="section-outras-noticias">
        <div class="container">
            <h3 class="wow bounceInLeft" data-wow-delay="0.5s" id="titulo-noticias-relacionadas">Outros Serviços</h3>

            <div class="row">
                <?php $d = 6; foreach($data['servicos_relacionadas'] as $linha){ ?>
                    <div class="col-md-3 col-sm-6 col-xs-12" style="padding-right: 8px !important;padding-left: 8px !important;">
                        <article class="reg-servicos-outros wow fadeInUp" data-wow-delay="0.<?=$d?>s">
                            <a href="<?=$data['path']?>/solucoes-e-servicos/<?=$linha['id']?>/<?=url_amigavel($linha['titulo'])?>">
                                    
                                <div class="img-reg-servicos-outros">
                                    <img src="<?=$data['path_painel']?>/arquivos/servicos/<?=$linha['imagem']?>" class="img-responsive" alt="<?=$linha['titulo']?>">
                                    <h1>+</h1>
                                    <h3><?=$linha['titulo']?></h3>
                                    <h2>+</h2>
                                </div>

                            </a>
                        </article>
                    </div>
                <?php $d++; } ?>
            </div>
        </div>
    </section>
<?php } ?>



<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57a0f058db769b85"></script>





