# jwt-tamperer

### Usage


To require service into existing project, add this to composer.json
````
$validJwt = "Bearer ey1234rasd876";
$tamperedToken = (new JwtTamperer($validJwt))->buildCompromisedToken(); 
````


### Installation


To require service into existing project, add this to composer.json
````
{
  "repositories": [
    {
      "type": "vcs",
      "url": "git@github.com:sugarfixx/jwt-tamperer.git"
     }
  ]   
}
````
Run
```angular2html
composer require sugarfixx/jwt-tamperer
```
