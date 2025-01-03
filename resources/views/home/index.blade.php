<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">My Blog</a>
            <div class="d-flex">
                <a href="{{route('loginPage')}}" class="btn btn-outline-primary me-2">Login</a>
                <a href="{{route('registerPage')}}" class="btn btn-primary">Register</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <h1 class="mb-4">Articles</h1>
        <div class="row">
            <!-- Article Card Example -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="Article Title">
                    <div class="card-body">
                        <h5 class="card-title">Article Title</h5>
                        <p class="card-text">This is a short description of the article...</p>
                        <button class="btn btn-primary">Read More</button>
                    </div>
                </div>
            </div>
            <!-- Repeat Article Cards -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="Article Title">
                    <div class="card-body">
                        <h5 class="card-title">Another Article</h5>
                        <p class="card-text">A quick summary of the content goes here...</p>
                        <button class="btn btn-primary">Read More</button>
                    </div>
                </div>
            </div>
            <!-- Add more cards as needed -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
