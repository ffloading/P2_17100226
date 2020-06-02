# Definiendo JSon 
### **17100226** | *Francisco Fernando González Rodríguez*

## ¿Qué significa JSon?
### **JavaScript Object Notation**
Eso es lo que significa JSon y como su nombre dice, lo usa el lenguaje JavaScript.

## ¿Qué es JSon?
JSON es una **sintaxis** para serializar objetos, arreglos, números, cadenas, booleanos y nulos. Está basado sobre sintaxis JavaScript pero es diferente a ella: algo JavaScript no es JSON, y algo JSON no es JavaScript.

## Diferencias entre JavaScript y JSon

| Tipo                  | Diferencia JSon|
|-----------------------|----------------
| Objetos y arreglos    | Los nombres de las propiedades deben tener doble comilla; las comas finales están prohibidas.
|    Números            | Los ceros a la izquierda están prohibidos; un punto decimal debe ser seguido al menos por un dígito.
| Cadenas               | Solo un limitado conjunto de caracteres pueden ser de escape; ciertos caracteres de control estan prohibidos; los caracteres de separador de linea Unicode (U+2028) y el separador de parrafo (U+2029) son permitidos; las cadenas deben estar entre comillas dobles. Mira el siguiente ejemplo donde JSON.parse funciona bien y unSyntaxError es generado cuando se evalua el codigo como JavaScript: [Ejemplo 1.1] 

**[Ejemplo 1.1.]**
``` JSon
var code = '"\u2028\u2029"';
JSON.parse(code); // works fine
eval(code); // fails
```

## ¿Cómo se ve un bloque de código o sintaxis de JSon?

``` JSon
JSON = null
    or true or false
    or JSONNumber
    or JSONString
    or JSONObject
    or JSONArray

JSONNumber = - PositiveNumber
          or PositiveNumber
PositiveNumber = DecimalNumber
              or DecimalNumber . Digits
              or DecimalNumber . Digits ExponentPart
              or DecimalNumber ExponentPart
DecimalNumber = 0
             or OneToNine Digits
ExponentPart = e Exponent
            or E Exponent
Exponent = Digits
        or + Digits
        or - Digits
Digits = Digit
      or Digits Digit
Digit = 0 through 9
OneToNine = 1 through 9

JSONString = ""
          or " StringCharacters "
StringCharacters = StringCharacter
                or StringCharacters StringCharacter
StringCharacter = any character
                  except " or \ or U+0000 through U+001F
               or EscapeSequence
EscapeSequence = \" or \/ or \\ or \b or \f or \n or \r or \t
              or \u HexDigit HexDigit HexDigit HexDigit
HexDigit = 0 through 9
        or A through F
        or a through f

JSONObject = { }
          or { Members }
Members = JSONString : JSON
       or Members , JSONString : JSON

JSONArray = [ ]
         or [ ArrayElements ]
ArrayElements = JSON
             or ArrayElements , JSON
```
> Espacios en **blanco insignificantes** pueden estar presentes en cualquier lugar excepto en un **~~JSONNumber~~** (los números no deben contener ningún espacio) o en una **~~JSONString~~** (donde es interpretado como el caracter correspondiente en la cadena, o podría causar un error). Los caracteres de Tabulación (U+0009), de retorno de carro (U+000D), de nueva línea (U+000A), y de espacio (U+0020) son los ***únicos*** caracteres de espacios en blanco *válidos.*

