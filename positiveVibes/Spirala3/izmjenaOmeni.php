<?php
include('header.php');

$podaci = simplexml_load_file("omeni.xml");

$srcSlike = $podaci->cont[0]->slikaLoc;
$tekst = $podaci->cont[0]->tekst;

print"
<div class='col-1'>
</div>

<div id='onama' class='col-9'>
<table>
	<TR>
				<TD><img src='".(string)$srcSlike."'alt='Stay positive!'></TD>
			<TD>	<h3 id='tekst'>".(string)$tekst."</h3></TD>
			</TR>
		</table>
</div>
<!--opcijeAdmin.php-->
<div class='col-2'>
  <a href='promenaOmeni.php' id='link'><input type='button' value='Promijeni' class='btnA'></a>
</div>";


include('footer.php');
?>
