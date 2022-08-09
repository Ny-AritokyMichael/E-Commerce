<div>

    {{-- <form class="ps-search--header" action="#" method="post">
        <input class="form-control" wire:model="recherche" type="text" placeholder="Search Product…" name="recherche">
        <button><i class="ps-icon-search"></i></button>
    </form> --}}
    <ul>
        @foreach($produits as $produit)
            {{-- <x-produit.produitCard :produit="$produit" /> --}}
        @endforeach
    </ul>


</div>

<div class="d-flex justify-content-center" style="margin-top: 10vh;">
    {{ $produits->onEachSide(1)->links() }}
</div>
