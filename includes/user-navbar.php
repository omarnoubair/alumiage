
   <!-- Navigation BAR -->
        <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
            <div class="container topnav">       
                <a class="navbar-brand topnav" href="<?php echo BASE_URL . '/user/index/0' ?>"><img src="<?php echo IMG ."/logo.png"?>" alt=""></a>  
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                     

    
                    <li class="divider-vertical"></li>
                    <li class=""><a>Bonjour <?php echo ( $this->session->read('user')->pseudo) ?></a></li>
                    <li class=""> <a class="" href="<?php echo BASE_URL . '/user/monEspace/'.$this->session->read('user')->id ?>">Mon Profil</a></li>
                    
                    
                    <li class="divider-vertical"></li>
                    <li class=""> <a class="" href="<?php echo BASE_URL . '/user/logoutAction' ?>">Se déconnecter</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
   
   <script type="text/javascript">
    document.addEventListener("scroll", function() {
    scrollHeight = window.pageYOffset;
    document.getElementsByClassName("navbar navbar-default navbar-fixed-top topnav")[0].style.height = scrollHeight >= 200 ? "20px" : "";
}, false);
   </script>