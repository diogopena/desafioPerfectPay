<!doctype html>
<html lang="en">
    @include('Layouts/Layout')
    <body>
    <div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
        <form method="POST" action="{{route('customer.store')}}" class="form-horizontal form-validade">
            {{csrf_field()}}
            <div class="form-group">
                <label >Nome: </label>
                <input id="name" name="name" required type="text" class="form-control" value="{{old("name")}}">
            </div>
            <div class="form-group">
                <label >Tipo: </label>
                <input id="identification_type" name="identification_type" type="text" class="form-control" value="{{old("identification_type")}}">
            </div>
            <div class="form-group">
                <label >Número de identificação: </label>
                <input id="identification_number" name="identification_number" type="text" class="form-control" value="{{old("identification_number")}}">
            </div>
            <div class="form-group">
                <label >E-mail: </label>
                <input id="email" name="email" type="text" class="form-control" value="{{old("email")}}">
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