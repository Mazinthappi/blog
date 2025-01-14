<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container my-3">
    <div class="row row-cols-3 g-3">
        @foreach ($categories->article as $arti)
        
        
        <div class="col">
            <div class="card">
                <img src="{{asset('/images/'.$arti->image)}}" class="card-img-top"
                    alt="Hollywood Sign on The Hill" />
                <div class="card-body">
                    <h5 class="card-title">{{$arti->name}}</h5>
                    <p class="card-text">
                        {{$arti->description}}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</body>

</html>