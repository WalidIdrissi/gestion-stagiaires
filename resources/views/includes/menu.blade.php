<style>
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #35C5DB;/* #0077ff */
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
      border-bottom: 2px solid white;
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
    .img{
        position: absolute;
        width: 25px;
        margin-left: -25px;
        margin-top: 15px;
    }
    #logoutForm {
        position: absolute;
        top: 0; /* Placer le formulaire au sommet */
        right: 0; /* Placer le formulaire à droite */
        margin-top: 10px; /* Ajouter une marge pour l'espacement */
        margin-right: 10px; /* Ajouter une marge pour l'espacement */
        display: block; /* Assurez-vous que le formulaire est affiché */
    }
    #logoutForm button {
        background-color: #dc3545; /* Couleur de fond */
        color: white; /* Couleur du texte */
        border: none; /* Suppression de la bordure */
        padding: 4px 6px; /* Espacement interne */
        border-radius: 5px; /* Coins arrondis */
        cursor: pointer; /* Curseur pointeur au survol */
        transition: background-color 0.3s ease; /* Transition en douceur */
    }

    #logoutForm button:hover {
        background-color: #c82333; /* Couleur de fond au survol */
    }
</style>

<ul>
    {{-- <img src="https://cdn-icons-png.flaticon.com/512/3264/3264289.png" alt="" class="img" > --}}
    <li><a href="{{url('/admin/home')}}"><i class="fas fa-home mr-1"></i> &nbsp;Index</a></li>
    <li><a href="{{ route('demande.index') }}"><i class="fas fa-envelope"></i>&nbsp;Demande stage</a></li>
    <li><a href="{{ route('stagiaire.index') }}"><i class="fas fa-users mr-1"></i>&nbsp;Stagiaire</a></li>
    <li><a href="{{ route('travaux.index') }}"><i class="fas fa-tasks"></i>&nbsp;Travaux</a></li>
    <li><a href="{{ route('rapporte.index') }}"><i class="fas fa-file-alt"></i>&nbsp;Rapporte</a></li>
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
            // Si l'utilisateur confirme, soumettez le formulaire de déconnexion
            document.getElementById('logoutForm').submit();
        } else {
            // Si l'utilisateur annule, ne rien faire
            return false;
        }
    }
</script>

{{-- <script>
    function toggleSelect(icon) {
        var select = document.getElementById("settingsDropdown");
        icon.classList.toggle("clicked");
        if (select.style.display === "none" || select.style.display === "") {
            select.style.display = "block";
        } else {
            select.style.display = "none";
        }
    }

    function handleSelection(select) {
        var selectedValue = select.value;
        if (selectedValue === 'logout') {
            document.getElementById('logoutForm').style.display = 'block';
        } else {
            document.getElementById('logoutForm').style.display = 'none';
            if (selectedValue !== '') {
                window.location.href = selectedValue;
            }
        }
    }
</script> --}}
{{-- <select id="settingsDropdown" onchange="handleSelection(this)">
    <option value="">Paramétre</option>
    <option value="{{ route('module.index') }}"><i class="fas fa-cogs mr-1"></i>Modules</option>
    <option value="logout"><i class="fas fa-sign-out-alt mr-1"></i>Déconnecter</option>
</select> --}}
