<!doctype html>
<html lang="en">
    @include('Layouts/Layout')
    <body>
    <div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#id</th>
            <th scope="col">Nome</th>
            <th scope="col">Tipo</th>
            <th scope="col">Número de identificação</th>
            <th scope="col">E-mail</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <th scope="row">{{$customer->id}}</th>
                <td>{{$customer->name}}</td>
                <td>{{$customer->identification_type}}</td>
                <td>{{$customer->identification_number}}</td>
                <td>{{$customer->email}}</td>
                
                <td>
                
                <a class="btn btn-warning btm-lg text-white" href="{{ route('customer.edit',[ $customer->id ]) }}" role="button" aria-pressed="true">
                    <i class="fal fa-pencil"></i>
                    <span class='d-none d-md-inline'>Editar</span>
                </a>


                <span data-url="{{ route('customer.destroy',[ $customer->id ]) }}" data-idClient='{{ $customer->id }}' class="btn btn-danger btm-lg text-white deleteButton" aria-pressed="true">
                    <i class="fal fa-trash"></i>
                    <span class='d-none d-md-inline'>Deletar</span>
                </span>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>

    <a class="btn btn-primary" href="{{route('customer.create')}}" role="button" style='text-align:center;'>Inserir Cliente</a>

    </div>
 
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
        @push('scripts')

    <script>
    
    
    $('.deleteButton').on('click', function (e) {
            var url = $(this).data('url');
            var idcustomer = $(this).data('idcustomer');
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                method: 'DELETE',
                url: url
            });
            $.ajax({
                data: {
                    'idcustomer': idcustomer,
                },
                success: function (data) {
                    console.log(data);
                    if (data['status'] ?? '' == 'success') {
                        if (data['reload'] ?? '') {
                            location.reload();
                        }
                    } else {
                    console.log('error');
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    </script>
@endpush
    
    </body>

</html>