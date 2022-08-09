<x-app-layout>
    <x-slot name="content">
        <main class="ps-main">
            <div class="ps-checkout pt-80 pb-80">
                <div class="ps-container">

                    <h2>Les restes de produits , voulez-vous en ajouter ou utiliser le reste?</h2>
                    <table cellpadding="0" cellspacing="0" border="0"
                        class=" table table-bordered table-striped	 display" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name of products</th>
                                <th scope="col">Reste</th>
                                <th scope="col">Valider</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($panier as $r)
                                <tr>
                                    <th scope="row"> {{ $r->produit_id }}
                                    </th>
                                    <td> {{ $r->quantite}}
                                    </td>
                                    <td>
                                        <form class="" action="{{ route('oui', ['id' => $r->produit_id, 'valider' => 'oui']) }}"
                                            method="post">
                                            @csrf

                                            <input type="hidden" name="quantite" value="{{ $r->quantite_unitaire  }}">
                                            <input type="hidden" name="reste" value="{{ $r->quantite_unitaire - ($r->quantite_recette % $r->quantite_unitaire) }}">
                                            <input type="hidden" name="idRecette" value="{{ $r->id  }}">
                                            <button type="submit" class="btn btn-success">Oui</button>
                                        </form>
                                        <br>

                                        <form class="" action="{{ route('non', ['id' => $r->produit_id , 'valider' => 'non']) }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="reste" value="{{ $r->quantite_unitaire - ($r->quantite_recette % $r->quantite_unitaire) }}">
                                            <input type="hidden" name="quantite" value="{{ $r->quantite_unitaire  }}">
                                                        <input type="hidden" name="idRecette"
                                                            value="{{ $r->id }}">
                                                            <button type="submit"
                                                                class="btn btn-danger">Non</button>
                                        </form>
                                    </td>
                                </tr>


                            @endforeach




                            {{-- <span> {{ $produit->links() }}</span> --}}


                            <br>
                        </tbody>
                    </table>
                </div>
                <form class="" action="{{ route('validerReste') }}"
                method="post">
                @csrf
                                <button type="submit"
                                    class="btn btn-danger">Valider</button>
            </form>

        </main>
    </x-slot>

</x-app-layout>
