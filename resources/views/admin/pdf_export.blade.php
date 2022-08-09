<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Core theme CSS (includes Bootstrap)-->
    {{-- <link rel="stylesheet" href="{{ url('css/styles.css') }}"> --}}
    <style>
        .titre{
            width: 100vw;
            text-align: center;
        }
        .tableau_container{
            width: 100vw;
        }
        .table{
            width: 80vh;
            margin-left: 10vh;
        }
    </style>
    <title>Document</title>
</head>
<body>

    <div class="container">
        <div class="row" style="margin-top: 4vh;">
            <div class="col-12 text-center titre">
                <h1>
                    {{ $vehicule->numero }} - {{ $vehicule->marque }} {{ $vehicule->modele }}   
                </h1>
            </div>
        </div>
        <div class="row" style="margin-top: 5vh;" class="tableau_container">
            <table class="table table-bordered table-striped" style="border: 1px solid black;" >
                <thead class="table-dark">
                    <tr  style="border: 1px solid black;border-collapse: collapse; border-collapse: collapse;background: rgb(184, 184, 184);">
                        <th style="border: 1px solid black;border-collapse: collapse;padding: 5px 5px 5px 5px;font-size: 18px;">Départ</th>
                        <th style="border: 1px solid black;border-collapse: collapse;padding: 5px 5px 5px 5px;font-size: 18px;">Destination</th>
                        <th style="border: 1px solid black;border-collapse: collapse;padding: 5px 5px 5px 5px;font-size: 18px;">Date de départ</th>
                        <th style="border: 1px solid black;border-collapse: collapse;padding: 5px 5px 5px 5px;font-size: 18px;">Date d'arrivée</th>
                        <th style="border: 1px solid black;border-collapse: collapse;padding: 5px 5px 5px 5px;font-size: 18px;">Kilometrage au départ</th>
                        <th style="border: 1px solid black;border-collapse: collapse;padding: 5px 5px 5px 5px;font-size: 18px;">Kilometrage à l'arrivée</th>
                    </tr>
                </thead>
                @foreach ($trajets as $trajet)
                    <tr style="border: 1px solid black;border-collapse: collapse;">
                        <td style="border: 1px solid black;border-collapse: collapse;padding: 5px 5px 5px 5px"> {{ $trajet->lieu_depart }} </td>
                        <td style="border: 1px solid black;border-collapse: collapse;padding: 5px 5px 5px 5px"> {{ $trajet->lieu_arrivee }} </td>
                        <td style="border: 1px solid black;border-collapse: collapse;text-align:center;padding: 5px 5px 5px 5px"> {{ $trajet->date_depart->format('D M Y h:i') }} </td>
                        <td style="border: 1px solid black;border-collapse: collapse;text-align:center;padding: 5px 5px 5px 5px"> {{ $trajet->date_arrivee->format('D M Y h:i') }} </td>
                        <td style="border: 1px solid black;border-collapse: collapse;text-align:end;padding: 5px 5px 5px 5px"> {{ $trajet->kilometrage_depart }} </td>
                        <td style="border: 1px solid black;border-collapse: collapse;text-align:end;padding: 5px 5px 5px 5px"> {{ $trajet->kilometrage_arrivee }} </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <!-- Core theme JS-->
    {{-- <script src="{{ url('js/scripts.js') }}"></script> --}}
</body>
</html>