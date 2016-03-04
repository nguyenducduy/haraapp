<style media="screen">
    .list-view-fake-header {
        display: none;
    }
</style>

<!--START QUICKVIEW -->
<div id="quickview" class="quickview-wrapper" data-pages="quickview">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#quickview-category" data-toggle="tab" class="quickview-header-name"></a>
            <input type="hidden" value="" class="quickview-header-value">
        </li>
    </ul>
    <a class="btn-link quickview-toggle" data-toggle-element="#quickview" data-toggle="quickview"><i class="pg-close"></i></a>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade in active no-padding" id="quickview-category">
            <div class="view-port clearfix">
                <div class="view bg-white">
                    <div class="navbar navbar-default navbar-sm">
                        <div class="navbar-inner">
                        <!-- BEGIN Header Controler !-->
                            <div class="view-heading">
                                <input type="text" name="name" id="category-search-field" class="form-control input-sm no-border" placeholder="Search category name">
                            </div>
                            <a href="#" class="inline action p-r-10 pull-right link text-master">
                                <i class="pg-search"></i>
                            </a>
                        <!-- END Header Controler !-->
                        </div>
                    </div>
                    <div data-init-list-view="ioslist" class="list-view boreded no-top-border">
                        <div class="list-view-group-container" style="padding:0" id="category-search-container">
                            <ul>
                                {% for item in myCategories %}
                                <li class="chat-user-list clearfix category-search-row">
                                    <a class="category-search-child" href="javascript:;">
                                        <span class="col-xs-height col-middle">
                                        {% if item['parent'] == 0 %}
                                            <span class="thumbnail-wrapper d32 circular bg-success">
                                            <input type="hidden" value="{{ item['parent'] }}" class="parentId">
                                            {#<img width="34" height="34" alt="" data-src="{{ item['iconpath'] }}" src="{{ item['iconpath'] }}" class="col-top">#}
                                            </span>
                                        {% endif %}
                                        </span>
                                        <p class="p-l-10 col-xs-height col-middle col-xs-12">
                                            <input type="hidden" value="{{ item['id'] }}" class="categoryId">
                                            <span class="text-master name">{{ item['name'] }}</span>
                                        </p>
                                    </a>
                                </li>
                                {% endfor %}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END QUICKVIEW-->
