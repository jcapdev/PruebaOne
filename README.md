
## API RESFUL

## crear usuario
para registrar a un usuario e interactuar con las demas funciones se debera primero crear un usuario 
con los siguientes datos:

-name
-email
-password

mediante esta ruta se podra acceder a la api de registro    

http://localhost/pruebasone/public/users



{
    "name": "Merida Maria",
    "email": "mmpena@gmail.com",
    "password": "123456"

}

Utilizar metodo POST

Con la herramienta postman  en Heders en el campo key agregar el dato "Acept" y en Value "application/json"
Posteriormennte enviar datos y aparecera un json con los datos del nuevo registro

## logear y generar token


Para ingresar a los diferentes metodos es importante iniciar sessión. Despues de registrar se deberá iniciar sessión con el correo y la contraseña.

Metodo POST

ruta
http://localhost/pruebasone/public/login


Con la herramienta postman  en Heders en el campo key agregar el dato "Acept" y en Value "application/json"
Posteriormennte enviar datos y aparecera un json con los datos siguientes:


{
    "email": "mmpena@gmail.com",
    "password": "123456"
}

Posteriormente te mostrara el resultado siguiente:

{
    "res": true,
    "token": "03-05-2022|mmpena@gmail.compbk5GcL8oN2uAFAv9VPVyQeC9epq3GgjQaXSrghQIJrcAnL7MBHgOwub6YzuPYhdoGA0iq9WHq1BjqA5SKhr9ldjMyQvDsq38SbMqyMLyPWoRybwgJwfWPh6qfkXI2QRVWLZZpsrW4KXXl3UQ837HiJVhrHnB8sbptmirsauWM5chGV99EY1jY6blXKZdir26teJOK7u",
    "message": "Bienvenido al sistema"
}

Donde para acceder a las demas rutas se debera usar el token correspondiente

# consultar Costumers

Para consultar informacion de los costumers se podra consultar por dni o correo
se debera usar el token generado para consultar la informacion:

Con la herramienta postman  en Heders en el campo key agregar el dato "Acept" y en Value "application/json"
en el apartado "Boddy" introduccir el token correspondiente:

Metodo GET 

{
    "api_token" :"03-05-2022|mmpena@gmail.coms9c7sgL4cojZ9iyQkgiCgg3iET9X1uAbKwHLQsM2V5gubDz9OIpA7cgqjWJ3XKZyDyUQOYKHDKyqLbT4UBfIFjb8H2PuAipUfibXQmFLpaOfj11UhQNpAb9WTh3mgDK1GLI6p4LBWWYQmEeJIOihv46sRrNAWZKjdTwI7LdM5395mqH04tY8RmIaExp8sCjJXCBGaYLY"

}

En la ruta introducir el valor buscado:

http://localhost/pruebasone/public/Customers/1

Enviar y se mostrara la informacion.

{
    "name": "Merida",
    "last_name": "Echave",
    "address": "Escollera riveras del rio Guadalupe Nuevo leon",
    "description": "monterrey",
    "descriptioncom": "prueba"
}

unicamente se podran consultar los elementos activos y desactivos

Si no existe un registro mostrara lo siguente:

{
    "serverstatus": "false"
}

# Agregar costumer

Para agregar un costumer se debera usar la siguiente ruta

http://localhost/pruebasone/public/Customers

Metodo GET

Con la herramienta postman  en Heders en el campo key agregar el dato "Acept" y en Value "application/json"
en el apartado "Boddy" introduccir el token correspondiente:


{
    "api_token" :"03-05-2022|mmpena@gmail.coms9c7sgL4cojZ9iyQkgiCgg3iET9X1uAbKwHLQsM2V5gubDz9OIpA7cgqjWJ3XKZyDyUQOYKHDKyqLbT4UBfIFjb8H2PuAipUfibXQmFLpaOfj11UhQNpAb9WTh3mgDK1GLI6p4LBWWYQmEeJIOihv46sRrNAWZKjdTwI7LdM5395mqH04tY8RmIaExp8sCjJXCBGaYLY"

}

En el apartado parametros introducir lo siguiente:

KEY             values

id_reg              1
id_com              1
email               hola7@pdms.mx
name                Pedro
last_name           Ramirez
address             Indiana 108
date_reg            2022-05-01 18:19:24
status              A


al dar enviar se crera un nuevo registro en la base de datos

se mostrara lo siguiente

{
    "api_token": "03-05-2022|mmpena@gmail.comPMYHcCeNFLBuv0SOVg5ocUju20N6RsAjPpulqnDJeFtUe2yk4dno82Rs6oh9b5av9FpqSYom0wMfBqdpjTajrOMXTqXGtpHggmzQmmNFMpQs5YRZitZef1IN5kuhaq1IKI45UPhuCe8zd3maJzib8llDIA6ibFQZzo5kAJc34FFJCkfkmw2B2iUmPP2fNDKduL4Pqc5o",
    "id_reg": "1",
    "id_com": "1",
    "email": "hola7@vmasideas.mx",
    "name": "Pero",
    "last_name": "Ramirez",
    "address": "Indiana 108",
    "date_reg": "2022-05-01 18:19:24",
    "status": "A"
}


si existe algun error de duplicidad de llave foranea o en correo es repetido se mostrara lo siguiente:

{
    "serverstatus": "false"
}


# Eliminar registro

para eliminar un registro se debera usar la ruta siguiente

http://localhost/pruebasone/public/Customers/6

Metodo  DELETE

Con la herramienta postman  en Heders en el campo key agregar el dato "Acept" y en Value "application/json"
en el apartado "Boddy" introduccir el token correspondiente:

{
    "api_token" :"03-05-2022|mmpena@gmail.coms9c7sgL4cojZ9iyQkgiCgg3iET9X1uAbKwHLQsM2V5gubDz9OIpA7cgqjWJ3XKZyDyUQOYKHDKyqLbT4UBfIFjb8H2PuAipUfibXQmFLpaOfj11UhQNpAb9WTh3mgDK1GLI6p4LBWWYQmEeJIOihv46sRrNAWZKjdTwI7LdM5395mqH04tY8RmIaExp8sCjJXCBGaYLY"

}
 al ejecutar el resultado se mostrara de la siguiete manera:

 {
    "serverstatus": "ELIMINADO"
}


de lo contrario si no existe el dato o hay un problema desconocido se mostraara lo siguiente:

{
    "serverstatus": "false"
}

# Logs

la informacion de los movimientos realizados en la api se ven reflejados en el archivo "lumen-2022-05-xx" donde muestra los errres o cambios del framework, si como errores y caminos donde se va ejecutando la api

# tabla de users

la tabla de user es para validar los accesos (usuario, email , contraseña y token).








