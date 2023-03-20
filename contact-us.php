<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Contact Us</title>
	<?php include_once("_ext/default_head.php"); ?>
	<link href="_css/p.contact.css" rel="stylesheet">
</head>

<body>
	<?php include_once("_ext/pageloader.php"); ?>
	<?php include_once("_ext/pageloader-starter.php"); ?>
	<div class="navbar navbar-fixed-top" style="position: fixed;">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.php">
					<img src="_img/owlphin_log.png" style="height:30px;" />
					<span></span>
				</a>
				<div class="nav-collapse">
					<ul class="nav pull-right">
						<li><button class="btn btn-inverse" onclick="login()">Sign in</button></li>
						<li><button class="btn btn-inverse" onclick="register()">Join now</button></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="contact-banner">
		<div class="container">
			<div class="row">
				<div class="span12 contact-banner-span">
					<div class="contact-banner-text">
						<p class="contact-banner-text-lg">Contact.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="contact-section">
		<div class="container">
			<div class="row">
				<div class="span12" style="text-align:left;">
					<div class="contact-section-text">
						<p class="contact-section-text-md">We’re Listening</p>
						<p class="contact-section-text-sm">Have questions or ideas? Drop us a line or get in touch with
							support.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="span6">
					<div class="contact-section-text">
						<form action="contact_confirm.php" method="post">
						<div class="field">
							<input type="text" id="fullname" name="fullname" placeholder="Full Name" required />
						</div>
						<div class="field">
							<input type="text" id="email" name="email" placeholder="Email" required />
						</div>
						<div class="field">
							<textarea type="text" id="message" name="message" placeholder="Message" required></textarea>
						</div>
						<div class="field">
							<button type="submit" class="btn btn-inverse btn-large">Submit</button>
						</div>
						</form>
					</div>
				</div>
				<div class="span3">
					<div class="contact-section-text">
						<p class="contact-info-header-text">REACH OUT</p>
						<p class="contact-info-text">Direct Dial: 233-54-911-2267</p>
						<p class="contact-info-text">Toll-Free: 233-20-901-3836</p>
						<p class="contact-info-text">Fax: 233-20-494-4216</p><br />
						<p class="contact-info-text"><a
								href="mailto:chaudharypras434@gmail.com">chaudharypra89@gmail.com</a></p>
					</div>
				</div>
				<div class="span3">
					<div class="contact-section-text">
						<p class="contact-info-text"><b><u>SWING WITH TALENTTAPS</u></b></p>
						<p class="contact-info-text">Hetauda-04, Makawanpur</p>
						<p class="contact-info-text">Province-3, Nepal</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<?php include_once("_ext/footer.php"); ?>
	</div>
	<?php include_once("_ext/default_js.php"); ?>
</body>

</html>