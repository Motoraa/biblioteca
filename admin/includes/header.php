 <div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">

                    <a href="dashboard.php"><img src="images/1.png" />
                </a>

            </div>

        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
					<ul id="menu-top" class="nav navbar-nav navbar-right">
					<li><a href="logout.php" >LOG OUT</a><li>
					</ul>
                        <ul id="menu-top" class="nav navbar-nav navbar-left">
                            <li><a href="dashboard.php" class="menu-top-active">DASHBOARD</a></li>
                           
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Elevi <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="adaugareelevi.php">Adaugă elevi</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="elevi.php">Administrează elevi</a></li>
                                </ul>
                            </li>
                            
							<li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Cărți <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="adaugarecarti.php">Adaugă cărți</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="carti.php">Administrează cărți</a></li>
                                </ul>
                            </li>
							
							<li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Împrumuturi <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="imprumuturiret.php">Returnate</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="imprumuturi.php">Nereturnate</a></li>
                                </ul>
                            </li>
							

							<li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Schimba-ti datele <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="changepassword.php">Schimbă-ți parola</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="changeuser.php">Schimbă-ți user-ul</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>