<!DOCTYPE html>
<html>
<head>
    <title>Certificate of Participation</title>
    <style>


    body {
        font-family: Arial, sans-serif;
        background-image: url(./images/image.jpg);
        padding: 20px;
      }
      
      .container {
        max-width: 800px;
        height: 850px;
        
        margin: 0 auto;
        background-color: #fff1f1;
        padding: 20px;
        box-shadow: 10px 10px 10px rgba(34, 34, 34, 0.1);
      }
      
      /* Titre */
      .title {
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        text-align: center;
        background-color: rgb(228, 237, 255);
        border-radius: 50px;
        margin-right: 90px;
        margin-left: 90px;
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 20px;
      }
      
      /* Détails du certificat */
      .details {
        margin-bottom: 50px;
      }
      
      .details p {
        margin: 10px 0;
        font-size: 21px;
        text-align: center;
      }
      
      .details .participant,.competition {
        font-family:Arial, Helvetica, sans-serif;
        font-size: 30px;
        font-style:italic;
      }
      
      .details .competition {
        font-style: italic;
      }
      
      /* Signature */
      .signature {
        text-align: center;
      }
      .cong{
        text-align: center;
        font-size: 20px;
        font-style: italic;

      }
      
      .signature p {
        margin: 5px 0;
        font-weight:normal;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
      }
      
      /* Logo */
      .logo {
        text-align: center;
        margin-top : 5px;
        margin-top: 5px;
      }
      
      .logo img {
        width: 150px;
        height: auto;
      }
      .score {
            font-weight: bold;
            color: #aac0ff;
        }
        .footer{
          text-align: center;
          margin-bottom: 5px;
          
        }
        .box{
          border: 3px solid #e0f0f7;
          border-radius: 10%;
          width: 500px;
          height: 300px;
          margin: 0 auto;
          
        }
</style>

<div class="container">
  <div class="logo">
    <img src="./images/logo.png" alt="Logo">
  </div>
  
  <h2 class="title">Certificat de participation</h2><br><br>
  <div class="box">
    <div class="details">
   
      <p>This certificat is presented to <br> <span class="participant">{{ $data['participant']->name }}</span><br> for his  participation in the competition <br> "<span class="competition">{{ $data['competition']->comp_name }}</span>"</p>
          <br>
          <p>With score: <span class="score">{{ $data['score'] }}</span></p> <br>
          <p class="cong">Congratulations! </p>
    </div>
    
  </div>
  
  <div class="signature">
    <p>Signature :</p>
    <p>COMPAPP</p>
    <p>Organisateur de la compétition</p>
  </div>
  <div class="logo">
    <img src="./images/graduated.png" alt="Logo">
  </div>
  <p class='footer'>www.comp_app.com</p>
</div>


