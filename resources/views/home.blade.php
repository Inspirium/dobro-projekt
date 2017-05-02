@extends('jutarnji_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-6" id="map">

        </div>
        <div class="col col-md-6">
            <h1>Napiši što je dobro  u Hrvatskoj i dodaj svoj pin</h1>
            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="marker" id="inlineRadio1" value="crveni"> crveni
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="marker" id="inlineRadio2" value="plavi"> plavi
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="marker" id="inlineRadio3" value="zeleni"> zeleni
                    </label>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-6 control-label">Ime:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ivan">
                    </div>
                </div>
                <div class="form-group">
                    <label for="location" class="col-sm-6 control-label">Gdje živite?</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="location" name="location" placeholder="Zagreb">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-6 control-label">Što je dobro u Hrvatskoj?</label>
                    <div class="col-sm-6">
                        <textarea id="description" name="description" class="form-control" rows="3" placeholder="Pametna klupa :)"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger">Dodaj</button>
            </form>
        </div>
    </div>
</div>
@endsection
