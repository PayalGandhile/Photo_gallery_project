<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallary</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
     <!-- navigation bar -->
     <script>           
            // Get the navigation bar HTML
            fetch('./HTMLtemplates/navbar.html')
            .then(response => response.text())
            .then(html => {
                // Append the navigation bar to the page
                document.getElementById('nav-container').innerHTML = html;
            });
        </script>
            <div id="nav-container"></div>
   
    <div class="slide-container">
        <div class="navigation">
            <div class="prev nav-btn">&lt;</div>
            <div class="next nav-btn">&gt;</div>
        </div>
        <div class="indicators">
            <span class="indicator active" data-slide="0"></span>
            <span class="indicator" data-slide="1"></span>
            <span class="indicator" data-slide="2"></span>
            <span class="indicator" data-slide="3"></span>
        </div>
        <div class="slides">
            <div class="item main">
                <img src="./images/nature13.jpg" alt="Nature" />
                <div class="caption">Nature</div>
            </div>
            <div class="item">
                <img src="./images/travel2.jpg" alt="Travel" />
                <div class="caption">Travel</div>
            </div>
            <div class="item">
                <img src="./images/wildlife3.jpg" alt="Wildlife" />
                <div class="caption">Wildlife</div>
            </div>
            <div class="item">
                <img src="./images/flower9.jpg" alt="Flower" />
                <div class="caption">Flower</div>
            </div>          
        </div>
    </div>

    
    
    <section class="gallary">
        <div>
            <h2>Nature</h2>
        </div>

        <div class="img">
            <a href="./images/nature5.jpg"><img src="./images/nature5.jpg" alt="nature" ></a>
            <a href="./images/nature2.jpg"><img src="./images/nature2.jpg" alt="nature"></a>
            <a href="./images/nature4.jpg"> <img src="./images/nature4.jpg" alt="nature"></a>
        </div>

        <div>
            <h2>Travel</h2>
        </div>
        
        <div class="img">
           <a href="./images/travel1.jpg"><img src="./images/travel1.jpg" alt="nature" ></a>
           <a href="./images/travel3.jpg"> <img src="./images/travel3.jpg" alt="nature"></a>
           <a href="./images/travel4.jpg"> <img src="./images/travel4.jpg" alt="nature"></a>
        </div>

        <div>
            <h2>Wildlife</h2>
        </div>
        
        <div class="img">
            <a href="./images/wildlife1.jpg"><img src="./images/wildlife1.jpg" alt="nature" ></a>
            <a href="./images/wildlife2.jpg"><img src="./images/wildlife2.jpg" alt="nature"></a>
            <a href="./images/wildlife4.jpg"><img src="./images/wildlife4.jpg" alt="nature"></a>
        </div>
        
        <div>
            <h2>Flower</h2>
        </div>
        
        <div class="img">
           <a href="./images/flower7.jpg"><img src="./images/flower7.jpg" alt="nature" ></a>
           <a href="./images/flower7.jpg"><img src="./images/flower2.jpg" alt="nature"></a>
           <a href="./images/flower7.jpg"><img src="./images/flower4.jpg" alt="nature"></a>
        </div>
    </section>

       <!-- contact us -->
     <a id="contact">    
    <section>
        <div class="contact">
            <h2>Contact Us</h2>
        </div>
    <form class="contact-form">
        <!-- <h3>Contact Us</h3> -->

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"placeholder="Enter Emali" required>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone"placeholder="Enter Number" required>

        <button type="submit">Submit</button>
    </form>
    </section>
    </a>  
</body>
<script src="script.js"></script>
</html>