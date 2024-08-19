<!-- Tables -->
<section class="tables-section">

    <div class="row table-section-header-container">
    </div>

    <div class="row center-lg">

    @foreach($tables as $table)
        <div class="tables col col-2">

            <img style="height:300px !important" width="400px" src="tableimage/{{$table->image}}"
                alt="" class="tables-img">

            <h3 class="table-title">Table nr{{$table->tableNumber}}</h3>
            <p class="table-text">{{$table->description}}</p>

            <div>
                <div class="details-container">
                    <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                    <p class="list-text">{{$table->persons}} Persons</p>
                </div>
                <div class="details-container">
                    <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                    <p class="list-text">{{$table->classTable}}</p>
                </div>
            </div>

            <p class="amount-text">{{$table->price}}€ Per Night</p>

            <div class="buttons-container">
                <a href="{{url('detail', $table->id)}}" class="btn btn-ghost">View More</a>
                <a href="{{url('detail', $table->id)}}" class="btn btn-fill">Book Now</a>
            </div>
        </div>
    @endforeach

</section>
