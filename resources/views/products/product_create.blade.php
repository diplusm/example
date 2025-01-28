<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    @include('parts.header')
    <div class="container d-flex justify-content-center align-items-center h-100">
        <div class="col-3">
            <form class="bg-light p-3 rounded-3" action="{{route('product.store')}}" method="POST">
                @CSRF
                @method('POST')
                <h1 class="h3">Create</h1>
                <div class="form-group mb-2">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group mb-2">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description" >
                </div>
                <div class="form-group mb-2">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity">
                </div>
                <div class="form-group mb-2">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" id="price">
                </div>
                <div class="form-group my-4 d-flex justify-content-between">
                    <button type="button" class="btn btn-light btn-sm" onclick='location.href="{{route('product')}}"'>Back</button>
                    <div>
                        <input type="submit" class="btn btn-success btn-sm" name="save" id="save" value="Save">
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</body>
</html>