<!DOCTYPE html>
<html>
<head>
	<title>GateBook</title>
	<style>
		body {
			background-image: url("https://e-file.huawei.com/-/media/EBG/Images/case-study/hk/hkia-departure-b.jpg?la=en-HK&w=100%");
   			height: 400px;
   			width: 100%;
			margin: 0;
			padding: 0;
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}
		.container {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;
		}
		h1 {
			font-size: 3em;
			margin-bottom: 1em;
		}
		
		button {
			padding: 1em 2em;
			border: none;
			border-radius: 5px;
			background-color: #337ab7;
			color: white;
			font-size: 1.2em;
			cursor: pointer;
			margin-bottom: 1em;
		}
		button:hover {
			background-color: #23527c;
		}
		#panneau
{
	width: 600px;
	margin: auto;
	text-align: center;
	padding: 20px;
	border-radius: 2px;

	font-family: BigNoodleTitling;

	background: -webkit-linear-gradient(rgb(69,69,69), rgb(32,32,32));
	background:    -moz-linear-gradient(rgb(69,69,69), rgb(32,32,32));
	background: 	 -o-linear-gradient(rgb(69,69,69), rgb(32,32,32));
	background: 		linear-gradient(rgb(69,69,69), rgb(32,32,32));

	-webkit-box-shadow: 0 0 5px rgba(0,0,0,0.5);
	   -moz-box-shadow: 0 0 5px rgba(0,0,0,0.5);
			box-shadow: 0 0 5px rgba(0,0,0,0.5);
}
#panneau .letter
{
	position: relative;
	display: inline-block;
	margin: 5px;
	width: 50px;
	height: 75px;
	border: 3px solid rgba(0,0,0,0.8);
	border-radius: 5px;

	-webkit-box-shadow: 0 1px 0 rgba(255,255,255,0.15);
	   -moz-box-shadow: 0 1px 0 rgba(255,255,255,0.15);
			box-shadow: 0 1px 0 rgba(255,255,255,0.15);
}
#panneau .letter:before,
#panneau .letter:after{
	content: "";
	position: absolute;
	z-index: 2;
	width: 2px;
	height: 12px;
	top: 50%;
	margin-top: -6px;
	border-radius: 50%;
	border: 1px black solid;

	background: -webkit-linear-gradient(rgb(178,176,177), rgb(7,7,7));
	background:    -moz-linear-gradient(rgb(178,176,177), rgb(7,7,7));
	background: 	 -o-linear-gradient(rgb(178,176,177), rgb(7,7,7));
	background: 		linear-gradient(rgb(178,176,177), rgb(7,7,7));
}

#panneau .letter:before
{
	left:-2px;
}
#panneau .letter:after
{
	right:-2px;
}
#panneau .letter p
{
	position: relative;
	z-index: 0;
	margin: auto;
	height: 70px;
	width: 50px;
	color: #eee;
	padding-top: 5px;
	text-align: center;
	text-transform: uppercase;
	font-size: 60px;
	overflow: hidden;

	background: #323232; /* Old browsers */
	background: -moz-linear-gradient(top,  #323232 0%, #3c3c3c 50%, #464646 51%, #4b4b4b 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#323232), color-stop(50%,#3c3c3c), color-stop(51%,#464646), color-stop(100%,#4b4b4b)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #323232 0%,#3c3c3c 50%,#464646 51%,#4b4b4b 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #323232 0%,#3c3c3c 50%,#464646 51%,#4b4b4b 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #323232 0%,#3c3c3c 50%,#464646 51%,#4b4b4b 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #323232 0%,#3c3c3c 50%,#464646 51%,#4b4b4b 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#323232', endColorstr='#4b4b4b',GradientType=0 ); /* IE6-9 */

	-webkit-box-shadow: 0 -1px 1px rgba(255,255,255,0.5);
	   -moz-box-shadow: 0 -1px 1px rgba(255,255,255,0.5);
			box-shadow: 0 -1px 1px rgba(255,255,255,0.5);
}
#panneau .letter p:after
{
	position: absolute;
	z-index: 1;
	content: "";
	height: 1px;
	width: 50px;
	background-color: rgba(0,0,0,0.55);

	-webkit-box-shadow: 0 1px 0 rgba(255,255,255,0.07);
	   -moz-box-shadow: 0 1px 0 rgba(255,255,255,0.07);
			box-shadow: 0 1px 0 rgba(255,255,255,0.07);
	left: 0;
	top: 50%;
}
strong{
	font-size: 70px;
	color:yellow;
}
	</style>
</head>
<body>
	<div class="container">
			<div id="panneau">
		<p><strong>Book on</strong></p>

		<div class="letter">
			<p>G</p>
		</div><!--
		--><div class="letter">
			<p>A</p>
		</div><!--
		--><div class="letter">
			<p>T</p>
		</div><!--
		--><div class="letter">
			<p>E</p>
		</div><!--
		--><div class="letter">
			<p>B</p>
		</div><!--
		--><div class="letter">
			<p>O</p>
		</div>
		<div class="letter">
			<p>O</p>
		</div>
		<div class="letter">
			<p>K</p>
		</div>
	</div>
		<button onclick="window.location.href='{{ route('depcountry') }}'">Book a Ticket</button>
		<button onclick="window.location.href='{{ route('schedule') }}'">Look for a schedule</button>

	</div>
</body>
</html>
