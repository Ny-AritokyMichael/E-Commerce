@extends('admin.app.header')


@section('content')




            <div class="span9">
                <div class="content">

                    <div class="module">
                        <div class="module-head">
                            <h3>Insert repices</h3>
                        </div>
                        <div class="module-body">

                                <div class="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Warning!</strong> Something fishy here!
                                </div>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Oh snap!</strong> Whats wrong with you?
                                </div>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Well done!</strong> Now you are listening me :
                                </div>

                                <br />

                                <form class="form-horizontal row-fluid" method="post" action="{{ route('ajouter-produit-recette') }}" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-group form-group--inline">
                                            <label>Produit <span>*</span></label>
                                            <select class="ps-select selectpicker" name="idProduit">
                                                @foreach ($produits as $p)
                                                    <option value=" {{ $p->id }} ">{{ $p->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group form-group--inline">
                                            <label>Quantite</label>
                                            <input class="form-control" type="number" min=1 name="quantite">
                                        </div>
                                        <div class="form-group form-group--inline">
                                            <br>
                                            <button type="submit"  class="btn btn-primary">Ajouter le produit<i class="ps-icon-next"></i></button>
                                        </div>
                                </form>
                                <br>
                                <br>

                                    <table cellpadding="0" cellspacing="0" border="0"
                                        class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Produit</th>
                                                <th>Quantite</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($produitRecette as $p)
                                                <tr>
                                                    <td style="font-size: 24px;" > {{ $p->nom }} </td>
                                                    <td style="font-size: 24px;" > {{ $p->quantiteRecette }} </td>
                                                    <td>
                                                        <form action=" {{ route('retirer-produit-recette') }} " method="POST" >
                                                            @csrf
                                                            <input value=" {{ $p->id }} " name="idProduit" style="display: none;" />
                                                            <button type="submit" style="background-color: red;" class="btn btn-danger"> supprimer</button>
                                                        </form>
                                                    </td>
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
                                    </form>


                                    <form class="form-horizontal row-fluid"  action="{{ route('exporter') }}" >
                                        @csrf

                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" class="btn btn-success">Export Excel</button>
                                            </div>
                                        </div>
                                    </form> --}}
                                    <br>
                        <div class="module-body">

                                <form action=" {{ route('recette') }} " method="POST">
                                    @csrf
                                            <div class="ps-checkout__billing">
                                                <div class="form-group form-group--inline">
                                                    <label>Nom de la recette <span>*</span></label>
                                                    <input class="form-control" type="text" name="nomRecette">
                                                </div>
                                                <div class="form-group form-group--inline">
                                                    <button type="submit" class="btn btn-primary">Enregistrer la recette<i class="ps-icon-next"></i></button>
                                                </div>
                                    </div>
                                </form>


                                {{-- <form class="form-horizontal row-fluid" method="post" action="#" enctype="multipart/form-data" >
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
                                            <button type="submit" class="btn btn-success">insertion base de donnee</button>
                                        </div>
                                    </div>
                                </form>


                        </div>
                    </div>





                </div><!--/.content-->
            </div><!--/.span9-->
        </div>
    </div><!--/.container-->
</div><!--/.wrapper-->

<div class="footer">
    <div class="container">


        <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b> All rights reserved.
    </div>
</div>

<br>
<div class="row">
    <div class="col-2">
        <div class="row">
            <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                <label for="file">Choisir le csv</label>
                <input type="file" name="file" class="form-control">
                <br>
                <button type="submit" class="btn btn-primary">valider</button>
            </form>
        </div>
    </div>


        <form action="#">
            @csrf
            <button type="submit" class="btn btn-success">Export Excel</button>
        </form><br>

        <form action="#">
            @csrf
            <button type="submit" class="btn btn-danger">Export PDF</button>
        </form><br>

        {{-- <span> {{ $data->links() }}</span> --}}
    </div>
    {{-- <div class="col-2"> </div> --}}

    {{-- <div class="row">
        <form action="{{ route('export') }}" method="get" enctype="multipart/form-data">
            @csrf
            <br>
            <button type="submit" class="btn btn-success">Export Excel</button>
        </form>
    </div> --}}
</div>

<style>
.w-5 {
    display: none;
}

</style>

@endsection
