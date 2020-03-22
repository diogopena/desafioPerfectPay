<!doctype html>
<html lang="en">
    @include('Layouts/Layout')
    <body>
    <div class="container">
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
        <form method="POST" action="{{route('product.update',[$product->id])}}" class="form-horizontal form-validade">
            {{csrf_field()}}
            @method('PUT')
            <div class="form-group">
                <label >Nome: </label>
                <input disabled id="name" name="name" required type="text" class="form-control" value="{{old("name",$product->name)}}">
            </div>
            <div class="form-group">
                <label >Descrição: </label>
                <input id="description" name="description" type="text" class="form-control" value="{{old("description",$product->description)}}">
            </div>
            <div class="form-group">
                <label >Preço: </label>
                <input id="price" name="price" type="text" class="form-control" value="{{old("price",$product->price)}}">
            </div>
            <button type="submit" class="btn btn-primary">Gravar!</button>
        </form>
    
    </div>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>