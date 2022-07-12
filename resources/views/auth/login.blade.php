<x-auth-layout>
    <x-slot name="title">Login</x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <x-card label="Login" class="card-primary">
                    <form action="{{ route('login.action') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            Login
                        </button>

                        <a href="{{ route('home') }}" class="btn btn-danger btn-block">Kembali</a>

                    </form>
                </x-card>

            </div>
        </div>
    </div>

</x-auth-layout>
