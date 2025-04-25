<x-layout>
    <div class="container-fluid md-5 p-5 bg-black">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center display-1 text-white">Ciao Registrati</h1>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container my-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 p-5 shadow">
                <form method="POST" action="{{route('register')}}">

                    @csrf

                    <div class="mb-3">
                        <label for="inputName" class="form-label text-white">Nome:</label>
                        <input type="text" name="name" class="form-control" id="inputName" aria-describedby="nameHelp">
                    </div>
                    <div class="mb-3">
                      <label for="inputEmail" class="form-label text-white">Email:</label>
                      <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label text-white">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="passwordConfirmation" class="form-label text-white">Conferma password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="passwordConfirmation">
                    </div>

                    <button type="submit" class="btn btn-primary">Registrati</button>
                  </form>
            </div>
        </div>
    </div>

</x-layout>
