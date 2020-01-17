@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-xs-12">

        <div class="box box-info">

            <div class="box-header">
                <h3 class="box-title">{{__('Add New')}}</h3>
            </div>
            <!-- /.box-header -->


            <form method="post" action="{{ route('cars.store') }}" role="form" onsubmit="return confirm('{{__('Are you sure?')}}')">
                @csrf

                <div class="box-body">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">{{__('Name')}} *</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" autofocus>
                        
                                @if ($errors->has('name'))
                                    <div class="form-group has-error">
                                        <span class="help-block">{{ $errors->first('name') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price">{{__('Price')}} *</label>
                                <input type="text" class="form-control money" id="price" name="price" value="{{ old('price') }}">
                        
                                @if ($errors->has('price'))
                                    <div class="form-group has-error">
                                        <span class="help-block">{{ $errors->first('price') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <label for="stock">{{__('Stock Quantity')}} *</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}">
                        </div>

                        @if ($errors->has('stock'))
                            <div class="form-group has-error">
                                <span class="help-block">{{ $errors->first('stock') }}</span>
                            </div>
                        @endif
                    </div>
                                    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            {{__('Submit')}}
                        </button>
                    </div>
                    
                </div>            <!-- /.box-body -->

            </form>

        </div>
        
        

    </div>
    <!-- /.col -->
</div>
@stop