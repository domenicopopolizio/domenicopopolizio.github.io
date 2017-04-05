<!DOCTYPE html>
<?php
	$json = file_get_contents('proj.json');
?>
<html>
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title> Domenico Popolizio's site </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="jquery-3.1.1.min.js"></script>
		<script src="velocity.min.js"></script>

		<style>
			@font-face {
			  font-family: 'Kraftstoff';
			  src: url("Kraftstoff-Regular.otf");
			}
			
			* {
			   color: white;
			   font-size: 22px;
			   font-family: 'Kraftstoff' !important;
			}
			
			#infotitletext {
				font-size: 32px;
			}
			
			body {
				margin: 0;
				border: 0;
				padding: 0;
				background-color: rgb(43, 42, 40);
			}
			.popup {
				position: fixed;
			}
			canvas {
				position: absolute;
				width: 100%;
				height: 100%;
			}
			.popuptext {
				position: absolute;
				top: 0px;
				left: 0px;
			}
			#pretext {
				top:0px;
				left:0px;
				height: 20%;
			}
			.text {
				position: absolute;
				top: 0%;
				left:6%;
				width: 94%;
				height: 100%;
				overflow-y: scroll;
				overflow-x: hidden;
			}
			.head {
				width: 100%;
				height: 20%;
				left:0px;
				top: 0px;
			}
			
			.info {
				width: 80%;
				height: 75%;
				bottom: 0px;
				left: 0px;
			}
			.close {
				height: 19%;
				bottom: 0px;
				right: 0px;
				
			}
			.head{
					top:-20%;
			}
			.info{
				bottom:-75%;
				left:-80%;
			}
			.close{
				bottom:-19%;
				right:-100%;
			}
			img#gitlogo {
				position: absolute;
			}
			a#gitredirect {
				position: absolute;
				top: 55px;
				right: 130px;
				display: none;
			}
			img#viewmore {
				position: absolute;
				bottom: 15%;
				right: 10%;
				width: 60%;
				display: none;
			}
			#title{
				position: absolute;
				left:1%;
				top: 3%;
				font-size: 50px ;
			}
			#clock {
				position: absolute;
				font-size: 50px;
				top: 42%;
				right: 15%;
			}
			.icon {
				position: absolute;
				width: 53px;
				height: 53px;
				stroke-width: 0;
				stroke: white;
				fill: white;
				bottom: 10px;
				right: 10px;
			}
			
			#infotitle {
				position: absolute;
				top: 17%;
				left: 5%;
				height: 30%;
				overflow-y: hidden;
			}
			.infotext {
				position: absolute;
				left: 5%;
				width: 100%;
				height: 100%;
				
			}
			#infoRedirect {
				position: absolute;
				left: 5%;
				bottom: 3%;
				width: 80%;
			}
			.infoarea {
				position: absolute;
				width: 80%;
				height: 37%;
				top: 46%;
				overflow-y: auto;
				overflow-x: hidden;
			}
			@media (max-width : 750px) {
				img#viewmore{
					display: none;
				}
				#title{
					position: absolute;
					left:1%;
					top: 3%;
					font-size:  45px ;
				}
				#clock {
					position: absolute;
					font-size:  45px;
					top: 42%;
					right: 15%;
				}
		</style>
	</head>
	<body>
		<div class="text">
			<div id="pretext"></div>
			<p>
				<font id="infofont">
					</font></p><p><font id="infofont">Sono Popolizio Domenico, un ragazzo a cui piace programmare.</font></p><font id="infofont">
					<p>Non tendo spesso a pubblicare i miei progetti, ma da qualche tempo a questa
					parte ho deciso di iniziare a farlo, <br>tra i progetti pubblicati ci sono codici scolastici e altri creati indipendentemente.
					</p><p>
					Tutti i questi sono caricati su GitHub, ma elencati in modo
					più dettagliato su questo sito</p><br><br>
					Ecco la lista:
			 	
			 		<span id="pagetext"></span>
					<br>
					Mi potete trovare su github al seguente indirizzo:<br>
					<a href="https://github.com/domenicopopolizio"><font color="white">https://github.com/domenicopopolizio</font></a><br>
					
					<br>E su SoloLearn* al link:<br>
					<a href="https://www.sololearn.com/Profile/829585"><font color="white">https://www.sololearn.com/Profile/829585</font>
					</a><br>
					<br>
					<br>
					<br>
					<p>
					*I progetti pubblicati su SoloLearn <i>non</i> sono presenti in questo sito, eccetto quelli
					presenti anche su GitHub.<br>Per vederli visitare il <a href="https://www.sololearn.com/Profile/829585"><font color="white">mio profilo su SoloLearn</font></a>.
					</p><p>
					<br>
					P.S. I miei progetti non finiscono qui, questi sono solo alcuni, <br>
					ovvero quelli che per un motivo o per l'altro ho voluto pubblicare ;)
					</p>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
			 	</font>
			 <p></p>
		</div>
		
		<img src="viewmore.png" id="viewmore">
		<div class="head popup" style="top: 0px;">
			<canvas class="headcanvas" id="headcanvas" width="1024" height="117.796875">
			</canvas>
			
			<div class="headtext popuptext" id="title"> 
				Domenico Popolizio's Site
			</div>
			<div id="clock"></div>
		</div>
		
		
		<div class="info popup" style="bottom: -353.4px; left: -730.837px;">
			<canvas class="canvas" id="infocanvas" width="819.1875" height="441.75">
			</canvas>
			<div id="infotitle"><font ><p>Risolutore di fisica</p></font></div>
			
			<div class="infotext popuptext" id="infotext">
				
			</div>
			<div id="infoRedirect"><a href="https://domenicopopolizio.github.io/fisicautomatica/">Clicca qui per vedere la pagina!</a></div>
			<a href="https://github.com/domenicopopolizio/domenicopopolizio.github.io" id="git"><img src="gitlogo.png" id="gitlogo" style="position: absolute; top: 22.175px; right: 22.175px; width: 60px;"></a>
			<a href="https://github.com/domenicopopolizio/domenicopopolizio.github.io" id="gitredirect"> Guarda su github</a>
		</div>
		
		<div class="close popup" style="bottom: -19%; right: -111.906%; width: 111.906px;">
			<canvas id="closecanvas" width="111.90625" height="111.90625">
			</canvas>
			
			<div id="closeicon"> 
				<svg>
					<symbol id="icon-close" viewBox="0 0 22 28">
						<title>
							close
						</title>
						<path d="M20.281 20.656c0 0.391-0.156 0.781-0.438 1.062l-2.125 2.125c-0.281 0.281-0.672 0.438-1.062 0.438s-0.781-0.156-1.062-0.438l-4.594-4.594-4.594 4.594c-0.281 0.281-0.672 0.438-1.062 0.438s-0.781-0.156-1.062-0.438l-2.125-2.125c-0.281-0.281-0.438-0.672-0.438-1.062s0.156-0.781 0.438-1.062l4.594-4.594-4.594-4.594c-0.281-0.281-0.438-0.672-0.438-1.062s0.156-0.781 0.438-1.062l2.125-2.125c0.281-0.281 0.672-0.438 1.062-0.438s0.781 0.156 1.062 0.438l4.594 4.594 4.594-4.594c0.281-0.281 0.672-0.438 1.062-0.438s0.781 0.156 1.062 0.438l2.125 2.125c0.281 0.281 0.438 0.672 0.438 1.062s-0.156 0.781-0.438 1.062l-4.594 4.594 4.594 4.594c0.281 0.281 0.438 0.672 0.438 1.062z"></path>
					</symbol>
				</svg>
				<svg class="icon icon-close"><use xlink:href="#icon-close"></use></svg>
			</div>
		</div>
		
		<script>
			var projects = <?php echo $json; ?>;
			function compile_list(key) {
				t = "<li><p>Progetti "+key+":</p><ol>";
					for (var i = 0; i < projects[key].length; i++) {
						t+='<li><p onclick=\"info(projects[\''+key+'\']['+i+']);\"><u>'+projects[key][i].name+'</u></p></li>';
					} 
				t += "</ol></li><br>";
				return t;
			}
			function write_page() {
				keys = Object.keys(projects);
				text = '<ul>'
				for (var i = 0; i < keys.length; i++) {
					text += compile_list(keys[i]);
				}
				text += '</ul>'
				$("#pagetext").append(text);
			}
			function open_info() {
				$(".info").velocity({
					'bottom':"0px",
					'left':"0px",
				});
				$(".close").velocity({
					'bottom':'0px',
					'right':'0px',
				});
			}
			function close_info() {
				$(".close").velocity({
					'bottom':'-19%',
					'right':'-'+$(".close").height()+'%'
				});
				$(".info").velocity(
					{
						'bottom':-(($(window).height()/100)*60)+"px",
						'left':-($('.info').width()-($('.info').height()-(($(window).height()/100)*60)))+"px",
					}, 
					function()
					{
						$("#infotext").html('');
						$('a#git').attr('href', 'https://github.com/domenicopopolizio/domenicopopolizio.github.io');
					}
				);
				
			}
			function info(obj) {
				title = '';
				text = '';
				textRedirect = '';
				
				title += '<font><p id="infotitletext">'+obj.name+'</p></font>';
				
				text += '<font class="infoarea"><p>'+obj.info+'</p></font>';
				text += '<br>';
				if (obj.pagina != obj.github) {
					textRedirect = '<a href="'+obj.pagina+'"><font color="white"><p>Clicca qui per vedere la pagina!<p></font></a>'
				} else {
					textRedirect = '<a href="'+obj.pagina+'"><font color="white"><p>Clicca qui per vedere il codice!<p></font></a>'
				}
				
				$('a#git').attr('href', obj.github);
				$('#infotitle').html(title);
				$("#infotext").html(text);
				$('#infoRedirect').html(textRedirect);
				open_info();
			}
			function updateClock() {
				d = new Date();
				o = d.getHours()+'';
				if (o.length == 1) {
					o = '0'+o;
				}
				else if (o.length == 0) {
					o += '00';
				}
				m = d.getMinutes()+'';
				if (m.length == 1) {
					m = '0'+m;
				}
				else if (o.length == 0) {
					m += '00';
				}
				ora = o+':'+m;
				$('#clock').html(ora);
				requestAnimationFrame(updateClock);
			}
 			$(
				function () {
					write_page();
					requestAnimationFrame(updateClock);
			
					$(".head").css({
						'top':'-20%',
					});
					$(".info").css({
						'bottom':'-75%',
						'left':"-80%",
					});
					$(".close").css({
						'bottom':'-19%',
						'right':'-'+$(".close").height()+'%'
					});
					$(".head").velocity({
						'top':'0px',
					});
					$(".info").velocity({
						'bottom':-(($(window).height()/100)*60)+"px",
						'left':-($('.info').width()-($('.info').height()-(($(window).height()/100)*60)))+"px",
					});
					/*$(".info").velocity({
						'bottom':'0px',
						'left':"0px",
					});
					$(".close").velocity({
						'bottom':'0px',
						'right':'0px',
					});*/
					//$(".info").click(open_info);
					$(".close").click(close_info);
					var generalFillStyle = 'rgb(0,162,232)';// 'rgb(252, 207, 14)'; 
					var firstAdjust = true;
					var generalShadow = '#222222';
					function adjust() {
						var w = $(window).width();
						var h = $(window).height();
						var pw = w/100;
						var ph = h/100;
 
						$(".close").css({"width":$(".close").height()+"px"});
						
						
						$('#headcanvas').attr("width",$(".head").width());
   						$('#headcanvas').attr("height",$(".head").height());
						var headDOM = document.getElementById('headcanvas');
						var head = headDOM.getContext('2d');
						pwh = headDOM.width/100;   //percenteage width headdom
						phh = (headDOM.height-8)/100;  //percentage height headdom
						//head.clearRect(0, 0, headDOM.width, headDOM.height);
						head.fillStyle = generalFillStyle;
						head.beginPath();
						head.moveTo(0, 0);
						head.lineTo(pwh*0, phh*70);
						head.lineTo(pwh*85, phh*100-4);
						head.lineTo(pwh*100, phh*50);
						head.lineTo(pwh*100, phh*0);
						head.closePath();
						head.shadowColor = generalShadow;
					    head.shadowBlur = 12;
					    head.shadowOffsetX = 0;
					    head.shadowOffsetY = 4;
						head.fill();
						
						
						$('#infocanvas').attr("width",$(".info").width());
   						$('#infocanvas').attr("height",$(".info").height());
   						var infoDOM = document.getElementById('infocanvas');
						var info = infoDOM.getContext('2d');
						pwi = infoDOM.width/100;   //percenteage width infodom
						phi = infoDOM.height/100;  //percentage height infodom
						//head.clearRect(0, 0, headDOM.width, headDOM.height);
						info.fillStyle = generalFillStyle;
						info.beginPath();
						info.moveTo(pwi*0, phi*100);
						info.lineTo(pwi*0, phi*10);
						info.lineTo(pwi*100-12, phi*0+12);
						info.lineTo(pwi*87, phi*100);
						
						info.closePath();
						info.shadowColor = generalShadow;
					    info.shadowBlur = 12;
					    info.shadowOffsetX = 4;
					    info.shadowOffsetY = -4;
						info.fill();
						$('#closecanvas').attr("width",$(".close").width());
   						$('#closecanvas').attr("height",$(".close").height());
   						var closeDOM = document.getElementById('closecanvas');
						var close = closeDOM.getContext('2d');
						pwc = closeDOM.width/100;   //percenteage width closedom
						phc = closeDOM.height/100;  //percentage height closedom
						//head.clearRect(0, 0, headDOM.width, headDOM.height);
						close.fillStyle = generalFillStyle;
						close.beginPath();
						close.moveTo(pwc*100, phc*100);
						close.lineTo(pwc*22, phc*100);
						close.lineTo(pwc*39, phc*0);
						close.lineTo(pwc*100, phc*20);
						
						
						close.closePath();
						close.shadowColor = generalShadow;
					    close.shadowBlur = 12;
					    close.shadowOffsetX = -4;
					    close.shadowOffsetY = -4;
						close.fill();
						if (!firstAdjust) {
							$(".close").css(
								{
									'bottom':'-19%',
									'right':'-'+$(".close").height()+'%'
								}
							);
							$(".info").css(
								{
									'bottom':-(($(window).height()/100)*60)+"px",
									'left':-($('.info').width()-($('.info').height()-(($(window).height()/100)*60)))+"px",
								}
							);
				
						}
						firstAdjust = false;
						$('#gitlogo').css( {
							'position':'absolute',
							'top': (($('.info').width()-($('.info').width()-($('.info').height()-(($(window).height()/100)*60))))-64)/2+10+'px',
							'right': (($('.info').width()-($('.info').width()-($('.info').height()-(($(window).height()/100)*60))))-64)/2+12+'px',
							'width' :'60px',
						});
						
					}
					$(window).resize(
						function() {
							adjust();
						}
					);
					adjust(); 
				}
 			);
		</script>
	
</body></html>