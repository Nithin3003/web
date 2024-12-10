<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /booking");
    exit();
}
$user = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel joy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
    font-family:Arial, Helvetica, sans-serif;
}
.navbar-brand{
    background-image: url("../medlo.png");
    background-size: cover;
    height: 55px;
    width: 100px;
    justify-content: end;
    border-radius: 5px;
    
}

.key{
    text-align: center;
}

.logo{
    background: url("../medlo.png");
    background-size: cover;
   
    height: 55px;
    width: 100px;
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.container{
    background: url("https://hblimg.mmtcdn.com/content/hubble/img/hp_hillsmountainimg/mmt/activities/m_w2g_homepage_hills_hountains_resize_2_l_2290_3500.jpg") ; 
    background-size: cover;
    height: 100vh;
    width: 100%;
    border-radius: 10px;
    
}
p{
    font-weight: 600;
}
    </style>
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
   
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/booking/main.php">Home</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/booking/profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/booking/myplans.php">My Plans</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
              </li>
            </ul>
            <span class="navbar-text ms-auto">
                Hi, <?php echo htmlspecialchars($user); ?>
            </span>  
        </div>
    </div>
</nav>

      <div class="container my-5">
        <div class="p-5 text-center  rounded-3">

         
          <h1 style="color: white;">Travel Joy</h1>
          <p class="col-lg-8 mx-auto  fs-5 "  style="color: white;">
            Travel Joy offers a secure and efficient way to plan, book, and share your travel experiences. Our platform improves communication between travelers and service providers while supporting proactive trip management with features like itinerary planning, booking reminders, and travel tips.
        </p>
          <div class="d-inline-flex gap-2 mb-5">
           <button class="btn "><a class="btn btn-primary" href="/booking/form.html">Add New Plan</a></button>
           
            
          </div>
        </div>
      </div>
<div class="container0 px-4 py-5" id="featured-3">
        <h2 class="key">Key features</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        
          <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 icoo">
              <i class="bi bi-globe icoo1"></i>
            </div>
            <h3 class="fs-2 text-body-emphasis">Explore Destinations</h3>
            <p>Discover a world of possibilities with Travel Joy. Our platform offers detailed guides and recommendations for top travel destinations around the globe. Whether you're looking for adventure, relaxation, or cultural experiences, we have something for every traveler.</p>
            <a href="#" class="icon-link">
              <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
            </a>
          </div>
          <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 icoo">
              <i class="bi bi-calendar-event-fill icoo1"></i>
            </div>
            <h3 class="fs-2 text-body-emphasis">Plan Your Trip</h3>
            <p>Travel Joy makes trip planning easy and stress-free. Use our intuitive tools to create itineraries, book accommodations, and find the best deals on flights and activities. Our platform ensures that every aspect of your trip is well-organized and tailored to your preferences.</p>
            <a href="#" class="icon-link">
              <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
            </a>
          </div>
          <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 icoo">
              <i class="bi bi-heart-fill icoo1"></i>
            </div>
            <h3 class="fs-2 text-body-emphasis">Share Your Experiences</h3>
            <p>Join our community of travelers and share your adventures with Travel Joy. Post photos, write reviews, and connect with fellow travelers. Our platform allows you to inspire others and gain insights from their experiences, making every trip more enriching and enjoyable.</p>
            <a href="#" class="icon-link">
              <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
            </a>
          </div>
        </div>
      </div>
      

      <div class="container1">
        <footer class="py-3 my-4">
          <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
          </ul>
          <p class="text-center text-body-secondary">© 2024 Traveljoy, Inc</p>
        </footer>
      </div>
   </body>
   </html>