@if (!$errors->isEmpty())
      <div class="alert alert-danger">
        <p><strong>Oops! </strong>Por favor arregle los siguientes errores:</p>
        <ul>
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
           @endforeach
        </ul>
      </div>
@endif