<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Iniciar sesión en Twitter / Twitter</title>

        <link rel="stylesheet" href="{{ asset('css/hometweet.css')}}">
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../js/tweet.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/2a1a94cebd.js" crossorigin="anonymous"></script>

    </head>
    <body>   
           <div class="nav-home">
                  <div class="svg-icon-tw-home">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                              <g>
                              <g>
                                    <path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
                                          c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
                                          c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
                                          c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
                                          c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
                                          c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
                                          C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
                                          C480.224,136.96,497.728,118.496,512,97.248z"/>
                              </g>
                              </g>
                              <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                        </svg>
                  </div>

                  <div class="list-home">
                        <li class="active"> <i class="fas fa-home"></i> Inicio</li>

                        <li><i class="fas fa-hashtag"></i> Explorar</li>
                        
                        <li><i class="far fa-bell"></i> Notificaciones</li>
                        
                        <li><i class="far fa-envelope"></i> Mensajes</li>
                        
                        <li><i class="far fa-bookmark"></i> Guardados</li>
                        
                        <li><i class="far fa-list-alt"></i> Listas</li>
                        
                        <li><i class="fas fa-user-alt"></i> Perfil</li>
                        
                        <li><i class="fas fa-ellipsis-h"></i> Mas Opciones</li>
                  </div>

                  <div class="btn-nav-tweet"> 
                      Twittear
                  </div>

                  <div class="profile">
                        <img src="../img/profile.png" alt="">
                        <div class="info-user">
                              <p class="name">Nombre</p>
                              <p class="user">NombreUsuario</p>
                        </div>
                        <i class="fas fa-ellipsis-h"></i>
                  </div>
           </div>

           <div class="timeline">
                  <div class="header-timeline">
                        <p>Inicio</p>
                        <i class="far fa-star"></i>
                  </div>
                  
                  <div class="tweet-publish">
                        <img src="../img/profile.png" alt="">
                        <div class="space-tweet">
                              <textarea placeholder="¿Qué está pasando?" name="" id="description" rows="5" ></textarea>
                              <div class="btn-tweet"> 
                                    Twittear
                              </div>
                        </div>
                  </div>
                 
                  
                  @foreach ($tweet as $index => $tw)
                  <div class="tweets">
                        <img src="../img/twitter.jpg" alt="">
                      
                        
                        <div class="info-tweet">
                              <div class="header-info-tweet">
                                    <div class="name"><strong> {{$tw['name']}}</strong></div>
                                    <div class="user">@ {{ $tw['user'] }}</div>
                                    <div class="time">{{ $tw['time'] }}</div>      
                              </div>
                              
                              <div class="body-info-tweet">
                                    {{ $tw['descripcion'] }}
                              </div>

                              <div class="footer-info-tweet">
                                    <i class="far fa-comment"></i>
                                    <i class="fas fa-retweet"></i>
                                    <i class="far fa-heart"></i>
                                    <i class="fas fa-share-square"></i>
                              </div>

                        </div>
                        
                        <div class="options-tweet">
                              <i class="fas fa-ellipsis-h"></i>
                        </div>
                  </div>
                  @endforeach
                  <div class="tweets">
                        <img src="../img/twitter.jpg" alt="">
                      
                        
                        <div class="info-tweet">
                              <div class="header-info-tweet">
                                    <div class="name"><strong>TwiiterClon</strong></div>
                                    <div class="user">@Twitter</div>
                                    <div class="time">1h</div>      
                              </div>
                              
                              <div class="body-info-tweet">
                                    Bienvenido a un clon muy basico de twitter, Twittea lo que este pasando o lo que se te venga a la mente!
                              </div>

                              <div class="footer-info-tweet">
                                    <i class="far fa-comment"></i>
                                    <i class="fas fa-retweet"></i>
                                    <i class="far fa-heart"></i>
                                    <i class="fas fa-share-square"></i>
                              </div>

                        </div>
                        
                        <div class="options-tweet">
                              <i class="fas fa-ellipsis-h"></i>
                        </div>
                  </div>
           </div>

           <div class="logout">
                  <div class="btn-logout"> 
                      Cerrar Sesión
                  </div>
           </div>
    

           <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </body>

   
   
</html>
