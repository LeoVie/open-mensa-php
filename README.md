# LeoVie/OpenMensaPhp

The api documentation is available under https://doc.openmensa.org.

## Example
Listing canteens:

```php
$requestService = new \LeoVie\OpenMensaPhp\Service\RequestService();
$request = new \LeoVie\OpenMensaPhp\Request\ListCanteens();

$canteens = $requestService->request($request);

var_dump($canteens);
```