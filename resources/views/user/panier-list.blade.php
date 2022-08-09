<x-app-layout>
    <x-slot name="content" >
        <main class="">
            <div class="">
              <div class="ps-container">
                <div class="row">
                  <div class="col-12 text-center" style="margin-bottom: 5vh;">
                    <h2>Panier de commande normal</h2>
                  </div>
                </div>
                <div >
                  <table class="table ps-cart__table">
                    <thead>
                      <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($panierProduit as $produitPanier)
                        <tr>
                            <td><a class="ps-product__preview" href="product-detail.html"><img class="mr-15" src="images/product/cart-preview/1.jpg" alt=""> {{ $produitPanier->nom }} </a></td>
                            <td> <p>{{ $produitPanier->prix_unitaire }}</p></td>
                            <td>
                              <div class="form-group--number">
                                <a href=" {{ route('update-panier-produit', ['quantite' => $produitPanier->quantite_recette - 1, 'idPanier' => $produitPanier->id_panier ]) }} "><button class="minus"><span>-</span></button></a>
                                <input class="form-control" type="text" style="font-size: 15px;"  value=" {{ $produitPanier->quantite_recette }}">
                                <a href=" {{ route('update-panier-produit', ['quantite' => $produitPanier->quantite_recette + 1, 'idPanier' => $produitPanier->id_panier ]) }} "><button class="plus"><span>+</span></button></a>
                              </div>
                            </td>
                            <td> <p>{{ $produitPanier->quantite_recette * $produitPanier->prix_unitaire }}</p></td>
                            <td>
                              <a href=" {{ route('delete-panier-produit', ['idPanier' => $produitPanier->id_panier ]) }} "><div class="ps-remove"></div></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div class="ps-cart__actions">
                    <div class="ps-cart__promotion">
                      <div class="form-group">
                        <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                        </div>
                      </div>

                    </div>
                    <div class="ps-cart__total">
                      <h3>Prix total: <span> {{ $prixTotal }} </span></h3><a class="btn btn-primary" href="{{ route("acheter") }}">Proceder au payement<i class="ps-icon-next"></i></a>
                    </div>
                  </div>
                </div>
              </div>
<br>
<br>
<br>
<hr>
<br>
<br>
<br>
              <div class="ps-container">
                <div class="row">
                  <div class="col-12 text-center" style="margin-bottom: 5vh;">
                    <h2>Panier de commande des recettes</h2>
                  </div>
                </div>
                <div class="ps-cart-listing">
                  <table class="table ps-cart__table">
                    <thead>
                      <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($panierProduitRecette as $ppr)
                        <tr>
                            <td><a class="ps-product__preview" href="product-detail.html"><img class="mr-15" src="images/product/cart-preview/1.jpg" alt=""> {{ $ppr['nom'] }} </a></td>
                            <td> <p>{{ $ppr['prix_unitaire'] }}</p></td>
                            <td>
                              <div class="form-group--number">
                                {{-- <a href=" {{ route('update-panier-produit', ['quantite' => $ppr->quantite_recette - 1, 'idPanier' => $produitPanier->id_panier ]) }} "><button class="minus"><span>-</span></button></a> --}}
                                <input class="form-control" type="text" style="font-size: 15px;" disabled value=" {{ $ppr['quantite'] }}">
                                {{-- <a href=" {{ route('update-panier-produit', ['quantite' => $produitPanier->quantite_recette + 1, 'idPanier' => $produitPanier->id_panier ]) }} "><button class="plus"><span>+</span></button></a> --}}
                              </div>
                            </td>
                            <td> <p>{{ $ppr['quantite'] * $ppr['prix_unitaire'] }}</p></td>
                            <td>
                              {{-- <a href=" {{ route('delete-panier-produit', ['idPanier' => $ppr->id ]) }} "><div class="ps-remove"></div></a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div class="ps-cart__actions">
                    <div class="ps-cart__promotion">
                      <div class="form-group">
                        <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                        </div>
                      </div>

                    </div>
                    <div class="ps-cart__total">
                      <h3>Prix total: <span> {{ $prixTotalRecette }} </span></h3><a class="btn btn-primary" href="{{ route("acheter-recette") }}">Proceder au payement<i class="ps-icon-next"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </main>
    </x-slot>

</x-app-layout>
