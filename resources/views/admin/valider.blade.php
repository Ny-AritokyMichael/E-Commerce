@extends('admin.app.header')


@section('content')



 <style>
   .container{
    padding: 0.5%;
   }
</style>


    <div class="span9">
        <div class="content">

            <div class="module">
                <div class="module-head">
                    <br>

                    <h3>
                        Validation </h3>


                </div>
                <div class="module-body table">
                    <table cellpadding="0" cellspacing="0" border="0"
                        class="datatable-1 table table-bordered table-striped	 display" width="100%">
                            <thead>
                                <tr>
                                    <th scope="row">Utilisateur</th>
                                    <th>Montant</th>
                                    <th>Date demande</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demandeRecharges as $demandeRecharge)
                                <tr>
                                    <td style="font-size: 24px;" > {{ $demandeRecharge->user->nom . ' ' .  $demandeRecharge->user->prenom}}</td>
                                    <td style="font-size: 24px;" > {{ $demandeRecharge->montant}}</td>
                                    <td style="font-size: 24px;" > {{ $demandeRecharge->created_at}}</td>
                                    <td><a class="btn btn-success"  style="transform: scale(0.8);" href=" {{ route('valider-demande-recharge', ['idRecharge' => $demandeRecharge->id]) }} " >Valider<i class="ps-icon-next"></i></a></td>
                                    <td><a class="btn btn-success" style="background-color: red;transform: scale(0.8);" href=" {{ route('refuser-demande-recharge', ['idRecharge' => $demandeRecharge->id]) }} " >Refuser<i class="ps-icon-next"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </table>
                    <br>

                    {{-- <form method="post" enctype="multipart/form-data"  action="{{ route('importProduit') }}" >
                        @csrf

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Import csv</label>
                            <div class="controls">
                                <div class="input-append">
                                    <input name="file"  type="file" >
                                </div>
                            </div>
                        </div>


                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-success">Import Excel</button>
                            </div>
                        </div>
                    </form>


                    <form class="form-horizontal row-fluid"  action="{{ route('exporter') }}" >
                        @csrf

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-success">Export Excel</button>
                            </div>
                        </div>
                    </form> --}}
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


@endsection
