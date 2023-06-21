<!DOCTYPE html>
<html lang="en">

@include("FrontEnd.components.head")

<body>

<!-- ======= Header ======= -->
@include("FrontEnd.components.header")
<!-- End Header -->

<!-- ======= Section Slider ======= -->
@include("FrontEnd.components.slider")
<!-- End Slider -->

<main id="main">

    <!-- ======= About Us Section ======= -->
   @include("FrontEnd.components.about")
    <!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
  @include("FrontEnd.components.section")
    <!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
@include("FrontEnd.components.images")
    <!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    @include("FrontEnd.components.clients")
    <!-- End Our Clients Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include("FrontEnd.components.footer")
<!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
@include("FrontEnd.components.scripts")

<!-- Template Main JS File -->
<script src="{{asset("FrontEnd/assets/js/main.js")}}"></script>

</body>

</html>
