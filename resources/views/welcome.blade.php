<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    </head>
    <body>
       <header>
       <nav class="navbar navbar-expand-lg bg-body-tertiary container-xxl">
            <div class="container-xxl">
                <a class="navbar-brand" href="#">ATP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <img src="" alt="logo">
                </div>
            </div>
            </nav>
       </header>
       <section>
        <div class="container-xxl">
            <form action="" class="container col-sm-4">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input class="form-control" type="text" placeholder="name" aria-label="default input example">
                <label for="exampleFormControlInput1" class="form-label">Surname</label>
                <input class="form-control" type="text" placeholder="surname" aria-label="default input example">
                <label for="exampleFormControlInput1" class="form-label">Birthday</label>
                <input class="form-control" type="text" placeholder="birthday" aria-label="default input example">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">add</button>
            </div>
            </form>
        </div>
       </section>
    </body>
</html>
