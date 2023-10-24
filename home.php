<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Travelscapes </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="./css/style.css">
    </head>
<body>

<header>

    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="#" class="logo"><span>Travelscapes</span></a>

    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#products">Places</a>
        <a href="#review">Review</a>
        <a href="./Login/login.php">Login/Signup</a>
        <a href="./admin/adminlogin.php">Admin</a>
    </nav>

    <div class="icons">
        <span data-tooltip="Favourites" data-flow="top"> <a href="#" class="fas fa-heart"></a></span>
        <span data-tooltip="Cart" data-flow="top"> <a href="#" class="fas fa-shopping-cart"></a></span>
        <span data-tooltip="Profile" data-flow="top"> <a href="#" class="fas fa-user"></a></span>
    </div>

</header>

<section class="home" id="home">

    <div class="content">
        <span> Incredible India: </span>
        <p>Where Every Place is a Story, Every Journey an Adventure.</p>
        <a href="#products" class="btn">Travel Now</a>
    </div>

</section>


<section class="about" id="about">

    <h1 class="heading"> <span> about </span> us </h1>

    <div class="row">

        <div class="video-container">
            <video src="./images/about-vid.mp4" loop autoplay muted></video>
            <h3>Best Places</h3>
        </div>

        <div class="content">
            <h3>why choose us?</h3>
<p> What truly sets us apart is our unwavering commitment to your satisfaction. Our 24/7 customer support is always ready to assist you, and we offer competitive prices and exclusive deals to save you money while you explore the world. Choose our travel website, and you're not just a traveler; you're part of a community that values your journey and strives to make it enjoyable and hassle-free. Join us today for unforgettable adventures, where your travel needs take center stage.</p>
            <a href="#review" class="btn">learn more</a>
        </div>

    </div>

</section> 

<section class="icons-container">

    <div class="icons">
        <img src="./images/icon-1.png" alt="">
        <div class="info">
            <h3>free booking</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="./images/icon-2.png" alt="">
        <div class="info">
            <h3>10 days returns</h3>
            <span>moneyback guarantee</span>
        </div>
    </div>

    <div class="icons">
        <img src="./images/icon-3.png" alt="">
        <div class="info">
            <h3>offer & gifts</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="./images/icon-4.png" alt="">
        <div class="info">
            <h3>secure paymens</h3>
            <span>protected by Razorpay</span>
        </div>
    </div>

</section>


<section class="products" id="products">

    <h1 class="heading"> Popular <span>Places</span> </h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="./images/Manali.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="./Login/login.php" class="cart-btn">Visit Us</a>
                    <a href="./Login/login.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Manali</h3>
                <div class="price">Rs 35000</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="./images/Rajasthan.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="./Login/login.php" class="cart-btn">Visit Us</a>
                    <a href="./Login/login.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Rajasthan</h3>
                <div class="price">Rs 40000</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="./images/Ladakh.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="./Login/login.php" class="cart-btn">Visit Us</a>
                    <a href="./Login/login.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Ladakh</h3>
                <div class="price">Rs 50000 </div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="./images/Chennai.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="./Login/login.php" class="cart-btn">Visit Us</a>
                    <a href="./Login/login.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Chennai</h3>
                <div class="price">Rs 30000 </div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="./images/kerala.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="./Login/login.php" class="cart-btn">Visit Us</a>
                    <a href="./Login/login.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Kerala</h3>
                <div class="price">Rs 21000</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="./images/goa.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="./Login/login.php" class="cart-btn">Visit Us</a>
                    <a href="./Login/login.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Goa</h3>
                <div class="price">Rs 15000</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="./images/sikkim.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="./Login/login.php" class="cart-btn">Visit Us</a>
                    <a href="./Login/login.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Sikkim</h3>
                <div class="price">Rs 55000</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="./images/Pune.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="./Login/login.php" class="cart-btn">Visit Us</a>
                    <a href="./Login/login.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Pune</h3>
                <div class="price">Rs 15000</div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="./images/Mumbai.jpg" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="./Login/login.php" class="cart-btn">Visit Us</a>
                    <a href="./Login/login.php" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>Mumbai</h3>
                <div class="price">Rs 15000</div>
            </div>
        </div>

    </div>

</section>


<section class="review" id="review">

<h1 class="heading"> customer's <span>review</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Booking my dream trip to the serene backwaters of Kerala was a breeze with Travelscapes – seamless and stress-free! </p>
        <div class="user">
            <img src="./images/pic-1.jpg" alt="atharva pfp">
            <div class="user-info">
                <h3>Atharva</h3>
                <span>Goa</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Thanks to Travelscapes, I explored the majestic beauty of Rajasthan with ease, and the deals were unbeatable!</p>
        <div class="user">
            <img src="./images/pic-2.png" alt="Yash pfp">
            <div class="user-info">
                <h3>Pretty</h3>
                <span>Maharashtra</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Made my adventure to the mesmerizing Himalayan mountains unforgettable, with expert guidance and fantastic itineraries</p>
        <div class="user">
            <img src="./images/pic-3.jpg" alt="Tejas pfp">
            <div class="user-info">
                <h3>Tejas</h3>
                <span>Kerala</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

</div>

</section>


<section class="contact" id="contact">

    <h1 class="heading"> <span> contact </span> us </h1>

    <div class="row">

        <form action="">
            <input type="text" placeholder="name" class="box">
            <input type="email" placeholder="email" class="box">
            <input type="number" placeholder="number" class="box">
            <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>

        <div class="image">
            <img src="./images/contact-img.svg" alt="">
        </div>

    </div>

</section>


<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="#">Home</a>
            <a href="#">About </a>
            <a href="#">Places</a>
            <a href="#">Review</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#">My account</a>
            <a href="#">My List</a>
            <a href="#">My favorite</a>
        </div>

        <div class="box">
            <h3>Popular Travel Locations</h3>
            <a href="#">Manali</a>
            <a href="#">Rajasthan</a>
            <a href="#">Mumbai</a>
            <a href="#">Kerala</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="https://github.com/AtharvaKulkarniIT">GitHub</a>
            <img src="./images/payment.png" alt="">
        </div>
    </div>

    <div class="credit">&copy;2023 Travelscapes</div>

</section>



</body>
</html>
