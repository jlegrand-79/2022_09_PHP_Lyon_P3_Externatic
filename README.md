# Externatic

<a name="readme-top"></a>

![Externatic](https://i.imgur.com/zMuSY2p.jpg)

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#clone-and-run-externatic">Clone and run Externatic</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#Install">Install</a></li>
        <li><a href="#create-the-database">Create the database</a></li>
        <li><a href="#launching">Launching</a></li>
      </ul>
    </li>
    <li>
      <a href="#architecture-of-externatic">Architecture of Externatic</a>
      <ul>
        <li><a href="#organisation">Organisation</a></li>
        <li><a href="#public-pages">Public pages</a></li>
        <li><a href="#candidate-page">Candidate page</a></li>
        <li><a href="#recruiter-page">Recruiter page</a></li>
        <li><a href="#admin-pages"> Admin pages</a></li>
      </ul>
    </li>
    <li>
      <a href="#login-to-externatic">Login to Externatic</a>
      <ul>
        <li><a href="#admin">Admin</a></li>
        <li><a href="#recruiter">Recruiter</a></li>
        <li><a href="#candidate">Candidate</a></li>
      </ul>
    </li>
    <li>
      <a href="#info-about-Externatic">Info about Externatic</a>
    </li>
        <li>
      <a href="#license">License</a>
    </li>
  </ol>
</details>

## Clone and run Externatic


### Prerequisites

1. Check composer is installed
2. Check yarn & node are installed


### Install

1. Clone this project
2. Run `composer install`
3. Run `yarn install`
4. Run `yarn encore dev` to build assets


### Create the database

1. Create your .env.local
2. Run `php bin/console d:d:c`
3. Run `php bin/console d:m:m`
4. Run `php bin/console d:f:l` 


### Launching

1. Run `symfony server:start` to launch your local php web server
2. Run `yarn run dev --watch` to launch your local server for assets (or `yarn dev-server` do the same with Hot Module Reload activated)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Architecture of Externatic

### Organisation :
There is 3 access level to externatic :

* Candidate : He can read job offer and apply to any of them
* Recruiter : He can create job offer and validate candidacy  
* Admin : He can access any CRUD 

### Public pages :
* Home page at [localhost:8000/](http://localhost:8000/)
* Search a job offer at [localhost:8000/offer/list](http://localhost:8000/offer/list)
* Read a job offer at[localhost:8000/offer/id](http://localhost:8000/offer/8)
* Connect at [localhost:8000/login](http://localhost:8000/login)
* Register at [localhost:8000/register](http://localhost:8000/register)

### Candidate page :
* Get the profile page at [localhost:8000/candidate/mypage](http://localhost:8000/candidate/mypage)

### Recruiter page :
* Get the profile page at [localhost:8000/offer/recruiter](http://localhost:8000/offer/recruiter)

### Admin pages :
* Get the list of the offers at [localhost:8000/offer/](http://localhost:8000/offer/)
* Get the list of the candidates at [localhost:8000/candidate/](http://localhost:8000/candidate/)
* Get the list of the partners at [localhost:8000/partner/](http://localhost:8000/partner/)
* Get the list of the recruiter at [localhost:8000/recruiter/](http://localhost:8000/recruiter/)
* Get the list of the candidacies at [localhost:8000/candidacy/](http://localhost:8000/candidacy/)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Login to Externatic

### Admin

* email : `admin@externatic.com` // password : `Admin_123`


### Recruiter

* email : `bruce@wayne-entreprises.com` // password : `Brubru_123`

* email : `lucius@wayne-entreprises.com` // password : `Lucluc_123`

* email : `tony@stark-industries.com` // password : `Tonton_123`

* email : `virginia@stark-industries.com` // password : `Virvir_123`


### Candidate

* email : `thomas.besson@mail.com` // password : `Thotho_123`

* email : `marcia.baila@mail.com` // password : `Marmar_123`

* email : `antoine.dupont@mail.com` // password : `Toitoi_123`

* email : `chacha.da.rugna@mail.com` // password : `Chacha_123`

* email : `jeje01@mail.com` // password : `Jeje_123`

<p align="right">(<a href="#readme-top">back to top</a>)</p>


## Info about Externatic

Externatic is a [school](https://www.wildcodeschool.com/) project created by :

* [Amaury Beurrier](https://github.com/AmauBe)
* [Charlène Da Rugna](https://github.com/CharleneDR)
* [Jonas Jallet](https://github.com/JonasJallet)
* [Jérôme Legrand](https://github.com/jlegrand-79)
* [Charlie Toussaint](https://github.com/charlietoussaint)


## Built With

* [Symfony](https://github.com/symfony/symfony)
* [Bootstrap](https://getbootstrap.com/)
* [GrumPHP](https://github.com/phpro/grumphp)
* [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
* [PHPStan](https://github.com/phpstan/phpstan)
* [PHPMD](http://phpmd.org)
* [ESLint](https://eslint.org/)
* [Sass-Lint](https://github.com/sasstools/sass-lint)


<p align="right">(<a href="#readme-top">back to top</a>)</p>


## License

MIT License

Copyright (c) 2019 aurelien@wildcodeschool.fr

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
