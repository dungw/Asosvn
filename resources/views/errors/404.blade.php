<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.default.head')
</head>

<body>
<div class="container text-center">
    <div class="logo-404">
        <a href="/"><img src="/images/home/logo.png" alt="Home page" /></a>
        <h4><a href="/">{{ trans(\App\Helpers\Locale::lang() . '.Go back home') }}</a></h4>
    </div>

    <div class="content-404">
        <img src="/images/404/404.png" class="img-responsive" alt="404 page" />
    </div>
</div>


<script src="js/jquery.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>