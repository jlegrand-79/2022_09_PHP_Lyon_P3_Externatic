# Externatic

<a name="readme-top"></a>

![Externatic](https://i.imgur.com/zMuSY2p.jpg)


<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#-clone-and-run-externatic">Clone and run Externatic</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#install">Install</a></li>
        <li><a href="#create-the-database">Create the database</a></li>
        <li><a href="#launching">Launching</a></li>
      </ul>
    </li>
    <li>
      <a href="#-architecture-of-externatic">Architecture of Externatic</a>
      <ul>
        <li><a href="#organisation">Organisation</a></li>
        <li><a href="#public-pages">Public pages</a></li>
        <li><a href="#candidate-page">Candidate page</a></li>
        <li><a href="#recruiter-page">Recruiter page</a></li>
        <li><a href="#admin-pages"> Admin pages</a></li>
      </ul>
    </li>
    <li>
      <a href="#-login-to-externatic">Login to Externatic</a>
      <ul>
        <li><a href="#admin">Admin</a></li>
        <li><a href="#recruiter">Recruiter</a></li>
        <li><a href="#candidate">Candidate</a></li>
      </ul>
    </li>
    <li>
      <a href="#-info-about-externatic">Info about Externatic</a>
        <ul>
          <li><a href="#our-team">Our team</a></li>
          <li><a href="#built-with">Built with</a></li>
        </ul>
    </li>
    <li>
      <a href="#-browser-support">Browser Support</a>
    </li>
    <li>
      <a href="#-license">License</a>
    </li>
  </ol>
</details>



## 🏃 Clone and run Externatic

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

## 🏠 Architecture of Externatic

### Organisation
There is **3 access level** to externatic :

* **Candidate :** He can read job offer and apply to any of them
* **Recruiter :** He can create job offer and validate candidacy  
* **Admin :** He can access any CRUD 

### Public pages
* Home page at [localhost:8000/](http://localhost:8000/)
* Search a job offer at [localhost:8000/offer/list](http://localhost:8000/offer/list)
* Read a job offer at[localhost:8000/offer/id](http://localhost:8000/offer/8)
* Connect at [localhost:8000/login](http://localhost:8000/login)
* Register at [localhost:8000/register](http://localhost:8000/register)

### Candidate page
* Get the profile page at [localhost:8000/candidate/mypage](http://localhost:8000/candidate/mypage)

### Recruiter page
* Get the profile page at [localhost:8000/offer/recruiter](http://localhost:8000/offer/recruiter)

### Admin pages
* Get the list of the offers at [localhost:8000/offer/](http://localhost:8000/offer/)
* Get the list of the candidates at [localhost:8000/candidate/](http://localhost:8000/candidate/)
* Get the list of the partners at [localhost:8000/partner/](http://localhost:8000/partner/)
* Get the list of the recruiter at [localhost:8000/recruiter/](http://localhost:8000/recruiter/)
* Get the list of the candidacies at [localhost:8000/candidacy/](http://localhost:8000/candidacy/)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## 🔑 Login to Externatic

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


## 📰 Info about Externatic

### Our team

Externatic is a [school](https://www.wildcodeschool.com/) project created by :

* Amaury Beurrier  [<img src="https://i.imgur.com/i3QdWQl.png">](https://www.linkedin.com/in/amaury-beurrier/)    [<img src="https://i.imgur.com/MXFQZTy.png">](https://github.com/AmauBe)


* Charlène Da Rugna  [<img src="https://i.imgur.com/i3QdWQl.png">](https://www.linkedin.com/in/charlenedr/)    [<img src="https://i.imgur.com/MXFQZTy.png">](https://github.com/CharleneDR)


* Jonas Jallet  [<img src="https://i.imgur.com/i3QdWQl.png">](https://www.linkedin.com/in/jonas-jallet/)    [<img src="https://i.imgur.com/MXFQZTy.png">](https://github.com/JonasJallet)


* Jérôme Legrand  [<img src="https://i.imgur.com/i3QdWQl.png">](https://www.linkedin.com/in/jlegrand79/)    [<img src="https://i.imgur.com/MXFQZTy.png">](https://github.com/jlegrand-79)


* Charlie Toussaint  [<img src="https://i.imgur.com/i3QdWQl.png">](https://www.linkedin.com/in/charlie-toussaint-2aa941114/)    [<img src="https://i.imgur.com/MXFQZTy.png">](https://github.com/charlietoussaint)


### Built With

* [Symfony](https://github.com/symfony/symfony)
* [Bootstrap](https://getbootstrap.com/)
* [GrumPHP](https://github.com/phpro/grumphp)
* [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
* [PHPStan](https://github.com/phpstan/phpstan)
* [PHPMD](http://phpmd.org)
* [ESLint](https://eslint.org/)
* [Sass-Lint](https://github.com/sasstools/sass-lint)


<p align="right">(<a href="#readme-top">back to top</a>)</p>


## 🌏 Browser Support

| <img src="https://user-images.githubusercontent.com/1215767/34348387-a2e64588-ea4d-11e7-8267-a43365103afe.png" alt="Chrome" width="16px" height="16px" /> Chrome | <img src="https://user-images.githubusercontent.com/1215767/34348590-250b3ca2-ea4f-11e7-9efb-da953359321f.png" alt="IE" width="16px" height="16px" /> Internet Explorer | <img src="https://user-images.githubusercontent.com/1215767/34348380-93e77ae8-ea4d-11e7-8696-9a989ddbbbf5.png" alt="Edge" width="16px" height="16px" /> Edge | <img src="https://user-images.githubusercontent.com/1215767/34348394-a981f892-ea4d-11e7-9156-d128d58386b9.png" alt="Safari" width="16px" height="16px" /> Safari | <img src="https://user-images.githubusercontent.com/1215767/34348383-9e7ed492-ea4d-11e7-910c-03b39d52f496.png" alt="Firefox" width="16px" height="16px" /> Firefox |
| :---------: | :---------: | :---------: | :---------: | :---------: |
| Yes | 11+ | Yes | Yes | Yes |

<p align="right">(<a href="#readme-top">back to top</a>)</p>


## 🎓 License

MIT License

**Copyright (c) 2019 aurelien@wildcodeschool.fr**

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555