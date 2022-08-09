<x-app-layout>
    <x-slot name="content" >
        <main class="ps-main">
            <div class="ps-container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 style="margin-bottom: 5vh;" >Fabrication de recette</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <form action=" {{ route('ajouter-produit-recette') }} " method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                                    <div class="ps-checkout__billing">
                                        <div class="form-group form-group--inline">
                                            <label>Produit <span>*</span></label>
                                            <select class="ps-select selectpicker" name="idProduit">
                                                @foreach ($produits as $p)
                                                    <option value=" {{ $p->id }} ">{{ $p->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group form-group--inline">
                                            <label>Quantite <span>*</span></label>
                                            <input class="form-control" type="number" min=1 name="quantite">
                                        </div>
                                        <div class="form-group form-group--inline">
                                            <button type="submit" class="ps-btn ps-btn--fullwidth">Ajouter le produit<i class="ps-icon-next"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="ps-cart-listing" style="margin-top: 3vh;">
                    <table class="table ps-cart__table">
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
                                            <button class="ps-remove" style="background-color: red;" ></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="row">
                    <div class="col-3" style="margin-top: 5vh;" >
                    </div>
                    <div class="col-9" style="margin-top: 5vh;" >
                        <form action=" {{ route('recette') }} " method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                                    <div class="ps-checkout__billing">
                                        <div class="form-group form-group--inline">
                                            <label>Nom de la recette <span>*</span></label>
                                            <input class="form-control" type="text" name="nomRecette">
                                        </div>
                                        <div class="form-group form-group--inline">
                                            <button type="submit" class="ps-btn ps-btn--fullwidth">Enregistrer la recette<i class="ps-icon-next"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <ul>
                
            </ul>
        </main>
    </x-slot>
</x-app-layout>