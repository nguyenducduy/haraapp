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
                    <a data-toggle="tab" href="#tab_shop_contact"><i class="fa fa-user tab-icon"></i> <span>Shop Contact</span></a>
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
                <div class="tab-pane slide-left padding-20" id="tab_shop_contact">
                    <div class="row row-same-height">
                        <div class="col-md-5 b-r b-dashed b-grey ">
                            <div class="padding-30 m-t-50">
                                <h2>Your Information is safe with us!</h2>
                                <p>We respect your privacy and protect it with strong encryption, plus strict policies . Two-step verification, which we encourage all our customers to use.</p>
                                <p class="small hint-text">Below is a sample page for your cart , Created using pages design UI Elementes</p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="padding-30">
                                <form role="form">
                                    <p>Name and Information</p>
                                    <div class="form-group-attached">
                                        <div class="form-group form-group-default">
                                            <label>Fullname</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="form-group form-group-default">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone" class="form-control" placeholder="For contact and support">
                                        </div>
                                    </div>
                                    <br>
                                    <p>Address</p>
                                    <div class="form-group-attached">
                                        <div class="form-group form-group-default">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="Current address">
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group form-group-default form-group-default-selectFx">
                                                    <label>City</label>
                                                    <select name="city" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select">
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AX">Åland Islands</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">

                                            </div>
                                        </div>
                                    </div>
                                </form>
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
    Category Mapping... Please Wait....
    <div class="row">
        <div class="col-md-8">
            <div class="col-md-8 m-t-10">
                <div class="progress">
                    <div class="progress-bar progress-bar-complete" data-percentage="0%"></div>
                </div>
            </div>
            <div class="col-md-4">
                <span class="progress-percent"></span>
            </div>
            <div class="view_percent"></div>
        </div>
    </div>
    <div class="progress__complete" style="display:none">
        Your data has been already sync to five.vn.
        Click to go to your <a>app management</a> or <a>go to five page to view your data</a>.
    </div>

    <script type="text/javascript" src="/public/plugins/socketio-client/socketio.js"></script>
    <script type="text/javascript">
        var sessionShopName = `{{ session.get('shop') }}`;

        $(document).ready(function() {
            var socket = io.connect('/socket.io', {
                timeout: 60,
                secure: true
            });

            socket.on('connect', function () {
                console.log('connected.');
            });

            socket.on('notification', function (message) {
                var data = JSON.parse(message);
                if (sessionShopName == data.shopName) {
                    $('.progress-bar-complete').attr('data-percentage', data.record + '%');
                    $('.progress-bar-complete').attr('style', 'width:' + data.record + '%');
                    $('.view_percent').html(data.record + '%');
                    if (data.record == 100) {
                        // Append to div .progress__complete class
                        $('.progress__complete').show();

                        // Push notification
                    }
                }
            });
        })
    </script>
    {% else %}
    Your shop has been already sync successfully. Go to <a>homepage</a>.
    {% endif %}
</div>
{% endblock %}
