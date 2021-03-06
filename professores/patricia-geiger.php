<?php
	if ($_POST) {
		// Variables
		$professor = $_POST['professor'];
	    $tipo_contato = $_POST['marcar-contato'];
	    $nome = $_POST['nome'];
	    $email = $_POST['email'];
	    $telefone = $_POST['phone'];
	    $data_preferencia = $_POST['date-time'];
	    $local_preferencia = $_POST['place'];
		
		
		// Sender
	    $email_remetente = "contact@trybe41.com";
	    
		// E-mail configs
	    $email_destinatario = "trybe41site@gmail.com"; // Receiver
	    $email_reply = "$email"; 
	    $email_assunto = "Agendamento de $tipo_contato com o professor $professor";
	    
	    // Message Body
	    $email_conteudo = "Tipo de contato: $tipo_contato \n"; 
	    $email_conteudo .= "Nome: $nome \n";
	    $email_conteudo .= "E-mail: $email \n";
	    $email_conteudo .= "Telefone: $telefone \n";
	    $email_conteudo .= "Data/horário de preferência: $data_preferencia \n";
	    $email_conteudo .= "Local/bairro de preferência: $local_preferencia \n";
	    
	    // Setting Headers 
	    $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
	    
	    
	    // Sending e-mail
	    if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ 
			$send = true;
	    }
	}
?>

<DOCTYPE html5>
<html class="no-js" lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<title>Patrícia Geiger | Professores</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

		<!-- Styles -->
		<link href="../dist/css/styles.min.css?v=1" rel="stylesheet" />
	</head>

	<body id="teachers" itemscope itemtype="http://schema.org/WebPage">
		
		<!-- .header -->
		<header class="header" role="banner">

			<!-- .wrapper -->
			<div class="wrapper">
				
				<!-- .header__logo -->
				<div class="header__logo">
					<a title="Ir para a home" href="/">
						<h2 class="header__logotype">Trybe 41</h2>
					</a>
				</div>
				<!-- / .header__logo -->

				<!-- .header__nav -->
				<nav class="header__nav">
					
					<!-- .header__list -->
					<ul class="header__list">
						
						<!-- .header__item -->
						<li class="header__item">
							<a title="Acessar a Home" href="/">Home</a>
						</li>
						<!-- / .header__item -->

						<!-- .header__item -->
						<li class="header__item active">
							<a title="Acessar a página de professores" href="/professores.html">Professores</a>
						</li>
						<!-- / .header__item -->

						<!-- .header__item -->
						<li class="header__item">
							<a title="Conheça os espaços parceiros" href="/spaces.html">Spaces</a>
						</li>
						<!-- / .header__item -->

					</ul>
					<!-- / .header__list -->

				</nav>
				<!-- / .header__nav -->

			</div>
			<!-- / .wrapper -->

		</header>
		<!-- / .header -->



		<!-- .content -->
		<div class="content" role="main">
			
			<!-- .hero -->
			<section class="hero">
				
				<!-- .hero__image -->
				<figure class="hero__image">
					
					<img src="../dist/images/teachers/patricia-geiger.jpg" alt="Conheça nossos professores">

					<span class="hero__more-content"></span>

				</figure>
				<!-- / .hero__image -->

			</section>
			<!-- / .hero -->

			<!-- .about -->
			<section class="about about--teachers">
					
				<!-- .wrapper -->
				<div class="wrapper">
					
					<p class="about__description">
						<span>Patrícia Geiger, Curitiba</span>
						Graduada em letras em inglês, pós-graduada em tradução e ensino de línguas para pessoas com necessidades especiais, blogueira, fotógrafa e escritora: essas são apenas algumas palavras para expressar a Paty. Possui experiência profissional de mais de 10 anos como professora e é especialista em ensino de línguas para testes (Toefl, Cambridge, IELTS , entre outros).
					</p>

				</div>
				<!-- / .wrapper -->

			</section>
			<!-- / .about -->

			<!-- .pricing -->
			<section class="pricing">
				
				<!-- .wrapper -->
				<div class="wrapper">
					
					<!-- .pricing__values -->
					<div class="pricing__item pricing__values">
						<p class="pricing__class-hour">R$ 61,80 hora/aula</p>

						<div class="pricing__plan">
							<h2>Plano mensal</h2>
							<p>1 hora/semana - R$ 247,20</p>
							<p>2 horas/semana - R$ 494,40</p>
						</div>

						<div class="pricing__plan">
							<h2>Plano quadrimestral</h2>
							<p>1 hora/semana - 6x de R$ 196,67</p>
							<p>2 horas/semana - 6x de R$ 393,33</p>
						</div>
					</div>
					<!-- / .pricing__values -->

					<!-- .pricing__coffee -->
					<div class="pricing__item pricing__coffee">
						
						<p class="pricing__coffee__title">O primeiro café para você conhecer o professor é gratuito.</p>
						<a class="pricing__cta [ cta ] [ js-openModal ]" title="Marcar um café com o professor" href="!#">Marcar Café</a>

						<?
							if (isset($send)) {
								echo "<p id='sucesso'>Suas informações foram enviadas com sucesso!</p>";
							}
						?>
						
					</div>
					<!-- / .pricing__coffee -->

				</div>
				<!-- / .wrapper -->

			</section>	
			<!-- .pricing -->

		</div>
		<!-- / .content -->



		<!-- .footer -->
		<footer class="footer [ bg-grey ]">

			<!-- .wrapper -->
			<div class="wrapper">
				
				<!-- .footer__columns -->
				<div class="footer__columns">
					
					<!-- .footer__logo-list -->
					<ul class="footer__logo-list">
						
						<!-- .footer__logo-item -->
						<li class="footer__logo-item">
							<img src="../dist/images/logo-trybe-red.png" alt="Trybe 41">
						</li>
						<!-- / .footer__logo-item -->

						<!-- .footer__logo-item -->
						<li class="footer__logo-item">
							<img src="../dist/images/logo-trybe-yellow.png" alt="Trybe 41">
						</li>
						<!-- / .footer__logo-item -->

						<!-- .footer__logo-item -->
						<li class="footer__logo-item">
							<img src="../dist/images/logo-trybe-green.png" alt="Trybe 41">
						</li>
						<!-- / .footer__logo-item -->

					</ul>
					<!-- / .footer__logo-list -->

				</div>
				<!-- / .footer__columns -->

				<!-- .footer__columns -->
				<div class="footer__columns">
					
					<!-- .footer__about -->
					<div class="footer__about">
						<h1>A Trybe</h1>

						<p>Construímos um novo conceito em aulas particulares de inglês. Utilizamos a personalização das aulas particulares junto ao nosso material didático, sempre atualizado e personalizado para cada aluno! Acreditamos que a experiência e interação são as chaves para um aprendizado efetivo. Para isso, promovemos o seu contato real com o inglês, com pessoas como você.</p>
					</div>
					<!-- / .footer__about -->

				</div>
				<!-- / .footer__columns -->

				<!-- .footer__columns -->
				<div class="footer__columns">
					
					<!-- .footer__contact -->
					<div class="footer__contact">
						<h1>Contato</h1>
						
						<!-- .footer__contact__list -->
						<ul class="footer__contact__list">
							
							<!-- .footer__contact__item -->
							<li class="footer__contact__item">
								<a href="mailto:contact@trybe41.com">contact@trybe41.com</a>
							</li>
							<!-- / .footer__contact__item -->

							<!-- .footer__contact__item -->
							<li class="footer__contact__item">
								<a href="tel:41984804141">(41) 9 8480-4141</a>
							</li>
							<!-- / .footer__contact__item -->
							
							<!-- .footer__contact__item -->
							<li class="footer__contact__item">
								<a title="Acesse o nosso facebook" target="_blank" href="https://www.facebook.com/trybe41/">
									<img src="../dist/images/icons/facebook.svg" alt="Facebook logo">
								</a>
							</li>
							<!-- / .footer__contact__item -->

							<!-- .footer__contact__item -->
							<li class="footer__contact__item">
								<a title="Acesse o nosso instagram" target="_blank" href="instagram.com/trybe41">
									<img src="../dist/images/icons/instagram.svg" alt="Instagram logo">
								</a>
							</li>
							<!-- / .footer__contact__item -->

							<!-- .footer__contact__item -->
							<li class="footer__contact__item">
								<a title="Acesse o nosso issuu" target="_blank" href="issuu.com/trybe41">
									<img src="../dist/images/icons/issuu.svg" alt="Issuu logo">
								</a>
							</li>
							<!-- / .footer__contact__item -->
							
						</ul>
						<!-- / .footer__contact__list -->

					</div>
					<!-- / .footer__contact -->

				</div>
				<!-- / .footer__columns -->

			</div>
			<!-- / .wrapper -->

		</footer>
		<!-- / .footer -->

		<!-- .modal -->
		<div class="modal">
			
			<div class="modal__overlay"></div>
			
			<!-- .modal__content -->
			<div class="modal__content">
				
				<a href="!#" class="modal__close js-closeModal">X</a>

				<!-- .modal__header -->
				<header class="modal__header">
						
					<!-- .wrapper -->
					<div class="wrapper">
						<h2>Marcar café com Patrícia Geiger</h2>
						<p>Antes de escolher um professor, você pode marcar um café com ele tendo a oportunidade de conhecer sua personalidade, alinhar expectativas e tirar dúvidas. Ou, se preferir, pode já marcar sua primeira aula ou um atendimento com um Tryber (profissional exclusivo de atendimento ao aluno trybe).</p>
						<p>Preencha o formulário abaixo e aguarde o nosso contato em até uma semana.</p>
					</div>
					<!-- / .wrapper -->

				</header>
				<!-- / .modal__header -->

				<!-- .modal__section -->
				<section class="modal__section">
					
					<!-- .wrapper -->
					<div class="wrapper">
						
						<!-- .modal__form -->
						<form action="#sucesso" method="POST" class="modal__form">

							<input type="hidden" name="professor" value="Patrícia Geiger">
							
							<!-- .row -->
							<div class="row">

								<!-- .field -->
								<div class="field">
									<h2>O que gostaria de fazer?</h2>
									
									<div class="marcar-contato">
										<div class="marcar-contato__opt">
											<input id="marcar-cafe" name="marcar-contato" type="radio" value="cafe">
											<label for="marcar-cafe">Marcar café</label>
										</div>

										<div class="marcar-contato__opt">
											<input id="marcar-aula" name="marcar-contato" type="radio" value="aula">
											<label for="marcar-aula">Marcar aula</label>
										</div>

										<div class="marcar-contato__opt">
												<input id="marcar-aula" name="marcar-contato" type="radio" value="atendimento">
												<label for="marcar-aula">Marcar um atendimento</label>
											</div>
									</label>
								</div>
								<!-- / .field -->

							</div>
							<!-- / .row -->

							<!-- .row -->
							<div class="row">
								
								<!-- .field -->
								<div class="field">
									<input class="input-info" type="text" name="nome" placeholder="Nome completo" required>
								</div>
								<!-- / .field -->

							</div>
							<!-- / .row -->

							<!-- .row -->
							<div class="row">

								<!-- .field -->
								<div class="field cols">
									<input class="input-info" type="tel" name="phone" placeholder="Telefone" required>
								</div>
								<!-- / .field -->
								
								<!-- .field -->
								<div class="field cols">
									<input class="input-info" type="text" name="email" placeholder="E-mail" required>
								</div>
								<!-- / .field -->
							</div>
							<!-- / .row -->

							<!-- .row -->
							<div class="row">
								<!-- .field -->
								<div class="field cols">
									<input class="input-info" type="text" name="date-time" placeholder="Data/Horário de preferência" required>
								</div>
								<!-- / .field -->
								
								<!-- .field -->
								<div class="field cols">
									<input class="input-info" type="text" name="place" placeholder="Local/Bairro de preferência" required>
								</div>
								<!-- / .field -->

							</div>
							<!-- / .row -->

							<!-- .row -->
							<div class="row">
								
								<!-- .field -->
								<div class="field">
									<input type="submit" value="enviar" class="cta">
								</div>
                                <!-- / .field -->

							</div>
							<!-- / .row -->

						</form>
						<!-- / .modal__form -->
						
					</div>
					<!-- / .wrapper -->

				</section>
				<!-- / .modal__section -->

			</div>
			<!-- / .modal__content -->

		</div>
		<!-- / .modal -->

		<!-- scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="../dist/js/main.min.js"></script>
		<!-- / scripts -->

	</body>
</html>