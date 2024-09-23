<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Photography Gallery</title>
    <link rel="stylesheet" href="../styles/gallery.css">
</head>
<body>
    <!-- navigation bar -->
        <script>           
            // Get the navigation bar HTML
            fetch('navbar.html')
            .then(response => response.text())
            .then(html => {
                // Append the navigation bar to the page
                document.getElementById('nav-container').innerHTML = html;
            });
        </script>
            <div id="nav-container"></div>

        <section>
            
            <div class="wildlife">
                <img src="../images/flower19.jpg" alt="flower" width="100%" height="500px">
                <div class="imagecaption">Flower Photography Gallery</div>
            </div>
            <div class="info">
                <h2>Welcome to my Nature Photography Gallery</h2>
            </div>
            <div class="information">
                <P>
                    Welcome to this flower photography gallery, where you’ll find a curated
                    collection of my floral images, each one capturing the unedited elegance
                    and vibrancy of blooms from around the world.

                    I believe that colour photography has a magical quality that instantly 
                    captivates the senses and highlights the intricate beauty of flowers. 
                    Through my lens, I aim to showcase the delicate textures, rich colours,
                    and unique forms of each bloom in its natural state.

                    Whether you're a passionate botanist, a gardening enthusiast, 
                    or simply someone who appreciates the artistry of floral photography, 
                    I hope you'll find inspiration and delight in this vibrant collection.


                </P>
            </div>
            <div class="container">
                <div class="image-container">
                    <img src="../images/flower2.jpg" alt="">
                    <img src="../images/flower3.jpg" alt="">
                    <img src="../images/flower4.jpg" alt="">
                    <img src="../images/flower5.jpg" alt="">
                    <img src="../images/flower6.jpg" alt="">
                    <img src="../images/flower7.jpg" alt="">
                    <img src="../images/flower8.jpg" alt="">
                    <img src="../images/flower9.jpg" alt="">
                    <img src="../images/flower10.jpg" alt="">
                    <img src="../images/flower11.jpg" alt="">
                    <img src="../images/flower12.jpg" alt="">
                    <img src="../images/flower13.jpg" alt="">
                    <img src="../images/flower14.jpg" alt="">
                    <img src="../images/flower15.jpg" alt="">
                    <img src="../images/flower16.jpg" alt="">
                    
                </div>
                
            </div>
        </section>
        <section>

        </section>
    
</body>
</html>