<x-app-layout>
    <x-slot name="content" >
        <main class="ps-main">
            <div class="ps-content pt-80 pb-80">
              <div class="ps-container">
                <div class="ps-cart-listing">
                  <table class="table ps-cart__table">
                    <thead>
                      <tr>
                        <th width="25%" >Recette</th>
                        <th>Produits</th>
                        <th width="25%" ></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($recettes as $recette)
                        <tr>
                            <td style="font-size: 20px;"  width="25%" > {{ $recette->nom }}</td>
                            <td style="font-size: 20px;" >
                              <p>
                                @foreach ($recette->produitRecettes as $produitRecette)
                                    <span>{{ $produitRecette->nom }} <span style="text-decoration: underline;" > {{ $produitRecette->quantite_recette }} {{ $produitRecette->unite_quantite->unite }}</span> , </span>
                                @endforeach
                              </p>
                            </td>
                            <td style="font-size: 20px;" width="25%"  >
                              <form action=" {{ route('ajouter-recette-panier') }} " method="post">
                                @csrf
                                <input type="text" style="display: none;" value=" {{ $recette->id }} " name="idRecette" id="idRecette">
                                <input type="submit" class="ps-btn"  value="Ajouter au panier">
                              </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </main>
    </x-slot>

</x-app-layout>
