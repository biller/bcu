# Adaptador de WebServices del BCU para PHP

Herramienta para obtener la cotización oficial de distintas monedas extraídas del WebService del [Banco Central del Uruguay](http://www.bcu.gub.uy/).

Los WebServices utilizados son [awsbcucotizaciones](https://cotizaciones.bcu.gub.uy/wscotizaciones/servlet/awsbcucotizaciones?wsdl) y [awsultimocierre](https://cotizaciones.bcu.gub.uy/wscotizaciones/servlet/awsultimocierre?wsdl).

## Instalación

La mejor forma de utilizar este plugin es a través del plugin [composer](http://getcomposer.org/download/).
```
composer require biller/bcu
```

## Uso

### Obtener cotización
```php
// Dólar interbancario para el último día de cierre
biller\bcu\Cotizaciones::obtenerCotizacion();

// Dólar interbancario para el 01-ene-2018
biller\bcu\Cotizaciones::obtenerCotizacion('2018-01-01');

// Dólar interbancario para el 01-ene-2018
biller\bcu\Cotizaciones::obtenerCotizacion('2018-01-01', 2225);
```

### Obtener último cierre
```php
biller\bcu\Cotizaciones::obtenerUltimoCierre();
```
