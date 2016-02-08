<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <title>API Tetris Webservice</title>

        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

        <style>
            html, body {
                height: 100%;
                background-color: #FFF;
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
                <div class="title">Room</div>
                <div class="paragraphe">

                    <p style="font-weight: bold; text-align: center">Utilisation des méthodes de la tables room de l'api
                    <br /> <span style="margin-left: 120px">Data reçu en JSON WEBSERVICE REST</span></p>
                    <p>
                        Affichage de toutes les room<br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/room => GET</code>
                        <br /> <span style="margin-left: 70px;">Donnée des room reçu</span>
                    </p>

                    <p>
                        Création d'une room<br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/room => POST </code>
                            <br /> <span style="margin-left: 70px;">envoie des data au server : </span>

                        <code>
                            <br /> <span style="margin-left: 70px;">data[status] = (int)1|0 <1 = Actif, 0 = Inactif> </span>
                        </code>
                            <br /> <span style="margin-left: 70px;">Response JSON de confirmation</span>
                    </p>

                    <p>
                        Affichage de la donnée d'une room<br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/room/ID => GET</code>
                            <br /> <span style="margin-left: 70px;">Donnée de la room X reçu</span>
                    </p>


                    <p>
                        Mise à jour du status de la room inactif <br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/room/ID => PUT</code>
                        <br /> <span style="margin-left: 70px;">Response JSON de confirmation</span>
                    </p>


                    <p>
                        Suppression d'une room<br />
                        <code style="margin-left: 70px;">http://tetris_serveur/ws/room/ID => DELETE</code>
                            <br /> <span style="margin-left: 70px;">Réponse JSON de confirmation</span>
                    </p>

                </div>
            </div>
        </div>
    </body>
</html>
