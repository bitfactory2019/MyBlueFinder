<!--search-->
<div class="main-search">
  <div class="wrap">
    <form id="main-search" method="post" action="search-results">
      <div class="row">
        <!--column-->
        <div class="column radios one-fourth">
          <h5><span>01</span> {{ 'Che tipo di barca?' | tr }}</h5>
          <div class="row">
            <div class="f-item one-half">
              <input id="boat-type-motor" type="radio" name="boat-type" value="motor" checked />
              <label for="boat-type-motor">{{ 'A motore' | tr }}</label>
            </div>
            <div class="f-item one-half">
              <input id="boat-type-sail" type="radio" name="boat-type" value="sail" />
              <label for="boat-type-sail">{{ 'A vela' | tr }}</label>
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
                  <label for="destination">{{ 'Indica la zona' | tr }}</label>
                  <input type="text" placeholder="{{ 'Indica la città dove vuoi ormeggiare' | tr }}" id="destination" name="destination" />
                </div>
              </div>
            </div>
            <!--//column-->

            <!--column-->
            <div class="column  one-third">
              <h5><span>03</span> {{ 'Periodo di soggiorno' | tr }}</h5>
              <div class="row">
                <div class="f-item one-half datepicker">
                  <label for="arrival">{{ 'Arrivo' | tr }}</label>
                  <div class="datepicker-wrap">
                    <input type="text" placeholder="" id="arrival" name="arrival" />
                  </div>
                </div>
                <div class="f-item one-half datepicker">
                  <label for="departure">{{ 'Partenza' | tr }}</label>
                  <div class="datepicker-wrap">
                    <input type="text" placeholder="" id="departure" name="departure" />
                  </div>
                </div>
              </div>
            </div>
            <!--//column-->

            <!--column-->
            <div class="column one-third">
              <h5><span>04</span> {{ 'Dati della barca' | tr }}</h5>
              <div class="row">
                <div class="f-item one-third spinner">
                  <label for="length">{{ 'Lunghezza' | tr }}</label>
                  <input type="text" placeholder="" id="length" name="length" />
                </div>
                <div class="f-item one-third spinner">
                  <label for="width">{{ 'Larghezza' | tr }}</label>
                  <input type="text" placeholder="" id="width" name="width" />
                </div>
                <div class="f-item one-third spinner">
                  <label for="draft">{{ 'Pescaggio' | tr }}</label>
                  <input type="text" placeholder="" id="draft" name="draft" />
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
