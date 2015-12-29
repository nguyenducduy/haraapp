<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg">
        <div class="inner">
            {% if bc is defined %}
            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
                {% for b in bc %}
                    {% if (b['active']) %}
                        <li><a href="javascript:void(0)" class="active">{{ b['text'] }}</a></li>
                    {% else %}
                        <li>
                            <p><a href="{{ b['link'] }}">{{ b['text'] }}</a></p>
                        </li>
                    {% endif %}
                {% endfor %}
            </ul>
            <!-- END BREADCRUMB -->
            {% endif %}
        </div>
    </div>
</div>
