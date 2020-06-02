<?php
include("conexion.php");
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refaccionaria FG</title>
</head>

<body>
    <?php
            //Datos
            $ClaveCliente=$_POST["Clave"];
            $Nombre=$_POST["Nom"];
            $ApeM=$_POST["AMa"];
            $ApeP=$_POST["APa"];
            $Tel=$_POST["Tel"];
            $Correo=$_POST["Correo"];

    if(isset($_POST["boton"]))
    {
        $VBoton=$_POST["boton"];
        $bus=$_POST["Emp"];

        if($VBoton=="Buscar"){
            $sql="SELECT * FROM CLIENTE WHERE ClaveCliente = '$bus'";
            $cs=mysql_query($sql,$conn);
            while($result=mysql_fetch_array($cs)){
                $varCClient=$result[0];
                $varNom=$result[1];
                $varApeM=$result[2];
                $varApeP=$result[3];
                $varTel=$result[4];
                $varCorreo=$resul[5];
            }
        }
        //BOTON Guardar
        if($VBoton=="Guardar"){
            $sql="INSERT INTO CLIENTE VALUES('$ClaveCliente','$Nombre','$ApeM','$ApeP','$Tel','$Correo')";
            $cs=mysql_query($sql,$conn);
            echo "<script> alert('Datos almacenados correctamente del empleado' Num_Cliente: + $varCClient + Nombre: + $varNom);</script>";
        }
        
        //BOTÓN Actualizar.
        if($VBoton=="Actualizar"){
            $sql="UPDATE CLIENTE set ClaveCliente='$ClaveCliente', Nombre='$Nombre', ApellidoM='$ApeM', ApellidoP='$ApeP', NumTel='$Tel', Correo='$Correo'
            WHERE ClaveCliente='$ClaveCliente'";

            $cs=mysql_query($sql,$conn);
            echo "<script> alet('Se actualizó correctamente el registro...');</script>";
        }
    }
?>
<form name="Form1" method="post" action="">
    <p>Datos generales del cliente</p>

<p> Número de Cliente: 
    <input type="text" name="Clave" value="<?php echo $varCClient?>" />
    <td><input type="submit" name="boton" value="Buscar" /></td>
</p>
<p> Nombre: 
    <input type="text" name="Nom" value="<?php echo $varNom?>" />
</p>    
<p> Apellido Materno: 
    <input type="text" name="AMa" value="<?php echo $varApeM?>" />
</p>
<p> Apellido Paterno:
    <input type="text" name="APa" value="<?php echo $varApeP?>" />
</p>
<p> Teléfono: 
    <input type="text" name="Tel" value="<?php echo $varTel?>" />
</p>
<p> Correo: 
    <input type="text" name="Correo" value="<?php echo $varCorreo?>" />
</p>
}