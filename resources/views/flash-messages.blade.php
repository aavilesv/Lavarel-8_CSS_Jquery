@if ($message=Session::get("error"))
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <p>{{$message}}</p>
    </div>
@endif