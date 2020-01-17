@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-xs-12">

        <div class="box box-info">

            <div class="box-header">
                <h3 class="box-title">{{__('Update')}}</h3>
            </div>
            <!-- /.box-header -->


            <form method="post" action="{{ route('cars.update', ['car' => $car->id]) }}" role="form" onsubmit="return confirm('{{__('Are you sure?')}}')">
                @csrf
                <input name="_method" type="hidden" value="PATCH">

                <div class="box-body">
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">{{__('Name')}} *</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : $car->name }}" autofocus>
                        
                                @if ($errors->has('descr'))
                                    <div class="form-group has-error">
                                        <span class="help-block">{{ $errors->first('descr') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6"></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price">{{__('Price')}} *</label>
                                <input type="text" class="form-control money" id="price" name="price" value="{{ old('price') ? old('price') : $car->price }}" autofocus>
                        
                                @if ($errors->has('price'))
                                    <div class="form-group has-error">
                                        <span class="help-block">{{ $errors->first('price') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6"></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                                <label for="">{{__('Current Stock Quantity')}} *</label>
                                <input type="number" class="form-control" id="" name="" value="{{ $currentStock }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                                <label for="stock">{{__('Stock Update')}} *</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}">
                            
                                @if ($errors->has('stock'))
                                    <div class="form-group has-error">
                                        <span class="help-block">{{ $errors->first('stock') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{__('Update')}}
                        </button>
                    </div>
                    
                </div>            <!-- /.box-body -->
                                    
            </form>

        </div>
        
    </div>
    <!-- /.col -->
</div>
@stop