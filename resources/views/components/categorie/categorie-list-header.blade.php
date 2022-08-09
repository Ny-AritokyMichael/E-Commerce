<div>
    <h3 class="ps-section__title" data-mask="features">- Features Products</h3>
    <ul class="ps" style="float: right;display:inline-block;margin-bottom: 10vh;" >
        <li class="current" style="float:left;font-size: 20px;padding: 10px;margin-bottom: 5vh;" ><a href=" {{ route('accueil', ["categorie" => 0]) }} " >All</a></li>
        @foreach ($categorieProduits as $categorieProduit)
            <li style="float:left;font-size: 20px;padding: 10px;margin-bottom: 5vh;" ><a href=" {{ route('accueil', ["categorie" => $categorieProduit->id]) }} " > {{ $categorieProduit->categorie }}</a></li>
        @endforeach
    </ul>
</div>