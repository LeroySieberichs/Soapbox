<!DOCTYPE html>
<html>
<head>
    <title>TUDelft</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    <?php include '..\resources\css\app.css'; ?>
    </style>
</head>
<body>
<div class="container-fluid">
<div class="row">
    <div class="col">
    <h1>Registration form</h1>
<h1>to submit your product</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}
{{ Form::open(array('url' => 'products')) }}
    <div class="form-group">
        {{ Form::label('name', 'Product name*') }}
        {{ Form::text('name', Request ::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('quantity_in_stock', 'Quantity in stock*') }}
        {{ Form::number('quantity_in_stock', Request ::old('quantity_in_stock'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('price', 'Price*') }}
        {{ Form::number('price', Request ::old('price'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('total', 'Total') }}
        {{ Form::number('total', Request ::old('total'), array('class' => 'form-control')) }}
    </div>
    <div class="d-flex justify-content-center">{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}</div>
    

{{ Form::close() }}

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Productname</td>
            <td>Quantity in stock</td>
            <td>Price</td>
            <td>Total</td>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $key => $value)
        <tr>

            <td>{{ $value->name }}</td>
            <td>{{ $value->quantity_in_stock }}</td>
            <td>€{{ $value->price }}</td>
            <td>€{{ $value->total }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

    </div>
    <div class="col image">
    </div>
    
  </div>

</div>
</body>
</html>