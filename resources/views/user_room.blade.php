<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <title>API Tetris Webservice</title>

        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-family: 'Lato';
            }

            .title {
                position: absolute;
                margin-left: 30%;
                margin-top: 1%;
                font-size: 96px;
                margin-bottom: 40px;
                text-decoration: none;
                color: #B0BEC5;
                opacity:0.3;
            }

            .paragraphe {
                position: absolute;
                margin-left: 15px;
                font-size: 26px;
                text-decoration: none;
                color: #B0BEC5;
            }

            a{
                text-decoration:none;
                color:#B0BEC5;
            }
            a:hover{
                color:#B0BEC5;
            }

            .fd{
                position: absolute;
                width: 100%;
                height: 100%;
            }

            #nav {
                padding: 0; margin: 0;
                text-align: center; /* centrer le texte */
                background-color: #000000;
                height: 5%;
            }
            #nav li {
                display: inline;
                list-style: none;
                color:#B0BEC5;
                font-weight: bold;
            }
            #nav a {
                display:inline-block;
                margin: 0 30px;
                color:#B0BEC5;
                font-weight: bold;
            }


        </style>
    </head>
    <body>
    <ul id="nav"><!--
	--><li><a href="{{route('home')}}">Home</a></li><!--
	--><li><a href="{{route('api_users')}}">Users</a></li><!--
	--><li><a href="{{route('api_room')}}">Room</a></li><!--
	--><li><a href="{{route('api_user_room')}}">User_room</a></li>
    </ul>

    <!--img class="fd" alt="Tetris API" src="{{ asset('img/tetris.jpg') }}"-->
        <div class="container">
            <div class="content">
                <div class="title">User_room</div>
                <div class="paragraphe">

                    <p style="font-weight: bold; text-align: center">Utilisation des méthodes de la tables user_room de l'api
                    <br /> <span style="margin-left: 120px">Data reçu en JSON WEBSERVICE REST</span></p>
                    <p>
                        Affichage de toutes les user_room<br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/user_room => GET</code>
                        <br /> <span style="margin-left: 70px;">Donnée des room reçu</span>
                    </p>



                    <p>
                        ajouter le gagnant de la partie<br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/gagner/ID => PUT </code>
                        <br /> <span style="margin-left: 70px;">Response JSON de confirmation</span>
                    </p>



                    <p>
                        ajouter le / les perdant de la partie<br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/perdu/ID => PUT </code>
                        <br /> <span style="margin-left: 70px;">Response JSON de confirmation</span>
                    </p>



                    <p>
                        Ajouter le score du joueur<br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/score/ID => PUT </code>
                            <br /> <span style="margin-left: 70px;">envoie des data au server : </span>

                        <code>
                            <br /> <span style="margin-left: 70px;">data[score] = (int)score </span>
                        </code>
                            <br /> <span style="margin-left: 70px;">Response JSON de confirmation</span>
                    </p>



                    <p>
                        ajouter si un joueur perd une ligne les adversaire gagne une ligne<br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/nbr_line/ID_USERS/ID_ROOM => PUT </code>
                        <br /> <span style="margin-left: 70px;">Attention ici c'est le joueur qui à perdu la ligne qui doit être cibler !
                        les autres vont automatiquement avoir un 1 sur le champ <b>nbr_ligne</b></span>
                        <br /> <span style="margin-left: 70px;">Response JSON de confirmation</span>
                    </p>



                    <p>
                        Restaurer les compteur après chaque ligne retirer appeler cette méthode qui remet les compteur à 0<br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/restaureCompteur/ID_ROOM => PUT </code>
                        <br /> <span style="margin-left: 70px;">Response JSON de confirmation</span>
                    </p>



                    <p>
                        Affichage de la donnée d'une user_room<br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/user_room/ID => GET</code>
                            <br /> <span style="margin-left: 70px;">Donnée de la user_room X reçu</span>
                    </p>


                    <p>
                        Qui à gagner la partie, permet de connaitre le grand gagnant<br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/quiAgagner => GET</code>
                        <br /> <span style="margin-left: 70px;">Donnée du gagnant reçu</span>
                    </p>


                    <p>
                        Qui à perdu la partie ou les parties, permet de connaitre les perdant<br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/quiAperdu => GET</code>
                        <br /> <span style="margin-left: 70px;">Donnée du perdant reçu</span>
                    </p>


                    <p>
                        Le classement de la partie<br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/classement => GET</code>
                        <br /> <span style="margin-left: 70px;">Donnée du classement reçu</span>
                    </p>


                    <p>
                        Recherche adversaire et vérification si adversaire <br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/start/ID_users/ID_room => GET</code>
                        <br /> <span style="margin-left: 70px;">Donnée du JSON reçu, si adversaire all, sinon message aucun adversaire</span>
                    </p>



                    <p>
                        <code>
                            <span>
                                Attention après une partie, supprimé dans l'ordre qui suit:
                                <br />
                                <ul>
                                    <li>D'abord dans la table room supprimer la room grâce à la méthode destroy</li>
                                    <li>Ensuite dans la table users supprimer les utilisateurs grâce à la méthode destroy</li>
                                </ul>
                            </span>
                        </code>
                    </p>

                </div>
            </div>
        </div>
    </body>
</html>
