<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: skyblue;
  box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
}
li {
  float: left;
}
li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
li a:hover {
  color:black;
}
.dropdown-container {
    position: relative;
}
.cog-icon {
    margin-left: 750px;
    margin-top: 19px;
    cursor: pointer;
}
.cog-icon.clicked {
    margin-top:10px;
}
#settingsDropdown {
    position: absolute;
    top: 5%;
    margin-left: 705px;
    display: none;
}
#logoutForm{
    position: absolute;
    top: 9%;
    margin-left: 740px;
    display: none;
}
#logoutForm {
    position: absolute;
    top: 0;
    right: 0;
    margin-top: 10px;
    margin-right: 10px;
    display: block;
}
#logoutForm button {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 4px 6px;
    border-radius: 5px
    cursor: pointer;
    transition: background-color 0.3s ease;
}
#logoutForm button:hover {
    background-color: #c82333;
}
</style>
<ul>
    <li><a href="{{url('/admin/home')}}"><img src="{{ asset('images/logo-header.png') }}" alt="loginIMG" style="width: 110px; height: 25px;"></a></li>
    <li><a href="{{ route('demande.index') }}"><i class="fas fa-envelope"></i>&nbsp;Demande stage</a></li>
    <li><a href="{{ route('stagiaire.index') }}"><i class="fas fa-users mr-1"></i>&nbsp;Stagiaire</a></li>
    <li><a href="{{ route('travaux.index') }}"><i class="fas fa-tasks"></i>&nbsp;Travaux</a></li>
    <li><a href="{{ route('rapporte.index') }}"><i class="fas fa-file-alt"></i>&nbsp;Rapporte</a></li>
    <li><a href="{{ route('evaluations.index') }}"><i class="fas fa-star"></i>&nbsp;Evaluation</a></li>
    <li><a href="{{ route('encadrant.index') }}"><i class="fas fa-user-tie"></i>&nbsp;Encadrant</a></li>
    <li>
        <form id="logoutForm" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="button" onclick="confirmLogout()"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
        </form>
    </li>
</ul>
<script>
    function confirmLogout() {
        if (confirm("Voulez-vous déconnecter ?")) {
            document.getElementById('logoutForm').submit();
        } else {
            return false;
        }
    }
</script>
