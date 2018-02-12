<p align="center">
    <a href="https://www.biller.uy" target="_blank">
        <img src="https://biller.uy/images/logo_trans_verde.png" width="400" alt="Biller - facturación electrónica" />
    </a>
</p>

# Adaptador de WebServices del BCU para PHP

Herramienta para obtener la cotización oficial de distintas monedas extraídas del WebService del [Banco Central del Uruguay](http://www.bcu.gub.uy/).

Los WebServices utilizados son [awsbcucotizaciones](https://cotizaciones.bcu.gub.uy/wscotizaciones/servlet/awsbcucotizaciones?wsdl) y [awsultimocierre](https://cotizaciones.bcu.gub.uy/wscotizaciones/servlet/awsultimocierre?wsdl).

## Instalación

La mejor forma de utilizar este plugin es a través del plugin [composer](http://getcomposer.org/download/).
```
composer require biller/bcu
```

## Uso

Luego de su instalación, se utiliza el método `obtenerCotizacion` que devolverá la última cotización de cierre para el dolar interbancario billete.

También se puede obtener la fecha del último cierre a través del llamado al método `obtenerUltimoCierre`.

### Obtener cotización
```php
// Dólar interbancario para el último día de cierre
biller\bcu\Cotizaciones::obtenerCotizacion();
```
```php
// Dólar interbancario para el 01-ene-2018
biller\bcu\Cotizaciones::obtenerCotizacion('2018-01-01');
```
```php
// Dólar interbancario para el 01-ene-2018
biller\bcu\Cotizaciones::obtenerCotizacion('2018-01-01', 2225);
```

### Obtener último cierre
```php
biller\bcu\Cotizaciones::obtenerUltimoCierre();
```
