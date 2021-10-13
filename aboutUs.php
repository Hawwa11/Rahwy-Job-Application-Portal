<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <style>
@import url("https://fonts.googleapis.com/css2?family=Merriweather:wght@900&family=Sumana:wght@700&display=swap");
body {
  align-items: center;
  background-color: #f2f2f2;
  display: flex;
  font-family: "Merriweather", serif;
  flex-wrap: wrap;
  justify-content: center;
  height: 100vh;
  margin: 0;
}
.person {
  align-items: center;
  display: flex;
  flex-direction: column;
  width: 280px;
}
.container {
  border-radius: 50%;
  height: 280px;
  -webkit-tap-highlight-color: transparent;
  transform: scale(0.48);
  transition: transform 250ms cubic-bezier(0.4, 0, 0.2, 1);
  width: 400px;
}
.container:after {
  background-color: #f2f2f2;
  content: "";
  height: 10px;
  position: absolute;
  top: 390px;
  width: 100%;
}
.container:hover {
  transform: scale(0.54);
}
.container-inner {
  clip-path: path(
    "M 390,400 C 390,504.9341 304.9341,590 200,590 95.065898,590 10,504.9341 10,400 V 10 H 200 390 Z"
  );
  position: relative;
  transform-origin: 50%;
  top: -200px;
}
.circle {
  background-color: #fee7d3;
  border-radius: 50%;
  cursor: pointer;
  height: 380px;
  left: 10px;
  pointer-events: none;
  position: absolute;
  top: 210px;
  width: 380px;
}
.img {
  pointer-events: none;
  position: relative;
  transform: translateY(20px) scale(1.15);
  transform-origin: 50% bottom;
  transition: transform 300ms cubic-bezier(0.4, 0, 0.2, 1);
}
.container:hover .img {
  transform: translateY(0) scale(1.2);
}
.img1 {
  left: 22px;
  top: 164px;
  width: 340px;
}
.img2 {
  left: -46px;
  top: 174px;
  width: 444px;
}
.img3 {
  left: -16px;
  top: 144px;
  width: 466px;
}
.divider {
  background-color: #ca6060;
  height: 1px;
  width: 160px;
}
.name {
  color: #404245;
  font-size: 36px;
  font-weight: 600;
  margin-top: 16px;
  text-align: center;
}
.title {
  color: #6e6e6e;
  font-family: arial;
  font-size: 14px;
  font-style: italic;
  margin-top: 4px;
}

.centeralign {
  text-align: center;
}

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  
}

.bn632-hover {
  width: 200px;
  font-size: 16px;
  font-weight: 600;
  color: #fff;
  cursor: pointer;
  margin: 20px;
  height: 55px;
  text-align:center;
  border: none;
  background-size: 300% 100%;
  border-radius: 20px;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn632-hover:hover {
  background-position: 100% 0;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn632-hover:focus {
  outline: none;
}

.bn632-hover.bn27 {
    background-image: linear-gradient(
      to right,
      #ed6ea0,
      #ec8c69,
      #f7186a,
      #fbb03b
    );
    box-shadow: 0 4px 15px 0 rgba(236, 116, 149, 0.75);
  }
</style>

</head>
<body>
<script type="text/javascript">

    function showImage(){
        document.getElementById('mapQr').style.visibility="visible";
    }
    function showImage2(){
        document.getElementById('InfoQr').style.visibility="visible";
    }


</script>

</br>
<div class="person">
      <div class="container">
        <div class="container-inner">
          <img
            class="circle"
            src="teamPic/youssefPic.JPG"
            />
          <img
            class="img img1"
            />
        </div>
      </div>
      <div class="divider"></div>
      <div class="name">Youssef</div>
      <div class="title">Product Manager</div>
    </div>
    <div class="person">
      <div class="container">
        <div class="container-inner">
          <img
            class="circle"
            src="teamPic/abdoPic.JPG"
            />
          <img
            class="img img1"
            />
        </div>
      </div>
      <div class="divider"></div>
      <div class="name">Abdelrahman</div>
      <div class="title">Senior Manager</div>
    </div>
    <div class="person">
      <div class="container">
        <div class="container-inner">
          <img
            class="circle"
            src="teamPic/RolaPic.jpg"
            />
          <img
            class="img img1"
            />
        </div>
      </div>
      <div class="divider"></div>
      <div class="name">Rola</div>
      <div class="title">Marketing Manager</div>
    </div>
    <div class="person">
      <div class="container">
        <div class="container-inner">
          <img
            class="circle"
            src="teamPic/HawaPic.jpg"
            />
          <img
            class="img img1"
            />
        </div>
      </div>
      <div class="divider"></div>
      <div class="name">Hawwa</div>
      <div class="title">Sales Manager</div>
    </div>
    <div class="person">
      <div class="container">
        <div class="container-inner">
          <img
            class="circle"
            src="teamPic/WafiqPic.jpg"
            />
          <img
            class="img img1"
            />
        </div>
      </div>
      <div class="divider"></div>
      <div class="name">Wafiq</div>
      <div class="title">CEO</div>
    </div>
    <div>
      <hr>
<p class="centeralign">Rahwy is a startup tech company lead by inspiring young mind. We have one goal and it is to conqure 
    the tech world.</br> Working with us means that you have entered the Rahwy family. Our brand is not a google knockoff  
we just did not hire a graphic designer yet.</p></br>
<center><img  width="200" 
     height="100" src="RAHWYLogo.png"> </center>
<hr>
    <input type="button" value="Get Map on Phone" onclick="showImage();"class="bn632-hover bn27"/>
    <img id="mapQr"src="images/MapQr.png" style="visibility:hidden" class="center" /></br>

    <input type="button" value="Get Info on Phone" onclick="showImage2();"class="bn632-hover bn27"/></br>
    <img id="InfoQr"src="images/InfoQR.png" style="visibility:hidden"  class="center"/>
    <hr>
</div>

<div>
    
<h2>Contact Us!</h2>
    <p>
        Contact number: +6012342542 </br>
        Fax number: 29423429</br>
        Email: Jobs@rahwy.com</br>
</p>
<p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.792381483236!2d101.70767831399546!3d3.1494020540312344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc362b032b735d%3A0x537402ab17963f86!2s73%2C%20Jalan%20Raja%20Chulan%2C%20Bukit%20Bintang%2C%2050200%20Kuala%20Lumpur%2C%20Wilayah%20Persekutuan%20Kuala%20Lumpur%2C%20Malaysia!5e0!3m2!1sen!2seg!4v1633992219348!5m2!1sen!2seg" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </p>
    </div>
</body>
</html>