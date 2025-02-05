<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CFPM - Connexion</title>
    <!-- CSS Links -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

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
<section class="text-center text-lg-start mt-5">
    <div class="form-container mt-5">
        <img src="{{ asset('includes/images/CFPMLogo.jpg') }}" alt="Hero Image" class="img-fluid">
        <div class="form-content p-5">
            <h3>Connexion</h3>
            @if ($errors->any())
            <div class="alert alert-danger w-100">
                <ul class="mb-0"  style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li class="h6">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                            @csrf
                            <div class="form-outline mb-4">
                                <input type="email" name="email" id="email" class="form-control" required />
                                <label class="form-label" for="email">Adresse email</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="password" name="password" id="password" class="form-control" required />
                                <label class="form-label" for="password">Mot de passe</label>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                                <a href="{{route('Inscription')}}" class="signup-image-link">Créer un compte</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-4">Se connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JS Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
