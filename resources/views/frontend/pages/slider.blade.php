

      {{-- @foreach ($products as $product)
        <li>{{$product->name}}</li>
      @endforeach
     --}}


     <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">
        @foreach ($products as $product)
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="{{$product->image}}" class="d-block " alt="{{$product->name}}" style="height:350px;width:600px;">
        </div>
        @endforeach
      </div>
      
        <div class="row d-flex justify-content-between">
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
     </div>

