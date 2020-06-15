# France Adjacent Departments

Récupère la liste des départements limitrophes en fonction d'un département.

## Pré-requis

- PHP ^7.3

## Installation

```
composer install wizaplace/collection-diff
```

## Utilisation

```php
use BaBeuloula\AdjacentDepartments\AdjacentDepartments;

$adjacentDepartments = new AdjacentDepartments();
$adjacentDepartments->find('69'); // ['01','71','42','43','07','26','38']
$adjacentDepartments->isAdjacent('69', '75'); // false
```

### Avec Symfony

```php
use BaBeuloula\AdjacentDepartments\AdjacentDepartments;

$container
    ->get(AdjacentDepartments::class)
    ->find('69'); // ['01','71','42','43','07','26','38']

$container
    ->get(AdjacentDepartments::class)
    ->isAdjacent('69', '75'); // false
```
