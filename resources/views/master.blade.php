<!DOCTYPE html>
<html lang="en">

@include("FrontEnd.components.head")

<body>

<!-- ======= Header ======= -->
@include("FrontEnd.components.header")
<!-- End Header -->
<main >

    @yield("content")
</main>
<!-- End #main -->

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
