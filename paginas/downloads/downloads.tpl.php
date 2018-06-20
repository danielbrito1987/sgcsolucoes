<section class="section-internas">

<div class="imagem-internas parallax-window" data-parallax="scroll" data-image-src="<?=$data['path_painel']?>/arquivos/downloads_texto/<?=$data['texto_principal']['imagem_fundo']?>"></div>

<div class="box-titulo-internas">
    <div class="container">
        <h2 class="wow bounceInLeft" data-wow-delay="0.5s">Downloads</h2>
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


                        <div class="panel-group wow fadeInUp" data-wow-delay="0.9s" id="accordion" role="tablist" aria-multiselectable="true">

                        <?php foreach($data['downloads'] as $linha){ ?>


                            <div class="panel ">
                                <div class="panel-heading" role="tab" id="heading<?=$linha['id']?>">
                                    <h3 class="panel-title alert alert-warning">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$linha['id']?>" aria-expanded="false" aria-controls="collapse<?=$linha['id']?>">
                                            <img class="icon-usuario-comentario " style="float: left;margin-right: 3%;margin-top: 8px;margin-left: -2px;" src="<?=$data['path']?>/imagens/downloads.png" alt="">
                                            <h3 style="overflow: hidden !important;color: #101f53;margin-top: 8px;"><strong><?=$linha['nome']?></strong></h3>
                                        </a>
                                    </h3>
                                </div>
                                
                                <div id="collapse<?=$linha['id']?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$linha['id']?>">
                                    <div class="panel-body">

                                        <?php 
                                            
                                            $sql_detalhes_resultados = "SELECT * FROM downloads WHERE tipo='".abs($linha['id'])."' and status!='0'  ORDER BY titulo ASC";
                                            $sql_detalhes_resultados = mysql_query($sql_detalhes_resultados);
                                            while($linha_detalhes_resultados = mysql_fetch_assoc($sql_detalhes_resultados)){ 

                                                $arquivo="painel/arquivos/downloads/".$linha_detalhes_resultados['arquivo']."";
                                        ?>
                                            <a href="<?=$data['path_painel']?>/arquivos/downloads/<?=$linha_detalhes_resultados['arquivo']?>" target="blank" class="reg-downloads">
                                                <img src="<?=$data['path']?>/imagens/download_icon.png" width="30" alt="">
                                                <strong><?=$linha_detalhes_resultados['titulo']?></strong> <span> - <?=tamanho(filesize($arquivo))?></span>
                                            </a><br clear="all">

                                        <?php } ?>

                                        

                                    </div>
                                </div>



                            </div>

                        <?php } ?>

                        </div>


                        <br clear="all">

                        <?=$data['paginacao']?>
        
    </div>
</div>

</section>
