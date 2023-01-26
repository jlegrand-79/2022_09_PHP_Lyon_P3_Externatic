<?php

namespace App\DataFixtures;

use App\Entity\Offer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OfferFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $offers = [
            [
                'open' => true,
                'contract' => 'contract_CDI',
                'recruiter' => 'recruiter_1',
                'workfield' => 'Développement',
                'stack' => ['PHP'],
                'title' => 'Développeur mobile iOS H/F',
                'description' => "<p><strong>Laboratoire d&#39;innovation mobile</strong>&nbsp;reconnue sur la place nantaise pour la qualit&eacute; de son d&eacute;veloppement recherche un&nbsp;<strong>d&eacute;veloppeur iOS</strong>.</p>

                <p>Elle d&eacute;veloppe pour les entreprises des solutions innovantes et &quot;user friendly&quot; afin d&#39;offrir des solutions de mobilit&eacute; performantes.</p>

                <p><strong><em><u>Missions :&nbsp;</u></em></strong></p>

                <p>Dans une &eacute;quipe &agrave; taille humaine, vous serez impliqu&eacute;s dans les projets, de la conception &agrave; la mise en production avec un CTO, un UX Designer, des chefs de projets :&nbsp;</p>

                <p>- R&eacute;flexion en amont sur l&#39;architecture des applications</p>

                <p>- Conception et d&eacute;veloppement des fonctionnalit&eacute;s</p>

                <p>- Appel des web-services utilis&eacute;s pour les applications</p>

                <p>- Mise en production d&rsquo;applications mobile natives iOS</p>

                <p>- Suivi et maintenance des applications en production</p>

                <p>Le profil que nous recherchons</p>

                <p>Formation en informatique avec une premi&egrave;re exp&eacute;rience en d&eacute;veloppement d&#39;applications iOS (Swift)</p>

                <p>Impliqu&eacute;, motiv&eacute; et autonome, vous souhaitez int&eacute;grer une soci&eacute;t&eacute; en plein d&eacute;veloppement.</p>

                <p>Vous connaissez Cocoapods et avez l&rsquo;habitude de travailler avec des librairies open sources</p>

                <p>Sensibilit&eacute; UX design</p>

                <p>M&eacute;thode agile</p>

                <p>Equipe d&#39;experts et de passionn&eacute;s</p>

                <p><em><strong>Salaire :</strong></em>&nbsp;32-38K&euro;</p>

                <p><strong><em><u>Les + :</u></em></strong>&nbsp;</p>

                <ul>
                    <li>Tickets restaurants + Carte de sport</li>
                    <li>Team building&nbsp;</li>
                    <li>Locaux agr&eacute;ables et spacieux en centre-ville</li>
                    <li>T&eacute;l&eacute;travail (2-3 jours / semaine)</li>
                    <li>Possibilit&eacute; de mont&eacute;e en comp&eacute;tence + &eacute;volution de carri&egrave;re</li>
                </ul>
                ",
                'address' => '1 rue des rivières',
                'address_complement' => '1er étage',
                'postal_code' => '01000',
                'city' => 'Bourg-en-Bresse',
                'department' => 01,
            ],
            [
                'open' => true,
                'contract' => 'contract_CDD',
                'recruiter' => 'recruiter_2',
                'workfield' => 'Data',
                'stack' => ['Python'],
                'title' => 'Senior Product Analyst H/F (éditeur economie durable)',
                'description' => "<p>Depuis ses d&eacute;buts il y a pr&egrave;s de 10 ans, cette soci&eacute;t&eacute; nantaise de 80 personnes d&eacute;veloppe une solution &agrave; impact environnemental et recrute son/sa futur(e)&nbsp;<strong>Senior Product Analyst H/F</strong></p>

                <p><strong>L</strong>&rsquo;<strong>impact environnemental et soci&eacute;tal</strong>&nbsp;&eacute;tant directement li&eacute; &agrave; son activit&eacute;, elle place ses fondements sur l&#39;humain, le partage, la cr&eacute;ation de valeurs, au c&oelig;ur de ses pr&eacute;occupations.</p>

                <p>➢ Ton r&ocirc;le sera de conseiller l&rsquo;&eacute;quipe &laquo; Produit &raquo; &agrave; l&rsquo;aide d&rsquo;analyses de donn&eacute;es complexes, pour lui permettre de construire des solutions performantes, en lien avec les besoins utilisateurs.</p>

                <p>En tant que &laquo; facilitateur &raquo;, tu optimiseras l&rsquo;acc&egrave;s aux informations &agrave; travers le reporting et les outils d&rsquo;analyse self-service pour l&rsquo;&eacute;quipe &laquo; Produit &raquo;.</p>

                <p><strong>Aider/conseiller les &eacute;quipes &ldquo;Produit&rdquo; &agrave; construire un produit performant, adapt&eacute; aux besoins des utilisateurs, en leur permettant de prendre des d&eacute;cisions bas&eacute;es sur l&rsquo;analyse de donn&eacute;es.</strong></p>

                <ul>
                    <li>Participer &agrave; l&rsquo;&eacute;criture des US afin de comprendre les futurs d&eacute;veloppements produits ;</li>
                    <li>D&eacute;finir les KPIs et metrics &agrave; suivre pour chaque fonctionnalit&eacute; ;</li>
                    <li>Recommander et installer les outils de tracking avec l&rsquo;aide de l&rsquo;&eacute;quipe de D&eacute;veloppement ;</li>
                    <li>Mettre en place des Tests AB et plus g&eacute;n&eacute;ralement des sc&eacute;narios de tracking ;</li>
                    <li>R&eacute;aliser des &eacute;tudes exploratoires ;</li>
                    <li>Collecter et analyser les donn&eacute;es produits ;</li>
                    <li>R&eacute;aliser des &eacute;tudes qualitatives bas&eacute;es sur des questionnaires clients (&eacute;tudes de satisfaction, NPS, entretiens, Focus Group&hellip;) ;</li>
                    <li>&Eacute;tablir des recommandations produits (&eacute;volutions, corrections, optimisations&hellip;) bas&eacute;es sur l&rsquo;analyse des donn&eacute;es ;</li>
                    <li>Participer aux rituels et ateliers des squads, afin de comprendre les probl&eacute;matiques users et d&rsquo;&ecirc;tre owner sur les sujets de Data Analyse associ&eacute;s.</li>
                </ul>

                <p><strong>Faciliter l&rsquo;acc&egrave;s aux informations &agrave; travers le reporting et les outils d&rsquo;analyse self-service pour l&rsquo;&eacute;quipe &laquo; produit &raquo;</strong></p>

                <ul>
                    <li>D&eacute;finir les dashboards, ainsi que les outils d&rsquo;analyse et de reporting n&eacute;cessaires aux &eacute;quipes Produit ;</li>
                    <li>Contribuer &agrave; leur mise en place ;</li>
                    <li>Assurer la bonne adoption et usage de ces outils afin de diffuser la connaissance et la compr&eacute;hension des metrics aux Product &amp; Business owners.</li>
                </ul>

                <p><strong>Former l&rsquo;&eacute;quipe Product &agrave; une culture &ldquo;data informe&rdquo; (PM, Tech,&nbsp;Product Design).</strong></p>

                <ul>
                    <li>Co-construire, avec les Squad, les rituels n&eacute;cessaires pour placer la data au c&oelig;ur du produit tant dans les r&eacute;flexions amont, que dans l&rsquo;ex&eacute;cution aval ;</li>
                    <li>Participer activement &agrave; la vie de l&rsquo;&eacute;quipe &laquo; produit &raquo; et &ecirc;tre pro-actif dans la mise en place d&rsquo;outils de m&eacute;thode, de moyens pour placer la data au c&oelig;ur de la d&eacute;marche produit ;</li>
                    <li>R&eacute;aliser des &eacute;tudes ad-hoc ;</li>
                    <li>Faire grandir la maturit&eacute; analytique de l&rsquo;&eacute;quipe produit afin de les rendre autonome dans la r&eacute;alisation d&rsquo;&eacute;tudes ad-hoc.</li>
                </ul>

                <p><strong>Garantir la data quality des donn&eacute;es &laquo; produit &raquo; et clients</strong></p>

                <ul>
                    <li>Maintenir la qualit&eacute; des donn&eacute;es utilis&eacute;es venant de SW mais aussi des clients externes ;</li>
                    <li>V&eacute;rifier la qualit&eacute; des donn&eacute;es n&eacute;cessaires au produit et &agrave; ses usages ;</li>
                    <li>Construire les r&egrave;gles de qualification de la donn&eacute;e et garantir leurs usages &agrave; travers toute la ligne de vie de la donn&eacute;e ;</li>
                    <li>&Ecirc;tre sensible &agrave; la gouvernance des donn&eacute;es pour nos utilisateurs internes et externes.</li>
                </ul>

                <p><strong>Outils / logiciels utilis&eacute;s :</strong></p>

                <ul>
                    <li>Snowflake ;</li>
                    <li>DBT ;</li>
                    <li>Tableau ;</li>
                    <li>Dagster ;</li>
                    <li>SQL ;</li>
                    <li>Python/Jupyter.</li>
                </ul>

                <p>Le profil que nous recherchons</p>

                <p>Issu(e) d&rsquo;une formation Bac+5 ing&eacute;nieur ou business avec une sp&eacute;cialit&eacute; data analytics, tu as une exp&eacute;rience confirm&eacute;e d&rsquo;au moins 3 ans sur un poste similaire et id&eacute;alement en Startup/ Scaleup.</p>

                <p>Avoir une exp&eacute;rience concr&egrave;te en Data Analyse / Business Intelligence en contexte retail serait un vrai plus pour eux !</p>

                <p><strong>Comp&eacute;tences attendues :</strong></p>

                <ul>
                    <li>Expertise des sujets relatifs &agrave; l&rsquo;exploitation des donn&eacute;es ;</li>
                    <li>Ma&icirc;trise de la langue anglaise (documentation, collaborateurs internationaux,..) ;</li>
                    <li>Tr&egrave;s bonne compr&eacute;hension des enjeux m&eacute;tier / business impliquant le traitement des donn&eacute;es de bout ; en bout en contexte d&eacute;cisionnel ;</li>
                    <li>SQL courant, la connaissance de Python est un plus ;</li>
                    <li>Ma&icirc;trise du reporting et d&rsquo;un ou plusieurs outils de BI/Dataviz (Qlik, Tableau, PowerBI, etc) ;</li>
                    <li>Forte aptitude en analyse de donn&eacute;es et pratique r&eacute;guli&egrave;re des statistiques de base ;</li>
                    <li>Ma&icirc;trise des concepts d&rsquo;ETL/ELT et des principaux SGDBs et globalement d&rsquo;architecture d&eacute;cisionnelle ;</li>
                    <li>Connaissance du fonctionnement par SQUAD et des m&eacute;thodes Agiles.</li>
                    <li>Ma&icirc;trise de la langue anglais (documentation, collaborateurs internationaux,..) ;</li>
                </ul>

                <p>&nbsp;<strong>Les avantages du poste :</strong></p>

                <ul>
                    <li>T&eacute;l&eacute;travail possible.</li>
                    <li>S&eacute;minaires d&rsquo;entreprise</li>
                    <li>Prime vacances.</li>
                    <li>100% du transport en commun sont pris en charge par la soci&eacute;t&eacute;</li>
                    <li>Titres restaurant&nbsp;</li>
                    <li>Evolution annuelle li&eacute;e &agrave; leur politique de r&eacute;mun&eacute;ration (augmentation du fixe).</li>
                </ul>

                <p><strong>Salaire :</strong></p>

                <ul>
                    <li>Selon profil 40 000 &agrave; 60 000&euro;</li>
                </ul>
                ",
                'address' => '1 rue des rivières',
                'address_complement' => '2ème étage',
                'postal_code' => '69000',
                'city' => 'Lyon',
                'department' => 69,
            ],
            [
                'open' => true,
                'contract' => 'contract_CDD',
                'recruiter' => 'recruiter_1',
                'workfield' => 'Développement',
                'stack' => ['Python'],
                'title' => 'Développeur Python Django H/F (impact environnemental)',
                'description' => "<p><strong>L&rsquo;entreprise</strong></p>

                <p>Vous cherchez du sens dans votre job ?</p>

                <p>Depuis ses d&eacute;buts il y a pr&egrave;s de 10 ans, cette soci&eacute;t&eacute; nantaise de 80 personnes a su garder son esprit d&#39;&eacute;mulation et de bienveillance.</p>

                <p>Avec efficacit&eacute; et m&eacute;thodologie, elle continue sa croissance et son d&eacute;ploiement sur de nouveaux march&eacute;s en France et &agrave; l&#39;International.</p>

                <p>L&rsquo;<strong>impact environnemental et soci&eacute;tal</strong>&nbsp;&eacute;tant directement li&eacute; &agrave; son activit&eacute;, elle place ses fondements sur l&#39;humain, le partage, la cr&eacute;ation de valeurs, au c&oelig;ur de ses pr&eacute;occupations.</p>

                <p>L&rsquo;&eacute;quipe Technique cherche aujourd&rsquo;hui &agrave; acc&eacute;l&eacute;rer son d&eacute;veloppement par le recrutement d&#39;un&nbsp;<strong>D&eacute;veloppeur Python (Django) H/F</strong>.</p>

                <p><strong>Missions :&nbsp;</strong></p>

                <p>Travailler sur plusieurs applications en ajoutant de la valeur en fonction des besoins</p>

                <ul>
                    <li>D&eacute;velopper et tester de nouvelles fonctionnalit&eacute;s en utilisant Django, Vue JS, Xamarin, PostgreSQL, Docker, REST API.</li>
                    <li>Aider le Product Owner &agrave; &eacute;tablir le plan de projet en &eacute;valuant la charge de travail et les estimations.</li>
                    <li>M&eacute;thodologies agiles, revues de code, CI, TDD, pair programming.</li>
                </ul>

                <p><strong>Environnement technique :</strong>&nbsp;</p>

                <ul>
                    <li>Python (Django)</li>
                    <li>AWS (S3, EC2, ECS, Athena, Glue, Lambda)</li>
                    <li>Infrastructure : Docker, Jenkins, Terraform</li>
                    <li>Dagster</li>
                    <li>MLFlow</li>
                    <li>Git (Github)</li>
                </ul>

                <p>Le profil que nous recherchons</p>

                <ul>
                    <li>Exp&eacute;rience id&eacute;alement de 5 ans en d&eacute;veloppement Python (Django)&nbsp;&nbsp;</li>
                    <li>Passionn&eacute;(e) par l&rsquo;infra et l&rsquo;automatisation.</li>
                    <li>Pragmatique et craftman (woman) dans l&rsquo;&acirc;me, vous fa&ccedil;onnez l&rsquo;infra pour r&eacute;pondre &agrave; tous ses enjeux (configurabilit&eacute;, disponibilit&eacute;, s&eacute;curit&eacute;, r&eacute;silience, supervision, etc.).</li>
                    <li>Curieux(se) et autodidacte, vous aimez toujours apprendre des nouvelles choses et relever de nouveaux d&eacute;fis.</li>
                    <li>Sociable et empathique : monter de l&rsquo;infra, c&#39;est cool, construire des produits &agrave; plusieurs, c&#39;est mieux !</li>
                    <li>Ouvert(e) d&rsquo;esprit, avoir des certitudes c&rsquo;est fort, savoir les remettre en questions encore plus fort !</li>
                    <li>Maintenir une veille permanente sur les nouvelles technologies.</li>
                    <li>Venir avec sa bonne humeur.</li>
                </ul>

                <p><strong><em>Les + :</em></strong>&nbsp;</p>

                <ul>
                    <li>L&rsquo;apprentissage et l&rsquo;&eacute;volution pour t&#39;&eacute;panouir professionnellement</li>
                    <li>Travailler sur un produit &agrave; fort impact sur l&#39;environnement</li>
                    <li>T&eacute;l&eacute;travail et flexibilit&eacute; dans les horaires de travail. Poste s&eacute;dentaire bas&eacute; &agrave; Nantes (Ouest) si pas de t&eacute;l&eacute;travail.</li>
                    <li>Mutuelle prise en charge par l&rsquo;entreprise &agrave; 50%.</li>
                    <li>Un accompagnement &agrave; la mobilit&eacute; financ&eacute; (trouver un logement, une &eacute;cole, une cr&egrave;che, un quartier sur Nantes et ses alentours).</li>
                    <li>Titres restaurant, Prime transport travail/domicile prise en charge &agrave; 100%, Cagnotte sport et biblioth&egrave;que, Journ&eacute;es par &ldquo;enfant malade&rdquo; pour les parents&hellip;</li>
                </ul>
                ",
                'address' => '1 rue des rivières',
                'address_complement' => '3ème étage',
                'postal_code' => '44000',
                'city' => 'Nantes',
                'department' => 44,
            ],
            [
                'open' => true,
                'contract' => 'contract_CDI',
                'recruiter' => 'recruiter_2',
                'workfield' => 'Développement',
                'stack' => ['mySQL', 'Python'],
                'title' => 'Head of Data H/F (Secteur economie solidaire)',
                'description' => "<p>Je suis Nicolas, Consultant recrutement chez Externatic, je vous propose aujourd&rsquo;hui de d&eacute;couvrir l&rsquo;offre ci-dessous et d&rsquo;&eacute;changer ensemble : plut&ocirc;t en visio ? Ou autour d&rsquo;un verre ? Je serai ravi de vous accompagner et de vous pr&eacute;senter ce job plus en d&eacute;tail !</p>

                <p>&nbsp;</p>

                <p><strong>L&#39;entreprise :</strong></p>

                <p>Notre client est une p&eacute;pite nataise (spin off d&#39;un groupe industriel), une startup high-tech sp&eacute;cialis&eacute;e en logistique qui con&ccedil;oit des produits IoT r&eacute;pondant aux enjeux environnementaux du monde de demain. Elle compte 70 collaborateurs r&eacute;partis sur les sites de Nantes, Paris et Berlin. C&#39;est une jeune entreprise innovante et dynamique !</p>

                <p>&nbsp;</p>

                <p><strong>Le poste :</strong></p>

                <p>Au sein du p&ocirc;le d&eacute;veloppement, vous int&eacute;grez une &eacute;quipe travaillant en mode agile, en tant que d&eacute;veloppeur back end Go.</p>

                <p>Vos missions seront les suivantes :</p>

                <ul>
                    <li>D&eacute;velopper des services connect&eacute;s dans le back-end, en interaction avec les &eacute;quipes web, mobile et embarqu&eacute;</li>
                    <li>Participer aux choix d&rsquo;architecture technique en co-construction avec les diff&eacute;rents experts techniques</li>
                    <li>&Ecirc;tre partie prenante des &eacute;changes techniques avec les partenaires pour la mise en place de liaison cloud to cloud<br />
                    Impl&eacute;menter les tests unitaires et les tests syst&egrave;me</li>
                </ul>

                <p>Environnement technique : AWS micro-services, Go, RESTful API, GitHub, PostgreSQL, Kubernetes<br />
                M&eacute;thode : principes agiles, CI/CD</p>

                <p>&nbsp;</p>

                <p><strong>Les plus du poste :</strong></p>

                <ul>
                    <li>Environnement technique&nbsp;<strong>innovant</strong>&nbsp;(projets 100% Google Cloud, Objets connect&eacute;s, mobile)</li>
                    <li><strong>Gros enjeux techniques</strong>&nbsp;(large scalabilit&eacute;)&nbsp;</li>
                    <li>Implication sur tous les projets</li>
                </ul>

                <p>&nbsp;</p>

                <p><strong>Conditions de travail / En pratique :</strong></p>

                <ul>
                    <li>Localisation : Nord Est de Nantes</li>
                    <li>Entreprise ax&eacute;e bien-&ecirc;tre au travail&nbsp;</li>
                    <li>Environnement collaboratif</li>
                    <li>Salaire : 40 000 - 50 000 &euro;</li>
                </ul>

                <p>&nbsp;</p>

                <p><strong>Ce que vous allez y gagner / Pourquoi postuler ?</strong></p>

                <ul>
                    <li>Employabilit&eacute;</li>
                    <li>Expertise d&eacute;velopp&eacute;e</li>
                    <li>Career Path</li>
                    <li>Contexte international</li>
                </ul>

                <p>&nbsp;</p>

                <p><strong>Process de recrutement :</strong></p>

                <ul>
                    <li>Un entretien avec Nicolas d&#39;Externatic</li>
                    <li>Un rendez-vous sur site ou en visio avec votre futur responsable et la direction</li>
                    <li>Un deuxi&egrave;me &eacute;change sur site</li>
                </ul>

                <p>Le profil que nous recherchons</p>

                <p><strong>Ce que vous apportez :</strong></p>

                <p>De formation sup&eacute;rieure en informatique, vous justifiez d&#39;une solide exp&eacute;rience en d&eacute;veloppement backend. Vous avez eu une premi&egrave;re approche du d&eacute;veloppement en&nbsp;<strong>Go</strong>&nbsp;et avez un r&eacute;el int&eacute;ret pour les technologies Google (<strong>Cloud, Appengine, Firebase</strong>). Vous avez envie de vous amuser dans un contexte&nbsp;<strong>mobile et objets connect&eacute;s.</strong></p>

                <p>&nbsp;</p>

                <p>Une bonne connaissance du Backend et de la stack technique (AWS micro-services, Go, RESTful API, GitHub, PostgreSQL, Kubernetes) de l&#39;entreprise seraient un plus. Vous souhaitez travailler en mode Agile. Vous souhaitez int&eacute;grer une structure dynamique, innovante et vous assurez une veille continue sur les nouvelles technologies et les nouvelles tendances du web.&nbsp;</p>

                <p>Vous parlez couramment anglais et pouvez travailler dans une &eacute;quipe internationale et multi-sites.</p>

                <p>Dynamique et cr&eacute;atif, vous &ecirc;tes &eacute;galement quelqu&#39;un d&#39;autonome, de rigoureux et force de proposition.</p>

                <p>&nbsp;</p>

                <p><strong>&Agrave; propos d&#39;Externatic :</strong></p>

                <p>Cabinet de recrutement Tech, la mission d&rsquo;Externatic est de faciliter la rencontre entre candidats et entreprises. Nous mettons notre r&eacute;seau et notre connaissance du march&eacute; de la Tech (&eacute;tude des salaires, tendances) &agrave; votre disposition pour vous &eacute;pauler dans toutes les &eacute;tapes de votre recherche.</p>

                <p>Notre moteur : vous accompagner sur du long terme pour trouver l&rsquo;opportunit&eacute; en CDI, qui correspond &agrave; votre projet professionnel, et surtout vous proposer un acc&egrave;s privil&eacute;gi&eacute; &agrave; des opportunit&eacute;s cach&eacute;es au sein de p&eacute;pites (startup / &eacute;diteur / DSI / PME).<br />
                Chez nous, le c&ocirc;t&eacute; humain prime et nous sommes transparents sur nos actions : ici, chaque offre d&rsquo;emploi correspond &agrave; un poste r&eacute;el !</p>

                <ul>
                    <li>Externatic en bref :</li>
                    <li>+750 postes ouverts HORS ESN</li>
                    <li>+94% de p&eacute;riodes d&rsquo;essais valid&eacute;es</li>
                    <li>18 consultants pour vous accompagner</li>
                    <li>+250 entreprises qui nous font confiance</li>
                    <li>Sponsoring de meetup tech</li>
                    <li>300 candidats accompagn&eacute;s par an dans la recherche d&rsquo;un nouveau d&eacute;fi professionnel</li>
                </ul>

                <p>Rejoignez notre communaut&eacute; sur LinkedIn !</p>
                ",
                'address' => '1 rue des rivières',
                'address_complement' => '4ème étage',
                'postal_code' => '63000',
                'city' => 'Clermont-Ferrand',
                'department' => 63,
            ],
            [
                'open' => true,
                'contract' => 'contract_CDI',
                'recruiter' => 'recruiter_1',
                'workfield' => 'Développement',
                'stack' => ['PHP'],
                'title' => 'Développeur Back end GO H/F (impact environnemental)',
                'description' => "<p>Je suis Mathieu, Consultant recrutement chez Externatic, je vous propose aujourd&rsquo;hui de d&eacute;couvrir l&rsquo;offre ci-dessous et d&rsquo;&eacute;changer ensemble : plut&ocirc;t en visio ? Ou autour d&rsquo;un verre ? Je serai ravi de vous accompagner et de vous pr&eacute;senter ce job plus en d&eacute;tail !</p>

                <p>&nbsp;</p>

                <p>Notre client,<strong>&nbsp;Editeur de logiciel,</strong>&nbsp;d&eacute;veloppe une solution&nbsp;<strong>Saas</strong>&nbsp;pour&nbsp;collecter de la data&nbsp;sur les&nbsp;<strong>&eacute;nergies propres</strong>&nbsp;(&eacute;oliennes, photovolta&iuml;que, turbine hydraulique...) afin d&#39;optimiser leur utilisation et assurer la maintenance. Leurs&nbsp; parcs sont implant&eacute;s partout dans le monde et leur produit est d&eacute;sormais r&eacute;f&eacute;renc&eacute; au catalogue du&nbsp;<strong>leader mondial de la decarbonisation des industries.</strong></p>

                <p>Pour renforcer l&#39;&eacute;quipe technique d&#39;une trentaine de personne, nous proposons une cr&eacute;ation de poste pour les rejoindre en tant que&nbsp;<strong>d&eacute;veloppeur GoLang</strong>.</p>

                <p>Dans une entreprise qui favorise l&#39;<strong>innovation, la R&amp;D et le machine learning</strong>&nbsp;et qui plus est dans un secteur d&#39;activit&eacute; qui a le vent en poupe.</p>

                <p>Vous serez amen&eacute; &agrave; travailler avec une &eacute;quipe compos&eacute;e de&nbsp;<strong>diff&eacute;rents profils</strong>&nbsp;: architectes, devops, back end, front end, test et qualit&eacute;, chef de projet...&nbsp;</p>

                <p>Vous souhaitez faire partie d&#39;une &eacute;quipe motiv&eacute;e et vous &ecirc;tes persuad&eacute; que tout reste &agrave; inventer ?</p>

                <p><u>Voici les missions qui vous sont propos&eacute;es :&nbsp;</u></p>

                <ul>
                    <li>
                    <ul>
                        <li>Etude et d&eacute;veloppement d&rsquo;interfaces</li>
                    </ul>
                    </li>
                </ul>

                <ul>
                    <li>
                    <ul>
                        <li>D&eacute;veloppement des couches d&rsquo;int&eacute;gration des donn&eacute;es collect&eacute;es en base de donn&eacute;es,</li>
                    </ul>
                    </li>
                </ul>

                <ul>
                    <li>
                    <ul>
                        <li>Configuration des acc&egrave;s aux syst&egrave;mes (plateforme SaaS),</li>
                    </ul>
                    </li>
                </ul>

                <ul>
                    <li>
                    <ul>
                        <li>Optimisation de l&rsquo;architecture structur&eacute;e en micro services (dockerisation),</li>
                    </ul>
                    </li>
                </ul>

                <ul>
                    <li>
                    <ul>
                        <li>Etude, d&eacute;veloppement et mise en place de nouvelles fonctionnalit&eacute;s innovantes de la plateforme et d&rsquo;outils d&rsquo;automatisation des op&eacute;rations de maintenance</li>
                    </ul>
                    </li>
                </ul>

                <p>Vous serez dans un&nbsp;<strong>environnement de travail avec les derni&egrave;res technos&nbsp;</strong>du moment (langage de programmation, architecture, algorithme de machine&nbsp;learning...).</p>

                <p>Le profil que nous recherchons</p>

                <p>De&nbsp;<strong>formation Bac +4/5</strong>&nbsp;en Informatique (<strong>admin-sys ou d&eacute;veloppeur</strong>), en autonomie sur vos activit&eacute;s, vous disposez &eacute;galement d&rsquo;une connaissance Linux.</p>

                <p>Vous avez un go&ucirc;t prononc&eacute; pour l&#39;<strong>automatisation</strong>&nbsp;et une capacit&eacute; de&nbsp;<strong>scripting avanc&eacute;e ;</strong>&nbsp;voire de d&eacute;veloppement, bien au-del&agrave; de bash (Python en priorit&eacute;)</p>

                <p>Vous &ecirc;tes curieux et en&nbsp;<strong>veille&nbsp;sur les nouvelles&nbsp;technos</strong>.</p>

                <p>Capacit&eacute; d&#39;analyse pouss&eacute;e (voir large) et capacit&eacute; &agrave; documenter.</p>

                <p>Go&ucirc;t pour le travail en &eacute;quipes pluri-disciplinaires, exp&eacute;rience du travail en mode projets (<strong>classiques et agiles</strong>).</p>

                <p><em><strong>Pourquoi postuler ?</strong></em></p>

                <ul>
                    <li>
                    <ul>
                        <li>Equipe &agrave; taille humaine&nbsp;avec une culture d&#39;entreprise autour de projets &eacute;co-responsable</li>
                    </ul>
                    </li>
                </ul>

                <ul>
                    <li>
                    <ul>
                        <li>T&eacute;l&eacute;travail hybride (plusieurs jours/semaine)</li>
                    </ul>
                    </li>
                </ul>

                <ul>
                    <li>
                    <ul>
                        <li>Libert&eacute; d&#39;utilisation de nouveaux outils</li>
                    </ul>
                    </li>
                </ul>

                <ul>
                    <li>
                    <ul>
                        <li>Prise de d&eacute;cision sur les projets avec les &eacute;quipes</li>
                    </ul>
                    </li>
                </ul>

                <ul>
                    <li>
                    <ul>
                        <li>Entreprise qui rayonne au niveau mondial</li>
                    </ul>
                    </li>
                </ul>

                <ul>
                    <li>
                    <ul>
                        <li>Tickets restaurants</li>
                    </ul>
                    </li>
                </ul>

                <ul>
                    <li>
                    <ul>
                        <li>Transport en commun &agrave; proximit&eacute;</li>
                    </ul>
                    </li>
                </ul>

                <ul>
                    <li>
                    <ul>
                        <li>Locaux spacieux, agr&eacute;ables et pr&egrave;s de l&#39;Erdre</li>
                    </ul>
                    </li>
                </ul>
                ",
                'address' => '1 rue des rivières',
                'address_complement' => '5ème étage',
                'postal_code' => '44000',
                'city' => 'Nantes',
                'department' => 44,
            ],
            [
                'open' => false,
                'contract' => 'contract_CDI',
                'recruiter' => 'recruiter_0',
                'workfield' => 'Développement',
                'stack' => ['Python', 'Javascript'],
                'title' => 'Développeur fullstack React/ Python (H-F)',
                'description' => "<p><strong>L&#39;entreprise et l&#39;&eacute;quipe</strong></p>

                <p>La mission de cette entreprise est simple : fournir une plateforme SaaS efficace qui permet &agrave; tous de cr&eacute;er et diffuser rapidement des exp&eacute;riences data qui nourrissent leurs activit&eacute;s.&nbsp;</p>

                <p>Depuis plus de 10 ans, et cr&eacute;&eacute;e par trois passionn&eacute;s, ils sont aujourd&rsquo;hui pr&egrave;s de 100 collaborateurs, r&eacute;partis &agrave; Nantes et &agrave; l&#39;international.&nbsp;</p>

                <p>Ils travaillent avec des entreprises vari&eacute;es.</p>

                <p>- Plus de 350 organisations dans le monde ont d&eacute;j&agrave; adopt&eacute; leur solution<br />
                - + de 2 000 projets data avec une croissance moyenne de plus de 50% par an.</p>

                <p>Pour soutenir leur activit&eacute;, ils recrutent actuellement : Un fullstack - JS React - Python - H-F - 3 ans d&#39;exp&eacute;rience&nbsp;</p>

                <p><strong>Contexte :</strong>&nbsp;Contribuer au d&eacute;veloppement de son service de &quot;lineage&quot; et plus largement &agrave; la croissance de leur r&eacute;seau de donn&eacute;es</p>

                <p>Jeux de donn&eacute;es interne : ~50k dont un tiers est impliqu&eacute; dans une relation entre plusieurs domaines : jointure, r&eacute;utilisation dans un dashboard, republication.</p>

                <p>Ils ont donc un r&eacute;seau de jeux de donn&eacute;es qui a sa propre dynamique. L&rsquo;&eacute;quipe d&eacute;veloppe un service de lineage, bas&eacute; sur Neo4j, afin d&rsquo;exposer une partie des donn&eacute;es d&rsquo;usage du r&eacute;seau lui-m&ecirc;me et par cons&eacute;quent d&rsquo;&eacute;viter les relations cass&eacute;es et de proposer de nouvelles formes d&rsquo;analytics&nbsp;</p>

                <p>Vous int&eacute;grerez l&rsquo;&eacute;quipe Engagement au sein de la R&amp;D et travaillerez en &eacute;troite collaboration avec son PM.&nbsp;</p>

                <p><strong>Les missions</strong></p>

                <p>Concevoir et impl&eacute;menter de nouvelles fonctionnalit&eacute;s</p>

                <p>Participer au support des fonctionnalit&eacute;s d&eacute;ploy&eacute;es en production</p>

                <p>D&eacute;velopper une connaissance de la stack technique au-del&agrave; de votre squad</p>

                <p>Aider l&rsquo;&eacute;quipe Product a r&eacute;diger des sp&eacute;cifications fonctionnelles</p>

                <p>Prendre votre part de responsabilit&eacute; dans les d&eacute;cisions techniques</p>

                <p>Vous coordonnez avec les autres squads afin de d&eacute;livrer r&eacute;guli&egrave;rement des fonctionnalit&eacute;s de qualit&eacute;</p>

                <p><strong>Environnement technique :&nbsp;</strong></p>

                <p>Frontend: HTML5 / CSS, React, Typescript, Svelt, AngularJS (legacy)</p>

                <p>Backend: Celery / RabbitMQ, Elasticsearch, Python, Django/DRF, Airflow, Neo4j</p>

                <p>Infrastructure: Kubernetes, OpenVPN, SaltStack, Jenkins, Datadog, Monit, Logstash, Kibana, Grafana</p>

                <p>D&eacute;veloppement: Git / GiHub, outils au choix (par ex. PyCharm, IntelliJ, VS Code &hellip;)</p>

                <p><strong>Conditions de travail</strong></p>

                <ul>
                    <li>Localisation : Nantes centre - Paris ou fullremote&nbsp;</li>
                    <li>Remote : oui</li>
                </ul>

                <p><strong>Ce que vous allez y gagner</strong></p>

                <ul>
                    <li>Salaire : 55-65 K&euro;</li>
                    <li>Carte Lunchr (8,50&euro;/jour).</li>
                    <li>Participation &eacute;v&eacute;nement sportif en interne&nbsp;</li>
                </ul>

                <p><strong>Le process</strong></p>

                <ul>
                    <li>Traitement candidature et RDV avec Perrine Dupisson</li>
                    <li>Process interne : compter 3 &agrave; 4 &eacute;change (RH - Manager - CTO)</li>
                </ul>

                <p>Le profil que nous recherchons</p>

                <p><strong>Ce que vous apportez</strong></p>

                <p>Vous ma&icirc;trisez les technologies du Web (protocoles, formats).</p>

                <p>Vous une exp&eacute;rience de programmation&nbsp;<strong>en Python &amp; React</strong></p>

                <p>Vous &eacute;crivez du code de qualit&eacute; et mettez un point d&rsquo;honneur &agrave; rendre les composants que vous d&eacute;veloppez r&eacute;utilisables.</p>

                <p>Apr&egrave;s avoir optimis&eacute; la performance de votre code, vous vous demandez comment optimiser la performance de votre code.&nbsp;</p>

                <p>&nbsp;</p>

                <p>Je suis Perrine, consultante chez Externatic, je vous propose aujourd&rsquo;hui de d&eacute;couvrir l&rsquo;offre ci-dessous et d&rsquo;&eacute;changer ensemble : plut&ocirc;t en visio ? Ou autour d&rsquo;un caf&eacute; ? Je serai ravie de vous accompagner et de vous pr&eacute;senter ce job plus en d&eacute;tail !</p>
                ",
                'address' => '1 rue des rivières',
                'address_complement' => '5ème étage',
                'postal_code' => '59000',
                'city' => 'Lille',
                'department' => 59,
            ],
            [
                'open' => false,
                'contract' => 'contract_CDI',
                'recruiter' => 'recruiter_0',
                'workfield' => 'Développement',
                'stack' => ['Javascript'],
                'title' => 'Front end developer React H/F streaming video',
                'description' => "<p>Je suis Benjamin Casseron, consultant associ&eacute; chez Externatic, je vous propose aujourd&rsquo;hui de d&eacute;couvrir l&rsquo;offre ci-dessous et d&rsquo;&eacute;changer ensemble : plut&ocirc;t en visio ? Ou autour d&rsquo;un caf&eacute; ? Je serai ravi de vous accompagner et de vous pr&eacute;senter ce job plus en d&eacute;tail !</p>

                <p><strong>L&#39;entreprise et l&#39;&eacute;quipe</strong></p>

                <p>Implant&eacute;e &agrave; San Francisco et Londres, l&#39;entreprise &eacute;dite depuis 10 ans des solutions autour de la diffusion de vid&eacute;os (OTT, VOD, live streaming). Forte de sa tr&egrave;s bonne croissance sur 2020-2021, la soci&eacute;t&eacute; se d&eacute;veloppe et implante en France, &agrave; Nantes, une &eacute;quipe technique.</p>

                <p>Les enjeux :&nbsp;d&eacute;velopper un panel de fonctionnalit&eacute;s permettant d&#39;ouvrir vers de nouvelles activit&eacute;s (video conferencing / video gaming).</p>

                <p>Votre environnement de travail est donc international : l&#39;anglais est utilis&eacute; au quotidien.</p>

                <p>Aujourd&rsquo;hui, l&rsquo;entreprise ouvre aujourd&rsquo;hui ce poste en&nbsp;<strong>CDI</strong>&nbsp;&agrave; Nantes.</p>

                <p><strong>Les missions</strong></p>

                <p>En bin&ocirc;me avec un lead bas&eacute; aux US, vos missions consistent &agrave; :</p>

                <ul>
                    <li>Participer au d&eacute;veloppement front end
                    <ul>
                        <li>Site web</li>
                        <li>Plateforme</li>
                        <li>Player</li>
                    </ul>
                    </li>
                    <li>Architecturer, Concevoir et d&eacute;velopper&nbsp;</li>
                    <li>Intervenir sur la partie devops CI-CD</li>
                </ul>

                <p>Environnement technique :&nbsp;Git / Typescript / React / Go / AWS / DynamoDB / Cassandra / Algolia / Elasticsearch</p>

                <p><strong>Conditions de travail</strong></p>

                <ul>
                    <li>Salaire : 40000 - 50 000 &euro;&nbsp;</li>
                    <li>T&eacute;l&eacute;travail : 2 jours / semaine</li>
                    <li>RTT</li>
                    <li>Locaux Nantes Centre</li>
                </ul>

                <p><strong>Ce que vous allez y gagner</strong></p>

                <ul>
                    <li>Cr&eacute;ation de poste central dans l&rsquo;organisation</li>
                    <li>Impact fort</li>
                    <li>B2C</li>
                    <li>Environnement international (&eacute;quipes USA / UK / FR)</li>
                    <li>Un package int&eacute;ressant</li>
                </ul>

                <p><strong>Le process</strong></p>

                <ul>
                    <li>Traitement candidature et RDV avec Benjamin Casseron</li>
                    <li>RDV avec le CTO</li>
                    <li>RDV avec l&#39;&eacute;quipe</li>
                </ul>

                <p>Le profil que nous recherchons</p>

                <p><strong>Ce que vous apportez</strong></p>

                <p>Vous apportez vos comp&eacute;tences dans le domaine suivant :&nbsp;</p>

                <ul>
                    <li>Comp&eacute;tence en architecture web / outillage / d&eacute;veloppement (typescript)</li>
                </ul>

                <p>Vous aimeriez travailler dans le domaine de la vid&eacute;o.</p>

                <p>Vous aimez communiquer autour de votre passion pour les technologies web.</p>

                <p><strong>A propos d&#39;Externatic</strong></p>

                <p>Cabinet de recrutement Tech, la mission d&rsquo;Externatic est de faciliter la rencontre entre candidats et entreprises. Nous mettons &agrave; votre disposition notre r&eacute;seau et notre connaissance du march&eacute; de la Tech (&eacute;tude des salaires, tendances).</p>

                <p><strong>Notre moteur&nbsp;</strong>: vous accompagner sur du long terme pour trouver l&rsquo;opportunit&eacute;&nbsp;<strong>en CDI</strong>, qui correspond &agrave; votre&nbsp;<strong>projet professionnel</strong>, et surtout vous proposer un acc&egrave;s privil&eacute;gi&eacute; &agrave; des opportunit&eacute;s cach&eacute;es au sein de p&eacute;pites (startup / &eacute;diteur / DSI / PME).</p>

                <p>Chez nous, le c&ocirc;t&eacute; humain prime et nous sommes transparents sur nos actions : ici, chaque offre d&rsquo;emploi correspond &agrave; un poste r&eacute;el !</p>

                <p>Externatic en bref :</p>

                <ul>
                    <li>+800 postes ouverts HORS ESN&nbsp;</li>
                    <li>+94% de p&eacute;riodes d&rsquo;essais valid&eacute;es&nbsp;</li>
                    <li>18 consultants pour vous accompagner</li>
                    <li>+250 entreprises qui nous font confiance</li>
                    <li>Sponsoring de meetup tech</li>
                    <li>370 candidats accompagn&eacute;s par an dans la recherche d&rsquo;un nouveau d&eacute;fi professionnel&nbsp;</li>
                </ul>
                ",
                'address' => '1 rue des rivières',
                'address_complement' => '5ème étage',
                'postal_code' => '59000',
                'city' => 'Lille',
                'department' => 59,
            ],
            [
                'open' => true,
                'contract' => 'contract_CDI',
                'recruiter' => 'recruiter_0',
                'workfield' => 'Développement',
                'stack' => ['Javascript'],
                'title' => 'Développeur Ruby On Rails H/F (energies renouvelables)',
                'description' => "<p>Je suis Mathieu, Consultant recrutement chez Externatic, je vous propose aujourd&rsquo;hui de d&eacute;couvrir l&rsquo;offre ci-dessous et d&rsquo;&eacute;changer ensemble : plut&ocirc;t en visio ? Ou autour d&rsquo;un verre ? Je serai ravi de vous accompagner et de vous pr&eacute;senter ce job plus en d&eacute;tail !</p>

                <p>&nbsp;</p>

                <p>Notre client est un &eacute;diteur de logiciel de 60 personnes qui &eacute;dite une solution SAAS dans le secteur des &eacute;nergies renouvelables. Leur solution est bas&eacute;e sur la collecte de data et le machine learning pour faire de la pr&eacute;diction, optimiser leur performance et assurer leur maintenance.</p>

                <p><strong><u>Missions :</u></strong></p>

                <p>Int&eacute;gr&eacute; &agrave; l&rsquo;&eacute;quipe back-end vous serez en charge de&nbsp;:</p>

                <ul>
                    <li>Am&eacute;liorer des applications existantes et d&eacute;velopper les nouveaux modules.</li>
                    <li>Faire &eacute;voluer l&rsquo;architecture logicielle de la plateforme</li>
                    <li>S&rsquo;assurer de la p&eacute;rennit&eacute; du code (tests, documentation&hellip;)</li>
                </ul>

                <p>Vous d&eacute;couvrirez de nombreux aspects du framework Rails.</p>

                <p><em><u>Stack:</u></em>&nbsp;Ruby (Ruby on Rails), React.js</p>

                <p>Le profil que nous recherchons</p>

                <ul>
                    <li>Vous &ecirc;tes issu d&rsquo;une formation en informatique et vous avez une premi&egrave;re exp&eacute;rience sur&nbsp;<strong>Ruby On rails</strong>.</li>
                    <li>Vous &ecirc;tes sensibilis&eacute; &agrave; l&rsquo;acquisition de donn&eacute;es et la Dataviz</li>
                    <li>Vous avez envie de vous &eacute;panouir au sein d&rsquo;un &eacute;diteur qui vous donnera une libert&eacute; dans l&rsquo;utilisation de nouvelles technologies.</li>
                </ul>

                <p><strong><u>AVANTAGES</u></strong></p>

                <ul>
                    <li>Cet &eacute;diteur travail avec les plus grands producteurs d&rsquo;&eacute;nergie renouvelable (NEONEN, TESLA&hellip;).&nbsp;Il travaille aussi pour les plus gros projets dans le monde pour stocker de l&rsquo;&eacute;nergie renouvelables (projet d&rsquo;une batterie de 100Megawatt en Australie, projet hydrolien &agrave; Brest, etc)</li>
                    <li>Cadre de travail agr&eacute;able (bureaux et alentours)</li>
                    <li>Entreprise qui a du sens dans ses projets (l&rsquo;environnement&nbsp;!)</li>
                    <li>T&eacute;l&eacute;travail (3 &agrave; 4 jours/semaine)</li>
                </ul>
                ",
                'address' => '1 rue des rivières',
                'address_complement' => '5ème étage',
                'postal_code' => '59000',
                'city' => 'Dunkerque',
                'department' => '59',
            ],
            [
                'open' => true,
                'contract' => 'contract_CDI',
                'recruiter' => 'recruiter_4',
                'workfield' => 'Développement',
                'stack' => ['PHP'],
                'title' => 'DevOps (orienté infra) H/F',
                'description' => "<p>Je suis No&eacute; Lambert, consultant en recrutement au sein d&#39;Externatic, je vous propose aujourd&rsquo;hui de d&eacute;couvrir l&rsquo;offre ci-dessous et d&rsquo;&eacute;changer ensemble : plut&ocirc;t en visio ? Ou autour d&rsquo;un verre ? Je serai ravi de vous accompagner et de vous pr&eacute;senter ce job plus en d&eacute;tail !</p>

                <p>&nbsp;</p>

                <p><strong><u>L&#39;entreprise et l&#39;&eacute;quipe</u></strong></p>

                <p>L&#39;entreprise est un grand groupe nantais sp&eacute;cialis&eacute; dans l&rsquo;infog&eacute;rance et l&rsquo;&eacute;dition de logiciels de renomm&eacute;s.</p>

                <ul>
                    <li>Typologie de march&eacute;s : sant&eacute;, retail, transports, habitat, &hellip;</li>
                    <li>Environ 700 collaborateurs&nbsp;</li>
                    <li>Convention Syntec</li>
                    <li>Environnement multi-techno (multi-cloud, cloud hybride, public &amp; priv&eacute;)&nbsp;<br />
                    &nbsp;</li>
                </ul>

                <p><strong><u>Les missions</u></strong></p>

                <p>Int&eacute;gr&eacute; une &eacute;quipe &agrave; taille humaine compos&eacute;e d&#39;int&eacute;grateurs DevOps, de concepteurs d&eacute;veloppeurs, d&#39;architectes infrastructures..., dans un environnement multi-client, vos missions :&nbsp;</p>

                <ul>
                    <li>Participer &agrave; la mise en &oelig;uvre de plateformes mutualis&eacute;es dans un environnement DevOps collaboratif</li>
                    <li>Mettre en place de nouveaux services et produits en fonction des besoins,</li>
                    <li>G&eacute;n&eacute;rer des gains de productivit&eacute; en automatisant les d&eacute;ploiements, les t&acirc;ches r&eacute;p&eacute;titives &agrave; faible valeur ajout&eacute;e...</li>
                    <li>Maintenir les outils et scripts en conditions op&eacute;rationnelles</li>
                    <li>Adopter une d&eacute;marche d&#39;am&eacute;lioration continue (processus, qualit&eacute;, existant...)</li>
                    <li>Assurer la formation et le support aupr&egrave;s des &eacute;quipes op&eacute;rationnelles Projets et Services R&eacute;guliers</li>
                    <li>Travailler en partenariat avec les chefs de projet, les avant-ventes et les &eacute;quipes de production.</li>
                </ul>

                <p>&nbsp;</p>

                <p>L&#39;environnement technologique est &agrave; la pointe : (Puppet, Kubernetes, Ansible, Docker, Terraform, Linux, multiclouds, GCP, AWS...)&nbsp;</p>

                <p>&nbsp;</p>

                <p><strong><u>Conditions de travail</u></strong></p>

                <ul>
                    <li>Locaux : Nantes Nord Est</li>
                    <li>Une flexibilit&eacute; horaire &amp; un t&eacute;l&eacute;travail ancr&eacute; dans la culture d&#39;entreprise (2j par semaine en moyenne).&nbsp;</li>
                </ul>

                <p><strong><u>Ce que vous allez y gagner</u></strong></p>

                <ul>
                    <li>Un beau package (autour de 45K + primes annuelles, int&eacute;ressement et prime vacance, tickets restaurants)&nbsp;</li>
                    <li>De nombreux &eacute;v&egrave;nements organis&eacute;s par le CE de l&#39;entreprise. (voyages, challenges techs, soir&eacute;es ...)</li>
                    <li>Des locaux &eacute;quip&eacute;s de douches pour les sportifs, et m&ecirc;me un potager avec des fruits &amp; l&eacute;gumes frais le midi pour les gourmands !&nbsp;</li>
                    <li>Perspectives d&#39;&eacute;volution en interne via passage de certification ou mobilit&eacute; interne.</li>
                    <li>Petit plus, l&#39;ann&eacute;e derni&egrave;re 20% des postes ont connu des &eacute;volutions en interne.&nbsp;</li>
                </ul>

                ",
                'address' => '1 rue de la gare',
                'address_complement' => 'Bat. C',
                'postal_code' => '69000',
                'city' => 'Lyon',
                'department' => 69,
            ],
            [
                'open' => true,
                'contract' => 'contract_CDI',
                'recruiter' => 'recruiter_5',
                'workfield' => 'Data',
                'stack' => ['Python'],
                'title' => 'Data Analyst H/F',
                'description' => "<p><strong><u>L&#39;entreprise et l&#39;&eacute;quipe</u></strong></p>

                <p>&nbsp;</p>

                <p>Cette ETI industrielle internationale, sp&eacute;cialis&eacute;e dans le domaine ferroviaire, souhaite renforcer ses &eacute;quipes dans le cadre de la mutualisation de ses ERP.</p>

                <p><strong>La DSI</strong>&nbsp;comprend 4 personnes sur le site de Crespin avec des centres de comp&eacute;tences internes et externes &agrave; l&#39;international.&nbsp;</p>

                <p>&nbsp;</p>

                <p><strong><u>Les missions</u></strong></p>

                <p>Vous aurez notamment en charge :</p>

                <ul>
                    <li>Challenger les directions m&eacute;tiers dans l&rsquo;expression de leurs besoins,</li>
                    <li>Fournir un support analytique pour la r&eacute;alisation de data mining et d&#39;analyses de donn&eacute;es complexes et cr&eacute;er des algorithmes simples de data mining,</li>
                    <li>Industrialiser le processus pour les donn&eacute;es les plus int&eacute;ressantes,</li>
                    <li>Organiser, synth&eacute;tiser et traduire l&#39;information pour faciliter la prise de d&eacute;cision,</li>
                    <li>Participer aux travaux en mati&egrave;re de Business Intelligence, et sur les donn&eacute;es et fonctionnalit&eacute;s requises,</li>
                    <li>Partager les meilleures pratiques et r&eacute;diger les manuels utilisateurs,</li>
                    <li>Valider les sp&eacute;cifications,</li>
                    <li>Cr&eacute;er et g&eacute;rer des rapports en utilisant les logiciels disponibles tels que MyReport, PowerBI, Tableau, QlikView</li>
                    <li>Vulgarisation des probl&eacute;matiques techniques</li>
                </ul>

                <p>&nbsp;</p>

                <p><strong>Technos principales / environnement :&nbsp;&nbsp;</strong>SGBD SQL, ETL, BI : MyReport, PowerBI, Tableau, QlikView</p>

                <p>&nbsp;</p>

                <p>&nbsp;</p>

                <p><strong><u>Conditions de travail</u></strong></p>

                <ul>
                    <li><strong>Salaire :</strong>&nbsp;45 000 &agrave; 55 000&euro; / an pour le profil attendu</li>
                    <li><strong>Remote :</strong>&nbsp;2 jours / semaines&nbsp;</li>
                    <li><strong>Localisation :</strong>&nbsp;Crespin (59)</li>
                    <li><strong>&Eacute;change en anglais r&eacute;guliers</strong></li>
                </ul>
                ",
                'address' => '1 rue de la gare',
                'address_complement' => 'Bat. C',
                'postal_code' => '35000',
                'city' => 'Rennes',
                'department' => 35,
            ],
            [
                'open' => true,
                'contract' => 'contract_CDD',
                'recruiter' => 'recruiter_6',
                'workfield' => 'Data',
                'stack' => ['Java'],
                'title' => 'Lead tech Java Data H/F',
                'description' => "<p><strong>L&#39;entreprise</strong>&nbsp;:</p>

                <p>Cette entreprise industrielle nantaise, intervenant &agrave; l&#39;international, cherche &agrave; se renforcer au sein de son centre R&amp;D.</p>

                <p>Ils cherchent aujourd&#39;hui &agrave; impl&eacute;menter une plateforme de traitement de donn&eacute;es. Ce projet est strat&eacute;gique, il s&#39;agira d&#39;assurer un r&ocirc;le de lead tech, homologue technique du Product Owner en place.</p>

                <p>&nbsp;</p>

                <p><strong>Vos missions :</strong></p>

                <p>Vos objectifs seront de :</p>

                <ul>
                    <li>Promouvoir la collaboration et l&rsquo;engagement au sein de l&rsquo;&eacute;quipe technique, aider l&rsquo;&eacute;quipe &agrave; d&eacute;velopper ses comp&eacute;tences techniques</li>
                    <li>Impl&eacute;menter une solution correspondant aux besoins exprim&eacute;s par le Product Owner</li>
                    <li>Animer les ateliers d&rsquo;affinage technique</li>
                    <li>Porter la roadmap technique</li>
                    <li>Garantir la qualit&eacute; et&nbsp;la coh&eacute;sion&nbsp;humaine et technique&nbsp;</li>
                </ul>

                <p>&nbsp;</p>

                <p><strong>Stack technique :</strong></p>

                <ul>
                    <li>RHEL, Debian / Python, Java, SpringBoot &nbsp;/ Kubernetes, Docker / Airflow, Spark / Git, Gitlab, Gitlab-ci / Gherkin / Parquet, DeltaLake / Prometheus, openTelemetry, jaeger</li>
                </ul>

                <p>&nbsp;</p>

                <p><strong>Ce que vous allez y gagner :</strong></p>

                <ul>
                    <li>Contribuer activement &agrave; un projet strat&eacute;gique d&#39;entreprise</li>
                    <li>Contexte R&amp;D avec de nombreux projets notamment li&eacute;s &agrave; des syst&egrave;mes &eacute;lectronique (ce ne sont pas que des applications !!!)</li>
                    <li>Niveau technique &eacute;lev&eacute;e (nombreux chercheurs, experts techniques, ...)</li>
                    <li>Entreprise &agrave; dimension internationale</li>
                    <li>R&eacute;mun&eacute;ration attractive et conditions sociales avantageuses</li>
                    <li>Dispositif horaire permettant d&rsquo;allier vie professionnelle et personnelle</li>
                </ul>

                <p>Le profil que nous recherchons</p>

                <p><strong>Ce que vous apportez&nbsp;</strong></p>

                <p>&nbsp;</p>

                <p>Dipl&ocirc;m&eacute; d&#39;une &eacute;cole d&#39;ing&eacute;nieur ou formation sup&eacute;rieure, vous avez une bonne maitrise de l&#39;anglais et vous justifiez d&#39;une exp&eacute;rience minimum de 5 ans en d&eacute;veloppement acquise sur des projets g&eacute;rant de gros volumes de donn&eacute;es, d&eacute;ploy&eacute;s sur des architectures conteneuris&eacute;es.</p>

                <p>&nbsp;</p>

                <p><strong>Hard skills :</strong></p>

                <ul>
                    <li>Comp&eacute;tences techniques : architecture micro service, Java, Python, gestionnaire de workflow, CI/CD, syst&egrave;me de gestion de stockage&nbsp;</li>
                    <li>Etre en capacit&eacute; de d&eacute;finir une roadmap produit et r&eacute;aliser des choix techniques</li>
                    <li>Accompagner l&#39;&#39;&eacute;quipe technique : d&eacute;finition et suivi des bonnes pratiques, formation et aide &agrave; la mont&eacute;e en comp&eacute;tences</li>
                    <li>Connaissance des pratiques agiles</li>
                </ul>

                <p>&nbsp;</p>

                <p><strong>Soft skills :</strong></p>

                <ul>
                    <li>Dot&eacute; d&#39;un leadership, vous savez cr&eacute;er le consensus et &ecirc;tes reconnu pour votre rigueur</li>
                    <li>Vous avez le sens du service et le sens de l&#39;&eacute;coute&nbsp;</li>
                    <li>Vous disposez de bonnes capacit&eacute;s de communication &eacute;crites et orales</li>
                </ul>

                <p>&nbsp;</p>

                <p><strong><u>A propos d&#39;Externatic</u></strong></p>

                <p>Cabinet de recrutement Tech, la mission d&rsquo;Externatic est de faciliter la rencontre entre candidats et entreprises. Nous mettons &agrave; votre disposition notre r&eacute;seau et notre connaissance du march&eacute; de la Tech (&eacute;tude des salaires, tendances).</p>

                <p><strong>Notre moteur&nbsp;</strong>: vous accompagner sur du long terme pour trouver l&rsquo;opportunit&eacute;&nbsp;<strong>en CDI</strong>, qui correspond &agrave; votre&nbsp;<strong>projet professionnel</strong>, et&nbsp;surtout vous proposer un acc&egrave;s privil&eacute;gi&eacute; &agrave; des opportunit&eacute;s cach&eacute;es au sein de p&eacute;pites (startup / &eacute;diteur / DSI / PME).</p>

                <p>Chez nous, le c&ocirc;t&eacute; humain prime et nous sommes transparents sur nos actions : ici, chaque offre d&rsquo;emploi correspond &agrave; un poste r&eacute;el !</p>

                <p>Externatic en bref&nbsp;:</p>

                <ul>
                    <li>27 consultants (bas&eacute;s &agrave; Nantes, Lille, Bordeaux, Rennes, La Roche sur Yon, ...)</li>
                    <li>+ de 800 postes ouverts HORS ESN</li>
                    <li>+ de 94% de p&eacute;riodes d&rsquo;essais valid&eacute;es&nbsp;</li>
                    <li>+de 400 entreprises qui nous font confiance</li>
                    <li>Sponsoring de meetup tech</li>
                    <li>330 candidats accompagn&eacute;s par an dans la recherche d&rsquo;un nouveau d&eacute;fi professionnel&nbsp;</li>
                </ul>

                ",
                'address' => '1 rue de la victoire',
                'address_complement' => '',
                'postal_code' => '44000',
                'city' => 'Nantes',
                'department' => 44,
            ],
            [
                'open' => false,
                'contract' => 'contract_CDD',
                'recruiter' => 'recruiter_7',
                'workfield' => 'Développement',
                'stack' => ['PHP'],
                'title' => 'Développeur Symfony / H/F',
                'description' => "<p>Je suis Nicolas, Consultant en recrutement chez Externatic, je vous propose aujourd&rsquo;hui de d&eacute;couvrir l&rsquo;offre ci-dessous et d&rsquo;&eacute;changer ensemble : plut&ocirc;t en visio ? Ou autour d&rsquo;un verre ? Je serai ravi de vous accompagner et de vous pr&eacute;senter ce job plus en d&eacute;tail !</p>

                <p><strong>L&#39;entreprise et l&#39;&eacute;quipe :</strong></p>

                <p>Agence digitale du centre-ville de Rennes et forte d&#39;une dizaine d&#39;ann&eacute;es d&#39;existence, elle accompagne ses clients dans la conception, le d&eacute;veloppement de dispositifs digitaux sur-mesures.</p>

                <p>Reconnue pour sa maitrise des solutions open source, sa cr&eacute;a et son engagement, elle cherche actuellement &agrave; se renforcer et &agrave; compl&eacute;ter son &eacute;quipe de d&eacute;veloppement (5 personnes) avec&nbsp;un&nbsp;<strong>d&eacute;veloppeur Symfony / CMS</strong>.&nbsp;</p>

                <p><strong>Les missions :</strong></p>

                <ul>
                    <li>D&eacute;veloppement application web et sites internets sur PHP / Symfony</li>
                    <li>Am&eacute;liorer et optimiser les fonctionnalit&eacute;s existantes</li>
                    <li>Conception - Maintenance - Documentation - Gestion des connaissances</li>
                    <li>Respect des&nbsp;<strong>bonnes pratiques&nbsp;</strong></li>
                    <li>Optimisation des BDD...</li>
                </ul>

                <p><strong>Environnement technique</strong>: PHP 7 / Symfony (3/4) / JS / CMS (Drupal surtout) / API REST / VM Lamp / Git / Gulp /...)</p>

                <p>&nbsp;</p>

                <p><strong>Conditions de travail :</strong></p>

                <ul>
                    <li>Localisation&nbsp;: hyper centre de Rennes</li>
                    <li>Proximit&eacute; transports en commun&nbsp;</li>
                    <li>Entreprise jeune et dynamique</li>
                    <li>Un bureau atypique</li>
                    <li>1 jour de t&eacute;l&eacute;travail possible</li>
                </ul>

                <p><strong>Ce que vous allez y gagner :</strong></p>

                <ul>
                    <li>Poste &agrave; &eacute;volution</li>
                    <li>Salaire cible : 40K&euro;</li>
                    <li>Avantages : prime vacances, int&eacute;ressement sur r&eacute;sultat ...</li>
                </ul>

                <p>&nbsp;</p>

                <p><strong>Process de recrutement :</strong></p>

                <ul>
                    <li>Traitement de la candidature et RDV avec Nicolas</li>
                    <li>Un &eacute;change avec le CTO de l&#39;entreprise et/ou les associ&eacute;s</li>
                </ul>

                <p>Le profil que nous recherchons</p>

                <p><strong>Ce que vous apportez :</strong></p>

                <p>Une exp&eacute;rience de 3/4 ans est attendue car une mont&eacute;e en comp&eacute;tence technique n&#39;est pas envisageable.</p>

                <ul>
                    <li>Vous maitrisez parfaitement les environnements&nbsp;<strong>PHP</strong>&nbsp;et le framework&nbsp;<strong>Symfony</strong>&nbsp;et es &agrave; l&#39;aise avec l&#39;utilisation et le dev autour de CMS&nbsp;</li>
                    <li>Vous &ecirc;tes passionn&eacute; d&#39;informatique et effectues&nbsp;<strong>beaucoup de veille</strong>.</li>
                    <li>Quand on vous parle de SEO et de ses probl&eacute;matiques tu t&#39;y retrouves</li>
                    <li>Vous &ecirc;tes adepte des&nbsp;<strong>bonnes pratiques (code propre, craftsmanship...)&nbsp;</strong>et la&nbsp;<strong>qualit&eacute;</strong>&nbsp;est votre amie</li>
                    <li>Les m&eacute;thodes agiles ne vous sont pas &eacute;trang&egrave;res.</li>
                    <li>Team spirit vivement appr&eacute;ci&eacute;&nbsp;!</li>
                </ul>

                <p>&nbsp;</p>

                <p><strong>A propos d&#39;Externatic :</strong></p>

                <p>Cabinet de recrutement Tech, la mission d&rsquo;Externatic est de faciliter la rencontre entre candidats et entreprises. Nous mettons notre r&eacute;seau et notre connaissance du march&eacute; de la Tech (&eacute;tude des salaires, tendances) &agrave; votre disposition pour vous &eacute;pauler dans toutes les &eacute;tapes de votre recherche.</p>

                <p>&nbsp;</p>

                <p>Notre moteur : vous accompagner sur du long terme pour trouver l&rsquo;opportunit&eacute; en CDI, qui correspond &agrave; votre projet professionnel, et&nbsp; surtout vous proposer un acc&egrave;s privil&eacute;gi&eacute; &agrave; des opportunit&eacute;s cach&eacute;es au sein de p&eacute;pites (startup / &eacute;diteur / DSI / PME).</p>

                <p>Chez nous, le c&ocirc;t&eacute; humain prime et nous sommes transparents sur nos actions : ici, chaque offre d&rsquo;emploi correspond &agrave; un poste r&eacute;el !</p>

                <p>&nbsp;</p>

                <p>Externatic en bref&nbsp; :</p>

                <ul>
                    <li>+750&nbsp;postes ouverts HORS ESN&nbsp;</li>
                    <li>+94% de p&eacute;riodes d&rsquo;essais valid&eacute;es&nbsp;</li>
                    <li>25 consultants pour vous accompagner</li>
                    <li>+250 entreprises qui nous font confiance</li>
                    <li>Sponsoring de meetup tech</li>
                    <li>400 candidats accompagn&eacute;s par an dans la recherche d&rsquo;un nouveau d&eacute;fi professionnel&nbsp;</li>
                </ul>
                ",
                'address' => '17 rue Marie Curie',
                'address_complement' => 'Lab F',
                'postal_code' => '59000',
                'city' => 'Lille',
                'department' => 59,
            ],
            [
                'open' => true,
                'contract' => 'contract_CDI',
                'recruiter' => 'recruiter_7',
                'workfield' => 'Développement',
                'stack' => ['PHP'],
                'title' => 'Développeur fullstack PHP Symfony / vue.js (H/F)',
                'description' => "<p><strong><u>L&#39;entreprise et l&#39;&eacute;quipe</u></strong></p>

                <p>Nous accompagnons un &eacute;diteur de logiciel SaaS bas&eacute; dans le centre de Nantes. L&#39;entreprise qui compte une quinzaine de collaborateurs et qui &eacute;volue dans le domaine de la legaltech, et d&eacute;veloppe depuis 2017 une solution SaaS pour faciliter le quotidien des juristes.&nbsp;</p>

                <p>Dans ce contexte novateur et dynamique, vous prenez part &agrave; cette aventure unique au sein d&#39;une &eacute;quipe de d&eacute;veloppeurs web &agrave; taille humaine compos&eacute;e de 2 personnes &agrave; Nantes !</p>

                <p>Le logiciel &eacute;dit&eacute; par l&rsquo;entreprise est divis&eacute; en deux parties distinctes.</p>

                <ul>
                    <li>D&rsquo;un c&ocirc;t&eacute; la partie traitement de donn&eacute;es, data science, NLP, etc. bas&eacute;e sur python</li>
                    <li>De l&rsquo;autre la partie web (portail client, pr&eacute;sentation des donn&eacute;es, back office entreprise, etc.) bas&eacute;e sur PHP Symfony 4 &amp; 6 / JS</li>
                </ul>

                <p>Vous int&egrave;grerez en l&#39;occurrence l&#39;&eacute;quipe web.&nbsp;</p>

                <p>&nbsp;</p>

                <p><strong><u>Les missions</u></strong></p>

                <p>Vous travaillez en lien avec le CTO, les &eacute;quipes de d&eacute;veloppement et les data scientists, vous aurez comme mission :&nbsp;</p>

                <ul>
                    <li>Gestion du backlog</li>
                    <li>Conception puis d&eacute;veloppement des nouvelles features</li>
                    <li>Test</li>
                    <li>D&eacute;ploiement</li>
                    <li>Maintenance / &eacute;volution</li>
                    <li>Prendre le lead sur certains projets</li>
                </ul>

                <p>L&#39;environnement technologique est &agrave; la pointe : PHP Symfony 4 &amp; 6, Javascript, PostgreSQL Python, Git, IA, Typescript...</p>

                <p><strong><u>Conditions de travail</u></strong></p>

                <ul>
                    <li>Locaux en plein centre de Nantes</li>
                    <li>Remote : 2 jours par semaine en moyenne</li>
                    <li>Prise de poste pr&eacute;vue autour de mars&nbsp;</li>
                </ul>

                <p><strong><u>Ce que vous allez y gagner</u></strong></p>

                <ul>
                    <li>Plein de belles choses &agrave; construire</li>
                    <li>Mont&eacute;e en expertise sur des technologies recherch&eacute;es</li>
                    <li>Travailler sur une solution SaaS qui a du sens</li>
                    <li>C&ocirc;toyer des &eacute;quipes ax&eacute;es IA&nbsp;</li>
                    <li>Un package int&eacute;ressant : Autour de 40K en fonction de l&#39;exp&eacute;rience</li>
                </ul>

                <p>Le profil que nous recherchons</p>

                <p><strong><u>Ce que vous apportez</u></strong></p>

                <p>D&eacute;veloppeur fullstack autonome sur l&#39;environnement PHP &amp; JS, vous :</p>

                <ul>
                    <li>Disposez d&rsquo;un background technique vous permettant de pouvoir travailler en autonomie sur Symfony, id&eacute;alement 2 &agrave; 3 ann&eacute;es ou plus.&nbsp;<br />
                    &nbsp;</li>
                    <li>T&eacute;moignez d&#39;une premi&egrave;re exp&eacute;rience sur du javascript c&ocirc;t&eacute; front (type vanilla.js ou frameworks classiques vue.js/react/angular ..)<br />
                    &nbsp;</li>
                    <li>Etes ouvert(e), compr&eacute;hensif(ve), p&eacute;dagogue.<br />
                    &nbsp;</li>
                    <li>Aimez partager avec les autres et savez adapter votre discours en fonction de votre interlocuteur.</li>
                </ul>

                <p>&nbsp;</p>

                <p><strong><u>A propos d&#39;Externatic</u></strong></p>

                <p>Cabinet de recrutement Tech, la mission d&rsquo;Externatic est de faciliter la rencontre entre candidats et entreprises. Nous mettons &agrave; votre disposition notre r&eacute;seau et notre connaissance du march&eacute; de la Tech (&eacute;tude des salaires, tendances).</p>

                <p><strong>Notre moteur&nbsp;</strong>: vous accompagner sur du long terme pour trouver l&rsquo;opportunit&eacute;&nbsp;<strong>en CDI</strong>, qui correspond &agrave; votre&nbsp;<strong>projet professionnel</strong>, et&nbsp;surtout vous proposer un acc&egrave;s privil&eacute;gi&eacute; &agrave; des opportunit&eacute;s cach&eacute;es au sein de p&eacute;pites (startup / &eacute;diteur / DSI / PME).</p>

                <p>Chez nous, le c&ocirc;t&eacute; humain prime et nous sommes transparents sur nos actions : ici, chaque offre d&rsquo;emploi correspond &agrave; un poste r&eacute;el !</p>

                <p>Externatic en bref&nbsp;:</p>

                <ul>
                    <li>+600 postes ouverts HORS ESN&nbsp;</li>
                    <li>+94% de p&eacute;riodes d&rsquo;essais valid&eacute;es&nbsp;</li>
                    <li>24 consultants pour vous accompagner</li>
                    <li>+310 entreprises qui nous font confiance</li>
                    <li>Sponsoring de meetup tech</li>
                    <li>330 candidats accompagn&eacute;s par an dans la recherche d&rsquo;un nouveau d&eacute;fi professionnel&nbsp;</li>
                </ul>

                <p>Rejoignez notre communaut&eacute; sur LinkedIn !</p>

                <p>&nbsp;</p>

                <p><strong><u>Le process</u></strong></p>

                <ul>
                    <li>Traitement candidature et RDV avec No&eacute; Lambert</li>
                    <li>RDV avec le CTO pour une premi&egrave;re prise de contact</li>
                    <li>Test technique rapide (15-30 mins)</li>
                    <li>RDV avec le CEO et le CTO&nbsp;</li>
                </ul>
                ",
                'address' => '52 rue Victor Hugo',
                'address_complement' => '',
                'postal_code' => '59140',
                'city' => 'Dunkerque',
                'department' => 59,
            ],
            [
                'open' => false,
                'contract' => 'contract_CDI',
                'recruiter' => 'recruiter_7',
                'workfield' => 'Développement',
                'stack' => ['PHP'],
                'title' => 'Lead tech PHP Symfony (H/F)',
                'description' => "<p><strong><em><u>Pourquoi ce job&nbsp;?</u></em></strong></p>

                <p>Au sein de cet &eacute;diteur rentable et p&eacute;renne situ&eacute;e dans le centre de Nantes, vous concevez / d&eacute;veloppez les nouveaux produits de l&rsquo;entreprise.</p>

                <p>Vous intervenez dans un contexte de croissance, les solutions &eacute;tant adopt&eacute;es internationalement.</p>

                <p>Le secteur implique des gros volumes de donn&eacute;es / des applications r&eacute;siliantes et scalable.&nbsp;</p>

                <p>&nbsp;</p>

                <p><strong><em><u>Missions</u></em></strong></p>

                <p>Vous rejoignez une feature team&nbsp;:</p>

                <ul>
                    <li><strong>En contexte Agile</strong>, vous serez impliqu&eacute; dans l&rsquo;&eacute;tude et le d&eacute;veloppement&nbsp;<strong>PHP / Symfony et / ou JS (en fonction des sprints et de votre app&eacute;tence)&nbsp;</strong>de la solution et de ses diff&eacute;rents modules.&nbsp;</li>
                    <li>Au sein de cette soci&eacute;t&eacute; innovante o&ugrave; le niveau technique reste tr&egrave;s relev&eacute;, vous serez amen&eacute; &agrave; faire progresser votre &eacute;quipe sur des bonnes pratiques de dev / design / architecture</li>
                    <li>La qualit&eacute; est un ma&icirc;tre mot de cette soci&eacute;t&eacute; : tests fonctionnels / unitaires / etc.</li>
                    <li>Vous participez au recrutement de votre team</li>
                    <li>Vous participez &agrave; la communaut&eacute; open source</li>
                    <li>Les sprints sont de 2 semaines avec temps off.</li>
                </ul>

                <p>En part time : contribution sur des projets open source.</p>

                <p>&nbsp;</p>

                <p><strong><em><u>Contexte technique</u></em></strong></p>

                <p>symfony / docker / kubernetes / elasticsearch / MySQL / React / Git / Behat / GCP / etc.</p>

                <p>&nbsp;</p>

                <p><strong><em><u>Qu&rsquo;allez vous apprendre&nbsp;?</u></em></strong></p>

                <p>Vous confronter avec des d&eacute;veloppeurs exp&eacute;riment&eacute;s (symfony et front end) tr&egrave;s connect&eacute; dans l&rsquo;&eacute;cosyst&egrave;me technique</p>

                <p>&nbsp;</p>

                <p><strong><em>Les plus :</em></strong></p>

                <ul>
                    <li>centre de Nantes</li>
                    <li>contexte international&nbsp;</li>
                    <li>possibilit&eacute;s d&#39;&eacute;volution&nbsp;</li>
                    <li>p&eacute;rennit&eacute; et croissance de l&#39;entreprise</li>
                </ul>

                <p>&nbsp;</p>

                <p><em><strong>Salaire :</strong></em>&nbsp;55 000 - 70 000 &euro; en fonction de l&#39;expertise</p>

                <p>&nbsp;</p>

                <p><em><strong>Le process&nbsp;</strong></em></p>

                <ul>
                    <li>RDV avec Benjamin Casseron ou Justine C&ocirc;te</li>
                    <li>RDV avec RH</li>
                    <li>RDV avec Engineering manager</li>
                    <li>RDV avec CTO</li>
                    <li>RDV avec &eacute;quipe</li>
                </ul>

                <p>Le profil que nous recherchons</p>

                <p><em><strong>Profil</strong></em></p>

                <ul>
                    <li>Amoureux du code propre, vous maitrisez PHP ainsi qu&rsquo;un framework MVC moderne</li>
                    <li>Vous souhaitez&nbsp;<strong>d&eacute;velopper votre expertise sur Symfony&nbsp;</strong></li>
                    <li>Vous avez d&eacute;j&agrave; pris le lead sur une (petite) &eacute;quipe</li>
                    <li>Maitrise imp&eacute;rative des technologies web</li>
                    <li>Vous maitrisez SQL.</li>
                    <li>Grosse sensibilit&eacute; qualit&eacute;</li>
                </ul>

                <p>&nbsp;</p>

                <p><em><strong><u>A propos d&#39;Externatic</u></strong></em></p>

                <p>Cabinet de recrutement Tech, la mission d&rsquo;Externatic est de faciliter la rencontre entre candidats et entreprises. Nous mettons &agrave; votre disposition notre r&eacute;seau et notre connaissance du march&eacute; de la Tech (&eacute;tude des salaires, tendances).</p>

                <p><strong>Notre moteur&nbsp;</strong>: vous accompagner sur du long terme pour trouver l&rsquo;opportunit&eacute;&nbsp;<strong>en CDI</strong>, qui correspond &agrave; votre&nbsp;<strong>projet professionnel</strong>, et&nbsp;surtout vous proposer un acc&egrave;s privil&eacute;gi&eacute; &agrave; des opportunit&eacute;s cach&eacute;es au sein de p&eacute;pites (startup / &eacute;diteur / DSI / PME).</p>

                <p>Chez nous, le c&ocirc;t&eacute; humain prime et nous sommes transparents sur nos actions : ici, chaque offre d&rsquo;emploi correspond &agrave; un poste r&eacute;el !</p>

                <p>Externatic en bref&nbsp;:</p>

                <ul>
                    <li>27 consultants (bas&eacute;s &agrave; Nantes, Lille, Bordeaux, Rennes, La Roche sur Yon, ...)</li>
                    <li>+ de 800 postes ouverts HORS ESN</li>
                    <li>+ de 94% de p&eacute;riodes d&rsquo;essais valid&eacute;es&nbsp;</li>
                    <li>+de 400 entreprises qui nous font confiance</li>
                    <li>Sponsoring de meetup tech</li>
                    <li>330 candidats accompagn&eacute;s par an dans la recherche d&rsquo;un nouveau d&eacute;fi professionnel&nbsp;</li>
                </ul>

                <p>Rejoins notre communaut&eacute; sur LinkedIn !&nbsp;</p>

                ",
                'address' => '17 rue John F Kennedy',
                'address_complement' => 'Entrée de garage',
                'postal_code' => '59000',
                'city' => 'Lille',
                'department' => 59,
            ],
        ];

        foreach ($offers as $key => $offer) {
            $newOffer = new Offer();
            $newOffer->setOpen($offer['open']);
            $newOffer->setTitle($offer['title']);
            $newOffer->setDescription($offer['description']);
            $newOffer->setAddress($offer['address']);
            $newOffer->setAddressComplement($offer['address_complement']);
            $newOffer->setPostalCode($offer['postal_code']);
            $newOffer->setCity($offer['city']);
            $newOffer->setRecruiter($this->getReference($offer['recruiter']));
            $newOffer->setContract($this->getReference($offer['contract']));
            $newOffer->setWorkField($this->getReference($offer['workfield']));
            $newOffer->setDepartment($offer['department']);
            foreach ($offer['stack'] as $stack) {
                $newOffer->addStack($this->getReference($stack));
            }
            $manager->persist($newOffer);
            $this->addReference('offer_' . $key, $newOffer);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ContractFixtures::class,
            PartnerFixtures::class,
            WorkFieldFixtures::class,
            RecruiterFixtures::class,
        ];
    }
}
