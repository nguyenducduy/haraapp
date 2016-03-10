{% extends "../../Core/View/Layout/iframe-main.volt" %}

{% block title %}
    {{ 'page-title-list'|i18n }} | {{ config.global.title }}
{% endblock %}

{% block css %}

{% endblock %}

{% block js %}

{% endblock %}

{% block content %}
<div class="container-fluid container-fixed-lg bg-white" rel="category-list">
    <form method="post">
        <div class="row row-same-height">
            {{ content() }}
            <div class="col-md-8">
                <table class="table table-condensed">
                    {% for myCollection in collections %}
                    <tr>
                        <td class="col-lg-5 col-md-5 col-sm-5">
                            <span class="label label-info">{{ myCollection.id }}</span>
                            <span class="m-l-10 ">{{ myCollection.title }}</span>
                        </td>
                        <td class="col-lg-1 col-md-1 col-sm-1">
                            <a
                                href="javascript:;"
                                class="btn-link pg-arrow_lright_line_alt menu-hambuger-plus choose-category"
                                data-toggle="quickview"
                                data-toggle-element="#quickview"
                                data-id="{{ myCollection.id }}"
                                data-name="{{ myCollection.title }}"
                            ></a>
                        </td>
                        <td class="col-lg-5 col-md-5 col-sm-5">
                            <input type="hidden" name="mapping[{{ myCollection.id }}][id]" value="{{ formData['mapping'][myCollection.id] is defined ? formData['mapping'][myCollection.id]['id'] : 0 }}" class="input-category-id-{{ myCollection.id }}-value">
                            <input type="hidden" name="mapping[{{ myCollection.id }}][name]" value="{{ formData['mapping'][myCollection.id] is defined ? formData['mapping'][myCollection.id]['name'] : '' }}" class="input-category-id-{{ myCollection.id }}-name">
                            <span class="category-id-{{ myCollection.id }}-name">{{ formData['mapping'][myCollection.id] is defined ? formData['mapping'][myCollection.id]['name'] : '' }}</span>
                        </td>
                    </tr>
                    {% endfor %}
                </table>
            </div>
        </div>
        <div class="row row-same-height">
            <div class="col-md-8">
                <input type="submit" class="btn btn-success m-b-10" name="fsubmit" value="submit"/>
            </div>
        </div>

    </form>
</div>
{% endblock %}
