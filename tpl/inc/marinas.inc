{% set marinas = marinas() %}

<header class="s-title">
  <h2>{{ 'Top marine' | tr }}</h2>
</header>

<div class="destinations">
  <div class="row">
    {% for marina in marinas %}
      <article class="one-fourth">
        <figure>
          <a href="marinas/{{ marina.id }}" title="{{ marina.name }} - {{ marina.description }}">
            <img src="{{ marina.files[0].path }}" alt="{{ marina.name }} - {{ marina.description }}" />
          </a>
        </figure>
        <div class="details">
          <a href="marinas/{{ marina.id }}" title="{{ 'Vedi i porti' | tr }}" class="gradient-button">{{ 'Vedi i porti' | tr }}</a>
          <h4>{{ marina.name }}</h4>
          <span class="count">{{ marina.description }}</span>
          <div class="ribbon">
            {% for service in marina.services %}
              <div class="half {{ service.type }}">
                <a href="#" title="{{ service.description }}">
                </a>
              </div>
            {% endfor %}
            {#
            <div class="half hotel">
              <a href="hotels.html" title="View all">
                <span class="small">from</span>
                <span class="price">&#36; 70</span>
              </a>
            </div>
            <div class="half flight">
              <a href="flights.html" title="View all">
                <span class="small">from</span>
                <span class="price">&#36; 150</span>
              </a>
            </div>
            #}
          </div>
        </div>
      </article>
    {% endfor %}
  </div>
</div>
