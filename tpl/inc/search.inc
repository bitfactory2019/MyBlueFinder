<!--search-->
<div class="main-search">
  <div class="wrap">
    <form id="main-search" method="post" action="search_results.html">
      <div class="row">
        <!--column-->
        <div class="column radios one-fourth">
          <h5><span>01</span> {{ 'Che tipo di barca?' | tr }}</h5>
          <div class="row">
            <div class="f-item one-half">
              <input type="radio" name="radio" value="motor" />
              <label for="hotel">{{ 'A motore' | tr }}</label>
            </div>
            <div class="f-item one-half">
              <input type="radio" name="radio" value="sail" />
              <label for="self_catering">{{ 'A vela' | tr }}</label>
            </div>
          </div>
        </div>
        <!--//column-->

        <div class="three-fourth">
          <!--form search-->
          <div class="form row">
            <!--column-->
            <div class="column one-third">
              <h5><span>02</span> {{ 'Dove vuoi ormeggiare?' | tr }}</h5>
              <div class="row">
                <div class="f-item full-width">
                  <label for="destination1">{{ 'Indica la zona' | tr }}</label>
                  <input type="text" placeholder="{{ 'Indica la città dove vuoi ormeggiare' | tr }}" id="destination1" name="destination" />
                </div>
              </div>
            </div>
            <!--//column-->

            <!--column-->
            <div class="column  one-third">
              <h5><span>03</span> {{ 'Periodo di soggiorno' | tr }}</h5>
              <div class="row">
                <div class="f-item one-half datepicker">
                  <label for="datepicker1">{{ 'Arrivo' | tr }}</label>
                  <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker1" name="datepicker1" /></div>
                </div>
                <div class="f-item one-half datepicker">
                  <label for="datepicker2">{{ 'Partenza' | tr }}</label>
                  <div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker2" name="datepicker2" /></div>
                </div>
              </div>
            </div>
            <!--//column-->

            <!--column-->
            <div class="column one-third">
              <h5><span>04</span> {{ 'Dati della barca' | tr }}</h5>
              <div class="row">
                <div class="f-item one-third spinner">
                  <label for="spinner1">{{ 'Lunghezza' | tr }}</label>
                  <input type="text" placeholder="" id="spinner1" name="spinner1" />
                </div>
                <div class="f-item one-third spinner">
                  <label for="spinner2">{{ 'Larghezza' | tr }}</label>
                  <input type="text" placeholder="" id="spinner2" name="spinner1" />
                </div>
                <div class="f-item one-third spinner">
                  <label for="spinner3">{{ 'Pescaggio' | tr }}</label>
                  <input type="text" placeholder="" id="spinner3" name="spinner1" />
                </div>
              </div>
            </div>
            <!--//column-->
          </div>
          <!--//form search-->
        </div>
        <input type="submit" value="{{ 'Verifica disponibilità' | tr }}" class="gradient-button search-submit" id="search-submit" />
      </div>
    </form>
  </div>
</div>
<!--//search-->
