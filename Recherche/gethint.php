<?php


$conn = pg_connect("host=pgsql2 dbname=dbperso user=dbpersouser password=dbpersopwd");

$result = pg_query($conn,"select * from personne where nom_personne LIKE '".$_GET['q']."%' order by nom_personne");

$outp = "";
while($rs = pg_fetch_object($result))
{
    $outp .= $rs->nom_personne.", ".$rs->prenom_personne."; ";
}
pg_close($conn);

echo($outp);
?>