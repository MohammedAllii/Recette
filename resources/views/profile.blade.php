<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Cuisine manel</title>
    <link rel="icon" href="/images/bg6.png">
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
    @if($data != null)
          <li id="drop">
            <div class="dropdown" style="right:80%;">
              <img src="/images/{{$data->photo}}" width="35px" height="35px" style="border-radius:50px;"><span style='font-size:20px;color:black;font-family: serif;'> {{$data ->nom}}</span>
              <div class="dropdown-content">
              <a href="{{url('profile')}}"><img src="/images/{{$data->photo}}" width="35px" height="35px" style="border-radius:50px;"><span style='font-size:20px;color:black;font-family: serif;'> Mon Compte</span></a>
              <a href="/addrecette" style='color:black'><i class="fa fa-plus-circle" style='font-size:25px;color:black;'></i>  AJOUTER RECETTE</a>
              <a href="/myrecette" style='color:black'><i class="fa fa-history" style='font-size:25px;color:black;'></i>  MES RECETTES</a>
              <a href="favoris/{{$data->id}}" style='color:black'><i class="fa fa-bookmark" style='font-size:25px;color:black;'></i>  RECETTES SAUVEGARDER</a>
              <a href="{{url('decocnx')}}" style='color:black;margin-right:20%;'><i class='fa fa-sign-out-alt' class="open-button" style='font-size:25px;color:black'></i>   DECONNEXION</a>
              </div>
            </div> 
          </li>
         @else
          <li><a href="{{url('inscrit')}}" style='color:black;'><i class='fa fa-user' style='font-size:25px;color:black'></i>   INSCRIPTION</a></li>
          <li><a href="{{url('cnx')}}" style='color:black;'><i class='fas fa-sign-in-alt' class="open-button" style='font-size:25px;color:black'></i>   CONNEXION</a></li>


         
         @endif
    
    </ul>
  </div>
</nav>
<!--header-->

<section class="gray-section" >
    <div class="container">
        <div class="row">
            <div style="margin-top:70px;">
                <h2 class='fa fa-list' style="font-size:30;color:#000000;"><g> Mon Profile</g></h2>
                <hr>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col"><img src="/images/{{$data->photo}}" width="150px" height="150px" style="border-radius:80px;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">{{$data->nom}}</th>

                    </tr>
                </tbody>
                </table>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col"><div class="fa fa-envelope"></th>
                      <th scope="col"><div class="fa fa-birthday-cake"></th>
                      <th scope="col"><div class="fa fa-phone"></th>
                      <th scope="col">Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">{{$data->email}}</th>
                      <th scope="row">{{$data->age}}</th>
                      <th scope="row">{{$data->phone}}</th>
                      <th scope="row"><div class="fa fa-edit" data-toggle="modal" data-target="#myModal"></th>

                    </tr>
                </tbody>
                </table>




    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modifier profile</h4>
        </div>
        <div class="modal-body">
          
        <form action="{{Route('update')}}" method="post" id="non" enctype="multipart/form-data">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <input type="hidden" class="form-control"  name="id" value="{{$data->id}}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nom Complet : </label>
                        <input type="text" class="form-control" placeholder="Entrer votre nom complet" name="nom" value="{{$data->nom}}">
                        <span class="text-danger" >@error('nom'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Entrer votre Email" name="email" value="{{$data->email}}">
                        <span class="text-danger" >@error('email'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" placeholder="Entrer votre age" name="age" value="{{$data->age}}">
                        <span class="text-danger" >@error('age'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Numéro Télephone</label>
                        <input type="text" class="form-control" placeholder="Entrer votre Télephone" name="phone" value="{{$data->phone}}">
                        <span class="text-danger" >@error('phone'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de Passe</label>
                        <input type="password" class="form-control" placeholder="Entrer votre mot de passe" name="password" ">
                        <span class="text-danger" >@error('password'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo de profile</label>
                        <input type="file" class="form-control"  name="photo">
                        <span class="text-danger" >@error('photo'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Modifier</button>
                    </div>
                </form>
      </div>
      
    </div>
  </div>
  



                
            </div>  
        </div>
    </div>
</section>
    <br><br><br>
<br><br><br>

<!--footer-->
<section id="contact" style="background-color:#000000;" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center m-t-lg m-b-lg">
              <br>
            <a href="#" target="_blank"><i class="fab fa-facebook-square" style='font-size:25px;color:white'></i></a>
                <a href="#" target="_blank"><i class="fab fa-linkedin" style='font-size:25px;color:white'></i></a>
                <a href="#" target="_blank"><i class="fab fa-instagram" style='font-size:25px;color:white'></i></a>
                <h3 style="color:#FFFFFF;"><strong>&copy; 2022 Manel Horcheni</strong><br/> </h3>
                
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>