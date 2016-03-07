{% extends "../../Core/View/Layout/iframe-main.volt" %}

{% block title %}
    {{ 'page-title-list'|i18n }} | {{ config.global.title }}
{% endblock %}

{% block css %}

{% endblock %}

{% block js %}

{% endblock %}

{% block content %}
<div class="container-fluid container-fixed-lg bg-white" rel="products-list">
    <!-- BEGIN PlACE PAGE CONTENT HERE -->
    <!-- START PANEL -->
    <div class="panel panel-transparent">
        <div class="panel-heading">
            <div class="btn-group m-b-10">
                  <a href="javscript:;" class="btn btn-complete">Category</a>
                  <a href="{{ url('category/update') }}" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; {{ 'button-map-category'|i18n }}</a>
                </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            {{ content() }}
            <div class="table-responsive">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-right">
                        {% if paginator.items is defined and paginator.total_pages > 1 %}
                            {% include "../../Core/View/Layout/admin-paginator.volt" %}
                        {% endif %}
                        </div>
                        <label>Products ({{paginator.total_items}})</label>
                    </div>
                </div>
                <form method="post" action="">
                <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}" />
                <table class="table table-hover table-condensed" id="basicTable">
                    <thead>
                        <tr>
                            <th style="width:5%">
                                <div class="checkbox check-danger checkbox-circle">
                                  <input type="checkbox" value="checkall" id="checkall" class="check-all">
                                  <label for="checkall"></label>
                                </div>
                            </th>
                            <th style="width:10%">{{ 'th.image'|i18n }}</th>
                            <th>
                                {{ 'th.title'|i18n }}
                            </th>
                            <th style="width:10%">
                                {{ 'th.price'|i18n }}
                            </th>
                            <th style="width:10%">
                                Haravan ID
                            </th>
                            <th style="width:10%">
                                Five ID
                            </th>
                            <th style="width:12%">
                                <a href="{{ url.getBaseUri() }}admin/user?orderby=status&ordertype={% if formData['orderType']|lower == 'desc'%}asc{% else %}desc{% endif %}{% if formData['conditions']['keyword'] != '' %}&keyword={{ formData['conditions']['keyword'] }}{% endif %}">
                                    {{ 'th.status'|i18n }}
                                </a>
                            </th>
                            <th style="width:15%"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <div class="bulk-actions">
                                    <select
                                        class="cs-select cs-skin-slide"
                                        data-init-plugin="cs-select"
                                        name="fbulkaction">
                                        <option value="">{{ 'default.select-action'|i18n }}</option>
                                        <option value="delete">{{ 'default.select-delete'|i18n }}</option>
                                    </select>
                                    <input type="submit" name="fsubmitbulk" class="btn btn-primary" value="{{ 'default.button-submit-bulk'|i18n }}" />
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                    {% for item in myProducts.items %}
                        <tr>
                            <td class="v-align-middle">
                                <input type="checkbox" name="fbulkid[]" value="{{ item.id }}" {% if formData['fbulkid'] is defined %}{% for key, value in formData['fbulkid'] if value == item.id %}checked="checked"{% endfor %}{% endif %} id="checkbox{{ item.id }}"/>
                            </td>
                            <td class="v-align-middle">
                                <img src="{{ static_url(item.getThumbnailImage()) }}" class="img-rounded" alt="{{ item.getThumbnailImage() }}" style="width:70px;">
                            </td>
                            <td>
                                {{ item.title }} <br/>
                                <small><a href="https://five.vn/{{ item.slug }}" target="_blank">https://five.vn/{{ item.slug }}</a></small> <br/>
                                <small class="label label-success">{{ item.getCategoryIdAndName()['name'] }}</small>
                            </td>
                            <td style="width:10%">
                                {{ item.price }} &#x20ab;
                            </td>
                            <td>
                                {{ item.hid }}
                            </td>
                            <td>
                                {{ item.aid }}
                            </td>
                            <td class="v-align-middle"><span class="{{ item.getStatusStyle() }}">{{ item.getStatusName()|i18n }}</span></td>
                            <td class="v-align-middle">
                                <div class="btn-group btn-group-xs pull-right">
                                    <a href="{{ url('category/change/' ~ item.id) }}" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp; {{ 'button-change-category'|i18n }}</a>
                                    <a href="javascript:deleteConfirm('{{ url('product/delete/' ~ item.id) }}', '{{ item.id }}');" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                </div>
                            </td>
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>
                </form>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-right">
                        {% if paginator.items is defined and paginator.total_pages > 1 %}
                            {% include "../../Core/View/Layout/admin-paginator.volt" %}
                        {% endif %}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PANEL -->
    <!-- END PLACE PAGE CONTENT HERE -->
</div>
{% endblock %}
