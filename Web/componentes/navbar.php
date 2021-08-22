     <?php
     if(isset($_COOKIE['PHPSESSID']))
     {
        session_start();
     }  
     ?>
     
     <div class="d-flex flex-column text-white bg-dark justify-content-between" style="width: 4.5rem;">
            <a href="./index.php" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip"
                data-bs-placement="right" data-bs-original-title="Icon-only">
                <svg class="bi" width="40" height="40" viewBox="0 0 180.12 106.21" viewBox="0 0 180.12 106.21">
                    <path fill="white"
                        d="M3.38,38.06c.18-10.75,5.08-21.61,13.91-28,8.12-5.84,18.65-7.39,28.42-6.19,13.62,1.68,26,9.45,32.23,21.82,5.68,11.17,6.2,24.87,2.78,36.81-3.51,12.3-12,22-22.64,28.92a104.93,104.93,0,0,1-13,7c-5.85,2.73-11.74,4.68-18.26,4.91s-13.91-.55-19.67-3.85c-1.61-.92-3.61-2.32-3.84-4.32C3,92.43,5.92,89.77,7.8,88.13c10.69-9.35,25.74-10.28,39-6.88a60.61,60.61,0,0,1,20,9.19,79.31,79.31,0,0,1,9.08,7.8,42.93,42.93,0,0,0,7,5.87c6.07,3.75,13.36,2.67,19.48-.4a49.11,49.11,0,0,0,21.13-20.1c.94-1.69-1.65-3.21-2.59-1.52a44.72,44.72,0,0,1-13.74,15.17c-5.78,4-12.92,8-20.12,5.55-2.77-1-5-3-7.15-4.92-2.8-2.61-5.49-5.33-8.48-7.73a63.12,63.12,0,0,0-21-11C36.7,75,20.84,75,8.8,83.57c-4.28,3-11.27,9.09-7.36,14.9a14.24,14.24,0,0,0,6.32,4.73,38.66,38.66,0,0,0,10,2.71,46.25,46.25,0,0,0,23.11-2.31,109.55,109.55,0,0,0,13.31-6.34c11-6.06,20.92-14.56,26.41-26.06a55.92,55.92,0,0,0,3-39.1A43.78,43.78,0,0,0,72.92,13.67,44.16,44.16,0,0,0,53.56,2.46c-9.09-2.58-19.5-2.73-28.49.32A35.54,35.54,0,0,0,6.6,17.16,40.37,40.37,0,0,0,.69,33.89a41.77,41.77,0,0,0-.31,4.17c0,1.93,3,1.93,3,0Z"
                        transform="translate(-0.29 -0.51)" />
                    <path fill="white"
                        d="M153.45,92.39a26.16,26.16,0,0,0,1.66-10.63c-.15-3.44-1.06-6.46-3.84-8.65-5.07-4-12.8-4.54-18.72-2.31a18.93,18.93,0,0,0-4.45,33.39c12.53,8.73,26.33-7,27-19,.4-6.93-2.53-13.57-4.75-20a68.07,68.07,0,0,1-4-17.62c-.92-13.41,2.84-26.7,8.51-38.74,1-2,2-4,3-6,.9-1.7-1.68-3.22-2.6-1.51-6.38,12-11.24,25-12,38.65a61.25,61.25,0,0,0,.82,14c1.13,6.51,3.59,12.61,5.68,18.84,2,5.9,3.33,12,1,18-2,5.19-6.46,10.65-12,12.32-6.31,1.93-12-2.58-14.49-8.11a15.74,15.74,0,0,1,3.23-17.6,17.51,17.51,0,0,1,17-4.32c2.31.63,4.82,1.77,6.23,3.8a9.16,9.16,0,0,1,1.24,5,22.3,22.3,0,0,1-1.56,9.61c-.71,1.8,2.19,2.58,2.89.8Z"
                        transform="translate(-0.29 -0.51)" />
                    <path fill="white"
                        d="M150.5,92c.19,6.59,5.52,12.32,11.72,14.06a14.43,14.43,0,0,0,15.54-5.77,14.94,14.94,0,0,0,2.65-8.36c0-1.93-3-1.93-3,0a11.92,11.92,0,0,1-9.22,11.43c-6.74,1.49-14.49-4.42-14.69-11.36-.05-1.93-3.05-1.93-3,0Z"
                        transform="translate(-0.29 -0.51)" />
                    <path fill="white"
                        d="M53.91,42.28A34.55,34.55,0,0,0,75,45.61a31.16,31.16,0,0,0,23-18,33.61,33.61,0,0,0,2.87-16c-.13-1.91-3.13-1.93-3,0a30.06,30.06,0,0,1-9,23.87,28.52,28.52,0,0,1-26.3,6.75,30.08,30.08,0,0,1-7.16-2.51c-1.71-.9-3.23,1.68-1.52,2.59Z"
                        transform="translate(-0.29 -0.51)" />
                </svg> 
            </a>
            <div>
                <ul class="d-flex nav nav-pills nav-flush flex-column mb-auto text-center">
                    <li class="nav-item">
                        <!-- Peliculas -->
                        <a href="./index.php?contenido=Pelicula" class="nav-link py-3" aria-current="page" title=""
                            data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                            <svg class="bi" width="24" height="24" role="img" style="width:24px;height:24px"
                                viewBox="0 0 24 24">
                                <path fill="white"
                                    d="M5.76,10H20V18H4V6.47M22,4H18L20,8H17L15,4H13L15,8H12L10,4H8L10,8H7L5,4H4A2,2 0 0,0 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V4Z" />
                            </svg>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <!-- Serie -->
                        <a href="./index.php?contenido=Serie" class="nav-link py-3" >
                            <svg class="bi" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="white"
                                    d="M21,17H3V5H21M21,3H3A2,2 0 0,0 1,5V17A2,2 0 0,0 3,19H8V21H16V19H21A2,2 0 0,0 23,17V5A2,2 0 0,0 21,3Z" />
                            </svg>
                        </a>
                    </li>
                   
                    <li>
                        <!-- Busqueda -->
                        <a href="./busqueda.php" class="nav-link py-3" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path fill="white" d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                          </svg>
                        </a>
                    </li>
                </ul>
            </div>
            
                <div class="border-top text-white">
                    <?php 
                    if ($usuario!=null){
                    
                    ?>
                    <a href="#"
                        class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none">
                        <img src="" alt="mdo" width="24" height="24" class="rounded-circle">
                    </a>
                    <?php
                    }
                    else{
                    ?>

                    <a class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none nav-link  text-white"
                    href="./login.php"> Login 
                    </a>
                    <?php
                    }
                    ?>
                </div>
        </div>