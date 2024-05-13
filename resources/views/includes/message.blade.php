<div id="alertContainer">
    @if ($message= Session::get('success'))
        <div class="alert alert-success text-center" id="successAlert" style="display: none;">
            <p>{{$message}} ✅</p>
        </div>
    @endif
</div>

<div id="alertContainer">
    @if ($message= Session::get('supp'))
        <div class="alert alert-danger text-center" id="successAlert" style="display: none;">
            <p>{{$message}} ❌</p>
        </div>
    @endif
</div>

<div id="alertContainer">
    @if ($message= Session::get('modif'))
        <div class="alert alert-primary text-center" id="successAlert" style="display: none;">
            <p>{{$message}} 🔄</p>
        </div>
    @endif
</div>

<script>
    var successAlert = document.getElementById("successAlert");
    successAlert.style.display = "block";
    setTimeout(function() {
        successAlert.style.display = "none";
    }, 2000);
</script>
