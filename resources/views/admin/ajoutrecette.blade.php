<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cuisine manel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<style>
    body{
  margin: 0;
  padding: 0;
  font-family: "Roboto", sans-serif;
}
header{
  position: absolute;
  background-color: #22242A;
  padding: 20px;
  width: 100%;
  height: 70px;
}
.left_area h3{
  color: #fff;
  margin: 0;
  text-transform: uppercase;
  font-size: 22px;
  font-weight: 900;
}
.left_area span{
  color: #19B3D3;
}
.logout_btn{
  padding: 5px;
  background: #19B3D3;
  text-decoration: none;
  float: right;
  margin-top: -30px;
  margin-right: 40px;
  border-radius: 2px;
  font-size: 15px;
  font-weight: 600;
  color: #fff;
  transition: 0.5s;
  transition-property: background;
}
.logout_btn:hover{
  background: #0B87A6;
}
.sidebar {
  background: #2f323a;
  margin-top: 70px;
  padding-top: 30px;
  position: absolute;
  left: 0;
  width: 250px;
  height: 120%;
  transition: 0.5s;
  transition-property: left;
}
.sidebar .profile_image{
  width: 100px;
  height: 100px;
  border-radius: 100px;
  margin-bottom: 10px;
}
.sidebar h4{
  color: #ccc;
  margin-top: 0;
  margin-bottom: 20px;
}
.sidebar a{
  color: #fff;
  display: block;
  width: 100%;
  line-height: 60px;
  text-decoration: none;
  padding-left: 40px;
  box-sizing: border-box;
  transition: 0.5s;
  transition-property: background;
}
.sidebar a:hover{
  background: #19B3D3;
}
.sidebar i{
  padding-right: 10px;
}
label #sidebar_btn{
  z-index: 1;
  color: #fff;
  position: absolute;
  cursor: pointer;
  left: 300px;
  font-size: 20px;
  margin: 5px 0;
  transition: 0.5s;
  transition-property: color;
}
label #sidebar_btn:hover{
  color: #19B3D3;
}
#check:checked ~ .sidebar{
  left: -190px;
}
#check:checked ~ .sidebar a span{
  display: none;
}
#check:checked ~ .sidebar a{
  font-size: 20px;
  margin-left: 170px;
  width: 80px;
}
.content{
  margin-left: 250px;
  background: url(background.png) no-repeat;
  background-position: center;
  background-size: cover;
  height: 100vh;
  transition: 0.5s;
}
#check:checked ~ .content{
  margin-left: 60px;
}
#check{
  display: none;
}
      
</style>  
</head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>Recette <span>Fadouda</span></h3>
      </div>
      <div class="right_area">
        <a href="{{url('decocnx')}}" class="logout_btn">Logout</a>
      </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
      <center>
        <img src="/images/{{$data->photo}}" class="profile_image" alt="">
        <h4>{{$data->nom}}</h4>
      </center>
      <a href="/allusers"><i class="fas fa-edit"></i><span>Gestion Users</span></a>
      <a href="/allrecettes"><i class="fas fa-edit"></i><span>Gestion Recettes</span></a>
      <a href="/ajoutadmin"><i class="fas fa-plus"></i><span>Add Admin</span></a>
      <a href="/addrecetteadmin"><i class="fas fa-plus"></i><span>Add Recette</span></a>
    </div>
    <!--sidebar end-->
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:70px;">
                <h2><g>Add Recette</g></h2>
                <hr>
                <form action="{{Route('ajoutrecette')}}" method="post" enctype="multipart/form-data">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="name_recette">Nom du recette</label>
                        <input type="text" class="form-control" placeholder="Entrer le nom du recette" name="name_recette" value="{{old('name_recette')}}">
                        <span class="text-danger" >@error('name_recette'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                    <label for="difficult??">difficult??</label>
                    <select class="form-control" name="difficult??">
                        <option selected>Select Difficult?? ...</option>
                        <option value="Facile">Facile</option>
                        <option value="Moyen">Moyen</option>
                        <option value="Dificile">Dificile</option>
                    </select>    
                    <span class="text-danger" >@error('difficult??'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                    <label for="categorie">Cat??gorie</label>
                    <select class="form-control" name="categorie">
                        <option selected>Select Cat??gorie ...</option>
                        <option value="Sal??">Recette Sal??</option>
                        <option value="Sucr??">Recette Sucr??</option>
                        <option value="Gateau">Recette Gateaux</option>
                        <option value="Jus">Recette Jus</option>
                        <option value="Sandwich">Recette Sandwich</option>
                    </select>    
                    <span class="text-danger" >@error('difficult??'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="preparation">Pr??paration</label>
                        <input type="number" class="form-control" placeholder="Entrer le dur??e du pr??paration" name="preparation" value="{{old('preparation')}}">
                        <span class="text-danger" >@error('preparation'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cuisson">Cuisson</label>
                        <input type="number" class="form-control" placeholder="Entrer le dur??e du cuisson" name="cuisson" value="{{old('cuisson')}}">
                        <span class="text-danger" >@error('cuisson'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="ingr??diant">Ingr??diant</label>
                        <textarea class="form-control" placeholder="Entrer les ingr??diants" name="ingr??diant" value="{{old('ingr??diant')}}"></textarea>
                        <span class="text-danger" >@error('ingr??diant'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="description">Comment le pr??parer</label>
                        <textarea class="form-control" placeholder="Comment pr??parer cette recette" name="description" value="{{old('description')}}"></textarea>
                        <span class="text-danger" >@error('description'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="photo_recette">Photo du recette</label>
                        <input type="file" class="form-control" name="photo_recette" value="{{old('photo_recette')}}">
                        <span class="text-danger" >@error('photo_recette'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id_user" value="{{$data->id}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Ajouter recette</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>
    

  </body>
</html>