 <!-- Navigation BAR -->
        <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
            <div class="container topnav">       
                <a class="navbar-brand topnav" href="#"><img id="canvasss" src="images/logo.png" alt=""></a>  
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#seconnecter">Se connecter</a>
                        </li>
                        <li>
                            <a href="#inscription">Inscription</a>
                        </li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
 
 <script type="text/css">
       
            .fix{
                width:500px;
              }
              
             .scroll{
                width:30px;
                height:40px;
              }
       
       </script>
 
 <script type="text/javascript">

    var scroll = window.pageYOffset;
    window.onscroll = dynamicScroll(scroll);
 
function dynamicScroll(scroll){
    if(scroll > 1){
        document.getElementById('canvasss').className = 'fix';
    }else if(scroll < 1){
        document.getElementById('canvasss').className = 'scroll';
    }
}
   </script>
   
   