@if ($errors->any())
    <ul class="list-error">
    @foreach ($errors->all() as $error)    
        <li class="error-item">Opps!! , {{ $error }}</li>
        @endforeach
    </ul>     
@endif