# Conociendo Javascript
#### 17100226 | ***Francisco Fernando González Rodríguez***

JavaScript es un lenguaje de "programación" donde su principal objetivo es crear páginas web dinámicas.

### ¿Qué es una página de web dinámica?

Es aquella que incorpora efectos como texto que aparece y desaparece, animaciones, acciones que se activan al pulsar botones y ventanas con mensajes de aviso al usuario.

JavaScript es débilmente tipado, esto significa que no distinguen de tipos de datos esto quiere decir que si comparas un tipo de dato diferente al que lo comparas y son iguales en valor estos devuelven un valor verdadero, analice el siguiente código...

 
``` JavaScript
let var x = "1";
let int y = 1

if(x==y)
{
    return "son iguales";
}
else   
    return "son diferentes";
```
Lo que analizamos aquí es que no importa los tipos de datos si son iguales en cuanto a valor devolverá un verdadero, para poder decirle al lenguaje javascript "Hey quiero que me compares el valor pero también que sea del mismo tipo de dato" entonces nosotros debemos decirle mediante código lo anterior ¿Cómo se logra esto?
Se logra usando los **3 IGUALES**

``` JavaScript
if(x===y)
{
    return "son iguales";
}
else   
    return "son diferentes";
 ```
 Ahí sí compara los tipos de datos y en este caso devolverá un falso dado que aunque sean iguales en valor no comparten el mismo tipo de dato, es por ello que el resultado me devolverá un falso.

 ## ¿Qué son las variables en JavaScript?

 Las variables en los lenguajes de programación siguen una lógica similar a las variables utilizadas en otros ámbitos como las matemáticas. Una variable es un elemento que se emplea para almacenar y hacer referencia a otro valor. Gracias a las variables es posible crear "programas genéricos", es decir, programas que funcionan siempre igual independientemente de los valores concretos utilizados.

 Una de las características más sorprendentes de JavaSript para los programadores habituados a otros lenguajes de programación es que tampoco es necesario declarar las variables. En otras palabras, se pueden utilizar variables que no se han definido anteriormente mediante la palabra reservada var. El ejemplo anterior también es correcto en JavaScript de la siguiente forma:
``` JavaScript
var numero_1 = 3;
var numero_2 = 1;
resultado = numero_1 + numero_2;
```
La variable resultado no está ~~declarada~~, por lo que JavaScript crea una variable global (más adelante se verán las diferencias entre variables locales y globales) y le asigna el valor correspondiente. De la misma forma, también sería correcto el siguiente código:
``` JavaScript
numero_1 = 3;
numero_2 = 1;
resultado = numero_1 + numero_2;
```
## Pero... ¿Cómo podría ser un ejemplo correcto de cómo escribir un nombre de variable?

El nombre de una variable también se conoce como identificador y debe cumplir las siguientes normas:

Sólo puede estar formado por letras, números y los símbolos $ (dólar) y _ (guión bajo).
El primer carácter no puede ser un ~~número~~.
Por tanto, las siguientes variables tienen nombres correctos:
``` JavaScript
var $numero1;
var _$letra;
var $$$otroNumero;
var $_a__$4;
```
Sin embargo, las siguientes variables tienen identificadores incorrectos:
``` JavaScript
var 1numero;       // Empieza por un número
var numero;1_123;  // Contiene un carácter ";"
```

### ¿Qué es el ámbito de variables o scope de una variable?

El ámbito de las variables es uno de los conceptos más importantes que deberemos conocer cuando trabajamos con variables, no sólo en Javascript, sino en la mayoría de los lenguajes de programación.

Se le llama ámbito de las variables al lugar donde estas están disponibles. Por lo general, cuando declaramos una variable hacemos que esté disponible en el lugar donde se ha declarado, esto ocurre en todos los lenguajes de programación y como Javascript se define dentro de una página web, las variables que declaremos en la página estarán accesibles dentro de ella.

En Javascript no podremos acceder a variables que hayan sido definidas en otra página. Por tanto, la propia página donde se define es el ámbito más habitual de una variable y le llamaremos a este tipo de variables globales a la página. Veremos también se pueden hacer variables con ámbitos distintos del global, es decir, variables que declararemos y tendrán validez en lugares más acotados.

## Tipos de variables 
Variables globales
Como hemos dicho, las variables globales son las que están declaradas en el ámbito más amplio posible, que en Javascript es una página web. Para declarar una variable global a la página simplemente lo haremos en un script, con la palabra var.

<SCRIPT> 
var variableGlobal 
</SCRIPT>
Las variables globales son accesibles desde cualquier lugar de la página, es decir, desde el script donde se han declarado y todos los demás scripts de la página, incluidos los manejadores de eventos, como el onclick, que ya vimos que se podía incluir dentro de determinadas etiquetas HTML.

Variables locales
También podremos declarar variables en lugares más acotados, como por ejemplo una función. A estas variables les llamaremos locales. Cuando se declaren variables locales sólo podremos acceder a ellas dentro del lugar donde se ha declarado, es decir, si la habíamos declarado en una función solo podremos acceder a ella cuando estemos en esa función.

Las variables pueden ser locales a una función, pero también pueden ser locales a otros ámbitos, como por ejemplo un bucle. En general, son ámbitos locales cualquier lugar acotado por llaves.
``` JavaScript
<script> 
function miFuncion (){ 
    var variableLocal 
} 
</script>
```

## ¿Qué es el hoisting o elevación?

En esta ocasión quiero hablar de un efecto quizá poco conocido pero importante del modo en que procesa el código JavaScript.

En JavaScript existen variables globales, las cuales tienen sus ventajas en un lenguaje como este, pero también están llenas de peligros, y variables locales, cuyo ámbito se circunscribe exclusivamente a las funciones en las que se declaran.

Podemos utilizar una variable global desde dentro de una función cualquiera, ya que están accesibles desde cualquier lugar de la página, por ejemplo:
```JavaScript
//Variable global
var name = "Jose";

function HelloWorld(){
  alert(name);
}

HelloWorld();
```
Al hacer esto saltará el mensaje con el nombre que hay en la variable. Bastante obvio.

Bien, pero ¿qué pasa si definimos una variable con el mismo nombre dentro de la función?:
```JavaScript
//Variable global
var name = "Jose";

function HelloWorld(){
  //Variable local
  var name = "Pepe";
  alert(name);
}

HelloWorld();
```
Las reglas de precedencia de variables en JavaScript dicen que las variables locales preceden a las globales, por lo que en este caso veríamos aparecer por pantalla la palabra “Pepe” que es el valor de la variable local.

Sin embargo ahora vamos a hacerle un sutil cambio al código anterior y haremos lo siguiente:

//Variable global
var name = "Jose";
``` JavaScript
function HelloWorld(){
   alert(name);
   //Variable local
   var name = "Pepe";
}

HelloWorld();
```
¿Qué veremos ahora por pantalla?

Por lógica parece que deberíamos ver “Jose”, ya que en el momento de llamar al alert todavía no se ha declarado la variable local, y por lo tanto se debería acceder a la global ¿verdad? Pues no.

Lo que veremos por pantalla es un bonito “undefined”:
![ckbox](https://www.jasoft.org/Blog/image.axd?picture=Undefined.gif)

En fin, en este artículo vimos una pequeña introducción al lenguaje de programación JavaScript, los temas a tratar fueron las variables en JavaScript el alcance de ellas mismas, cómo se comportan y el tema confuso y característico de JavaScript el  Hoisting 