<?php
	class Template{
		public $phpUrl;
		private $html;

		function __construct($phpUrl){
			$this->phpUrl = $phpUrl;

			$this->initHTMLTags();
			$this->createContent();
			$this->closeHTMLTags($phpUrl);
		}

		private function initHTMLTags(){
					$this->html .= "<!Doctype html>
                        <html>
                          <head>
							<title>Guayaba Jam</title>
							<!-- x -->
							<link rel='stylesheet' type='text/css' href='../style/css/style.css'>
							<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,500' rel='stylesheet' type='text/css'>
							<meta charset='UTF-8'>
                          </head>
                          <body class='body-style'>
	                        <nav class='main-nav' >
								<a href='#'>Mi perfil</a>
								<a href='../pages/merch.html'>Comprá</a>
								<a href='../index.html'>Inicio</a>
							</nav>";
		}

		private function closeHTMLTags($phpUrl){
			$this->html .= "<script type='text/javascript' src='../js/main.js'></script><script type='text/javascript'>loadJSON(".$phpUrl.");app.userInfo();</script></body></html>";
		}

		public function createContent(){
			$this->html .= "<section class='profile-container'>
				<div class='profile-details'>
					<img class='user-pic' src='../images/user-icon.png'>
					<div class='profile-info'>
						<h2 id='name'></h2></br>
						<span class='my-band'>Mi banda: <a id='banda-name' href='#'></a></span></br>
						<span class='collection-counter'>5 albums comprados</span><br>
					<div>
					<button class='edit'>Editar perfil</button>
				</div>
			</section>
			<div class='main'>
				<input id='tab1' type='radio' name='tabs' checked>
				<label for='tab1'>Sobre Mi</label>
			
				<input id='tab2' type='radio' name='tabs'>
				<label class='line-div' for='tab2'>Favoritos</label>
			
				<input id='tab3' type='radio' name='tabs'>
				<label for='tab3'>Mis Albums</label>
				<div class='content'>  
					<div id='content1'>
						<div class='aboutme'>
							<p id='user-info' class='user-info'>
							</p>
							<h2>Mantente en contacto</h2>
							<hr>
							<button class='social'> <img src='../images/icons/facebook.png' class='facebook'>Perfil en Facebook </button>
							<button class='social'> <img src='../images/icons/twitter.png' class='twitter'>Perfil en Twitter </button>
						</div>			
					</div>
					<div id='content2'>	
					</div>
					<div id='content3'>
					</div>
				</div>
			</div>";
		}

		public function printPage(){
			echo $this->html;
		}
	}
?>