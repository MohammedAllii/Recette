<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  
    <title>Cuisine manel</title>
    <style>
#contact{
  
  padding: 3px;
width: 100%;
}
.navbar{
  background:#FF60A6;
}
p{
  margin-top:80px;
  text-align:center;
  font-size:40px;
  font-family: serif;
}
h4{
  text-align:center;
  font-size:30px;
  font-family: serif;
}
#search{
    text-align:center;
    align:center;
    margin-left: 280%;
}
#drop{
  margin-top:17px;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #FF60A6;
  min-width: 260px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>


<nav class="navbar navbar-inverse navbar-fixed-top"  >
  <div class="container-fluid">
   
    <ul class="nav navbar-nav">
    <li><a href="{{url('accueil')}}"><img src="/images/log.png" width="120px" height="40px" style="border-radius:20px;"></a></li>
    <li><a href="#"></a></li>
      <li><a href="{{url('accueil')}}" style='color:black;'><i class='fa fa-home' style='font-size:25px;color:black;'></i>  ACCUEIL</a></li>
      <li><a href="{{url('recherche')}}" style='color:black'><i class="fa fa-search" style='font-size:25px;color:black;'></i>  RECHERCHE RECETTE</a></li>
</li>
    </ul>
    <ul class="nav navbar-nav navbar-right">

          <li><a href="{{url('inscrit')}}" style='color:black;'><i class='fa fa-user' style='font-size:25px;color:black'></i>   INSCRIPTION</a></li>
          <li><a href="{{url('cnx')}}" style='color:black;'><i class='fas fa-sign-in-alt' class="open-button" style='font-size:25px;color:black'></i>   CONNEXION</a></li>    
    </ul>
  </div>
</nav>
<!--header-->

<section class="gray-section" >
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:70px;">
                <h2><g>S'inscrire</g></h2>
                <hr>
                <form action="{{Route('register')}}" method="post" enctype="multipart/form-data">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom Complet</label>
                        <input type="text" class="form-control" placeholder="Entrer votre nom complet" name="nom" value="{{old('nom')}}">
                        <span class="text-danger" >@error('nom'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Entrer votre Email" name="email" value="{{old('email')}}">
                        <span class="text-danger" >@error('email'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" placeholder="Entrer votre age" name="age" value="{{old('age')}}">
                        <span class="text-danger" >@error('age'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Numéro Télephone</label>
                        <input type="text" class="form-control" placeholder="Entrer votre Télephone" name="phone" value="{{old('phone')}}">
                        <span class="text-danger" >@error('phone'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de Passe</label>
                        <input type="password" class="form-control" placeholder="Entrer votre mot de passe" name="password" value="{{old('password')}}">
                        <span class="text-danger" >@error('password'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Votre Photo</label>
                        <input type="file" class="form-control" placeholder="Mettre votre photo" name="photo" value="{{old('photo')}}">
                        <span class="text-danger" >@error('photo'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">S'inscrire</button>
                    </div>
                    <a href="{{url('cnx')}}">J'ai déja un compte</a>
                </form>
            </div>  
        </div>
    </div>
</section>
    <br><br><br><br>
<!--footer-->
<section id="contact" style="background-color:#FF60A6;" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center m-t-lg m-b-lg">
              <br>
            <a href="#" target="_blank"><i class="fab fa-facebook-square" style='font-size:25px;color:black'></i></a>
                <a href="#" target="_blank"><i class="fab fa-linkedin" style='font-size:25px;color:black'></i></a>
                <a href="#" target="_blank"><i class="fab fa-instagram" style='font-size:25px;color:black'></i></a>
                <h5 style="color:#000000;"><strong>&copy; 2022 Manel Horcheni</strong><br/> </h5>
                
            </div>
        </div>
    </div>
</section>
</body>
</html>