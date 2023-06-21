<!DOCTYPE html>
<html lang="en">
<head>
{{--Links--}}
@include("BackEnd.components.Links")
</head>
<body class="sb-nav-fixed ">
{{--NavBar--}}
@include("BackEnd.components.NavBar")
{{--Side Bar + le contenu --}}
<div class="bg-black">

    @include("BackEnd.components.Sidebare")

</div>


@include("BackEnd.components.Scripts")
</body>
</html>
