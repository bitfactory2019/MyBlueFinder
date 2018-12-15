<header class="s-title">
	<h2>{{ 'Top destinations' | tr }}</h2>
</header>

<div class="offers">
	<div class="row">
	  {% for destination in ['capri', 'dubai', 'sardegna', 'nizza'] %}
			<article class="one-fourth">
				<figure><a href="#" title=""><img src="inc/images/destinations/{{ destination }}.jpg" alt="" /></a></figure>
				<div class="details">
					<h3>{{ destination | capitalize | tr }}</h3>
					<a href="#" title="{{ 'Vedi gli ormeggi' | tr }}" class="gradient-button">{{ 'Vedi gli ormeggi' | tr }}</a>
				</div>
			</article>
		{% endfor %}
	</div>
</div>
