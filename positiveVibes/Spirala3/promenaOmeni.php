<?php
include('header.php');

//dodati da se kupi slika i tekst iz omeni.xml
$podaci = simplexml_load_file("omeni.xml");

$srcSlike = $podaci->cont[0]->slikaLoc;
$tekst = $podaci->cont[0]->tekst;
print"
<div class='col-10'>
      <div id='editi' class='col-10'>
      <table>
      	<TR>
          <form id='OmeniForma'  action='promenaOmeni.php' method='post' >
          <TD>    <img id='oNama' name='imgs' src='".(string)$srcSlike."' alt='Stay positive!'> </TD>
              <TD>  <form action='promenaOmeni.php' method='POST' enctype='multipart/form-data'>
                <input type='file' name='fileToUpload' id='fileToUpload' class='btnA'></TD>
              <TD>  <input type='submit' value='Promijeni sliku' name='submit' class='btnA'> </TD>
							<!--</div>-->
              <TD><textarea rows='25' cols='50' name='postOM' class='textstil' id='postOM' tabindex='2' placeholder='Napiši post...'>".(string)$tekst."</textarea> </TD>
             <TD>  <input type='submit' form='OmeniForma' name='spasi' value='Spasi promijene' class='btnA' tabindex='3'> </TD>
          </form>
        </TR>
      </table>
      </div>
</div>
<!-- Slika da se moze X
    i tab da se moze tekst napisati
 -->
 <div class='col-2'>
 </div>";

  $promjena=0;
  $target_dir = "img/";
  $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "File nije slika- ".$check["mime"].".";
          $uploadOk = 1;
      } else {
          echo "File nije slika.";
          $uploadOk = 0;
      }
  }
  if (file_exists($target_file)) {
      echo "Fajl već postoji.";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Žao nam je, fajl je prevelik.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"  && $imageFileType != "gif" ) {
      echo "Dozvoljeni su samo JPG, JPEG, PNG & GIF fajlovi.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Žao nam je, vaš fajl nije snimljen.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "Fajl ". basename( $_FILES["fileToUpload"]["name"]). " je snimljen.";
          $promjena=1;

      } else {
          echo "Žao nam je, došlo je do greške prilikom snimanja fajla.";
      }
  }

  if(isset($_REQUEST["spasi"])){

    $xml = new SimpleXMLElement("<omeni/>");
    $cont= $xml->addChild("cont");
    if(promjena==1){
    $cont->addChild('slikaLoc',$target_file);
    }
    else{
      $cont->addChild('slikaLoc',"img/oNama.jpg");
    }
    $cont->addChild('tekst', $_REQUEST["postOM"]);
    echo "FIIIIIIIIIIIIII".(string)$target_file."";
    file_put_contents("omeni.xml",$xml->asXML());
    header('Location: izmjenaOmeni.php');
  }

include('footer.php');
?>
