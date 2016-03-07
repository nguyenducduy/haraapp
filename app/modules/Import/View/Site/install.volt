{% extends "../../Core/View/Layout/iframe-main.volt" %}

{% block title %}
    {{ 'page-title-create'|i18n }} | {{ config.global.title }}
{% endblock %}

{% block css %}

{% endblock %}

{% block js %}

{% endblock %}

{% block content %}
<div class="container-fluid container-fixed-lg">
    {{ content() }}

    {% if myStore.config != php('\Core\Model\Store::INSTALLED') and myStore.mapped != php('\Core\Model\Store::MAPPED') %}
    <form method="post">
        <div id="rootwizard">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm">
                <li class="active">
                    <a data-toggle="tab" href="#tab_category_map"><i class="fa fa-shopping-cart tab-icon"></i> <span>Category Map</span></a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#tab4" id="summary"><i class="fa fa-check tab-icon"></i> <span>Summary</span></a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane padding-20 active slide-left" id="tab_category_map">
                    <div class="row row-same-height">
                        <div class="col-md-4 b-r b-dashed b-grey sm-b-b">
                            <div class="padding-30 m-t-50">
                                <i class="fa fa-shopping-cart fa-2x hint-text"></i>
                                <h2>Category Mapping!</h2>
                                <p>Discover goods you'll love from brands that inspire. The easiest way to open your own online store. Discover amazing stuff or open your own store for free!</p>
                                <p class="small hint-text">Below is a sample page for your cart , Created using pages design UI Elementes</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="padding-30">
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
                                <div class="row">
                                    <div class="col-lg-7 col-md-6">
                                        <p class="no-margin">Automatic Recommended FIVE category. </p>
                                        <p class="small hint-text">
                                            Click on the right button to do mapping with FIVE category, then you can edit for what you want.
                                        </p>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <button class="btn btn-success">AUTO</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane slide-left padding-20" id="tab4">
                    <h1>Setup completed.</h1>
                    <p>This progress will be take a long time to sync with our system.</p>
                </div>
                <div class="padding-20 bg-white">
                    <ul class="pager wizard">
                        <li class="next">
                            <button class="btn btn-primary btn-cons btn-animated from-left fa fa-truck pull-right" type="button">
                            <span>Next</span>
                            </button>
                        </li>
                        <li class="next finish hidden">
                            <button class="btn btn-primary btn-cons btn-animated from-left fa fa-cog pull-right" type="submit" name="fsubmit">
                            <span>Finish</span>
                            </button>
                        </li>
                        <li class="previous first hidden">
                            <button class="btn btn-default btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
                            <span>First</span>
                            </button>
                        </li>
                        <li class="previous">
                            <button class="btn btn-default btn-cons pull-right" type="button">
                            <span>Previous</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
    {% elseif myStore.config == php('\Core\Model\Store::INSTALLED') and myStore.mapped != php('\Core\Model\Store::MAPPED') %}


    <div class="panel panel-transparent">
        <div class="panel-body">
            <div class="col-md-4 no-padding">
              <div class="p-r-30">
                <h3>Data mapping.</h3>
                <br>
                <p>Portlets are pluggable UI components that are managed and displayed in a web portal. Portlets in Pages are created by reusing the <a href="http://getbootstrap.com/components/#panels">panels</a> introduced in Bootstrap to enable effortless customization.
                </p>
              </div>
            </div>
            <div class="col-md-8 sm-no-padding">
                <div class="panel panel-transparent">
                  <div class="panel-body no-padding">
                    <div id="portlet-advance" class="panel panel-default">
                      <div class="panel-heading ">
                        <div class="panel-title">
                            {{ session.get('shop') }}
                        </div>
                        <div class="panel-controls">
                          <ul>
                            <li>
                              <div class="dropdown">
                                <a id="portlet-settings" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                  <i class="portlet-icon portlet-icon-settings "></i>
                                </a>
                                <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="portlet-settings">
                                  <li><a href="#">API</a>
                                  </li>
                                  <li><a href="#">Preferences</a>
                                  </li>
                                  <li><a href="#">About</a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li><a href="#" class="portlet-collapse" data-toggle="collapse"><i class="portlet-icon portlet-icon-collapse"></i></a>
                            </li>
                            <li><a href="#" class="portlet-refresh" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                            </li>
                            <li><a href="#" class="portlet-maximize" data-toggle="maximize"><i class="portlet-icon portlet-icon-maximize"></i></a>
                            </li>
                            <li><a href="#" class="portlet-close" data-toggle="close"><i class="portlet-icon portlet-icon-close"></i></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="panel-body">
                        <h3>
                            <span class="semi-bold">Progress</span> Data</h3>
                        <p>
                            <div class="current_processing_message">
                                {{ currentProcessMessage }}
                            </div>

                            <div class="col-lg-12" style="padding-left: 0px !important;">
                                <div class="col-lg-8 m-t-10" style="padding-left: 0px !important;">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-complete" data-percentage="0%"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <span class="progress-percent"></span>
                                </div>
                                <div class="" style="display:inline-block">
                                    <div class="progress-circle-indeterminate" style="width:20px;float:left;margin-right:5px;"></div>
                                    <div class="view_percent" style="float:left"></div>
                                </div>
                            </div>

                            <div class="progress__complete" style="display:none">
                                Your data has been already sync to five.vn.
                                Click to go to your <a href="{{ url('home') }}">app management</a> or <a>go to five page to view your data</a>.
                            </div>
                        </p>
                        <br>
                        <div>
                          <div class="profile-img-wrapper m-t-5 inline">
                            <img width="35" height="35" data-src-retina="assets/img/profiles/avatar_small2x.jpg" data-src="assets/img/profiles/avatar_small.jpg" alt="" src="assets/img/profiles/avatar_small2x.jpg">
                            <div class="chat-status available">
                            </div>
                          </div>
                          <div class="inline m-l-10">
                            <p class="small hint-text m-t-5">VIA senior product manage
                              <br>for UI/UX at REVOX</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>




    {% else %}
    Your shop has been already sync successfully. Go to <a>homepage</a>.
    {% endif %}
</div>
{% endblock %}
