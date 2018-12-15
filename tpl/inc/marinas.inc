{% set marinas = [
  {
    id: 1,
    name: 'Sud Cantieri' | tr,
    description: 'Boatyard in Naples' | tr,
    image: 'inc/images/marinas/sud-cantieri.jpg',
    services: [
      { type: 'hotel', description: 'Servizio 1' | tr },
      { type: 'flight', description: 'Servizio 2' | tr },
      { type: 'hotel', description: 'Servizio 3' | tr },
      { type: 'flight', description: 'Servizio 4' | tr }
    ]
  },
  {
    id: 2,
    name: 'P&O Marinas' | tr,
    description: 'World class superyacht marinas' | tr,
    image: 'inc/images/marinas/p-o-marinas.jpg',
    services: [
      { type: 'hotel', description: 'Servizio 1' | tr },
      { type: 'flight', description: 'Servizio 2' | tr },
      { type: 'hotel', description: 'Servizio 3' | tr },
      { type: 'flight', description: 'Servizio 4' | tr }
    ]
  },
  {
    id: 3,
    name: 'Marina di Villasimius S.r.l.' | tr,
    description: 'Superyacht marina in Sardinia, Italy' | tr,
    image: 'inc/images/marinas/marina-villasimius.jpg',
    services: [
      { type: 'hotel', description: 'Servizio 1' | tr },
      { type: 'flight', description: 'Servizio 2' | tr },
      { type: 'hotel', description: 'Servizio 3' | tr },
      { type: 'flight', description: 'Servizio 4' | tr }
    ]
  },
  {
    id: 4,
    name: 'Port of Nice' | tr,
    description: 'A key hub on the French Riviera' | tr,
    image: 'inc/images/marinas/port-of-nice.jpg',
    services: [
      { type: 'hotel', description: 'Servizio 1' | tr },
      { type: 'flight', description: 'Servizio 2' | tr },
      { type: 'hotel', description: 'Servizio 3' | tr },
      { type: 'flight', description: 'Servizio 4' | tr }
    ]
  }
] %}
<header class="s-title">
  <h2>{{ 'Top marine' | tr }}</h2>
</header>

<div class="destinations">
  <div class="row">
    {% for marina in marinas %}
      <article class="one-fourth">
        <figure>
          <a href="marinas/{{ marina.id }}" title="{{ marina.name }} - {{ marina.description }}">
            <img src="{{ marina.image }}" alt="{{ marina.name }} - {{ marina.description }}" />
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
