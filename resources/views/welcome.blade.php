<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$atp[0]->name}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    </head>
    <body>
       <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary container-xxl">
                <div class="container-xxl">
                    <a class="navbar-brand" href="http://atp/">{{$atp[0]->name}}</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <img src="{{asset('storage/' . $atp[0]->logo)}}" alt="logo" style="width: 40px;">
                    </div>
                </div>
                @auth
                    <p class="flex gap-1 col-1">
                        <a href="http://atp/admin/" class="btn btn-primary" role="button" data-bs-toggle="button">{{$user->name}}</a>
                    </p>
                @endauth

                @guest
                    <p class="d-inline-flex gap-1">
                        <a href="http://atp/admin/login" class="btn btn-primary" role="button" data-bs-toggle="button">Login</a>
                    </p>
                @endguest
            </nav>
       </header>
       <section>
        <div class="container-xxl mt-30">
            <form action="{{route('post.application')}}" class="container col-sm-4" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input class="form-control" id="name" name="name" type="text" placeholder="name" >
                @if( $errors->has( 'name' )) 
                    <div class= "alert alert-danger" >{{ $errors->first( 'name' ) }}</div > 
                @endif 
                <label for="exampleFormControlInput1" class="form-label">Surname</label>
                <input class="form-control" id="surname" name="surname" type="text" placeholder="surname" >
                @if( $errors->has( 'surname' )) 
                    <div class= "alert alert-danger" >{{ $errors->first( 'surname' ) }}</div > 
                @endif 
                <label for="exampleFormControlInput1" class="form-label">Birthday</label>
                <input class="form-control" id="birthday" name="birthday" value="2000-01-01" min="1930-01-01" type="date" placeholder="birthday">
                @if( $errors->has( 'birthday' )) 
                    <div class= "alert alert-danger" >{{ $errors->first( 'birthday' ) }}</div > 
                @endif
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Create</button>
            </div>
            </form>
        </div>
       </section>
    </body>
</html>
