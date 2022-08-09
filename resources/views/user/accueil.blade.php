<x-app-layout>
    <x-slot name="content" >
      <div class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <x-categorie.categorieListHeader/>
          </div>
          <div class="ps-section__content pb-50">
            <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
              <div class="ps-masonry">
                <div class="grid-sizer"></div>
                
                {{-- <x-produit.produitList /> --}}
                @foreach($produits as $produit)
                  <x-produit.produitCard :produit="$produit" />
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center" style="transform:scale(1.8);" >
        {{ $produits->onEachSide(2)->links() }}
      </div>
    </x-slot>
</x-app-layout>