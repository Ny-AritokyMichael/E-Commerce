<div class="grid-item kids">
    <div class="grid-item__content-wrapper">
      <div class="ps-shoe mb-30">
        <div class="ps-shoe__thumbnail">
          {{-- <div class="ps-badge"><span>New</span></div> --}}
          {{-- <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-35%</span></div> --}}
          <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
          <img src="images/shoe/1.jpg" alt="">
          <a class="ps-shoe__overlay" href=" {{route('produit/detail', ["idProduit" => $produit->id])}} "></a>
        </div>
        <div class="ps-shoe__content">
          {{-- <div class="ps-shoe__variants">
            <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
            <select class="ps-rating ps-shoe__rating">
              <option value="1">1</option>
              <option value="1">2</option>
              <option value="1">3</option>
              <option value="1">4</option>
              <option value="2">5</option>
            </select>
          </div> --}}
          <div class="ps-shoe__detail"><a class="ps-shoe__name" href=" {{route('produit/detail', ["idProduit" => $produit->id])}} ">{{ $produit->nom }}</a>
            <p class="ps-shoe__categories"><a href="#">{{ $produit->categorieProduit->categorie }}</a></p>
            <span class="ps-shoe__price">{{-- <del>£220</del> --}} {{ $produit->prix }} </span>
          </div>
        </div>
      </div>
    </div>
  </div>
