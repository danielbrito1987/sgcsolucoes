<section class="section-internas">

<div class="imagem-internas parallax-window" data-parallax="scroll" data-image-src="<?=$data['path_painel']?>/arquivos/noticias_texto/<?=$data['texto_principal']['imagem_fundo']?>"></div>

    <div class="box-titulo-internas">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2 class="wow bounceInLeft" data-wow-delay="0.5s">Notícias</h2>
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
            <h4 class="wow fadeInUp" data-wow-delay="0.7s" id="subtitulo-noticia"><?=$data['detalhes']['strData']?></h4>
            <h2 class="wow fadeInUp" data-wow-delay="0.8s" id="titulo-noticia"><?=$data['detalhes']['titulo']?></h2>
            <h4 class="wow fadeInUp" data-wow-delay="0.9s" id="subtitulo-noticia"><?=$data['detalhes']['subtitulo']?></h4>
        </div>
    </div>

    <div class="bg-conteudo-internas">
        <div class="container wow fadeInUp" data-wow-delay="1s">
            
            <!-- ## -->
            <br clear="all">
            <br clear="all">
            <!-- ## -->

            <?php if(!empty($data['detalhes']['imagem'])){ ?>
                <div id="img-detalhe-noticias">
                    <img src="<?=$data['path_painel']?>/arquivos/noticias/<?=$data['detalhes']['imagem']?>" alt="" class="img-responsive">
                </div>
            <?php } ?>
            
            <?=$data['detalhes']['texto']?>

            <!-- ## -->
            <br clear="all">
            <!-- ## -->

            <strong>Fonte: <?=$data['detalhes']['fonte']?></strong>

            <!-- ## -->
            <br clear="all">
            <br clear="all">
            <!-- ## -->



            <?php if (count($data['galeria_fotos']) > 0) { ?>
                <h3 class="wow bounceInLeft" data-wow-delay="0.5s">Imagens da Notícia</h3>
                <div class="demo-gallery">
                    <ul id="lightgallery" class="list-unstyled row">
                        <?php foreach($data['galeria_fotos'] as $linha){ ?>
                            <li class="col-md-3 col-sm-6 col-xs-6 fotos-galeria" data-src="<?=$data['path_painel']?>/arquivos/noticias_fotos/<?=$_GET['id']?>/<?=$linha['imagem']?>" id="foto-<?=$linha['id']?>" data-sub-html="<h4><?=$linha['legenda']?></h4>">
                                <a href="javascript:;" class="reg-fotos hvr-grow" style="border:1px solid #eee; float:left;">
                                    <img class="img-responsive" alt="<?=$linha['legenda']?>" src="<?=$data['path_painel']?>/arquivos/noticias_fotos/<?=$_GET['id']?>/<?=substr($linha['imagem'],0,-4)?>_thumbnail.jpg">
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <br clear="all">
            <br clear="all">
            <?php } ?>




            <?php if(count($data['galeria_videos']) > 0){ ?>
                <h3 class="wow bounceInLeft" data-wow-delay="0.5s">Vídeos da Notícia</h3>
                <div role="tabpanel" class="tab-pane tab-pacotes <?php if(count($data['galeria_fotos']) == 0){ ?>active<?php } ?>" id="tab-videos">
                    <div class="row">
                        <?php foreach($data['galeria_videos'] as $linha){ ?>
                            <div class="col-md-4 videos-galeria">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?=$linha['video']?>"></iframe>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <br clear="all">
            <br clear="all">
            <?php } ?>
        </div>
    </div>
</div>


<?php if(count($data['noticias_relacionadas']) > 0){ ?>
    <section id="section-outras-noticias">
        <div class="container">
            <h3 class="wow bounceInLeft" data-wow-delay="0.5s" id="titulo-noticias-relacionadas">Outras Notícias</h3>

            <div class="row">
                <?php if(count($data['noticias_relacionadas']) > 0){ ?>
                <?php $d = 6; foreach($data['noticias_relacionadas'] as $linha){ 

                    $dia_noticia_outras=date("d", strtotime($linha['data']));
                    $mes_noticia_outras=date("m", strtotime($linha['data']));
                    $ano_noticia_outras=date("Y", strtotime($linha['data']));

                ?>

                    <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px !important;">
                        <article class="reg-noticias-outras wow fadeInUp" data-wow-delay="0.<?=$d?>s">
                            <a href="<?=$data['path']?>/noticias/<?=$linha['id']?>/<?=url_amigavel($linha['titulo'])?>">
                                
                                <div class="img-reg-noticias-outras">
                                    <figure>
                                        <div class="img" style="background-image:url(<?=$data['path_painel']?>/arquivos/noticias/<?=$linha['imagem']?>);"></div>
                                        <img src="<?=$data['path_painel']?>/arquivos/noticias/<?=$linha['imagem']?>" class="img-responsive hidden">
                                        <figcaption></figcaption>
                                    </figure>
                                </div>

                                <div class="conteudo-reg-noticias-outras">
                                    <div class="data-reg-noticias-outras"><?=$dia_noticia_outras?> <?=nome_mes_abreviado($mes_noticia_outras)?> <?=$ano_noticia_outras?>,</div>
                                    <div class="titulo-reg-noticias-outras"><?=$linha['titulo']?></div>
                                    <!--  <div class="chamada-reg-noticias-outras">
                                        <p>
                                            <?php 
                                                if(!empty($linha['subtitulo'])){ 
                                                    echo substr(strip_tags($linha['subtitulo']),0,200);
                                                } else {
                                                    echo substr(strip_tags($linha['texto']),0,200);
                                                }
                                            ?>
                                        </p>
                                    </div> -->
                                    <a href="<?=$data['path']?>/noticias/<?=$linha['id']?>/<?=url_amigavel($linha['titulo'])?>" class="registro-mais-detalhes" style="margin-left: 12px;">
                                        <span>Mais detalhes</span>
                                    </a>
                                </div>

                            </a>
                        </article>
                    </div>

                <?php $d++; } ?>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>


<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57a0f058db769b85"></script>



<link href="<?=$data['path']?>/js/lightgallery/dist/css/lightgallery.css" rel="stylesheet">
<script src="<?=$data['path']?>/js/lightgallery/dist/js/lightgallery-all.min.js"></script>
<script>
$(function(){
    $("#lightgallery").lightGallery();
});
</script>


