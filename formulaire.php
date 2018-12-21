
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>Envoi</title>
</head>
<body>


<?php

if (isset($_POST['validate'])) {
	
$destinataire = $_POST['sonnom'];
$maildestinataire=$_POST['sonmail'];
// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
$expediteur = $_POST['votrenom'];
$objet = "Carte de voeux";
$mailexp=$_POST['votremail'];
$textarea=htmlspecialchars($_POST['message'], ENT_QUOTES);
if(($maildestinataire != '') && ($expediteur != '')) {

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers = "From: ".$mailexp."\r\n"; //fait que le mail est envoyé par le mail de la personne
$headers.= "MIME-Version: 1.0\r\n"; 
$headers.= "Content-Type:text/html;charset=UTF-8\r\n"; 
$headers .= 'Delivered-to: '.$maildestinataire."\n"; // Destinataire  

$message = "
<h1>Cher-e ".$destinataire.", ".$expediteur." vous souhaite de belles fêtes de fin d'année!</h1>
<p>Cliquez sur la miniature pour voir la carte de voeux animée.</p>
<a href='https://aletha.promo-24.codeur.online/cartevoeux/'><img src='http://aletha.promo-24.codeur.online/cartevoeux/cartepremiereanim.jpg' style='width: 450px; height: 450px'/></a>
<p>".$textarea."</p>
<p>Vous pouvez répondre à ".$expediteur." à cette adresse : ".$mailexp."</p>
";
echo $message;
mail($maildestinataire, $objet, $message, $headers);
if (mail($maildestinataire, $objet, $message, $headers)) // Envoi du message
{
    echo '<p>Votre message a bien été envoyé.</p><a href="https://aletha.promo-24.codeur.online/cartevoeux/index.html">Cliquez ici pour retourner à la carte de voeux. ';
}
else // Non envoyé
{
    echo "Votre message n'a pas pu être envoyé";
}
}
}
?>
</body>
</html>