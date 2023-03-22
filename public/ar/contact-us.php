<!--  Developed by adox solutions {info@adoxsolutions.com} -->
<!DOCTYPE html>
<html>
<title>Suppliers House</title>

  <meta name="description" content="Mall of Mukkam">
  <meta charset="utf-8">
  <meta name="keywords" content="Mall of Mukkam">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images/favicon.png">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/adox-layout.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/contact.css">


  <!--Font-->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>



<!--  header  -->
<?php $page ='home';  include'header.php';?>   



<!--  address  -->
<section class="address py-5 my-lg-4">   
  <div class="container">
    <div class="row">
       
       <div class="col-lg-4 eq">
         <div class="bg">
           <img src="images/con_1.png">
           <h4>راسلنا بالبريد الإلكتروني</h4>
           <p>قل شيئًا لبدء محادثة مباشرة <a>hello@yourdomain.com</a></p>
         </div>
       </div>

       <div class="col-lg-4 eq">
         <div class="bg">
           <img src="images/con_2.png">
           <h4>24/7 دردشة مباشرة</h4>
           <p>نسعى جاهدين للرد على جميع الاستفسارات في غضون 24 ساعة في أيام العمل.</p>
         </div>
       </div>

       <div class="col-lg-4 eq">
         <div class="bg">
           <img src="images/con_3.png">
           <h4>زورنا</h4>
           <p>100 يلو هاوس ، مصنع لوس أنجلوس ، الولايات المتحدة ، 13420.</p>
         </div>
       </div>              

    </div> 
  </div>
</section>



<!--  form  -->
<section class="form pb-5 mb-lg-4">   
  <div class="container">
    <div class="row">
       
       <div class="col-lg-5">
         <div class="bg">
            <h3>على استعداد للبدء؟</h3>
            <form action="/action_page.php">
              <input type="text" id="fname" name="fname" placeholder="أدخل الاسم">
              <input type="text" id="lname" name="lname" placeholder="أدخل البريد الإلكتروني">
              <textarea required="" id="form-input-message" name="message" placeholder="رسالة..." style="height: 200px;"></textarea>
              <input class="btn" type="submit" value="أرسل رسالة">
            </form>            
         </div>
       </div>

       <div class="col-lg-7">
         <h2>تبحث عن فكرة عمل ممتازة؟</h2>
         <p>اتصل بنا أو أطلب الاتصال بنا في أي وقت ، ونسعى للرد على جميع الاستفسارات في غضون 24 ساعة في أيام العمل.</p>
         <a href="" class="btn">احصل على الاتجاهات</a>     
         
         <div class="loc mt-5">
           <div class="icon">
             <img src="images/con_4.png">
           </div>
           <h4>موقع الشركة</h4>
           <p>100 يلو هاوس ، مصنع مينيسوتا ، الولايات المتحدة ، 13420 </p>
         </div>

         <div class="loc mt-4">
           <div class="icon">
             <img src="images/con_1.png">
           </div>
           <h4>عنوان بريد الكتروني</h4>
           <p><a href="">hello@yourdomain.com </a></p>
         </div>         

       </div>             

    </div> 
  </div>
</section>


<!--  map  -->
<section class="map">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14934539.203284675!2d36.04452011827752!3d23.955922838977255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2sin!4v1650433904133!5m2!1sen!2sin" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> 
      </div>         
    </div>
  </div>
</section>


<!--  download  -->
<section class="download pt-5">   
  <div class="container">
    <div class="row pt-md-4">
        <div class="col-lg-12">
          <div class="bg">
          <h2 class="mb-4"> حمل التطبيق  </h2>
          <p>  بعدة نقرات أطلب احتياجاتك في أي وقت و نحن بخدمتك  </p>
          <div class="app_dow">
            <a><img src="images/appstore.png"></a>
            <a><img src="images/playstore.png"></a>
          </div>             
          </div>         
        </div>
    </div> 
  </div>
</section>




<!--  footer  -->
<?php include'footer.php';?>   




<script src="js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>