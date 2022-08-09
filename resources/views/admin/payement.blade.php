@extends('admin.app.header')


@section('content')
    <div class="span9">
        <div class="content">

            <!--/.module-->
            <div class="module">
                <div class="module-head">
                    <h3>
                        List of Payements</h3>
                </div>
                <div class="module-body table">
                    <table cellpadding="0" cellspacing="0" border="0"
                        class="datatable-1 table table-bordered table-striped	 display" width="100%">

                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Firsname</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date of payement</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payement as $payements)
                                <tr>

                                    <th scope="row">
                                        {{ $payements->nom }}
                                    </th>
                                    <th>
                                        {{ $payements->prenom }}
                                    </th>
                                    <th>
                                        {{ $payements->email }}
                                    </th>
                                    <th>{{ $payements->date_de_payement }}</th>
                                    <th>{{ $payements->montant }} ariary</th>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
            <!--/.module-->
        </div>
        <!--/.content-->
    </div>
    <!--/.span9-->
    </div>
    </div>
    <!--/.container-->
    </div>
    <!--/.wrapper-->
@endsection
