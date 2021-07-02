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
            <div class="col ">
            <h1 class="h1title">Registration form</h1>
            <h1 class="h1subtitle">to submit your product</h1>

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
                {{ Form::number('price', Request ::old('price'), array('class' => 'form-control','step'=>'any')) }}
            </div>

            <div class="form-group">
                {{ Form::label('total', 'Total') }}
                {{ Form::number('total', Request ::old('total'), array('class' => 'form-control', 'step' => 'any' )) }}
            </div>
            <p class="required-field">*required field</p>
            <div class="d-flex justify-content-center">{{ Form::submit('Submit', array('class' => 'btn btn-primary btn-lg btn-block')) }}</div>
            

            {{ Form::close() }}

            <!-- will be used to show any messages -->
            @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <hr>
            <hr>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr bgcolor="279ac3">
                        <td >Productname</td>
                        <td >Quantity in stock</td>
                        <td >Price</td>
                        <td >Total</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $key => $value)
                    <tr>

                        <td bgcolor="c9e6f0">{{ $value->name }}</td>
                        <td>{{ $value->quantity_in_stock }}</td>
                        <td >€{{number_format($value->price , 2) }}</td>
                        <td >€{{number_format($value->total , 2) }}</td>
                        <!--<td >{{ floatval(number_format($value->price , 2)) }}</td> -->
                @endforeach
                </tbody>
            </table>

            </div>
        <div class="col">
        <img class="image" src="/images/Achtergrond.png" />
        <img class="image1" src="/images/TU Delft Impact Contest Wit.png" />
        </div>

</div>
</body>
</html>