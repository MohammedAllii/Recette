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
<div class="container-fluid" id="cuisine">
<p>Cuisine <strong style='color:red'>Manel</strong><img src="/images/log.png" width="120px" height="60px" style="border-radius:20px;"></p>
</div>
<hr>
<p><strong>{{ $recette->name_recette }}</strong></p>
<p><img src="/images/{{$recette->photo_recette}}" width="45%" height="65%" style="border-radius:20px;"></p>
<hr>
<h4 style='color:red;'>Comment préparer?</h4>
<h4>{{ $recette->description }}</h4>
<hr>
<h4 style='color:red;'>Les ingrédiants?</h4>
<h4>{{ $recette->ingrédiant }}</h4>
<hr>
<table class="table" style='margin-left:5%;'>
<thead>
    <tr>
      <th scope="col">Difficulté</th>
      <th scope="col">Préparation</th>
      <th scope="col">Cuisson</th>
      <th scope="col">Temps Total</th>
      <th scope="col">Catégorie</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><img src="/images/diff.png" width="35px" height="40px"> {{$recette->difficulté}}</th>
      <td><img src="/images/preparation.png" width="35px" height="40px"><span class="fs-6 badge rounded-pill text-bg-danger">{{$recette->preparation}} min</span></td>
      <td><img src="/images/cuisson.png" width="35px" height="40px"><span class="fs-6 badge rounded-pill text-bg-danger">{{$recette->cuisson}} min</span></td>
      <td><img src="/images/time.png" width="35px" height="40px"><span class="fs-6 badge rounded-pill text-bg-danger">{{$recette->preparation + $recette->cuisson}} min</span></td>
      <td><img src="/images/categorie.png" width="35px" height="40px"><span class="fs-6 badge rounded-pill text-bg-danger">{{$recette->categorie}}</span></td>
    </tr>
    </tbody>
    </table>
<br><br><br>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>