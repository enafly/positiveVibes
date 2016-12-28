<?php
include('header.php');

$podaci = simplexml_load_file("omeni.xml");

$srcSlike = $podaci->cont[0]->slikaLoc;
$tekst = $podaci->cont[0]->tekst;
print"
<div class='col-10'>
      <div id='editi' class='col-10'>
      <table>
      	<TR>
            <TD> <img id='oNama' name='imgs' src='".(string)$srcSlike."' alt='Stay positive!'> </TD>
              <TD>
                  <form action='klikPromenaSlike.php' method='post' enctype='multipart/form-data'>
                    Selektuj sliku:
                      <input type='file' name='fileToUpload' id='fileToUpload' class='btnA'>
                      <input type='submit' value='Spasi sliku' name='submit' class='btnA'>
                  </form>
              </TD>
              <TD>	<h3 id='tekst'>".(string)$tekst."</h3></TD>
        </TR>
      </table>
      </div>
</div>
 <div class='col-2'>
 </div>";
/*
if(isset($REQUEST["submitaj"])){
    header('Location: klikPromenaSlike.php');
}
/*
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
 $srcSlike=$target_file;
 $xml = new SimpleXMLElement("<omeni/>");
 $cont= $xml->addChild("cont");
 $cont->addChild('slikaLoc',$srcSlike);
 $cont->addChild('tekst',$tekst);
 file_put_contents("omeni.xml",$xml->asXML());
 header('Location: izmjenaOmeni.php');

}
else{
  $xml = new SimpleXMLElement("<omeni/>");
  $cont= $xml->addChild("cont");
  $cont->addChild('slikaLoc',$srcSlike);
  $cont->addChild('tekst',$tekst);
  file_put_contents("omeni.xml",$xml->asXML());
  header('Location: izmjenaOmeni.php');

}
 /*$xml = new SimpleXMLElement("<omeni/>");
 $cont= $xml->addChild("cont");
 $cont->addChild('slikaLoc',$target_file);
 $cont->addChild('tekst',$tekst);
 file_put_contents("omeni.xml",$xml->asXML());
 header('Location: izmjenaOmeni.php');
include('footer.php');
*/

   include('footer.php');
?>
