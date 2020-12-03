
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="cart-header">
                        Edit Product
                    </div>
                    <div class="cart-body">
                        @if(Session::has('product_updated'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('product_updated')}}
                        </div>
                        @endif
                        <form method="POST" action="{{route('product.update')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}" />
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" value="{{$product->title}}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" value="{{$product->name}}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="price" name="price" value="{{$product->name}}" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="file">Choose Profile Image</label>
                                <input type="file" name="file" class="form-control" onchange="previewFile(this)" />
                                <img id="previewImg" alt="Ads image" src="{{asset('images')}}/{{$product->profileimage}}" style="max-width:130px;margin-top:20px;" />
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/all-product" class="btn btn-primary">Back to ads</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script>
        function previewFile(input){
            var file=$("input[type=file]").get(0).files[0];
            if(file)
            {
                var reader = new FileReader();
                reader.onload = function(){
                    $('#previewImg').attr("src",reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>