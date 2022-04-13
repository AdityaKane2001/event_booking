<?php
session_start();
require_once 'pdo.php';

if(isset($_SESSION['user'])){
  $user=$_SESSION['user'];}

 ?>

<!DOCTYPE html>
<html lang="en"  >
  <head>

</script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style media="screen">
    img {
  max-width: 100%;
  height: 100%  ;
   }

   .center {
     display: block;
     margin-left: auto;
     margin-right: auto;
   }
   html {
zoom:75%

   }

    </style>
<script type="text/javascript">

</script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body style="background-color:#f2f2f2;">

<nav class="navbar navbar-toggleable-md fixed-top navbar-inverse" style="background-color:#0d0d0d;">
  <div class="container">
    <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" style="position:relative;" id="mainNav">
      <div class="navbar-nav">
        <a class="nav-item nav-link " href="#home">Home&nbsp;&nbsp;&nbsp;|</a>
        <a class="nav-item nav-link " href="#eventSchedule">Event Schedule&nbsp;&nbsp;|</a>
        <a class="nav-item nav-link " href="#theArtists">The Artists&nbsp;&nbsp;|</a>
        <a class="nav-item nav-link " href="#location">Event Locations&nbsp;&nbsp;|</a>


        <?php

        if (isset($_SESSION['logged'])){
          echo('  <a class="nav-item nav-link " href="booking.php">Book My Event&nbsp;&nbsp;|</a>');
          echo('<a class="nav-item nav-link " href="mybookings.php">My Boookings&nbsp;&nbsp;|</a>');
          echo('<a class="nav-item nav-link " href="logout.php">Logout</a>');

        echo('<p class="navbar-text" style="color:#cccccc;position: relative;left: 420px;">Welcome ,  '.$user.' </p>');}
          else{
            echo('<a class="nav-item nav-link " href="login.php">Book My Event</a>');


          }
        ?>



      </div>
    </div>
  </div>

</nav>
    <!--header-->
 <div class="jumbotron jumbotron-fluid" align="center" style=" background-image:url('./images/headmic.jpg');background-size: 100% auto; background-repeat:no-repeat" id="home">
     <h1 class="display-3" style="color:#cccccc;"><br>Comedy Festival 2022<br><br></h1>

      <!--famous_quote-->
      <div class="container">

          <h4 class="mb-0 font-weight-bold" align="center" style="font-size:20px;color:#b3b3b3;"> Sometimes crying or laughing are the only options left, and laughing feels better right now. </h4>
          <footer class="blockquote-footer"> <cite>Dr. Veronica Roth, Divergent</cite></footer>

        <br>

           </div>
  </div>


       <div class="container-fluid">
         <?php
         if(isset($_SESSION['success'])) {
           echo("<div class='container' style='text-align:center;'><p class='lead' style='color:#000000;font-size:33px;' ><strong>".$_SESSION['success']."</strong></p></div>");
           unset($_SESSION['success']);
         }
    ?>
         <div class="row">
           <div class="col-md">
              <img src="./images/party.jpg" class="img-responsive">
           </div>


    <div class="col-md">

      <div class="row flex-md">


    <p class="font-weight-normal h4" >


     <a href="http://oml.in/" data-toggle="tooltip" data-placement="top" title="Only Much Louder" target="_blank">OML Entertainment</a> is bringing to you the best comedians around the country to Pune !!
      <br>

     Comedy Festival 2022 features the best comedians who are well known for
     their genres and exquisite performances around the globe.
     <br>


       Mark your calendars as the laughter will begin on 2nd November!<br>
       This time the comedians will be here for <strong>4</strong> full days!! &nbsp;<?php


       if (isset($_SESSION['logged'])){
         echo('  <a class="nav-item nav-link " href="booking.php">Book here now!</a>');
         }
         else{
           echo('<a href="login.php" >Book here now!</a><br>');
         }



        ?>

        </p>
      <br><br><br>


      </div>


      <div class="row">
        <br><br><br>
        <div class="col-md-4">


          <div class="card" style="width: 18rem;">
            <a href="#eventSchedule" >
            <img src="./images/card_mic.jpg" href="#eventSchedule" style="height:270px;"></a>
            <div class="card-body">
              <div class="container" >
                <br>
              <h5 class="card-title">Events</h5>
              <p class="card-text">The four day celebration is the largest comedy event in India and is going be a blast! Click the button below to check out its schedule.</p>
              <a href="#eventSchedule"  class="btn btn-primary">Event Schedule</a>
              <br><br>
            </div>
            </div>
        </div>
        </div>


        <div class="col-md-4" >
        <div class="card" style="width: 18rem;" >
            <a href="#theArtists">
          <img src="./images/zakir2.jpg"   style="height:270px;"></a>
          <div class="card-body">
            <div class="container" >
              <br>
            <h5 class="card-title">Artists</h5>
            <p class="card-text">The artists in this show are the prime comics of India! Click the button below to check out who they are!</p>
            <a href="#theArtists" class="btn btn-primary">The Artists</a>
            <br>
            <br>
          </div>
          </div>
      </div>

      </div>
      <div class="col-md-4">
      <div class="card" style="width: 18rem;">

        <a href="#location" ><img src="./images/card_party.jpg"  style="height:270px;"></a>
        <div class="card-body">
          <br>
          <div class="container" >

          <h5 class="card-title">Location</h5>
          <p class="card-text">The festival is organized at one of the eminent spots in the city,Royal Palms,East Pune.See its location here.</p>
          <a href="#location"  class="btn btn-primary">Royal Palms,East Pune</a>
          <br><br>
        </div>
        </div>
    </div>
     </div>

      </div>
      </div>

    </div>

  </div>
  <br><br>
  <div class="container" align="center">

    <?php if (isset($_SESSION['logged'])){
      echo('   <a href="booking.php" ><button type="button" style="border-radius: 10px;  font-size: 30px; font-family:Helvetica;" >Proceed to booking</button></a></div> ');
      }
      else{
        echo('  <a href="login.php" ><button type="button" style="border-radius: 10px;  font-size: 30px; font-family:Helvetica;" >Proceed to booking</button></a></div>
');
      }
 ?>





<!--Event Schedule-->
<br><br><br>
<img src="./images/mic_icon.png" class="center" id="eventSchedule" style="height:50px">
<br><br><br>
  <div class="container" >
      <h2 class="display-4 text-center py-4 my-4" >
        Event Schedule
      </h2>

     <nav class="nav justify-content-left nav-pills flex-column flex-md-row">
        <a class="nav-link active" href="#first" data-toggle="tab"> 2 November</a>
        <a class="nav-link" href="#second" data-toggle="tab"> 3 November</a>
        <a class="nav-link" href="#third" data-toggle="tab"> 4 November</a>
        <a class="nav-link" href="#fourth" data-toggle="tab"> 5 November</a>
      </nav>

      <div class="tab-content py-5">

        <div class="tab-pane active" id="first" >
          <div class="container-fluid">
          <div class="row">
          <div class="col-md">
          <img src="./images/zakir.jpg" class="img-responsive" style="height:350px"></div><div class="col-md"><img src="./images/biswa.jpg" class="img-responsive" style="height:350px"></div></div>
          <br><br><br>
          <h3  align="center"> Annecdotal Comedy </h3>
          <p class="lead" style="font-size:20px;font-family:Helvetica;">
            On November 2 , we will have two of the India's most loved comedians-Zakir Khan
            and Biswa Kalyan Rath. Zakir Khan will perform some of his bits from his recent amazon special,<i> Haq se single</i> and <i>Kaksha Gyarvi</i> . <br>Biswa will be doing some of his best work from his Amazon special ,<i> Biswa Mast Aadmi.</i><br>
            <br></p></div>

        </div>

          <div class="tab-pane fade" id="second">
            <div class="container-fluid">
            <div class="row">
            <div class="col-md">
            <img src="./images/sapan.jpg" class="img-responsive" align="center" style="height:350px"> </div><div class="col-md justify-center">&nbsp;<img src="./images/kunal.jpg" class="img-responsive" align="center" style="height:350px">  </div>
          </div><br><br><br>
            <h3 align="center"> Observational Comedy </h3>
            <p class="lead" style="font-size:20px;font-family:Helvetica;">

              On November 3 , we will have the comedians that observe more than your neighbourhood Aunty -
              Sapan Verma and Kunal Kamra . Sapan Verma will be performing some of his originals and his favourite bits from his solo special <i> One Sapan a time</i><br>
              Kunal Kamra is one of the comedians who heavily relies on mocking various political parties. He will bring some of his best from his podcast <i> Shut Up Ya Kunal </i><br><br>




            </p>
          </div>
        </div>


            <div class="tab-pane fade" id="third">
              <div class="container-fluid">
              <div class="row">
              <div class="col-md">
              <img src="./images/abish.jpg" class="img-responsive" align="center" style="height:350px"> </div>
              <div class="col-md">
              <img src="./images/kanan.jpg" class="img-responsive" align="center" style="height:350px"> </div>
              <div class="col-md">
              <img src="./images/kaneez.jpg" class="img-responsive" align="center" style="height:350px"> </div>
            </div></div><br><br><br>
              <h3 align="center"> Improv Comedy </h3>
              <p class="lead" style="font-size:20px;font-family:Helvetica;">
                On November 4 , we will have the <i>Improv Squad</i> with us. We have three distinguished comedians from the improv comic scene - Kaneez Surka , Abish Matthew , Kanan Gill .<br>
                They will be part of various improv scenes , each taken from the audience. <i> Prepare to be surprised !!</i><br><br>



              </p>
            </div>

              <div class="tab-pane fade" id="fourth">
                <div class="container-fluid">
                <div class="row">
                  <div class="col-md">
                  <img src="./images/kenny.jpg" class="img-responsive" align="center" style="height:350px"> </div>
                  <div class="col-md">
                  <img src="./images/rahul.png" class="img-responsive" align="center" style="height:350px"> </div>

                </div></div><br><br><br>
                <h3 align="center"> Alternative Comedy </h3>
                <p class="lead" style="font-size:20px;font-family:Helvetica;">
                  On November 5 , we will have Kenny Sebastian and Rahul Subramanian with us. Kenny will be performing some of his bits from <i>Don't be that guy</i> and some of his classics.<br>
                  Rahul will be performing his original,fresh new jokes which are never seen before.<br><br>

                </p>
              </div>
            </div>



  </div>


  <img src="./images/mic_icon.png" class="center" id="theArtists" style="height:50px">
<br><br>
  <!-- The Artists -->

  <h2 class="display-4 text-center py-4 my-4"  >
    The Artists

  </h2>


  <div class="container" >

    <p class="lead"> This is truly a star studded show. The artists are no less than the best of the comic industry. Here's a brief info of them. </p>

    <br><br>

    <h2><strong>Zakir Khan</strong></h2><br>
    <h3>Genre : Anecdotal Comedy </h3>
    <img src="./images/zakir2.jpg" class="center" style="height:600px">
    <p class="lead">Zakir Khan is an Indian stand-up comedian, writer, presenter and actor. In 2012, he rose to popularity by winning Comedy Central's India's 3rd Best Stand Up Comedian competition. He has also been a part of a news comedy show, On Air with AIB. His popular acts are Kaksha Gyarvi and Haq Se Single on Amazon Prime. <a href="https://wikibio.in/zakir-khan/" target="_blank">Read more about Zakir Khan here</a> </p>

    <br><br>

    <h2><strong>Biswa Kalyan Rath</strong></h2><br>
    <h3>Genre : Anecdotal Comedy </h3>
    <img src="./images/biswa2.jpg" class="center" style="height:600px">
    <p class="lead">Biswa Kalyan Rath is an Indian stand-up comedian, writer, and YouTuber. He came into prominence through the YouTube comedy series, Pretentious Movie Reviews with fellow comedian Kanan Gill. He played a minor role in Brahman Naman, and another minor role in the show, Laakhon Mein Ek which he co wrote. <a href="https://insider.in/biswa-kalyan-rath/artist" target="_blank">Read more about Biswa Kalyan Rath here</a> </p>


    <br><br>

    <h2><strong>Sapan Verma</strong></h2><br>
    <h3>Genre : Observational Comedy </h3>
    <img src="./images/sapan2.jpg" class="center" style="height:600px">
    <p class="lead">Sapan Verma is an Indian stand-up comedian, writer, and YouTuber.Sapan has done over 1200 shows not only in India, but also in New York, Melbourne, Tokyo, Paris, Barcelona, Dubai and Singapore. He was also awarded as India’s New Age Most Versatile Comedian 2016 by WCRC.Sapan’s solo comedy special Obsessive Comedic Disorder was India’s first show on Amazon Prime Video. In 2016, he also performed for 80,000 people at the Global Citizen Festival India where he was one of the opening acts for Coldplay and Jay-Z.<a href="https://www.sapanverma.in/profile.html"  target="_blank">Read more about Sapan Verma here</a> </p>

    <br><br>

    <h2><strong>Kunal Kamra</strong></h2><br>
    <h3>Genre : Observational Comedy </h3>
    <img src="./images/kunal2.jpg" class="center" style="height:600px">
    <p class="lead">Kunal Kamra is a comedian who is recognised for his observational comedy and incisive political commentary.e started his eponymous titled web-series Shut Up Ya Kunal in July 2017 along with Ramit Verma. The episodes typically feature a conversation with one or more invited guests, interposed with clips of news segments or debates, edited for humour.<a href="https://wikibio.in/kunal-kamra/" target="_blank">Read more about Kunal Kamra here</a> </p>

    <br><br>

    <h2><strong>Abish Matthew</strong></h2><br>
    <h3>Genre : Improv Comedy </h3>
    <img src="./images/abish2.jpg" class="center" style="height:600px">
    <p class="lead">Abish Mathew is an Indian stand-up comedian and a YouTube performer. He is known for his work with All India Bakchod, as the host of Comicstaan, and is the creator and host of Son of Abish.Abish Mathew was one of the first Indian Youtube stars, who has over 30 million views on his channel. These videos include sketches, stand-up, and of course, his hit talk-show, Son of Abish, which has featured stars like AIB, Vishal Dadlani, Kanan Gill, Badshah, Taapsee Pannu, Cyrus Broacha, and Vir Das.<a href="https://insider.in/abish-mathew/artist" target="_blank">Read more about Abish Matthew here</a> </p>

    <br><br>

    <h2><strong>Kanan Gill</strong></h2><br>
    <h3>Genre : Improv Comedy </h3>
    <img src="./images/kanan2.jpg" class="center" style="height:600px">
    <p class="lead">Kanan Gill is an Indian stand-up comedian, actor and YouTuber. He won the Punch Line Bangalore Competition. He is known for the YouTube series Pretentious Movie Reviews where he reviews flawed yesteryear Bollywood films along with fellow stand-up comedian Biswa Kalyan Rath. He was one of the main personalities behind the YouTube Comedy Hunt and also co-hosted the YouTube FanFest India. In 2017, he had his own one-hour comedy special, Keep It Real.He made his debut on the big screen with the movie Noor, alongside Sonakshi Sinha. In 2018, he was also the judge on Comicstaan, a comedic reality TV show.<a href="https://insider.in/kanan-gill/artist" target="_blank">Read more about Kanan Gill here</a> </p>

    <br><br>

    <h2><strong>Kaneez Surka</strong></h2><br>
    <h3>Genre : Improv Comedy </h3>
    <img src="./images/kaneez2.jpg" class="center" style="height:600px">
    <p class="lead">Kaneez Surka is a South African improv artist, actor, comedian and a YouTuber who works mainly in India. She started her career with the show The Week That Wasn't. She has performed on various stand up platforms. She was a judge for the Amazon Prime stand-up comedy reality show Comicstaan. She also hosts an online comedy game show, The General Fun Game Show on YouTube.he achieved mainstream popularity on the satirical news show The Week That Wasn't on CNN-News18 (formerly CNN-IBN). She also worked with Weirdass Comedy, a Vir Das venture and then began collaborating with and making appearances in several All India Bakchod videos including roles such as Clitika from 'A woman's besties', 'Honest wedding', 'Honest Bars' and the Instagram character from 'If Apps were people'. <a href="https://insider.in/kaneez-surka/artist" target="_blank">Read more about Kaneez Surka here</a> </p>

    <br><br>

    <h2><strong>Kenny Sebastian</strong></h2><br>
    <h3>Genre : Alternative Comedy </h3>
    <img src="./images/kenny2.jpg" class="center" style="height:600px">
    <p class="lead">Kenneth Mathew Sebastian (born 31 December 1990), better known as Kenny Sebastian, is an Indian stand-up comedian, musician and filmmaker.He first rose to prominence through a YouTube channel that broadcasts clips of his stand-up shows, devotional song covers, in addition to original skits, garnering 152 million views since 2008. He has toured the United States, Singapore, Abu Dhabi, Dubai and Australia. In 2017, he produced an hour-long comedy special for Amazon Prime. He performs primarily in English, switching to Hindi for comic effect. <a href="https://www.knowkenny.com/" target="_blank">Read more about Kenny Sebastian here</a> </p>

    <br><br>

    <h2><strong>Rahul Subramanian</strong></h2><br>
    <h3>Genre : Alternative Comedy </h3>
    <img src="./images/rahul2.jpg" class="center" style="height:600px">
    <p class="lead">Rahul Subramanian is a brand-manager-turned-comedian who realized a little too late in life that he was too redundant for the corporate world. Since this realization, he has been a regular at all the leading comedy venues in the country, and is currently touring his one hour solo titled Kal Main Udega. If you are someone who enjoys humour with a message then Rahul's comedy is made just for you, only disclaimer being you've to come up with a message of your own as Rahul has none to offer. This Mumbai-based comedian has been performing since 2014, as he broke into the scene by winning stand up competitions like Virgin Pants and Canvas Laugh Club (All India open-mics) and also the first ever YouTube Comedy Hunt (sketch video competition) along with his friend Kumar Varun for their channel Random Chikibum.<a href="https://www.imdb.com/name/nm9504452/" target="_blank">Read more about Rahul Subramanian here</a> </p>

    <br><br>

  </div>

  <div class="container">

    <img src="./images/mic_icon.png" class="center" id="location" style="height:50px">
  <br><br>

    <h2 class="display-4 text-center py-4 my-4"  >
      Location
    </h2>


    <p class="lead">
      The location for this exhilarating event is none other than <strong><a href="https://www.google.com/maps/@18.5198541,73.7892407,12z" target="_blank">Royal Palms ,East Pune.</a></strong>
      <br>
      Also, don't forget to check out the food at the fest, as there are some surprises you might find.We have arranged for some of the most delicious food for the Puneites' pallete.<br><br>


      <img src="./images/food.jpg" class="center" style="height:600px">


    </p>

  </div>
  <style>
  button {
background-color: #0073e6;
transition-duration: 0.4s;
}

button:hover {

background-color: white;
}
  </style>

<div class="container" align="center">
  <?php if (isset($_SESSION['logged'])){
    echo('   <a href="booking.php" ><button type="button" style="border-radius: 10px;  font-size: 30px; font-family:Helvetica;" >Proceed to booking</button></a></div> ');
    }
    else{
      echo('  <a href="login.php" ><button type="button" style="border-radius: 10px;  font-size: 30px; font-family:Helvetica;" >Proceed to booking</button></a></div>
');
    }
?>  <br><br>
</div>

  <!-- Footer -->
  <footer class="page-footer font-small teal pt-4" style="background-color:black">
    <div class="container-fluid text-center text-md-left">
    <div class="row">
              <div class="col-md mt-md-0 mt-3" align="center">
          <!-- <h5 class="font-weight-normal" style="color:#8c8c8c;">Made with</h5> <h5 style="color:red;">&#10084;</h5><h5 style="color:#8c8c8c;"> by Aditya Kane and Shantanu Deshpande</h5> -->
           <h5 class="font-weight-normal" style="color:#8c8c8c;"> WTL project </h5>
        </div>

        <hr class="clearfix w-100 d-md-none pb-3">
      </div>

    </div>

    <div class="footer-copyright text-center py-3"></div>

</footer>



    <!-- jQuery first, then Tether, then Bootstrap JS.-->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


  </body>


</html>
