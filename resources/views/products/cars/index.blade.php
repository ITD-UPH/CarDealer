@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-xs-12">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="{{ route('cars.create') }}" class="btn btn-block btn-success">{{__('Add New')}} {{__('Cars')}}</a></h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                <table id="cars-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>{{__('ID')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Price')}}</th>
                        <th>{{__('Updated Date')}}</th>
                        <th>{{__('Action')}}</th>
                    </tr>
                    </thead>
                
                    @foreach($cars as $car)                                 
                        <tr>
                            <td>{{ $car->id }}</td>
                            <td>{{ $car->name }}</td>
                            <td>{{ number_format($car->price) }}</td>
                            <td>{{ date_create($car->updated_at)->format('d-M-Y, H:i') }}</td>
                            <td nowrap><a href="{{ route('cars.edit', ['car' => $car->id]) }}" class="btn btn-block btn-warning btn-xs" title="Edit"><i class="fas fa-pencil-alt"></i></a>

                                <form action="{{ route('cars.destroy', ['car' => $car->id]) }}" method="post" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-block btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
                                </form>   
                            </td>

                        </tr>
                    @endforeach 


                </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>

    </div>
    <!-- /.col -->
</div>
@stop