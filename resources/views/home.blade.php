@extends('jutarnji_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-6" id="map">

        </div>
        <div class="col col-md-6">
            <h1>Napiši što je dobro  u Hrvatskoj i dodaj svoj pin</h1>
            <form class="form-horizontal" method="post">
                {{ csrf_field() }}
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
                        <select name="location" id="location" class="form-control">
                            <option value="1">Grad Zagreb</option>
                            <option value="2">Bjelovarsko-bilogorska županija</option>
                            <option value="3">Brodsko-posavska županija</option>
                            <option value="4">Dubrovačko-neretvanska županija</option>
                            <option value="5">Istarska županija</option>
                            <option value="6">Karlovačka županija</option>
                            <option value="7">Koprivničko-križevačka županija</option>
                            <option value="8">Krapinsko-zagorska županija</option>
                            <option value="9">Ličko-senjska županija</option>
                            <option value="10">Međimurska županija</option>
                            <option value="11">Osječko-baranjska županija</option>
                            <option value="12">Požeško-slavonska županija</option>
                            <option value="13">Primorsko-goranska županija</option>
                            <option value="14">Šibensko-kninska županija</option>
                            <option value="15">Sisačko-moslavačka županija</option>
                            <option value="16">Splitsko-dalmatinska županija</option>
                            <option value="17">Varaždinska županija</option>
                            <option value="18">Virovitičko-podravska županija</option>
                            <option value="19">Zadarska županija</option>
                            <option value="20">Zagrebačka županija</option>
                        </select>
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
