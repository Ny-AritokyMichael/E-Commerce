<x-app-layout>
    <x-slot name="content" >
        <main class="ps-main">
            <div class="ps-checkout pt-80 pb-80">
              <div class="ps-container">
                <form class="" action="{{ route("porte-feuille/demander-recharge") }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                            <div class="ps-checkout__billing">
                                <h2>Votre solde est de : {{ $argent }}</h2>
                                <h1 style="margin-bottom: 5vh;" >Recharge de porte feuille</h1>
                                <div class="form-group form-group--inline">
                                    <label>Montant <span>*</span></label>
                                    <input class="form-control" type="number" min=1 name="montant" style="font-size: 20px;">
                                </div>
                                <div class="form-group form-group--inline">
                                    <button type="submit" class="ps-btn ps-btn--fullwidth">Envoyer la demande de recharge<i class="ps-icon-next"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </x-slot>

</x-app-layout>
