<header id="header">
  <div class="container-fluid">

    <div class="row lap">

      <div class="col-lg-4">
        <a class="brand" href="index.php"><img src="images/logo.png"></a>       
      </div>

      <div class="col-lg-8">
        <ul class="menu">                              
          <li><a <?php if($page=="company"){?> class="active" <?php }?> href="about-us.php">معلومات عنا</a></li>           
          <li><a <?php if($page=="services"){?> class="active" <?php }?> href="#">عروض</a></li>   
          <li><a <?php if($page=="services"){?> class="active" <?php }?> href="blog.php">مدونة او مذكرة</a></li>   
          <li><a <?php if($page=="services"){?> class="active" <?php }?> href="contact-us.php">اتصل بنا</a></li>   
          <li>
          <div class="dropdown">
            <a href="#"><img src="images/saudi-flag.jpg"> <i class="demo-icon icon-arrow-down-sign-to-navigate">&#xe80a;</i> English</a>
            <div class="dropdown-content">
              <a href="../"><img src="images/saudi-flag.jpg"> English</a>
              <a href=""><img src="images/saudi-flag.jpg"> Arabic</a>
            </div>
          </div> 
          </li>   

        </ul>   
      </div>
     
    </div>

    <div class="row mob">

      <div class="col-sm-4 col-xs-4">
        <a class="brand" href="index.php"><img src="images/logo.png"></a>                    
      </div>

      <div class="col-sm-8 col-xs-8">
        <input id="toggle" type="checkbox"/>
        <label class="hamburger" for="toggle">
          <div class="top"></div>
          <div class="meat"></div>
          <div class="bottom"></div>
        </label>
        <div class="nav">
          <div class="nav-wrapper">
            <nav>
              <a href="index.php">مسكن</a>               
              <a href="about-us.php">معلومات عنا</a>               
              <a href="#">عروض</a>               
              <a href="blog.php">مدونة او مذكرة</a>               
              <a href="contact-us.php">اتصل بنا</a>               
            </nav>
          </div>
        </div>        
      </div>
     
    </div>   

  </div>
</header>