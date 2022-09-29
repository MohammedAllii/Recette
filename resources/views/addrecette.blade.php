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
                <h2 class='fa fa-plus-square' style="font-size:30;color:#000000;"><g> Ajout d'une recette</g></h2>
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
                    <label for="difficulté">difficulté</label>
                    <select class="form-control" name="difficulté">
                        <option selected>Select Difficulté ...</option>
                        <option value="Facile">Facile</option>
                        <option value="Moyen">Moyen</option>
                        <option value="Dificile">Dificile</option>
                    </select>    
                    <span class="text-danger" >@error('difficulté'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                    <label for="categorie">Catégorie</label>
                    <select class="form-control" name="categorie">
                        <option selected>Select Catégorie ...</option>
                        <option value="Salé">Recette Salé</option>
                        <option value="Sucré">Recette Sucré</option>
                        <option value="Gateau">Recette Gateaux</option>
                        <option value="Jus">Recette Jus</option>
                        <option value="Sandwich">Recette Sandwich</option>
                    </select>    
                    <span class="text-danger" >@error('difficulté'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="preparation">Préparation</label>
                        <input type="number" class="form-control" placeholder="Entrer le durée du préparation" name="preparation" value="{{old('preparation')}}">
                        <span class="text-danger" >@error('preparation'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cuisson">Cuisson</label>
                        <input type="number" class="form-control" placeholder="Entrer le durée du cuisson" name="cuisson" value="{{old('cuisson')}}">
                        <span class="text-danger" >@error('cuisson'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="ingrédiant">Ingrédiant</label>
                        <textarea class="form-control" placeholder="Entrer les ingrédiants" name="ingrédiant" value="{{old('ingrédiant')}}"></textarea>
                        <span class="text-danger" >@error('ingrédiant'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="description">Comment le préparer</label>
                        <textarea class="form-control" placeholder="Comment préparer cette recette" name="description" value="{{old('description')}}"></textarea>
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

</section>
    <br><br><br><br><br><br>

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