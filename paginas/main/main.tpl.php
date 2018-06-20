<!-- Hero section start -->
<section class="hero-section">
	<div class="hero-slider owl-carousel">
		<?php if(count($data['banners_principais']) > 0){ ?>
			<?php foreach($data['banners_principais'] as $linha){ ?>
				<a href="<?=$linha['link']?>" <?php if($linha['nova_janela'] == 1){ ?>target="blank"<?php } ?> class="registro-banner-principal">
					<div class="hs-item set-bg sp-pad" data-setbg="<?=$data['path_painel']?>/arquivos/banners_principais/<?=$linha['arquivo']?>">
						<div class="col-md-6 hs-text">
							<h2 class="hs-title"><?=$linha['titulo']?></h2>
							<span class="hs-des"><?=substr(strip_tags($linha['texto']),0,70)?>...</span>
						</div>						
					</div>
				</a>
			<?php } ?>
		<?php } ?>
	</div>
</section>
<!-- Hero section end -->

<!-- Services section start -->
<section class="services-section spad">
	<div class="container-fluid services-warp">
		<div class="services-text">
			<div class="container p-0">
				<h3 class="sp-title"><?=$data['institucional']['titulo_home']?></h3>
				<p><?=$data['institucional']['texto_home']?></p>
				<a href="<?=$data['path']?>/a-empresa/" class="site-btn">Mais Detalhes</a>
			</div>
		</div>
		<div class="container p-0">
			<div class="row">
				<div class="col-xl-8 offset-xl-4">
					<div class="row">
						<?php if(count($data['servicos']) > 0){ ?>
							<?php $S=5;  foreach($data['servicos'] as $linha){ ?>									
								<div class="col-md-6" style="background-color: #E6E6E6; border: 4px white solid; padding: 7px;">
									<a href="<?=$data['path']?>/solucoes-e-servicos/<?=$linha['id']?>/<?=url_amigavel($linha['titulo'])?>">
										<div class="icon-box">
											<img style="max-width:30%" src="<?=$data['path_painel']?>/arquivos/servicos/<?=$linha['imagem']?>" class="img-responsive" alt="<?=$linha['titulo']?>">
											<h4><?=$linha['titulo']?></h4>
											<p><?=$linha['subtitulo']?></p>
										</div>
									</a>
								</div>
							<?php $S++; } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--<div class="service-more-link">
		<a href="#" class="arrow-btn">
			<i class="fa fa-angle-right"></i>
			<i class="fa fa-angle-right"></i>
			<i class="fa fa-angle-right"></i>
		</a>
	</div>-->
</section>
<!-- Services section start end -->

<!-- Milestones section start -->
<section class="milestones-section" style="padding-bottom: 70px;">
	<div class="container-fluid service-wrap">
		<div class="col-xl-6 intro-text">
			<h3 class="sp-title" style="color: white">Certificações</h3>
		</div>
		<div class="row">
			<?php if(count($data['parceiros_home']) > 0){ ?>
				<?php $C=5; foreach($data['parceiros_home'] as $linha){ ?>				
					<div class="col-md-3">
						<a href="<?=(!empty($linha['site']) ? $linha['site'] : 'javascript:;')?>" <?php if(!empty($linha['site'])){ ?>target="blank"<?php } ?>>
							<img src="<?=$data['path_painel']?>/arquivos/parceiros/<?=$linha['arquivo']?>" class="img-responsive wow rotateIn" data-wow-delay="0.<?=$C?>s" alt="<?=$linha['titulo']?>">
						</a>
					</div>
				<?php $C++; } ?>
			<?php } ?>			
		</div>
	</div>
</section>
<!-- Milestones section end -->


<!-- Intro section start -->
<section class="intro-section sp-pad spad">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-4 intro-text">
				<h3 class="sp-title">Soluções e Serviços</h3>
				<p><?=substr($data['servicos_texto']['texto_home'], 200)?></p>
				<a href="<?=$data['path']?>/solucoes-e-servicos/" class="site-btn">Mais Detalhes</a>
			</div>
			<div class="col-xl-7 offset-xl-1">
				<figure class="intro-img mt-5 mt-xl-0">
					<img src="<?=$data['path_painel']?>/arquivos/servicos_texto/<?=$data['servicos_texto']['imagem_principal']?>" style="width: 90% !important;" class="img-banner img-responsive wow bounceInRight" data-wow-delay="0.5s"> 
				</figure>
			</div>
		</div>
	</div>
</section>
<!-- Intro section end -->


<!-- Portfolio section start -->
<section class="portfolio-section">
	<div class="col-xl-4 intro-text">
		<h3 class="sp-title">Últimas Notícias</h3>
	</div>		
	<div class="portfolio-warp">
		<?php if(count($data['noticias']) > 0){ ?>
			<?php foreach($data['noticias'] as $linha){ ?>			
				<!-- single item -->
				<div class="single-portfolio set-bg" data-setbg="<?=$data['path_painel']?>/arquivos/noticias/<?=$linha['imagem']?>">
					<a href="<?=$data['path']?>/noticias/<?=$linha['id']?>/<?=url_amigavel($linha['titulo'])?>" class="portfolio-info">
						<div class="pfbg set-bg" data-setbg="<?=$data['path_painel']?>/arquivos/noticias/<?=$linha['imagem']?>"></div>
						<h5><?=$linha['titulo']?></h5>
						<p><?=substr(strip_tags($linha['subtitulo']),0,279)?> </p>
					</a>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
	<div class="clearfix"></div>
</section>
<!-- Portfolio section end -->

<!-- Contact section start -->
<section class="contact-section set-bg spad" data-setbg="imagens/contact-bg.jpg">
	<div class="container-fluid contact-warp">
		<div class="contact-text">
			<div class="container p-0">
				<h3 class="sp-title">Fale Conosco</h3>
				<p>Preencha o formulário ao lado e entre em contato conosco.</p>

				<ul class="con-info">
					<li><i class="flaticon-phone-call"></i>27 99999-0342</li>
					<li><i class="flaticon-phone-call"></i>27 3109-0341</li>
					<li><i class="flaticon-envelope"></i>suporte@sgcsolucoes.com.br</li>
				</ul>
			</div>
		</div>
		<div class="container p-0">
				<div class="row">
					<div class="col-xl-8 offset-xl-4">
						<form class="contact-form" id="form-news" method="post" action="<?=$data['path']?>/?acao=news">
							<div class="row">
								<div class="col-md-6">
									<input type="text" placeholder="Nome Completo">
								</div>
								<div class="col-md-6">
									<input type="email" placeholder="E-mail">
								</div>
								<div class="col-md-12">
									<input type="text" placeholder="Assunto">
									<textarea placeholder="Mensagem"></textarea>
									<button class="site-btn light">Enviar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</section>
<!-- Contact section end -->