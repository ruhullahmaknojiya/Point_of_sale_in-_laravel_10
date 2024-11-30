<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('libraries.style')
  
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <h3>Point of Sales System</h3>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link active" aria-current="page" href="{{ route('category.index') }}">Category</a>
                                <a class="nav-link active" aria-current="page" href="{{ route('brand.index') }}">Brand</a>
                                <a class="nav-link active" aria-current="page" href="{{ route('products.index') }}">Product</a>
                                <a class="nav-link active" aria-current="page" href="{{ route('sales.create') }}">Sales</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            @yield('content')
        </div>
    </div>

    @include('libraries.scripts')

</body>
</html>
