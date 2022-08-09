<x-app-layout>
    <x-slot name="content" >
        <main class="ps-main">
            <div class="ps-content pt-80 pb-80">
                <div class="ps-container">
                    <div class="ps-cart-listing">
                        <table class="table ps-cart__table">
                            <thead>
                                <tr>
                                    <th>Utilisateur</th>
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
                                    <td><a class="ps-btn" style="transform: scale(0.8);" href=" {{ route('valider-demande-recharge', ['idRecharge' => $demandeRecharge->id]) }} " >Valider<i class="ps-icon-next"></i></a></td>
                                    <td><a class="ps-btn" style="background-color: red;transform: scale(0.8);" href=" {{ route('refuser-demande-recharge', ['idRecharge' => $demandeRecharge->id]) }} " >Refuser<i class="ps-icon-next"></i></a></td>
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