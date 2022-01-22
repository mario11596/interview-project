
@if ($message = Session::get('success'))
    <div class="alertCustom">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong><p>{{ $message }}</p> </strong>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alertCustomInfo">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong><p>{{ $message }}</p> </strong>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alertCustomWarning">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong><p>{{ $message }}</p> </strong>
    </div>
@endif
