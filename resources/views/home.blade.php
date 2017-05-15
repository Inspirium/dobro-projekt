@extends('jutarnji_layout')

@section('content')
<!-- Modal -->
<div id="pin-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="name">Poslao: <span id="modal-name">Ime i prezime</span></div>
        <div class="city">Živi u: <span id="modal-location">Zadar</span></div>
      </div>
      <div class="modal-body">
        <div id="modal-loc" class="locator-1"></div>
        <div id="modal-text" class="desc">U Zadru je najljepši zalazak sunca na svijetu</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger2" data-dismiss="modal">Zatvori</button>
      </div>
    </div>

  </div>
</div>

<div id="alert-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div id="alert-text" class="desc">Morate odabrati pin!</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger2" data-dismiss="modal">Zatvori</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row d-flex2">
        <div class="col-xs-12 col-md-8 order" id="map">
            <div class="cloud-1"></div>
            <div class="cloud-2"></div>
            <div class="cloud-3"></div>
            <div class="cloud-4"></div>
            <div class="col col-md-4 total">
                <h1 class="big_title"><span class="big_text">Broj dobroga</span> {{ count($entries) }}</h1>
            </div>
        </div>
        <div class="col-xs-12 col-md-4 ml-auto">
            <h2 class="overtitle">Omogućuje dobro</h2>
            <h1 class="title">Napiši što je <span class="blue_text">dobro</span> u Hrvatskoj i dodaj svoj pin</h1>
            <form class="form-horizontal" method="post">
                {{ csrf_field() }}
                <div class="form-group d-flex1">

                    <div>
                         <input type="radio" name="marker" id="inlineRadio1" value="1" required >
                        <label class="radio-inline" for="inlineRadio1"><span></span></label>
                    </div>
                    <div>
                         <input type="radio" name="marker" id="inlineRadio2" value="2" required>
                        <label class="radio-inline" for="inlineRadio2"><span></span></label>
                    </div>
                    <div>
                         <input type="radio" name="marker" id="inlineRadio3" value="3" required>
                        <label class="radio-inline" for="inlineRadio3"><span></span></label>
                    </div>
                    <div>
                         <input type="radio" name="marker" id="inlineRadio4" value="4" required>
                        <label class="radio-inline" for="inlineRadio4"><span></span></label>
                    </div>
                    <div>
                         <input type="radio" name="marker" id="inlineRadio5" value="5" required>
                        <label class="radio-inline" for="inlineRadio5"><span></span></label>
                    </div>
                    <div>
                         <input type="radio" name="marker" id="inlineRadio6" value="6" required >
                         <label class="radio-inline" for="inlineRadio6"><span></span></label>
                    </div>
                </div>

                <div class="form-group d-flex form_a">
                    <label for="name" class="col-sm-6 control-label self-align-center">Ime:</label>
                    <div class="col-sm-6 pr-0">
                        <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                    </div>
                </div>
                <div class="form-group form_a">
                    <label for="location" class="col-sm-6 control-label">Gdje živite?</label>
                    <div class="col-sm-6 pr-0">
                        <select name="location" id="location" class="form-control" required>
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
                <div class="form-group form_a">
                    <label for="description" class="col-sm-6 control-label">Što je dobro u Hrvatskoj?</label>
                    <div class="col-sm-6 pr-0">
                        <textarea id="description" name="description" class="form-control" rows="3" placeholder="" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger1">Dodaj</button>
            </form>

        </div>
    </div>
</div>
    <script>
        window.dataset = {!!  json_encode($entries) !!}
    </script>
@endsection
