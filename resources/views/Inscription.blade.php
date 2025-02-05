<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CFPM</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .form-container {
            display: flex;
            max-width: 900px;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .form-container img {
            width: 50%;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .form-content {
            padding: 30px;
            background: rgba(255, 255, 255, 0.9);
            flex: 1;
        }

        .form-content h3 {
            font-size: 1.5rem;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .form-content .btn {
            width: 100%;
        }

        @media (max-width: 768px) {
            .form-container {
                flex-direction: column;
            }

            .form-container img {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<body>
    <div class="form-container mt-5 ">
        <img src="{{ asset('includes/images/CFPMLogo.jpg') }}" alt="Hero Image" class="img-fluid">
        <div class="form-content p-5">
            <h3>Créer un compte</h3>
            @if ($errors->any())
            <div class="alert alert-danger w-100">
                <ul class="mb-0"  style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li class="h6">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <form action="{{route('user.store')}}" id="register-form"  method="POST">
                @csrf
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-outline">
                            <input type="text" name="name" id="name" class="form-control" required/>
                            <label class="form-label" for="name">Votre Nom</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-outline">
                            <input type="text" name="prenom" id="prenom" class="form-control" required/>
                            <label class="form-label" for="prenom">Votre prenom</label>
                        </div>
                    </div>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" name="email" id="email" class="form-control form-control-lg" required/>
                    <label class="form-label" for="email">Votre E-mail</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="cin" id="cin" class="form-control form-control-lg" required/>
                    <label class="form-label" for="email">Votre CIN</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" name="password" id="pass" class="form-control form-control-lg" required/>
                    <label class="form-label"for="pass">Mot de passe</label>
                </div>

                <div class="row">
                    <input type="submit" name="signup" id="signup" class="btn btn-primary mb-2" value="S'inscrire"/>
                </div>
            </form>
            <div data-mdb-input-init class="form-outline mb-4 text-center">
                <a href="{{route('connexion')}}" class="signup-image-link">je suis déjà membre</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>
</html>
