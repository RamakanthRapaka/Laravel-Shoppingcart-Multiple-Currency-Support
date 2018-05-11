<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Laravel Shopping Cart Example')</title>
    <meta name="description" content="Laravel Shopping Cart Example">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Store CSRF token for AJAX calls -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    @yield('extra-css')

    <!-- Favicon and Apple Icons -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <style>

        .spacer {
            margin-bottom: 100px;
        }

        .cart-image {
            width: 100px;
        }

        footer {
            background-color: #f5f5f5;
            padding: 20px 0;
        }

        .table>tbody>tr>td {
            vertical-align: middle;
        }

        .side-by-side {
            display: inline-block;
        }
    </style>
<script>
    var name = 'CURRENCY';
    var value = document.getElementById("currency").value;
    var days = 1;
  function createCookie(name,value,days) {
    var name = 'CURRENCY';
    var value = document.getElementById("currency").value;
    alert(value);
    var name = 'CURRENCY';
    var days = 1;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 *1000));
        var expires = "; expires=" + date.toGMTString();
        readCookie(name);
    }
    else {
        var expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1,c.length);
        }
        if (c.indexOf(nameEQ) == 0) {
            var id = 'currency';
            var valueToSelect = c.substring(nameEQ.length,c.length);
            location.reload();
            SelectElement(id, valueToSelect);
            return c.substring(nameEQ.length,c.length);
        }
    }
    return null;
}

function readCookies() {
    var name = 'CURRENCY';
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1,c.length);
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length,c.length);
        }
        else {
            var name = 'CURRENCY';
            var value = document.getElementById("currency").value;
            var days = 1;
            createCookie(name,value,days);
        }
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}
function SelectElement(id, valueToSelect)
{   
    //alert(id);
    var element = document.getElementById(id);
    element.value = valueToSelect;
}
</script>
</head>
<body onload="readCookies()">

    <header>

        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{ url('/') }}">Laravel Shopping Cart Example</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="{{ set_active('shop') }}"><a href="{{ url('/') }}">Home/Shop</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>

              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="{{ set_active('wishlist') }}"><a href="{{ url('/wishlist') }}">Wishlist ({{ Cart::instance('wishlist')->count(false) }})</a></li>
                <li class="{{ set_active('cart') }}"><a href="{{ url('/cart') }}">Cart ({{ Cart::instance('default')->count(false) }})</a></li>
<li class="{{ set_active('currency') }}"><select class="form-control" id="currency" name="currency" onchange="createCookie()" style="margin-top:10px;"><option @if(isset($_COOKIE['CURRENCY'])){{ $_COOKIE['CURRENCY'] == 'CAD' ? "selected":"" }} @endif value="CAD">CAD</option><option @if(isset($_COOKIE['CURRENCY'])) {{ $_COOKIE['CURRENCY'] == 'USD' ? "selected":"" }} @endif value="USD">USD</option><option @if(isset($_COOKIE['CURRENCY'])) {{ $_COOKIE['CURRENCY'] == 'EUR' ? "selected":"" }}  @endif value="EUR">EUR</option></select></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>

    </header>

    @yield('content')

    <footer>
      <div class="container">
        
      </div>
    </footer>

<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

@yield('extra-js')

</body>
</html>
