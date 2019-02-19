# elonmusk-php-bootstrap-sass

Index сайта находится в src/app/index.php

Index is in src/app/index.php

Training project with php, bootstrap and sass. The goal of this training project was to create a website about Elon Musk, with a gift shop, the possibility to create and user with a profile and to store your cart in the db.

This website is about Elon Musk. On the front page, the user can see some news about him pulled from the db with PDO request. 

On the shop page, the user can see all the products about elon musk or choose from different categories of products (t-shirt, stickers..). Everything is pulled from the db.

The user can also create an account on the website. There is a validation for everything, from the right format for the nickname to password validation. 

When the user is logged in, on the shop page he can put stuff in his cart. He eventually can go to his cart and delete stuff. The cart is stored in the db and not in session.

If the user have the status "admin", he can go to the backoffice, where for example he can see all the accounts created on the website. He can change informations about a user from here.

The website is mobile-friendly and the style is made with sass (exported to css/style.css via cdm -sass)



This project is not huge, but it shows some important basic functions of a website. I'm just a junior developer, so if you have any suggestions, please contact me at odyrus1@gmail.com
