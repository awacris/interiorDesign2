
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="#home">Home</a>
  
 
</div>

<div style="padding-left:16px">
  <h2 class="pull-center">Interior Design User</h2>
  <div class="container">
   <div class="row">
       <div class="col-md-4" style="padding:10px;">
   <div class="card" style="width:100%">
    <img class="card-img-top" src="{{asset('images')}}/{{$product->cover}}" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">{{$product->name}}</h4>
    </div>
  </div>
</div>
 <div class="col-md-4">
  @foreach($options as $option)
  <div class="form-group">
      <label for="sel1"> {{$option->name}}:</label>
      <select class="form-control" id="sel1" name="sellist1">
        @foreach($option->option_values()->get() as $values)
      <option>{{$values->value}}</option>
       @endforeach
      </select>
      </div>

  @endforeach
</div>

<div class="col-md-4">
  <h3> Admin product setup </h3>
  @foreach($productOptions->unique('option_id') as $option)
  <div class="form-group">
      <label for="sel1"> {{$options->where('id', $option->option_id)->first()->name}}:</label>
      <select class="form-control" id="sel1" name="sellist1">
        @foreach($productOptions->where('option_id', $option->option_id) as $values)
      <option>{{$values->value}}</option>
       @endforeach
      </select>
      </div>

  @endforeach
</div>

</div>
</div>
 
</div>

</body>
</html>