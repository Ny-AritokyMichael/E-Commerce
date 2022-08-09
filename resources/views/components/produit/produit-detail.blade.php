<x-app-layout>
    <x-slot name="content" >
        <div>
            <div class="ps-product--detail pt-60">
                <div class="ps-container">
                    <div class="row">
                        <div class="col-lg-10 col-md-12 col-lg-offset-1">
                        <div class="ps-product__thumbnail">
                            <div class="ps-product__image">
                                <div class="item"><img class="zoom" src=" {{ url('images/shoe-detail/1.jpg') }} " alt="" "></div>
                            </div>
                        </div>
                        <div class="ps-product__thumbnail--mobile">
                            <div class="ps-product__main-img"><img src="images/shoe-detail/1.jpg" alt=""></div>
                            <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on"><img src="images/shoe-detail/1.jpg" alt=""><img src="images/shoe-detail/2.jpg" alt=""><img src="images/shoe-detail/3.jpg" alt=""></div>
                        </div>
                        <div class="ps-product__info">
                            <h1>{{ $produit->nom }}</h1>
                            <p class="ps-product__category"><h2> Categorie : <a href="#"> {{ $produit->categorie }} </a></h2></p>
                            <h3 class="ps-product__price"> {{ $produit->prix_unitaire }} Ar</h3>

                        <form method="post" action=" {{ route("panier") }} " >
                            @csrf
                            <input name="idProduit" value=" {{ $produit->id }} " style="display: none;" />
                            <div class="ps-product__block ps-product__size">
                                <p class="ps-product__category"><a  @if ($stock == 0)
                                    style="color: red;"
                                @endif href="#"> En stock : {{ $stock }} </a></p>
                                <h4>Choisissez la quantité</h4>
                                <div class="form-group">
                                    <input class="form-control" type="number" name="quantite" style="font-size: 20px;" value="1">
                                </div>
                            </div>
                            <div class="ps-product__shopping"><button class="btn btn-primary" >Ajouter au panier<i class="ps-icon-next"></i></button>
                                {{-- <div class="ps-product__actions"><a class="mr-10" href="whishlist.html"><i class="ps-icon-heart"></i></a><a href="compare.html"><i class="ps-icon-share"></i></a></div> --}}
                            </div>

                        </form>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
