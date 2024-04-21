<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

        <!--=============== SWIPER CSS ===============--> 
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="assets/css/styles.css">

        <title>Responsive Christmas Website</title>

        <style>
		
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            background-color: transparent;
            z-index: 999;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Shadow effect */
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header-logo {
            font-size: 24px;
            font-weight: bold;
            color: black;
            margin-right: auto; /* Move logo to the left */
        }
        
        .header-buttons {
            display: flex;
            align-items: center;
        }
        
        .header-button {
            margin-left: 22px;
            padding: 6px 10px;
            background-color: #D22B2B; /* Light red color */
            border: none;
            color: whitesmoke;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Shadow effect on cursor hover */
        }
        
        .header-button:hover {
            background-color: #ffb3b3; /* Lighter red color on cursor hover */
        }
	</style>
    
    </head>
    <body>

        <header class="header">
            <div class="header-content">
                <div class="header-logo">
                
                    Gift Wishlist Recommender System
                </div>
                <div class="header-buttons">
                    <button class="header-button" onclick="location.href='home.php'">Home</button>
                    <button class="header-button" onclick="location.href='Interface/login.php'">Login</button>
                    <button class="header-button" onclick="window.open('http://localhost:8501/', '_blank')">Gift Recommender</button>
                    <button class="header-button" onclick="location.href='Interface/users.php'">Friend List</button>
                    <button class="header-button" onclick="location.href='Interface/signup.php'">Signup</button>
                </div>
            </div>
        </header>
       

        <!--==================== MAIN ====================-->
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home" id="home">
                <div class="home__container container grid">
                    <img src="assets/img/home.png" alt="" class="home__img">

                    <div class="home__data">
                        <h1 class="home__title">Create a Wishlist and <br> Share it with a Friends!</h1>
                        <p class="home__description">
                            Christmas and a new year is about to begin, 
                            all good wishes and successes.
                        </p>
                        <a href="Interface/signup.php" class="button">Are You a New User? Sign Up here!</a>
                    </div>
                </div>
            </section>

            <!--==================== GIVING ====================-->
            <section class="giving section container">
                <h2 class="section__title">
                    Start Giving This <br> Christmas
                </h2>

                <div class="giving__container grid">
                    <div class="giving__content">
                        <img src="assets/img/giving1.png" alt="" class="giving__img">
                        <h3 class="giving__title">Surprise gifts</h3>
                        <p class="giving__description">They are the best gifts there is.</p>
                    </div>

                    <div class="giving__content">
                        <img src="assets/img/giving2.png" alt="" class="giving__img">
                        <h3 class="giving__title">Ornaments</h3>
                        <p class="giving__description">Give a moment to decorate.</p>
                    </div>

                    <div class="giving__content">
                        <img src="assets/img/giving3.png" alt="" class="giving__img">
                        <h3 class="giving__title">Lots of love</h3>
                        <p class="giving__description">Give away feelings that last forever.</p>
                    </div>
                </div>
            </section>

            <!--==================== CELEBRATE ====================-->
            <section class="celebrate section container" id="celebrate">
                <div class="celebrate__container grid">
                    <div class="celebrate__data">
                        <h2 class="section__title celebrate__title">
                            Celebrate With A <br> Lot Of Love
                        </h2>
                        <p class="celebrate__description">
                            In this holidays, celebrate with much love and peace, offering many 
                            blessings to our loved ones, friends and neighbors, wishing them 
                            a good Christmas message.
                        </p>
                        <a href="Interface/login.php" class="button">Login with your account</a>
                    </div>

                    <img src="assets/img/celebrate.png" alt="" class="celebrate__img">
                </div>
            </section>

            <!--==================== GIFT ====================-->
            <section class="gift section container" id="gift">
                <div class="gift__header">
                    <h2 class="section__title">Friend Profile List</h2>
                    <a href="Interface/users.php" class="button button-inline">Friend List</a>
                  </div>
                <div class="gift__container grid">
                    <article class="gift__card">
                        <img src="pro1.jpg" alt="" class="gift__img">
                        
                        
                        <h3 class="gift__price">Anis Amilah</h3>
                        <span class="gift__title">anis@gmail.com</span>
                    </article>

                    <article class="gift__card">
                        <img src="pro2.jpg" alt="" class="gift__img">
                        
                        
                        <h3 class="gift__price">David Parker</h3>
                        <span class="gift__title">david@gmail.com</span>
                    </article>

                    <article class="gift__card">
                        <img src="pro3.jpg" alt="" class="gift__img">
                        
                        
                        <h3 class="gift__price">Danzy Akmal</h3>
                        <span class="gift__title">danzy@gmail.com</span>
                    </article>

                    <article class="gift__card">
                        <img src="pro4.jpg" alt="" class="gift__img">
                        
                        
                        <h3 class="gift__price">Safwan Afif</h3>
                        <span class="gift__title">safwan@gmail.com</span>
                    </article>

                    <article class="gift__card">
                        <img src="pro5.jpg" alt="" class="gift__img">
                        
                        
                        <h3 class="gift__price">Akmal Fitri</h3>
                        <span class="gift__title">akmal@gmail.com</span>

                    </article>
                </div><br>

            </section>

            <!--==================== NEW ====================-->
            <section class="new section container" id="new">
                <h2 class="section__title">Browse For Gift Products</h2>
                <div class="button-center2">
                    <a href="http://localhost:8501/" class="button button-inline" target="_blank">Take a Look</a>
                </div>
                

                <div class="new__container">
                    <div class="swiper new-swiper">
                        <div class="swiper-wrapper">
                            <article class="new__card swiper-slide">
                                <div class="new__overlay"></div>

                                <img src="assets/img/new1.png" alt="" class="new__img">
                                <h3 class="new__price">$95</h3>
                                <span class="new__title">Reindeer</span>
                                
                                <button class="button new__button">
                                    <i class='bx bx-heart new__icon'></i>
                                </button>
                            </article>

                            <article class="new__card swiper-slide">
                                <div class="new__overlay"></div>

                                <img src="assets/img/new2.png" alt="" class="new__img">
                                <h3 class="new__price">$20</h3>
                                <span class="new__title">Snow Globe</span>

                                <button class="button new__button">
                                    <i class='bx bx-heart new__icon'></i>
                                </button>
                            </article>

                            <article class="new__card swiper-slide">
                                <div class="new__overlay"></div>

                                <img src="assets/img/new3.png" alt="" class="new__img">
                                <h3 class="new__price">$75</h3>
                                <span class="new__title">Sledge</span>

                                <button class="button new__button">
                                    <i class='bx bx-heart new__icon'></i>
                                </button>
                            </article>

                            <article class="new__card swiper-slide">
                                <div class="new__overlay"></div>

                                <img src="assets/img/new4.png" alt="" class="new__img">
                                <h3 class="new__price">$15</h3>
                                <span class="new__title">Christmas Wreath</span>

                                <button class="button new__button">
                                    <i class='bx bx-heart new__icon'></i>
                                </button>
                            </article>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
        

        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scroll-up"> 
            <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
        </a>

        <!--=============== SCROLL REVEAL ===============-->
        <script src="assets/js/scrollreveal.min.js"></script>

        <!--=============== SWIPER JS ===============-->
        <script src="assets/js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
    </body>
</html>