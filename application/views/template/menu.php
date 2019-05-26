<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-info">
			<a class="navbar-brand" href="<?php echo site_url('home') ?>">
				<b>Video Soft</b>
			</a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>
		  	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		  		<ul class="navbar-nav mr-auto">
                  <li class="nav-item">
		  				<a class="nav-link" href="<?php echo site_url('Peliculas'); ?>">
		  					<span class="letter-white">Peliculas</span>
		  				</a>
		  			</li>
		  			<li class="nav-item">
		  				<a class="nav-link" href="<?php echo site_url('Usuarios'); ?>">
		  					<span class="letter-white">Usuarios</span>
		  				</a>
		  			</li>
		  		</ul>
		    	<ul class="nav navbar-nav navbar-right">
		      		<li class="nav-link">
                      <a class="nav-link" href="<?php echo site_url('login/logOut'); ?>">Salir</a>
			        </li>
		    	</ul>
		  	</div>
		</nav>
</header>