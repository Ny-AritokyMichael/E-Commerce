<x-app-layout>
    <x-slot name="content" >
        <main class="ps-main">
            <div class="ps-content pt-80 pb-80">
                <div class="ps-container">
                    <div class="ps-cart-listing">
                        <table class="table ps-cart__table">
                            <thead>
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
                                    <td style="font-size: 24px;" > {{ $stock->valeur_moyenne  }}</td>
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