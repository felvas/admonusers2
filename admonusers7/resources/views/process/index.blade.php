@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Process') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url('proces/create') }}" class="btn btn-sm btn-primary">{{ __('Add process') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('ID Process') }}</th>
                                    <th scope="col">{{ __('Process Name') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                    <th scope="col">{{ __('Departamento') }}</th>
                                    <th scope="col">{{ __('Municipio') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($process as $proces)
                                    <tr>
                                        <td>{{ $proces->process_id }}</td>
                                        <td>{{ $proces->process_name }}</td>
                                        <td>{{ $proces->description }}</td>
                                        <td class=".depto">
                                            {{ $proces->departamento }}
                                        </td>
                                        <td class=".mun">{{ $proces->municipio }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                        <form action="{{ route('proces.destroy', $proces) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('user.edit', $proces) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    
                                                    
                                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Edit') }}</a>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $process->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        
        <script >
            $(document).ready(function(){
                var x ='';
                $('.table td').each(function() {
                    if($(this).attr('class')=='.depto'){
                        var departamento_id = $(this).text();
                        var array='';
                        $.ajax({ 
                            method:'POST',
                            async: false,
                            url:"{{ url('dynamic_dependent/getNameDepto/') }}/"+$.trim(departamento_id),
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success:function( data ) {
                                setName(data)
                            }
                        });
                        $(this).text(x)
                    }
                    
                    
                });
                $('.table td').each(function() {
                    if($(this).attr('class')=='.mun'){
                        var municipio_id = $(this).text();
                        var array='';
                        $.ajax({ 
                            method:'POST',
                            async: false,
                            url:"{{ url('dynamic_dependent/getNameMun/') }}/"+$.trim(municipio_id),
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success:function( data ) {
                                setName(data)
                            }
                        });
                        $(this).text(x)
                    }
                    
                    
                });
                function setName(data){
                    x=data;
                }
            });
        </script>
        @include('layouts.footers.auth')
    </div>
@endsection