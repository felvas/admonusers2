@extends('layouts.app', ['title' => __('Process Management')])

@section('content')
@php
    //
@endphp
    @include('users.partials.header', [
        'title' => __('Add Process'),
    ])   
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Process Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('proces.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('proces.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Process information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('process_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-process_id">{{ __('Process ID') }}</label><br>
                                    <label id="id" class="form-control-label"></label>
                                    <input type="hidden" name="process_id" id="input-process_id" class="form-control form-control-alternative{{ $errors->has('process_id') ? ' is-invalid' : '' }} disabled " placeholder="{{ __('Process ID') }}" required autofocus>

                                    @if ($errors->has('process_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('process_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('process_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-process_name">{{ __('Process Name') }}</label>
                                    <input type="text" name="process_name" id="input-process_name" class="form-control form-control-alternative{{ $errors->has('process_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Process Name') }}" value="{{ old('process_name') }}" required autofocus>

                                    @if ($errors->has('process_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('process_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __('Descripcion') }}</label>
                                    <textarea name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Descripcion') }}" value="{{ old('description') }}" required></textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('departamento') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-departamento">{{ __('Departamento') }}</label>
                                    <select name="departamento" id="input-departamento" class="form-control form-control-alternative{{ $errors->has('departamento') ? ' is-invalid' : '' }}" placeholder="{{ __('Departamento') }}" value="{{old('departamento')}}" required>
                                        <option value="">Seleccione un departamento</option>
                                        @foreach($departamentos_list as $depto)
                                            <option value="{{ $depto->id_departamento}}">{{ $depto->departamento }}</option>
                                        @endforeach
                                    </select>
                                    
                                    @if ($errors->has('departamento'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('departamento') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('municipio') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-municipios">{{ __('Municipio') }}</label>
                                    <select name="municipio" id="input-municipio" class="form-control form-control-alternative{{ $errors->has('municipio') ? ' is-invalid' : '' }}" placeholder="{{ __('Municipio') }}" value="{{old('municipio')}}" required>
                                        <option value="">Seleccione un municipio</option>
                                    </select>
                                    
                                    @if ($errors->has('municipio'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('municipio') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{ csrf_field() }}

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script >
                $(document).ready(function(){
                    id = '<?php echo uniqid(); ?>';
                    $("#id").text(id);
                    $("#input-process_id").val($("#id").text());
                    
                 $('#input-departamento').change(function(){
                  if($(this).val() != '')
                  {
                   var select = $(this).attr("id");
                   var value = $(this).val();
                   var dependent = $(this).data('dependent');
                   var _token = $('input[name="_token"]').val();
                   $.ajax({
                    url:"{{ route('dynamicdependent.fetch') }}",
                    method:"POST",
                    data:{select:select, value:value, _token:_token, dependent:dependent},
                    success:function(result)
                    {
                     $('#input-municipio').html(result);
                    }
                
                   })
                  }
                 });
                
                 $('#country').change(function(){
                  $('#state').val('');
                  $('#city').val('');
                 });
                
                 $('#state').change(function(){
                  $('#city').val('');
                 });
                 
                
                });

        </script>
        @include('layouts.footers.auth')
    </div>
@endsection