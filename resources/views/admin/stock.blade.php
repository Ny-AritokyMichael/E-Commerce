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
                        List of Stock</h3>


                </div>
                <div class="module-body table">
                    <table cellpadding="0" cellspacing="0" border="0"
                        class="datatable-1 table table-bordered table-striped	 display" width="100%">
                        <thead class="thead-dark">
                                <tr>
                                    <th>Produit</th>
                                    <th>Quantite</th>
                                    <th>PUMP</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $stock)
                                <tr>
                                    <td style="font-size: 24px;" > {{ $stock->produit->nom  }}</td>
                                    <td style="font-size: 24px;" > {{ $stock->quantite  }}</td>
                                    <td style="font-size: 24px;" > {{ $stock->valeur_moyenne  }} ariary</td>
                                </tr>
                                @endforeach
                            </tbody>
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
                    </form> --}}


                    <form class="form-horizontal row-fluid"  action="{{ route('exporter') }}" >
                        @csrf

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-success">Export Excel</button>
                            </div>
                        </div>
                    </form>
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
