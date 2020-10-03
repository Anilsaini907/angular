<?php 
include('header.php');?>

</head>


<body>

   



   
    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="https://www.ultimalinen.com/products-images/suite_collection/products/blankets.png">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Contact us</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Contact us</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Contact Information & Map Section Start -->
    <div class="section section-padding">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title2 text-center">
                <h2 class="title">Keep in touch with us</h2>
                <p>Been tearing your hair out to find the perfect gift for your loved ones? Try visiting our nationwide local stores. You can also contact us to become partner or distributor. Call us, send us an email or make an appointment now.</p>
            </div>
            <!-- Section Title End -->

            <!-- Contact Information Start -->
            <div class="row learts-mb-n30">
                <div class="col-lg-4 col-md-6 col-12 learts-mb-30">
                    <div class="contact-info">
                        <h4 class="title">ADDRESS</h4>
                        <span class="info"><i class="icon fal fa-map-marker-alt"></i> Stella Blankets
Village Alipur Khalsa, Near Panipat, Karnal-132001, Haryana, India Unit D &amp; E Venice</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 learts-mb-30">
                    <div class="contact-info">
                        <h4 class="title">CONTACT</h4>
                        <span class="info"><i class="icon fal fa-phone-alt"></i> Mobile: (+91) – 878383938<br> Hotline: 0180-034102</span>
                        <span class="info"><i class="icon fal fa-envelope"></i> Mail: <a href="#">contact@Stellastore.com</a></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 learts-mb-30">
                    <div class="contact-info">
                        <h4 class="title"> HOUR OF OPERATION</h4>
                        <span class="info"><i class="icon fal fa-clock"></i> Monday – Friday : 09:00 – 20:00 <br> Sunday &amp; Saturday: 10:30 – 22:00</span>
                    </div>
                </div>
            </div>
            <!-- Contact Information End -->

            <!-- Contact Map Start -->
            <div class="row learts-mt-60">
                <div class="col">
                    <iframe class="contact-map" src="https://www.google.com/maps/embed?pb=29.6856929,76.9904825/@29.6839009,76.9212466,11.97z" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <!-- Contact Map End -->

        </div>
    </div>
    <!-- Contact Information & Map Section End -->

    <!-- Contact Form Section Start -->
    <div class="section section-padding pt-0">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title2 text-center">
                <h2 class="title">Send a message</h2>
            </div>
            <!-- Section Title End -->

            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <div class="contact-form">
                        <form action="assets/php/contact-mail.php" id="contact-form" method="post">
                            <div class="row learts-mb-n30">
                                <div class="col-md-6 col-12 learts-mb-30"><input type="text" placeholder="Your Name *" name="name"></div>
                                <div class="col-md-6 col-12 learts-mb-30"><input type="email" placeholder="Email *" name="email"></div>
                                <div class="col-12 learts-mb-30"><textarea name="message" placeholder="Message"></textarea></div>
                                <div class="col-12 text-center learts-mb-30"><button type="submit" value="Send" class="btn btn-dark btn-outline-hover-dark">Submit</button></div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
  <script>
      const constraints = {
          name: {
              presence: { allowEmpty: false }
          },
          email: {
              presence: { allowEmpty: false },
              email: true
          },
          message: {
              presence: { allowEmpty: false }
          }
      };

      const form = document.getElementById('contact-form');

      form.addEventListener('submit', function (event) {
          const formValues = {
              name: form.elements.name.value,
              email: form.elements.email.value,
              message: form.elements.message.value
          };
           console.log(formValues);
          const errors = validate(formValues, constraints);

          if (errors) {
              event.preventDefault();
              const errorMessage = Object
                  .values(errors)
                  .map(function (fieldValues) {
                      return fieldValues.join(', ')
                  })
                  .join("\n");

              alert(errorMessage);
          }
      }, false);
  </script>
<?php
include('footer.php');

?> 
 