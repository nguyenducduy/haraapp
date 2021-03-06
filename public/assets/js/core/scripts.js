 function deleteConfirm(theURL, id) {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this record!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function() {
        swal("Deleted!", "Item id "+ id +" has been deleted.", "success");
        window.location = theURL;
    });
}
 $(document).ready(function() {
    // Initializes search overlay plugin.
    // Replace onSearchSubmit() and onKeyEnter() with
    // your logic to perform a search and display results
    $('[data-pages="search"]').search({
        searchField: '#overlay-search',
        closeButton: '.overlay-close',
        suggestions: '#overlay-suggestions',
        brand: '.brand',
        onSearchSubmit: function(searchString) {
            console.log("Search for: " + searchString);
        },
        onKeyEnter: function(searchString) {
            console.log("Live search for: " + searchString);
            var searchField = $('#overlay-search');
            var searchResults = $('.search-results');
            clearTimeout($.data(this, 'timer'));
            searchResults.fadeOut("fast");
            var wait = setTimeout(function() {
                searchResults.find('.result-name').each(function() {
                    if (searchField.val().length != 0) {
                        $(this).html(searchField.val());
                        searchResults.fadeIn("fast");
                    }
                });
            }, 500);
            $(this).data('timer', wait);
        }
    });

    // seleted sidebar
    var activemenu = $('.container-fluid').attr('rel');
    var activemenuselector = $('#' + activemenu);
    if (activemenuselector.length) {
        activemenuselector.addClass('active');
        activemenuselector.parent().parent().addClass('active');
    }
    // Check all checkboxes when the one in a table head is checked:
    $('#basicTable .check-all').click( function(){
        $(this).parent().parent().parent().parent().parent().find("input[type='checkbox']").prop('checked', $(this).is(':checked'));
        // $(this).parent().parent().parent().parent().parent().find("tr").removeClass('selected');
        // $(this).parent().parent().parent().parent().parent().find("tr").addClass('selected');
    });

    // jQuery search able to filter category
    if ($('#category-search-container').length > 0) {
        $('#category-search-container').searchable({
            searchField: '#category-search-field',
            selector: '.category-search-row',
            childSelector: '.category-search-child',
            searchType: 'fuzzy'
        })

        // Select id, name from category list and put to wizard table mapping.
        var $categories = $('.category-search-row');
        var $chooseCategory = $('.choose-category');
        var $quickview = $('.quickview-wrapper');
        $categories.on('click', function(event) {
            var self = this;
            var name = $(self).find('.text-master.name').html();
            var id = $(self).find('.categoryId').val();
            var haravan_id = $('.quickview-header-value').val();
            var parentId = $(self).find('.parentId').val();

            if (parentId == 0) {
                return false;
            }
            // Append to table wizard and hide the category list view.
            $('.category-id-'+ haravan_id +'-name').text(name);
            $('.input-category-id-'+ haravan_id +'-value').attr('value', id);
            $('.input-category-id-'+ haravan_id +'-name').attr('value', name);

            // Hide the category list
            $quickview.removeClass('open');
        });

        // Click to show category list and add a flag to remember current category which active this.
        $chooseCategory.on('click', function(event) {
            // if category list view is open, force exit all event.
            if ($quickview.hasClass('open')) {
                event.stopPropagation();
            } else {
                var id = $(this).attr('data-id');
                var name = $(this).attr('data-name');
                $('.quickview-header-name').html('Mapping: ' + name);
                $('.quickview-header-value').val(id);
            }
        });
    }

    // HTML5 Desktop notifications
    // Determine the correct object to use
    var notification = window.Notification || window.mozNotification || window.webkitNotification;

    // The user needs to allow this
    if ('undefined' === typeof notification)
        alert('Web notification not supported');
    else
        notification.requestPermission(function(permission){});

    // A function handler
    function Notify(titleText, bodyText)
    {
        if ('undefined' === typeof notification)
            return false;       //Not supported....
        var noty = new notification(
            titleText, {
                body: bodyText,
                dir: 'auto', // or ltr, rtl
                lang: 'VI', //lang used within the notification.
                tag: 'notificationPopup', //An element ID to get/set the content
                icon: '' //The URL of an image to be used as an icon
            }
        );
        noty.onclick = function () {
            // console.log('notification.Click');
        };
        noty.onerror = function () {
            // console.log('notification.Error');
        };
        noty.onshow = function () {
            // console.log('notification.Show');
        };
        noty.onclose = function () {
            // console.log('notification.Close');
        };
        return true;
    }

    // Realtime Progress bar
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
            if (data.record > 99) {
                // Append to div .progress__complete class
                $('.progress__complete').show();
                $('.progress-circle-indeterminate').hide();

                // Push notification
                Notify('Hello', 'Your sync process finished.');
            }
        }
    });
})
