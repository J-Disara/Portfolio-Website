<?php
  
  // Check if all necessary POST variables are set
  if(isset($_POST['firstname'], $_POST['lastname'], $_POST['phone'], $_POST['email'], $_POST['message'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];    
  }   

  // Create a new database connection
  $conn = new mysqli('localhost', 'root', '', 'contact_db');

  // Check if the connection to the database was successful
  if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
  }else{
    $stmt = $conn->prepare("insert into contacts(first_name, last_name, phone, email, message) values(?, ?, ?, ?, ?)"); // Prepare an SQL statement to insert data into the database
    $stmt->bind_param("ssiss",$firstname, $lastname, $phone, $email, $message); // Bind the POST data to the SQL statement
    $stmt->execute();// Execute the SQL statement to insert data

    echo '<script>alert("Registration successfully!");</script>';

    $stmt->close();    
    $conn->close();
  }

?>


<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Define the viewport for responsive design -->

    <title>Portfolio Website</title>

    <!-- Link to the Font Awesome CSS library -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />

    <!-- Link to the Swiper CSS library -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <link rel="stylesheet" href="./css/style.css" />
  </head>


  <body>
    <main>

      <!-- Header Section -->
      <header id="header">        

        <!-- Navigation Bar -->
        <nav> 
          <div class="container">

            <!-- Logo of the website -->
            <div class="logo">
              <img src="./img/logo4.png" alt="" />              
            </div>

            <!-- Navigation Links -->
            <div class="links">
              <ul>
                <li>
                  <a href="#header">Home</a>
                </li>
                <li>
                  <a href="#services">Services</a>
                </li>
                <li>
                  <a href="#portfolio">Portfolio</a>
                </li>
                <li>
                  <a href="#about">About</a>
                </li>
                <li>
                  <a href="#testimonials">Testimonials</a>
                </li>
                <li>
                  <a href="#contact">Contact</a>
                </li>                
              </ul>
            </div>

            <!-- Hamburger Menu for mobile navigation -->
            <div class="hamburger-menu">
              <div class="bar"></div>
            </div>            
          </div>
        </nav>

        <!-- Header Content -->
        <div class="header-content">
          <div class="container grid-2">
            <div class="column-1">
              <!-- Title with Typing Text Effect -->              
              <h3 class="post"> <span class="typing-text"></span></h3>

              <img src="./img/person6.png" class="img-element z-index" alt="" />

              <p class="text">
                Hi.. I’m Disara, nice to meet you. 
                Please take a look around!
              </p>

              <a href="#about" class="btn">About Me</a>
            </div>
          </div>
        </div>
      </header>




      <!-- Services Section -->      
      <section class="services section" id="services">
        <div class="container">
          <div class="section-header">
            <h3 class="title" data-title="What I Do">Services</h3>

            <p class="text">
              <!-- Service section description -->
              Here I turn digital dreams into reality. 
              I've got you covered!
              Let's collaborate to bring your web projects to life.
            </p>
          </div>

          <!-- Cards for different services -->
          <div class="cards">
            <div class="card-wrap">
              <!-- Card for UI/UX service -->
              <img
                src="./img/shapes/points3.png"
                class="points points1 points-sq"
                alt=""
              />
              <div class="card" data-card="UI/UX">
                <div class="card-content z-index">
                  <img src="./img/design-icon.png" class="icon" alt="" />
                  <h3 class="title-sm">Web Design</h3>
                  <p class="text">
                  Expect captivating, user-centric web designs that turn your vision into 
                  sleek, modern, and user-friendly online experiences.           
                  </p>
                  <p class="text">
                  Languages: HTML, CSS, JavaScript           
                  </p>                  
                </div>
              </div>
            </div>
            <!-- Card for Web Development service -->
            <div class="card-wrap">
              <div class="card" data-card="Code">
                <div class="card-content z-index">
                  <img src="./img/code-icon.png" class="icon" alt="" />
                  <h3 class="title-sm">Web Development</h3>
                  <p class="text">
                  Expect top-notch web development, turning your vision into dynamic, user-friendly online solutions.
                  </p>
                  <p class="text">
                  Languages: Java, PHP, Python, Ruby          
                  </p>
                </div>
              </div>
            </div>
            <!-- Card for App Development service -->
            <div class="card-wrap">
              <img
                src="./img/shapes/points3.png"
                class="points points2 points-sq"
                alt=""
              />
              <div class="card" data-card="App">
                <div class="card-content z-index">
                  <img src="./img/app-icon.png" class="icon" alt="" />
                  <h3 class="title-sm">App Development</h3>
                  <p class="text">
                  Count on innovative app development that brings your ideas to life, 
                  user-friendly mobile experiences.
                  </p>
                  <p class="text">
                  Languages: Java, Swift, Kotlin, C#           
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



      
      <!-- Portfolio section -->
      <section class="portfolio section" id="portfolio">

        <!-- Decorative background shapes -->
        <div class="background-bg">
          <div class="overlay overlay-sm">
            <img
              src="./img/shapes/half-circle.png"
              class="shape half-circle1"
              alt=""
            />
            <img
              src="./img/shapes/half-circle.png"
              class="shape half-circle2"
              alt=""
            />
            <img src="./img/shapes/square.png" class="shape square" alt="" />
            <img src="./img/shapes/wave.png" class="shape wave" alt="" />
            <img src="./img/shapes/circle.png" class="shape circle" alt="" />
            <img
              src="./img/shapes/triangle.png"
              class="shape triangle"
              alt=""
            />
            <img src="./img/shapes/x.png" class="shape xshape" alt="" />
          </div>
        </div>

        <div class="container">
          <div class="section-header">
            <h3 class="title" data-title="My works">Portfolio</h3>
          </div>
          <div class="section-body">
            <!-- Filter buttons for portfolio items -->
            <div class="filter">
              <button class="filter-btn active" data-filter="*">All</button>
              <button class="filter-btn" data-filter=".ui">UI/UX</button>
              <button class="filter-btn" data-filter=".webdev">Web Dev</button>
              <button class="filter-btn" data-filter=".appdev">Mobile App</button>
            </div>
            <div class="grid">
              <div class="grid-item webdev">
                <div class="gallery-image">
                    <img src="./img/portfolio/port11.jpg" alt="" />
                  <div class="img-overlay">
                    <div class="img-description">
                      <h3>Web Development</h3>
                      <a href="https://floffystores.netlify.app/"><b>View Demo</b></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="grid-item ui webdev">
                <div class="gallery-image">
                  <img src="./img/portfolio/port12.jpg" alt="" />
                  <div class="img-overlay">
                    <div class="img-description">
                      <h3>Web Design</h3>
                      <a href="https://current-weather-247.netlify.app/"><b>View Demo</b></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="grid-item ui">
                <div class="gallery-image">
                  <img src="./img/portfolio/port13.jpg" alt="" />
                  <div class="img-overlay">
                    <div class="img-description">
                      <h3>UI / UX Design</h3>
                      <a href="https://homedelivery.netlify.app/"><b>View Demo</b></a>
                    </div>
                  </div>
                </div>
              </div>              
              
              <div class="grid-item appdev">
                <div class="gallery-image">
                  <img src="./img/portfolio/port14.jpg" alt="" />
                  <div class="img-overlay">
                    <div class="img-description">
                      <h3>App Development</h3>
                      <a href="https://floffystores.netlify.app/"><b>View Demo</b></a>
                    </div>
                  </div>
                </div>
              </div>              

              <div class="grid-item appdev ui">
                <div class="gallery-image">
                  <img src="./img/portfolio/port15.jpg" alt="" />
                  <div class="img-overlay">
                    <div class="img-description">
                      <h3>App Development</h3>
                      <a href="https://floffystores.netlify.app/"><b>View Demo</b></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="grid-item ui webdev">
                <div class="gallery-image">
                  <img src="./img/portfolio/port16.jpg" alt="" />
                  <div class="img-overlay">
                    <div class="img-description">
                      <h3>Web Design</h3>
                      <a href="https://floffystores.netlify.app/"><b>View Demo</b></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </section>



      
       <!-- About section -->
      <section class="about section" id="about">
        <div class="container">
          <div class="section-header">
            <h3 class="title" data-title="Who Am I">About me</h3>
          </div>

          <!-- Content about yourself -->
          <div class="section-body grid-2">
            <div class="column-1">
              <h3 class="title-sm">Hello there!</h3>       

              <p class="text">
              I am passionate about building excellent software that improves the lives of those around me. 
              With over 7 years of experience in software development, 
              I load an arsenal of various technologies aimed at high quality development adhering to the industry standards while ensuring smooth user experience. 
              I specialize in creating software for clients ranging from individuals and small-businesses all the way to large enterprise corporations.
              </p>

              <a href="img/my-cv.pdf" download class="btn">Download CV</a>

              <div class="skills">              
                <div class="skill html">
                  <h3 class="skill-title">HTML, CSS, JavaScript</h3>
                  <div class="skill-bar">
                    <div class="skill-progress" data-progress="90%"></div>
                  </div>
                </div>

                <div class="skill css">
                  <h3 class="skill-title">PHP</h3>
                  <div class="skill-bar">
                    <div class="skill-progress" data-progress="70%"></div>
                  </div>
                </div>

                <div class="skill js">
                  <h3 class="skill-title">React</h3>
                  <div class="skill-bar">
                    <div class="skill-progress" data-progress="80%"></div>
                  </div>
                </div>
              </div>              
            </div>            
          </div>
        </div>
      </section>



      
      <!-- Records section -->
      <section class="records">

        <div class="overlay overlay-sm">
          <img src="./img/shapes/square.png" alt="" class="shape square1" />
          <img src="./img/shapes/square.png" alt="" class="shape square2" />
          <img src="./img/shapes/circle.png" alt="" class="shape circle" />
          <img
            src="./img/shapes/half-circle.png"
            alt=""
            class="shape half-circle"
          />
          <img src="./img/shapes/wave.png" alt="" class="shape wave wave1" />
          <img src="./img/shapes/wave.png" alt="" class="shape wave wave2" />
          <img src="./img/shapes/x.png" alt="" class="shape xshape" />
          <img src="./img/shapes/triangle.png" alt="" class="shape triangle" />
        </div>

        <div class="container">
          <div class="wrap">
            <div class="record-circle">
              <h2 class="number" data-num="235">0</h2>
              <h4 class="sub-title">Projects</h4>
            </div>
          </div>

          <div class="wrap">
            <div class="record-circle active">
              <h2 class="number" data-num="174">0</h2>
              <h4 class="sub-title">Happy Clients</h4>
            </div>
          </div>

          <div class="wrap">
            <div class="record-circle">
              <h2 class="number" data-num="892">0</h2>
              <h4 class="sub-title">Work Hours</h4>
            </div>
          </div>

          <div class="wrap">
            <div class="record-circle">
              <h2 class="number" data-num="368">0</h2>
              <h4 class="sub-title">Awards</h4>
            </div>
          </div>
        </div>
      </section>




      <!-- Testimonials section -->
      <section class="testimonials section" id="testimonials">

        <div class="container">
          <div class="section-header">
            <h3 class="title" data-title="What People Say">Testimonials</h3>
          </div>
          <div class="testi-content grid-2">
            <div class="column-1 reviews">
              <!-- Testimonials with quotes and review content -->
              <div class="swiper-container">
                <div class="swiper-wrapper">

                  <div class="swiper-slide review">
                    <i class="fas fa-quote-left quote"></i>
                    <div class="rate">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <p class="review-text">
                      “Matt was a real pleasure to work with and 
                      we look forward to working with him again. 
                      He’s definitely the kind of designer you can trust with a project from start to finish.”
                    </p>
                    <div class="review-info">
                      <h3 class="review-name">Jack Costa</h3>
                      <h5 class="review-job">Director of THR, London</h5>
                    </div>
                  </div>

                  <div class="swiper-slide review">
                    <i class="fas fa-quote-left quote"></i>
                    <div class="rate">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <p class="review-text">
                      “Disara is a clear communicator with the tenacity and 
                      confidence to really dig in to tricky design scenarios and 
                      the collaborative friction that's needed to produce excellent work.”
                    </p>
                    <div class="review-info">
                      <h3 class="review-name">Reiss Mccartney</h3>
                      <h5 class="review-job">Engineer, San Francisco</h5>
                    </div>                                        
                  </div>
                </div>                
              </div>
            </div>            
          </div>
        </div>
      </section>



      
      <!-- Contact section -->
      <section class="contact" id="contact">
        <div class="container">

          <div class="contact-box">
            <div class="contact-info">
              <h3 class="title">Get in touch</h3>              
              <p class="text">
                I’m always open to discussing product design work
                or partnership opportunities.
              </p>

              <div class="information-wrap">
                <div class="information">
                  <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                  </div>
                  <p class="info-text">colombo, Sri Lanka</p>
                </div>

                <div class="information">
                  <div class="contact-icon">
                    <i class="fas fa-paper-plane"></i>
                  </div>
                  <p class="info-text">disaraportfolio@gmail.com</p>
                </div>

                <div class="information">
                  <div class="contact-icon">
                    <i class="fas fa-phone-alt"></i>
                  </div>
                  <p class="info-text">+94-714562974</p>
                </div>
              </div>
            </div>

            <!-- Contact Form Box -->
            <div class="contact-form">
              <h3 class="title">Contact me</h3>

              <form id="contact-form" action="" method="post">
                <div class="row">
                  <!-- Form fields for contact information -->
                  <input type="text" class="contact-input" id="first-name" placeholder="First Name" name="firstname" required />
                  <input type="text" class="contact-input" id="last-name" placeholder="Last Name" name="lastname" required />
                </div> 

                <div class="row">
                  <input type="text" class="contact-input" id="phone" placeholder="Phone" name="phone" required />
                  <input type="email" class="contact-input" id="email" placeholder="Email" name="email" required />
                </div>

                <div class="row">
                  <textarea name="message" class="contact-input textarea" id="message" placeholder="Message" name="message" required></textarea>
                </div>

                <button type="submit" class="btn">Send</button>
              </form>
            </div>
          </div>
        </div>
      </section>

      
    </main>




    <!-- Footer section -->
    <footer class="footer">      
      <div class="container">

        <div class="grid-4">
          <div class="grid-4-col footer-newstletter">            
            <div class="footer-input-wrap">
              <input type="email" class="footer-input" placeholder="Email" />
              <a href="#" class="input-arrow">
                <i class="fas fa-angle-right"></i>
              </a>
            </div>            
          </div>
        </div>        

        <div class="bottom-footer">
          <div class="copyright">
            <p class="text">
              Copyright&copy;2023 | Made with love by Disara.              
            </p>
          </div>

          <div class="followme-wrap">
            <div class="followme">
              <h3>Follow me</h3>
              <span class="footer-line"></span>
              <div class="social-media">
                <a href="https://www.facebook.com/">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.instagram.com/">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="https://lk.linkedin.com/">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </div>
            </div>

            <!-- Scroll-to-Top Button Wrapper -->
            <div class="back-btn-wrap">
              <a href="#" class="back-btn">
                <i class="fas fa-chevron-up"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>



    <!-- Include jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Include Typed.js library for text animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.16/typed.umd.js"></script>
      
      <script>
        // Initialize Typed.js for text animation
        var type = new Typed('.typing-text',{
          strings : [ 'Web Designer', 'Software Developer' ],
          typeSpeed: 120,
          loop:true
        });
        // Theme color changer functionality
        let themeColor = document.querySelectorAll('.theme-toggler span');
          themeColor.forEach(color => color.addEventListener('click', () =>{
          let background = color.style.background;
          document.querySelector('body').style.background = background;
        }));
      </script>


    <!-- Include Isotope library for filtering and sorting elements -->
    <script src="./js/isotope.pkgd.min.js"></script>

    <!-- Include Swiper library for creating interactive sliders -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="./js/app.js"></script>


  </body>
</html>